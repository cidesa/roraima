<?php

/**
 * fordefsubobj actions.
 *
 * @package    siga
 * @subpackage fordefsubobj
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefsubobjActions extends autofordefsubobjActions
{
   public  $coderror1=-1;
  
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
       $this->fordefsubobj = $this->getFordefsubobjOrCreate(); 
       $this->updateFordefsubobjFromRequest();
    
      Formulacion::validarFordefsubobj($this->fordefsubobj,&$msj);
      $this->coderror1=$msj;
      if ($this->coderror1<>-1)
      {
        return false;
      }else return true;     
    }else return true;
  }  
	
	
	protected function updateFordefsubobjFromRequest()
	{
		$fordefsubobj = $this->getRequestParameter('fordefsubobj');

		if (isset($fordefsubobj['codsubobj']))
		{
			$this->fordefsubobj->setCodsubobj($fordefsubobj['codsubobj']);
		}
		if (isset($fordefsubobj['dessubobj']))
		{
			$this->fordefsubobj->setDessubobj($fordefsubobj['dessubobj']);
    }
    if (isset($fordefsubobj['codequ']))
    {
      $this->fordefsubobj->setCodequ($fordefsubobj['codequ']);
    }
  }
  
   public function executeEdit()
  {
    $this->fordefsubobj = $this->getFordefsubobjOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefsubobjFromRequest();

      $this->saveFordefsubobj($this->fordefsubobj);

      $this->fordefsubobj->setId(self::obtenerId($this->fordefsubobj->getCodequ(),$this->fordefsubobj->getCodsubobj()));
      
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefsubobj/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefsubobj/list');
      }
      else
      {
        return $this->redirect('fordefsubobj/edit?id='.$this->fordefsubobj->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
    protected function saveFordefsubobj($fordefsubobj)
  {
    Formulacion::salvarFordefsubobj($fordefsubobj);

  }
  
   public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fordefsubobj = $this->getFordefsubobjOrCreate();
    $this->updateFordefsubobjFromRequest();

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
  
  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(FordefsubobjPeer::CODEQU,$dato1);
  	$c->add(FordefsubobjPeer::CODSUBOBJ,$dato2);  	
  	$resul= FordefsubobjPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }
  
  public function executeEliminar()
  {
  	$equ=$this->getRequestParameter('equ');
    $subobj=$this->getRequestParameter('subobj');
    $id=$this->getRequestParameter('id');
    
  	$c= new Criteria();
  	$c->add(FordefsubsubobjPeer::CODEQU,$equ);
  	$c->add(FordefsubsubobjPeer::CODSUBOBJ,$subobj);
  	$resultados= FordefsubsubobjPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar la estrategia, Tiene políticas asociadas');
      return $this->redirect('fordefsubobj/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefsubobjPeer::CODEQU,$equ);
  	  $c->add(FordefsubobjPeer::CODSUBOBJ,$subobj);
  	  FordefsubobjPeer::doDelete($c);
  	  
  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefsubobj/edit');
  	}
  }
  
}
