<?php

/**
 * fordefsitpre actions.
 *
 * @package    siga
 * @subpackage fordefsitpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefsitpreActions extends autofordefsitpreActions
{
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
