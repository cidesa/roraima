<?php

/**
 * Subclass for representing a row from the 'npdefmov' table.
 *
 *
 *
 * @package lib.model
 */
class Npdefmov extends BaseNpdefmov
{
  private $monto = '';
  private $cantidad = '';
  //private $check = '';

  public function getNomnom()
  {
    return Herramientas::getX('codnom','Npnomina','nomnom',self::getCodnom());
  }

  public function getNomcon()
  {
    return Herramientas::getX('codcon','Npdefcpt','nomcon',self::getCodcon());
  }

  public function getMonto()
  {
	return $this->monto;
  }

  public function getCantidad()
  {
	return $this->cantidad;
  }

  public function setMonto($val)
  {
	$this->monto = $val;
  }

  public function setCantidad($val)
  {
	$this->cantidad = $val;
  }

 /*   public function getCheck()
  {
	return $this->check;
  }

  public function setCheck($val)
  {
	$this->check = $val;
  }*/


}
