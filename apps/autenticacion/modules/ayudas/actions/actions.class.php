<?php

/**
 * ayudas actions.
 *
 * @package    Roraima
 * @subpackage ayudas
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 * @version    SVN: $Id:actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
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
