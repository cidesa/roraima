<?php

/**
 * almdefart actions.
 *
 * @package    siga
 * @subpackage almdefart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdefartActions extends autoalmdefartActions
{
	public function getnomemp()
	{
		$c = new Criteria;
		$this->campo = $this->cadefart->getcodemp();
		$c->add(EmpresaPeer::CODEMP, $this->campo);
		$this->nomemp = EmpresaPeer::doSelect($c);
		if ($this->nomemp)
		return $this->nomemp[0]->getnomemp();
		else
		return ' ';
	}

 public function executeEdit()
 {
 	$this->cadefart = $this->getCadefartOrCreate();
    $this->nomemp = $this->getnomemp();

 	if ($this->getRequest()->getMethod() == sfRequest::POST)
 	{
 		$this->updateCadefartFromRequest();

 		$this->saveCadefart($this->cadefart);

 		$this->setFlash('notice', 'Your modifications have been saved');

 		if ($this->getRequestParameter('save_and_add'))
 		{
 			return $this->redirect('almdefart/create');
 		}
 		else if ($this->getRequestParameter('save_and_list'))
 		{
 			return $this->redirect('almdefart/list');
 		}
 		else
      {
        return $this->redirect('almdefart/edit?id='.$this->cadefart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   
  
	protected function updateCadefartFromRequest()
	{
		$cadefart = $this->getRequestParameter('cadefart');		
		
		if (isset($cadefart['codemp']))
		{
			$this->cadefart->setCodemp($cadefart['codemp']);
		}
		if (isset($cadefart['lonart']))
		{
			$this->cadefart->setLonart($cadefart['lonart']);
		}
		if (isset($cadefart['rupart']))
		{
			$this->cadefart->setRupart($cadefart['rupart']);
		}
		if (isset($cadefart['forart']))
		{
			$this->cadefart->setForart($cadefart['forart']);
		}
		if (isset($cadefart['desart']))
		{
			$this->cadefart->setDesart($cadefart['desart']);
		}
		if (isset($cadefart['forubi']))
		{
			$this->cadefart->setForubi($cadefart['forubi']);
		}
		if (isset($cadefart['desubi']))
		{
			$this->cadefart->setDesubi($cadefart['desubi']);
		}
		if (isset($cadefart['correq']))
		{
			$this->cadefart->setCorreq($cadefart['correq']);
		}
		if (isset($cadefart['corord']))
		{
			$this->cadefart->setCorord($cadefart['corord']);
		}
		if (isset($cadefart['correc']))
		{
			$this->cadefart->setCorrec($cadefart['correc']);
		}
		if (isset($cadefart['cordes']))
		{
			$this->cadefart->setCordes($cadefart['cordes']);
		}
	//	if (isset($cadefart['generaop']))
		//{
			//$this->cadefart->setGeneraop($cadefart['generaop']);
			  $this->cadefart->setGeneraop($this->getRequestParameter('radio2'));
						
		//}
		//if (isset($cadefart['asiparrec']))
		//{
		$this->cadefart->setAsiparrec($this->getRequestParameter('radio1'));
		//}
		//if (isset($cadefart['generacom']))
		//{
			$this->cadefart->setGeneracom($this->getRequestParameter('radio3'));
		//}
		if (isset($cadefart['mercon']))
		{
			$this->cadefart->setMercon($cadefart['mercon']);
		}
		if (isset($cadefart['ctadev']))
		{
			$this->cadefart->setCtadev($cadefart['ctadev']);
		}
		if (isset($cadefart['ctavco']))
		{
			$this->cadefart->setCtavco($cadefart['ctavco']);
		}
		if (isset($cadefart['univta']))
		{
			$this->cadefart->setUnivta($cadefart['univta']);
		}
		if (isset($cadefart['artven']))
		{
			$this->cadefart->setArtven($cadefart['artven']);
		}
		if (isset($cadefart['artins']))
		{
			$this->cadefart->setArtins($cadefart['artins']);
		}
		if (isset($cadefart['artser']))
		{
			$this->cadefart->setArtser($cadefart['artser']);
		}
		if (isset($cadefart['codalmven']))
		{
			$this->cadefart->setCodalmven($cadefart['codalmven']);
		}
		if (isset($cadefart['recart']))
		{
			$this->cadefart->setRecart($cadefart['recart']);
		}
		if (isset($cadefart['ordcom']))
		{
			$this->cadefart->setOrdcom($cadefart['ordcom']);
		}
		if (isset($cadefart['reqart']))
		{
			$this->cadefart->setReqart($cadefart['reqart']);
		}
		if (isset($cadefart['dphart']))
		{
			$this->cadefart->setDphart($cadefart['dphart']);
		}
		if (isset($cadefart['ordser']))
		{
			$this->cadefart->setOrdser($cadefart['ordser']);
		}
		if (isset($cadefart['tipimprec']))
		{
			$this->cadefart->setTipimprec($cadefart['tipimprec']);
		}
		if (isset($cadefart['artvenhas']))
		{
			$this->cadefart->setArtvenhas($cadefart['artvenhas']);
		}
		if (isset($cadefart['corcot']))
		{
			$this->cadefart->setCorcot($cadefart['corcot']);
		}
		if (isset($cadefart['solart']))
		{
			$this->cadefart->setSolart($cadefart['solart']);
		}
		if (isset($cadefart['apliclades']))
		{
			$this->cadefart->setApliclades($cadefart['apliclades']);
		}
		if (isset($cadefart['solcom']))
    {
      $this->cadefart->setSolcom($cadefart['solcom']);
    }
    if (isset($cadefart['unidad']))
    {
      $this->cadefart->setUnidad($cadefart['unidad']);
    }
  }	
}
