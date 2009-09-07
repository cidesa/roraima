<?php

/**
 * Subclass for representing a row from the 'cppagos'.
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
class Cppagos extends BaseCppagos
{
	protected $reflib = '';
	protected $numcue = '';


  public function afterHydrate(){
    $this->reflib = Herramientas::getX('refpag','tsmovlib','reflib',self::getRefpag());
    $this->numcue = Herramientas::getX('refpag','tsmovlib','numcue',self::getRefpag());

  }


  public function getRefmov()
  {
    return self::getRefpag();
  }
}
