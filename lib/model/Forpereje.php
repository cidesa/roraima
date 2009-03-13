<?php

/**
 * Subclass for representing a row from the 'forpereje' table.
 *
 * 
 *
 * @package lib.model
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
