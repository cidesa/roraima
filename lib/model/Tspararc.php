<?php

/**
 * Subclass for representing a row from the 'tspararc'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Tspararc.php 34269 2009-10-26 21:21:50Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Tspararc extends BaseTspararc
{
  protected $archivo="";

  public function getNomcue()
  {
  return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
  }
}
