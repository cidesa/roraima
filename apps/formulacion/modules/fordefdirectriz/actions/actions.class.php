<?php

/**
 * fordefdirectriz actions.
 *
 * @package    Roraima
 * @subpackage fordefdirectriz
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefdirectrizActions extends autofordefdirectrizActions
{
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefdirecFromRequest()
	{
		$fordefdirec = $this->getRequestParameter('fordefdirec');

		if (isset($fordefdirec['coddir']))
		{
	      $this->fordefdirec->setCoddir(str_pad($fordefdirec['coddir'],3,'0',STR_PAD_LEFT));
	    }
	    if (isset($fordefdirec['desdir']))
	    {
	      $this->fordefdirec->setDesdir($fordefdirec['desdir']);
	    }
 	 }	
}
