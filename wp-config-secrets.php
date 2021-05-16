<?php
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
  define('AUTH_KEY',         'Zg%/<wRb0?ikge9rRoKyr_^az+VA&/e^pTtFPH6U|O2%vEH&T$WwW_QX|~.+!r;4');
  define('SECURE_AUTH_KEY',  'v] kldWYnd&BLVU9N>_JATeg>e[C}N_7]*`&M7@xU/}8@z=4Ukv1NG#[]|,+27o_');
  define('LOGGED_IN_KEY',    'v;12&r#(;g[nk0_G){7#Gc5Qy1o$p&n++UO%y=l>#DJ_|Nde ZtM4G%n`Q+JYVq{');
  define('NONCE_KEY',        'wPwQPekK-v/fBC+iewJkd9Xaul/Ap3+)@ugB l=3[OS;B<|b+H8%!KB-;b8{drmp');
  define('AUTH_SALT',        '<-xU%_!NG/Ph5|/dLRR$.[yvDODd+xdtAQUvz;^J2>(:&`ku_/EibM=H/pU)xm*q');
  define('SECURE_AUTH_SALT', 'b9Q6OFo>s3K$HhzvpNzwF=x~8Nh,14/U@b)R7|NmX*x?O]q9nT$Tz^#$V2(b{BV!');
  define('LOGGED_IN_SALT',   '`KH?q=hBXC>+f3krEH6UVXY[/ymEQVofCY%tX#vTs:}<,`hDkI*Fw5n@PhVs||)/');
  define('NONCE_SALT',       'X+!U$CRj;^Y7=<Ne7jvX}P}8-.8R[w!|zN7Lz&>opAi:>i:xX+5}-DS:7+A9iP5R');