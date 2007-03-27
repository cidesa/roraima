<?php

/**
 * nomfalperper actions.
 *
 * @package    siga
 * @subpackage nomfalperper
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomfalperperActions extends autonomfalperperActions
{
	public function executeEdit()
	{
	    $this->nphojint = $this->getNphojintOrCreate();

	    $this->pagerNpfalper = NpfalperPeer::getPagerByCodemp($this->nphojint->getCodemp(),$this->getRequestParameter('page',1));

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
		  $this->updateNphojintFromRequest();
		
		  $this->saveNphojint($this->nphojint);
		
		  $this->setFlash('notice', 'Your modifications have been saved');
		
		  if ($this->getRequestParameter('save_and_add'))
		  {
		    return $this->redirect('nomfalperper/create');
		  }
		  else if ($this->getRequestParameter('save_and_list'))
		  {
		    return $this->redirect('nomfalperper/list');
		  }
		  else
		  {
		    return $this->redirect('nomfalperper/edit?id='.$this->nphojint->getId());
		  }
		}
		else
		{
		  $this->labels = $this->getLabels();
		}
		
	}
}
