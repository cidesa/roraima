<?php

/**
 * Subclass for representing a row from the 'lireglic' table.
 *
 *
 *
 * @package lib.model
 */
class Lireglic extends BaseLireglic
{
  protected $objhistorial=array();
  protected $numsol = '';
  protected $dessol = '';
  protected $coduniste='';
  protected $desuniste='';

  public function getNomext()
  {
    return Herramientas::getX('CODFIN','Fortipfin','nomext',self::getCodfin());
  }

    public function getDesclacomp()
  {
    return Herramientas::getX('CODCLACOMP','Occlacomp','desclacomp',self::getCodclacomp());
  }


  public function afterHydrate()
 {

    $liregsol = $this->getLiregsol();

    if($liregsol)
    {
      $this->numsol = $liregsol->getNumsol();
      $this->dessol = $liregsol->getDessol();
      $lidatste = $liregsol->getLidatste();
	  if($lidatste)
	    {
	      $this->coduniste = $lidatste->getCoduniste();
	      $this->desuniste = $lidatste->getDesuniste();
	    }
    }

  }
}
