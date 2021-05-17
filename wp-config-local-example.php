<?php
  /**
   * The local configuration for WordPress containing the following configurations:
   * * MySQL settings
   * * Secret keys - copy wp-secrets.php to wp-secrets-local.php
   *
   * @link https://wordpress.org/support/article/editing-wp-config-php
   */

  define( 'DB_HOST', 'localhost' );
  define( 'DB_NAME', 'main' );
  define( 'DB_USER', 'root' );
  define( 'DB_PASSWORD', '' );
  define( 'DB_CHARSET', 'utf8' );
  define( 'DB_COLLATE', '' );
  define( 'WP_MEMORY_LIMIT', '64M' );
  define( 'WP_POST_REVISIONS', true );

  /* That's all, stop editing! Happy blogging. */

  //? INCLUDE LOCAL SECRET KEYS ?
  $secrets = "wp-secrets-local.php";
  if ( file_exists( __DIR__ . "/{$secrets}" ) ) 
    include( __DIR__ . "/{$secrets}" );
