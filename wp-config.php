<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']4zLL|AeIMy}T;~R4(]3:kiHH.@^/]KBH!H:s3Tr]$^XLLI(@RfBn[v(I8;O{F8}' );
define( 'SECURE_AUTH_KEY',  'CU1[7sgsp`9oI*.$%of3qug)v/|woM] c5}UKOPCjY37xEGWlQ@^X)70MeoX^%XY' );
define( 'LOGGED_IN_KEY',    ',c2k14^Z(5Hk wCOmm):,<R7$h@p>{gZ7=M}!r9_]<wvP+JJ/Ql.EbXO|z1rmCzB' );
define( 'NONCE_KEY',        'yX>mx@$vISHGR%4u}xU~AcaT0Zm&6_tCSLxo4S5rMZV@86TFDHn$8Mut%HP?Cq<u' );
define( 'AUTH_SALT',        'zZi1El`=d2pQ=f9.L,$_~)`d-UH+%c=L9$5MZqGv[N#gPAWzm8KD$6LdE|mkL/kf' );
define( 'SECURE_AUTH_SALT', '[f(J(]D5o,%KosQu:|oV;g*^[]y!9yFh?y4e~tApx-bJDLL#78vYakA*opUi?P*^' );
define( 'LOGGED_IN_SALT',   '.y$ROp7v6IAVUyb~U/rzF;qY$*CR;D`O){8Djx`5!:~P@R/S{Q3=FvD;b5RHqEWF' );
define( 'NONCE_SALT',       ' ev#kQ<L<{8gD;{qo#.{<+X`UwH5eGObnic|t-XjXaDE3hi(K~C2(*WIOA L@aW=' );

/**#@-*/

/**
 * WordPress database table prefix.
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
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
