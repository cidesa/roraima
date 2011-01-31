<?php
   //
/**
 * activarconceptos actions.
 *
 * @package    Roraima
 * @subpackage activarconceptos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class activarconceptosActions extends autoactivarconceptosActions
{
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdefcptFromRequest()
	{
		$npdefcpt = $this->getRequestParameter('npdefcpt');

		/*if (isset($npdefcpt['codcon']))
		{
			$this->npdefcpt->setCodcon($npdefcpt['codcon']);
		}
		if (isset($npdefcpt['nomcon']))
    {
      $this->npdefcpt->setNomcon($npdefcpt['nomcon']);
    }*/
    //if (isset($npdefcpt['estados']))
   //{
      $this->npdefcpt->setConact($this->getRequestParameter('radio1'));
    //}
  }	
}
