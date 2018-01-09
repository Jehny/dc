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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_dc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'D:aF)01j&7#>$v27b!iDz2f33._B$uk&-;Gx$;o!]#-A?sMPMl%PTY2y,(i:&f_(');
define('SECURE_AUTH_KEY',  '^R?)&MCH |5yk |Fn^8Sg=txI[,Wvm|Mi#_.ao[rv{H0Z<@+aPB>e{l=]DQ|BoM2');
define('LOGGED_IN_KEY',    'Wf{YI+IQ93jdF5(LV9D:lXv/Qv3?c`BHXWSnFdqi8ok@rvW>qX]ne2JCuBUSXi@*');
define('NONCE_KEY',        '21/@CFun0ZXpb9, osSXSg`,.sVGG2Gy:,}#sPJ4+~U~YT^Zv`{++<]{:7Z&F`#.');
define('AUTH_SALT',        '^>W}NVq+]4(/~$L6TLH#j#iVOvzJxr7~)(^k|O,}tjx&fNKhf:#.$>Va#@)!bOG~');
define('SECURE_AUTH_SALT', 'hs,|<qJ.ky0=WQjH>1s9*)!b:+Hd1qO)5?[Zlqf&;bJSE}xFEb7Uu,T$Qrx_3$c~');
define('LOGGED_IN_SALT',   '(}H;w9aE1ld&(h$PFYf!jO[fWOI4#LPG{h2]Kc>G-DxAcpS5HxRttd0Q`w9gF{nw');
define('NONCE_SALT',       'L1$40/=]W@%tC2w@-p$!|~>;Dix}RxxZStH^4z$r<^D8I]-O;t@c/6SMwz<ZuLmd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
