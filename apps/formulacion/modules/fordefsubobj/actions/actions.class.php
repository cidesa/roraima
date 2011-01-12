<?php

/**
 * fordefsubobj actions.
 *
 * @package    Roraima
 * @subpackage fordefsubobj
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefsubobjActions extends autofordefsubobjActions
{
   public  $coderror1=-1;
  
  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
	
	
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefsubobjFromRequest()
	{
		$fordefsubobj = $this->getRequestParameter('fordefsubobj');

                $this->etiqueta="";
                $varemp = $this->getUser()->getAttribute('configemp');
                if ($varemp)
                if(array_key_exists('aplicacion',$varemp))
                 if(array_key_exists('formulacion',$varemp['aplicacion']))
                   if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
                     if(array_key_exists('fordefsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
                       if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']))
                       {
                        $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']['etiqueta'];
                       }
                     }

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
  
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefsubobj = $this->getFordefsubobjOrCreate();

    $this->etiqueta="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']['etiqueta'];
           }
         }

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
  
    /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveFordefsubobj($fordefsubobj)
  {
    Formulacion::salvarFordefsubobj($fordefsubobj);

  }
  
   /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
  
  protected function getLabels()
  {
        $this->etiq="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefequ',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefequ']))
           {
            $this->etiq=$varemp['aplicacion']['formulacion']['modulos']['fordefequ']['etiqueta'];
}
         }

    if ($this->etiq!="") {
    return array(
      'fordefsubobj{codsubobj}' => 'Código:',
      'fordefsubobj{dessubobj}' => 'Descripción:',
      'fordefsubobj{codequ}' => $this->etiq.':',
      'fordefsubobj{desequ}' => $this->etiq.':',
    );
    }else {
        return array(
      'fordefsubobj{codsubobj}' => 'Código:',
      'fordefsubobj{dessubobj}' => 'Descripción:',
      'fordefsubobj{codequ}' => 'Directriz:',
    );
    }
  }

  public function executeList()
  {
    $this->etiqueta="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']['etiqueta'];
           }
         }

        $this->etiq="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefequ',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefequ']))
           {
            $this->etiq=$varemp['aplicacion']['formulacion']['modulos']['fordefequ']['etiqueta'];
           }
         }

    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefsubobj/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Fordefsubobj', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

}
