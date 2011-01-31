<?php

/**
 * inggruprub actions.
 *
 * @package    Roraima
 * @subpackage inggruprub
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class inggruprubActions extends autoinggruprubActions
{

    /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateIngruprubFromRequest()
	{
		$ingruprub = $this->getRequestParameter('ingruprub');

		if (isset($ingruprub['codgruprub']))
	    {
	      $this->ingruprub->setCodgruprub(str_pad($ingruprub['codgruprub'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($ingruprub['desgruprub']))
	    {
	      $this->ingruprub->setDesgruprub($ingruprub['desgruprub']);
	    }
    }


}
