<?php

/**
 * vachistorico actions.
 *
 * @package    siga
 * @subpackage vachistorico
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vachistoricoActions extends autovachistoricoActions
{
	private static $coderror=-1;

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nphojint/filters');

    // pager
    $this->pager = new sfPropelPager('Nphojint', 10);
    $c = new Criteria();
    $c->addJoin(NpvacdisfrutePeer::CODEMP,NphojintPeer::CODEMP);
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
    }

  protected function getNphojintOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nphojint = new Nphojint();
      $this->configGrid($this->getRequestParameter('nphojint[codemp]'),$this->getRequestParameter('nphojint[fecing]'));
    }
    else
    {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));
	$this->configGrid($nphojint->getCodemp(),$nphojint->getFecing());
      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }


  public function configGrid($codemp='',$fecing='')
  {
 	Nomina::ArregloVacaciones($codemp,$fecing,&$arreglo);

 	/**
 	 * Para calcular los dias pendientes
 	 * */
 	 foreach($arreglo as $reg)
 	 {
 	 	$this->diaspen+=$reg["diaspdisfrutar"];
 	 }
    /************************************/
    $per = $arreglo;
    $cero=0;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacdisfrute');
    $opciones->setAnchoGrid(500);
    $opciones->setAncho(500);
    $opciones->setName('a');
    $opciones->setFilas($cero);
    $opciones->setTitulo('');

    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Periodo Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perini');
    $col1->setHTML('type="text" size="4" readonly= true');

    $col2 = new Columna('Periodo Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('perfin');
    $col2->setHTML('type="text" size="4"  readonly= true');

    $col3 = new Columna('Dias a disfrutar');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('diasdisfutar');
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id); calcular_dias(this.id)"');
    $col3->setHTML('type="text" size="8" ' );

    $col4 = new Columna('Dias disfrutados');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('diasdisfrutados');
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id); calcular_dias2(this.id)"');
    $col4->setHTML('type="text" size="8"');

    $col5 = new Columna('Dias por disfrutar');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(false);
    $col5->setNombreCampo('diaspdisfrutar');
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setHTML('type="text" size="8" ');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj = $opciones->getConfig($per);

  }

 public function executeAjax()
  {
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
    $cajtexnom=$this->getRequestParameter('cajtexnom');
    $cajtexfec=$this->getRequestParameter('cajtexfec');
    $cajadias=$this->getRequestParameter('cajadias');
    $codigoemp=$this->getRequestParameter('codigo');
    $js="";
    $nombre="";
    $fechaing="";

   if ($this->getRequestParameter('ajax')=='1')
   {
   	 if (trim($codigoemp)<>'')
	  {
	     $x=Herramientas::getX_vacio('codemp','Npvacdisfrute','codemp',$this->getRequestParameter('codigo'));
	     if (trim($x)!="")
	     {
	     	$js.="$('$cajtexcom').value='';";
		 	$js.="alert('Empleado con vacaciones ya registradas consulte la lista para modificaciones');";
		 	$js.="$('$cajtexcom').focus();";
		 	$this->configGrid();
	     	$output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajadias.'","",""],["javascript","'.$js.'",""]]';
	     	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	     }
		 else
		 {
		 	$nombre=NphojintPeer::getNomemp($codigoemp);
	     	$fechaing=NphojintPeer::getFecing($codigoemp);
	     	$this->configGrid($codigoemp,$fechaing);
	     	$output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajadias.'","'.$this->diaspen.'",""],["javascript","'.$js.'",""]]';
	     	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		 }



	  }else
	  {
	  	$output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajadias.'","",""],["javascript","'.$js.'",""]]';
	  	$this->configGrid();
	  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  }


    }

   }

 public function executeEdit()
  {
  	$this->diaspen=0;
    $this->nphojint = $this->getNphojintOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->updateNphojintFromRequest();

      $this->saveNphojint($this->nphojint);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vachistorico/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vachistorico/list');
      }
      else
      {
        return $this->redirect('vachistorico/edit?id='.$this->nphojint->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function updateNphojintFromRequest()
  {
    $nphojint = $this->getRequestParameter('nphojint');

    if (isset($nphojint['codemp']))
    {
      $this->nphojint->setCodemp($nphojint['codemp']);
    }
    if (isset($nphojint['nomemp']))
    {
      $this->nphojint->setNomemp($nphojint['nomemp']);
    }
    if (isset($nphojint['fecing']))
    {
      if ($nphojint['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecing']))
          {
            $value = $dateFormat->format($nphojint['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecing(null);
      }
    }
  }

  protected function saveNphojint($nphojint)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
    Nomina::salvarNphojint($nphojint,$grid);

  }
  public function validateEdit()
    {
      $this->nphojint = $this->getNphojintOrCreate();
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

        $this->updateNphojintFromRequest();
        $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
        if(count($grid[0])>0)
        	self::$coderror=EmpleadosBanco::Validar_Datos_Grid_Vacdis($grid);
        else
        	self::$coderror=437;

       if ((self::$coderror<>-1))
        {
                return false;

        }else return true;

      }else return true;
    }


 public function handleErrorEdit()
  {
    $this->preExecute();
    $this->nphojint = $this->getNphojintOrCreate();
    $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter('id'));
    if($nphojint)
		$this->configGrid($nphojint->getCodemp(),$nphojint->getFecing());
	else
		$this->configGrid();

   try{
     $this->updateNphojintFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }
  public function executeDelete()
  {
  	$obj = NphojintPeer::retrieveByPk($this->getRequestParameter('id'));
    $c = new Criteria();
	$c->add(NpvacdisfrutePeer::CODEMP,$obj->getCodemp());
	$rs = NpvacdisfrutePeer::doDelete($c);
	if($rs)
	{
		$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
		$this->setFlash('notice','Registro Eliminado exitosamente');
	}else
	{

	}
    return $this->redirect('vachistorico/edit');

  }


}
