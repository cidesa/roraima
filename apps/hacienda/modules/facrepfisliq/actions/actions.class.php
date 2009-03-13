<?php

/**
 * facrepfisliq actions.
 *
 * @package    siga
 * @subpackage facrepfisliq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facrepfisliqActions extends autofacrepfisliqActions
{
	public function executeEdit()
	  {
	    $this->fcrepfis = $this->getFcrepfisOrCreate();
	    $this->configGrid();
	    $this->configGrid2();
	
	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFcrepfisFromRequest();
	
	      $this->saveFcrepfis($this->fcrepfis);
	
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
	
	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('facrepfisliq/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('facrepfisliq/list');
	      }
	      else
	      {
	        return $this->redirect('facrepfisliq/edit?id='.$this->fcrepfis->getId());
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
	    $this->fcrepfis = $this->getFcrepfisOrCreate();
	    $this->updateFcrepfisFromRequest();
	
	    $this->labels = $this->getLabels();
	
	    return sfView::SUCCESS;
	  }	  
	  
	protected function updateFcrepfisFromRequest()
	  {
	    $fcrepfis = $this->getRequestParameter('fcrepfis');
	    $this->configGrid();
	    $this->configGrid2();
	
	    if (isset($fcrepfis['numrep']))
	    {
	      $this->fcrepfis->setNumrep($fcrepfis['numrep']);
	    }
	    if (isset($fcrepfis['fecrep']))
	    {
	      if ($fcrepfis['fecrep'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($fcrepfis['fecrep']))
	          {
	            $value = $dateFormat->format($fcrepfis['fecrep'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $fcrepfis['fecrep'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->fcrepfis->setFecrep($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->fcrepfis->setFecrep(null);
	      }
	    }
	    if (isset($fcrepfis['numlic']))
	    {
	      $this->fcrepfis->setNumlic($fcrepfis['numlic']);
	    }
	    if (isset($fcrepfis['rifcon']))
	    {
	      $this->fcrepfis->setRifcon($fcrepfis['rifcon']);
	    }
	    if (isset($fcrepfis['nomcon']))
	    {
	      $this->fcrepfis->setNomcon($fcrepfis['nomcon']);
	    }
	    if (isset($fcrepfis['dircon']))
	    {
	      $this->fcrepfis->setDircon($fcrepfis['dircon']);
	    }
	    if (isset($fcrepfis['naccon']))
	    {
	      $this->fcrepfis->setNaccon($fcrepfis['naccon']);
	    }
	    if (isset($fcrepfis['tipcon']))
	    {
	      $this->fcrepfis->setTipcon($fcrepfis['tipcon']);
	    }
	    if (isset($fcrepfis['funrec']))
	    {
	      $this->fcrepfis->setFunrec($fcrepfis['funrec']);
	    }
	    if (isset($fcrepfis['monadi']))
	    {
	      $this->fcrepfis->setMonadi($fcrepfis['monadi']);
	    }
	    if (isset($fcrepfis['monrep']))
	    {
	      $this->fcrepfis->setMonrep($fcrepfis['monrep']);
	    }
	    if (isset($fcrepfis['conrep']))
	    {
	      $this->fcrepfis->setConrep($fcrepfis['conrep']);
	    }
	    if (isset($fcrepfis['modo']))
	    {
	      $this->fcrepfis->setModo($fcrepfis['modo']);
	    }
	  }
	  
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
		$opciones->setTabla('Fcrepliq');
		$opciones->setAnchoGrid(600);
		$opciones->setTitulo('');
		$opciones->setHTMLTotalFilas(' ');
		// Se generan las columnas
		$col1 = new Columna('Fecha Venc.');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setNombreCampo('ano');
		$col1->setAlineacionObjeto(Columna::IZQUIERDA);
		$col1->setAlineacionContenido(Columna::IZQUIERDA);	
		$col1->setHTML('type="text" size="5"');
		
		$col2 = new Columna('Código Actividad'); 
		$col2->setTipo(Columna::TEXTO);	
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setEsGrabable(true);	
		$col2->setNombreCampo('codact');
		$col2->setHTML('type="text" size="5"');
		
		$col3 = new Columna('Descripción');
		$col3->setTipo(Columna::TEXTO);
		$col3->setAlineacionObjeto(Columna::IZQUIERDA);
		$col3->setAlineacionContenido(Columna::IZQUIERDA);
		$col3->setNombreCampo('codact');
		$col3->setHTML('type="text" size="25" disabled=true');
		
		$col4 = new Columna('Ingresos Brutos');
		$col4->setTipo(Columna::MONTO);
		$col4->setAlineacionObjeto(Columna::IZQUIERDA);
		$col4->setAlineacionContenido(Columna::IZQUIERDA);
		$col4->setNombreCampo('moning');
		$col4->setEsGrabable(true);	
		$col4->setHTML('type="text" size="10"');	
		
		$col5 = clone $col4;
		$col5->setTitulo('Impuesto Bruto');
		$col5->setNombreCampo('monimp'); 
		
		$col6 = clone $col4;
        $col6->setTitulo('Monto Bomberos');
        $col6->setNombreCampo('monbom');
	
		// Se guardan las columnas en el objetos de opciones        
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);	
		$opciones->addColumna($col5);
		$opciones->addColumna($col6);
		
		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
					
				  
	  }	
	
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
		$opciones->setTabla('Fcdetrep');
		$opciones->setAnchoGrid(500);
		$opciones->setTitulo('');
		$opciones->setHTMLTotalFilas(' ');
		// Se generan las columnas
		$col1 = new Columna('Nro.');
		$col1->setTipo(Columna::TEXTO);			
		$col1->setAlineacionObjeto(Columna::IZQUIERDA);
		$col1->setAlineacionContenido(Columna::IZQUIERDA);	
		$col1->setHTML('type="text" size="2" disabled=true');
		
		$col2 = new Columna('Vencimiento'); 
		$col2->setTipo(Columna::TEXTO);	
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);		
		$col2->setHTML('type="text" size="10" disabled=true');
		
		$col3 = new Columna('Descripcion de la Cuota'); 
		$col3->setTipo(Columna::TEXTO);	
		$col3->setAlineacionObjeto(Columna::IZQUIERDA);
		$col3->setAlineacionContenido(Columna::IZQUIERDA);
		$col3->setEsGrabable(true);	
		$col3->setNombreCampo('descrip');
		$col3->setHTML('type="text" size="25"');
		
		$col4 = new Columna('Tipo');
		$col4->setTipo(Columna::TEXTO);
		$col4->setAlineacionObjeto(Columna::IZQUIERDA);
		$col4->setAlineacionContenido(Columna::IZQUIERDA);
		$col4->setNombreCampo('tipo');
		$col4->setEsGrabable(true);	
		$col4->setHTML('type="text" size="5"');	
		
		$col5 = new Columna('Monto');
		$col5->setTipo(Columna::MONTO);	
		$col5->setAlineacionContenido(Columna::IZQUIERDA);
		$col5->setAlineacionObjeto(Columna::IZQUIERDA);
		$col5->setEsGrabable(true);
		$col5->setNombreCampo('monto');
		$col5->setEsNumerico(true);
		$col5->setHTML('type="text" size="10"');
	
		// Se guardan las columnas en el objetos de opciones        
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);	
		$opciones->addColumna($col5);
		
		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj2 = $opciones->getConfig($per);				
				  
	}	  

	protected function getLabels()
	  {
	    return array(
	      'fcrepfis{numrep}' => 'Número Reparo',
	      'fcrepfis{fecrep}' => 'Fecha Reparo',
	      'fcrepfis{numlic}' => 'Número Licencia',
	      'fcrepfis{rifcon}' => 'C.I/RIF',
	      'fcrepfis{nomcon}' => 'Nombre',
	      'fcrepfis{dircon}' => 'Dirección',
	      'fcrepfis{naccon}' => 'Nacionalidad',
	      'fcrepfis{tipcon}' => 'Tipo',
	      'fcrepfis{funrec}' => 'Funcionario',
	      'fcrepfis{monadi}' => 'Adición/Disminución(+/-)',
	      'fcrepfis{monrep}' => 'Monto Reparo',
	      'fcrepfis{conrep}' => 'Convenio del Reparo',
	      'fcrepfis{modo}' => 'Tipo',
	    );
	  }	  
}
