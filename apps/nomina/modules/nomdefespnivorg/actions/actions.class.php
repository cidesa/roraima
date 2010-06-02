<?php

/**
 * nomdefespnivorg actions.
 *
 * @package    Roraima
 * @subpackage nomdefespnivorg
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespnivorgActions extends autonomdefespnivorgActions
{
  public $coderror1=-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->cambiareti="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('nomina',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
	     if(array_key_exists('nomdefespnivorg',$varemp['aplicacion']['nomina']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['nomina']['modulos']['nomdefespnivorg']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['nomina']['modulos']['nomdefespnivorg']['cambiareti'];
	       }
	     }

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npestorg/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Npestorg', 15);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {

   $this->npestorg = $this->getNpestorgOrCreate();
   $this->formato = Herramientas::ObtenerFormato('npdefgen','fororg');
   $this->longitud=strlen($this->formato);

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpestorgFromRequest();

      $this->saveNpestorg($this->npestorg);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespnivorg/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespnivorg/list');
      }
      else
      {
        return $this->redirect('nomdefespnivorg/edit?id='.$this->npestorg->getId());
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
  protected function updateNpestorgFromRequest()
  {
    $npestorg = $this->getRequestParameter('npestorg');
    $this->formato = Herramientas::ObtenerFormato('npdefgen','fororg');
    $this->longitud=strlen($this->formato);

    if (isset($npestorg['codniv']))
    {
      $this->npestorg->setCodniv($npestorg['codniv']);
    }
    if (isset($npestorg['desniv']))
    {
      $this->npestorg->setDesniv($npestorg['desniv']);
    }
    if (isset($npestorg['telext']))
    {
      $this->npestorg->setTelext($npestorg['telext']);
    }
	if (isset($npestorg['email']))
    {
      $this->npestorg->setEmail($npestorg['email']);
    }
  }

  
  
  
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
        $this->npestorg = $this->getNpestorgOrCreate();
        $this->updateNpestorgFromRequest();

        $this->coderror1=Nomina::validarNomdefespnivorg($this->npestorg);
        if ($this->coderror1<>-1){
          return false;
        }else return true;

      }else return true;
    }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npestorg = NpestorgPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npestorg);

    $id=$this->getRequestParameter('id');
    $c=new Criteria();
    $c->add(NpuniejePeer::CODNIV,$this->npestorg->getCodniv());
    $dato=NpuniejePeer::doSelect($c);
    if (!$dato)
    {
      if (!Nomina::Buscar_CodigoHijo($this->npestorg->getCodniv()))
     {
       $this->deleteNpestorg($this->npestorg);
       $this->Bitacora('Elimino');
     }
     else
     {
     	$this->setFlash('notice','El Nivel Organizacional no puede ser eliminado, ya que posee niveles que dependen de el');
        return $this->redirect('nomdefespnivorg/edit?id='.$id);
     }
    }
    else
    {
      $this->setFlash('notice','El Nivel Organizacional no puede ser eliminado, ya que se encuentra asociado a una Unidad Ejecutora');
      return $this->redirect('nomdefespnivorg/edit?id='.$id);
    }

    return $this->redirect('nomdefespnivorg/list');
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
    $this->npestorg = $this->getNpestorgOrCreate();
    $this->updateNpestorgFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('npestorg{codniv}',$err);
      }
    }

    return sfView::SUCCESS;
  }

}
