<?php

/**
 * Subclass for representing a row from the 'liemppar' table.
 *
 *
 *
 * @package lib.model
 */
class Liemppar extends BaseLiemppar
{
  protected $objempresas=array();
  protected $deslic = '';
  protected $destiplic = '';
  protected $fecreglic='';

  public function getNompro()
  {
    return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }

  public function afterHydrate()
  {

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
