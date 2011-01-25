
<?php
$args = $GLOBALS['argv'];

if(count($args)<5) {
    throw new Exception('You must provide the hostname to test.');
}else{
  $hostname = $args[4];
  if(count($args)==6) $solo = $args[5];
  else $solo = 'all';
}

//////NECESITA LA VARIABLE DEL CON EL NOMBRE DE LA APP///////////////
$menu = sfYaml::load(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'menus'.DIRECTORY_SEPARATOR.$app.'.yml');

$reportes_root = SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'menus'.DIRECTORY_SEPARATOR;



$urls = $menu[$app]['opciones']['urls'] ;
$menu = $menu[$app]['menu'] ;

if(defined('CIDESA_CONFIG')) {
  if(file_exists(CIDESA_CONFIG))
    $reportes_root = CIDESA_CONFIG.'/';
  else{

    $app_yml = sfYaml::load(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'apps/autenticacion/config/app.yml');

    $reportes_root = $app_yml['all']['.apps']['reportes'];

    if(!file_exists($reportes_root)) $reportes_root = $_SERVER['PWD'].DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.$reportes_root;
    
  }

  $reportes = sfYaml::load($reportes_root.'reportes/reportes.yml');

  $reportes = $reportes[$app];

  if(isset($menu['Reportes'])) $menu['Reportes'] = $reportes;
}




 if(is_array($menu)){

  $mod = array();
  Herramientas::recorrerArreglo($menu,&$mod);

  foreach ($urls as $key => $u){
    if(array_key_exists($key, $mod)) unset($mod[$key]);
  }

//print_r($mod);
//print(count($mod));
//exit;

 }



