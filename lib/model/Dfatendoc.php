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

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $dftabtip = $this->getDftabtip();
    $this->tipdoc = $dftabtip->getTipdoc();

  }

  public function getAnuate()
  {

    $lista = Constantes::listaEstadoDocumento();

    return $lista[parent::getAnuate()];

  }

  public function getStaate()
  {

    $lista = Constantes::listaAtencion();

    return $lista[parent::getStaate()];

  }




}
