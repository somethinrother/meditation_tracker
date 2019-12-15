<?php
  if($_ENV['PHP_DEVELOPMENT'] === true){
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', '127.0.0.1');
    define('DB_USERNAME', 'somethinrother');
    define('DB_PASSWORD', 'password');
    define('DB_NAME', 'meditation_tracker');
    
    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Check connection
    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
  } else {
    //Get Heroku ClearDB connection information
    $cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server   = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db       = substr($cleardb_url["path"],1);


    $active_group = 'default';
    $query_builder = TRUE;

    $db['default'] = array(
        'dsn'    => '',
        'hostname' => $cleardb_server,
        'username' => $cleardb_username,
        'password' => $cleardb_password,
        'database' => $cleardb_db,
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );
  }
?>
