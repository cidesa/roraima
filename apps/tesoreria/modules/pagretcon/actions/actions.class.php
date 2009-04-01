<?php

/**
 * pagretcon actions.
 *
 * @package    siga
 * @subpackage pagretcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagretconActions extends autopagretconActions
{
  public  $coderror1=-1;

  public function validateEdit()
  {
    if(($this->getRequest()->getMethod() == sfRequest::POST) && ($this->getRequestParameter('id')==""))
    {
      $this->opretcon = $this->getOpretconOrCreate();
      $this->updateOpretconFromRequest();

      $c= new Criteria();
      $c->add(OpretconPeer::CODNOM,$this->opretcon->getCodnom());
      $c->add(OpretconPeer::CODCON,$this->opretcon->getCodcon());
      //$c->add(OpretconPeer::CODTIP,$this->opretcon->getCodtip());
      $resul= OpretconPeer::doSelectOne($c);
      if ($resul)
      {	$this->coderror1=509;}
      else { $this->coderror1=-1;}

      if ($this->coderror1<>-1)
      {return false; }
      else return true;
    }else return true;
  }

  public function executeEdit()
  {
    $this->opretcon = $this->getOpretconOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpretconFromRequest();

      $this->saveOpretcon($this->opretcon);

      $this->opretcon->setId(self::obtenerId($this->opretcon->getCodnom(),$this->opretcon->getCodcon(),$this->opretcon->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagretcon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagretcon/list');
      }
      else
      {
        return $this->redirect('pagretcon/edit?id='.$this->opretcon->getId());
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
    $this->opretcon = $this->getOpretconOrCreate();
    $this->updateOpretconFromRequest();

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

  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
    {
      $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
      $c= new Criteria();
      $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
      $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
      $resul= NpasiconnomPeer::doSelect($c);
      if (!$resul)
      {	$dato2='N';}
      else{ $dato2='';}
      $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["pertenece","'.$dato2.'",""]]';
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else if ($this->getRequestParameter('ajax')=='3')
    {
      $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }

  public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(OpretconPeer::CODNOM,$dato1);
    $c->add(OpretconPeer::CODCON,$dato2);
    $c->add(OpretconPeer::CODTIP,$dato3);
  	$resul= OpretconPeer::doSelectOne($c);
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
