<?php

/**
 * almdespser actions.
 *
 * @package    siga
 * @subpackage almdespser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdespserActions extends autoalmdespserActions
{

  public function executeEdit()
  {
    $this->cadphartser = $this->getCadphartserOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadphartserFromRequest();

      $this->saveCadphartser($this->cadphartser);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');


      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdespser/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdespser/list');
      }
      else
      {
        return $this->redirect('almdespser/edit?id='.$this->cadphartser->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function saveCadphartser($cadphartser)
  {
  	 if ($cadphartser->getId())
  	 {
  	 	$cadphartser->save();
  	 }
  	else
  	{
	    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
	  	Despachos::salvarAlmdespser($cadphartser,$grid);
  	}
  }

  protected function deleteCadphartser($cadphartser)
  {
    Despachos::eliminarDespachoSer($cadphartser);
  }

   protected function updateCadphartserFromRequest()
  {
    $cadphartser = $this->getRequestParameter('cadphartser');

    if (isset($cadphartser['dphart']))
    {
      $this->cadphartser->setDphart($cadphartser['dphart']);
    }
    if (isset($cadphartser['desdph']))
    {
      $this->cadphartser->setDesdph($cadphartser['desdph']);
    }
    if (isset($cadphartser['reqart']))
    {
      $this->cadphartser->setReqart($cadphartser['reqart']);
    }
    if (isset($cadphartser['fecdph']))
    {
      if ($cadphartser['fecdph'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
          if (!is_array($cadphartser['fecdph']))
          {
            $value = $dateFormat->format($cadphartser['fecdph'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $cadphartser['fecdph'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->cadphartser->setFecdph($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->cadphartser->setFecdph(null);
      }
    }
    if (isset($cadphartser['codori']))
    {
      $this->cadphartser->setCodori($cadphartser['codori']);
    }
   // if (isset($cadphartser['stadph']))
   // {
   //   $this->cadphartser->setStadph($cadphartser['stadph']);
    $this->cadphartser->setStadph('A');
   // }
  }

  protected function getCadphartserOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $cadphartser = new Cadphartser();
      $this->configGrid($this->getRequestParameter('cadphartser[reqart]'));
    }
    else
    {
      $cadphartser = CadphartserPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($cadphartser);
      $this->configGridConsulta($cadphartser->getDphart());
    }

    return $cadphartser;
  }

  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=CareqartPeer::getRequision($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      		return sfView::HEADER_ONLY;
  	  }
    if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=NphojintPeer::getNomemp(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
    if ($this->getRequestParameter('ajax')=='3')
	 {
 	    $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('REQART','Careqartser','Reqart',$this->getRequestParameter('cadphartser[reqart]'));

      }
  }

	public function configGrid($codigo='')
	{
		$c = new Criteria();
		$c->add(CaartreqserPeer::REQART,$codigo);
		$per5 = CaartreqserPeer::doSelect($c);
		$filas_arreglo=0;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones2 = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones2->setEliminar(false);
		$opciones2->setFilas($filas_arreglo);
		$opciones2->setTabla('Caartreqser');
		$opciones2->setAnchoGrid(1100);
		$opciones2->setAncho(1100);
		$opciones2->setName('a');
		$opciones2->setTitulo('Detalle del Servicio');
		$opciones2->setHTMLTotalFilas(' ');


		// Se generan las columnas
		$col1 = new Columna('Código  Servicio');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::DERECHA);
		$col1->setAlineacionContenido(Columna::DERECHA);
		$col1->setNombreCampo('Codart');
		$col1->setHTML('type="text" size="10" readonly="true"');
		//$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTAREA);
		$col2->setEsGrabable(false);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('Nomart');
		$col2->setHTML('type="text" size="30x1" readonly=true');

		$col3 = new Columna('Cod Unidad');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionContenido(Columna::DERECHA);
		$col3->setAlineacionObjeto(Columna::DERECHA);
		$col3->setNombreCampo('Codcat');
		$col3->setEsNumerico(true);
		$col3->setHTML('type="text" size="10" readonly="true"');

		$col4 = new Columna('Fecha de Entrega');
	    $col4->setTipo(Columna::FECHA);
	    $col4->setEsGrabable(true);
	    $col4->setHTML('readonly="true"');
	    $col4->setVacia(true);
	    $col4->setNombreCampo('Fecrea');


	    $col5 = new Columna('Nombre Empleado');
        $col5->setNombreCampo('Nomemp');
        $col5->setTipo(Columna::TEXTAREA);
        $col5->setEsGrabable(true);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setHTML('type="text" size="20x1" readonly=true');
        $col5->setCatalogo('Nphojint','sf_admin_edit_form',array('nomemp' => 5), 'Nphojint_Almdespser');
		//$col5->setAjax('almdespser',2,5);

        $col6 = new Columna('Observacion');
        $col6->setNombreCampo('Dphobs');
        $col6->setTipo(Columna::TEXTAREA);
        $col6->setEsGrabable(true);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setHTML('type="text" size="30x1"');



		// Se guardan las columnas en el objetos de opciones
		$opciones2->addColumna($col1);
		$opciones2->addColumna($col2);
		$opciones2->addColumna($col3);
		$opciones2->addColumna($col4);
		$opciones2->addColumna($col5);
		$opciones2->addColumna($col6);
		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones2->getConfig($per5);

	}


  public function configGridConsulta($dphart)
  {
      $c = new Criteria();
      $c->add(CaartdphserPeer::DPHART,$dphart);
      $obj = CaartdphserPeer::doSelect($c);

      // $i18n = $this->getContext()->getI18N();
      // Se crea el objeto principal de la clase OpcionesGrid
      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
        $opciones->setTabla('Caartdphser');
        $opciones->setAnchoGrid(1100);
        $opciones->setAncho(1100);
        $opciones->setTitulo('Detalle del Servicio');
        $opciones->setName('a');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(0);
        $opciones->setEliminar(false);

        // Se generan las columnas
        $col1 = new Columna('Cod. Servicio');
        $col1->setTipo(Columna::TEXTO);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('Codart');
        $col1->setHTML('type="text" size="10" readonly="true"');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::CENTRO);
        $col2->setAlineacionContenido(Columna::CENTRO);
        $col2->setNombreCampo('Nomart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col3 = new Columna('Cod Unidad');
        $col3->setNombreCampo('Codcat');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::CENTRO);
        $col3->setAlineacionContenido(Columna::CENTRO);
        $col3->setHTML('type="text" size="10" readonly="true"');

		$col4 = new Columna('Fecha Realizado');
	    $col4->setTipo(Columna::FECHA);
	    $col4->setEsGrabable(true);
	    $col4->setHTML('readonly="true"');
	    $col4->setVacia(true);
	    $col4->setNombreCampo('Fecrea');


    	$col5 = new Columna('Nombre Empleado');
        $col5->setNombreCampo('Nomemp');
        $col5->setTipo(Columna::TEXTAREA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setHTML('type="text" size="20x1" readonly=true');

        $col6 = new Columna('Observacion');
        $col6->setNombreCampo('Dphobs');
        $col6->setTipo(Columna::TEXTAREA);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setHTML('type="text" size="30x1" readonly=true');

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
      // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($obj);
  }

  public function executeGrid()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $this->mensaje="";
    if ($this->getRequestParameter('ajax')=='1')
    {
      if ($this->getRequestParameter('codigo')!="")
	  {
	    $codigo=str_pad($this->getRequestParameter('codigo'), 8 , '0','STR_PAD_LEFT');
	    $c = new Criteria();
		$c->add(CareqartserPeer::REQART,$codigo);
		$datos = CareqartserPeer::doSelectOne($c);
		if ($datos)
		{
	  		$desreq=$datos->getDesreq();
	  	    $uniori=$datos->getCodcatreq();
	  	    $desuniori=BnubibiePeer::getDesubicacion($uniori);
	        $output = '[["'.$cajtexmos.'","'.$desreq.'",""],["cadphartser_codori","'.$uniori.'",""],["cadphartser_nomcat","'.$desuniori.'",""],["'.$cajtexcom.'","8","c"]]';
	     	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	        ////
	        $this->configGrid($codigo);
		}
		else
		{//no existe la requisicion
	       $this->configGrid();
	       $this->mensaje="El código de la requisición no existe.";
		}
	  }//if ($this->getRequestParameter('codigo')!="")
	  else
	       $this->configGrid();
    }
  }

   public function validateEdit()
  {
     $resp=-1;
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
     $this->cadphartser = $this->getCadphartserOrCreate();
         $cadphartser = $this->getRequestParameter('cadphartser');
         $valor = $cadphartser['dphart'];
         $campo='dphart';
          $resp=Herramientas::ValidarCodigo($valor,$this->cadphartser,$campo);

     if($resp!=-1){
        $this->coderror = $resp;
        return false;
      }
         else return true;

    }else return true;

  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->cadphartser = $this->getCadphartserOrCreate();

    try{
    $this->updateCadphartserFromRequest();
    }
    catch(Exception $ex){}

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }


}
