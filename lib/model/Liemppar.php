<?php

/**
 * Subclass for representing a row from the 'liemppar'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Liemppar.php 32428 2009-09-02 04:18:52Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
