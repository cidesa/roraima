<?php

/**
 * ingtipcli actions.
 *
 * @package    Roraima
 * @subpackage ingtipcli
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingtipcliActions extends autoingtipcliActions
{

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateIntipcliFromRequest()
	{
		$intipcli = $this->getRequestParameter('intipcli');

		if (isset($intipcli['codtipcli']))
	    {
	      $this->intipcli->setCodtipcli(str_pad($intipcli['codtipcli'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intipcli['destipcli']))
	    {
	      $this->intipcli->setDestipcli($intipcli['destipcli']);
	    }
    }

}
