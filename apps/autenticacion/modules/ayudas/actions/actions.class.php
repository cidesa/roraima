<?php

/**
 * ayudas actions.
 *
 * @package    Roraima
 * @subpackage ayudas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
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
