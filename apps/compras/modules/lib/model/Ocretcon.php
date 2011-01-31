<?php

/**
 * Subclass for representing a row from the 'ocretcon'.
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
class Ocretcon extends BaseOcretcon
{
 // private $factor = '';
 // protected $basimp;

  public function getDestip()
  {
  return Herramientas::getX('CODTIP','Octipret','Destip',self::getCodtip());
  }

  public function getBasimp()
  {
  return Herramientas::getX('CODTIP','Octipret','Basimp',self::getCodtip());
  }

  public function getUnitri()
  {
  return Herramientas::getX('CODTIP','Octipret','unitri',self::getCodtip());
  }

  public function getPorsus()
  {
  return Herramientas::getX('CODTIP','Octipret','Porsus',self::getCodtip());
  }

  public function getStamon()
  {
  return Herramientas::getX('CODTIP','Octipret','stamon',self::getCodtip());
  }

  /*public function setFactor($v)
  {

    if ($this->factor !== $v) {
        $this->factor = Herramientas::toFloatdecimal($v,4);
        $this->modifiedColumns[] = OctipretPeer::FACTOR;
      }
	}

  public function getFactor($val=false)
  {
    if($val) return number_format($this->factor,4,',','.');
    else return $this->factor;
  }*/

}
