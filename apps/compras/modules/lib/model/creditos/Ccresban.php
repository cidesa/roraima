<?php

/**
 * Subclass for representing a row from the 'ccresban' table.
 *
 *
 *
 * @package lib.model
 */
class Ccresban extends BaseCcresban
{
	protected $ccperparamo_id=0;
	protected $archivo="";
    protected $objpagos=array();

	public function getCcperparamoId(){
		return $this->ccperparamo_id;
	}
	public function setCcperparamoId($val){
		$this->ccperparamo_id=$val;
	}

}
