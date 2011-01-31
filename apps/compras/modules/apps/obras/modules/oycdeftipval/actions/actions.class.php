<?php

/**
 * oycdeftipval actions.
 *
 * @package    Roraima
 * @subpackage oycdeftipval
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdeftipvalActions extends autooycdeftipvalActions
{
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOctipvalFromRequest()
  {
    $octipval = $this->getRequestParameter('octipval');

    if (isset($octipval['codtipval']))
    {
      $this->octipval->setCodtipval(str_pad($octipval['codtipval'],2,'0',STR_PAD_LEFT));
    }
    if (isset($octipval['destipval']))
    {
      $this->octipval->setDestipval($octipval['destipval']);
    }
    if (isset($octipval['nomabr']))
    {
      $this->octipval->setNomabr($octipval['nomabr']);
    }
  }	
}
