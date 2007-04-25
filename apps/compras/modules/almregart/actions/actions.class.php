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
	    	if (self::$coderror<>-1){
	    		return false;
	    	}else return true;
	    }else return true;   
	  }  
	 
	public function executeList()
	  {
	    $this->processSort();	    
	    $this->processFilters();
		$this->setVars();
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
	    $this->setVars();   
        $this->configGrid();
	
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
	    if (!$this->validateEdit())
	    {
	     $err = Herramientas::obtenerMensajeError(self::$coderror);
	    
	    $this->getRequest()->setError('caregart{codart}',$err);	
	    }   

	    return sfView::SUCCESS;
	  }  

	protected function updateCaregartFromRequest()
	  {
	    $caregart = $this->getRequestParameter('caregart');
	    
	    $this->setVars();
        $this->configGrid();
	
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
	  
	  public function configGrid()
	  {
	  	 //////////////////////
	    //GRID
	    $c = new Criteria();
		$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
		$per = CaartalmPeer::doSelect($c);
		
		$filas=17;
		$cabeza="Existencia por Almacenes";
		$eliminar=true;
		$titulos=array("Cod. Almacen","Descripción","Cod. Ubicacion","Ubicación","Exi. Mínima","Exi. Máxima","Exi. Actual","Reorden");
		$anchos=array("10%","20%","10%","20%","10%","10%","10%","10%");
		$alignf=array('center','left','center','left','right','right','right','right');
		$alignt=array('center','left','center','l0eft','right','right','right','right');
		$campos=array('Codalm','Nomalm','Codubi','Nomubi','Eximin','Eximax','Exiact','Ptoreo');
		$catalogos=array('Cadefalm-sf_admin_edit_form-x1-x2','','','','','','','');// por todas las columnas, si no tiene, se coloca vacio
		$ajax=array('1-x2-x1','','','','','','',''); //parametro-cajitamostrar-autocompletar
		$tipos=array('t','t','m','m','m','m'); //texto, monto, fecha --solo de los campos a grabar, no de todo el grid
		$montos=array("5","6","7","8");
		$totales=array("", "", "caregart_exitot", "");
		$mascaraubicacion=$this->mascaraubicacion;
		$html=array('type="text" size="5"','type="text" size="25" disabled=true','type="text" size="5"','type="text" size="25" disabled=true','type="text" size="10"','type="text" size="10"','type="text" size="10"','type="text" size="10"');
		$js=array('','','onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubicacion.chr(39).')" onBlur="javascript:cadena=rayitas(this.value);document.getElementById(this.id).value=cadena;"','','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"','onKeypress="entermonto(event,this.id)"');
		$grabar=array("1","3","5","6","7","8");
		$filatotal='';
		 
		
		$this->obj=array('cabeza'=>$cabeza, 'filas'=>$filas, 'eliminar'=>$eliminar, 'titulos'=>$titulos, 
		'anchos'=>$anchos, 'alignf'=>$alignf, 'alignt'=>$alignt, 'campos'=>$campos, 'catalogos' => $catalogos, 
		'ajax' => $ajax, 'tipos' => $tipos, 'montos'=>$montos, 'filatotal' => $filatotal, 'totales'=>$totales, 
		'html'=>$html, 'js'=>$js, 'datos'=>$per, 'grabar'=>$grabar);
		////////////////////// 
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
		$grid=Herramientas::CargarDatosGrid($this);

	  	Articulos::salvarAlmregart($caregart,$grid);    
	  } 

	public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';		 			 	    
	    } 		  	    

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 

	public function setVars()
	{
		$this->mascaraarticulo = Herramientas::getMascaraArticulo();
	    $this->mascaracontabilidad = Herramientas::getMascaraContable();    
	    $this->mascarapartida = Herramientas::getMascaraPartida();
		$this->mascaraubicacion = Herramientas::getMascaraUbicacion();
		
	}
  	
	
}
	  
