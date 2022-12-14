<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
define( 'DB_NAME', 'firstaid_wp_zd6ei' );

/** MySQL database username */
define( 'DB_USER', 'firstaid_wp_bdwgo' );

/** MySQL database password */
define( 'DB_PASSWORD', 'bG?0s?N9l&H2vx$K' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '%izkI7EWV-s9U_|[[*;6!Gz~2#0F~oAEW%3q@[*41k6qSa3[X-LG&+:/vxu5w3Cz');
define('SECURE_AUTH_KEY', '-i(/fbbO[70M89146w8q*4@2q23NL73%Yn-Cg#w+2Y48(~Sqkso19G:]oNf8d43Z');
define('LOGGED_IN_KEY', 'm5QHf@u6_9846l]Yqs5&+4k40_8%6UMQ]47:S8e):OD9yzEG30AT)-8w6&zj6s(a');
define('NONCE_KEY', 'br%tliz-7q:ft004kqG!_57(a:0QwV:oH1k83m57+9*7/_@Jx8tz:~:mc5@CL!VZ');
define('AUTH_SALT', 'h32t8_/e_*So0(~1AetC39WL9I5K58c5wc43uf2k!kZ5AW#u|Ha@y&wX:x#G](zy');
define('SECURE_AUTH_SALT', ']dDF@X_jc_his[I0nWn!L%OhVHe)Sh272Ty904|~++@!/z2x~:(kv+xYi0/hh279');
define('LOGGED_IN_SALT', 'n317kC2ywSC36/m8h2l!9]g6yQ1me9((Kvx1|J&2_%j&mnTV7]eST4L-40nVI9#[');
define('NONCE_SALT', 'f0s4s1c~g@3&p_-aP2cU%[pI4(21R73Fj&xv_/3h5r(E/2ega)w+oLa[G1yY7vlH');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hIzqC_';


define('WP_ALLOW_MULTISITE', true);
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
