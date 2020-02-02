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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
define( 'WP_MEMORY_LIMIT', '256M' );
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'gtaH0mestatsCA');

/** MySQL database username */
define('DB_USER', 'gtaH0_mestats_CA');

/** MySQL database password */
define('DB_PASSWORD', 'gCFaR2Z3@g{t');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'lu,i1}N|r~qv:)$erMec{IYW+Cqa>^t@V_):&nXS_KbsN(v~TLE+xs, St<`2.j1');
define('SECURE_AUTH_KEY',  ']F0Td 5@-|)iV^PQH<nkzL5-MHbTd#Zd+>p4)RjQ~ o;%<sNqp!1n^.Nv#1!qRkI');
define('LOGGED_IN_KEY',    'K#oaX|.D&:LA%o9v[*]R eB&WJ6V{/Es9rwe:[dOuY%MYCuOP tzd.4{39<1dIWr');
define('NONCE_KEY',        'rijOf_9dT2OEm @QF&y q H-gs3M{}Vh;xT}~)iS~Y[4$>6sIVa(c1N>Lm(>,X{6');
define('AUTH_SALT',        '4Cf_kk0lerO62#ML#q.?rU:*C$Z}tN|@MK#SzRX:3Ps!pPobMn[0tjqa(Yz`[TaA');
define('SECURE_AUTH_SALT', 'sylZ,^~^%l4JdHc,$!=Irma.BEvGSXA3;x$U^i0fxsX~+hJ=/Wst7Z}.`Sb (3,H');
define('LOGGED_IN_SALT',   'mK<F+D31*nEuD<k>T8`L3cr79TdcJBI32C[1{=tR}eCnoL08Bacf#0uy&E0!o&iw');
define('NONCE_SALT',       'WyGNw5~4d8mBTz2FCOg3M$#q^+Dru[k>V9^;]@]58%UAtTI^FK)w^cW8h>DO_UCq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gtaWP49_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('DISALLOW_FILE_EDIT', true);