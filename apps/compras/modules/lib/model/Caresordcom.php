<?php

/**
 * Subclass for representing a row from the 'caresordcom'.
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
class Caresordcom extends BaseCaresordcom
{
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,3,',','.');
    else return $this->canord;

  }
 
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v,3);
        $this->modifiedColumns[] = CaresordcomPeer::CANORD;
      }
  
	} 


}
