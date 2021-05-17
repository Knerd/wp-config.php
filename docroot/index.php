<?php 
  /**
   * index.php
   * require WordPress where composer.json installed it under wordpress-install-dir   
   */
  $dir       = dirname( __DIR__ );
  $json      = json_decode( file_get_contents( "{$dir}/composer.json") );
  $wp_dir    = $json->extra->{"wordpress-install-dir"};
  $WordPress = "{$dir}/{$wp_dir}/index.php";
  require_once( $WordPress );