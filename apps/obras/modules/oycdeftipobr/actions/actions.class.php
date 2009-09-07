<?php

/**
 * oycdeftipobr actions.
 *
 * @package    Roraima
 * @subpackage oycdeftipobr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdeftipobrActions extends autooycdeftipobrActions
{
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOctipobrFromRequest()
  {
    $octipobr = $this->getRequestParameter('octipobr');

    if (isset($octipobr['codtipobr']))
    {
      $this->octipobr->setCodtipobr(str_pad($octipobr['codtipobr'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipobr['destipobr']))
    {
      $this->octipobr->setDestipobr($octipobr['destipobr']);
    }
  }	
}
