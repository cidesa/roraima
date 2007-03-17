<?php

/**
 * almentalm actions.
 *
 * @package    siga
 * @subpackage almentalm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almentalmActions extends autoalmentalmActions
{
	public function getCadetent($rcpart)
	{
		$c = new Criteria();
		$c->add(CadetentPeer::RCPART,$rcpart);
		return CadetentPeer::doSelect($c);
		
	}
	
  public function executeEdit()
  {
    $this->caentalm = $this->getCaentalmOrCreate();
    $val = $this->caentalm->getRcpart();
    $this->cadetent = $this->getCadetent($val);

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaentalmFromRequest();

      $this->saveCaentalm($this->caentalm);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almentalm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almentalm/list');
      }
      else
      {
        return $this->redirect('almentalm/edit?id='.$this->caentalm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
