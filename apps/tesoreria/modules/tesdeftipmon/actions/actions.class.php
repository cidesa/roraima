<?php

/**
 * tesdeftipmon actions.
 *
 * @package    siga
 * @subpackage tesdeftipmon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdeftipmonActions extends autotesdeftipmonActions
{
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
  
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->tsdesmon = $this->getTsdesmonOrCreate();
    try{
    $this->updateTsdesmonFromRequest();
    }catch(Exception $ex){}

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
  
  
}
