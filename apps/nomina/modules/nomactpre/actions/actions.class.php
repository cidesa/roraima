<?php

/**
 * nomactpre actions.
 *
 * @package    siga
 * @subpackage nomactpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomactpreActions extends autonomactpreActions
{
	
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
