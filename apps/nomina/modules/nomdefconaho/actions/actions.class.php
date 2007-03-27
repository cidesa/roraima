<?php

/**
 * nomdefconaho actions.
 *
 * @package    siga
 * @subpackage nomdefconaho
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefconahoActions extends autonomdefconahoActions
{
  public function getDatconaho()
  {
  	  $c = new Criteria;
  	  $c->add(NpconahoPeer::CODNOM,$this->npnomina->getCodnom());
  	  $c->add(NpconahoPeer::TIPCON,'D');
  	  $this->misdatos = NpconahoPeer::doSelect($c);
  	  if ($this->misdatos)
  	  {
	  	$mio[0]= $this->misdatos[0]->getCodcon();
	  	$mio[1]= $this->misdatos[0]->getTipnom();
	  	  $c1 = new Criteria;
	  	  $c1->add(NpdefcptPeer::CODCON,$this->misdatos[0]->getCodcon());	  	  
	  	  $this->otrosdatos = NpdefcptPeer::doSelect($c1);
	  	  if ($this->otrosdatos)
	  	  {	  	
		  	 $mio[2]= $this->otrosdatos[0]->getNomcon();
	  	  }	 
	  	  else $mio[2]='';
		  	
	  	 return $mio;
  	  }	 
	  	else return ' ';	
  }
  
  public function getAporte($tipo)
  {
  	  $c = new Criteria;
  	  $c->add(NpconahoPeer::CODNOM,$this->npnomina->getCodnom());
  	  $c->add(NpconahoPeer::TIPCON,$tipo);
  	  $this->misdatos = NpconahoPeer::doSelect($c);
  	  if ($this->misdatos)
  	  {	  	
	  	  $mio[0]= $this->misdatos[0]->getCodcon();
	  	  $c1 = new Criteria;
	  	  $c1->add(NpdefcptPeer::CODCON,$this->misdatos[0]->getCodcon());	  	  
	  	  $this->otrosdatos = NpdefcptPeer::doSelect($c1);
	  	  if ($this->otrosdatos)
	  	  {	  	
		  	 $mio[1]= $this->otrosdatos[0]->getNomcon();
	  	  }	 
	  	  else $mio[1]='';
		  	
	  	 return $mio;
  	  }	 
	  	else return ' ';	
  }
  
  public function getAjuaporte($tipo)
  {
  	  $c = new Criteria;
  	  $c->add(NpconahoPeer::CODNOM,$this->npnomina->getCodnom());
  	  $c->add(NpconahoPeer::TIPCON,$tipo);
  	  $this->misdatos = NpconahoPeer::doSelect($c);
  	  if ($this->misdatos)
  	  {	  	
	  	  $mio[0]= $this->misdatos[0]->getCodcon();
	  	  $c1 = new Criteria;
	  	  $c1->add(NpdefcptPeer::CODCON,$this->misdatos[0]->getCodcon());	  	  
	  	  $this->otrosdatos = NpdefcptPeer::doSelect($c1);
	  	  if ($this->otrosdatos)
	  	  {	  	
		  	 $mio[1]= $this->otrosdatos[0]->getNomcon();
	  	  }	 
	  	  else $mio[1]='';
		  	
	  	 return $mio;
  	  }	 
	  	else return ' ';	
  }
  
  public function getAjudeduccion($tipo)
  {
  	  $c = new Criteria;
  	  $c->add(NpconahoPeer::CODNOM,$this->npnomina->getCodnom());
  	  $c->add(NpconahoPeer::TIPCON,$tipo);
  	  $this->misdatos = NpconahoPeer::doSelect($c);
  	  if ($this->misdatos)
  	  {	  	
	  	  $mio[0]= $this->misdatos[0]->getCodcon();
	  	  $c1 = new Criteria;
	  	  $c1->add(NpdefcptPeer::CODCON,$this->misdatos[0]->getCodcon());	  	  
	  	  $this->otrosdatos = NpdefcptPeer::doSelect($c1);
	  	  if ($this->otrosdatos)
	  	  {	  	
		  	 $mio[1]= $this->otrosdatos[0]->getNomcon();
	  	  }	 
	  	  else $mio[1]='';
		  	
	  	 return $mio;
  	  }	 
	  	else return ' ';	
  }
   	
	public function detalleSQL()    
    {   	
      if ($this->npnomina->getCodnom()!='')
      {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select A.CodCon,B.NomCon from NPAsiConNom A,NPDefCpt B,npconaho C where A.CodNom='".$this->npnomina->getCodnom()."' and A.CodCon=B.CodCon  AND A.CodCon=C.CodCon and C.TipCon='S' ORDER BY A.CODCON";                 
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
    
    public function detalleSQLCreate()    
    {   	
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql="Select distinct(A.CodCon),B.NomCon,'K' from NPAsiConNom A,NPDefCpt B where A.CodCon=B.CodCon ORDER BY A.CODCON";       
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
  	if ($this->npnomina->getId())
  	{
  	 $this->detalles = $this->detalleSQL();
  	 $this->nuevo='N';
  	} 
  
    
    $this->datosconaho = $this->getDatconaho();
    $this->aporte = $this->getAporte('A');
    $this->ajudeduccion = $this->getAjudeduccion('J');
    $this->ajuaporte = $this->getAjuaporte('U');

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
    
      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefconaho/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefconaho/list');
      }
      else
      {
        return $this->redirect('nomdefconaho/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
      if (!$this->npnomina->getId())
      {
        $this->detalles = $this->detalleSQLCreate();
        $this->nuevo='S';
      } 
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
    $c->addJoin(NpconahoPeer::CODNOM,NpnominaPeer::CODNOM);
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


    return $this->redirect('nomdefconaho/list');
  }
  
}
