<?php

	class Herramientas{

	function recorrerArreglo($carmodulo=array(),&$mod)
  	{

    foreach($carmodulo as $objmod ){


         if (is_array($objmod))
         {
        self::recorrerArreglo($objmod,&$mod);
         }
         else
       {
         $mod[]=$objmod;
       }
        }
  	}

	}
?>