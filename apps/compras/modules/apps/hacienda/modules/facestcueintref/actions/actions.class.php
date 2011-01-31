<?php

/**
 * facestcueintref actions.
 *
 * @package    Roraima
 * @subpackage facestcueintref
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class facestcueintrefActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->forward('default', 'module');
  }
}
