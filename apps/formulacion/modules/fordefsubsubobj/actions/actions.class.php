<?php

/**
 * fordefsubsubobj actions.
 *
 * @package    Roraima
 * @subpackage fordefsubsubobj
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefsubsubobjActions extends autofordefsubsubobjActions
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

    $this->etiqueta="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefsubsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubsubobj']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefsubsubobj']['etiqueta'];
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

        $this->etiq2="";
        $varemp = $this->getUser()->getAttribute('configemp');
        if ($varemp)
        if(array_key_exists('aplicacion',$varemp))
         if(array_key_exists('formulacion',$varemp['aplicacion']))
           if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
             if(array_key_exists('fordefsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
               if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']))
               {
                $this->etiq2=$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']['etiqueta'];
               }
             }
}

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
  
   /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
 
  public function executeList()
  {
        $this->etiqueta="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefsubsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubsubobj']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefsubsubobj']['etiqueta'];
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

        $this->etiq2="";
        $varemp = $this->getUser()->getAttribute('configemp');
        if ($varemp)
        if(array_key_exists('aplicacion',$varemp))
         if(array_key_exists('formulacion',$varemp['aplicacion']))
           if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
             if(array_key_exists('fordefsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
               if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']))
               {
                $this->etiq2=$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']['etiqueta'];
               }
             }

    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefsubsubobj/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Fordefsubsubobj', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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

        $this->etiq2="";
        $varemp = $this->getUser()->getAttribute('configemp');
        if ($varemp)
        if(array_key_exists('aplicacion',$varemp))
         if(array_key_exists('formulacion',$varemp['aplicacion']))
           if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
             if(array_key_exists('fordefsubobj',$varemp['aplicacion']['formulacion']['modulos'])){
               if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']))
               {
                $this->etiq2=$varemp['aplicacion']['formulacion']['modulos']['fordefsubobj']['etiqueta'];
               }
             }

      if ($this->etiq!="") {
        return array(
          'fordefsubsubobj{codequ}' => $this->etiq.':',
          'fordefsubsubobj{codsubobj}' => $this->etiq2.':',
          'fordefsubsubobj{codsubsubobj}' => 'Código:',
          'fordefsubsubobj{dessubsubobj}' => 'Descripción:',
        );
      }else {
          return array(
          'fordefsubsubobj{codequ}' => 'Directriz:',
          'fordefsubsubobj{codsubobj}' => 'Estrategia:',
          'fordefsubsubobj{codsubsubobj}' => 'Código:',
          'fordefsubsubobj{dessubsubobj}' => 'Descripción:',
        );
      }
  }
}
