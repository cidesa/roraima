<?php

/**
 * nomdefespban actions.
 *
 * @package    Roraima
 * @subpackage nomdefespban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespbanActions extends autonomdefespbanActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npbancos = $this->getNpbancosOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpbancosFromRequest();

      $this->saveNpbancos($this->npbancos);

      $this->npbancos->setId(Herramientas::getX_vacio('codban','npbancos','id',$this->npbancos->getCodban()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespban/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespban/list');
      }
      else
      {
        return $this->redirect('nomdefespban/edit?id='.$this->npbancos->getId());
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
  protected function updateNpbancosFromRequest()
  {
    $npbancos = $this->getRequestParameter('npbancos');

  if (isset($npbancos['codban']))
    {
      $this->npbancos->setCodban(str_pad($npbancos['codban'],2,'0',STR_PAD_LEFT));
    }
    if (isset($npbancos['nomban']))
    {
      $this->npbancos->setNomban($npbancos['nomban']);
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
    $this->npbancos = $this->getNpbancosOrCreate();
    $this->updateNpbancosFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
