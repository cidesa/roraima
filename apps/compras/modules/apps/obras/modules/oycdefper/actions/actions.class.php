<?php

/**
 * oycdefper actions.
 *
 * @package    Roraima
 * @subpackage oycdefper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefperActions extends autooycdefperActions
{
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
	 	$dato=OcdefperPeer::getNomper(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 else if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=OctipcarPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 else if ($this->getRequestParameter('ajax')=='3')
	 {
	 	$dato=OctipproPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

	 }
	 else if ($this->getRequestParameter('ajax')=='4')
	 {
	 	$dato=OctipperPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }

  protected function deleteOcdefper($ocdefper)
  {
  	if (Herramientas::getX_vacio('CedPer','OCProPer','CedPer',$ocdefper->getCedper())=='')
  	{
    	$ocdefper->delete();
  	}

  }

}
