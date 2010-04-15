<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'bnreginm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
