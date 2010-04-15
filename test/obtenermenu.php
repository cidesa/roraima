
<?php
//////NECESITA LA VARIABLE DEL CON EL NOMBRE DE LA APP///////////////
$menu = sfYaml::load(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'menus'.DIRECTORY_SEPARATOR.$app.'.yml');

$menu = $menu[$app]['menu'] ;

 if(is_array($menu)){

  $mod = array();
  Herramientas::recorrerArreglo($menu,&$mod);


//      foreach($menu as $confkey => $confval){
//          $carmodulo = array();
//          foreach($menu[$confkey] as $key => $val){
//            $carmodulo[]=$val;
//        }
//      }
 }

//print_r($mod);exit;



