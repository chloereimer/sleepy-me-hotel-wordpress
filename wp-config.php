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
define('DB_NAME', '10125_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Vr&NRih|i2Z*B:IQ{bfN~V-4k4[VGd!bX{+Wb;0l}4&|j6bS~S,*V.wo1p>C`R8`');
define('SECURE_AUTH_KEY',  '@l{)v7r795s)^^wjc~}GV#&JF[U4B%i.[lx]gsB6RROskTU<|GBvflws.-Nn#x:.');
define('LOGGED_IN_KEY',    '.<9+$a|z6u$|xClioCs!ktdIGTB-$q_xSxN][:^-KJZ=,-%WT>k,!1 J$i`A,8Wy');
define('NONCE_KEY',        '@o2f1aG6l_+-uSE<Hl+qm7A?8Q!xWE&uR9A|1a.!bm$B[iQ}$2tl}n6X+9eo4}r~');
define('AUTH_SALT',        'KcI`wqD!frF7*67 VN!LnZNIxOxwaD{T^xb<2VARM96[A*![o30EBB7!L([-l=7]');
define('SECURE_AUTH_SALT', '/P3unyp}9H&bV,4eGeH4eR&%1*3N=]q,c&KMH*h<ki7[D{%$53*NIs,G*Q6c2h?N');
define('LOGGED_IN_SALT',   'h+GbDedy,OMS!QGV+}CB|y5eC(ZhN0M#h@-^8Q2zQiMyzbFe|J}==Bb;U[1Tly@r');
define('NONCE_SALT',       'J2&=->-81Q8xeh,%nvWHB4zN;Ws7K7KiHeorzw.E8LU/np3^`-$q@@ch9[3<d{M7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
