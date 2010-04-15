<?php

/**
 * nomespcalculo actions.
 *
 * @package    Roraima
 * @subpackage nomespcalculo
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class nomespcalculoActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
  }
  
public function executeProcesar()
  {
  	$this->procesados = "El Calculo de Nomina Fue Realizado";
  }
}
