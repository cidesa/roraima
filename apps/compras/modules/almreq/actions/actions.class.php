<?php

/**
 * almreq actions.
 *
 * @package    siga
 * @subpackage almreq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almreqActions extends autoalmreqActions
{

 public function executeEdit()
  {
  	$this->careqart = $this->getCareqartOrCreate();
    $this->configGrid();
  	$this->desubi = BnubibiePeer::getDesUbi($this->careqart->getCodcatreq());
    $this->pagerArtreq = CaartreqPeer::getPagerByReqart($this->careqart->getReqart());


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCareqartFromRequest();

      $this->saveCareqart($this->careqart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almreq/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almreq/list');
      }
      else
      {
      	return $this->redirect('almreq/edit?id='.$this->careqart->getId());
      }
    }
    else
    {
    	$this->labels = $this->getLabels();
    }
  }

  protected function updateCareqartFromRequest()
  {
  	$careqart = $this->getRequestParameter('careqart');
    $this->configGrid();

  	if (isset($careqart['reqart']))
  	{
  		$this->careqart->setReqart($careqart['reqart']);
  	}
  	if (isset($careqart['fecreq']))
  	{
  		if ($careqart['fecreq'])
  		{
  			try
  			{
  				$dateFormat = new sfDateFormat($this->getUser()->getCulture());
  				if (!is_array($careqart['fecreq']))
  				{
  					$value = $dateFormat->format($careqart['fecreq'], 'i', $dateFormat->getInputPattern('d'));
  				}
  				else
  				{
  					$value_array = $careqart['fecreq'];
  					$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
  				}
  				$this->careqart->setFecreq($value);
  			}
  			catch (sfException $e)
  			{
  				// not a date
  			}
  		}
  		else
  		{
  			$this->careqart->setFecreq(null);
  		}
  	}
  	if (isset($careqart['codcatreq']))
  	{
  		$this->careqart->setCodcatreq($careqart['codcatreq']);
  	}
  	if (isset($careqart['desreq']))
  	{
  		$this->careqart->setDesreq($careqart['desreq']);
  	}
  	if (isset($careqart['monreq']))
  	{
  		$this->careqart->setMonreq($careqart['monreq']);
  	}

  	if (isset($careqart['desubi']))
  	{
  		$this->careqart->setDesubi($careqart['desubi']);
  	}
  }


  public function executeAutocomplete()
  {
  	if ($this->getRequestParameter('ajax')=='1')
  	{
		 	$this->tags=Herramientas::autocompleteAjax('CODUBI','Bnubibie','Codubi',trim($this->getRequestParameter('codcatreq')));
  	}
  }

  public function executeAjax()
  {
  	$cajtexmos=$this->getRequestParameter('cajtexmos');
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
	  	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	  }

	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  return sfView::HEADER_ONLY;
  }

  public function configGrid()
  {

  	$c = new Criteria();
  	$c->add(CaartreqPeer::REQART,$this->careqart->getReqart());
  	$per = CaartreqPeer::doSelect($c);

  	//$mascaraubicacion=$this->mascaraubicacion;
  	// $i18n = $this->getContext()->getI18N();
  	// Se crea el objeto principal de la clase OpcionesGrid
	  	$opciones = new OpcionesGrid();
	  	// Se configuran las opciones globales del Grid
	  	$opciones->setEliminar(true);
	  	$opciones->setTabla('Caartreq');
	  	$opciones->setAnchoGrid(1150);
	  	$opciones->setTitulo('Detalle de la Orden de Requisición');
	  	$opciones->setHTMLTotalFilas(' ');

	  	// Se generan las columnas
	  	$col1 = new Columna('Código  Artículo');
	  	$col1->setTipo(Columna::TEXTO);
	  	$col1->setEsGrabable(true);
	  	$col1->setAlineacionObjeto(Columna::CENTRO);
	  	$col1->setAlineacionContenido(Columna::CENTRO);
	  	$col1->setNombreCampo('Reqart');
	  	$col1->setCatalogo('caregart','sf_admin_edit_form','2');
	  	$col1->setAjax(2,2);

	  	$col2 = new Columna('Descripción');
	  	$col2->setTipo(Columna::TEXTO);
	  	$col2->setAlineacionObjeto(Columna::IZQUIERDA);
	  	$col2->setAlineacionContenido(Columna::IZQUIERDA);
	  	$col2->setNombreCampo('Desreq');
	  	$col2->setHTML('type="text" size="25" disabled=true');
	  	
	  	$col3 = new Columna('Cod. Unidad');
	  	$col3->setTipo(Columna::TEXTO);
	  	$col3->setEsGrabable(true);
	  	$col3->setAlineacionObjeto(Columna::CENTRO);
	  	$col3->setAlineacionContenido(Columna::CENTRO);
	  	$col3->setNombreCampo('Codcat');
	  	$col3->setCatalogo('NpCAtPre','sf_admin_edit_form','4');
	  	$col3->setAjax(2,2);

	  	$col4 = new Columna('Descripción');
	  	$col4->setTipo(Columna::TEXTO);
	  	$col4->setAlineacionObjeto(Columna::IZQUIERDA);
	  	$col4->setAlineacionContenido(Columna::IZQUIERDA);
	  	$col4->setNombreCampo('Nomcat');
	  	$col4->setHTML('type="text" size="25" disabled=true');	  	
	  	
        $col5 = new Columna('Cant. Req.');
        $col5->setTipo(Columna::MONTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setNombreCampo('Canreq');
        $col5->setEsNumerico(true);
        $col5->setHTML('type="text" size="10"');
        $col5->setJScript('onKeypress="entermonto(event,this.id)"');
	  	
        $col6 = clone $col5;
        $col6->setTitulo('Cant. Rec.');
        $col6->setNombreCampo('Canrec');

        $col7 = clone $col5;
        $col7->setTitulo('C.(Un. Med.)');
        $col7->setNombreCampo('Unimed');

        $col8 = clone $col5;
        $col8->setTitulo('Total');
        $col8->setNombreCampo('Montot');
        //$col8->setEsTotal(true,'careqart_exitot');
        
        // Se guardan las columnas en el objetos de opciones        
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
        $opciones->addColumna($col8);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($per); 

  }	
  
  protected function saveCareqart($careqart)
  {
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
	  	Articulos::salvarAlmreqart($careqart,$grid);
        //$careqart->save();

  }
  
	
	
}
