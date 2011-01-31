<?php

/**
 * Subclass for representing a row from the 'occiudad'.
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
class Occiudad extends BaseOcciudad
{
       public function __toString()
  {
    return $this->codciu;
  }

	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
	public function getNomedo()
	{
		return Herramientas::getX('codedo','ocestado','nomedo',self::getCodedo());
	}

  public static function getCiudades($pais='',$estado='')
  {
    $t= new Criteria();
    $t->add(OcciudadPeer::CODPAI,$pais);
    $t->add(OcciudadPeer::CODEDO,$estado);
    $e = OcciudadPeer::doSelect($t);
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodciu()] = $esta->getNomciu();
      }
      return $resp;
    }else return array();
  }
}
