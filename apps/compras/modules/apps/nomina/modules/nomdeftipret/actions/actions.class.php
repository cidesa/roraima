<?php

/**
 * nomdeftipret actions.
 *
 * @package    Roraima
 * @subpackage nomdeftipret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdeftipretActions extends autonomdeftipretActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nptipret = $this->getNptipretOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipretFromRequest();

      $this->saveNptipret($this->nptipret);

      $this->nptipret->setId(Herramientas::getX_vacio('codret','nptipret','id',$this->nptipret->getCodret()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdeftipret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdeftipret/list');
      }
      else
      {
        return $this->redirect('nomdeftipret/edit?id='.$this->nptipret->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
