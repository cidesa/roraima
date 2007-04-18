<?php

/**
 * almregart actions.
 *
 * @package    siga
 * @subpackage almregart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almregartActions extends autoalmregartActions
{ 
    private static $coderror=-1;
    
	public function validateEdit()
	  {  
	  	
	  	if($this->getRequest()->getMethod() == sfRequest::POST)
	    { 
	    	$this->caregart = $this->getCaregartOrCreate();
	    	$this->updateCaregartFromRequest();
	    	self::$coderror=Articulos::validarAlmregart($this->caregart);
	    	//print 'CodError='.self::$coderror;
	    	if (self::$coderror<>-1){
	    		return false;
	    	}else return true;
	    }else return true;   
	  }  
	public function getObtener_Mascaracontable()
	  {
	  	  $c = new Criteria();  	  
	  	  $this->conta = ContabaPeer::doSelect($c);
		  if ($this->conta)
		  	return $this->conta[0]->getForcta();
		  else 
		    return ' ';
	  }  
	public function getObtener_Mascarapartida()
	  {
	  	  $c = new Criteria();
	  	  $c->add(CpnivelesPeer::CATPAR,'P');
	  	  $c->addAscendingOrderByColumn(CpnivelesPeer::CONSEC);  	    	  
	  	  $this->par = CpnivelesPeer::doSelect($c);
	  	  $i=0; 
	  	  $formato="";
	  	  $ruptura="";  	  
	  	  while ($i<count($this->par))   	   
	  	   {
	  	   		$lon=$this->par[$i]->getLonniv();
	  	   		$num='';
	  	   		$j=0;
	  	   		while ($j<$lon)
	  	   		{
	  	   			$num=$num.'#';
	  	   		$j++;	
	  	   		}
	  	   		
	  	   		if ($i!=(count($this->par)-1))
	  	   		{
	  	   			$num=$num.'-';
	  	   		}
	
	  	   		$ruptura=$ruptura.$num;
	  	   		$i++;
	  	   }  	   
		  	return $ruptura;	 
	  }  
	public function getObtener_Mascaraubicacion()
	  {
	  	  $c = new Criteria();  	  
	  	  $this->ubi = CadefartPeer::doSelect($c);
		  if ($this->ubi)
		  	return $this->ubi[0]->getForubi();
		  else 
		    return ' ';
	  }	
	public function getObtener_Mascaraarticulo()
	  {
	  	  $c = new Criteria();  	  
	  	  $this->arti = CadefartPeer::doSelect($c);  	  
		  if ($this->arti)
		  	return str_pad($this->arti[0]->getForart(), 20 , ' ');
		  else 
		    return ' ';
	  }  
	public function getMostrar_Ramo()
	  {
	  	  $c = new Criteria;
	  	  $this->campo = str_pad($this->caregart->getRamart(),6,' ');
	  	  $c->add(CaramartPeer::RAMART, $this->campo);
	  	  $this->ram = CaramartPeer::doSelect($c);
		  if ($this->ram)
		  	return $this->ram[0]->getNomram();
		  else 
		    return ' ';
	  }	
	public function Existencia()    
	 { 
	    if ($this->caregart->getCodart()!='')
	    {
	        $con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
	        $sql = "SELECT DISTINCT caartalm.codalm, cadefalm.nomalm, cadefubi.nomubi, caartalm.eximin, caartalm.eximax, caartalm.exiact, caartalm.ptoreo FROM caartalm, caregart, cadefalm, cadefubi WHERE ((caartalm.codart='".($this->caregart->getCodart())."') AND (caartalm.codalm=cadefalm.codalm) AND (caartalm.codubi=cadefubi.codubi))";
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
	 
	public function executeList()
	  {
	    $this->processSort();
	    
	    $this->processFilters();
	    $this->mascaraarticulo = $this->getObtener_Mascaraarticulo();
	    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');
	
	    // pager
	    $this->pager = new sfPropelPager('Caregart', 5);
	    $c = new Criteria();
	    $this->addSortCriteria($c);
	    $this->addFiltersCriteria($c);
	    $this->pager->setCriteria($c);
	    $this->pager->setPage($this->getRequestParameter('page', 1));
	    $this->pager->init();
	  }
	public function executeEdit()
	  {  	
	    $this->caregart = $this->getCaregartOrCreate();   
	    $this->nom_ram = $this->getMostrar_Ramo();
	    $this->rs = $this->Existencia();    
	    $this->mascaraarticulo = $this->getObtener_Mascaraarticulo();
	    $this->mascaracontabilidad = $this->getObtener_Mascaracontable();    
	    $this->mascarapartida = $this->getObtener_Mascarapartida();
	    $this->mascaraubicacion = $this->getObtener_Mascaraubicacion();

	    //if($result) print count($obj); 
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCaregartFromRequest();
	
	      $this->saveCaregart($this->caregart);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almregart/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almregart/list');
	      }
	      else
	      {
	        return $this->redirect('almregart/edit?id='.$this->caregart->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }
	public function handleErrorEdit()
	  {  	 
	    $this->preExecute();
	    $this->caregart = $this->getCaregartOrCreate();
	    $this->updateCaregartFromRequest();
	    $this->labels = $this->getLabels();
	    
	    //print self::$coderror.'>>>===>>>';
	    
	    $err = Herramientas::obtenerMensajeError(self::$coderror);
	    
	    $this->getRequest()->setError('caregart{codart}',$err);

	    return sfView::SUCCESS;
	  }  
	protected function updateCaregartFromRequest()
	  {
	    $caregart = $this->getRequestParameter('caregart');
	    $this->nom_ram = $this->getMostrar_Ramo();
	    $this->rs = $this->Existencia();    
	    $this->mascaraarticulo = $this->getObtener_Mascaraarticulo();
	    $this->mascaracontabilidad = $this->getObtener_Mascaracontable();    
	    $this->mascarapartida = $this->getObtener_Mascarapartida();
	    $this->mascaraubicacion = $this->getObtener_Mascaraubicacion(); 
	
	    if (isset($caregart['codart']))
	    {
	      $this->caregart->setCodart(str_pad($caregart['codart'], 20 , ' '));
	    }
	    if (isset($caregart['tipo']))
	    {
	      $this->caregart->setTipo($caregart['tipo']);
	    }
	    if (isset($caregart['codcta']))
	    {
	      $this->caregart->setCodcta($caregart['codcta']);
	    }
	    if (isset($caregart['desart']))
	    {
	      $this->caregart->setDesart($caregart['desart']);
	    }
	    if (isset($caregart['ramart']))
	    {
	      $this->caregart->setRamart($caregart['ramart']);
	    }
	    if (isset($caregart['codpar']))
	    {
	      $this->caregart->setCodpar($caregart['codpar']);
	    }
	    if (isset($caregart['unimed']))
	    {
	      $this->caregart->setUnimed($caregart['unimed']);
	    }
	    if (isset($caregart['unialt']))
	    {
	      $this->caregart->setUnialt($caregart['unialt']);
	    }
	    if (isset($caregart['relart']))
	    {
	      $this->caregart->setRelart($caregart['relart']);
	    }
	    if (isset($caregart['exitot']))
	    {
	      $this->caregart->setExitot($caregart['exitot']);
	    }
	    if (isset($caregart['fecult']))
	    {
	      if ($caregart['fecult'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($caregart['fecult']))
	          {
	            $value = $dateFormat->format($caregart['fecult'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $caregart['fecult'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->caregart->setFecult($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->caregart->setFecult(null);
	      }
	    }
	    if (isset($caregart['cosult']))
	    {
	      $this->caregart->setCosult($caregart['cosult']);
	    }
	    if (isset($caregart['cospro']))
	    {
	      $this->caregart->setCospro($caregart['cospro']);
	    }
	    if (isset($caregart['invini']))
	    {
	      $this->caregart->setInvini($caregart['invini']);
	    }
	  }  
	protected function processFilters()
	  {
	    if ($this->getRequest()->hasParameter('filter'))
	    {
	      $filters = $this->getRequestParameter('filters');
	      
	      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/caregart/filters');
	      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/caregart/filters');
	    }
	  }
	protected function getLabels()
	  {
	    return array(
	      'caregart{codart}' => 'Codigo del Articulo:',
	      'caregart{tipo}' => 'Inicial:',
	      'caregart{codcta}' => 'Codigo Contable:',
	      'caregart{desart}' => 'Descripcion:',
	      'caregart{ramart}' => 'Ramo:',
	      'caregart{codpar}' => 'Partida:',
	      'caregart{unimed}' => 'Unidad Medida:',
	      'caregart{unialt}' => 'Unidad Alterna:',
	      'caregart{relart}' => 'Relacion:',
	      'caregart{exitot}' => 'Existencia Total:',
	      'caregart{fecult}' => 'Fecha Ult. Compra:',
	      'caregart{cosult}' => 'Ultimo:',
	      'caregart{cospro}' => 'Promedio:',
	      'caregart{invini}' => 'Inicial:',
	    );
	  } 
	protected function saveCaregart($caregart)
	  {
	    Articulos::salvarAlmregart($caregart);    
	  } 
	public function executeMostrardato()
	{
	  if ($this->getRequestParameter('par')=='1')
	    {
	  		$dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));
	  		$cajtexact='nom_ram';
            $cajtexcom='caregart_ramart';	  		 			 	    
	    } 		  	    
	    $output = '[["'.$cajtexact.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	  
	
	
}
	  
