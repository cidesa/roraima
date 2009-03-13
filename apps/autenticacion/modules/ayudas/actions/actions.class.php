<?php

/**
 * ayudas actions.
 *
 * @package    siga
 * @subpackage ayudas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class ayudasActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->menu = $this->getRequestParameter('m','');

    $this->m = Herramientas::obtenerMenuAyuda($this->menu);

    $this->ayuda = sfConfig::get('app_ayuda');

    //print_r(array_values($this->m));

  }


}
