<?php

/**
 * Subclase para representar una fila de la tabla 'atparroquias'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atparroquias extends BaseAtparroquias
{
  protected $desmun = "";
  protected $desest = "";
  public function __toString()
  {
    return $this->despar;
  }

  protected function afterHydrate()
  {
    $municipio = $this->getAtmunicipios();
    if($municipio){
      $estado = $municipio->getAtestados();
      if($estado) $this->desest = $estado->getDesest();
      else $this->desest = "";
      $this->desmun = $municipio->getDesmun();
    }else{
      $this->desest = "";
      $this->desmun = "";
    }

  }

}
