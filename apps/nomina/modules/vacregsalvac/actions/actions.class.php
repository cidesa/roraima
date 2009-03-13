<?php

/**
 * vacregsalvac actions.
 *
 * @package    siga
 * @subpackage vacregsalvac
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacregsalvacActions extends autovacregsalvacActions
{
	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nphojint/filters');

    // pager
    $this->pager = new sfPropelPager('Nphojint', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeEdit()
  {
    $this->nphojint = $this->getNphojintOrCreate();
    $this->PagerNpvacregsalActuales = $this->nphojint->getPagerOfNpvacregsalActuales($this->getRequestParameter('pageactual',1)); 
    $this->PagerNpvacregsalHistoricos = $this->nphojint->getPagerOfNpvacregsalHistoricos($this->getRequestParameter('pagehistorico',1));

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNphojintFromRequest();

      $this->saveNphojint($this->nphojint);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vacregsalvac/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vacregsalvac/list');
      }
      else
      {
        return $this->redirect('vacregsalvac/edit?id='.$this->nphojint->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function saveNphojint($nphojint)
  {
    
  	//$nphojint->save();

  }
	
  protected function deleteNphojint($nphojint)
  {
    //$nphojint->delete();
  }
  
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::CODEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::CODEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codemp']) && $this->filters['codemp'] !== '')
    {
      $c->add(NphojintPeer::CODEMP, strtr($this->filters['codemp'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['nomemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::NOMEMP, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::NOMEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomemp']) && $this->filters['nomemp'] !== '')
    {
      $c->add(NphojintPeer::NOMEMP, strtr($this->filters['nomemp'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['fecing_is_empty']))
    {
      $criterion = $c->getNewCriterion(NphojintPeer::FECING, '');
      $criterion->addOr($c->getNewCriterion(NphojintPeer::FECING, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecing']))
    {
      if (isset($this->filters['fecing']['from']) && $this->filters['fecing']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(NphojintPeer::FECING, date('Y-m-d', $this->filters['fecing']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecing']['to']) && $this->filters['fecing']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(NphojintPeer::FECING, date('Y-m-d', $this->filters['fecing']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(NphojintPeer::FECING, date('Y-m-d', $this->filters['fecing']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['codcar_is_empty']))
    {
      //$criterion = $c->getNewCriterion(NphojintPeer::CODCAR, '');
      //$criterion->addOr($c->getNewCriterion(NphojintPeer::CODCAR, null, Criteria::ISNULL));
      //$c->add($criterion);
    }
    else if (isset($this->filters['codcar']) && $this->filters['codcar'] !== '')
    {
    	$c->addJoin(NpasicarempPeer::CODEMP, NphojintPeer::CODEMP);
    	//$c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
		$c->add(NpasicarempPeer::CODCAR,strtr($this->filters['codcar'], '*', '%'), Criteria::LIKE);
      //$c->add(NphojintPeer::CODCAR, $this->filters['codcar']);
    }
    if (isset($this->filters['nomcar_is_empty']))
    {
      //$criterion = $c->getNewCriterion(NphojintPeer::NOMCAR, '');
      //$criterion->addOr($c->getNewCriterion(NphojintPeer::NOMCAR, null, Criteria::ISNULL));
      //$c->add($criterion);
    }
    else if (isset($this->filters['nomcar']) && $this->filters['nomcar'] !== '')
    {
    	$c->addJoin(NpasicarempPeer::CODEMP, NphojintPeer::CODEMP);
    	$c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
		$c->add(NpcargosPeer::NOMCAR,strtr($this->filters['nomcar'], '*', '%'), Criteria::LIKE);
    	
      //$c->add(NphojintPeer::NOMCAR, $this->filters['nomcar']);
    }
    if (isset($this->filters['codnom_is_empty']))
    {
      //$criterion = $c->getNewCriterion(NphojintPeer::CODNOM, '');
      //$criterion->addOr($c->getNewCriterion(NphojintPeer::CODNOM, null, Criteria::ISNULL));
      //$c->add($criterion);
    }
    else if (isset($this->filters['codnom']) && $this->filters['codnom'] !== '')
    {
    	$c->addJoin(NphojintPeer::CODEMP,NpasicarempPeer::CODEMP);
    	$c->add(NpasicarempPeer::CODNOM, strtr($this->filters['codnom'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['nomnom_is_empty']))
    {
      //$criterion = $c->getNewCriterion(NphojintPeer::NOMNOM, '');
      //$criterion->addOr($c->getNewCriterion(NphojintPeer::NOMNOM, null, Criteria::ISNULL));
      //$c->add($criterion);
    }
    else if (isset($this->filters['nomnom']) && $this->filters['nomnom'] !== '')
    {
    	$c->addJoin(NphojintPeer::CODEMP,NpasicarempPeer::CODEMP);
    	$c->add(NpasicarempPeer::NOMNOM, strtr($this->filters['nomnom'], '*', '%'), Criteria::LIKE);
    }
    
    $c->add(NphojintPeer::STAEMP,'R',Criteria::NOT_EQUAL);
    
  }
  
  
}
