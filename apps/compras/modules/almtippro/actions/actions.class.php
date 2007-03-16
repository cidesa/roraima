<?php

/**
 * almtippro actions.
 *
 * @package    siga
 * @subpackage almtippro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almtipproActions extends autoalmtipproActions
{
  public function getDes_ctaord()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->catippro->getCtaord(),32,' ');
  	  $c->add(ContabbPeer::CODCTA, $this->campo);
  	  $this->nomcu = ContabbPeer::doSelect($c);
	  if ($this->nomcu)
	  	return $this->nomcu[0]->getDescta();
	  else 
	    return '<!Registro no Encontrado o vacio!> ';
  }
  public function getDes_ctaper()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->catippro->getCtaper(),32,' ');
  	  $c->add(ContabbPeer::CODCTA, $this->campo);  	  
  	  $this->nomcu = ContabbPeer::doSelect($c);
	  if ($this->nomcu)
	  	return $this->nomcu[0]->getDescta();
	  else 
	    return '<!Registro no Encontrado o vacio!> ';
  }  


  
  public function executeEdit()
  {
    $this->catippro = $this->getCatipproOrCreate();
    $this->des_ctaord = $this->getDes_ctaord();
    $this->des_ctaper = $this->getDes_ctaper();
        
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCatipproFromRequest();

      $this->saveCatippro($this->catippro);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almtippro/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almtippro/list');
      }
      else
      {
        return $this->redirect('almtippro/edit?id='.$this->catippro->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
  protected function updateCatipproFromRequest()
  {
    $catippro = $this->getRequestParameter('catippro');

    if (isset($catippro['codpro']))
    {
      $this->catippro->setCodpro($catippro['codpro']);
    }
    if (isset($catippro['despro']))
    {
      $this->catippro->setDespro($catippro['despro']);
    }
    if (isset($catippro['ctaord']))
    {
      $this->catippro->setCtaord(str_pad($catippro['ctaord'],32,' '));    	
    }
    if (isset($catippro['ctaper']))
    {
      $this->catippro->setCtaper(str_pad($catippro['ctaper'],32,' '));
    }
  }  
}
