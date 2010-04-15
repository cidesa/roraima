<?php

/**
 * nomdeftipgas actions.
 *
 * @package    Roraima
 * @subpackage nomdeftipgas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdeftipgasActions extends autonomdeftipgasActions
{

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptipgas = $this->getNptipgasOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipgasFromRequest();

      $this->saveNptipgas($this->nptipgas);

      $this->nptipgas->setId(Herramientas::getX_vacio('codtipgas','nptipgas','id',$this->nptipgas->getCodtipgas()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdeftipgas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdeftipgas/list');
      }
      else
      {
        return $this->redirect('nomdeftipgas/edit?id='.$this->nptipgas->getId());
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
  protected function updateNptipgasFromRequest()
  {
    $nptipgas = $this->getRequestParameter('nptipgas');

    if (isset($nptipgas['codtipgas']))
    {
      $this->nptipgas->setCodtipgas(str_pad($nptipgas['codtipgas'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nptipgas['destipgas']))
    {
      $this->nptipgas->setDestipgas($nptipgas['destipgas']);
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
    $this->nptipgas = $this->getNptipgasOrCreate();
    $this->updateNptipgasFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
