<?php

/**
 * forsegpoaivss actions.
 *
 * @package    siga
 * @subpackage forsegpoaivss
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class forsegpoaivssActions extends autoforsegpoaivssActions
{
  public function executeEdit()
  {
    $this->fordisactperpryaccmet = $this->getFordisactperpryaccmetOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateFordisactperpryaccmetFromRequest();

      //$this->saveFordisactperpryaccmet($this->fordisactperpryaccmet);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('forsegpoaivss/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('forsegpoaivss/list');
      }
      else
      {
        return $this->redirect('forsegpoaivss/edit?id='.$this->fordisactperpryaccmet->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  protected function updateFordisactperpryaccmetFromRequest()
  {
    $fordisactperpryaccmet = $this->getRequestParameter('fordisactperpryaccmet');

    if (isset($fordisactperpryaccmet['codpro']))
    {
      $this->fordisactperpryaccmet->setCodpro($fordisactperpryaccmet['codpro']);
    }
    if (isset($fordisactperpryaccmet['codaccesp']))
    {
      $this->fordisactperpryaccmet->setCodaccesp($fordisactperpryaccmet['codaccesp']);
    }
    if (isset($fordisactperpryaccmet['codmet']))
    {
      $this->fordisactperpryaccmet->setCodmet($fordisactperpryaccmet['codmet']);
    }
    if (isset($fordisactperpryaccmet['codact']))
    {
      $this->fordisactperpryaccmet->setCodact($fordisactperpryaccmet['codact']);
    }
    if (isset($fordisactperpryaccmet['perpre']))
    {
      $this->fordisactperpryaccmet->setPerpre($fordisactperpryaccmet['perpre']);
    }
    if (isset($fordisactperpryaccmet['canact']))
    {
      $this->fordisactperpryaccmet->setCanact($fordisactperpryaccmet['canact']);
    }
    if (isset($fordisactperpryaccmet['canacteje']))
    {
      $this->fordisactperpryaccmet->setCanacteje($fordisactperpryaccmet['canacteje']);
    }
    if (isset($fordisactperpryaccmet['canmet']))
    {
      $this->fordisactperpryaccmet->setCanmet($fordisactperpryaccmet['canmet']);
    }
    if (isset($fordisactperpryaccmet['canmeteje']))
    {
      $this->fordisactperpryaccmet->setCanmeteje($fordisactperpryaccmet['canmeteje']);
    }
  }
  
}
