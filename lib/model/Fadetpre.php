<?php

/**
 * Subclass for representing a row from the 'fadetpre' table.
 *
 *
 *
 * @package lib.model
 */
class Fadetpre extends BaseFadetpre
{
	protected $obj = array();
    protected $desart="";
	protected $canord="0,00";
	protected $candes="0,00";
	protected $canaju="0,00";
	protected $cantot="0,00";
	protected $preart="0,00";
	protected $precioe="0,00";
	protected $totart2="0,00";

  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getCanord()
  {
  	$val=self::getCansol();
    return $val;
  }

  public function getCantot()
  {
  	$val=self::getCansol();
    return $val;
  }

  public function getPreart()
  {
  	$val=self::getPrecio();
    return $val;
  }

  public function getTotart2()
  {
  	$val=self::getPrecio() * self::getCansol();
  	$valor=number_format($val, 2, ',', '.');
    return $valor;
  }

   public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=number_format(self::getPrecio(), 2, ',', '.');
    }
  }


}
