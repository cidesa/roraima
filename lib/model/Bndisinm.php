<?php

/**
 * Subclass for representing a row from the 'bndisinm'.
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
class Bndisinm extends BaseBndisinm
{
  public function getDesinm()
  {
    return Herramientas::getX('CODINM','Bnreginm','Desinm',self::getCodmue());
   }

  public function getDesubiori()
  {
    return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodubiori());
   }

  public function getDesubides()
  {
    return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodubides());
   }

   public function getDesmot(){

    return Herramientas::getX('codmot','Bnmotdis','desmot',self::getMotdisinm());

  }

  public function getIdrefer()
  {
    $numerocomprobante="ACI".substr(self::getNrodisinm(),-5,10);
    return Herramientas::getX_vacio('reftra','contabc','id',$numerocomprobante);
  }

}
