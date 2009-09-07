<?php

/**
 * Subclass for representing a row from the 'casolpag'.
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
class Casolpag extends BaseCasolpag
{
  protected $objeto=array();
  protected $mascarapre = "";
  protected $lonpre = 0;

  public function getNomext()
  {
  return Herramientas::getX('TIPCOM','Cpdoccom','Nomext',self::getTipcom());
  }

  public function getNomben()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

}
