<?php

/**
 * Subclass for representing a row from the 'liasptecanalis' table.
 *
 *
 *
 * @package lib.model
 */
class Liasptecanalis extends BaseLiasptecanalis
{
  protected $objcriterios=array();
  protected $deslic = '';
  protected $destiplic = '';
  protected $fecreglic='';
  protected $nompro='';
  protected $seleccionado=false;
  protected $codcri='';
  protected $descri='';
  protected $puntajeeval='';

  public function afterHydrate()
  {
    $this->nompro=Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
    $lireglic = $this->getLireglic();
    $liaspteccrieva = $this->getLiaspteccrieva();

    if($lireglic)
    {
      $this->deslic = $lireglic->getDeslic();
      $this->fecreglic = date('d/m/Y',strtotime($lireglic->getFecreg()));
      $litiplic = $lireglic->getLitiplic();
	  if ($litiplic) $this->destiplic = $litiplic->getDestiplic();
    }

    if($liaspteccrieva)
    {
      $this->codcri = $liaspteccrieva->getCodcri();
      $this->descri = $liaspteccrieva->getDescri();
      $this->puntajeeval = $liaspteccrieva->getPuntaje();
    }
  }
}
