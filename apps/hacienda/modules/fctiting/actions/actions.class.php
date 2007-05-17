<?php

/**
 * fctiting actions.
 *
 * @package    siga
 * @subpackage fctiting
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fctitingActions extends autofctitingActions
{
	
  public function executeEdit()
  {
    $this->fcpreing = $this->getFcpreingOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcpreingFromRequest();

      $this->saveFcpreing($this->fcpreing);

      $this->setFlash('notice', 'Your modifications have been saved');

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
