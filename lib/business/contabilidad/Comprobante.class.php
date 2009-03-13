<?php

/**
 * Clase para el manejo de las Opciones del Grid
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
class Comprobante
{
  private $grabar = '';
  private $reftra = '';
  private $numcom = '';
  private $fectra = '';
  private $destra = '';
  private $ctas = "";
  private $desc = "";
  private $tipmov= "";
  private $mov= "";
  private $error= "";
  private $msgerr= "";
  private $montos= 0;

  public function setGrabar($val){
    $this->grabar = $val;
  }

  public function getGrabar()
    {
    return $this->grabar;
    }

  public function setReftra($val){
    $this->reftra = $val;
  }

  public function getReftra()
    {
    return $this->reftra;
    }

  public function setNumcom($val){
    $this->numcom = $val;
  }

  public function getNumcom()
    {
    return $this->numcom;
    }

  public function setFectra($val){
    $this->fectra = $val;
  }

  public function getFectra()
    {
    return $this->fectra;
    }

   public function setDestra($val){
    $this->destra = $val;
  }

  public function getDestra()
    {
    return $this->destra;
    }

  public function setCtas($val){
    $this->ctas = $val;
  }

  public function getCtas()
    {
    return $this->ctas;
    }

  public function setDesc($val){
    $this->desc = $val;
  }

  public function getDesc()
    {
    return $this->desc;
    }

  public function setTipmov($val){
    $this->tipmov = $val;
  }

  public function getTipmov()
    {
    return $this->tipmov;
    }

  public function setMov($val){
    $this->mov = $val;
  }

  public function getMov()
    {
    return $this->mov;
    }

  public function setMontos($val){
    $this->montos = $val;
  }

  public function getMontos()
    {
    return $this->montos;
    }

  public function setError($val){
    $this->error = $val;
  }

  public function getError()
    {
    return $this->error;
    }

  public function setMsgerr($val){
    $this->msgerr = $val;
  }

  public function getMsgerr()
    {
    return $this->msgerr;
    }
}

?>
