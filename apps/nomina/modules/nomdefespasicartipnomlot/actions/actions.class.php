<?php

/**
 * nomdefespasicartipnomlot actions.
 *
 * @package    siga
 * @subpackage nomdefespasicartipnomlot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespasicartipnomlotActions extends autonomdefespasicartipnomlotActions
{
	public function Nolouso()
  {
  	  $c = new Criteria;
  	  $c->add(NpconahoPeer::CODNOM,$this->npnomina->getCodnom());
  	  $c->add(NpconahoPeer::TIPCON,'A');
  	  $this->misdatos = NpconahoPeer::doSelect($c);
  	  if ($this->misdatos)
  	  {	  	
	  	 $this->misdatos= $this->misdatos[0]->getCodcon();	  	 
	  	 return  $this->misdatos;
  	  }	 
	  	else return ' ';	
  }
 
	
	public function detalleSQL()    
    {   	
      if ($this->npnomina->getCodnom()!='')
      {	
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="select A.codcar,B.nomcar from npasicarnom A,npcargos B  where A.codcar=B.codcar and CodNom='".$this->npnomina->getCodnom()."' order by codcar";                 
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
    
     
   public function detalleCreate()    
    {   	
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select a.codcar,a.nomcar,'K' from npcargos a, npdefgen b where length(rtrim(a.codcar))=length(rtrim(b.forcar)) order by a.nomcar";
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
    $this->npnomina = $this->getNpnominaOrCreate();
        $this->prueba = $this->Nolouso();
    
 	if ($this->npnomina->getId())
  	{
	  	 $this->detalles = $this->detalleSQL();
	  	 $this->nuevo='N';
  	} 
  	else
  	{
  		 $this->detalles = $this->detalleCreate();
         $this->nuevo='S';
  	}
  	
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespasicartipnomlot/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespasicartipnomlot/list');
      }
      else
      {
        return $this->redirect('nomdefespasicartipnomlot/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->npnomina = NpnominaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npnomina);
  
    return $this->redirect('nomdefespasicartipnomlot/list');
  }
	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npnomina/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpasicarnomPeer::CODNOM,NpnominaPeer::CODNOM);
    $c->Setdistinct(); 
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  
  
}
