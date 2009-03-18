<?php
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'adodb-time.inc.php');
//$so = 'Windows';
$so = 'Linux';
define('CIDESA_CONFIG', '../../configurations');
define('CIDESA_CONFIG_', '../configurations');
define('_CIDESA_CONFIG_', 'configurations');
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
