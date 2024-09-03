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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'U&v`YJe^2B 2D?jPyT<OMHC|3le?SsI{lhO d3xH/I~(tfc)bJCUfO.q4XUIdZD+' );
define( 'SECURE_AUTH_KEY',   'F `^4yDY>DW`|QOv>:mZcKgNLMLt.cC_mu,/XFz;0sY(M=LvD0udesD?f[q8B04(' );
define( 'LOGGED_IN_KEY',     'HCsYSHD0`y^L0U,LSwmiGnS{06,G%x[F^?%S#P)}z;% L<&%vh}D4+DR>E<TO7~9' );
define( 'NONCE_KEY',         'l%Badz7^/W<hDLUm:2cF2-|cR+=&Zu~wkR{gg5tOYPD9e{>9{]D*Fk;&N-P>=&XD' );
define( 'AUTH_SALT',         '6oxCP1D)^m]eJ.&mMD.Xg8,bNI0/f$G=2BVgA-BnLRGkmB K|~Ml{|f_PBv3ZAV6' );
define( 'SECURE_AUTH_SALT',  'W$%eFH]~|[PJavBxC%?W|?XIbw13V(;kMD;W+wRuYXN}`Z&_7~SAjI<=Wq4yY@W!' );
define( 'LOGGED_IN_SALT',    'gZUZ.l^K *AfmmLfodsMW?lA}(K_fcy@>A<n~hvgLfIw=YNFg4`a8uiA<I4Ns&!(' );
define( 'NONCE_SALT',        'St*!0nTuklt<lt*hGb=b8w},KM6$zWxlbj%u)4V?Yu!urE-ZlfRa^&)(L~^(Llu%' );
define( 'WP_CACHE_KEY_SALT', 'T&[.2M@R;WGhQa~H`Cyf$[,=9Z2h15+LNdO0yI![JXEv4j1*O0E!VG^jq6:D#29J' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
