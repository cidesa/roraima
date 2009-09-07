<?php

/**
 * ingdefpai actions.
 *
 * @package    Roraima
 * @subpackage ingdefpai
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingdefpaiActions extends autoingdefpaiActions
{

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateInpaisFromRequest()
	{
		$inpais = $this->getRequestParameter('inpais');

		if (isset($inpais['codpai']))
	    {
	      $this->inpais->setCodpai(str_pad($inpais['codpai'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($inpais['nompai']))
	    {
	      $this->inpais->setNompai($inpais['nompai']);
	    }
    }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->inpais = InpaisPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->inpais);

    $c= new Criteria();
    $c->add(InestadoPeer::CODPAI,$this->inpais->getCodpai());
    $reg= InestadoPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteInpais($this->Inpais);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->getRequest()->setError('delete', 'No Puede Eliminar el País. Existen Registros Asociados.');
      return $this->forward('ingdefpai', 'list');
    }

    return $this->redirect('ingdefpai/list');
  }

}
