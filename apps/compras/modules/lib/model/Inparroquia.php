<?php

/**
 * Subclass for representing a row from the 'inparroquia'.
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
class Inparroquia extends BaseInparroquia
{

  protected $nommun = "";
  protected $nomedo = "";
  protected $nompar = "";
  protected $municipio= "";

  public function __toString()
  {
    return $this->nompar;
  }

  protected function afterHydrate()
  {
    $municipio = $this->getInmunicipio();
    if($municipio){
      $estado = $municipio->getInestado();
      if($estado) $this->nomedo = $estado->getNomedo();
      else $this->nomedo = "";
      $this->nommun = $municipio->getNommun();
    }else{
      $this->nomedo = "";
      $this->nommun = "";
    }

  }

}

