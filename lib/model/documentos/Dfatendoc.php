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

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $dftabtip = $this->getDftabtip();
    $this->tipdoc = $dftabtip->getTipdoc();

  }

  public function getAnuate()
  {

    $lista = Constantes::listaEstadoDocumento();

    if(parent::getAnuate()=="") return "";
    else return $lista[parent::getAnuate()];

  }

  public function getStaate()
  {

    $lista = Constantes::listaAtencion();

    if(parent::getStaate()=="") return "";
    else  return $lista[parent::getStaate()];

  }




}
