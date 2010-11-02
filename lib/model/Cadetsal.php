<?php

/**
 * Subclass for representing a row from the 'cadetsal'.
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
class Cadetsal extends BaseCadetsal
{
  public function getDesart()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }
  public function getNomalm()
  {
	return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
  }
  public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

public function getNumlotxart()
  {
    $c = new Criteria();
    $c->add(CaartalmubiPeer::CODALM,self::getCodalm());
    $c->add(CaartalmubiPeer::CODUBI,self::getCodubi());
    $c->add(CaartalmubiPeer::CODART,self::getCodart());
    $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
    $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

    $datos = CaartalmubiPeer::doSelect($c);

    $lotes = array();

    foreach($datos as $obj_datos)
    {
     if ($obj_datos->getFecven()!="")
     {
        $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
     }
      else
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

    }
    return $lotes;
  }
 }
