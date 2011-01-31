<?php

/**
 * fctiting actions.
 *
 * @package    Roraima
 * @subpackage fctiting
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fctitingActions extends autofctitingActions
{
	
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fcpreing = $this->getFcpreingOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcpreingFromRequest();

      $this->saveFcpreing($this->fcpreing);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fctiting/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fctiting/list');
      }
      else
      {
        return $this->redirect('fctiting/edit?id='.$this->fcpreing->getId());
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
  protected function updateFcpreingFromRequest()
  {
    $fcpreing = $this->getRequestParameter('fcpreing');

    if (isset($fcpreing['codpar']))
    {
      $this->fcpreing->setCodpar($fcpreing['codpar']);
    }
    if (isset($fcpreing['nompar']))
    {
      $this->fcpreing->setNompar($fcpreing['nompar']);
    }
    if (isset($fcpreing['estima']))
    {
      $this->fcpreing->setEstima($fcpreing['estima']);
    }
    if (isset($fcpreing['estcie']))
    {
      $this->fcpreing->setEstcie($fcpreing['estcie']);
    }
    if (isset($fcpreing['acum']))
    {
	    if ($fcpreing['acum']=='S') 	
	      $this->fcpreing->setAcum('S');
	    else
	      $this->fcpreing->setAcum('N');
    }
    else
     $this->fcpreing->setAcum('N');
  }
  
}
