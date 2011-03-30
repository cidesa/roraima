<?php

/**
 * Subclass for representing a row from the 'lireglic'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Lireglic.php 42741 2011-02-23 20:29:20Z cramirez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Lireglic extends BaseLireglic
{
  protected $objhistorial=array();
  protected $nompro = '';
  protected $coduniste='';
  protected $desuniste='';

  public function getNomext()
  {
    return Herramientas::getX('CODFIN','Fortipfin','nomext',self::getCodfin());
  }

    public function getDesclacomp()
  {
    return Herramientas::getX('CODCLACOMP','Occlacomp','desclacomp',self::getCodclacomp());
  }

  public function getNompro()
  {
    return Herramientas::getX('numemo','Limemoran','nompro',$this->numemo);
  }

  public function getCoduniste()
  {
    return Herramientas::getX('numemo','Limemoran','coduniste',$this->numemo);
  }
  public function getDesuniste()
  {
    return Herramientas::getX('coduniste','Lidatste','desuniste',self::getCoduniste());
  }

}
