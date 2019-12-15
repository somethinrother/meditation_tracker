<?php
  if(getenv('ENVIRONMENT') === 'development'){
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $db_hostname = getenv('DB_HOST');
    $db_username = getenv('DB_USER');
    $db_password = getenv('DB_PASS');
    $db_name = getenv('DB_NAME');
  } else {
    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db_hostname = $cleardb_url["host"];
    $db_username = $cleardb_url["user"];
    $db_password = $cleardb_url["pass"];
    $db_name = substr($cleardb_url["path"],1);


    $active_group = 'default';
    $query_builder = TRUE;

    $db['default'] = array(
        'dsn' => '',
        'hostname' => $db_hostname,
        'username' => $db_username,
        'password' => $db_password,
        'database' => $db_name,
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => FALSE,
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

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
  // Check connection
  if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>
