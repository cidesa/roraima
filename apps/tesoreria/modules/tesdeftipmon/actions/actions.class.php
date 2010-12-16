<?php

/**
 * tesdeftipmon actions.
 *
 * @package    Roraima
 * @subpackage tesdeftipmon
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesdeftipmonActions extends autotesdeftipmonActions
{
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->tsdesmon = $this->getTsdesmonOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsdesmonFromRequest();

      $this->saveTsdesmon($this->tsdesmon);
      
      $this->tsdesmon->setId(Herramientas::getX_vacio('codmon','tsdesmon','id',$this->tsdesmon->getCodmon()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdeftipmon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdeftipmon/list');
      }
      else
      {
        return $this->redirect('tesdeftipmon/edit?id='.$this->tsdesmon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function validateEdit()
  {
    $this->tsdesmon = $this->getTsdesmonOrCreate();
    $this->updateTsdesmonFromRequest();

    if ($this->getRequest()->getMethod() == sfRequest::POST){
      if($this->tsdesmon->getTiedatrel()!='S') return true;
      else {

        $this->getRequest()->setError('', H::obtenerMensajeError(572));
        return false;
      }
    }
  }
  
}
