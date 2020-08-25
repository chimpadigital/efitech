<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'efitech' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ZSp]4J({ EuRC |A0q)K9qlahN6aI;NR09>.SdS9OZoGM9b2/qZWqR9L?$w.:DdY' );
define( 'SECURE_AUTH_KEY',  '<EKfAfFCaV:5f6W(+Kv@+n?a2I~<.%RqHPb}@SORG1`jH>pM66HjFyNs;yL[-W*V' );
define( 'LOGGED_IN_KEY',    '<Vd$;-SR NNUW7T:AD;k+&h8FGfJ?nk.ZJx(S<@Bg eQR7C|v|T(VcD(~`||Yo0%' );
define( 'NONCE_KEY',        ':EwhURDN;b`gG-Nz~</#]o(f#h]8Jn0Mn>PYI[L2:kt+?VE&+IZliiE*1fYd8sMr' );
define( 'AUTH_SALT',        '->1=L#oWQl~-T^)zcT_L%hJ[HaMkOO9Sq@8uM[t7!|E9|e~=iB9{+nzV2}b;sp y' );
define( 'SECURE_AUTH_SALT', 'Ja~+2Id3W$x[~cDQ>6bTNikwoQoU@>+e`5q|Rd6(ri5c}B`!.95Q ?[>2Tcbd2pA' );
define( 'LOGGED_IN_SALT',   '7-Z112{8qnn[_+W@%TuezE&9}s?{$OfN@mHP,._$v#J2$ZcZF2u6aw!LiKk]}#4r' );
define( 'NONCE_SALT',       '.=Yi&?FUMS`I1TtioP4(+eVgfrf<(KSt4{8AugH)Td>LR:8/*73[dF~xh*qv)/7P' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/proyectos/efitech/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define( 'PB_BACKUPBUDDY_MULTISITE_EXPERIMENT' , true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
