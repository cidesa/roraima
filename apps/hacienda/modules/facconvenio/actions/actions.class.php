<?php

/**
 * facconvenio actions.
 *
 * @package    Roraima
 * @subpackage facconvenio
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facconvenioActions extends autofacconvenioActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	  {
	    $this->fcconpag = $this->getFcconpagOrCreate();
	    $this->configGrid();
	    $this->configGrid2();
	    $this->configGrid3();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFcconpagFromRequest();
	
	      $this->saveFcconpag($this->fcconpag);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('facconvenio/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('facconvenio/list');
	      }
	      else
	      {
	        return $this->redirect('facconvenio/edit?id='.$this->fcconpag->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }	
	  
	/**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
	  {
	    $this->preExecute();
	    $this->fcconpag = $this->getFcconpagOrCreate();
	    $this->updateFcconpagFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFcconpagFromRequest()
	  {
	    $fcconpag = $this->getRequestParameter('fcconpag');
	    $this->configGrid();
	    $this->configGrid2();
	    $this->configGrid3();
	
	    if (isset($fcconpag['refcon']))
	    {
	      $this->fcconpag->setRefcon($fcconpag['refcon']);
	    }
	    if (isset($fcconpag['feccon']))
	    {
	      if ($fcconpag['feccon'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcconpag['feccon']))
	          {
	            $value = $dateFormat->format($fcconpag['feccon'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcconpag['feccon'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcconpag->setFeccon($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcconpag->setFeccon(null);
	      }
	    }
	    if (isset($fcconpag['rifcon']))
	    {
	      $this->fcconpag->setRifcon($fcconpag['rifcon']);
	    }
	    if (isset($fcconpag['nomcon']))
	    {
	      $this->fcconpag->setNomcon($fcconpag['nomcon']);
	    }
	    if (isset($fcconpag['dircon']))
	    {
	      $this->fcconpag->setDircon($fcconpag['dircon']);
	    }
	    if (isset($fcconpag['naccon']))
	    {
	      $this->fcconpag->setNaccon($fcconpag['naccon']);
	    }
	    if (isset($fcconpag['tipcon']))
	    {
	      $this->fcconpag->setTipcon($fcconpag['tipcon']);
	    }
	    if (isset($fcconpag['obscon']))
	    {
	      $this->fcconpag->setObscon($fcconpag['obscon']);
	    }
	    if (isset($fcconpag['moncon']))
	    {
	      $this->fcconpag->setMoncon($fcconpag['moncon']);
	    }
	    if (isset($fcconpag['funrec']))
	    {
	      $this->fcconpag->setFunrec($fcconpag['funrec']);
	    }
	    if (isset($fcconpag['fecrec']))
	    {
	      if ($fcconpag['fecrec'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcconpag['fecrec']))
	          {
	            $value = $dateFormat->format($fcconpag['fecrec'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcconpag['fecrec'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcconpag->setFecrec($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcconpag->setFecrec(null);
	      }
	    }
	    if (isset($fcconpag['numcuo']))
	    {
	      $this->fcconpag->setNumcuo($fcconpag['numcuo']);
	    }
	    if (isset($fcconpag['monini']))
	    {
	      $this->fcconpag->setMonini($fcconpag['monini']);
	    }
	    
	      $this->fcconpag->setEstcon('N');
	    
	  }	

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
	 {
	   
				//////////////////////
				//GRID
				//$c = new Criteria();
				//$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
				$per = array();//CaartalmPeer::doSelect($c);
				
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid 
	$opciones->setEliminar(false);
	$opciones->setTabla('Fcdeclar');
	$opciones->setAnchoGrid(1150);
	$opciones->setTitulo('');
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas
	$col1 = new Columna('Pagar');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('edodec');
	$col1->setAlineacionObjeto(Columna::CENTRO);
	$col1->setAlineacionContenido(Columna::CENTRO);	
	$col1->setHTML('type="text" size="5" disabled=true');
	
	$col2 = new Columna('Nro'); 
	$col2->setTipo(Columna::TEXTO);	
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);	
	$col2->setNombreCampo('numero');
	$col2->setHTML('type="text" size="5" disabled=true');
	
	$col3 = new Columna('Concepto');
	$col3->setTipo(Columna::TEXTO);
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setNombreCampo('fecing');	
	$col3->setHTML('type="text" size="25" disabled=true');
	
	$col4 = clone $col2; 
	$col4->setTitulo('Nro. Declaración');
	$col4->setNombreCampo('numdec');
	
	$col5 = clone $col3;
	$col5->setTitulo('Referencia');
	$col5->setNombreCampo('numref');
	
	$col6 = clone $col2;
	$col6->setTitulo('Nombre');
	$col6->setNombreCampo('nombre');
	
	$col7 = clone $col2;
	$col7->setTitulo('Vencimiento');
	$col7->setNombreCampo('fecven');
		
	$col8 = clone $col2;
	$col8->setTitulo('Frecuencia');
	$col8->setNombreCampo('tipo');
	
	$col9 = new Columna('Monto de la Deuda (A)');
	$col9->setTipo(Columna::MONTO);	
	$col9->setAlineacionContenido(Columna::IZQUIERDA);
	$col9->setAlineacionObjeto(Columna::IZQUIERDA);
	$col9->setNombreCampo('mondec');
	$col9->setEsNumerico(true);
	$col9->setHTML('type="text" size="10" disabled=true');

	$col10 = clone $col9;
	$col10->setTitulo('Monto Auto-Liquidación');
	$col10->setNombreCampo('autliq');
	
	$col11 = clone $col9;
	$col11->setTitulo('Monto de Mora (C)');
	$col11->setNombreCampo('mora');
	
	$col12 = clone $col9;
	$col12->setTitulo('Descuento Pronto Pago (D)');
	$col12->setNombreCampo('prontopg');
	
	$col13 = new Columna('Monto a Pagar (A+C-D)');	
	$col13->setTipo(Columna::MONTO);	
	$col13->setAlineacionContenido(Columna::IZQUIERDA);
	$col13->setAlineacionObjeto(Columna::IZQUIERDA);
	$col13->setEsNumerico(true);
	$col13->setHTML('name="montopg" id="montopg" type="text" size="10" disabled=true');
	
	$col14 = clone $col13;
	$col14->setTitulo('Monto Pagado Contribuyente (E)');	
	$col14->setHTML('name="montopgc" id="montopgc" type="text" size="10"');
	
	$col15 = clone $col13;
	$col15->setTitulo('Saldo (A+C-D)-E');	
	$col15->setHTML('name="saldo" id="saldo" type="text" size="10" disabled=true');	
	
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
	$opciones->addColumna($col14);
	$opciones->addColumna($col15);
	
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->obj = $opciones->getConfig($per);
				
			  
			}

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2()
	 {
	   
				//////////////////////
				//GRID
				//$c = new Criteria();
				//$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
				$per = array();//CaartalmPeer::doSelect($c);
				
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid 
	$opciones->setEliminar(false);
	$opciones->setTabla('Fcdetcon');
	$opciones->setAnchoGrid(500);
	$opciones->setTitulo('');
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas
	$col1 = new Columna('Fecha Venc.');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('fecven');
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);	
	$col1->setHTML('type="text" size="5"');
	
	$col2 = new Columna('Descripcion Cuota'); 
	$col2->setTipo(Columna::TEXTO);	
	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setEsGrabable(true);	
	$col2->setNombreCampo('numcuo');
	$col2->setHTML('type="text" size="5" value="cuota Nº"');
	
	$col3 = new Columna('Observaciones');
	$col3->setTipo(Columna::TEXTO);
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setNombreCampo('obscuo');
	$col3->setEsGrabable(true);	
	$col3->setHTML('type="text" size="25"');	
	
	$col4 = new Columna('Monto');
	$col4->setTipo(Columna::MONTO);	
	$col4->setAlineacionContenido(Columna::IZQUIERDA);
	$col4->setAlineacionObjeto(Columna::IZQUIERDA);
	$col4->setEsGrabable(true);
	$col4->setNombreCampo('moncuo');
	$col4->setEsNumerico(true);
	$col4->setHTML('type="text" size="10"');

	// Se guardan las columnas en el objetos de opciones        
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);	
	
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->obj2 = $opciones->getConfig($per);
				
			  
			}	

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid3()
	 {
	   
				//////////////////////
				//GRID
				//$c = new Criteria();
				//$c->add(CaartalmPeer::CODART,str_pad($this->caregart->getCodart(),20,' '));
				$per = array();//CaartalmPeer::doSelect($c);
				
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid 
	$opciones->setEliminar(false);
	$opciones->setTabla('Fcdetconfue');
	$opciones->setAnchoGrid(700);
	$opciones->setTitulo('');
	$opciones->setHTMLTotalFilas(' ');
	// Se generan las columnas
	$col1 = new Columna('Fecha Venc.');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('fecven');
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);	
	$col1->setHTML('type="text" size="10" disabled=true');
	
	$col2 = new Columna('Rubro'); 
	$col2->setTipo(Columna::TEXTO);	
	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setEsGrabable(true);	
	$col2->setNombreCampo('fuente');
	$col2->setHTML('type="text" size="20" disabled=true');
	
	$col3 = new Columna('Descripcion Cuota'); 
	$col3->setTipo(Columna::TEXTO);	
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col3->setEsGrabable(true);	
	$col3->setNombreCampo('numcuo');
	$col3->setHTML('type="text" size="20" value="cuota Nº" disabled=true');
	
	$col4 = new Columna('Observaciones');
	$col4->setTipo(Columna::TEXTO);
	$col4->setAlineacionObjeto(Columna::IZQUIERDA);
	$col4->setAlineacionContenido(Columna::IZQUIERDA);
	$col4->setNombreCampo('obscuo');
	$col4->setEsGrabable(true);	
	$col4->setHTML('type="text" size="25"');	
	
	$col5 = new Columna('Monto');
	$col5->setTipo(Columna::MONTO);	
	$col5->setAlineacionContenido(Columna::IZQUIERDA);
	$col5->setAlineacionObjeto(Columna::IZQUIERDA);
	$col5->setEsGrabable(true);
	$col5->setNombreCampo('moncuo');
	$col5->setEsNumerico(true);
	$col5->setHTML('type="text" size="10" disabled=true');

	// Se guardan las columnas en el objetos de opciones        
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);	
	$opciones->addColumna($col5);
	
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->obj3 = $opciones->getConfig($per);
				
			  
			}
	  
	protected function getLabels()
	  {
	    return array(
	      'fcconpag{refcon}' => 'Número de Control',
	      'fcconpag{feccon}' => 'Fecha del Registro',
	      'fcconpag{rifcon}' => 'C.I. / RIF',
	      'fcconpag{nomcon}' => 'Nombre',
	      'fcconpag{dircon}' => 'Dirección',
	      'fcconpag{naccon}' => 'Nacimiento',
	      'fcconpag{tipcon}' => 'Tipo',
	      'fcconpag{obscon}' => 'Descripción',
	      'fcconpag{moncon}' => 'Monto del Impuesto a Pagar',
	      'fcconpag{funrec}' => 'Funcionario Receptor',
	      'fcconpag{fecrec}' => 'Fecha',
	      'fcconpag{numcuo}' => 'Numero',
	      'fcconpag{monini}' => 'Monto Inicial',
	      'fcconpag{estcon}' => 'Estatus',	      
	    );
	  }	  
}
