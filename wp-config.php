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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bricotips' );

/** Database username */
define( 'DB_USER', 'bricotips' );

/** Database password */
define( 'DB_PASSWORD', 'bricolocal' );

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
define( 'AUTH_KEY',         ':#[]ODw}JKs&~D|jO|}+a%TP0j7w+^mi==w+ qd;UcsKCab JD65k4r .!3ytK0<' );
define( 'SECURE_AUTH_KEY',  'au<v&:qLuYN8Dh:@6=x!DiKMJ1viu9A!|)yEd6T=N?a0pCL[sA[kpG3`e2l=A$fx' );
define( 'LOGGED_IN_KEY',    'I@V7_=vI.RrEphA{}JL<2BpJFF,(zh)6(?f9n<n62ylO]&b]53fsZ[jHp5BAv#p@' );
define( 'NONCE_KEY',        'q/Me%{ u#hD*lhV Z@{T&y1DL*u`AXo x/!_G%qRuRVs9k/Gdk]Y<M8!z0s[YEk>' );
define( 'AUTH_SALT',        'fpl/,@-4IPGibJLd5`Uttsb&$6fXhA*?2?3b|3^Oh!Q`G0kDtD7&?Kqs;6Q:Q!(J' );
define( 'SECURE_AUTH_SALT', 'Ia$D @.)p~EbD]qtETg`P2=jJi#&#;k(M8}y5qT?$43gplikI`zA$`R*Uy<vagh>' );
define( 'LOGGED_IN_SALT',   'Pp1w}%0ea]+$3Jqzo_Sn&Y9i eImJo/<#D=`^;0~%j1qr;SH&wJ?YoQPE~n;tF_@' );
define( 'NONCE_SALT',       'C}7`xdt{Wb&?2<[`X}$xXteM(AxU?G)de|(CF*WiQ[)T#dw=[#FQMKsv.=`0PWrR' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
