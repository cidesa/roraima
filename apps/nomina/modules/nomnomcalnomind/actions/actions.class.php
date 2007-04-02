<?php

/**
 * nomnomcalnomind actions.
 *
 * @package    siga
 * @subpackage nomnomcalnomind
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnomcalnomindActions extends autonomnomcalnomindActions
{
		public function Nolouso()
  {
  	  $c = new Criteria;
  	  $c->add(NpconahoPeer::CODNOM,$this->npnomcal->getCodnom());
  	  $c->add(NpconahoPeer::TIPCON,'A');
  	  $this->misdatos = NpconahoPeer::doSelect($c);
  	  if ($this->misdatos)
  	  {	  	
	  	 $this->misdatos= $this->misdatos[0]->getCodcon();	  	 
	  	 return  $this->misdatos;
  	  }	 
	  	else return ' ';	
  }
 
  public function Empleados()    
    {
    if ($this->npnomcal->getCodnom()!='')
    {
        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT nphojint.codemp, nphojint.nomemp from nphojint, npasicaremp, npnomcal  WHERE ((nphojint.codemp=npasicaremp.codemp) AND (npasicaremp.codnom='".($this->npnomcal->getCodnom())."'))";
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
	
    
  public function EmpleadosS()    
    {   
    	$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
        $sql = "SELECT 'K',nphojint.codemp, nphojint.nomemp from nphojint, npasicaremp  WHERE length(rtrim(npasicaremp.codemp))=length(rtrim(nphojint.codemp))";
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
    $this->npnomcal = $this->getNpnomcalOrCreate();
    $this->prueba = $this->Nolouso();
  if ($this->npnomcal->getId())
  	{
	  	 $this->rs = $this->Empleados();
	  	 $this->nuevo='N';
  	} 
  	else
  	{
  		 $this->rs = $this->EmpleadosS();
         $this->nuevo='S';
  	}

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateNpnomcalFromRequest();

      //$this->saveNpnomcal($this->npnomcal);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomnomcalnomind/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomnomcalnomind/list');
      }
      else
      {
        return $this->redirect('nomnomcalnomind/edit?id='.$this->npnomcal->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  
  protected function updateNpnomcalFromRequest()
  {
    $npnomcal = $this->getRequestParameter('npnomcal');

    if (isset($npnomcal['codnom']))
    {
      $this->npnomcal->setCodnom($npnomcal['codnom']);
    }
    if (isset($npnomcal['nomnom']))
    {
      $this->npnomcal->setNomnom($npnomcal['nomnom']);
    }
    if (isset($npnomcal['fecnom']))
    {
      if ($npnomcal['fecnom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomcal['fecnom']))
          {
            $value = $dateFormat->format($npnomcal['fecnom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomcal['fecnom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomcal->setFecnom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomcal->setFecnom(null);
      }
    }
    if (isset($npnomcal['fecnomdes']))
    {
      if ($npnomcal['fecnomdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npnomcal['fecnomdes']))
          {
            $value = $dateFormat->format($npnomcal['fecnomdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npnomcal['fecnomdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npnomcal->setFecnomdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomcal->setFecnomdes(null);
      }
    }
    if (isset($npnomcal['codemp']))
    {
      $this->npnomcal->setCodemp($npnomcal['codemp']);
    }
  }
  
public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npnomcal/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomcal', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
	
}
