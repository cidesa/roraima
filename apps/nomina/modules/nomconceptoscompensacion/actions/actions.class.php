<?php

/**
 * nomconceptoscompensacion actions.
 *
 * @package    siga
 * @subpackage nomconceptoscompensacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomconceptoscompensacionActions extends autonomconceptoscompensacionActions
{
  public $coderror=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->npconcomp = $this->getNpconcompOrCreate();
      $this->updateNpconcompFromRequest();

      $c= new Criteria();
      $c->add(NpconcompPeer::CODNOM,$this->npconcomp->getCodnom());
      $c->add(NpconcompPeer::CODCON,$this->npconcomp->getCodcon());
      $result=NpconcompPeer::doSelectOne($c);
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
    $this->npconcomp = $this->getNpconcompOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconcompFromRequest();

      $this->saveNpconcomp($this->npconcomp);

      $this->npconcomp->setId(self::obtenerId($this->npconcomp->getCodnom(),$this->npconcomp->getCodcon()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomconceptoscompensacion/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomconceptoscompensacion/list');
      }
      else
      {
        return $this->redirect('nomconceptoscompensacion/edit?id='.$this->npconcomp->getId());
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
    $this->npconcomp = $this->getNpconcompOrCreate();
    $this->updateNpconcompFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('npconcomp{codcon}',$err);
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
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconcomp[codnom]'));
	    }
	}

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(NpconcompPeer::CODNOM,$dato1);
  	$c->add(NpconcompPeer::CODCON,$dato2);
  	$resul= NpconcompPeer::doSelectOne($c);
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
