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
define('DB_NAME', 'shopquanao');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'vertrigo');

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
define('AUTH_KEY',         ')t7=7Tx6-B,l!4oAe^IS~RfaU5/U}Fr4q_lgl~,wGh|jh&.E,^K-J-GQQ?dI(QAk');
define('SECURE_AUTH_KEY',  'g,pf [#byPw@3-1;n)OMD$5(~+:~M~YgT2.{|GT_N_u2B9QU*nPA4;sT)x6GR#n/');
define('LOGGED_IN_KEY',    'A`q,l-[ts;0dG_5zwmP(PuvkAUbJVa`~*oK*!-EzMt|vxHbxwY#H)T .rWkJVUaa');
define('NONCE_KEY',        'N4*B`X?x:0DbI8}w/W+BM}_d5(^c@bYq|GqY`.Z@P3N|T,3I&QkMmUbI8[a@_]-O');
define('AUTH_SALT',        '9>r[Pobp>IJ+73i7uROyi|D0+$^;=;H;Y$=H)a~/)D_:-VV8#msLX2Ckl$s7dp36');
define('SECURE_AUTH_SALT', '5~u9;YBHG6PCxnn}%zp6e)S[w>ljMDZUuvMKJNpBA$X|{0p?bJkI<52+(&n(Uhd8');
define('LOGGED_IN_SALT',   'PG/+Qw}+:l92$:)fne^YyHxg_,v+F1!Y5| Pn-/[*VUI_j)n!)K,wc,dDO+{ o-T');
define('NONCE_SALT',       '$t=4+1U4$$+eC}y1@m~yvFtlg5`uX1[0M>]-j,HsHdG>XyHS~X)}133e4TbO^:[U');

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
