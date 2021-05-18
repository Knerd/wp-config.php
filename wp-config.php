<?php
  /**
   * wp-config.php - base configuration of WordPress with the following configurations: 
   *  * MySQL settings, Table Prefix, Secret Keys, Post Revisions, Memory limit, Language, & ABSPATH. 
   * 
   ** Note: WP_Defaults works in conjunction with wp-config-local.php and wp-secrets.php, 
   ** Values defined in wp-config-local.php take priority over the defaults defined below.
   *? NOTE: You'll have to create this file yourself by copying the example provided.
   *! NOTE: DON'T CHANGE THE DB CONFIG HERE OR COMMIT CREDENTIALS TO YOUR REPO, USE wp-config-local.php FOR THAT!
   * @link https://wordpress.org/support/article/editing-wp-config-php
   * @see wp-config-local-example.php - local configuration
   * @see wp-secrets.php - keys and salts
  */
  require_once('wp-config.class.php');

  /**
   * WP_Config
   * add any WordPress Constant to the array below. 
   * quickly set your content and wp dir using the WP_DIR and and WP_CONTENT
   ** * Unofficial settings used to setup custom wp & wp-content dirs
   */
  new WP_Config([
    // OFFICIAL WORDPRESS CONSTANTS
      'WP_DEBUG'          => false,     // FOR DEVELOPERS: TURN OFF/ON WORDPRESS DEBUGGING MODE
      'WPLANG'            => '',            
      'WP_MEMORY_LIMIT'   => '128M',        
      'WP_POST_REVISIONS' => 10,            
      // DEFAULT DB CREDENTIALS 
      'DB_CHARSET'        => 'utf8',        
      'DB_COLLATE'        => '',            
      'DB_HOST'           => 'db',          
      'DB_NAME'           => 'default',     
      'DB_USER'           => 'user',        
      'DB_PASSWORD'       => 'user',        
      'DB_PREFIX'         => 'wp_',          
    // END: OFFICIAL
    // CONFIG SCHEME & FILE STRUCTURE 
      'SITE_SCHEME'       => 'http',    //* WORDPRESS SITE SCHEME
      'DOCROOT'           => 'docroot', //* PUBLIC DIRECTORY
      'WP_CONTENT'        => 'content', //* WORDPRESS CONTENT DIRECTORY
      'WP_DIR'            => 'wp',      //* BLANK UNLESS WORDPRESS IS IN SUB DIRECTORY
  ]);

  /* That's all, stop editing! Happy blogging. */

  //* LOAD WORDPRESS
  require_once( ABSPATH . '/wp-settings.php' );