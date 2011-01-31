<?php

/**
 * Subclass for representing a row from the 'tsdefchequera'.
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
class Tsdefchequera extends BaseTsdefchequera
{
	protected $canche="";

    public function afterHydrate()
    {
      $this->canche=self::getNumchehas()-self::getNumchedes()+1;
	}
}
