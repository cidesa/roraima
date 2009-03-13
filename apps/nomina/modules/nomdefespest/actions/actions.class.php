<?php

/**
 * nomdefespest actions.
 *
 * @package    siga
 * @subpackage nomdefespest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespestActions extends autonomdefespestActions
{
  public  $coderror1=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->npestado = $this->getNpestadoOrCreate();
      $this->updateNpestadoFromRequest();
      $c= new Criteria();
      $c->add(NpestadoPeer::CODPAI,$this->npestado->getCodpai());
      $c->add(NpestadoPeer::CODEDO,$this->npestado->getCodedo());
      $resul= NpestadoPeer::doSelect($c);
      if ($resul)
      {
      	$this->coderror1=409;
      	return false;
      }
      return true;
    }else return true;
  }

  public function executeEdit()
  {
    $this->npestado = $this->getNpestadoOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpestadoFromRequest();

      $this->saveNpestado($this->npestado);

      $this->npestado->setId(self::obtenerId($this->npestado->getCodpai(),$this->npestado->getCodedo()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespest/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespest/list');
      }
      else
      {
        return $this->redirect('nomdefespest/edit?id='.$this->npestado->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npestado = $this->getNpestadoOrCreate();
    $this->updateNpestadoFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('',$err);
      }
    }

    return sfView::SUCCESS;
  }

  public function executeDelete()
  {
    $this->npestado = NpestadoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npestado);

    $id=$this->getRequestParameter('id');
    $c=new Criteria();
    $c->add(NpciudadPeer::CODPAI,$this->npestado->getCodpai());
    $c->add(NpciudadPeer::CODEDO,$this->npestado->getCodedo());
    $dato=NpciudadPeer::doSelect($c);
    if (!$dato)
    {
      $this->deleteNpestado($this->npestado);
    }
    else
    {
      $this->setFlash('notice','El Estado no puede ser eliminado, ya que se encuentra asociado a un Ciudad');
      return $this->redirect('nomdefespest/edit?id='.$id);
    }
    return $this->redirect('nomdefespest/list');
  }

  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $ajax = $this->getRequestParameter('ajax');

    switch ($ajax){
      case '1':
        $dato=NppaisPeer::getNompai($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'"]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	 $this->tags=Herramientas::autocompleteAjax('CODPAI','Nppais','CODPAI',$this->getRequestParameter('npestado[codpai]'));
	}
  }

protected function updateNpestadoFromRequest()
  {
    $npestado = $this->getRequestParameter('npestado');

    if (isset($npestado['codpai']))
    {
    $this->npestado->setCodpai(str_pad($npestado['codpai'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($npestado['codedo']))
    {
      $this->npestado->setCodedo($npestado['codedo']);
    }
    if (isset($npestado['nomedo']))
    {
      $this->npestado->setNomedo($npestado['nomedo']);
    }
  }

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(NpestadoPeer::CODPAI,$dato1);
  	$c->add(NpestadoPeer::CODEDO,$dato2);
  	$resul= NpestadoPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }

}
