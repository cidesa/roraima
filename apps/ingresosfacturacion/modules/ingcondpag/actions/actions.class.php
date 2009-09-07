<?php

/**
 * ingcondpag actions.
 *
 * @package    Roraima
 * @subpackage ingcondpag
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingcondpagActions extends autoingcondpagActions
{
   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateIncondpagFromRequest()
	{
		$incondpag = $this->getRequestParameter('incondpag');

		if (isset($incondpag['codcond']))
	    {
	      $this->incondpag->setCodcond(str_pad($incondpag['codcond'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($incondpag['descond']))
	    {
	      $this->incondpag->setDescond($incondpag['descond']);
	    }
	    if (isset($incondpag['tipcond']))
	    {
	      $this->incondpag->setTipcond($incondpag['tipcond']);
	    }
	    if (isset($incondpag['diascond']))
	    {
	      $this->incondpag->setDiascond($incondpag['diascond']);
	    }
	    if (isset($incondpag['genord']))
	    {
	      $this->incondpag->setGenord($incondpag['genord']);
	    }

    }



}
