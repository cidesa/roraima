<?php

/**
 * Subclass for representing a row from the 'licalvan' table.
 *
 *
 *
 * @package lib.model
 */
class Licalvan extends BaseLicalvan
{
  protected $objempresas=array();
  protected $deslic = '';
  protected $destiplic = '';
  protected $fecreglic='';
  protected $nompro='';

  public function afterHydrate()
  {
    $this->nompro=Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
    $lireglic = $this->getLireglic();

    if($lireglic)
    {
      $this->deslic = $lireglic->getDeslic();
      $this->fecreglic = date('d/m/Y',strtotime($lireglic->getFecreg()));
      $litiplic = $lireglic->getLitiplic();
	  if ($litiplic) $this->destiplic = $litiplic->getDestiplic();
    }
  }
}
