<?php

/**
 * nomdefespprofes actions.
 *
 * @package    Roraima
 * @subpackage nomdefespprofes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespprofesActions extends autonomdefespprofesActions
{

/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npprofesion = $this->getNpprofesionOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpprofesionFromRequest();

      $this->saveNpprofesion($this->npprofesion);

      $this->npprofesion->setId(Herramientas::getX_vacio('codprofes','npprofesion','id',$this->npprofesion->getCodprofes()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespprofes/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespprofes/list');
      }
      else
      {
        return $this->redirect('nomdefespprofes/edit?id='.$this->npprofesion->getId());
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
  protected function updateNpprofesionFromRequest()
  {
    $npprofesion = $this->getRequestParameter('npprofesion');

    if (isset($npprofesion['codprofes']))
    {
      $this->npprofesion->setCodprofes(str_pad($npprofesion['codprofes'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($npprofesion['desprofes']))
    {
      $this->npprofesion->setDesprofes($npprofesion['desprofes']);
    }
    if (isset($npprofesion['nivpro']))
    {
      $this->npprofesion->setNivpro($npprofesion['nivpro']);
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
    $this->npprofesion = $this->getNpprofesionOrCreate();
    $this->updateNpprofesionFromRequest();

    $this->labels = $this->getLabels();

    if ($this->npprofesion->getId()!='')
	{
		$this->nuevo=true;
	}else
	{
		$this->nuevo=false;
	}

    return sfView::SUCCESS;
  }

}
