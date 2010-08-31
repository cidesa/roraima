<?php

/**
 * Subclass for representing a row from the 'ocmunici'.
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
class Ocmunici extends BaseOcmunici
{
  public function __toString()
  {
    return $this->codmun;
  }

	public function getNompai()
	{
		return Herramientas::getX('codpai','ocpais','nompai',self::getCodpai());
	}
	public function getNomedo()
	{
		return Herramientas::getX('codpai','ocestado','nomedo',self::getCodedo());
	}

 public static function getMunicipios($pais='',$estado='', $ciudad='')
  {
    $t= new Criteria();
    $t->add(OcmuniciPeer::CODPAI,$pais);
    $t->add(OcmuniciPeer::CODEDO,$estado);
    $t->add(OcmuniciPeer::CODCIU,$ciudad);
    $e = OcmuniciPeer::doSelect($t);
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodmun()] = $esta->getNommun();
      }
      return $resp;
    }else return array();
  }
}
