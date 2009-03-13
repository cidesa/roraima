<?php

/**
 * Subclass for representing a row from the 'npdefcpt' table.
 *
 *
 *
 * @package lib.model
 */
class Npdefcpt extends BaseNpdefcpt
{	protected $objnominas=array();
	public function getestado()
	{
		if (($this->getConact())=='S')
			return 'Activo';
		else
 		   return 'Inactivo';
  	}

public function getNompar(){

    return Herramientas::getX('codpar','Nppartidas','nompar',self::getCodpar());

  }

  public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }

}
