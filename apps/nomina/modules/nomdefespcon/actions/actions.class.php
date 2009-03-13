<?php

/**
 * nomdefespcon actions.
 *
 * @package    siga
 * @subpackage nomdefespcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespconActions extends autonomdefespconActions
{

public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=NppartidasPeer::getNompar($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeEdit()
	{
		$this->npdefcpt = $this->getNpdefcptOrCreate();
		$this->formato= Herramientas::getMascaraPartida();
		$this->longitud=strlen($this->formato);

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpdefcptFromRequest();

			$this->saveNpdefcpt($this->npdefcpt);

            $this->npdefcpt->setId(Herramientas::getX_vacio('codcon','npdefcpt','id',$this->npdefcpt->getCodcon()));

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomdefespcon/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomdefespcon/list');
			}
			else
      {
        return $this->redirect('nomdefespcon/edit?id='.$this->npdefcpt->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 protected function saveNpdefcpt($npdefcpt)
  {
    Nomina::salvarNomdefespcon($npdefcpt);

  }


	protected function updateNpdefcptFromRequest()
	{
		$npdefcpt = $this->getRequestParameter('npdefcpt');
		$this->formato= Herramientas::getMascaraPartida();
		$this->longitud=strlen($this->formato);

	if (isset($npdefcpt['codcon']))
    {
      $this->npdefcpt->setCodcon(str_pad($npdefcpt['codcon'],3,0,STR_PAD_LEFT));
    }
    if (isset($npdefcpt['nomcon']))
    {
      $this->npdefcpt->setNomcon($npdefcpt['nomcon']);
    }
    if (isset($npdefcpt['codpar']))
    {
      $this->npdefcpt->setCodpar($npdefcpt['codpar']);
    }
    if (isset($npdefcpt['nompar']))
    {
      $this->npdefcpt->setNompar($npdefcpt['nompar']);
    }
    if (isset($npdefcpt['opecon']))
    {
      $this->npdefcpt->setOpecon($npdefcpt['opecon']);
    }
    if (isset($npdefcpt['conact']))
    {
      $this->npdefcpt->setConact($npdefcpt['conact']);
    }
    if (isset($npdefcpt['impcpt']))
    {
      $this->npdefcpt->setImpcpt($npdefcpt['impcpt']);
    }
    if (isset($npdefcpt['inimon']))
    {
      $this->npdefcpt->setInimon($npdefcpt['inimon']);
    }
    if (isset($npdefcpt['acuhis']))
    {
      $this->npdefcpt->setAcuhis($npdefcpt['acuhis']);
    }
    if (isset($npdefcpt['ordpag']))
    {
      $this->npdefcpt->setOrdpag($npdefcpt['ordpag']);
    }
    if (isset($npdefcpt['afepre']))
    {
      $this->npdefcpt->setAfepre($npdefcpt['afepre']);
    }
  }

  public function executeDelete()
  {
    $this->npdefcpt = NpdefcptPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npdefcpt);

    $id=$this->getRequestParameter('id');
    $c= new Criteria();
    $c->add(NpasiconempPeer::CODCON,$this->npdefcpt->getCodcon());
    $dato=NpasiconempPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteNpdefcpt($this->npdefcpt);
    }
    else
    {
      $this->setFlash('notice','No puede eliminar el concepto, se encuentra asociado a un empleado.');
      return $this->redirect('nomdefespcon/edit?id='.$id);
    }

    return $this->redirect('nomdefespcon/list');
  }
}
