<?php

/**
 * Subclass for representing a row from the 'dfatendoc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Dfatendoc extends BaseDfatendoc
{
  protected $tipdoc = '';
  protected $objitems = '';
  protected $check = false;

  public function afterHydrate(){

    $dftabtip = $this->getDftabtip();
    $this->tipdoc = $dftabtip->getTipdoc();

  }

  public function getAnuate()
  {

    $lista = Constantes::listaEstadoDocumento();
    return $lista[$this->anuate];

  }

  public function getStaate()
  {

    $lista = Constantes::listaAtencion();

    if(parent::getStaate()=="") return "";
    else  return $lista[parent::getStaate()];

  }




}
