<?php

/**
 * Subclass for representing a row from the 'fordefniv'.
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
class Fordefniv extends BaseFordefniv
{
  private $nomemp = '';  
	
  public function setNomemp($val)
  {
	$this->nomemp = $val;		
  }
	
  public function getNomemp()
  {
	return $this->nomemp;		
  }
}
 
