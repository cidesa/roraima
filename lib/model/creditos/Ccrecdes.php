<?php

/**
 * Subclass for representing a row from the 'ccrecdes' table.
 *
 *
 *
 * @package lib.model
 */
class Ccrecdes extends BaseCcrecdes
{

  public function getNomrec(){
	  $ccrecaud = self::getCcrecaud();
	  if($ccrecaud){
	  	return $ccrecaud->getNomrec();
	  }else {
	  	return '';
	  }
  }

  public function getNumexp(){
     return self::getCccuades()->getCccredit()->getNumexp();
  }

  public function getNompar(){
     return self::getCccuades()->getCcpartid()->getNompar();
  }

  public function getNompro(){
     return self::getCccuades()->getCcprogra()->getNompro();
  }

  public function getOrddes(){
     return self::getCccuades()->getOrddes();
  }
}
