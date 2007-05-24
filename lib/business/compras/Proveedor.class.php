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
      //self::Grabar_Recaudosproveedor($caprovee);
    }
	

/**
	 * Función para registrar Proveedor
	 *  
	 * @static
	 * @param $caprovee Object Proveedor a guardar	 
	 * @return void 
	 */   
    public static function Grabar_Proveedor($caprovee){			
	  $caprovee->save();	
    }

   	/**
	 * Función para registrar un Beneficiario
	 *  
	 * @static
	 * @param $caprovee Object Beneficiario a guardar	 
	 * @return void 
	 */   
    public static function Grabar_Beneficiario($caprovee){
        //$caprovee = $this->getRequestParameter('caprovee');
        
        $c = new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$caprovee->getRifpro());
        $opbenefi = OpbenefiPeer::doSelectOne($c) ;
        if (isset($opbenefi))
        {
    	  $opbenefi->setNitben($caprovee->getNitpro());
        }
        else
        {
    	  $opbenefi = new Opbenefi();
        }       
          $codtipben = Herramientas::getxLike('destipben','optipben','codtipben','%PROVEEDOR%');
                  
          $opbenefi->setcodtipben($codtipben);
	      $opbenefi->setCedrif($caprovee->getRifpro());
	      $opbenefi->setNitben($caprovee->getNitpro());
	      $opbenefi->setDirben($caprovee->getDirpro());
	      $opbenefi->setTelben($caprovee->getTelpro());
	      $opbenefi->setCodcta($caprovee->getCodcta());
	      $opbenefi->setCodord($caprovee->getCodord());
	      $opbenefi->setCodpercon($caprovee->getCodpercon());
	      $opbenefi->setCodctasec($caprovee->getCodctasec());
	      $opbenefi->setCodordadi($caprovee->getCodordadi());
	      $opbenefi->setCodperconadi($caprovee->getCodperconadi());
	      $opbenefi->setCodpercontra($caprovee->getCodordcontra());
	      $opbenefi->setCodpercontra($caprovee->getCodpercontra());	      

	    $opbenefi->save();
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
