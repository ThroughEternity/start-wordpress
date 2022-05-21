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
define( 'DB_NAME', 'default' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mvGQ%TS@mA' );

/** Database hostname */
define( 'DB_HOST', '192.168.1.96' );

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
define( 'AUTH_KEY',         'WgY@@T,,6+/:{y-q@I?_xp9;F_mdx;s5-W?Hf4rOI(ONH?,kT2<(Y^V~(5x37p/V' );
define( 'SECURE_AUTH_KEY',  'nZag@4Hr}]5U{w>*Yg,@i<],eF3aB9PTiasAHX[.WM~6@YsRg`{-LU}4[zihoh%,' );
define( 'LOGGED_IN_KEY',    'nIkrIj{&dS VF3ki5#,X0CBxV.y<! KJB|npIc#u]UJ_d`U];Llo(78B~7-;9/70' );
define( 'NONCE_KEY',        '6uMQA5]ZJ5:_aBJ p)%*%Bi0*d>IaeJG`I>A[y`HcE(B!U5_m;+~=u<TgS!;*R]O' );
define( 'AUTH_SALT',        ')Nf*lym.0gglWLNTZO!K6Q? O@)53rJIe}{$c5x9EpR+<7[0G%4_iFE]C.?cn  &' );
define( 'SECURE_AUTH_SALT', 'w.+bpj@f;sP~uky/)oKVRFH(Pp11f! {]Fq_y&8yA@}#!UEiU#T~~%HOnUU]~J}1' );
define( 'LOGGED_IN_SALT',   'pJ_w{kg(CV=;_ivN3Aw{QIKK&%%N{%QCWQ:x}7*r?EIS~4[=b.Um.H;S{%E+giI8' );
define( 'NONCE_SALT',       'Wam4ajJ8;cyNf?P`f|{t3?9(6zi)f?j7!d]v;k;$DBZJUNV7vY%+9+fBtYkC}:w&' );

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
