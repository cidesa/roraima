<?php

/**
 * Subclass for representing a row from the 'liaspfinanalis'.
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
class Liaspfinanalis extends BaseLiaspfinanalis
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
    $liaspfincrieva = $this->getLiaspfincrieva();

    if($lireglic)
    {
      $this->deslic = $lireglic->getDeslic();
      $this->fecreglic = date('d/m/Y',strtotime($lireglic->getFecreg()));
      $litiplic = $lireglic->getLitiplic();
	  if ($litiplic) $this->destiplic = $litiplic->getDestiplic();
    }

    if($liaspfincrieva)
    {
      $this->codcri = $liaspfincrieva->getCodcri();
      $this->descri = $liaspfincrieva->getDescri();
      $this->puntajeeval = $liaspfincrieva->getPuntaje();
    }
  }
}
