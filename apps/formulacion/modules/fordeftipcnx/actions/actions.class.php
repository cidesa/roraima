<?php

/**
 * fordeftipcnx actions.
 *
 * @package    siga
 * @subpackage fordeftipcnx
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordeftipcnxActions extends autofordeftipcnxActions
{
  public function executeEdit()
  {
    $this->fordeftipcnx = $this->getFordeftipcnxOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordeftipcnxFromRequest();

      $this->saveFordeftipcnx($this->fordeftipcnx);
      
      $this->fordeftipcnx->setId(Herramientas::getX_vacio('codtipcnx','fordeftipcnx','id',$this->fordeftipcnx->getCodtipcnx()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordeftipcnx/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordeftipcnx/list');
      }
      else
      {
        return $this->redirect('fordeftipcnx/edit?id='.$this->fordeftipcnx->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
