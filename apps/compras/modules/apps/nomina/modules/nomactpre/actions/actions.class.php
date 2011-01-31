<?php

/**
 * nomactpre actions.
 *
 * @package    Roraima
 * @subpackage nomactpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomactpreActions extends autonomactpreActions
{
	
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nphispre = $this->getNphispreOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateNphispreFromRequest();

      //$this->saveNphispre($this->nphispre);

      $this->setFlash('notice', 'Prestamos Actualizados');

      //if ($this->getRequestParameter('save_and_add'))
      
        return $this->redirect('nomactpre/edit?id='.$this->nphispre->getId());
      }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
