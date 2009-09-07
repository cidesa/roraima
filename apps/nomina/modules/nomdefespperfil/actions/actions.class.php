<?php

/**
 * nomdefespperfil actions.
 *
 * @package    Roraima
 * @subpackage nomdefespperfil
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespperfilActions extends autonomdefespperfilActions
{
 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npperfil = $this->getNpperfilOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpperfilFromRequest();

      $this->saveNpperfil($this->npperfil);

      $this->npperfil->setId(Herramientas::getX_vacio('codperfil','npperfil','id',$this->npperfil->getCodperfil()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespperfil/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespperfil/list');
      }
      else
      {
        return $this->redirect('nomdefespperfil/edit?id='.$this->npperfil->getId());
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
  protected function updateNpperfilFromRequest()
  {
    $npperfil = $this->getRequestParameter('npperfil');

    if (isset($npperfil['codperfil']))
    {
      $this->npperfil->setCodperfil(str_pad($npperfil['codperfil'],4,'0',STR_PAD_LEFT));
    }
    if (isset($npperfil['desperfil']))
    {
      $this->npperfil->setDesperfil($npperfil['desperfil']);
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
    $this->npperfil = $this->getNpperfilOrCreate();
    $this->updateNpperfilFromRequest();

    $this->labels = $this->getLabels();

	if ($this->npperfil->getId()!='')
    {
    	$this->nuevo=true;
    }else
    {
    	$this->nuevo=false;
    }

    return sfView::SUCCESS;
  }


}
