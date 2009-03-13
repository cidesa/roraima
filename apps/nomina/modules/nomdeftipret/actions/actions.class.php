<?php

/**
 * nomdeftipret actions.
 *
 * @package    siga
 * @subpackage nomdeftipret
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdeftipretActions extends autonomdeftipretActions
{
	public function executeEdit()
  {
    $this->nptipret = $this->getNptipretOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipretFromRequest();

      $this->saveNptipret($this->nptipret);

      $this->nptipret->setId(Herramientas::getX_vacio('codret','nptipret','id',$this->nptipret->getCodret()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdeftipret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdeftipret/list');
      }
      else
      {
        return $this->redirect('nomdeftipret/edit?id='.$this->nptipret->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
