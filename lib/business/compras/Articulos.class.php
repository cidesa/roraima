<?php

/**
 * Clase para el Manejo de Artículos
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
class Articulos
{
/**************************************************************************
**         Grid de la Requisición Formulario AmlReq                      **
**                       Jaime Suárez                                    **
**************************************************************************/
	/**
	 * Función para registrar la Requisición
	 *
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen.
	 * @return void
	 */
	public static function salvarAlmreqart($requisicion,$grid){
    	self::Grabar_Requisicion($requisicion,$grid);
    }
    
	public static function Grabar_Requisicion($requisicion,$grid)
	{
		//Se graba el Artículo
		$requisicion->save();

		// Se graban los almacenes del articulo
		self::Grabar_DetallesRequisicion($requisicion,$grid);
	}

	/**
	 * Función para registrar los artículos en los diferentes Alamacenes
	 *
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen.
	 * @return void
	 */
	public static function Grabar_DetallesRequisicion($requisicion,$grid){
		$reqart=$requisicion->getReqart();
		$x=$grid[0];
		$j=0;
		while ($j<count($x)) {
			$x[$j]->setReqart($reqart);
			$Codcat=$x[$j]->getCodcat();
			$x[$j]->setCodcat($Codcat);
				
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

		}
	}
/**************************************************************************
**           Fin Grid de la Requisición Formulario AmlReq                **
**                       Jaime Suárez                                    **
**************************************************************************/	
	
	/**
	 * Función pculo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen. 
	 * @return void 
	 */   
    public static function Grabar_Articulo($articulo,$grid){	
	  	//Se graba el Artículo		
	  $articulo->save();
	
		// Se graban los almacenes del articulo
	  self::Grabar_ArticulosAlmacen($articulo,$grid);
    }

   	/**
	 * Función para registrar los artículos en los diferentes Alamacenes 
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen. 
	 * @return void 
	 */   
    public static function Grabar_ArticulosAlmacen($articulo,$grid){
	  $codart=$articulo->getCodart();
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
		
	  }
    } 
			
	/**
	 * Función Principal para guardar datos del formulario Almregart
	 * TODO Esta función (y todas las demás de su clase) deben retornar un
	 * código de error para validar cualquier problema al guardar los datos.
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @param $grid Array de Objects Almacen. 
	 * @return void 
	 */
    public static function salvarAlmregart($articulo,$grid){
      self::Grabar_Articulo($articulo,$grid);			
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

