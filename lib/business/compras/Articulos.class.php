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
**        Registro de Articulos Formulario AmlRegart                     **
**                                                                       **
**************************************************************************/
	/**
	 * Función para registrar artículos
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
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
/**************************************************************************
**           Fin Registro de Articulos Formulario AmlRegart              **
**                                                                       **
**************************************************************************/	    
	    
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

/**************************************************************************
**           Inicio Grabar Despachos Formulario Almdesp                  **
**                       Desireé Martínez                                **
**************************************************************************/				
/**
	 * Función Principal para guardar datos del formulario Almdesp
	 * TODO Esta función (y todas las demás de su clase) deben retornar un
	 * código de error para validar cualquier problema al guardar los datos.
	 *  
	 * @static
	 * @param $despacho Object Despacho a guardar
	 * @param $grid Array de Objects Articulos. 
	 * @return void 
	 */
    public static function salvarAlmdesp($despacho,$grid){
      self::Grabar_Despacho($despacho,$grid);			
    }
	
/**
	 * Función para Registrar Despachos
	 *  
	 * @static
	 * @param $despacho Object Despacho a guardar
	 * @param $grid Array de Objects Articulos. 
	 * @return void 
	 */   
    public static function Grabar_Despacho($despacho,$grid){	
	  	//Se graba el Despacho		
	  $despacho->save();
	
		// Se graban los articulos del despacho
	  self::Grabar_DespachoArticulos($despacho,$grid);
	  if (self::Actualizar_articulos($despacho,$grid,&$msj))
	  {
    	self::Actualizar_ArticulosRequision($despacho,$grid);
	  }
    }	

/**
	 * Función para registrar el despacho de los articulos 
	 *  
	 * @static
	 * @param $despacho Object Despacho a guardar
	 * @param $grid Array de Objects Articulos. 
	 * @return void 
	 */   
    public static function Grabar_DespachoArticulos($despacho,$grid){
	  $coddph=$despacho->getDphart();
	  $x=$grid[0];		
		  $j=0;	
		  while ($j<count($x)) 
		  {
		    $c = new Criteria();		  
		    $detalle = CaartdphPeer::doSelectOne($c);
		    if ($detalle)
		    {
		  	  $detalle->setDphart($coddph);
		  	  $detalle->setCodart($x[$j]->getCodart());
		  	  $detalle->setCodcat($x[$j]->getCodcat());
		  	  $detalle->setCandph($x[$j]->getCanreq());
		  	  $detalle->setCandev($x[$j]->getCanrec());
		  	  $detalle->setMontot($x[$j]->getMontot());
		  	  $detalle->setCodfal($x[$j]->getRelart());
		      return true;
		    }									
			$detalle->save();
		    $j++;			
		  }     
  }    

    
/**
	 * Función para  Actualizar los articulos
	 *  
	 * @static
	 * @param $despacho Object Despacho a guardar
	 * @param $grid Array de Objects Articulos. 
	 * @return void 
	 */   
    public static function Actualizar_Articulos($despacho,$grid,&$msj)
    {
       $calmacen=$despacho->getCodalm();
       $dalmacen=$despacho->getNomalm();      
	   $x=$grid[0];		
		  $j=0;		  
		  while ($j<count($x))
		  {
		    $codarti=$x[$j]->getCodart();
		    $dart=$x[$j]->getDesart();
		    $cantd=$x[$j]->getCanreq();
		     if (($codarti!="") and ($cantd>0))
		     {
		  	   $c = new Criteria();
		  	   $c->add(CaregartPeer::CODART,$codarti);
		       $arti = CaregartPeer::doSelectOne($c);
		        if ($arti)
		        {
		    	  $tipoart=$arti->getTipo();		    	
		    	  return true;
		    	  
		    	   if ($tipoart='A')
		    	   {
		       	     $arti->setExitot($arti->setExitot() - $cantd);
		       	     return true;
		       	     		       	 
		       	     $c = new Criteria();
		  	         $c->add(CaartalmPeer::CODART,$codarti);
		  	         $c->add(CaartalmPeer::CODALM,$calmacen);
		             $alm = CaartalmPeer::doSelectOne($c); 
		              if ($alm)
		              {
		    		    if($alm->getExiact()>=$cantd)
		    		    {
		         	      $alm->setExiact($alm->setExiact() - $cantd);		         	  
		         	      return true;
		    		    }
		    		    else 
		    	        { 
                          $msj='No Existe Disponibilidad Suficiente en el almacén'.$dalmacen.'para el Articulo'.$dart.'.';                                        		    		
		    		      return false;
		                 }
		               } 
		            }
		            else
		            {
		             $msj='El Articulo'.$dart.'no esta definido en el Almacén'.$dalmacen.'.';
		             return false;
		            }
		         }
		      }
		     else
		     {
		       $msj='El Articulo'.$dart.'no esta definido en el Almacén'.$dalmacen.'.';
		       return false;
		     }
	   $arti->save();
	   $alm->save();
		
		    $j++;			
		  }
   }

/**
	 * Función para Actualizar los articulos por Requision 
	 *  
	 * @static
	 * @param $despacho Object Despacho a guardar
	 * @param $grid Array de Objects Articulos. 
	 * @return void 
	 */   
    public static function Actualizar_ArticulosRequision($despacho,$grid){
	  $requi=$despacho->getReqart();  
      $x=$grid[0];		
		  $j=0;		  
		  while ($j<count($x)) {
		  $codarti=$x[$j]->getCodart();		  
		  $cantd=$x[$j]->getCanreq();
		  $codcate=$x[$j]->getCodcat();
		    if (($codarti!="") and ($cantd>0))
		    {
		  	  $c = new Criteria();
		  	  $c->add(CaartreqPeer::REQART,$requi);
		      $c->add(CaartreqPeer::CODART,$codarti);
		      $c->add(CaartreqPeer::CODCAT,$codcate);
	          $reqarti = CaartreqPeer::doSelectOne($c); 
	           if ($reqarti)
	           {
		  	     $reqarti->setCanrec($reqarti->setCanrec + $cantd);		         	  
		         return true;
	           }
	           else 
	           {
	           return false;
		       }
		    }									
			$reqarti->save();
		    $j++;			
		  }      	
    }
	/**
	 * Función Principal para validar datos del formulario Almdesp
	 *  
	 * @static
	 * @param $despacho Object Despacho a guardar
	 * @param $grid Array de Objects Articulos. 
	 * @return void 
	 */
 /**   public static function validarAlmdesp($despacho,$grid) {
      return self::validarDphart($despacho);
    }
	    
	/**
	 * Función Principal para validar datos del formulario Almregart
	 *  
	 * @static
	 * @param $articulo Object Artículo a guardar
	 * @return void 
	 */	 
/**	public static function validarDphart($despacho)
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
    }*/


/**************************************************************************
**           Fin Grabar Despachos Formulario Almdesp                  **
**                       Desireé Martínez                                **
**************************************************************************/	    
				
    }