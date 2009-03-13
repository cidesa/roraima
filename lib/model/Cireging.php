<?php

/**
 * Subclass for representing a row from the 'cireging' table.
 *
 *
 *
 * @package lib.model
 */
class Cireging extends BaseCireging
{
   protected $grid= array();
   protected $destipmov="";
   protected $numcue="";
   protected $destip="";
   protected $nomcue="";
   protected $tipmov="";



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

}
