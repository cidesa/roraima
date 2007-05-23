<?php

/**
 * almreq actions.
 *
 * @package    siga
 * @subpackage almreq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almreqActions extends autoalmreqActions
{

 public function executeEdit()
  {
    $this->careqart = $this->getCareqartOrCreate();
    $this->desubi = BnubibiePeer::getDesUbi($this->careqart->getCodcatreq());
    $this->pagerArtreq = CaartreqPeer::getPagerByReqart($this->careqart->getReqart());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCareqartFromRequest();

      $this->saveCareqart($this->careqart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almreq/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almreq/list');
      }
      else
      {
      	return $this->redirect('almreq/edit?id='.$this->careqart->getId());
      }
    }
    else
    {
    	$this->labels = $this->getLabels();
    }
  }

  protected function updateCareqartFromRequest()
  {
  	$careqart = $this->getRequestParameter('careqart');

  	if (isset($careqart['reqart']))
  	{
  		$this->careqart->setReqart($careqart['reqart']);
  	}
  	if (isset($careqart['fecreq']))
  	{
  		if ($careqart['fecreq'])
  		{
  			try
  			{
  				$dateFormat = new sfDateFormat($this->getUser()->getCulture());
  				if (!is_array($careqart['fecreq']))
  				{
  					$value = $dateFormat->format($careqart['fecreq'], 'i', $dateFormat->getInputPattern('d'));
  				}
  				else
  				{
  					$value_array = $careqart['fecreq'];
  					$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
  				}
  				$this->careqart->setFecreq($value);
  			}
  			catch (sfException $e)
  			{
  				// not a date
  			}
  		}
  		else
  		{
  			$this->careqart->setFecreq(null);
  		}
  	}
    if (isset($careqart['codcatreq']))
  	{
  		$this->careqart->setCodcatreq($careqart['codcatreq']);
    }  	
  	if (isset($careqart['desreq']))
  	{
  		$this->careqart->setDesreq($careqart['desreq']);
  	}
  	if (isset($careqart['monreq']))
  	{
  		$this->careqart->setMonreq($careqart['monreq']);
  	}

    if (isset($careqart['desubi']))
    {
      $this->careqart->setDesubi($careqart['desubi']);
    }
  }
  

  public function executeAutocomplete()
  {
  	if ($this->getRequestParameter('ajax')=='1')
  	{
		 	$this->tags=Herramientas::autocompleteAjax('CODUBI','Bnubibie','Codubi',trim($this->getRequestParameter('codcatreq')));    
  	} 	  	
  }
  
  public function executeAjax()
  {
  	$cajtexmos=$this->getRequestParameter('cajtexmos');
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';		 			 	    
      } 	
	    	  
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	  
  
}
