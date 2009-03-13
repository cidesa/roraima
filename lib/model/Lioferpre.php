<?php

/**
 * Subclass for representing a row from the 'lioferpre' table.
 *
 *
 *
 * @package lib.model
 */
class Lioferpre extends BaseLioferpre
{
  protected $objpartidas=array();
  protected $deslic = '';
  protected $destiplic = '';
  protected $fecreglic='';
  protected $nompro='';
  protected $seleccionado=false;
  protected $despar='';

  public function afterHydrate()
  {
    $this->despar=Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
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
