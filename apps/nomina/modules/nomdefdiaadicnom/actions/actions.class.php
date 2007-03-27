<?php

/**
 * nomdefdiaadicnom actions.
 *
 * @package    siga
 * @subpackage nomdefdiaadicnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefdiaadicnomActions extends autonomdefdiaadicnomActions
{
	
	  public function executeEdit()
	  {
	      $this->npnomina = $this->getNpnominaOrCreate();
	      
	      $this->pagerNpasiconnom = NpasiconnomPeer::getPagerByCodnom($this->npnomina->getCodnom(),$this->getRequestParameter('page',1));

			if ($this->getRequest()->getMethod() == sfRequest::POST)
			{
			  $this->updateNpnominaFromRequest();
			
			  $this->saveNpnomina($this->npnomina);
			
			  $this->setFlash('notice', 'Your modifications have been saved');
			
			  if ($this->getRequestParameter('save_and_add'))
			  {
			    return $this->redirect('nomdefdiaadicnom/create');
			  }
			  else if ($this->getRequestParameter('save_and_list'))
			  {
			    return $this->redirect('nomdefdiaadicnom/list');
			  }
			  else
			  {
			    return $this->redirect('nomdefdiaadicnom/edit?id='.$this->npnomina->getId());
			  }
			}
			else
			{
			  $this->labels = $this->getLabels();
			}
			
	  }
}
