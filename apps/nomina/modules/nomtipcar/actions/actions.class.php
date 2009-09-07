<?php

/**
 * nomtipcar actions.
 *
 * @package    Roraima
 * @subpackage nomtipcar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomtipcarActions extends autonomtipcarActions
{
/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptipcar = $this->getNptipcarOrCreate();

    if ($this->nptipcar->getId()!='')
    {
    	$this->nuevo=true;
    }else
    {
    	$this->nuevo=false;
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipcarFromRequest();

      $this->saveNptipcar($this->nptipcar);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomtipcar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomtipcar/list');
      }
      else
      {
        return $this->redirect('nomtipcar/edit?id='.$this->nptipcar->getId());
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
  protected function updateNptipcarFromRequest()
  {
    $nptipcar = $this->getRequestParameter('nptipcar');

    if (isset($nptipcar['codtipcar']))
    {
      $this->nptipcar->setCodtipcar(str_pad($nptipcar['codtipcar'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptipcar['destipcar']))
    {
      $this->nptipcar->setDestipcar($nptipcar['destipcar']);
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
    $this->nptipcar = $this->getNptipcarOrCreate();
    $this->updateNptipcarFromRequest();

    $this->labels = $this->getLabels();

    if ($this->nptipcar->getId()!='')
    {
    	$this->nuevo=true;
    }else
    {
    	$this->nuevo=false;
    }

    return sfView::SUCCESS;
  }

}
