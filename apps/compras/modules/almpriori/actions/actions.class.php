<?php

/**
 * almpriori actions.
 *
 * @package    siga
 * @subpackage almpriori
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almprioriActions extends autoalmprioriActions
{
   public function detallesSQL()    
    {
     if ($this->casolart->getReqart()!='')
     {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select A.codart,B.desart,E.costo,C.Priori,D.Nompro from CAArtSol A, CARegArt B,CaCotiza C,CAProvee D,CaDetCot E where A.CodArt=B.codart and A.ReqARt=C.RefSol and C.codpro=D.codpro and C.RefCot=E.RefCot and A.codart=E.codart and trim(A.ReqARt)='" .trim($this->casolart->getReqart()) . "' order by c.Codpro,a.codart";	
     
        $stmt = $con->createStatement();
        $stmt->setLimit(5000);
        $detalles = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
        $resultado=array();
        //aqui lleno el array con los resultados:
           while ($detalles->next())
             {
                $resultado[]=$detalles->getRow();
             }
        //y la envio al template:
	    $this->detalles=$resultado;
         return $this->detalles;
     }
     else
     {
      return '';	
     }
    }
    
    
 public function executeEdit()
  {
    $this->casolart = $this->getCasolartOrCreate();
    $this->detalles = $this->detallesSQL();
    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCasolartFromRequest();

      $this->saveCasolart($this->casolart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almpriori/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almpriori/list');
      }
      else
      {
        return $this->redirect('almpriori/edit?id='.$this->casolart->getId());
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/casolart/filters');

    // pager
    $this->pager = new sfPropelPager('Casolart', 8);
    $c = new Criteria();
    
    $c->addJoin(CasolartPeer::REQART, CacotizaPeer::REFSOL);
    $c->setDistinct();
    
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
	
}
