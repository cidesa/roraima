<?php

/**
 * faccarinm actions.
 *
 * @package    siga
 * @subpackage faccarinm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faccarinmActions extends autofaccarinmActions
{
	public function executeEdit()
	  {
	    $this->fccarinm = $this->getFccarinmOrCreate();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFccarinmFromRequest();
	
	      $this->saveFccarinm($this->fccarinm);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('faccarinm/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('faccarinm/list');
	      }
	      else
	      {
	        return $this->redirect('faccarinm/edit?id='.$this->fccarinm->getId());
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
	    $this->fccarinm = $this->getFccarinmOrCreate();
	    $this->updateFccarinmFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  

	protected function updateFccarinmFromRequest()
	  {
	    $fccarinm = $this->getRequestParameter('fccarinm');
	
	    if (isset($fccarinm['codcarinm']))
	    {
	      $this->fccarinm->setCodcarinm($fccarinm['codcarinm']);
	    }
	    if (isset($fccarinm['nomcarinm']))
	    {
	      $this->fccarinm->setNomcarinm($fccarinm['nomcarinm']);
	    }
	    if (isset($fccarinm['stacarinm']))
	    {
	      $this->fccarinm->setStacarinm($fccarinm['stacarinm']);
	    }
	  }	  
	  
	protected function getLabels()
	  {
	    return array(
	      'fccarinm{codcarinm}' => 'Código',
	      'fccarinm{nomcarinm}' => 'Descripción',
	      'fccarinm{stacarinm}' => 'Usa M2',
	    );
	  }	  
}
