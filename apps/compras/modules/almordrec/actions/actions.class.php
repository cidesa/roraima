<?php

/**
 * almordrec actions.
 *
 * @package    siga
 * @subpackage almordrec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almordrecActions extends autoalmordrecActions
{
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';		 			 	    
	    } 
	   else if ($this->getRequestParameter('ajax')=='2')
	    {
	  		$dato=CaordcomPeer::getFecord($this->getRequestParameter('codigo'));
	  		$dato=date("d/m/Y",strtotime($dato));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","8","c"]]';		 			 	    
	    } 
	    
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
  
   public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',trim($this->getRequestParameter('carcpart[codalm]')));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('ORDCOM','Caordcom','Ordcom',trim($this->getRequestParameter('carcpart[ordcom]')));
	    }		   
	}

   public function executeGrid()
	{
        $cajtexcom=$this->getRequestParameter('cajtexcom');
		if ($this->getRequestParameter('ajax')=='2')
		{			
			$fecha=CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Fecord');
	  		$fecha=date("d/m/Y",strtotime($fecha));	  			 
	  		$codpro=CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Codpro');
	  		$nompro=CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Nompro');
	  		$conpag=CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Desconpag');
	  		$forent=CaordcomPeer::getDato($this->getRequestParameter('codigo'),'Desforent');
	  		$des="RECEP.".$this->getRequestParameter('numero');
            $output = '[["carcpart_fecord","'.$fecha.'",""],["carcpart_codpro","'.$codpro.'",""],["carcpart_nompro","'.$nompro.'",""],["carcpart_desconpag","'.$conpag.'",""],["carcpart_desforent","'.$forent.'",""],["carcpart_desrcp","'.$des.'",""],["'.$cajtexcom.'","8","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            ////            
            $this->configGrid($this->getRequestParameter('codigo')); 		 			 	   
		}
	}	 
	
  public function configGrid($codigo)
	 {
	//////////////////////
	//GRID
	$c = new Criteria();
	$c->add(CaartordPeer::ORDCOM,$codigo);
	$per = CaartordPeer::doSelect($c);
			
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid 
	$opciones->setEliminar(false);
	$opciones->setTabla('Caartord');
	$opciones->setAnchoGrid(100);
	$opciones->setTitulo('Detalle de la Recepción');
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas
	$col1 = new Columna('Código Articulo');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('codart');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);	
	$col1->setHTML('type="text" size="15" disabled=true');
	
	$col2 = new Columna('Descripción'); 
	$col2->setTipo(Columna::TEXTO);
	$col2->setNombreCampo('desart');	
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);		
	$col2->setHTML('type="text" size="40" disabled=true');
	
	$col3 = new Columna('Cant. Rec.');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('canrecgri');
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10"');
    
    $col4 = clone $col3;
    $col4->setTitulo('Cant. Falta.');
    $col4->setNombreCampo('');
    
    $col5 = clone $col3;
    $col5->setTitulo('Cant. Dev.');
    $col5->setNombreCampo(''); 

    $col6 = clone $col3;
    $col6->setTitulo('Costo');
    $col3->setEsNumerico(false);
    $col6->setNombreCampo('preart'); 
    
    $col7 = clone $col3;
    $col7->setTitulo('Descuento');
    $col7->setNombreCampo('');
    
    $col8 = clone $col3;
    $col8->setTitulo('Recargo');
    $col8->setNombreCampo('');

    $col9 = clone $col3;
    $col9->setTitulo('Total');
    $col9->setNombreCampo('montot');
    
    $col10 = new Columna('Cod. Unidad');
	$col10->setTipo(Columna::TEXTO);
	$col10->setEsGrabable(true);
	$col10->setNombreCampo('codcat');
	$col10->setAlineacionObjeto(Columna::CENTRO);
	$col10->setAlineacionContenido(Columna::CENTRO);	
	$col10->setHTML('type="text" size="15" disabled=true');
	
    $col11 = new Columna('Cod. Mot. Faltante');
	$col11->setTipo(Columna::TEXTO);
	$col11->setEsGrabable(true);
	$col11->setNombreCampo('');
	$col11->setAlineacionObjeto(Columna::CENTRO);
	$col11->setAlineacionContenido(Columna::CENTRO);	
	$col11->setHTML('type="text" size="5" disabled=true');
	
    $col12 = new Columna('Motivo Faltante');
	$col12->setTipo(Columna::TEXTO);
	$col12->setEsGrabable(true);
	$col12->setNombreCampo('');
	$col12->setAlineacionObjeto(Columna::CENTRO);
	$col12->setAlineacionContenido(Columna::CENTRO);	
	$col12->setHTML('type="text" size="20" disabled=true');
	
	$col13 = new Columna('Fecha Estimada');
	$col13->setTipo(Columna::TEXTO);
	$col13->setEsGrabable(true);
	$col13->setNombreCampo('');
	$col13->setAlineacionObjeto(Columna::CENTRO);
	$col13->setAlineacionContenido(Columna::CENTRO);	
	$col13->setHTML('type="text" size="10" disabled=true');
	
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
	$opciones->addColumna($col10);
	$opciones->addColumna($col11);
	$opciones->addColumna($col12);
	$opciones->addColumna($col13);
	
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->grid = $opciones->getConfig($per);
	}	
	
   public function configGridConsulta()
	 {
	//////////////////////
	//GRID
	$c = new Criteria();
	$c->add(CaartrcpPeer::RCPART,$this->carcpart->getRcpart());
	$per = CaartrcpPeer::doSelect($c);
				
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid 
	$opciones->setEliminar(false);
	$opciones->setTabla('Caartrcp');
	$opciones->setAnchoGrid(100);
	$opciones->setTitulo('Detalle de la Recepción');
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas
	$col1 = new Columna('Código Articulo');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('codart');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);	
	$col1->setHTML('type="text" size="15" disabled=true');
	
	$col2 = new Columna('Descripción'); 
	$col2->setTipo(Columna::TEXTO);
	$col2->setNombreCampo('desart');	
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);		
	$col2->setHTML('type="text" size="40" disabled=true');
	
	$col3 = new Columna('Cant. Rec.');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('canrec');
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10"');
    
    $col4 = clone $col3;
    $col4->setTitulo('Cant. Falta.');
    $col4->setNombreCampo('canfal');
    
    $col5 = clone $col3;
    $col5->setTitulo('Cant. Dev.');
    $col5->setNombreCampo('candev'); 

    $col6 = clone $col3;
    $col6->setTitulo('Costo');
    $col3->setEsNumerico(false);
    $col6->setNombreCampo('costos'); 
    
    $col7 = clone $col3;
    $col7->setTitulo('Descuento');
    $col7->setNombreCampo('mondes');
    
    $col8 = clone $col3;
    $col8->setTitulo('Recargo');
    $col8->setNombreCampo('monrgo');

    $col9 = clone $col3;
    $col9->setTitulo('Total');
    $col9->setNombreCampo('montot');
    $col9->setEsTotal(true,'carcpart_monrcp');
    
    $col10 = new Columna('Cod. Unidad');
	$col10->setTipo(Columna::TEXTO);
	$col10->setEsGrabable(true);
	$col10->setNombreCampo('codcat');
	$col10->setAlineacionObjeto(Columna::CENTRO);
	$col10->setAlineacionContenido(Columna::CENTRO);	
	$col10->setHTML('type="text" size="15" disabled=true');
	
    $col11 = new Columna('Cod. Mot. Faltante');
	$col11->setTipo(Columna::TEXTO);
	$col11->setEsGrabable(true);
	$col11->setNombreCampo('codfal');
	$col11->setAlineacionObjeto(Columna::CENTRO);
	$col11->setAlineacionContenido(Columna::CENTRO);	
	$col11->setHTML('type="text" size="5" disabled=true');
	
    $col12 = new Columna('Motivo Faltante');
	$col12->setTipo(Columna::TEXTO);
	$col12->setEsGrabable(true);
	$col12->setNombreCampo('desfal');
	$col12->setAlineacionObjeto(Columna::CENTRO);
	$col12->setAlineacionContenido(Columna::CENTRO);	
	$col12->setHTML('type="text" size="20" disabled=true');
	
	$col13 = new Columna('Fecha Estimada');
	$col13->setTipo(Columna::TEXTO);
	$col13->setEsGrabable(true);
	$col13->setNombreCampo('fecest');
	$col13->setAlineacionObjeto(Columna::CENTRO);
	$col13->setAlineacionContenido(Columna::CENTRO);	
	$col13->setHTML('type="text" size="10" disabled=true');
	
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
	$opciones->addColumna($col10);
	$opciones->addColumna($col11);
	$opciones->addColumna($col12);
	$opciones->addColumna($col13);
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->grid = $opciones->getConfig($per);
	}	
		
	
  public function executeEdit()
  {
    $this->carcpart = $this->getCarcpartOrCreate();
    $this->configGridConsulta();
	//$this->configGrid('OC000016');

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCarcpartFromRequest();

      $this->saveCarcpart($this->carcpart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almordrec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almordrec/list');
      }
      else
      {
        return $this->redirect('almordrec/edit?id='.$this->carcpart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  
  }
  
}
