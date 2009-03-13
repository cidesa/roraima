<?php

/**
 * Subclass for representing a row from the 'iningprof' table.
 *
 *
 *
 * @package lib.model
 */
class Iningprof extends BaseIningprof
{

	protected $codtipsol="";
    protected $destipsol="";


 public function afterHydrate(){
 	$tipsol=$this->getIntipsol();
 	if ($tipsol)
 	{
      $this->codtipsol=$tipsol->getCodtipsol();
      $this->destipsol=$tipsol->getDestipsol();
 	}
 }

}
