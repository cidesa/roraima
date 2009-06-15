<?php

/**
 * nomdefespciu actions.
 *
 * @package    siga
 * @subpackage nomdefespciu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespciuActions extends autonomdefespciuActions
{
  public  $coderror1=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->npciudad = $this->getNpciudadOrCreate();
      $this->updateNpciudadFromRequest();
      $c= new Criteria();
      $c->add(NpciudadPeer::CODPAI,$this->npciudad->getCodpai());
      $c->add(NpciudadPeer::CODEDO,$this->npciudad->getCodedo());
      $c->add(NpciudadPeer::CODCIU,$this->npciudad->getCodciu());
      $resul= NpciudadPeer::doSelect($c);
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
    $this->npciudad = $this->getNpciudadOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpciudadFromRequest();

      $this->saveNpciudad($this->npciudad);

      $this->npciudad->setId(self::obtenerId($this->npciudad->getCodpai(),$this->npciudad->getCodedo(),$this->npciudad->getCodciu()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespciu/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespciu/list');
      }
      else
      {
        return $this->redirect('nomdefespciu/edit?id='.$this->npciudad->getId());
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
    $this->npciudad = $this->getNpciudadOrCreate();
    $this->updateNpciudadFromRequest();

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
    $ajax = $this->getRequestParameter('ajax');

    switch ($ajax){
      case '1':
        $dato=NppaisPeer::getNompai($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexcom.'","4","c"],["'.$cajtexmos.'","'.$dato.'"]]';
        break;
      case '2':
        $dato="";
		$c= new Criteria();

        $c->add(NpestadoPeer::CODPAI,$this->getRequestParameter('pais'));
        $c->add(NpestadoPeer::CODEDO,$this->getRequestParameter('codigo'));
        $datos= NpestadoPeer::doSelectOne($c);
        if ($datos)
        {
         $dato=$datos->getNomedo();
         //$dato=NpestadoPeer::getNomedo($this->getRequestParameter('codigo'));
         $existe='S';
        }
        else
        {
         $existe='N';
        }
        $output = '[["'.$cajtexcom.'","4","c"],["existe","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
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
	 $this->tags=Herramientas::autocompleteAjax('CODPAI','Nppais','CODPAI',$this->getRequestParameter('npciudad[codpai]'));
	}
  }

  public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(NpciudadPeer::CODPAI,$dato1);
  	$c->add(NpciudadPeer::CODEDO,$dato2);
  	$c->add(NpciudadPeer::CODCIU,$dato2);
  	$resul= NpciudadPeer::doSelectOne($c);
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
