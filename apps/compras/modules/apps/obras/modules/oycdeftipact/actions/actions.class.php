<?php

/**
 * oycdeftipact actions.
 *
 * @package    Roraima
 * @subpackage oycdeftipact
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdeftipactActions extends autooycdeftipactActions
{
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOctipactFromRequest()
  {
    $octipact = $this->getRequestParameter('octipact');

    if (isset($octipact['codtipact']))
    {
      $this->octipact->setCodtipact(str_pad($octipact['codtipact'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipact['destipact']))
    {
      $this->octipact->setDestipact($octipact['destipact']);
    }
  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctipactPeer::getDestipact(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOctipact($octipact)
  {
   	Obras::Borrar_Octipact($octipact);
  }

}
