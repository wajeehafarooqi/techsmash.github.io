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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '6<A>)9=)seHY tNN{XD{ATT/:^C;uEye n4!8=))wJ*&Z^7E;ZA_%CB5:f@rzu*q' );
define( 'SECURE_AUTH_KEY',  '8V~ZLKqwVa~9VIl^JTI>L1I60PY-M]ja:{`Shswc=;ZVrawhnP=gK+PfbJcvbjWU' );
define( 'LOGGED_IN_KEY',    'fP^d)Sp(?x`fIhe:bs5X x|J*#2O d;4[2FhRwQ;aIy&~~;dY&_,*E8B?#CGLzmF' );
define( 'NONCE_KEY',        ')/b.*&N 2J Dn6gLPt_l8mu-ee^!tvt8M-O$k<dLnD:5ORuVHkHn-{D<77=D7<L|' );
define( 'AUTH_SALT',        'NTpl@ztpMdP(J;h/kLSo!MSBCWK[(7kRTy{5p]zar=-g5yhM_-/i4,iXXfw`i<2E' );
define( 'SECURE_AUTH_SALT', 'P@%@MBc@.W,i-VhqOo-:1=FCBT0I+uNp<d79<4Y<hq2>xj`_m5ZKt1fn.)j$+cQ|' );
define( 'LOGGED_IN_SALT',   'pDQd?)*yK03:O?RQsd0Bf@;{.Z BTNX_;EHNrmQTmUF`e+uK{t1)! S<UpdBk_kI' );
define( 'NONCE_SALT',       'XGy9>,z3S9E#6_5KDA-,82vM@wf3<#l5<E.6WLhh2<)5($6Na%DK|v5 k#fM7F7Q' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
