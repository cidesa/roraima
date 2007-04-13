<?php

/**
 * ingasiini actions.
 *
 * @package    siga
 * @subpackage ingasiini
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingasiiniActions extends autoingasiiniActions
{

    public function periodo2()    
    {
    if ($this->ciasiini->getCodpre()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT perpre, monasi FROM ciasiini where rpad(codpre,32,' ') ='".(str_pad($this->ciasiini->getCodpre(),32,' '))."' and perpre<>'00' order by perpre";
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
    }
    
	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();
    // pager
    $this->pager = new sfPropelPager('Ciasiini', 20);
    $c = new Criteria();
    $c->add(CiasiiniPeer::PERPRE, '01');
    $c->addJoin(CiasiiniPeer::CODPRE, CideftitPeer::CODPRE);
    //$c->setDistinct(); 
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeEdit()
  {
    $this->ciasiini = $this->getCiasiiniOrCreate();
    
    $c = new Criteria();
	$c->add(CiasiiniPeer::CODPRE,str_pad($this->ciasiini->getCodpre(),32,' '));
	$c->add(CiasiiniPeer::PERPRE,'00',Criteria::NOT_EQUAL);
	$c->addAscendingOrderByColumn(CiasiiniPeer::PERPRE);
	$this->per = CiasiiniPeer::doSelect($c);
	

    //$this->per = $this->periodo();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCiasiiniFromRequest();

      $this->saveCiasiini($this->ciasiini);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('ingasiini/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('ingasiini/list');
      }
      else
      {
        return $this->redirect('ingasiini/edit?id='.$this->ciasiini->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
    protected function updateCiasiiniFromRequest()
    {
    $ciasiini = $this->getRequestParameter('ciasiini');

    if (isset($ciasiini['codpre']))
    {
      $this->ciasiini->setCodpre(str_pad($ciasiini['codpre'],32,' '));
    }
    if (isset($ciasiini['nompre']))
    {
      $this->ciasiini->setNompre($ciasiini['nompre']);
    }
    if (isset($ciasiini['anopre']))
    {
      $this->ciasiini->setAnopre($ciasiini['anopre']);
    }
    $this->ciasiini->setPerpre('02');
    $this->ciasiini->setMonasi(250);
    $this->ciasiini->setMonprc(0);
    $this->ciasiini->setMoncom(0);
    $this->ciasiini->setMoncau(0);
    $this->ciasiini->setMonpag(0);
    $this->ciasiini->setMontra(0);
    $this->ciasiini->setMonadi(0);
    $this->ciasiini->setMondim(0);
    $this->ciasiini->setMonaju(0);
    $this->ciasiini->setMondis(250);
    $this->ciasiini->setDifere(0);
    $this->ciasiini->setStatus('A');
    
    
  }
  
    
}
