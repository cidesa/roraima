<?php

// include project configuration
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

if($so == 'Windows')
{
  // symfony bootstraping para Windows
  require_once($sf_symfony_lib_dir.'\util\sfCore.class.php');
}
else
{
  // symfony bootstraping para Linux
  require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
}

sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);

