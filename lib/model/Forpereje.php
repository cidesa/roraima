<?php

/**
 * Subclass for representing a row from the 'forpereje'.
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
class Forpereje extends BaseForpereje
{
	private $monpar = '';
	private $porcen = '';
	
	public function setMonpar($val){
		
		$this->monpar = $val;
	}
	
	public function getMonpar(){
		
		return $this->monpar;
	}
	
	public function setPorcen($val){
		
		$this->porcen = $val;
	}
	
	public function getPorcen($val=true){
		
		if($val) return number_format($this->porcen,2,',','.');
		else return $this->porcen;	
	}
	
	
}
