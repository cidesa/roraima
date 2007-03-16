<?php

/**
 * almregrgo actions.
 *
 * @package    siga
 * @subpackage almregrgo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregrgoActions extends autoalmregrgoActions
{
	public function getnompre()
	{
		$c = new Criteria;
		$this->campo = str_pad($this->carecarg->getCodpre(),32,' ');
		$c->add(CpdeftitPeer::CODPRE, $this->campo);
		$this->nompre = CpdeftitPeer::doSelect($c);
		if ($this->nompre)
		return $this->nompre[0]->getNompre();
		else
		return ' ';
	}

	public function getdescta()
	{
		$c = new Criteria;
		$this->campo = $this->carecarg->getCodcta();
		#str_pad($this->carecarg->getCodcta(),32,' ');
		$c->add(ContabbPeer::CODCTA, $this->campo);
		$this->descta = ContabbPeer::doSelect($c);
		if ($this->descta)
		return $this->descta[0]->getDescta();
		else
		return ' ';
	}

	public function executeEdit()
	{
		$this->carecarg = $this->getCarecargOrCreate();
		$this->nompre = $this->getnompre();
		$this->descta = $this->getdescta();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCarecargFromRequest();

      $this->saveCarecarg($this->carecarg);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almregrgo/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almregrgo/list');
      }
      else
      {
        return $this->redirect('almregrgo/edit?id='.$this->carecarg->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

    protected function updateCarecargFromRequest()
	  {
	    $carecarg = $this->getRequestParameter('carecarg');
	
	    if (isset($carecarg['codrgo']))
        {
          $this->carecarg->setCodrgo($carecarg['codrgo']);
        }	    	    
	    if (isset($carecarg['nomrgo']))
	    {
	      $this->carecarg->setNomrgo($carecarg['nomrgo']);
	    }
	    if (isset($carecarg['codpre']))
	    {
	      $this->carecarg->setCodpre(str_pad($carecarg['codpre'],32,' '));
	    }
	    //if (isset($carecarg['tiprgo']))
	    //{
	      //$this->carecarg->setTiprgo($carecarg['tiprgo']);
	      $this->carecarg->setTiprgo($this->getRequestParameter('checkbox1'));
	    //}
	    if (isset($carecarg['monrgo']))
	    {
	      $this->carecarg->setMonrgo($carecarg['monrgo']);
	    }
	    if (isset($carecarg['codcta']))
	    {
	      $this->carecarg->setCodcta(str_pad($carecarg['codcta'],32,' '));  	
	    }
	  }  

}
