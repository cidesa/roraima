<?php

/**
 * Subclass for representing a row from the 'faforpag' table.
 *
 *
 *
 * @package lib.model
 */
class Faforpag extends BaseFaforpag
{
	protected $obj = array();
	protected $destippag="";
	protected $nomcue="";

  public function getDestippag()
  {
   return Herramientas::getX('ID','Fatippag','Destippag',self::getTippag());
  }

  public function getNomcue()
  {
  	$valor="";
  	$c= new Criteria();
  	$c->add(TsdefbanPeer::NUMCUE,self::getNomban());
  	$reg= TsdefbanPeer::doSelectOne($c);
  	if ($reg)
  	{
      $valor=$reg->getNomcue();
  	}
  	else
  	{
  	 $e= new Criteria();
  	 $e->add(FabancosPeer::CODBAN,self::getNomban());
  	 $regi= FabancosPeer::doSelectOne($e);
  	 if ($regi)
  	 {
  	 	$valor=$regi->getNomban();
  	 }
  	}

   return $valor;
  }
}
