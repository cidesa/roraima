<?php

/**
 * almdespser actions.
 *
 * @package    siga
 * @subpackage almdespser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdespserActions extends autoalmdespserActions
{
	public function getdesreq()
	{
		$c = new Criteria;
		$this->campo = $this->cadphartser->getReqart();
		$c->add(CareqartserPeer::REQART, $this->campo);
		$this->desreq = CareqartserPeer::doSelect($c);
		if ($this->desreq)
		return $this->desreq[0]->getDesreq();
		else
		return ' ';
	}


	protected function updateCadphartserFromRequest()
	{
		$cadphartser = $this->getRequestParameter('cadphartser');

		if (isset($cadphartser['dphart']))
		{
			$this->cadphartser->setDphart($cadphartser['dphart']);
		}
		if (isset($cadphartser['desdph']))
		{
			$this->cadphartser->setDesdph($cadphartser['desdph']);
		}
		if (isset($cadphartser['reqart']))
		{
			$this->cadphartser->setReqart($cadphartser['reqart']);
		}
		if (isset($cadphartser['fecdph']))
		{
			if ($cadphartser['fecdph'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($cadphartser['fecdph']))
					{
						$value = $dateFormat->format($cadphartser['fecdph'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $cadphartser['fecdph'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->cadphartser->setFecdph($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->cadphartser->setFecdph(null);
			}
		}
		if (isset($cadphartser['codori']))
		{
			$this->cadphartser->setCodori($cadphartser['codori']);
    }
   // if (isset($cadphartser['stadph']))
   // {
   //   $this->cadphartser->setStadph($cadphartser['stadph']);
		$this->cadphartser->setStadph('A');
   // }
  }
	
	
	public function executeEdit()
	{
		$this->cadphartser = $this->getCadphartserOrCreate();
	    $this->desreq = $this->getdesreq();
	    
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCadphartserFromRequest();

			$this->saveCadphartser($this->cadphartser);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('almdespser/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('almdespser/list');
			}
			else
      {
        return $this->redirect('almdespser/edit?id='.$this->cadphartser->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  	
}
