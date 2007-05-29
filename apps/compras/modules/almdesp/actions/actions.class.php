<?php

/**
 * almdesp actions.
 *
 * @package    siga
 * @subpackage almdesp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdespActions extends autoalmdespActions
{ 
/*  private static $coderror=-1; 
       	
  public function validateEdit()
  {  	 
  	if($this->getRequest()->getMethod() == sfRequest::POST)
    { 
    	$this->cadphart = $this->getCadphartOrCreate();
    	$this->updateCadphartFromRequest();
    	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
	    	
    	self::$coderror=Articulos::validarAlmdesp($this->cadphart,$grid);
    	if (self::$coderror<>-1){	    		 	
    		return false;
    	}else return true;
    }else return true;   
  }*/  
	
  public function executeEdit()
  {
    $this->cadphart = $this->getCadphartOrCreate();
    $this->setVars();   
    $this->configGridConsulta();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadphartFromRequest();

      $this->saveCadphart($this->cadphart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdesp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdesp/list');
      }
      else
      {
        return $this->redirect('almdesp/edit?id='.$this->cadphart->getId());
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
    $this->cadphart = $this->getCadphartOrCreate();
    $this->updateCadphartFromRequest();

    $this->labels = $this->getLabels();
    /*if(!$this->validateEdit())
	    {
	     $err = Herramientas::obtenerMensajeError(self::$coderror);	    
	     $this->getRequest()->setError('caregart{codart}',$err);	
	    }*/

    return sfView::SUCCESS;
  }
  
  protected function updateCadphartFromRequest()
  {
    $cadphart = $this->getRequestParameter('cadphart');
    $this->setVars();   
    $this->configGridConsulta();
    $this->executeGrid();

    if (isset($cadphart['dphart']))
    {
      $this->cadphart->setDphart($cadphart['dphart']);
    }
    if (isset($cadphart['fecdph']))
    {
      if ($cadphart['fecdph'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cadphart['fecdph']))
          {
            $value = $dateFormat->format($cadphart['fecdph'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cadphart['fecdph'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cadphart->setFecdph($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cadphart->setFecdph(null);
      }
    }
    if (isset($cadphart['codalm']))
    {
      $this->cadphart->setCodalm($cadphart['codalm']);
    }
    if (isset($cadphart['nomalm']))
    {
      $this->cadphart->setNomalm($cadphart['nomalm']);
    }
    if (isset($cadphart['reqart']))
    {
      $this->cadphart->setReqart($cadphart['reqart']);
    }
    if (isset($cadphart['desreq']))
    {
      $this->cadphart->setDesreq($cadphart['desreq']);
    }
    if (isset($cadphart['fecreq']))
    {
      $this->cadphart->setFecreq($cadphart['fecreq']);
    }
    if (isset($cadphart['desdph']))
    {
      $this->cadphart->setDesdph($cadphart['desdph']);
    }
    if (isset($cadphart['codori']))
    {
      $this->cadphart->setCodori($cadphart['codori']);
    }
    if (isset($cadphart['nomcat']))
    {
      $this->cadphart->setDescat($cadphart['nomcat']);
    }
    if (isset($cadphart['mondph']))
    {
      $this->cadphart->setMondph($cadphart['mondph']);
    }
    
      $this->cadphart->setStadph('A');
    
    if (isset($cadphart['dphart']))
    {
      $this->cadphart->setNumcom('D'&(substr($cadphart['dphart'],1,strlen($cadphart['dphart']))));
    }
    if (isset($cadphart['dphart']))
    {
      $this->cadphart->setRefpag($cadphart['dphart']);
    }
    if (isset($cadphart['tipdph']))
    {
      $this->cadphart->setTipdph($cadphart['tipdph']);
    }
    if (isset($cadphart['codcli']))
    {
      $this->cadphart->setCodcli($cadphart['codcli']);
    }
    if (isset($cadphart['obsdph']))
    {
      $this->cadphart->setObsdph($cadphart['obsdph']);
    }
    if (isset($cadphart['fordesp']))
    {
      $this->cadphart->setFordesp($cadphart['fordesp']);
    }
    if (isset($cadphart['reapor']))
    {
      $this->cadphart->setReapor($cadphart['reapor']);
    }
    if (isset($cadphart['fecanu']))
    {
      if ($cadphart['fecanu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($cadphart['fecanu']))
          {
            $value = $dateFormat->format($cadphart['fecanu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cadphart['fecanu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cadphart->setFecanu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cadphart->setFecanu(null);
      }
    }
  }
  
  protected function saveCadphart($cadphart)
  {
  	$grid2=Herramientas::CargarDatosGrid($this,$this->obj);

	  	Articulos::salvarAlmdesp($cadphart,$grid2);
    //$cadphart->save();

  }
  
 protected function getCadphartOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadphart = new Cadphart();
    }
    else
    {
      $cadphart = CadphartPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($cadphart);
    }

    return $cadphart;
  }  
  
    public function configGrid($codigo)
	{
      $c = new Criteria();
      $c->add(CaartreqPeer::REQART,$codigo);
      $per = CaartreqPeer::doSelect($c);
	  
	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid 
        $opciones->setEliminar(false);
        $opciones->setTabla('Caartreq');
        $opciones->setAnchoGrid(1500);
        $opciones->setTitulo('Detalle del Despacho');
        $opciones->setHTMLTotalFilas(' ');
        // Se generan las columnas
        $col1 = new Columna('Código del Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="20" disabled=true');        
        
        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30" disabled=true');
        
        $col3 = new Columna('Cant. Desp');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setNombreCampo('canreq');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="10"');
        $col3->setJScript('onKeypress="entermonto(event,this.id)"');
        $col3->setEsTotal(true,'totalcantd');
        
        $col4 = clone $col3;
        $col4->setTitulo('Cant. No Desp');
        $col4->setNombreCampo('canrec');
        $col4->setHTML('type="text" size="10" disabled=true');
        $col4->setJScript('');
        $col4->setEsTotal(true,'totalcantnd');
        
        $col5 = clone $col3;
        $col5->setTitulo('Costo');
        $col5->setNombreCampo('montot'); 
        $col5->setHTML('type="text" size="10" disabled=true');
        $col5->setJScript('');       
        $col5->setEsTotal(true,'cadphart_mondph');
        $col5->setEsTotal(true,'totalcosto');
        
        $col6 = clone $col1;
        $col6->setTitulo('Cód. Unidad');
        $col6->setNombreCampo('codcat');     
                
        $col7 = clone $col2;
        $col7->setTitulo('U. Medida');
        $col7->setNombreCampo('unimed');        
        
        $col8 = new Columna('Cod. Motivo');
        $col8->setTipo(Columna::TEXTO);
        $col8->setEsGrabable(true);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setNombreCampo('relart');
        $col8->setCatalogo('camotfal','sf_admin_edit_form','9');
        $col8->setAjax(4,9);      
        
        $col9 = clone $col2;
        $col9->setTitulo('Descripción');
        $col9->setNombreCampo('desfal');
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per); 
	}
  
	public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';		 			 	    
	    } 
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	  		$dato=CareqartPeer::getRequision($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';		 			 	    
	    } 		  	    
		else  if ($this->getRequestParameter('ajax')=='3')
	    {
	  		$dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';		 			 	    
	    }
	    else  if ($this->getRequestParameter('ajax')=='4')
	    {
	  		$dato=CamotfalPeer::getMotivo($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';		 			 	    
	    }	    		  	    

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
 
	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',$this->getRequestParameter('cadphart[codalm]'));
	    } 
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$this->tags=Herramientas::autocompleteAjax('REQART','Careqart','Reqart',$this->getRequestParameter('cadphart[reqart]'));
	    }
	    else  if ($this->getRequestParameter('ajax')=='3')
	    {
	    	$this->tags=Herramientas::autocompleteAjax('CODCAT','Npcatpre','Codcat',trim($this->getRequestParameter('cadphart[codori]')));
	    }	    	   
	}
	
    public function executeGrid()
	{
		 $cajtexmos=$this->getRequestParameter('cajtexmos');
	     $cajtexcom=$this->getRequestParameter('cajtexcom');
		if ($this->getRequestParameter('ajax')=='2')
		{			
	        $dato=CareqartPeer::getRequision($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","8","c"]]';		 
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            ////            
            $this->configGrid($this->getRequestParameter('codigo')); 		 			 	   
		}
	}

   public function configGridConsulta()
	 {
       //////////////////////
       //GRID
	   $c = new Criteria();
	   $c->add(CaartdphPeer::DPHART,$this->cadphart->getReqart());
	   $per = CaartdphPeer::doSelect($c);
				
        // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid 
        $opciones->setEliminar(false);
        $opciones->setTabla('Caartdph');
        $opciones->setAnchoGrid(1500);
        $opciones->setTitulo('Detalle del Despacho');
        $opciones->setHTMLTotalFilas(' ');
        // Se generan las columnas
        $col1 = new Columna('Código del Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="20" disabled=true');        
        
        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30" disabled=true');
        
        $col3 = new Columna('Cant. Desp');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setNombreCampo('candph');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="10"');
        $col3->setJScript('onKeypress="entermonto(event,this.id)"');
        $col3->setEsTotal(true,'totalcantd');
        
        $col4 = clone $col3;
        $col4->setTitulo('Cant. No Desp');
        $col4->setNombreCampo('candev');
        $col4->setHTML('type="text" size="10" disabled=true');
        $col4->setJScript('');
        $col4->setEsTotal(true,'totalcantnd');
        
        $col5 = clone $col3;
        $col5->setTitulo('Costo');
        $col5->setNombreCampo('montot'); 
        $col5->setHTML('type="text" size="10" disabled=true');
        $col5->setJScript('');       
        $col5->setEsTotal(true,'cadphart_mondph');
        $col5->setEsTotal(true,'totalcosto');
        
        $col6 = clone $col1;
        $col6->setTitulo('Cód. Unidad');
        $col6->setNombreCampo('codcat');     
                
        $col7 = clone $col2;
        $col7->setTitulo('U. Medida');
        $col7->setNombreCampo('unimed');        
        
        $col8 = new Columna('Cod. Motivo');
        $col8->setTipo(Columna::TEXTO);
        $col8->setEsGrabable(true);
        $col8->setAlineacionObjeto(Columna::CENTRO);
        $col8->setAlineacionContenido(Columna::CENTRO);
        $col8->setNombreCampo('codfal');
        $col8->setCatalogo('camotfal','sf_admin_edit_form','9');
        $col8->setAjax(4,9);      
        
        $col9 = clone $col2;
        $col9->setTitulo('Descripción');
        $col9->setNombreCampo('desfal');
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per); 
	}	
	
  public function setVars()
  {
	$this->mascaraarticulo = Herramientas::getMascaraArticulo();
	$this->mascarapartida = Herramientas::getMascaraPartida();		
  }
  
  protected function getLabels()
  {
    return array(
      'cadphart{dphart}' => 'Número',
      'cadphart{fecdph}' => 'Fecha',
      'cadphart{codalm}' => 'Código de Almacén',
      'cadphart{nomalm}' => 'Nombre Almacén',
      'cadphart{reqart}' => 'Refiere a Solicitud de Materiales',
      'cadphart{desreq}' => 'Descripción',
      'cadphart{fecreq}' => 'Fecha de Requisión',
      'cadphart{desdph}' => 'Descripción',
      'cadphart{codori}' => 'Unidad de Origen',
      'cadphart{nomcat}' => 'Descripción',
      'cadphart{mondph}' => 'Monto Total',
      'cadphart{stadph}' => 'Estatus',
      'cadphart{numcom}' => 'Numerocom',
      'cadphart{refpag}' => 'refpago',
      'cadphart{tipdph}' => 'Tipodesp',
      'cadphart{codcli}' => 'codigo',
      'cadphart{obsdph}' => 'Observacion',
      'cadphart{fordesp}' => 'fordes',
      'cadphart{reapor}' => 'reapor',
      'cadphart{fecanu}' => 'fechaanu',
    );
  }
  
  
}