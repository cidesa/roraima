<?php

/**
 * Subclass for representing a row from the 'faciudad'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faciudad.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faciudad extends BaseFaciudad
{
  protected $nomedo = "";
  protected $nompai = "";
  public function __toString()
  {
    return $this->despar;
  }

  protected function afterHydrate()
  {
    $estado = $this->getFaestado();
    if($estado){
      $pais = $estado->getFapais();
      if($pais) $this->nompai = $pais->getNompai();
      else $this->nompai = "";
      $this->nomedo = $estado->getNomedo();
    }else{
      $this->nompai = "";
      $this->nomedo = "";
    }

  }

    public function getPaisId()
    {
  	    return Herramientas::getX('ID','Faestado','fapais_id',self::getFaestadoId());
    }

}
