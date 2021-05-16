<?php
/**
 * The local configuration for WordPress containing the following configurations:
 * * MySQL settings
 * * Secret keys
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 * 
 *! GENERATE UNIQUE KEYS AND SALTS WITH
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */

define('AUTH_KEY',         '!ltsfn@lJRV|Yr!-ksUrq5=6(p@g+Z3cUm8eI2uEDC$4]7q.-24NQ|82!8m.77-,');
define('SECURE_AUTH_KEY',  'clX@KWgB%,_=F*-=M.sp?ue,0rF-NLviAN4cIp9sn%|rsK4fc_(.?R/cwSA6k&|I');
define('LOGGED_IN_KEY',    '.j0Cg+UMl+m9<8%|Y(|9g`KIm(-ruW[HyyL+D)lun`vR[]oMDS$7F{WT)|Q+-97?');
define('NONCE_KEY',        'FFiV1wUJ[k#yPJ-m5)Cfn<+A|u2:Yt:Wf]<E8..XLFH|K0wK+v1/sJ34R#e+}~Yf');
define('AUTH_SALT',        '1XK{s^:yJz++&/Qb>`:LbSjGrqFHplL(ifb=~/(IJD,[rnE6Y@3`Qi}Kr6Vj`5?P');
define('SECURE_AUTH_SALT', 'e$<7`Il(HhOR1$ETsXNB~T0K?85[vQ|Ea*Q.c)Hd4 3C4vfrz6{q$6HP>&aC=4$j');
define('LOGGED_IN_SALT',   '0I)s/-S@<~uH|Z:2X/!I=OBiAs]*5-dLx8d.0x>wx$Re2~@!Zs-_][ No.U@Cal`');
define('NONCE_SALT',       'oqTS^C*N3bQvL=J#+x jA-v/FZC?Rifg}B[=pcFnf#S1rv&,e$H}*e|3OIw2Qh|a');

//* ARRAY OF LOCAL CONSTANTS 
$CONSTANTS = [
  'DB_HOST'            => 'localhost',
  'DB_NAME'            => 'main',
  'DB_USER'            => 'root',
  'DB_PASSWORD'        => '',
  'DB_CHARSET'         => 'utf8',
  'DB_COLLATE'         => '',
  'WP_MEMORY_LIMIT'    => '64M',
  'WP_POST_REVISIONS'  => true
]; 

//! THAT'S ALL, STOP EDITING! HAPPY BLOGGING!

foreach ( $CONSTANTS as $CONSTANT => $X )
  define( $CONSTANT, $X );