<?php

/**
 * fordefobjnvaeta actions.
 *
 * @package    siga
 * @subpackage fordefobjnvaeta
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefobjnvaetaActions extends autofordefobjnvaetaActions
{
  public function executeEdit()
  {
    $this->fordefobjestnvaeta = $this->getFordefobjestnvaetaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefobjestnvaetaFromRequest();

      $this->saveFordefobjestnvaeta($this->fordefobjestnvaeta);

     // $this->fordefobjestnvaeta->setId(Herramientas::getX_vacio('codobjnvaeta','fordefobjestnvaeta','id',$this->fordefobjestnvaeta->getCodobjnvaeta()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefobjnvaeta/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefobjnvaeta/list');
      }
      else
      {
        return $this->redirect('fordefobjnvaeta/edit?id='.$this->fordefobjestnvaeta->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}

