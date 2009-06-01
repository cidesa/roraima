<?php

/**
 * oycdesobr actions.
 *
 * @package    siga
 * @subpackage oycdesobr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdesobrActions extends autooycdesobrActions
{
  public  $coderror=-1;
  public  $fechamay=-1;
  public  $partid=-1;
  public  $inspec=-1;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->ocregobr = $this->getOcregobrOrCreate();
      try{ $this->updateOcregobrFromRequest();}
      catch (Exception $ex){}
      $this->configGrid($this->ocregobr->getCodobr());
      $this->configGridIns($this->ocregobr->getCodobr());
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);
      $grid2 = Herramientas::CargarDatosGrid($this,$this->obj2);

      if (Tesoreria::validarFechaMayorMenor($this->getRequestParameter('ocregobr[fecini]'),$this->getRequestParameter('ocregobr[fecfin]'),'>'))
      {
       $this->fechamay=431;
       return false;
      }

      if (count($grid[0])==0)
      {
      	$this->partid=1005;
      	return false;
      }

      if (count($grid2[0])==0)
      {
      	$this->inspec=1006;
      	return false;
      }
      return true;
    }else return true;
   }

	public function Cargarpais()
	{
		$tablas=array('ocpais');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
		return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function Cargarestados($codpais)
	{
		$tablas=array('ocestado');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
		return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}


	public function Cargarmunicipio($codpais,$codestado)
	{
		$tablas=array('ocmunici');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codmun','nommun');// arreglos donde me traigo el nombre y el codigo
		return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

	public function Cargarparroquia($codpais,$codestado,$codmunicipio)
	{
		$tablas=array('ocparroq');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpar','nompar');// arreglos donde me traigo el nombre y el codigo
		return $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}
	public function Cargarsector($codpais,$codestado,$codmunicipio,$codparroquia)
	{
		$tablas=array('ocsector');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun','codpar');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio,$codparroquia);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codsec','nomsec');// arreglos donde me traigo el nombre y el codigo
		return $sector= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

	public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
		elseif ($this->getRequestParameter('par')=='2')
		{
			$this->municipio = $this->Cargarmunicipio($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
			$this->tipo='E';
		}
		elseif ($this->getRequestParameter('par')=='3')
		{
			$this->parroquia = $this->Cargarparroquia($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
			$this->tipo='M';
		}
		elseif ($this->getRequestParameter('par')=='4')
		{
			$this->sector = $this->Cargarsector($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'),$this->getRequestParameter('parroquia'));
			$this->tipo='S';
		}
	}

   public function configGrid($codigo='')
   {
       $c = new Criteria();
       $c->add(OcpreobrPeer::CODOBR,$codigo);
       $reg = OcpreobrPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Ocpreobr');
       $opciones->setAncho(1200);
       $opciones->setAnchoGrid(1000);
       $opciones->setFilas(50);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $obj= array('codpar' => 1, 'despar' => 2, 'coduni' => 3, 'cosuni' => 6);

       $col1 = new Columna('Cód. Partida');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codpar');
       $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxpartida(event,this.id);"');
       if ($codigo=='')
       {
       	$col1->setCatalogo('ocdefpar','sf_admin_edit_form',$obj,'Ocdefpar_Oycdefemp');
        $col1->setHTML('type="text" size="17" maxlength="32"');
       }
       else
       {
       	$col1->setHTML('type="text" size="17" maxlength="32" readonly=true');
       }

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('despar');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = clone $col2;
       $col3->setTitulo('Unidad de Medida');
       $col3->setNombreCampo('coduni');
       $col3->setEsGrabable(true);
       $col3->setHTML('type="text" size="5" readonly=true');

       $col4 = new Columna('Cantidad');
       $col4->setEsGrabable(true);
       $col4->setTipo(Columna::MONTO);
       $col4->setAlineacionContenido(Columna::DERECHA);
       $col4->setAlineacionObjeto(Columna::DERECHA);
       $col4->setNombreCampo('canobr');
       $col4->setEsNumerico(true);
       if ($codigo=='')
       {
       $col4->setHTML('type="text" size="10"');
       $col4->setJScript('onKeypress="entermonto(event,this.id); Cantidad(event,this.id);"');
       }
       else $col4->setHTML('type="text" size="10" readonly=true');

       $col5 = clone $col4;
       $col5->setTitulo('Cant. Contratada');
       $col5->setNombreCampo('cancon');
       $col5->setHTML('type="text" size="10" readonly=true');

       $col6 = clone $col4;
       $col6->setTitulo('Costo');
       $col6->setNombreCampo('cosuni');
       if ($codigo=='')
       {
        $col6->setHTML('type="text" size="10"');
        $col6->setJScript('onKeypress="entermonto(event,this.id); Total(event,this.id);"');
       }
       else $col6->setHTML('type="text" size="10" readonly=true;');

       $col7 = clone $col4;
       $col7->setTitulo('Monto Presupuestado');
       $col7->setNombreCampo('montot1');
       $col7->setHTML('type="text" size="10" readonly="true"');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);
       $opciones->addColumna($col6);
       $opciones->addColumna($col7);

       $this->obj = $opciones->getConfig($reg);

  }

   public function configGridIns($codobr='')
   {
       $c = new Criteria();
       $c->add(OcinginsobrPeer::CODOBR,$codobr);
       $reg = OcinginsobrPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Ocinginsobr');
       $opciones->setAncho(700);
       $opciones->setAnchoGrid(700);
       $opciones->setTitulo('');
       $opciones->setName('b');
       $opciones->setFilas(10);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Cédula');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('cedins');
       $col1->setHTML('type="text" size="10" maxlength="10"');
       $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxinsobr(event,this.id)"');
       $col1->setCatalogo('nphojint','sf_admin_edit_form',array('cedemp' => 1, 'nomemp' => 2));

       $col2 = new Columna('Nombre');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('nomins');
       $col2->setHTML('type="text" size="25" readonly=true');

       $col3 = new Columna('Nro. C.I.V');
       $col3->setTipo(Columna::TEXTO);
       $col3->setEsGrabable(true);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setNombreCampo('numciv');
       $col3->setHTML('type="text" size="15" maxlength="15"');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);

       $this->obj2 = $opciones->getConfig($reg);
  }



  public function executeEdit()
  {
    $this->ocregobr = $this->getOcregobrOrCreate();
    $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
    $this->lonpre=strlen($this->mascarapresupuesto);
    $this->funciones_combos();
    $this->configGrid($this->ocregobr->getCodobr());
    $this->configGridIns($this->ocregobr->getCodobr());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcregobrFromRequest();

      if ($this->saveOcregobr($this->ocregobr)==-1)
      {
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      $this->ocregobr->setId(Herramientas::getX_vacio('codobr','ocregobr','id',$this->ocregobr->getCodobr()));

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdesobr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdesobr/list');
      }
      else
      {
        return $this->redirect('oycdesobr/edit?id='.$this->ocregobr->getId());
      }
      }
      else
      {
          $this->labels = $this->getLabels();
          $err = Herramientas::obtenerMensajeError($this->coderror);
       	  $this->getRequest()->setError('',$err);
          return sfView::SUCCESS;
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateOcregobrFromRequest()
  {
    $ocregobr = $this->getRequestParameter('ocregobr');
    $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
    $this->lonpre=strlen($this->mascarapresupuesto);
    $this->configGrid($ocregobr['codobr']);
    $this->configGridIns($ocregobr['codobr']);
    $this->funciones_combos();

    if (isset($ocregobr['codobr']))
    {
      $this->ocregobr->setCodobr($ocregobr['codobr']);
    }
    if (isset($ocregobr['codtipobr']))
    {
      $this->ocregobr->setCodtipobr($ocregobr['codtipobr']);
    }
    if (isset($ocregobr['desobr']))
    {
      $this->ocregobr->setDesobr($ocregobr['desobr']);
    }
    if (isset($ocregobr['fecini']))
    {
      if ($ocregobr['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregobr['fecini']))
          {
            $value = $dateFormat->format($ocregobr['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregobr['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregobr->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregobr->setFecini(null);
      }
    }
    if (isset($ocregobr['fecfin']))
    {
      if ($ocregobr['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregobr['fecfin']))
          {
            $value = $dateFormat->format($ocregobr['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregobr['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregobr->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregobr->setFecfin(null);
      }
    }
    if (isset($ocregobr['codpai']))
    {
      $this->ocregobr->setCodpai($ocregobr['codpai']);
    }
    if (isset($ocregobr['codedo']))
    {
      $this->ocregobr->setCodedo($ocregobr['codedo']);
    }
    if (isset($ocregobr['codmun']))
    {
      $this->ocregobr->setCodmun($ocregobr['codmun']);
    }
    if (isset($ocregobr['codpar']))
    {
      $this->ocregobr->setCodpar($ocregobr['codpar']);
    }
    if (isset($ocregobr['codsec']))
    {
      $this->ocregobr->setCodsec($ocregobr['codsec']);
    }
    if (isset($ocregobr['dirobr']))
    {
      $this->ocregobr->setDirobr($ocregobr['dirobr']);
    }
    if (isset($ocregobr['monobr']))
    {
      $this->ocregobr->setMonobr($ocregobr['monobr']);
    }
    if (isset($ocregobr['subtot']))
    {
      $this->ocregobr->setSubtot($ocregobr['subtot']);
    }
    if (isset($ocregobr['moniva']))
    {
      $this->ocregobr->setMoniva($ocregobr['moniva']);
    }
    if (isset($ocregobr['ivaobr']))
    {
      $this->ocregobr->setIvaobr($ocregobr['ivaobr']);
    }
    if (isset($ocregobr['codpre']))
    {
      $this->ocregobr->setCodpre($ocregobr['codpre']);
    }
    if (isset($ocregobr['nompre']))
    {
      $this->ocregobr->setNompre($ocregobr['nompre']);
    }
    if (isset($ocregobr['codpreiva']))
    {
      $this->ocregobr->setCodpreiva($ocregobr['codpreiva']);
    }
    if (isset($ocregobr['nompreiva']))
    {
      $this->ocregobr->setNompreiva($ocregobr['nompreiva']);
    }
    if (isset($ocregobr['staobr']))
    {
      $this->ocregobr->setStaobr($ocregobr['staobr']);
    }
    if (isset($ocregobr['unocon']))
    {
      $this->ocregobr->setUnocon($ocregobr['unocon']);
    }
  }

	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->ocregobr->getCodpai());//colocar lo q viene de bd
		$this->municipio = $this->Cargarmunicipio($this->ocregobr->getCodpai(),$this->ocregobr->getCodedo());//colocar lo q viene de bd
		$this->parroquia = $this->Cargarparroquia($this->ocregobr->getCodpai(),$this->ocregobr->getCodedo(),$this->ocregobr->getCodmun());//colocar lo q viene de bd
		$this->sector = $this->Cargarsector($this->ocregobr->getCodpai(),$this->ocregobr->getCodedo(),$this->ocregobr->getCodmun(),$this->ocregobr->getCodpar());
	}

   public function executeAjax()
   {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $dato="";
     $javascript="";
     if ($this->getRequestParameter('ajax')=='1')
     {
       $c= new Criteria();
	   $c->add(CpdeftitPeer::CODPRE,$this->getRequestParameter('codigo'));
       $reg=CpdeftitPeer::doSelectOne($c);
       if ($reg)
       {
       	$num=$this->getRequestParameter('num');
       	$monto=Herramientas::toFloat($this->getRequestParameter('monto'));
       	$fecha=explode('/',$this->getRequestParameter('fecha'));
       	$anno=$fecha[2];
       	$this->configGrid();
       	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
       	if (Obras::chequearDisponibilidadPresupuesto($this->getRequestParameter('codigo'),$anno,$grid,$num,$monto,&$mondis))
       	{
       	  $dato=$reg->getNompre();
       	}
       	else
       	{
          $javascript="alert('No Existe Disponibilidad Presupuestaria . El monto Disponible es: ".$mondis."');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       	}
       }else {
       $javascript="alert('El Código Presupuestario no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
     }
     else  if ($this->getRequestParameter('ajax')=='2')
     {
        $c= new Criteria();
		$c->add(OcdefparPeer::CODPAR,$this->getRequestParameter('codigo'));
      	$reg=OcdefparPeer::doSelectOne($c);
  		if ($reg)
  		{
  		  $dato=$reg->getDespar();
  		  $abr=Herramientas::getX('CODUNI','Ocunidad','Abruni',$reg->getCoduni());
  		  $dato1=$abr;
  		  $dato2=number_format($reg->getCosuni(),2,',','.');
  		  $javascript="";
  		}
  		else
  		{
          $abr="";
          $dato1="";
          $dato2="";
          $javascript="alert('El Partida no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
  		}
  		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato1.'",""],["'.$this->getRequestParameter('costo').'","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';

      }
      else  if ($this->getRequestParameter('ajax')=='3')
     {
       $c= new Criteria();
	   $c->add(NphojintPeer::CEDEMP,$this->getRequestParameter('codigo'));
       $reg=NphojintPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getNomemp();
       }else {
       $javascript="alert('El Empleado no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
     }
     else  if ($this->getRequestParameter('ajax')=='4')
     {
       $c= new  Criteria();
       $c->add(OctipobrPeer::CODTIPOBR,$this->getRequestParameter('codigo'));
       $reg= OctipobrPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDestipobr();
       }else{
       	$javascript="alert('El Tipo de Obra no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
     }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }

  protected function saveOcregobr($ocregobr)
  {
  	if ($ocregobr->getId())
  	{
  		$ocregobr->save();
  		$grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
  		Obras::grabarInspectores($ocregobr,$grid2);
  		$this->coderror=-1;
       	return $this->coderror;
  	}
  	else
  	{
	  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
	    $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
	    if (Obras::salvarOycdesobr($ocregobr,$grid,$grid2,&$error))
	    {
	    	$this->coderror=$error;
	       	return $this->coderror;
	    }
	    else
	    {
	      $this->coderror=$error;
	      return $this->coderror;
	    }
  	}
  }

  protected function deleteOcregobr($ocregobr)
  {
    if (!Obras::eliminarOycdesobr($ocregobr))
    {
     return false;
    }
    else
    {
    	return true;
    }
  }

  public function executeDelete()
  {
    $this->ocregobr = OcregobrPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocregobr);
    $id=$this->getRequestParameter('id');

    if (!$this->deleteOcregobr($this->ocregobr))
    {
    	$this->setFlash('notice','La Obra no puede ser eliminada, ya que tienen registros Asociados');
        return $this->redirect('oycdesobr/edit?id='.$id);
    }
    $this->Bitacora('Elimino');


    return $this->redirect('oycdesobr/list');
  }

    public function handleErrorEdit()
  {
    $this->preExecute();
    $this->ocregobr = $this->getOcregobrOrCreate();
    try{ $this->updateOcregobrFromRequest();}
    catch (Exception $ex){}

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        if($this->fechamay!=-1)
        {
         $err = Herramientas::obtenerMensajeError($this->fechamay);
         $this->getRequest()->setError('ocregobr{fecini}',$err);
        }
        if($this->partid!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->partid);
         $this->getRequest()->setError('',$err1);
        }
        if($this->inspec!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->inspec);
         $this->getRequest()->setError('',$err1);
        }
      }

    return sfView::SUCCESS;
  }
}
