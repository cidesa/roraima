<?php

/**
 * Subclass for representing a row from the 'ocreglic'.
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
class Ocreglic extends BaseOcreglic
{
  protected $objhistorial=array();

  public function getDesobr()
  {
    return Herramientas::getX('CODOBR','Ocregobr','desobr',self::getCodobr());
  }

  public function getNomext()
  {
    return Herramientas::getX('CODFIN','Fortipfin','nomext',self::getCodfin());
  }

    public function getDesclacomp()
  {
    return Herramientas::getX('codclacomp','Occlacomp','desclacomp',self::getCodclacomp());
  }
}
