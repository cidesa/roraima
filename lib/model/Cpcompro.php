<?php

/**
 * Subclass for representing a row from the 'cpcompro'.
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
class Cpcompro extends BaseCpcompro
{
	protected $obj = array();
	protected $check = "";
	protected $check2 = "";
    protected $nompro = "";

  public function afterHydrate(){
    $this->nompro = Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getCedrif());

  }
  public function getRefmov()
  {
    return self::getRefcom();
  }


}
