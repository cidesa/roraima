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

}
