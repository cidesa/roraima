<?php

/**
 * oycdefuni actions.
 *
 * @package    Roraima
 * @subpackage oycdefuni
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefuniActions extends autooycdefuniActions
{
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcunidadFromRequest()
		{
			$ocunidad = $this->getRequestParameter('ocunidad');

			if (isset($ocunidad['coduni']))
			{
				$this->ocunidad->setCoduni(str_pad($ocunidad['coduni'], 4, '0', STR_PAD_LEFT));
			}
			if (isset($ocunidad['desuni']))
			{
				$this->ocunidad->setDesuni($ocunidad['desuni']);
			}
			if (isset($ocunidad['abruni']))
			{
				$this->ocunidad->setAbruni($ocunidad['abruni']);
			}
		}

	protected function getOcunidadOrCreate($id = 'id')
		{
			if (!$this->getRequestParameter($id))
			{
				$ocunidad = new Ocunidad();
			}
		    else
		    {
		    	$ocunidad = OcunidadPeer::retrieveByPk($this->getRequestParameter($id));

		    	$this->forward404Unless($ocunidad);
		    }
		    return $ocunidad;
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
	 	$dato=OcunidadPeer::getDesuni(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOcunidad($ocunidad)
  {
  	if (Herramientas::getX_vacio('coduni','ocdefpar','coduni',$ocunidad->getCoduni())=='')
    {
    	$ocunidad->delete();
    }
  }

}
