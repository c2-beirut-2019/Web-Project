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
define( 'DB_NAME', 'animal' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'O)UNbUwYXi*|4=U`oB9kjq<!(dNlmqDEh9E,67XoO!/7`m<Jj$TT&c#|ajP!aZP[' );
define( 'SECURE_AUTH_KEY',  '{234)j9x6,`ZD@R+3@g!hDgyc<}PO/tH2AJj4AL7xZldSx3cgw}gI8d5mq3qx*,0' );
define( 'LOGGED_IN_KEY',    '4II_}jO}i]c FZd@Xl-FOYDFO,f3%}GJS,-aAbL6^p$AXp#n)~k)?[<Nk[7?(IdN' );
define( 'NONCE_KEY',        'XExFmrAsCi<DSzbqsUfZO]b|<=<P%&m,oPzR4nPA`4mi5YcKU@ijc{PD^{05H~.7' );
define( 'AUTH_SALT',        's/_+3:Pdfyz2j)SjRrxBaN,d).PSN6:/v^cLZM!*G04u|O|R8HbK@&8)3=b5CA^Y' );
define( 'SECURE_AUTH_SALT', '|_ +K[`zhg{%i58jZt:^f%d39L!+:_F.4>:+#5Puno6x~pxQMqQ!#U]vXI56{/,b' );
define( 'LOGGED_IN_SALT',   '#$/ELV^/a0Sx{T]B@}E+8}17%sUsmp2ZnF1{+=$_]xET$*WE::9=Ds(a3!Z0_<h0' );
define( 'NONCE_SALT',       'bjcouxlZPQgiDF?:**xgKQ W q3b6>q=8HZJ{/kKk18PYTz8@#Nm}ZRBOiHK=06B' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_animal';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
