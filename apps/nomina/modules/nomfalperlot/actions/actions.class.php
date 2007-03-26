<?php

/**
 * nomfalperlot actions.
 *
 * @package    siga
 * @subpackage nomfalperlot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomfalperlotActions extends autonomfalperlotActions
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
        $sql="Select A.codemp,B.nomemp,B.nomcar, C.DesMotFal from Npfalper A,NPAsiCarEmp B,NpMotFal C  where  A.codemp=B.codemp and a.codmot=c.codmotfal and  A.CodNom='".$this->npnomina->getCodnom()."' And A.fecdes='".$this->npnomina->getFecdes()."' ORDER BY A.CODEMP";                 
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
        $sql="Select distinct(A.CodEmp),A.NomEmp,A.nomcar,'Q','K' From NPAsiCarEmp A  order by A.codemp";
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
        return $this->redirect('nomfalperlot/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomfalperlot/list');
      }
      else
      {
        return $this->redirect('nomfalperlot/edit?id='.$this->npnomina->getId());
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npnomina/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpfalperPeer::CODNOM,NpnominaPeer::CODNOM);
    $c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
  
  public function executeDelete()
  {
    $this->npnomina = NpnominaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npnomina);

    return $this->redirect('nomfalperlot/list');
  }
  
	
}
