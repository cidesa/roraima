<?php

/**
 * almtippro actions.
 *
 * @package    Roraima
 * @subpackage almtippro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almtipproActions extends autoalmtipproActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->catippro = $this->getCatipproOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatipproFromRequest();

      $this->saveCatippro($this->catippro);

   // $this->catippro->setId(Herramientas::getX_vacio('codpro','catippro','id',$this->catippro->getCodpro()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almtippro/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almtippro/list');
      }
      else
      {
        return $this->redirect('almtippro/edit?id='.$this->catippro->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('catippro[ctaord]')));
      }
    else  if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('catippro[ctaper]')));
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
  protected function saveCatippro($catippro)
  {
    $catippro->save();
  }

   public function executeDelete()
  {
    $this->catippro = CatipproPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->catippro);

    try
    {
      $reg = Herramientas::getX_vacio('tippro','caordcom','tippro',$this->catippro->getCodpro());
        if ($reg=='')
        {
          $this->deleteCatippro($this->catippro);
          $this->Bitacora('Elimino');
        }else{
     	  $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
          return $this->forward('almtippro', 'list');
        }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se pudo borrar la registro seleccionado. Asegúrese de que no tiene ningún tipo de registros asociados.');
      return $this->forward('almtippro', 'list');
    }

    return $this->redirect('almtippro/list');
  }


  public function setVars()
  {
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->loncta=strlen($this->mascara);
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
    $this->catippro = $this->getCatipproOrCreate();
    $this->updateCatipproFromRequest();
    $this->setVars();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }


}
