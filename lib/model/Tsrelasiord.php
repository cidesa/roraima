<?php

/**
 * Subclass for representing a row from the 'tsrelasiord'.
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
class Tsrelasiord extends BaseTsrelasiord
{
  protected $obj=array();
  protected $mascaracta = "";
  protected $loncta = 0;

  public function getDescta()
  {
    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtagasxpag());
  }

  public function getDescta2()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtaordxpag());
  }
}
