<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6uKsFqAda9tJWdk~A]A2D-(7R*hA>[PLSn%5!A|WcZ6yPS]e1,~sxl;]}r#uWNoM');
define('SECURE_AUTH_KEY',  '9in+l8qB_/3qym2ph]@52Bq|3C/cD4^~N|AS)m6|gu%S(E75-RknJ/Y%xojA,/LO');
define('LOGGED_IN_KEY',    'B1|I;s.Ayx_>+|NG^f9xs`#(-g+K%UYLIB?:h0>L]</1!!-;@$+qX:O2!>Yb-1?S');
define('NONCE_KEY',        'liy+JP5))6>e,[uGn:URWpH-+uO=ThgB2+:z~H3H8-(?LC-:O)TjX|:Ro`h:MN0k');
define('AUTH_SALT',        '-|8G#V2qyIE!^_UjmCWsH|/Y0+(jnu`Bt$4~|@x]CV{;3.qFPU2vL-/1fV?)S!N?');
define('SECURE_AUTH_SALT', '1N&jY9f|GsLLI%vExv~N=zEc8.cZJd>JF^B8oY^N9/MfyyhS.$2bxo-i6a{,Ru^D');
define('LOGGED_IN_SALT',   'V0pbh%t8f4-B*WT+--O[NU->.A:W^~%to E4 )hNZfnsb+z|X|8+>-<X7yQ4*8|.');
define('NONCE_SALT',       'MHUmZ^*ucV6L~3P}|n*8NSktP=[X[##p>ARYZS<&p#/~[8MOh|y^wO;[viPdo+b6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
