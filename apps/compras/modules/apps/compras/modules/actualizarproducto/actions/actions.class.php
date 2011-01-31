<?php

/**
 * importarproducto actions.
 *
 * @package    Roraima
 * @subpackage importarproducto
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class actualizarproductoActions extends sfActions
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
  	$this->procesados = true;
  }
}
