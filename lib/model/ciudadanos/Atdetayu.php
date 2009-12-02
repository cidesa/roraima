<?php

/**
 * Subclase para representar una fila de la tabla 'atdetayu'.
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
class Atdetayu extends BaseAtdetayu
{
  protected $aprobado = '';
  protected $codgru = '';
  protected $desgru = '';

  protected $coddon = '';
  protected $desdon = '';
  protected $totapr = 0.0;

  public function afterHydrate(){

    $atdonaciones = $this->getAtdonaciones();

    if($atdonaciones){


      $this->coddon = $atdonaciones->getCoddon();
      $this->desdon = $atdonaciones->getDesdon();


    }

  }

  public function getTotapr()
  {
    return H::FormatoMonto($this->precio * $this->canapr);
  }

}
