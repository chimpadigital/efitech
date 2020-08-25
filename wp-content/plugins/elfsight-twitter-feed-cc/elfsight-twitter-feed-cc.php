<?php
/*
Plugin Name: Elfsight Twitter Feed CC
Description: Embed your Twitter feed or customer testimonials from Twitter into your website
Plugin URI: https://elfsight.com/twitter-feed-widget/codecanyon/?utm_source=markets&utm_medium=codecanyon&utm_campaign=twitter-feed&utm_content=plugin-site
Version: 1.5.0
Author: Elfsight
Author URI: https://elfsight.com/?utm_source=markets&utm_medium=codecanyon&utm_campaign=twitter-feed&utm_content=plugins-list
*/

if (!defined('ABSPATH')) exit;


require_once('core/elfsight-plugin.php');
require_once('api/api.php');

$elfsight_twitter_feed_config_path = plugin_dir_path(__FILE__) . 'config.json';
$elfsight_twitter_feed_config = json_decode(file_get_contents($elfsight_twitter_feed_config_path), true);

new ElfsightTwitterFeedApi\Api(
    array(
        'plugin_slug' => 'elfsight-twitter-feed',
        'plugin_file' => __FILE__,
        'cache_time' => 10800,
        'use' => array('user')
    )
);

new ElfsightTwitterFeedPlugin(
    array(
        'name' => esc_html__('Twitter Feed'),
        'description' => esc_html__('Embed your Twitter feed or customer testimonials from Twitter into your website'),
        'slug' => 'elfsight-twitter-feed',
        'version' => '1.5.0',
        'text_domain' => 'elfsight-twitter-feed',
        'editor_settings' => $elfsight_twitter_feed_config['settings'],
        'editor_preferences' => $elfsight_twitter_feed_config['preferences'],

        'plugin_name' => esc_html__('Elfsight Twitter Feed'),
        'plugin_file' => __FILE__,
        'plugin_slug' => plugin_basename(__FILE__),

        'vc_icon' => plugins_url('assets/img/vc-icon.png', __FILE__),
        'menu_icon' => plugins_url('assets/img/menu-icon.png', __FILE__),

        'update_url' => esc_url('https://a.elfsight.com/updates/v1/'),
        'product_url' => esc_url('https://1.envato.market/X9mr5'),
        'helpscout_plugin_id' => 110726
    )
);

?>
