<?php

/**
 * fordefsubsubobj actions.
 *
 * @package    siga
 * @subpackage fordefsubsubobj
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefsubsubobjActions extends autofordefsubsubobjActions
{ 
  public  $coderror1=-1;
  
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->fordefsubsubobj = $this->getFordefsubsubobjOrCreate(); 
        $this->updateFordefsubsubobjFromRequest();   
    
      Formulacion::validarFordefsubsubobj($this->fordefsubsubobj,&$msj);
      $this->coderror1=$msj;
      if ($this->coderror1<>-1)
      {
        return false;
      }else return true;     
    }else return true;
  }  
  
  public function cargarEquilibrio()
   {
     $tablas=array('fordefequ');//arreglo de los joins de las tablas
     $filtros_tablas=array('');//Envio  los filtros de las clases
     $filtros_variales=array('');//Envio  los parametros de la funcion
     $campos_retornados=array('codequ','desequ');// arreglos donde me traigo el nombre y el codigo
     return $codequi= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
   }

  public function cargarSubObjetivo($codequi)
  {
    $tablas=array('fordefsubobj');//arreglo de los joins de las tablas
    $filtros_tablas=array('codequ');//Envio  los filtros de las clases
    $filtros_variales=array($codequi);//Envio  los parametros de la funcion
    $campos_retornados=array('codsubobj','dessubobj');// arreglos donde me traigo el nombre y el codigo
    return $subobjeti= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }   
	
  public function funciones_combos()
  {
    $this->equilibrio = $this->cargarEquilibrio();
    $this->subobjetivo = $this->cargarSubObjetivo($this->fordefsubsubobj->getCodequ());//contiene los datos de la bd
  }
  
  public function executeEdit()
  {
    $this->fordefsubsubobj = $this->getFordefsubsubobjOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefsubsubobjFromRequest();

      $this->saveFordefsubsubobj($this->fordefsubsubobj);
      
      $this->fordefsubsubobj->setId(self::obtenerId($this->fordefsubsubobj->getCodequ(),$this->fordefsubsubobj->getCodsubobj(),$this->fordefsubsubobj->getCodsubsubobj()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefsubsubobj/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefsubsubobj/list');
      }
      else
      {
        return $this->redirect('fordefsubsubobj/edit?id='.$this->fordefsubsubobj->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }  

  protected function updateFordefsubsubobjFromRequest()
  {
    $fordefsubsubobj = $this->getRequestParameter('fordefsubsubobj');
    $this->funciones_combos();

    if (isset($fordefsubsubobj['codequ']))
    {
      $this->fordefsubsubobj->setCodequ($fordefsubsubobj['codequ']);
    }
    if (isset($fordefsubsubobj['codsubobj']))
    {
      $this->fordefsubsubobj->setCodsubobj($fordefsubsubobj['codsubobj']);
    }
    if (isset($fordefsubsubobj['codsubsubobj']))
    {
      $this->fordefsubsubobj->setCodsubsubobj($fordefsubsubobj['codsubsubobj']);
    }
    if (isset($fordefsubsubobj['dessubsubobj']))
    {
      $this->fordefsubsubobj->setDessubsubobj($fordefsubsubobj['dessubsubobj']);
    }
  } 
  
   public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fordefsubsubobj = $this->getFordefsubsubobjOrCreate();
    $this->updateFordefsubsubobjFromRequest();
   
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

  protected function saveFordefsubsubobj($fordefsubsubobj)
  {
    Formulacion::salvarFordefsubsubobj($fordefsubsubobj);  

  }  
  
  public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
	  $this->subobjetivo = $this->cargarSubObjetivo($this->getRequestParameter('equilibrio'));
	  $this->tipo='E';
	}	
  }

  
  public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(FordefsubsubobjPeer::CODEQU,$dato1);
  	$c->add(FordefsubsubobjPeer::CODSUBOBJ,$dato2);
  	$c->add(FordefsubsubobjPeer::CODSUBSUBOBJ,$dato3);
  	$resul= FordefsubsubobjPeer::doSelectOne($c);
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
    $subsubobj=$this->getRequestParameter('subsubobj');
    $id=$this->getRequestParameter('id');
    
  	$c= new Criteria();
  	$c->add(FordefpryPeer::CODEQU,$equ);
  	$c->add(FordefpryPeer::CODSUBOBJ,$subobj);
  	$c->add(FordefpryPeer::CODSUBSUBOBJ,$subsubobj);
  	$resultados= FordefpryPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar la Política, esta asociado a un(os) proyecto(s)');
      return $this->redirect('fordefsubsubobj/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefsubsubobjPeer::CODEQU,$equ);
  	  $c->add(FordefsubsubobjPeer::CODSUBOBJ,$subobj);
  	  $c->add(FordefsubsubobjPeer::CODSUBSUBOBJ,$subsubobj);
  	  FordefsubsubobjPeer::doDelete($c);
  	  
  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefsubsubobj/edit');
  	}
  }
 
}
