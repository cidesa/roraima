<?php

/**
 * fordefsitpre actions.
 *
 * @package    Roraima
 * @subpackage fordefsitpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefsitpreActions extends autofordefsitpreActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefsitpre = $this->getFordefsitpreOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefsitpreFromRequest();

      $this->saveFordefsitpre($this->fordefsitpre);
      
       $this->fordefsitpre->setId(Herramientas::getX_vacio('codsitpre','fordefsitpre','id',$this->fordefsitpre->getCodsitpre()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefsitpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefsitpre/list');
      }
      else
      {
        return $this->redirect('fordefsitpre/edit?id='.$this->fordefsitpre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
