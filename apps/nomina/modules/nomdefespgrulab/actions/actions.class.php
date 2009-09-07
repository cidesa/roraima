<?php

/**
 * nomdefespgrulab actions.
 *
 * @package    Roraima
 * @subpackage nomdefespgrulab
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespgrulabActions extends autonomdefespgrulabActions
{
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpgrulabFromRequest()
	{
		$npgrulab = $this->getRequestParameter('npgrulab');

		if (isset($npgrulab['codgrulab']))
		{
      		$this->npgrulab->setCodgrulab(str_pad($npgrulab['codgrulab'],4,'0',STR_PAD_LEFT));
   		}
    	if (isset($npgrulab['desgrulab']))
   		{
      		$this->npgrulab->setDesgrulab($npgrulab['desgrulab']);
        }
  }	
}
