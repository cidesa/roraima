<?php

/**
 * nomconceptossueldo actions.
 *
 * @package    siga
 * @subpackage nomconceptossueldo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomconceptossueldoActions extends autonomconceptossueldoActions
{
  public $coderror=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->npconsueldo = $this->getNpconsueldoOrCreate();
      $this->updateNpconsueldoFromRequest();

      $c= new Criteria();
      $c->add(NpconsueldoPeer::CODNOM,$this->npconsueldo->getCodnom());
      $c->add(NpconsueldoPeer::CODCON,$this->npconsueldo->getCodcon());
      $result=NpconsueldoPeer::doSelectOne($c);
      if ($result)
      {
      	$this->coderror=406;
      	return false;
      }
     return true;
    }else return true;
  }

 public function executeEdit()
  {
    $this->npconsueldo = $this->getNpconsueldoOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconsueldoFromRequest();

      $this->saveNpconsueldo($this->npconsueldo);

      $this->npconsueldo->setId(self::obtenerId($this->npconsueldo->getCodnom(),$this->npconsueldo->getCodcon()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomconceptossueldo/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomconceptossueldo/list');
      }
      else
      {
        return $this->redirect('nomconceptossueldo/edit?id='.$this->npconsueldo->getId());
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
    $this->npconsueldo = $this->getNpconsueldoOrCreate();
    $this->updateNpconsueldoFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('npconsueldo{codcon}',$err);
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
	  		$dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }else
	  if ($this->getRequestParameter('ajax')=='2')
	    {
	  	  $d= new Criteria();
	  		$d->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigo'));
	  		$resul=NpdefcptPeer::doSelectOne($d);
	  		if ($resul)
	  		{
	  		  $c= new Criteria();
	  		  $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
	  		  $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
	  	      $data=NpasiconnomPeer::doSelectOne($c);
	  		  if ($data)
	  		  {
	  		   $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
	  		   $existe='N';
	  		  }
	  		  else
	  		  {
	  		   $dato="";
	  		   $existe='S';
	  		  }
	  		}
	  		else
	  		{ $existe='SS'; $dato="";}

            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["existe","'.$existe.'",""]]';

	  	}
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconsueldo[codnom]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npconsueldo[codcon]'));
	    }
	}

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(NpconsueldoPeer::CODNOM,$dato1);
  	$c->add(NpconsueldoPeer::CODCON,$dato2);
  	$resul= NpconsueldoPeer::doSelectOne($c);
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
