<?php

/**
 * fordefstatus actions.
 *
 * @package    Roraima
 * @subpackage fordefstatus
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefstatusActions extends autofordefstatusActions
{
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefstaFromRequest()
	{
		$fordefsta = $this->getRequestParameter('fordefsta');

		if (isset($fordefsta['codsta']))
    {
      $this->fordefsta->setCodsta(str_pad($fordefsta['codsta'], 2, '0', STR_PAD_LEFT));
    }
    if (isset($fordefsta['dessta']))
    {
      $this->fordefsta->setDessta($fordefsta['dessta']);
    }
  }	
}
