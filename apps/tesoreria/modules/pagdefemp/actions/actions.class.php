<?php

/**
 * pagdefemp actions.
 *
 * @package    siga
 * @subpackage pagdefemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagdefempActions extends autopagdefempActions
{
  public function getNomemp()
  {
  	  $c = new Criteria;
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $this->empresa = EmpresaPeer::doSelect($c);
  	  if ($this->empresa)
	    return $this->empresa[0]->getNomemp();
	  else 
	    return ' ';
  }
  
  public function getDescta1()
  {
  	  $c = new Criteria;
  	  $c->add(ContabbPeer::CODCTA,str_pad($this->opdefemp->getCtapag(),32,' '));
  	  $this->cuenta = ContabbPeer::doSelect($c);
  	  if ($this->cuenta)
	    return $this->cuenta[0]->getDescta();
	  else 
	    return ' ';
  }
  
  public function getDescta2()
  {
      $c = new Criteria;
  	  $c->add(ContabbPeer::CODCTA,str_pad($this->opdefemp->getCtades(),32,' '));
  	  $this->cuenta = ContabbPeer::doSelect($c);
  	  if ($this->cuenta)
	    return $this->cuenta[0]->getDescta();
	  else 
	    return ' ';
  }
  
  public function executeEdit()
  {
    $this->opdefemp = $this->getOpdefempOrCreate();
    $this->nomemp = $this->getNomemp();
    $this->descta1 = $this->getDescta1();
    $this->descta2 = $this->getDescta2();
    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpdefempFromRequest();

      $this->saveOpdefemp($this->opdefemp);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagdefemp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagdefemp/list');
      }
      else
      {
        return $this->redirect('pagdefemp/edit?id='.$this->opdefemp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
    
  }

  protected function updateOpdefempFromRequest()
  {
    $opdefemp = $this->getRequestParameter('opdefemp');

    if (isset($opdefemp['codemp']))
    {
      $this->opdefemp->setCodemp($opdefemp['codemp']);
    }
    if (isset($opdefemp['ctapag']))
    {
      $this->opdefemp->setCtapag(str_pad($opdefemp['ctapag'],32,' '));
    }
    if (isset($opdefemp['ctades']))
    {
      $this->opdefemp->setCtades(str_pad($opdefemp['ctades'],32,' '));
    }
    if (isset($opdefemp['numini']))
    {
      $this->opdefemp->setNumini($opdefemp['numini']);
    }
    if (isset($opdefemp['ordnom']))
    {
      $this->opdefemp->setOrdnom($opdefemp['ordnom']);
    }
    if (isset($opdefemp['ordobr']))
    {
      $this->opdefemp->setOrdobr($opdefemp['ordobr']);
    }
    if (isset($opdefemp['unitri']))
    {
      $this->opdefemp->setUnitri($opdefemp['unitri']);
    }
    
    $this->opdefemp->setVercomret($this->getRequestParameter('vercomret'));
    
    $this->opdefemp->setGenctaord($this->getRequestParameter('genctaord'));
    
    $this->opdefemp->setGencomadi($this->getRequestParameter('gencomadi'));
    
    $this->opdefemp->setGencaubon($this->getRequestParameter('gencaubon'));
      
    if (isset($opdefemp['forubi']))
    {
      $this->opdefemp->setForubi($opdefemp['forubi']);
    }
    if (isset($opdefemp['tipeje']))
    {
      $this->opdefemp->setTipeje($opdefemp['tipeje']);
    }
    if (isset($opdefemp['ordliq']))
    {
      $this->opdefemp->setOrdliq($opdefemp['ordliq']);
    }
    
    
    /*if (isset($opdefemp['unidad']))
    {
      $this->opdefemp->setUnidad($opdefemp['unidad']);
    }
    if (isset($opdefemp['ctavaca']))
    {
      $this->opdefemp->setCtavaca($opdefemp['ctavaca']);
    }
    if (isset($opdefemp['ctabono']))
    {
      $this->opdefemp->setCtabono($opdefemp['ctabono']);
    }
    if (isset($opdefemp['coriva']))
    {
      $this->opdefemp->setCoriva($opdefemp['coriva']);
    }
    if (isset($opdefemp['tipaju']))
    {
      $this->opdefemp->setTipaju($opdefemp['tipaju']);
    }
    if (isset($opdefemp['tipmov']))
    {
      $this->opdefemp->setTipmov($opdefemp['tipmov']);
    }
    if (isset($opdefemp['numaut']))
    {
      $this->opdefemp->setNumaut($opdefemp['numaut']);
    }

* */
    
    
  }
  
  public function executeList()
  {
    $this->processSort();
    
    $this->nomemp = $this->getNomemp();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opdefemp/filters');

    // pager
    $this->pager = new sfPropelPager('Opdefemp', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  
}
