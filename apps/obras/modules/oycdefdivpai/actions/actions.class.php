<?php

/**
 * oycdefdivpai actions.
 *
 * @package    siga
 * @subpackage oycdefdivpai
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefdivpaiActions extends autooycdefdivpaiActions
{
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
