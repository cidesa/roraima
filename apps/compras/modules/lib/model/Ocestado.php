<?php

/**
 * Subclass for representing a row from the 'ocestado'.
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
class Ocestado extends BaseOcestado
{

  public function __toString()
  {
    return $this->codedo;
  }

	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}

 public static function getEstados($pais='')
  {
    $t= new Criteria();
    $t->add(OcestadoPeer::CODPAI,$pais);
    $e = OcestadoPeer::doSelect($t);
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodedo()] = $esta->getNomedo();
      }
      return $resp;
    }else return array();
  }
}
