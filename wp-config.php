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
define( 'DB_NAME', 'renesassunc' );

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
define( 'AUTH_KEY',         'N7dXx}(5Jy9mk9+yy ^N]Z}dcAU*uA3CwrAo]Es#PgxUAjtj9VdU-8pY2*D6;o35' );
define( 'SECURE_AUTH_KEY',  '+MN,B,:i==D0udYXJTM)wOZ5M3N,Ts{Sx:NvZ|Cx-o&;%ZK7ij},-xDSalrzZF :' );
define( 'LOGGED_IN_KEY',    '?,:r.ISKzk0;o5O.b%&y!L ,w|b;q6fgO]NEJq0fO`y3pXE)M&pt1iPYU-#L+qF]' );
define( 'NONCE_KEY',        'fV/LF*/~Tw[.L4)ierC/Q%4-tm5Mz4vm)IWjAkem}o*F|&Iw:(Q})$cg_l8/WsMV' );
define( 'AUTH_SALT',        'CEW%5@Mv027((UVt[H/Keh?0)3nIx9frH$n^L%q1QCahn[1r((3w4f=cOurQ9o1>' );
define( 'SECURE_AUTH_SALT', 'W)AMi*B:ZZ/H~)4:jR,R)@a:0Xhpi2I6X2YxY#q#OL b4grKiclr4,dxplxt^kd:' );
define( 'LOGGED_IN_SALT',   '1N`JL}GE0Yh!UNOHfd/5,9jCuvgkrL)s? N7:P6;+,cq<33gn~5228;,wv^k8/4a' );
define( 'NONCE_SALT',       '?%+491F^8}LyU(-?]&`!nrjBNA*Kl{`6WB+*x xQr).Xp:dx;;JC}b1@osh7p$El' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
