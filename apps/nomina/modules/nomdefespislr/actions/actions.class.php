<?php

/**
 * nomdefespislr actions.
 *
 * @package    siga
 * @subpackage nomdefespislr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespislrActions extends autonomdefespislrActions
{
  public  $coderror1=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->npislr = $this->getNpislrOrCreate();
      $this->updateNpislrFromRequest();
      $c= new Criteria();
      $c->add(NpislrPeer::CODNOM,$this->npislr->getCodnom());
      $c->add(NpislrPeer::CODCONPOR,$this->npislr->getCodconpor());
      $c->add(NpislrPeer::CODCONIMP,$this->npislr->getCodconimp());
      $resul= NpislrPeer::doSelectOne($c);
      if ($resul)
      {
      	$this->coderror1=407;
      	return false;
      }
      return true;
    }else return true;
  }

  public function executeEdit()
  {
    $this->npislr = $this->getNpislrOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpislrFromRequest();

      $this->saveNpislr($this->npislr);

      $this->npislr->setId(self::obtenerId($this->npislr->getCodnom(),$this->npislr->getCodconpor(),$this->npislr->getCodconimp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespislr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespislr/list');
      }
      else
      {
        return $this->redirect('nomdefespislr/edit?id='.$this->npislr->getId());
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
    $this->npislr = $this->getNpislrOrCreate();
    $this->updateNpislrFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('npislr{codnom}',$err);
      }
    }

    return sfView::SUCCESS;
  }

  public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(NpislrPeer::CODNOM,$dato1);
  	$c->add(NpislrPeer::CODCONPOR,$dato2);
  	$c->add(NpislrPeer::CODCONIMP,$dato3);
  	$resul= NpislrPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }

 public function executeAjax()
  {
	$cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
    		$dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
		break;
      case '2':
			$dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
		break;
     }
  }


  public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npislr[codnom]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npislr[codconpor]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='3')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npislr[codconimp]'));
	    }

	}

}
