<?php

/**
 * nomasicaremplot actions.
 *
 * @package    siga
 * @subpackage nomasicaremplot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomasicaremplotActions extends autonomasicaremplotActions
{
	
	public function detalleSQL()    
    {
      if ($this->npnomina->getCodnom()!='')
      {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select A.CodEmp,A.NomEmp,A.CodCar,A.nomcar,A.codcat,A.nomcat,A.CodTipGas,B.DesTipGas From NPAsiCarEmp A, NpTipGas B Where A.CodTipGas=B.CodTipGas and CodNom='" . $this->npnomina->getCodnom() . "' AND STATUS='V' Order By CodEmp";                 
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
     else
     {
      return '';	
     }   
    }
	
   public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->detalles = $this->detalleSQL();
    if ($this->npnomina->getId())  $this->nuevo='N';
  	
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
    
      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomasicaremplot/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomasicaremplot/list');
      }
      else
      {
        return $this->redirect('nomasicaremplot/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
      if (!$this->npnomina->getId())  $this->nuevo='S';    
    }
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npnomina/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();	   
    $c->addJoin(NpasicarempPeer::CODNOM,NpnominaPeer::CODNOM);
    $c->Setdistinct();  
    $c->add(NpasicarempPeer::STATUS,'V');	 
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
}
