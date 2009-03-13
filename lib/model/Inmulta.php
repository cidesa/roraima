<?php

/**
 * Subclass for representing a row from the 'inmulta' table.
 *
 *
 *
 * @package lib.model
 */
class Inmulta extends BaseInmulta
{
    protected $codsan="";
    protected $dessan="";


 public function afterHydrate(){
 	$sancion=$this->getInsancion();
 	if ($sancion)
 	{
      $this->codsan=$sancion->getCodsan();
      $this->dessan=$sancion->getDessan();
 	}
 }

}
