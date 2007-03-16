<?php

/**
 * tesmovemiche actions.
 *
 * @package    siga
 * @subpackage tesmovemiche
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovemicheActions extends autotesmovemicheActions
{
  public function getNomcue()
  {
  	  $c = new Criteria;
  	  $c->add(TsdefbanPeer::NUMCUE,str_pad($this->tscheemi->getNumcue(),20,' '));
  	  $this->misdatos = TsdefbanPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getNomcue();
	  	else return ' ';	
  }
  public function getNomTipMov()
  {
  	  $c = new Criteria;
  	  $c->add(TstipmovPeer::CODTIP,str_pad($this->tscheemi->getTipdoc(),4,' '));
  	  $this->misdatos = TstipmovPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getDestip();
	  	else return ' ';	
  }
  public function getNombenefi()
  {
  	  $c = new Criteria;
  	  $c->add(OpbenefiPeer::CEDRIF,str_pad($this->tscheemi->getCedrif(),15,' '));
  	  $this->misdatos = OpbenefiPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getNomben();
	  	else return ' ';	
  } 
  
  public function cppagosSQL()    
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT refcau, despag, monpag FROM cppagos where rpad(refpag,20,' ') ='".(str_pad($this->tscheemi->getNumche(),20,' '))."'";
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($rs->next())
             {
                $resultado[]=$rs->getRow();
             }
        //y la envio al template:
        $this->rs=$resultado;
        return $this->rs;
    }
  public function executeEdit()
  {
    $this->tscheemi = $this->getTscheemiOrCreate();
    $this->nomcue = $this->getNomcue();
    $this->nomtipmov = $this->getNomTipMov();
    $this->nombenefi = $this->getNombenefi();
    $this->detpag = $this->cppagosSQL();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTscheemiFromRequest();

      $this->saveTscheemi($this->tscheemi);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesmovemiche/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesmovemiche/list');
      }
      else
      {
        return $this->redirect('tesmovemiche/edit?id='.$this->tscheemi->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  public function executeList()
  {
    $this->processSort();
    
    
    
    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/tscheemi/filters');

    // pager
    $this->pager = new sfPropelPager('Tscheemi', 8);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
   // $this->nomcue = 'prueba';//$this->getNomcue();
 //   $this->nombenefi = '02';// $this->getNombenefi();
  }
  
}
