<?php

/**
 * Subclass for performing query and update operations on the 'bnreginm' table.
 *
 *
 *
 * @package lib.model
 */
class BnreginmPeer extends BaseBnreginmPeer
{
  public static function getDesinm($codigo1,$codigo2)
  {
    return Herramientas::getXx('Bnreginm',array('CODACT','CODINM'),array(trim($codigo1),trim($codigo2)),'Desinm');
    //$codigo1." - ".$codigo2;//Herramientas::getXx('Bnreginm',array('CODACT','CODINM'),array(trim($codigo1),trim($codigo2)),'Desinm');
  }

  public static function getCodinm($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnreginm','codinm',trim($codigo));
  }

  public static function getCodact($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnreginm','Codinm',$codigo);
  }

  public static function getDescinm($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnreginm','Desinm',$codigo);
  }

  public static function getDescrinm($codigo1, $codigo2)
  {
	$c = new Criteria();
	$c->add(BnreginmPeer::CODACT,$codigo1);
	$c->add(BnreginmPeer::CODINM,$codigo2);
	$desc = BnreginmPeer::doSelectOne($c)->getDesinm();

	if(!$desc)
	{
	return '';
	}
	else
	{
	return $desc;
	}

  }



}
