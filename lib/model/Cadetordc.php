<?php

/**
 * Subclass for representing a row from the 'cadetordc'.
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
class Cadetordc extends BaseCadetordc
{
    protected $montot="0,00";

  public function afterHydrate()
  {
     $calc=$this->cancon*$this->moncon;

     $this->montot=number_format($calc,2,',','.');
  }
}
