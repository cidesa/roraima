<?php

/**
 * almtipemp actions.
 *
 * @package    Roraima
 * @subpackage almtipemp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almtipempActions extends autoalmtipempActions
{
/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->catipempsnc = $this->getCatipempsncOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatipempsncFromRequest();

      $this->saveCatipempsnc($this->catipempsnc);

      $this->catipempsnc->setId(Herramientas::getX_vacio('codtip','catipempsnc','id',$this->catipempsnc->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almtipemp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almtipemp/list');
      }
      else
      {
        return $this->redirect('almtipemp/edit?id='.$this->catipempsnc->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
