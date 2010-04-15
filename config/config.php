<?php
if(file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php'))
  include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php');

if(file_exists(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'XlsReader/XlsReader.class.php'))
  include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'XlsReader/XlsReader.class.php');



//$so = 'Windows';
$so = 'Linux';
$auxdir = implode("/",explode("/",SF_ROOT_DIR,-1));
define('CIDESA_CONFIG', $auxdir."/".'configurations');
define('CIDESA_CONFIG_NAME', 'configurations');
if($so == 'Linux')
{
  // directorios symfony para Linux
  $sf_symfony_lib_dir  = '/usr/share/php/symfony';
  $sf_symfony_data_dir = '/usr/share/php/data/symfony';

}
else
{
  // directorios symfony para windows
  $sf_symfony_lib_dir  = 'C:\AppServ\php5\pear\symfony';
  $sf_symfony_data_dir = 'C:\AppServ\php5\pear\data\symfony';
}
