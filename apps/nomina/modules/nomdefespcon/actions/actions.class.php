<?php

/**
 * nomdefespcon actions.
 *
 * @package    siga
 * @subpackage nomdefespcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespconActions extends autonomdefespconActions
{
	public function getnompar()
	{
		$c = new Criteria;
		$this->campo = $this->npdefcpt->getcodpar();
		$c->add(NppartidasPeer::CODPAR, $this->campo);
		$this->nompar = NppartidasPeer::doSelect($c);
		if ($this->nompar)
		return $this->nompar[0]->getNompar();
		else
		return ' ';
	}

	public function executeEdit()
	{
		$this->npdefcpt = $this->getNpdefcptOrCreate();
		$this->nompar = $this->getnompar();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpdefcptFromRequest();

			$this->saveNpdefcpt($this->npdefcpt);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomdefespcon/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomdefespcon/list');
			}
			else
      {
        return $this->redirect('nomdefespcon/edit?id='.$this->npdefcpt->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }	
	
	protected function updateNpdefcptFromRequest()
	{
		$npdefcpt = $this->getRequestParameter('npdefcpt');

		if (isset($npdefcpt['codcon']))
		{
			$this->npdefcpt->setCodcon(str_pad($npdefcpt['codcon'],3,'0',STR_PAD_LEFT));	
		}
		if (isset($npdefcpt['nomcon']))
		{
			$this->npdefcpt->setNomcon($npdefcpt['nomcon']);
		}
		if (isset($npdefcpt['codpar']))
		{
			$this->npdefcpt->setCodpar($npdefcpt['codpar']);
		}
		$checkbox=$this->getRequestParameter('checkbox1');
		if (isset($checkbox))
		{
			$this->npdefcpt->setOpecon($this->getRequestParameter('checkbox1'));
		}
		$checkbox=$this->getRequestParameter('checkbox4');
		if (isset($checkbox))
		{
			$this->npdefcpt->setAcuhis($this->getRequestParameter('checkbox4'));
		}
		$checkbox=$this->getRequestParameter('checkbox7');
		if (isset($checkbox))
		{
			$this->npdefcpt->setInimon($this->getRequestParameter('checkbox7'));
		}
		$checkbox=$this->getRequestParameter('checkbox2');
		if (isset($checkbox))
	    {
	    	$this->npdefcpt->setConact($this->getRequestParameter('checkbox2'));
	    }
	    $checkbox=$this->getRequestParameter('checkbox3');
	    if (isset($checkbox))
	    {			$this->npdefcpt->setImpcpt($this->getRequestParameter('checkbox3'));
	    }
	    $checkbox=$this->getRequestParameter('checkbox5');
	    if (isset($checkbox))
	    {
			$this->npdefcpt->setOrdpag($this->getRequestParameter('checkbox5'));
		}
		$checkbox=$this->getRequestParameter('checkbox6');
		if (isset($checkbox))
	    {
			$this->npdefcpt->setAfepre($this->getRequestParameter('checkbox6'));
		}
		if (isset($npdefcpt['frecon']))
    	{
      		$this->npdefcpt->setFrecon($npdefcpt['frecon']);
    	}
    /*if (isset($npdefcpt['nrocta']))
    {
      $this->npdefcpt->setNrocta($npdefcpt['nrocta']);
    }*/
  }	
}
