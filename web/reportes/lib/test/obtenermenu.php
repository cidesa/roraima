<?php
		$opciones = Yaml::load("../../lib/bd/databases.yml");
		$dir = $opciones['siga']['dir'];
		$menu=Yaml::load($dir."/config/compras.yml");
		if(isset($menu)){

      	foreach($menu as $confkey => $confval){
      	  $carmodulo = array();



    	  foreach($menu[$confkey] as $key => $val){
    	    if (strtolower($key)==strtolower('reportes'))
      	    {
        		$carmodulo[]=$val;
        	 }
        		}
        	}
 		}
		$mod = array();





