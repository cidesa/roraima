<?php

/**
 * asignarconceptosnomina actions.
 *
 * @package    siga
 * @subpackage asignarconceptosnomina
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class asignarconceptosnominaActions extends autoasignarconceptosnominaActions
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
        $sql="Select A.CodCon,B.NomCon,
   			 (CASE 	WHEN A.Frecon='P' THEN 'Primera Quincena'
					WHEN A.Frecon='S' THEN 'Segunda Quincena'
					WHEN A.Frecon='D' THEN 'Las Dos Quincenas'
					WHEN A.Frecon='1' THEN 'Primera Semana'
					WHEN A.Frecon='2' THEN 'Segunda Semana'
					WHEN A.Frecon='3' THEN 'Tercera Semana'
					WHEN A.Frecon='4' THEN 'Cuarta Semana'
					WHEN A.Frecon='U' THEN 'Ultima Semana'
					WHEN A.Frecon='T' THEN 'Todas las Semanas'
					WHEN A.Frecon='M' THEN 'Mensual' END),
			  case2(B.ConAct,'S','SI','NO') from NPAsiConNom A,NPDefCpt B where A.CodNom='".$this->npnomina->getCodnom()."' and A.CodCon=B.CodCon  ORDER BY A.CODCON";                 
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
        $sql="Select CodCon,NomCon,' ',case2(ConAct,'S','SI','NO'),'K' from NpdefCpt order by codcon";
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
        return $this->redirect('asignarconceptosnomina/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('asignarconceptosnomina/list');
      }
      else
      {
        return $this->redirect('asignarconceptosnomina/edit?id='.$this->npnomina->getId());
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
    $c->addJoin(NpasiconnomPeer::CODNOM,NpnominaPeer::CODNOM);
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

    
    return $this->redirect('asignarconceptosnomina/list');
  }
  
}
