<?php
/**
 * wp-config.php
 * The base configurations of the WordPress wth the following configurations: 
 * MySQL settings, Table Prefix, Secret Keys, Post Revisions, Memory limit, Language, & ABSPATH. 
 * 
 * Visit {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php Codex page}  
 * for more infrmation 
 * 
 ** Note: This file works in conjunction with wp-config-local.php, 
 ** Values defined in wp-config-local.php take priority over the defaults below.
 *? You'll have to create this file yourself by copying the example provided.
 *
 * ! DON'T CHANGE THE DB CONFIG HERE OR COMMIT CREDS TO YOUR REPO, USE wp-config-local.php!
 * @see wp-config-local-example.php
 */

$defaults = [
  'debug'          => false,         //* FOR DEVELOPERS: TURN OFF/ON WORDPRESS DEBUGGING MODE
  'docroot'        => 'web',         //* PUBLIC DIRECTORY
  'table_prefix'   => 'wp_',         //* WORDPRESS DATABASE TABLE PREFIX
  'wp_content'     => 'wp-content',  //* WORDPRESS CONTENT DIRECTORY
  'wp_dir'         => '',            //* BLANK UNLESS WORDPRESS IS IN SUB DIRECTORY
  'data'           => 'data',        // DATA FOLDER
  'db_host'        => 'db',          // DATABASE HOST
  'db_name'        => 'default',     // DATABASE SCHEMA
  'db_user'        => 'user',        // DATABASE USER
  'db_pass'        => 'user',        // DATABASE PASSWORD
  'db_charset'     => 'utf8',        // DATABASE CHARSET TO USE IN CREATING DATABASE TABLES
  'db_collate'     => '',            // DATABASE COLLATE TYPE. DON'T CHANGE THIS IF IN DOUBT
  'composer'       => 'vendor',      // COMPOSER FOLDER
  'language'       => '',            // WORDPRESS LOCALIZED LANGUAGE, DEFAULTS TO ENGLISH.
  'memory_limit'   => '512M',        // WORDPRESS MEMORY LIMIT
  'post_revisions' => 10,            // WORDPRESS MAX POST REVISIONS
  'site_scheme'    => 'http',        // WORDPRESS SITE SCHEME
];

/**************************************************************
 *!!!!!!!!! THAT'S ALL, STOP EDITING! HAPPY BLOGGING!!!!!!!!!!! 
 **************************************************************/

extract($defaults);

// CURRENT DIRECTORY
$dir          = __DIR__;
$dirname      = dirname(__FILE__);

// DEBUG IS AUTOMATICALLY TURNED ON FOR DEVS USING DOKSAL 
$isDocksal    = getenv('DOCKSAL_STACK');

// ENV VARS SOVERRIDE DEFAULTS 
$debug        = getenv('DEBUG')        ?: $debug;
$docroot      = getenv('DOCROOT')      ?: $docroot;
$site_host    = getenv('VIRTUAL_HOST') ?: $_SERVER['SERVER_NAME'];
$table_prefix = getenv('MYSQL_PREFIX') ?: $table_prefix;
$wp_dir       = getenv('WP_DIR')       ?: $wp_dir;
$wp_content   = getenv('WP_CONTENT')   ?: $wp_content;

//? IN PRODUCTION ENV?
$isProduction = !$isDocksal && !$debug;

//* ARRAY OF CONSTANTS TO BE DEFINED
$CONSTANTS = [
  // ABSOLUTE PATH TO THE WORDPRESS DIRECTORY. 
  'ABSPATH'            => "{$dirname}/{$docroot}/{$wp_dir}",
  'ABSPATH_ROOT'       => "{$dir}",
  'ABSPATH_DATA'       => "{$dir}/{$data}",
  'ABSPATH_COMPOSER'   => "{$dir}/{$composer}",
  'DB_CHARSET'         => $db_charset,
  'DB_COLLATE'         => $db_collate,
  'DB_HOST'            => $db_host,
  'DB_NAME'            => $db_name,
  'DB_USER'            => $db_user,
  'DB_PASSWORD'        => $db_pass,
  'DISALLOW_FILE_EDIT' => $isProduction,
  'IS_PRODUCTION'      => $isProduction,
  'WP_DEBUG'           => !$isProduction,
  'WP_DEBUG_LOG'       => !$isProduction,
  'WP_HOME'            => "{$site_scheme}://{$site_host}",
  'WP_SITEURL'         => "{$site_scheme}://{$site_host}/{$wp_dir}",
  'WP_CONTENT_URL'     => "{$site_scheme}://{$site_host}/{$wp_content}",
  'WP_CONTENT_DIR'     => "{$dirname}/{$docroot}/{$wp_content}",
  'WP_MEMORY_LIMIT'    => $memory_limit,
  'WP_POST_REVISIONS'  => $post_revisions,
  'WPLANG'             => $language,

  /**
   *! AUTHENTICATION UNIQUE KEYS AND SALTS.
   *
   * Change these to different unique phrases!
   * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
   * You can change these at any point in time to invalidate all existing cookies. 
   * This will force all users to have to log in again.
   *
   * CHANGE THESE ON EVERY SITE USING wp-config-local.php!
   */
  'AUTH_KEY'           => '5ub~?Bjr>xoDM?S5X!VG8|YB$mf2O_ZX->2 *Rat4R; P#r(yr3{EW.-|vzK|JTB',
  'AUTH_SALT'          => 'g%B>0L`h]k027DI0(#*n#0}06S+&<v8U@Vj&#6kB `}!LiX#U|+)>lMh8pUq&eU{',
  'LOGGED_IN_KEY'      => '#%`F=)|h<>7A{H.5+/-74]o$0q8i|WbUah)9Xr5b5P,jwRqPR.gW?;P6P+>EfX#',
  'LOGGED_IN_SALT'     => 'TpE# Wk__hmj8~I%Jl>/z`{@r{F*w-PYY(6QPDWB@=[CR3%i/8:/FHh,7m76wl4a',
  'NONCE_KEY'          => 'M%+}I/9w0yQx^)>L)Yq nt-=q/01a`T$ch7,+u[i9l2,o.;Zfx*Z%}Jv3e`6jKp)',
  'NONCE_SALT'         => '~^a.=.TC)g+JvX+Ee9XjWCcc0[SkiW+%3$:9|hY2;ZpoX~C 3(sCT0-+p[-.L:}a',
  'SECURE_AUTH_SALT'   => 't6#9q+*9i_$*U6:1>A7o+3S9^-|QztSyG-PNdIn^ILr/S?yg[rfk{f-(Mc5!~Oy+',
  'SECURE_AUTH_KEY'    => 'NQtW__?zi`?mq18*|,v} }q(n[OUxb[bNIucR7Z+q}Q-TXRRJ_Z-bL{OV%:~=+zp',
];

//? INCLUDE LOCAL CONFIGURATION?
if ( file_exists( "{$dir}/wp-config-local.php" ) ) 
  include( "{$dir}/wp-config-local.php" );

// USE DEFAULT CONTANTS FOR THOSE NOT SET IN wp-config-local.php 
foreach ($CONSTANTS as $CONSTANT => $X )
  if ( !defined( $CONSTANT ) ) 
    define( $CONSTANT, $X );

//? SETUP PSR-4 CLASS AUTO-LOADING IF USING COMPOSER
if ( file_exists( ABSPATH_COMPOSER . '/autoload.php' ) ) 
  require_once ABSPATH_COMPOSER . '/autoload.php';
