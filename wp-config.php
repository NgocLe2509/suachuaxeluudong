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
define( 'DB_NAME', 'gongshop_wp412' );

/** MySQL database username */
define( 'DB_USER', 'gongshop_wp412' );

/** MySQL database password */
define( 'DB_PASSWORD', '@!K73a7pSh' );

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
define( 'AUTH_KEY',         'geqndrkhkyxurfec5k67eycmfkrcwiaoxqd1pmx5d4yqtho55cd3zwsmcd5mr3cf' );
define( 'SECURE_AUTH_KEY',  'klzizavcxlvwgjotgjnatorzy7u9z1myh7iowk3vcuwbupnek6jlql8b9vi74wdh' );
define( 'LOGGED_IN_KEY',    'hwok95gw68tt0okir011hztdcciswpfhjserqkwi0wsaysh86nlnfikyiukhsklk' );
define( 'NONCE_KEY',        '4gdquuljommzsjg9zsteefk8imcqa2wywwzkz4us2oxbs693x6ofhuhebqlcf6ba' );
define( 'AUTH_SALT',        'p8epgr7mmyndwphbetjfbgopfttdnkaqfhsglopqwhxcjryki51rkr4lx2miipfn' );
define( 'SECURE_AUTH_SALT', '7ctrpm73rggvvzmdn9cc27kknerk3yvgpbllxsgta3vxclbwprw2odwk6akatlyq' );
define( 'LOGGED_IN_SALT',   'rcutpujimfs1yhgex2ld4jbtrffo9aqtzqobihxx6z1tcxri8v6hr4egseiymopc' );
define( 'NONCE_SALT',       'uz26phbkodv1bbtlo0c6zkug7xqzxd6dchda8hysv3wkbds3ylpmtksu9royhjr3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpuo_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
