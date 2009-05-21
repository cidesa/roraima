<?php

/**
 * ingdefpai actions.
 *
 * @package    siga
 * @subpackage ingdefpai
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdefpaiActions extends autoingdefpaiActions
{

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
