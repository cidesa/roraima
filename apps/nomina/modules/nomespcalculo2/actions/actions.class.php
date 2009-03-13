<?php

/**
 * nomespcalculo actions.
 *
 * @package    siga
 * @subpackage nomespcalculo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
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
