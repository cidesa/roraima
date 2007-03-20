<?php

$sg_len_reg = 32;

$so = 'Windows';
//$so = 'Linux';

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

