<?php

/**
 * Subclass for representing a row from the 'cireging'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cireging.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cireging extends BaseCireging
{
   protected $grid= array();
   protected $destipmov="";
   protected $numcue="";
   protected $destip="";
   protected $nomcue="";
   protected $tipmov="";
   protected $refere="";
   protected $blocfec="";
   protected $mansolocor="";



   public function getDestip()
	  {
	  	return Herramientas::getX('CODTIP','Citiping','Destip',self::getCodtip());
	  }

	public function getNomcon()
	  {
	  	return Herramientas::getX('RIFCON','Ciconrep','Nomcon',self::getRifcon());
	  }

	public function getNomcue()
	  {
	  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getCtaban());
	  }

	public function getNumcue()
	  {
	  	return Herramientas::getX('REFING','Cireging','Ctaban',self::getRefing());

	  }

	public function getDestipmov()
	  {
	  	return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
	  }

	public function getIdrefer()
      {
    	return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
      }

      public function getRefere()
      {
    	return self::getRefing();
      }
      
  public function getBlocfec()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('ingresos',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['ingresos']))
		     if(array_key_exists('ingreging',$varemp['aplicacion']['ingresos']['modulos'])){
		       if(array_key_exists('bloqfec',$varemp['aplicacion']['ingresos']['modulos']['ingreging']))
		       {
		       	$dato=$varemp['aplicacion']['ingresos']['modulos']['ingreging']['bloqfec'];
		       }
         }
     return $dato;
  }

  public function setBlocfec()
  {
  	return $this->blocfec;
  }
  
  public function getMansolocor()  
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('ingresos',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['ingresos']))
		     if(array_key_exists('ingreging',$varemp['aplicacion']['ingresos']['modulos'])){
		       if(array_key_exists('mansolocor',$varemp['aplicacion']['ingresos']['modulos']['ingreging']))
		       {
		       	$dato=$varemp['aplicacion']['ingresos']['modulos']['ingreging']['mansolocor'];
		       }
         }
     return $dato;
  }

  public function setMansolocor()
  {
  	return $this->mansolocor;
  }      

}
