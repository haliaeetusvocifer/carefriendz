<?php

/* 
 * @CODOLICENSE
 */

defined('IN_CODOF') or die();

$installed=true;

function get_codo_db_conf() {


    $config = array (
  'driver' => 'mysql',
  'host' => 'localhost',
  'database' => 'codoforum',
  'username' => 'root',
  'password' => '@shegs04',
  'prefix' => '',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
);

    return $config;
}

$DB = get_codo_db_conf();

$CONF = array (
    
  'driver' => 'Custom',
  'UID'    => '58329fe8cafe0',
  'SECRET' => '58329fe8cb019',
  'PREFIX' => ''
);
