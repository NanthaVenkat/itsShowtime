<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tailwind' );

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
define( 'AUTH_KEY',         '#EM9 /YQE85:It5ZLkp|@8(*nqz^2BN2kbZi o&sFfC8Sm|~b8PkB#St~Rwlb>mP' );
define( 'SECURE_AUTH_KEY',  'H%MrO._9rOb#XuhT^w0+3~MTDAe,3)lb^cxaMGIa*FYbr]%H{e#44v)-y<E67@1s' );
define( 'LOGGED_IN_KEY',    '<9aXi%:nh);i>9-c$<dr2c4&DT@)1vkZj=hEQZRak27MH)G(~^s_,0_o)GPWyW),' );
define( 'NONCE_KEY',        '4evwRcTLZ{fv 3g(RXpUDSNmO|_D<6#3wLl{9%~CIxO*$:w>P-.BnD^M~rcsX/%F' );
define( 'AUTH_SALT',        '_g4[*NPqH0o^w.v#-Xx%(WUZ8~,5A%a)6s)a]|;q!f|R_i>.kyA9sU8@aguZQN=X' );
define( 'SECURE_AUTH_SALT', '*vR)WS8[LZuu7O{3lUP55t #r1ck[5{!}-xjG?@OeD$ag{rrZ?8-]NFe):|rh#ok' );
define( 'LOGGED_IN_SALT',   '4&l8c)E}vbe+F4P:8EJla.U,U<%$e63c_Wa<~&[yuN>Z;2BBR&t+cpUL>R__R.G6' );
define( 'NONCE_SALT',       'f%ujs)T4^mmcOP 8tFjc2.]zxU &w5R?RrQFi4j3n:Y(OESFo^e}2FK=3~#.-<?o' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
