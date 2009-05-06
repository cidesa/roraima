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
  private $coderror =-1;

  public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->careqart= $this->getCareqartOrCreate();
       try{
	    $this->updateCareqartFromRequest();
          }

    catch(Exception $ex){}

       $this->configGrid();
       $grid=Herramientas::CargarDatosGrid($this,$this->obj);
  	   if ($this->ValidarDatosVaciosenGrid($grid,&$error))
           {
              $this->coderror=$error;
              return false;
           }
       return true;
      } else return true;
  }

 public function executeEdit()
  {
    $this->careqart = $this->getCareqartOrCreate();
    $this->setVars();
    $this->configGrid();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCareqartFromRequest();

      if ($this->saveCareqart($this->careqart)==-1)
	  {
	      $this->setFlash('notice', 'Your modifications have been saved');
		  $this->Bitacora('Guardo');

 		  $this->careqart->setId(Herramientas::getX_vacio('reqart','careqart','id',$this->careqart->getReqart()));

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
          return sfView::SUCCESS;
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
    if (isset($careqart['reqart']))
    {
      $this->careqart->setReqart($careqart['reqart']);
      $this->careqart->setStareq('A');
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
      if (trim($careqart['codcatreq'])!="") $this->careqart->setCodcatreq($careqart['codcatreq']);
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

  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='1')
    {
      $dato=BnubibiePeer::getDesubicacion($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else  if ($this->getRequestParameter('ajax')=='2')
    {
      $dato=CaregartPeer::getDescripcion_art($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else  if ($this->getRequestParameter('ajax')=='3')
    {
      $dato=NpcatprePeer::getCategoria($this->getRequestParameter('codigo'));
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

	// Se crea el objeto principal de la clase OpcionesGrid
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid
	$opciones->setEliminar(true);
	$opciones->setTabla('Caartreq');
	$opciones->setAnchoGrid(1120);
    $opciones->setAncho(1120);
	$opciones->setFilas(250);
	$opciones->setTitulo('Detalle de la Orden de Requisición');
	$opciones->setHTMLTotalFilas(' ');

      $obj= array ('codart' => '1','desart' =>'2', 'cosult' =>'7');
      $params= array('param1' =>  $this->longmasart);
	  // Se generan las columnas
	  $col1 = new Columna('Código  Artículo');
	  $col1->setTipo(Columna::TEXTO);
	  $col1->setEsGrabable(true);
	  $col1->setAlineacionObjeto(Columna::CENTRO);
	  $col1->setAlineacionContenido(Columna::CENTRO);
	  $col1->setNombreCampo('Codart');
	  $col1->setHTML('type="text" size="10" maxlength="'.chr(39).$this->longmasart.chr(39).'"');
	  $col1->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almreq',$params);
	  $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39). $this->mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
	  $col1->setAjax('almreq',2,2);

	  $col2 = new Columna('Descripción');
	  $col2->setTipo(Columna::TEXTAREA);
	  $col2->setAlineacionObjeto(Columna::IZQUIERDA);
	  $col2->setAlineacionContenido(Columna::IZQUIERDA);
	  $col2->setNombreCampo('Desart');
	  $col2->setHTML('type="text" size="30x1" readonly=true');


      $obj2= array ('codcat' => '3','nomcat' =>'4');
      $params2= array('param1' =>  $this->longcat);
      $col3 = new Columna('Cod. Unidad');
      $col3->setTipo(Columna::TEXTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionObjeto(Columna::CENTRO);
      $col3->setAlineacionContenido(Columna::CENTRO);
      $col3->setNombreCampo('Codcat');
      $col3->setHTML('type="text" size="8" maxlength="'.chr(39).$this->longcat.chr(39).'"');
      $col3->setCatalogo('Npcatpre','sf_admin_edit_form',$obj2,'Npcatpre_Almreq',$params2);
      $col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39). $this->formatocategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
      $col3->setAjax('almreq',3,4);

      $col4 = new Columna('Descripción');
      $col4->setTipo(Columna::TEXTAREA);
      $col4->setAlineacionObjeto(Columna::IZQUIERDA);
      $col4->setAlineacionContenido(Columna::IZQUIERDA);
      $col4->setNombreCampo('Nomcat');
      $col4->setHTML('type="text" size="25x1" readonly=true');

      $col5 = new Columna('Cant. Req.');
      $col5->setTipo(Columna::MONTO);
      $col5->setEsGrabable(true);
      $col5->setAlineacionContenido(Columna::IZQUIERDA);
      $col5->setAlineacionObjeto(Columna::IZQUIERDA);
      $col5->setNombreCampo('Canreq');
      $col5->setEsNumerico(true);
      $col5->setHTML('type="text" size="3"');
      $col5->setJScript('onKeypress="calcularcosto(event,this.id)"');

        $col6 = clone $col5;
        $col6->setTitulo('Cant. Rec.');
        $col6->setHTML('type="text" size="8" readonly=true');
        $col6->setNombreCampo('Canrec');

        $col7 = clone $col5;
        $col7->setTitulo('Costo');
        $col7->setHTML('type="text" size="8"');
        $col7->setNombreCampo('costo');
        $col7->setJScript('onKeypress="calcularcosto(event,this.id)"');

        $col8 = clone $col6;
        $col8->setTitulo('Total');
        $col8->setNombreCampo('Montot');
        $col8->setHTML('type="text" size="8" readonly=true');
        $col8->setEsTotal(true,'careqart_monreq');

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
  	// Si en el parametro reqreqapr  de Cadefart, no requiere que la requisicion esta aprobada para despacharla
  	// entonces de una vez grabo la requisicion como aprobada

  	 if ($this->autorizareq=="") $careqart->setAprreq('S');

     $grid=Herramientas::CargarDatosGrid($this,$this->obj);
     Articulos::salvarAlmreqart($careqart,$grid);
     return -1;
  }

  protected function deleteCareqart($careqart)
  {
    if (!Herramientas::getHay_Despacho($this->careqart->getReqart()))
    {
      $careqart->delete();
      Herramientas::EliminarRegistro('Caartreq','reqart',$this->careqart->getReqart());
    }
  }

  public function setVars()
  {
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->longmasart=strlen($this->mascaraarticulo);
    $this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
    $this->longcat=strlen($this->formatocategoria);
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi= Herramientas::ObtenerFormato('Bndefins','lonubi');
    $this->autorizareq= Herramientas::ObtenerFormato('Cadefart','reqreqapr');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->careqart = $this->getCareqartOrCreate();

    try{
	    $this->updateCareqartFromRequest();
    }

    catch(Exception $ex){}

	$this->setVars();
	$this->configGrid();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	    if($this->coderror!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror);
		   $this->getRequest()->setError('',$err);
		  }
      }
    return sfView::SUCCESS;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }

      while ($j<count($x) && !$codcatvacio)
      {
        if (trim($x[$j]->getCodart())!="")
        {
	        if (trim($x[$j]->getCodcat())=="")
	        {
	          $codcatvacio=true;
	          $error=179;
	        }

	        if ($x[$j]->getCanreq()==0)
	        {
	          $codcatvacio=true;
	          $error=1011;
	        }
        }
        $j++;
      } //while ($j<count($x))

      if ($codcatvacio)
        return true;
      else
        return false;
  }

  public function executeAutoriza()
  {
     $careqart = CareqartPeer::retrieveByPk($this->getRequestParameter('id'));
     $careqart->setAprreq('S');
     $careqart->save();
     $javascript="alert('La Requisición fue aprobada satisfactoriamente')";
     $output = '[["javascript","'.$javascript.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;

   }
}
