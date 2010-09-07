<?php

/**
 * fordefequ actions.
 *
 * @package    Roraima
 * @subpackage fordefequ
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefequActions extends autofordefequActions
{

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
  protected function saveFordefequ($fordefequ)
  {
    Formulacion::salvarFordefequ($fordefequ);
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefequ = $this->getFordefequOrCreate();
    $this->etiqueta="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefequ',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefequ']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefequ']['etiqueta'];
           }
         }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefequFromRequest();

      $this->saveFordefequ($this->fordefequ);

      $this->fordefequ->setId(Herramientas::getX_vacio('codequ','fordefequ','id',$this->fordefequ->getCodequ()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefequ/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefequ/list');
      }
      else
      {
        return $this->redirect('fordefequ/edit?id='.$this->fordefequ->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
         if(array_key_exists('fordefequ',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefequ']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefequ']['etiqueta'];
           }
         }
         
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefequ/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Fordefequ', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function updateFordefequFromRequest()
  {
    $fordefequ = $this->getRequestParameter('fordefequ');

    $this->etiqueta="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('aplicacion',$varemp))
     if(array_key_exists('formulacion',$varemp['aplicacion']))
       if(array_key_exists('modulos',$varemp['aplicacion']['formulacion']))
         if(array_key_exists('fordefequ',$varemp['aplicacion']['formulacion']['modulos'])){
           if(array_key_exists('etiqueta',$varemp['aplicacion']['formulacion']['modulos']['fordefequ']))
           {
            $this->etiqueta=$varemp['aplicacion']['formulacion']['modulos']['fordefequ']['etiqueta'];
           }
         }

    if (isset($fordefequ['codequ']))
    {
      $this->fordefequ->setCodequ($fordefequ['codequ']);
    }
    if (isset($fordefequ['desequ']))
    {
      $this->fordefequ->setDesequ($fordefequ['desequ']);
    }
    if (isset($fordefequ['desobj']))
    {
      $this->fordefequ->setDesobj($fordefequ['desobj']);
    }
  }


 public function executeEliminar()
  {
  	$equ=$this->getRequestParameter('equ');
    $id=$this->getRequestParameter('id');

  	$c= new Criteria();
  	$c->add(FordefsubobjPeer::CODEQU,$equ);
  	$resultados= FordefsubobjPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice1','No se puede eliminar la Directriz, ya que esta asociada a un(as) estrategia(s)');
      return $this->redirect('fordefequ/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefequPeer::CODEQU,$equ);
  	  FordefequPeer::doDelete($c);

  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefequ/edit');
  	}
  }
  protected function getLabels()
  {
    return array(
      'fordefequ{codequ}' => 'Código',
      'fordefequ{desequ}' => 'Descripción',
      'fordefequ{desobj}' => 'Objetivo',
    );
  }
}
