<?php

/**
 * nomdefesppar actions.
 *
 * @package    Roraima
 * @subpackage nomdefesppar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespparActions extends autonomdefespparActions
{
/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptippar = $this->getNptipparOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipparFromRequest();

      $this->saveNptippar($this->nptippar);

      $this->nptippar->setId(Herramientas::getX_vacio('tippar','nptippar','id',$this->nptippar->getTippar()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesppar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesppar/list');
      }
      else
      {
        return $this->redirect('nomdefesppar/edit?id='.$this->nptippar->getId());
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
  protected function updateNptipparFromRequest()
  {
    $nptippar = $this->getRequestParameter('nptippar');

    if (isset($nptippar['tippar']))
    {
      $this->nptippar->setTippar(str_pad($nptippar['tippar'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptippar['despar']))
    {
      $this->nptippar->setDespar($nptippar['despar']);
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
    $this->nptippar = $this->getNptipparOrCreate();
    $this->updateNptipparFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
