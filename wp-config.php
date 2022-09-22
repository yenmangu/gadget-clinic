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

define('DB_NAME', 'bitnami_wordpress');


/** Database username */

define('DB_USER', 'bn_wordpress');


/** Database password */

define('DB_PASSWORD', '204bff3ad9a3ede0416778a909c511ca407917ec5f84305960b14bca680dd856');


/** Database hostname */

define('DB_HOST', 'localhost:3306');


/** Database charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');


/** The database collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');


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

define('AUTH_KEY',         'M.M:XTJ@,]Reh;E!{c O`M#ZJ|1jX,~tPX]6@38hpU[((EITzb$g_2:LNwd}o0bk');

define('SECURE_AUTH_KEY',  'mB~2Klrk2ILbVpxDWKgBZS,9Lr0v=A>5@,ne4tH`:*qj>3TtUg=w+yd.LY|_m2I7');

define('LOGGED_IN_KEY',    'TRuu:s;cfR0^E(P|f||s/V}Rf0)38/od#~~O)URhRdM4Ka}h5{>X{6S+5x`-2OiL');

define('NONCE_KEY',        'u=.oqtVzju1{_ZA9gNu +O=Zgm@a&-B2GR!kD.r%lA!&32`_[MXaf3{{xvH5a_,^');

define('AUTH_SALT',        '!$6<S>?}ew@0}ZzIvw0%:]w:0[41FnGz~?OlIgpBlR.wZ_U/qVbd4+laQn5o[oX+');

define('SECURE_AUTH_SALT', 'Tz<3=)W;`;vY}ysalP$b]{M!__!0?nQHWa1LiP|}u=Bh4H!22e;,:8e4Re1T*-EU');

define('LOGGED_IN_SALT',   '?(Bj<|7q0WwoeG;`E=q4ElXuQ-6yllbSxkS/L(pT tc+&kK`jCU}5?wFm0]L]> G');

define('NONCE_SALT',       '/0hJ(6rby-?R)v_tW.s13|!?NJn1(Q_fXcQ:/|2?4{9Wo^f:*J*9t Vrl&SjImXj');


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

define('WP_DEBUG', FALSE);
define('WP_DEBUG_LOG', FALSE);

/* Add any custom values between this line and the "stop editing" line. */

@ini_set('upload_max_filesize', '512M');
@ini_set('post_max_size', '512M');
@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', '0');
@ini_set('max_input_time', '300');


define('FS_METHOD', 'direct');
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if (defined('WP_CLI')) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('WP_AUTO_UPDATE_CORE', 'minor');
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if (!defined('ABSPATH')) {

	define('ABSPATH', __DIR__ . '/');
}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if (!defined('WP_CLI')) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function ($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter("xmlrpc_methods", function ($methods) {
		unset($methods["pingback.ping"]);
		return $methods;
	});
}
