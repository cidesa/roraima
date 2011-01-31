<?php

/**
 * oycdefdivpai actions.
 *
 * @package    Roraima
 * @subpackage oycdefdivpai
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefdivpaiActions extends autooycdefdivpaiActions
{
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcpaisFromRequest()
	{
		$ocpais = $this->getRequestParameter('ocpais');

		if (isset($ocpais['codpai']))
	    {
	      $this->ocpais->setCodpai(str_pad($ocpais['codpai'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($ocpais['nompai']))
	    {
	      $this->ocpais->setNompai($ocpais['nompai']);
	    }
    }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->ocpais = OcpaisPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocpais);

    $c= new Criteria();
    $c->add(OcestadoPeer::CODPAI,$this->ocpais->getCodpai());
    $reg= OcestadoPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteOcpais($this->ocpais);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->getRequest()->setError('delete', 'No Puede Eliminar el País. Existen Registros Asociados.');
      return $this->forward('oycdefdivpai', 'list');
    }

    return $this->redirect('oycdefdivpai/list');
  }
}
