<?php
if(defined('SF_ROOT_DIR')){
  if(file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php'))
    include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php');

  if(file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'XlsReader/XlsReader.class.php'))
    include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'XlsReader/XlsReader.class.php');
}else{
  define('SF_ROOT_DIR',    realpath(dirname(__FILE__).'/..'));
}

$auxdir = implode("/",explode("/",SF_ROOT_DIR,-1));
define('CIDESA_CONFIG', $auxdir."/".'configurations');
define('CIDESA_CONFIG_NAME', 'configurations');

$sf_symfony_lib_dir  = dirname(__FILE__).'/../lib/symfony';
$sf_symfony_data_dir = dirname(__FILE__).'/../data/symfony';

