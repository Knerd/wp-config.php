<?php
  /**
   * WP_Defaults
   * basic class to handle loading and maintaining default constants
   * config supports quick setup of where wordpress lives 
   * and where you want your content directory to be
   * WP_DEBUG can also be turned on by setting the same var as an ENV var
   *  
   */

  class WP_Defaults{        
    private $DEFAULTS;
    private $CONSTANTS;
    private $VENDOR_DIR;

    /**
     * get_defaults
     * 
     * returns an array of defaults to be set
     *
     * @return array 
     */
    function get_defaults(){
      $ENV = $this->getenv_defaults();
      extract( $ENV );

      //? IN PRODUCTION ENV?
      $isProduction = $this->is_production( $WP_DEBUG );

      return [
        'PROJECT_ROOT'       => __DIR__,
        'ABSPATH'            => __DIR__ . "/{$DOCROOT}/{$WP_DIR}",
        'DATA_PATH'          => __DIR__ . "/{$DATA_DIR}",
        'VENDOR_DIR'         => __DIR__ . "/{$this->VENDOR_DIR}",
        'DISALLOW_FILE_EDIT' => $isProduction,
        'IS_PRODUCTION'      => $isProduction,
        'WP_DEBUG'           => !$isProduction,
        'WP_DEBUG_LOG'       => !$isProduction,
        'WP_DEBUG_DISPLAY'   => !$isProduction,
        'WP_HOME'            => "{$SITE_SCHEME}://{$SITE_HOST}",
        'WP_SITEURL'         => "{$SITE_SCHEME}://{$SITE_HOST}/{$WP_DIR}",
        'WP_CONTENT_URL'     => "{$SITE_SCHEME}://{$SITE_HOST}/{$WP_CONTENT}",
        'WP_CONTENT_DIR'     => __DIR__ . "/{$DOCROOT}/{$WP_CONTENT}"
      ];
    }

    function __construct( $DEFAULTS ) {
      $this->DEFAULTS   = $DEFAULTS;
      $this->VENDOR_DIR = $this->get_vendor_dir();
      $this->CONSTANTS  = $this->get_defaults();
      $this->CONSTANTS += $this->get_official_defaults( $DEFAULTS );
      $this->autoload();
    }

    // GET COMPOSER DIRECTORY
    function get_vendor_dir(){
      $json = json_decode( file_get_contents( __DIR__ . "/composer.json" ) );
      return $json->config->{'vendor-dir'} ?? 'vendor';
    }
    
    /**
     * getenv_defaults
     * these values can be overridden using $ENV vars
     *
     * @return array 
     */
    function getenv_defaults(){
      extract( $this->DEFAULTS );
      return [
        // ENV VARS OVERRIDE DEFAULTS 
        'DATA_DIR'    => getenv('DATA_DIR')     ?: $DATA_DIR,
        'DOCROOT'     => getenv('DOCROOT')      ?: $DOCROOT,
        'SITE_HOST'   => getenv('VIRTUAL_HOST') ?: $_SERVER['SERVER_NAME'],
        'SITE_SCHEME' => getenv('SITE_SCHEME')  ?: $SITE_SCHEME, 
        'WP_CONTENT'  => getenv('WP_CONTENT')   ?: $WP_CONTENT,
        'WP_DEBUG'    => getenv('WP_DEBUG')     ?: $WP_DEBUG,
        'WP_DIR'      => getenv('WP_DIR')       ?: $WP_DIR,
      ];
    }
    
    /**
     * get_official_defaults
     * removes custom defaults to make things official 
     *
     * @param  mixed $defaults
     * @return array 
     */
    function get_official_defaults( $defaults ){
      $custom = [
        'DATA_DIR',
        'DOCROOT',
        'SITE_SCHEME',
        'WP_CONTENT', 
        'WP_DIR'
      ]; 

      foreach( $custom as $unofficial )
        unset( $defaults[ $unofficial ] );

      return $defaults;
    }

    /**
     * autoload
     * defines constants and loads autoload if present
     *
     * @return void
     */
    private function autoload(){
      $this->define_constants();

      //??? SETUP PSR-4 CLASS AUTO-LOADING IF USING COMPOSER ???
      $this->require( $this->VENDOR_DIR . '/autoload.php' ); 
    }
    
    /**
     * define_constants
     * loads local configs before looping through defaults to set $CONSTANTS
     *
     * @return void
     */
    function define_constants(){
      $this->load_local_config();

      // LOOP $CONSTANTS AND DEFINE DEFAULT IF NOT DEFINED IN wp-config-local.php 
      foreach ( $this->CONSTANTS as $CONST => $X )
        if ( !defined( $CONST ) ) 
          define( $CONST, $X );
    }
    
    /**
     * load_local_config
     * loads local configuration file if found, otherwise use salts provided
     *
     * @return void
     */
    function load_local_config(){
      //??? INCLUDE LOCAL CONFIGURATION ???
      $local   = __DIR__ . "/wp-config-local.php";
      $secrets = __DIR__ . "/wp-secrets.php";

      $this->require( $local, $secrets ); 
    }

    /**
     * is_production
     * debug is automatically turned on for devs using docksal. 
     * add your own logic here to determine how you define is_production     
     *
     * @param  mixed $debug
     * @return bool 
     */
    function is_production( $isDebug ){
      $isDocksal = getenv('DOCKSAL_STACK');
      return !$isDocksal && !$isDebug;
    }
    
    /**
     * require method that checks file before requiring,
     * pass 2nd argument to include a separate file should the 1st file not exists
     *
     * @param  mixed $file
     * @param  mixed $else
     * @return void
     */
    private function require( $file, $else = false ){
      if ( file_exists( $file ) ) 
        require_once $file;
      else if ( $else && file_exists( $else ) )
        require_once $else;
    }
  }