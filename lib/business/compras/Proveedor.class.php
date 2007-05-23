<?php

/**
 * Clase para el Manejo de Proveedor
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 * 
 */
class Proveedor
{

	/**
	 * Función Principal para guardar datos del formulario Almregpro
	 * TODO Esta función (y todas las demás de su clase) deben retornar un
	 * código de error para validar cualquier problema al guardar los datos.
	 *  
	 * @static
	 * @param $caprovee Object Proveedor-Benficiario-Recaudos a guardar	 
	 * @return void 
	 */
    public static function salvarAlmregpro($caprovee)
    {
      self::Grabar_Proveedor($caprovee);			
      self::Grabar_Beneficiario($caprovee);
      self::Grabar_Recaudosproveedor($caprovee);
    }
	

/**
	 * Función para registrar Proveedor
	 *  
	 * @static
	 * @param $caprovee Object Proveedor a guardar	 
	 * @return void 
	 */   
    public static function Grabar_Proveedor($caprovee){	
	  	//Se graba el proveedor		
	  $caprovee->save();
	
		// Se graban el beneficiario
	  //self::Grabar_Beneficiario($caprovee);
    }

   	/**
	 * Función para registrar los artículos en los diferentes Alamacenes 
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen. 
	 * @return void 
	 */   
    public static function Grabar_Beneficiario($articulo){
	/*  $codart=$articulo->getCodart();
	  $x=$grid[0];		
		  $j=0;	
		  while ($j<count($x)) {
			$x[$j]->setCodart($codart);
			$codubi=$x[$j]->getCodubi();
			$x[$j]->setCodubi(str_pad($codubi, 20 , ' '));
							
			$x[$j]->save();
		    $j++;			
		  }
      $z=$grid[1];		  
      $j=0;
      if ($z[$j]) {
		while ($j<count($z)) {											
			$z[$j]->delete();				
		$j++;
		}
		
	  }*/
    } 
			


  
	/**
	 * Función Principal para validar datos del formulario Almregart
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen. 
	 * @return void 
	 */
    public static function validarAlmregart($articulo,$grid) {
      return self::validarCodart($articulo);
    }
	    
	/**
	 * Función Principal para validar datos del formulario Almregart
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @return void 
	 */
	public static function validarCodart($articulo)
	{
       	$codart=$articulo->getCodart();
       	if (strlen(trim($codart))<4)
       	{
       		return 2;
       	}
        
	  	Herramientas::FormarCodigoPadre($codart,&$nivelcodigo,&$ultimo);  	  		
	  	  if (!(Herramientas::buscar_codigo_padre($ultimo))){
	  	  	If ($nivelcodigo == 0){
	  	  		return 1;
	  	  	} else return -1;	
	  	  }else return -1;
	    }
    }


