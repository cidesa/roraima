<?php

/**
 * Subclass for representing a row from the 'nppresoc' table.
 *
 *
 *
 * @package lib.model
 */
class Nppresoc extends BaseNppresoc
{
	protected $capitalizacion='';


  public function getNomemp()
  {
	return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
  }

  public function getCedemp()
   {
	return Herramientas::getX('CODEMP','Nphojint','Cedemp',self::getCodemp());
  }

  public function getFeccalpres()
   {
	if (self::getFeccal()) {return date("d/m/Y",strtotime(self::getFeccal()));}
  }

  public function getMesinicio()
   {
	return 4;
  }

  public function getFecing()
  {
 		$c = new Criteria();
	  	$c->add(NpasiempcontPeer::CODEMP,self::getCodemp());
	    $datos = NpasiempcontPeer::doSelectOne($c);
	    if ($datos)
	    {
	       return date("d/m/Y",strtotime($datos->getFeccal()));
	    }
	    else
	    {
			$cr = new Criteria();
		  	$cr->add(NphojintPeer::CODEMP,self::getCodemp());
		    $resul = NphojintPeer::doSelectOne($cr);
		    if ($resul)
				return date("d/m/Y",strtotime($resul->getFecing()));
		    else
		        return "";
	    }
  }

  public function getDestipcon()
  {
	return Herramientas::getX('CODTIPCON','Nptipcon','DesTipCon',self::getCodcon());
  }

  public function getDiaserra()
  {
   	return Herramientas::getX_vacio('CODEMP','Nppresocant','diaser',self::getCodemp());
  }
  public function getMesserra()
  {
   	return Herramientas::getX_vacio('CODEMP','Nppresocant','messer',self::getCodemp());
  }
  public function getAnoserra()
  {
   	return Herramientas::getX_vacio('CODEMP','Nppresocant','anoser',self::getCodemp());
  }

}
