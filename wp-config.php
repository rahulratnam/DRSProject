<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'eudrsd-liansheng');

/** MySQL database username */
define('DB_USER', 'eudrsd-liansheng');

/** MySQL database password */
define('DB_PASSWORD', 'f74791f85e1a38d0e5ca5be6');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MhlzfnRaADQmUkmwnJXhAB5B2syBKvjOBR5WTZK/NddAvsnL8jp0oOvdbFwTGN6QNkpvOEL5API8RAPEYSZPBw==');
define('SECURE_AUTH_KEY',  'oY1U3sNUXS8Z0ICa0R6QhSqmFH1bCrEEKb1Nb8kKCKcmyU3PMGm7wIk2IA7P6e1v8h5Dj7mCbzbutrC1+9KFAg==');
define('LOGGED_IN_KEY',    'FVRrrMI4v4dH8JflpRaHMDlcBbUEaw4GPNenHgsJxq7765WZpYMOm6OeguLbor2x8wImWrNyCq4IO4RR6cXa4Q==');
define('NONCE_KEY',        '2uO4/BSPZiCZPh9WkXRLFszZfkP9uouYyfVJKh428WLcWqVQ5AXFTJdSefqGGhS83lB98kOHK5q5yyNZOgfgVA==');
define('AUTH_SALT',        'H7wLOvvaDlUZzLCDIhYNFsLQQCbhPXreFQMmPOWBYnoePpAHjV7p0A2ZlGEQTwzsbMdMx2TRIBQTTVGVinrRag==');
define('SECURE_AUTH_SALT', 'w2173K12G4hM6ELxDGvrEH9Vtaonf1/bftpRR2dr9uoh1Crr3gRNpkRmJrJ3D+lahuwGccAzfEdVSTSeOOVb2g==');
define('LOGGED_IN_SALT',   '6iJc3h19PjhJ1poISup0QDItpvyLkS+WOJtA6TGWNVo48tjwz3kf0HWiZ/LLSSjqLoK/+6GtesyKhmLwECNkEg==');
define('NONCE_SALT',       'cGGVX5F4iaZtokiaZjoByDnQW02j4Ki+5kDYwYgEFzOSsoYP69bHIWCnIB/bwWxisIg3wAdsuYdnif/XSlnz9g==');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('SAVEQUERIES', false);

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
