<?php

/**
 * Subclass for representing a row from the 'liasplegcrieva'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Liasplegcrieva.php 32428 2009-09-02 04:18:52Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Liasplegcrieva extends BaseLiasplegcrieva
{
  protected $objrecaudos=array();
  protected $deslic = '';
  protected $destiplic = '';
  protected $fecreglic='';
  protected $nompro='';
  protected $seleccionado=false;
  protected $codrec='';
  protected $desrec='';

  public function afterHydrate()
  {
    $this->nompro=Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
    $lireglic = $this->getLireglic();
    $lirecaud = $this->getLirecaud();

    if($lireglic)
    {
      $this->deslic = $lireglic->getDeslic();
      $this->fecreglic = date('d/m/Y',strtotime($lireglic->getFecreg()));
      $litiplic = $lireglic->getLitiplic();
	  if ($litiplic) $this->destiplic = $litiplic->getDestiplic();
    }

    if($lirecaud)
    {
      $this->codrec = $lirecaud->getCodRec();
      $this->desrec = $lirecaud->getDesRec();
    }
  }
}
