<?php

namespace ElfsightTwitterFeedApi;


if (!defined('ABSPATH')) exit;

require_once __DIR__ . '/vendor/autoload.php';

class Api extends Core\Api {
    private $routes = array(
        '' => 'requestController',
        'auth' => 'authController',
        'preview' => 'linkPreviewController'
    );

    private $apiConfig = array(
        'consumer_key' => 'mUspbYs9qCjq77OtR5uvEISxy',
        'consumer_secret' => 'cC9hNrjmdRm2Zc6kP39ACTNFFF7nqH7ZIDDgo9PkdpFlz0iAMq',
        'base_url' => 'https://api.twitter.com/1.1/',
        'auth_url' => 'https://storage.elfsight.com/auth/twitter/'
    );

    static $ERROR_USER_UPDATE;
    static $ERROR_USER_NOT_FOUND;
    static $ERROR_USER_NOT_AUTH;

    public function __construct($config) {
        self::$ERROR_USER_UPDATE = __('Can\'t update user data');
        self::$ERROR_USER_NOT_FOUND = __('User not found');
        self::$ERROR_USER_NOT_AUTH = __('User not authorized');

        parent::__construct($config, $this->routes);
    }

    public function authController() {
        $user_id = $this->input('user_id');
        $token = $this->input('token', false, false);

        if (empty($token)) {
            $auth_url = $this->apiConfig['auth_url'];
            $redirect_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $auth_url = $this->Helper->addQueryParam($auth_url, 'user_id', $user_id);
            $auth_url = $this->Helper->addQueryParam($auth_url, 'redirect_url', urlencode($redirect_url));

            header("Location: $auth_url");
            exit();
        } else {
            $json_data = json_encode(array(
                'token' => $this->input('token', false, true),
                'tokenSecret' => $this->input('tokenSecret', false, true)
            ));

            if ($this->User->set($user_id, $json_data)) {
                $response = "<script>window.opener.postMessage({'action': 'token', 'status': 1, 'data': $json_data}, '*'); window.close();</script>";

                return $this->response($response, array('plain' => true));
            } else {
                $this->error(400, 'invalid auth', self::$ERROR_USER_UPDATE);
            }
        }
    }

    public function requestController(){
        $url = $this->input('q');
        $url = preg_replace('/#/', '', $url);
        $url_parts = parse_url($url);

        $cache_key = $this->Cache->keyFromQuery($url);
        $data = $this->Cache->get($cache_key);

        if (empty($data)) {
            $user_id = $this->input('user_id');
            $user = $this->User->get($user_id);

            if (empty($user)) {
                $this->error(400, self::$ERROR_INVALID_AUTH, self::$ERROR_USER_NOT_FOUND);
            }

            $user_data = json_decode($user['data'], true);

            $oauth_data = array();

            if (isset($user_data['oauth_token_secret'])) {
                $oauth_data = array(
                    'tokenSecret' => $user_data['oauth_token_secret'],
                    'token'       => $user_data['oauth_token']
                );
            }

            if (isset($user_data['tokenSecret'])) {
                $oauth_data = array(
                    'tokenSecret' => $user_data['tokenSecret'],
                    'token'       => $user_data['token']
                );
            }

            if (empty($oauth_data)) {
                $this->error(400, self::$ERROR_INVALID_AUTH, self::$ERROR_USER_NOT_AUTH);
            }

            $oauth = $this->twitterBuildOauth($url_parts, $oauth_data);

            $full_url = $this->apiConfig['base_url'] . $url;

            $response = $this->request('get', $full_url, array(
                'headers' => $this->twitterBuildAuthorizationHeaders($oauth)
            ));

            if (!empty($response)) {
                if (!empty($response['body']) && !empty($response['http_code']) && (int) $response['http_code'] === 200) {
                    $data = $response['body'];

                    $this->Cache->set($cache_key, $data);
                } else {
                    return $this->error();
                }
            } else {
                return $this->error();
            }
        }

        return $this->response($data);
    }

    public function linkPreviewController() {
        if (PHP_VERSION_ID < 50600 || !class_exists('\LinkPreview\LinkPreview')) {
            return $this->response(json_encode(array()));
        }

        $url = urldecode($this->input('q'));

        $cache_key = $this->Cache->keyFromQuery($url);
        $data = $this->Cache->get($cache_key);

        if (empty($data)) {
            $data = array();
            $linkPreview = new \LinkPreview\LinkPreview($url);

            try {
                $parsed = $linkPreview->getParsed();

                foreach ($parsed as $parserName => $link) {
                    $data = array(
                        'url' => $url,
                        'title' => $link->getTitle(),
                        'description' => $link->getDescription(),
                        'cover' => $link->getImage()
                    );
                }
            } catch (Exception $e) {}

            $data = json_encode($data);
            $this->Cache->set($cache_key, $data);
        }

        return $this->response($data);
    }

    private function twitterBuildOauth($url_parts, $oauth_data) {
        $base_url = $this->apiConfig['base_url'] . $url_parts['path'];
        if (!empty($url_parts['query'])) {
            parse_str($url_parts['query'], $url_arguments);

        } else {
            $url_arguments = array();
        }

        $oauth = array(
            'oauth_consumer_key' => $this->apiConfig['consumer_key'],
            'oauth_nonce' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_token' => $oauth_data['token'],
            'oauth_timestamp' => time(),
            'oauth_version' => '1.0'
        );

        $base_info = $this->twitterBuildBaseString($base_url, 'GET', array_merge($oauth, $url_arguments));
        $composite_key = rawurlencode($this->apiConfig['consumer_secret']) . '&' . rawurlencode($oauth_data['tokenSecret']);
        $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
        $oauth['oauth_signature'] = $oauth_signature;

        return $oauth;
    }

    private function twitterBuildBaseString($base_url, $method, $params) {
        $r = array();

        ksort($params);

        foreach ($params as $key => $value) {
            $r[] = "$key=" . rawurlencode($value);
        }

        return $method . "&" . rawurlencode($base_url) . '&' . rawurlencode(implode('&', $r));
    }

    private function twitterBuildAuthorizationHeaders($oauth) {
        $values = array();

        foreach ($oauth as $key => $value) {
            $values[] = "$key=\"" . rawurlencode($value) . "\"";
        }

        return array(
            'Authorization' => 'OAuth ' . implode(', ', $values),
            'Expect' => ''
        );
    }
}
