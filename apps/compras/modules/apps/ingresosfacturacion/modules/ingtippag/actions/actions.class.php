<?php

/**
 * ingtippag actions.
 *
 * @package    Roraima
 * @subpackage ingtippag
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingtippagActions extends autoingtippagActions
{
/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateIntippagFromRequest()
	{
		$intippag = $this->getRequestParameter('intippag');

		if (isset($intippag['codtippag']))
	    {
	      $this->intippag->setCodtippag(str_pad($intippag['codtippag'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intippag['destippag']))
	    {
	      $this->intippag->setDestippag($intippag['destippag']);
	    }
    }


}
