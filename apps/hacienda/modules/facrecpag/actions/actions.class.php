<?php

/**
 * facrecpag actions.
 *
 * @package    siga
 * @subpackage facrecpag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facrecpagActions extends autofacrecpagActions
{
 protected function updateFcpagosFromRequest()
  {
    $this->configGrid();
    $this->configGrid2();
    $this->configGrid3();
    
  	$fcpagos = $this->getRequestParameter('fcpagos');

    if (isset($fcpagos['numpag']))
    {
      $this->fcpagos->setNumpag($fcpagos['numpag']);
    }
    if (isset($fcpagos['fecpag']))
    {
      if ($fcpagos['fecpag'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcpagos['fecpag']))
          {
            $value = $dateFormat->format($fcpagos['fecpag'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcpagos['fecpag'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcpagos->setFecpag($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcpagos->setFecpag(null);
      }
    }
    if (isset($fcpagos['rifcon']))
    {
      $this->fcpagos->setRifcon($fcpagos['rifcon']);
    }
    if (isset($fcpagos['despag']))
    {
      $this->fcpagos->setDespag($fcpagos['despag']);
    }
    if (isset($fcpagos['monpag']))
    {
      $this->fcpagos->setMonpag($fcpagos['monpag']);
    }
    if (isset($fcpagos['nomcon']))
    {
      $this->fcpagos->setNomcon($fcpagos['nomcon']);
    }
    if (isset($fcpagos['dircon']))
    {
      $this->fcpagos->setDircon($fcpagos['dircon']);
    }
    if (isset($fcpagos['naccon']))
    {
      $this->fcpagos->setNaccon($fcpagos['naccon']);
    }
    if (isset($fcpagos['tipcon']))
    {
      $this->fcpagos->setTipcon($fcpagos['tipcon']);
    }
    if (isset($fcpagos['funpag']))
    {
      $this->fcpagos->setFunpag($fcpagos['funpag']);
    }    
  }
  
  public function executeEdit()
  {
    $this->fcpagos = $this->getFcpagosOrCreate();
    $this->configGrid();
    $this->configGrid2();
    $this->configGrid3();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcpagosFromRequest();

      $this->saveFcpagos($this->fcpagos);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facrecpag/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facrecpag/list');
      }
      else
      {
        return $this->redirect('facrecpag/edit?id='.$this->fcpagos->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
	$col1 = new Columna('Tipo de Pago');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('fecven');
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);	
	$col1->setHTML('type="text" size="5" value="Efectivo"');
	
	$col2 = new Columna('Número'); 
	$col2->setTipo(Columna::MONTO);	
	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setEsGrabable(true);	
	$col2->setNombreCampo('numcuo');
	$col2->setEsNumerico(true);
	$col2->setHTML('type="text" size="5"');

	
	$col3 = new Columna('Monto');
	$col3->setTipo(Columna::MONTO);	
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setEsGrabable(true);
	$col3->setNombreCampo('moncuo');
	$col3->setEsNumerico(true);
	$col3->setHTML('type="text" size="10"');

	// Se guardan las columnas en el objetos de opciones        
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);

	
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->obj2 = $opciones->getConfig($per);
				
			  
			}	

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
	$col1 = new Columna('Código');
	$col1->setTipo(Columna::TEXTO);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('fecven');
	$col1->setAlineacionObjeto(Columna::IZQUIERDA);
	$col1->setAlineacionContenido(Columna::IZQUIERDA);	
	$col1->setHTML('type="text" size="10"');
	
	$col2 = new Columna('Descripción'); 
	$col2->setTipo(Columna::TEXTO);	
	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setEsGrabable(true);	
	$col2->setNombreCampo('fuente');
	$col2->setHTML('type="text" size="25"');
	
	$col3 = new Columna('Tipo'); 
	$col3->setTipo(Columna::TEXTO);	
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col3->setEsGrabable(true);	
	$col3->setNombreCampo('numcuo');
	$col3->setHTML('type="text" size="10"');
	
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
	$this->obj3 = $opciones->getConfig($per);
				
			  
			}
	  
 	
}
