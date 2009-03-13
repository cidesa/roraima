<?php

/**
 * Subclass for representing a row from the 'opretord' table.
 *
 *
 *
 * @package lib.model
 */
class Opretord extends BaseOpretord
{
  private $check = '';
  private $fecemi = '';
  private $estaislr = '';
  private $esta1xmil = '';
  private $esta = '';

  public function setCheck($val)
  {
  $this->check = $val;
  }

  public function getCheck()
  {
  return $this->check;
  }

  public function setFecemi($val)
  {
  $this->fecemi = $val;
  }

  public function getFecemi()
  {
    return Herramientas::getX('NUMORD','Opordpag','Fecemi', self::getNumord());
  }

  public function getDestip()
  {
    return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
  }

    public function getNompre()
  {
    return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }

  public function setDestip($val)
  {
    $this->destip = $val;
  }

  public function getPorret()
  {
    return Herramientas::getX('CODTIP','Optipret','Porret',self::getCodtip());
  }

  public function setPorret($val)
  {
  $this->porret = $val;
  }

  public function getBasimp()
  {
    return Herramientas::getX('CODTIP','Optipret','Basimp',self::getCodtip());
  }

  public function setBasimp($val)
  {
    $this->basimp = $val;
  }

  public function getFactor()
  {
  	$valor=number_format(Herramientas::getX('CODTIP','Optipret','Factor',self::getCodtip()),4,',','.');
    return $valor;
  }

  public function setFactor($val)
  {
    $this->factor = $val;
  }

  public function getPorsus()
  {
    return Herramientas::getX('CODTIP','Optipret','Porsus',self::getCodtip());
  }

  public function setPorsus($val)
  {
  $this->porsus = $val;
  }

  public function getUnitri()
  {
    return Herramientas::getX('CODTIP','Optipret','Unitri',self::getCodtip());
  }

  public function setUnitri($val)
  {
  $this->unitri = $val;
  }

  public function getEstaislr()
  {
  return $this->estaislr;
  }

  public function setEstaislr($val)
  {
  $this->estaislr = $val;
  }

  public function setEsta1xmil($val)
  {
  $this->esta1xmil = $val;
  }

  public function getEsta1xmil()
  {
  return $this->esta1xmil;
  }

  public function setEsta($val)
  {
  $this->esta = $val;
  }

  public function getEsta()
  {
  return $this->esta;
  }

  public function setMontoret($val)
  {
  $this->montoret = $val;
  }

  public function getMontoret()
  {
  return $this->montoret;
  }
}
