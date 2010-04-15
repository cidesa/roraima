<?php

/**
 * Subclass for representing a row from the 'lireglic'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
