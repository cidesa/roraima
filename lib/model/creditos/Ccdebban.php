<?php

/**
 * Subclass for representing a row from the 'ccdebban' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdebban extends BaseCcdebban
{
	protected $cccueban_id=0;
	protected $ccbanco_id=0;
	protected $codemp="";

	public function getCccuebanId(){
		return $this->cccueban_id;
	}

	public function setCccuebanId($val){
		$this->cccueban_id=$val;
	}

	public function getCcbancoId(){
		return $this->ccbanco_id;
	}

	public function setCcbancoId($val){
		$this->ccbanco_id=$val;
	}

}
