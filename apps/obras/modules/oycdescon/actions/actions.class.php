<?php

/**
 * oycdescon actions.
 *
 * @package    siga
 * @subpackage oycdescon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdesconActions extends autooycdesconActions
{
	public  $coderror=-1;
	public  $coderror1=-1;
	public  $disponible=0;

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->ocregcon = $this->getOcregconOrCreate();
      try{ $this->updateOcregconFromRequest();}
      catch (Exception $ex){}
      $this->configGridPartidas($this->ocregcon->getCodobr(),$this->ocregcon->getId());
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);
      $anno=substr($this->ocregcon->getFeccon(),0,4);
      $monto=$this->ocregcon->getMoncon();
  	  if (!Obras::chequearDisponibilidadPresupuesto($this->ocregcon->getCodpre(),$anno,$grid,'1',$monto,&$mondis))
  	  {
        $this->coderror1=152;
        $this->disponible=$mondis;
  	  }

       if ($this->coderror1<>-1)
       {
        return false;
       }else return true;
    }else return true;
  }



 	public function executeEdit()
   {
    $this->ocregcon = $this->getOcregconOrCreate();
    $this->setVars();
    $this->tipeje=Constantes::comboTiposEjecucion();
    if (!$this->ocregcon->getId())
    {
  	 $this->configGridIngRes($this->getRequestParameter('ocregcon[codcon]'));
  	 $this->configGridPartidas($this->getRequestParameter('ocregcon[codobr]'),'');
  	 $this->configGridRetenciones($this->getRequestParameter('ocregcon[codcon]'));
  	 $this->configGridOfertas($this->getRequestParameter('ocregcon[codcon]'));
    }
    else
    {
     $this->configGridIngRes($this->ocregcon->getCodcon());
  	 $this->configGridPartidas($this->ocregcon->getCodcon(),$this->ocregcon->getId());
  	 $this->configGridRetenciones($this->ocregcon->getCodcon());
  	 $this->configGridOfertas($this->ocregcon->getCodcon());
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcregconFromRequest();

      if ($this->saveOcregcon($this->ocregcon)==-1)
      {
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdescon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdescon/list');
      }
      else
      {
        return $this->redirect('oycdescon/edit?id='.$this->ocregcon->getId());
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

  public function configGridIngRes($codigo='')
  {
    $c = new Criteria();
    $c->add(OcingresconPeer::CODCON,$codigo);
    $per = OcingresconPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Ocingrescon');
    $opciones->setAncho(600);
    $opciones->setAnchoGrid(600);
    $opciones->setName('b');
    $opciones->setFilas(10);
    $opciones->setTitulo('Ingenieros Residentes');
    $opciones->setHTMLTotalFilas(' ');

    $obj= array('cedper' => 1, 'nomper' => 2);
    $params = array("'+$('ocregcon_codpro').value+'","'+$('ocregcon_tipcon').value+'",'val2');

    $col1 = new Columna('Cédula');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('ceding');
    $col1->setCatalogo('Ocdefper','sf_admin_edit_form',$obj,'Ocdefper_Oycdescon',$params);
    $col1->setJScript('onBlur="javascript:event.keyCode=13; validargridIng(event,this.id);"');
    $col1->setHTML('type="text" size="15" maxlength="10"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('noming');
    $col2->setHTML('type="text" size="35" readonly="true"');

    $col3 = clone $col2;
    $col3->setTitulo('Nro.C.I.V');
    $col3->setTipo(Columna::TEXTO);
    $col3->setNombreCampo('nrocoling');
    $col3->setHTML('type="text" size="10" maxlength="15"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);

	}

   public function configGridPartidas($codobr='', $nuevo='')
   {
       if ($nuevo=='')
       {
        $c = new Criteria();
        $c->add(OcpreobrPeer::CODOBR,$codobr);
        $sql="ocpreobr.canobr<>ocpreobr.cancon";
        $c->add(OcpreobrPeer::CANOBR,$sql,Criteria::CUSTOM);
        $reg = OcpreobrPeer::doSelect($c);
       }
       else
       {
       	$c = new Criteria();
        $c->add(OcparconPeer::CODCON,$codobr);
        $reg = OcparconPeer::doSelect($c);
       }

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       if ($nuevo=='')
       $opciones->setTabla('Ocpreobr');
       else $opciones->setTabla('Ocparcon');
       $opciones->setAncho(1000);
       $opciones->setAnchoGrid(1000);
       $opciones->setFilas(50);
       $opciones->setName('a');
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Cód. Partida');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codpar');
       $col1->setHTML('type="text" size="17" maxlength="32" readonly=true');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('despar');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = clone $col2;
       $col3->setTitulo('Unidad de Medida');
       $col3->setNombreCampo('coduni');
       $col3->setEsGrabable(false);
       $col3->setHTML('type="text" size="5" readonly=true');

       $col4 = new Columna('Cantidad contratada');
       $col4->setEsGrabable(true);
       $col4->setTipo(Columna::MONTO);
       $col4->setAlineacionContenido(Columna::DERECHA);
       $col4->setAlineacionObjeto(Columna::DERECHA);
       if ($nuevo=='')
       $col4->setNombreCampo('cant');
       else $col4->setNombreCampo('cancon');
       $col4->setEsNumerico(true);
       $col4->setHTML('type="text" size="10"');
       $col4->setJScript('onKeypress="entermonto(event,this.id); cantidadcon(event,this.id);"');

       $col5 = clone $col4;
       $col5->setTitulo('Cant. Valuada');
       $col5->setNombreCampo('canval');
       $col5->setHTML('type="text" size="10" readonly=true');

       $col6 = clone $col4;
       $col6->setTitulo('Costo');
       $col6->setNombreCampo('cosuni');
       $col6->setHTML('type="text" size="10"');
       $col6->setJScript('onKeypress="entermonto(event,this.id); totalcon(event,this.id);"');

       $col7 = clone $col4;
       $col7->setTitulo('Total');
       $col7->setNombreCampo('montot2');
       $col7->setEsTotal(true,'ocregcon_totales');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);
       $opciones->addColumna($col6);
       $opciones->addColumna($col7);

       $this->obj2 = $opciones->getConfig($reg);

  }

   public function configGridRetenciones($codcon='')
   {
       $c = new Criteria();
       $c->add(OcretconPeer::CODCON,$codcon);
       $reg = OcretconPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Ocretcon');
       $opciones->setAncho(800);
       $opciones->setAnchoGrid(800);
       $opciones->setFilas(10);
       $opciones->setName('c');
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $obj= array('codtip' => 1,'destip' => 2,'porret' => 3,'basimp' => 4,'unitri' => 5,'factor' => 6,'porsus' => 7,'stamon' => 8);

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codtip');
       $col1->setJScript('onBlur="javascript:event.keyCode=13; validargrid(event,this.id);"');
       $col1->setCatalogo('octipret','sf_admin_edit_form',$obj,'Octipret_Oycdescon');
       $col1->setHTML('type="text" size="17" maxlength="3"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('destip');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = new Columna('%');
       $col3->setEsGrabable(true);
       $col3->setTipo(Columna::MONTO);
       $col3->setAlineacionContenido(Columna::DERECHA);
       $col3->setAlineacionObjeto(Columna::DERECHA);
       $col3->setNombreCampo('porret');
       $col3->setEsNumerico(true);
       $col3->setHTML('type="text" size="10"');

       $col4 = clone $col3;
       $col4->setTitulo('Base Imponible');
       $col4->setNombreCampo('basimp');
       $col4->setEsGrabable(false);
       $col4->setHTML('type="text" size="10"');
       $col4->setOculta(true);

       $col5 = clone $col3;
       $col5->setTitulo('Unidad Tributaria');
       $col5->setNombreCampo('unitri');
       $col5->setEsGrabable(false);
       $col5->setHTML('type="text" size="10"');
       $col5->setOculta(true);

       $col6 = clone $col3;
       $col6->setTitulo('Factor');
       $col6->setNombreCampo('factor');
       $col6->setEsGrabable(false);
       $col6->setHTML('type="text" size="10"');
       $col6->setOculta(true);

       $col7 = clone $col3;
       $col7->setTitulo('Sustraendo');
       $col7->setNombreCampo('porsus');
       $col7->setEsGrabable(false);
       $col7->setHTML('type="text" size="10"');
       $col7->setOculta(true);

       $col8 = new Columna('Estatus');
       $col8->setTipo(Columna::TEXTO);
       $col8->setAlineacionObjeto(Columna::CENTRO);
       $col8->setAlineacionContenido(Columna::CENTRO);
       $col8->setNombreCampo('stamon');
       $col8->setEsGrabable(false);
       $col8->setHTML('type="text" size="10"');
       $col8->setOculta(true);

       $col9 = clone $col3;
       $col9->setTitulo('Monto');
       $col9->setNombreCampo('monret');
       $col9->setHTML('type="text" size="10" readonly="true"');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);
       $opciones->addColumna($col6);
       $opciones->addColumna($col7);
       $opciones->addColumna($col8);
       $opciones->addColumna($col9);

       $this->obj3 = $opciones->getConfig($reg);

  }

     public function configGridOfertas($codcon='')
   {
       $c = new Criteria();
       $c->add(OcofeserPeer::CODCON,$codcon);
       $reg = OcofeserPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Ocofeser');
       $opciones->setAncho(1500);
       $opciones->setAnchoGrid(1500);
       $opciones->setFilas(10);
       $opciones->setName('d');
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $arre= array('codtippro' => 1, 'destippro' => 2);

       $col1 = new Columna('Tipo de Profesional');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codtippro');
       $col1->setAjax('oycdescon',9,2);
       $col1->setCatalogo('Octipprl','sf_admin_edit_form',$arre,'oyctartip_octipprl');
       $col1->setHTML('type="text" size="10" maxlength="4"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('destippro');
       $col2->setHTML('type="text" size="30" readonly=true');

       $arre2=array('nivpro' => 3,'exppro' => 4,'valhor' => 8);

       $paramx = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');

       $col3 =  new Columna('Nivel Profesional');
       $col3->setTipo(Columna::TEXTO);
       $col3->setEsGrabable(true);
       $col3->setAlineacionObjeto(Columna::CENTRO);
       $col3->setAlineacionContenido(Columna::CENTRO);
       $col3->setNombreCampo('nivpro');
       $col3->setJScript('onBlur="javascript:event.keyCode=13; ajaxnivelpro(event,this.id);"');
       $col3->setCatalogo('Octartip','sf_admin_edit_form',$arre2,'Octipprl_Oycdescon',$paramx);
       $col3->setHTML('type="text" size="10"');

       $col4 = clone $col2;
       $col4->setTitulo('Experiencia(Años)');
       $col4->setNombreCampo('exppro');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="10" readonly=true');

       $col5 = new Columna('Número de Personas');
       $col5->setEsGrabable(true);
       $col5->setTipo(Columna::MONTO);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('numper');
       $col5->setEsNumerico(true);
       $col5->setHTML('type="text" size="10"');
       $col5->setJScript('onKeypress="entermonto_d(event,this.id);" onBlur="javascript:event.keyCode=13; focus5y6(event,this.id);"');

       $col6 = clone $col5;
       $col6->setTitulo('Cant. Horas Contratadas');
       $col6->setNombreCampo('canhor');

       $col7 = clone $col5;
       $col7->setTitulo('Cant. Valuada');
       $col7->setNombreCampo('canval');
       $col7->setHTML('type="text" size="10" readonly=true');

       $col8 = clone $col5;
       $col8->setTitulo('Valor Unitario');
       $col8->setNombreCampo('valhor');
       $col8->setEsGrabable(false);
       $col8->setHTML('type="text" size="10" readonly=true');

       $col9 = clone $col5;
       $col9->setTitulo('Total');
       $col9->setNombreCampo('montot');
       $col9->setEsGrabable(false);
       $col9->setHTML('type="text" size="10" readonly=true');
       $col9->setEsTotal(true,'ocregcon_totofer');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);
       $opciones->addColumna($col6);
       $opciones->addColumna($col7);
       $opciones->addColumna($col8);
       $opciones->addColumna($col9);

       $this->obj4 = $opciones->getConfig($reg);

  }

  protected function updateOcregconFromRequest()
  {
    $ocregcon = $this->getRequestParameter('ocregcon');

    if (isset($ocregcon['codcon']))
    {
      $this->ocregcon->setCodcon($ocregcon['codcon']);
    }
    if (isset($ocregcon['tipcon']))
    {
      $this->ocregcon->setTipcon($ocregcon['tipcon']);
    }
    if (isset($ocregcon['nomtipcon']))
    {
      $this->ocregcon->setNomtipcon($ocregcon['nomtipcon']);
    }
    if (isset($ocregcon['codobr']))
    {
      $this->ocregcon->setCodobr($ocregcon['codobr']);
    }
    if (isset($ocregcon['desobr']))
    {
      $this->ocregcon->setDesobr($ocregcon['desobr']);
    }
    if (isset($ocregcon['codpro']))
    {
      $this->ocregcon->setCodpro($ocregcon['codpro']);
    }
    if (isset($ocregcon['nompro']))
    {
      $this->ocregcon->setNompro($ocregcon['nompro']);
    }
    if (isset($ocregcon['descon']))
    {
      $this->ocregcon->setDescon($ocregcon['descon']);
    }
    if (isset($ocregcon['feccon']))
    {
      if ($ocregcon['feccon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['feccon']))
          {
            $value = $dateFormat->format($ocregcon['feccon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['feccon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFeccon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFeccon(null);
      }
    }
    if (isset($ocregcon['fecini']))
    {
      if ($ocregcon['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecini']))
          {
            $value = $dateFormat->format($ocregcon['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecini(null);
      }
    }
    if (isset($ocregcon['feclic']))
    {
      if ($ocregcon['feclic'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['feclic']))
          {
            $value = $dateFormat->format($ocregcon['feclic'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['feclic'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFeclic($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFeclic(null);
      }
    }
    if (isset($ocregcon['fecproini']))
    {
      if ($ocregcon['fecproini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecproini']))
          {
            $value = $dateFormat->format($ocregcon['fecproini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecproini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecproini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecproini(null);
      }
    }
    if (isset($ocregcon['fecrei']))
    {
      if ($ocregcon['fecrei'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecrei']))
          {
            $value = $dateFormat->format($ocregcon['fecrei'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecrei'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecrei($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecrei(null);
      }
    }
    if (isset($ocregcon['fecfin']))
    {
      if ($ocregcon['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecfin']))
          {
            $value = $dateFormat->format($ocregcon['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecfin(null);
      }
    }
    if (isset($ocregcon['fecrecdef']))
    {
      if ($ocregcon['fecrecdef'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecrecdef']))
          {
            $value = $dateFormat->format($ocregcon['fecrecdef'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecrecdef'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecrecdef($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecrecdef(null);
      }
    }
    if (isset($ocregcon['fecbuepro']))
    {
      if ($ocregcon['fecbuepro'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecbuepro']))
          {
            $value = $dateFormat->format($ocregcon['fecbuepro'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecbuepro'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecbuepro($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecbuepro(null);
      }
    }
    if (isset($ocregcon['fecpar']))
    {
      if ($ocregcon['fecpar'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecpar']))
          {
            $value = $dateFormat->format($ocregcon['fecpar'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecpar'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecpar($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecpar(null);
      }
    }
    if (isset($ocregcon['fecpro']))
    {
      if ($ocregcon['fecpro'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecpro']))
          {
            $value = $dateFormat->format($ocregcon['fecpro'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecpro'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecpro($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecpro(null);
      }
    }
    if (isset($ocregcon['fecrecprov']))
    {
      if ($ocregcon['fecrecprov'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecrecprov']))
          {
            $value = $dateFormat->format($ocregcon['fecrecprov'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecrecprov'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecrecprov($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecrecprov(null);
      }
    }
    if (isset($ocregcon['fecfinmod']))
    {
      if ($ocregcon['fecfinmod'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocregcon['fecfinmod']))
          {
            $value = $dateFormat->format($ocregcon['fecfinmod'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocregcon['fecfinmod'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocregcon->setFecfinmod($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocregcon->setFecfinmod(null);
      }
    }
    if (isset($ocregcon['moncon']))
    {
      $this->ocregcon->setMoncon($ocregcon['moncon']);
    }
    if (isset($ocregcon['monext']))
    {
      $this->ocregcon->setMonext($ocregcon['monext']);
    }
    if (isset($ocregcon['monmod']))
    {
      $this->ocregcon->setMonmod($ocregcon['monmod']);
    }
    if (isset($ocregcon['monmul']))
    {
      $this->ocregcon->setMonmul($ocregcon['monmul']);
    }
    if (isset($ocregcon['monful']))
    {
      $this->ocregcon->setMonful($ocregcon['monful']);
    }
    if (isset($ocregcon['poriva']))
    {
      $this->ocregcon->setPoriva($ocregcon['poriva']);
    }
    if (isset($ocregcon['moniva']))
    {
      $this->ocregcon->setMoniva($ocregcon['moniva']);
    }
    if (isset($ocregcon['tieejecon']))
    {
      $this->ocregcon->setTieejecon($ocregcon['tieejecon']);
    }

      $this->ocregcon->setStacon('A');

    if (isset($ocregcon['subtot']))
    {
      $this->ocregcon->setSubtot($ocregcon['subtot']);
    }
    if (isset($ocregcon['gasree']))
    {
      $this->ocregcon->setGasree($ocregcon['gasree']);
    }
    if (isset($ocregcon['platie']))
    {
      $this->ocregcon->setPlatie($ocregcon['platie']);
    }
    if (isset($ocregcon['codpre']))
    {
      $this->ocregcon->setCodpre($ocregcon['codpre']);
    }
    if (isset($ocregcon['despre']))
    {
      $this->ocregcon->setDespre($ocregcon['despre']);
    }
    if (isset($ocregcon['totcon']))
    {
      $this->ocregcon->setTotcon($ocregcon['totcon']);
    }
    if (isset($ocregcon['codpreiva']))
    {
      $this->ocregcon->setCodpreiva($ocregcon['codpreiva']);
    }
    if (isset($ocregcon['contratado']))
    {
      $this->ocregcon->setCoontratado($ocregcon['contratado']);
    }
    if (isset($ocregcon['contrapar']))
    {
      $this->ocregcon->setContrapar($ocregcon['contrapar']);
    }
    if (isset($ocregcon['disponible']))
    {
      $this->ocregcon->setDisponible($ocregcon['disponible']);
    }
  }

  public function setVars()
  {
  	$this->ocregcon = $this->getOcregconOrCreate();
    $c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $this->con_ins=$reg->getCodconins();
      $this->con_sup=$reg->getCodconsup();
      $this->con_pro=$reg->getCodconpro();
      $this->con_obra=$reg->getCodconobr();
      $this->planini=$reg->getPlaini();
    }
    else
    {
      $this->con_ins="";
      $this->con_sup="";
      $this->con_pro="";
      $this->con_obra="";
      $this->planini="";
    }
    Obras::verificarContrato($this->ocregcon->getCodcon(),false,&$verificar_contrato);
    $this->verifica_anular=$verificar_contrato;

    Obras::verificarContrato($this->ocregcon->getCodcon(),true,&$verificar_contrato);
    $this->verifica_eliminar=$verificar_contrato;

  }

  protected function saveOcregcon($ocregcon)
  {
  	$new=$ocregcon->getId();
  	if ($new)
  	{
  	   $ocregcon->save();
  	   $this->coderror=-1;
       return $this->coderror;
  	}
  	else
  	{
	    $grid1=Herramientas::CargarDatosGrid($this,$this->obj);
	    $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
	    $grid3=Herramientas::CargarDatosGrid($this,$this->obj3);
	    $grid4=Herramientas::CargarDatosGrid($this,$this->obj4);
	    if (Obras::salvarOycdescon($ocregcon,$grid1,$grid2,$grid3,$grid4,$new))
	    {
	       $this->coderror=-1;
	       return $this->coderror;
	    }
	    else
	    {
	      $this->coderror=1004;
	      return $this->coderror;
	    }
  	}
  }

  public function executeDelete()
  {
    $this->ocregcon = OcregconPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocregcon);

    $c = new Criteria();
    $c->addJoin(OcpreobrPeer::CODOBR,Ocregcon::CODOBR);
    $c->addJoin(Ocregcon::CODCON,OcparconPeer::CODCON);
    $c->addJoin(Ocregcon::CODPAR,OcparconPeer::CODPAR);
    $c->add(OcpreobrPeer::CODOBR,$this->ocregcon->getCodobr());
    $c->add(Ocregcon::CODCON,$this->ocregcon->getCodcon());
    $result= OcpreobrPeer::doSelect($c);
    if ($result)
    {
      foreach($result as $obj)
      {
        $c = new Criteria();
        $c->add(OcpreobrPeer::CODOBR,$this->ocregcon->getCodobr());
        $c->add(OcpreobrPeer::CODPAR,$obj->getCodpar());
        $reg= OcpreobrPeer::doSelectOne($c);
        if ($reg)
        {
          $reg->setCancon($reg->getCancon()-$obj->getCancon());
          $reg->save();
        }
      }
    }
    Herramientas::EliminarRegistro('Ocparcon','Codcon',$this->ocregcon->getCodcon());
    Herramientas::EliminarRegistro('Cadetordc','Ordcon',$this->ocregcon->getCodcon());
    Herramientas::EliminarRegistro('Caordcon','Ordcon',$this->ocregcon->getCodcon());
    Herramientas::EliminarRegistro('Ocingrescon','Codcon',$this->ocregcon->getCodcon());
    Herramientas::EliminarRegistro('Ocretcon','Codcon',$this->ocregcon->getCodcon());
    Obras::eliminarCompromiso($this->ocregcon->getRefcon());
    $this->deleteOcregcon($this->ocregcon);

    return $this->redirect('oycdescon/list');
  }

  public function executeAnular()
  {
    $this->ocregcon = OcregconPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocregcon);

    $c = new Criteria();
    $c->addJoin(OcpreobrPeer::CODOBR,Ocregcon::CODOBR);
    $c->addJoin(Ocregcon::CODCON,OcparconPeer::CODCON);
    $c->addJoin(Ocregcon::CODPAR,OcparconPeer::CODPAR);
    $c->add(OcpreobrPeer::CODOBR,$this->ocregcon->getCodobr());
    $c->add(Ocregcon::CODCON,$this->ocregcon->getCodcon());
    $result= OcpreobrPeer::doSelect($c);
    if ($result)
    {
      foreach($result as $obj)
      {
        $c = new Criteria();
        $c->add(OcpreobrPeer::CODOBR,$this->ocregcon->getCodobr());
        $c->add(OcpreobrPeer::CODPAR,$obj->getCodpar());
        $reg= OcpreobrPeer::doSelectOne($c);
        if ($reg)
        {
          $reg->setCancon($reg->getCancon()-$obj->getCancon());
          $reg->save();
        }
      }
    }

    $c= new Criteria();
    $c->add(OcregconPeer::CODCON,$this->ocregcon->getCodcon());
    $c->add(OcregconPeer::CODOBR,$this->ocregcon->getCodobr());
    $resul= OcregconPeer::doSelect($c);
    if ($resul)
    {
      $resul->setStacon('N');
      $resul->save();
    }

    $c= new Criteria();
    $c->add(OcregconPeer::CODCON,$this->ocregcon->getCodcon());
    $datos= OcregconPeer::doSelectOne($c);
    if ($datos)
    {
    	$c = new Criteria();
    	$c->add(CpimpcomPeer::REFCOM,$datos->getRefcon());
    	$res= CpimpcomPeer::doSelectOne($c);
    	if ($res)
    	{
    	  $res->setStaimp('N');
    	  $res->save();
    	}

    	$c = new Criteria();
    	$c->add(CpcomproPeer::REFCOM,$datos->getRefcon());
    	$resu= CpcomproPeer::doSelectOne($c);
    	if ($resu)
    	{
    	  $resu->setStacom('N');
    	  $resu->save();
    	}
    }

     $this->setFlash('notice', 'El Contrato ha sido Anulado');
     return $this->redirect('oycdescon/edit?id='.$this->ocregcon->getId());
  }

   public function executeAjax()
   {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $dato="";
     $dato1="";
     $dato2="";
     $dato3="";
     $javascript="";
     $this->setVars();
     if ($this->getRequestParameter('ajax')=='1')
     {
       $c= new Criteria();
	   $c->add(OctipconPeer::CODTIPCON,$this->getRequestParameter('codigo'));
       $reg=OctipconPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDestipcon();
       	$codigo=$this->getRequestParameter('codigo');
       	switch ($codigo)
       	{
          case ($this->con_ins || $this->con_sup || $this->con_pro):
            $javascript="$('oferta2').show(); $('oferta').show(); $('partida').hide(); $('grid_a').innerHTML='<legend id=grid_a >Personal Contratado</legend>'; $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>';";
          break;
          default:
            $javascript="";
          break;
        }
       }else {
       $javascript="alert('El Tipo de Contrato no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='2')
     {
        $c= new Criteria();
		$c->add(OcregobrPeer::CODOBR,$this->getRequestParameter('codigo'));
      	$reg=OcregobrPeer::doSelectOne($c);
  		if ($reg)
  		{
  		  $dato=$reg->getDesobr();
  		  $dato1=number_format($reg->getIvaobr(),2,',','.');
  		  $dato2=$reg->getCodpre();
  		  $dato3=$reg->getDespre();
          $dato4=$reg->getCodpreiva();

  		 // $sql="Select codobr,codpar,sum(cancon),sum(canobr) From OCPreObr where CodObr='".$this->getRequestParameter('codigo')."' Group by codpar,codobr Having Sum(CANCON)< Sum(CANOBR) ";
          $c= new Criteria();
     	  $c->add(OcpreobrPeer::CODOBR,$this->getRequestParameter('codigo'));
          $c->clearSelectColumns();
		  $c->addSelectColumn(OcpreobrPeer::CODOBR);
		  $c->addSelectColumn(OcpreobrPeer::CODPAR);
		  $c->addSelectColumn(' SUM('.OcpreobrPeer::CANCON.') as CANCON');
		  $c->addSelectColumn(' SUM('.OcpreobrPeer::CANOBR.') as CANOBR');
		  $c->addSelectColumn("'' as CANCONFIN");
		  $c->addSelectColumn("'' as ADIPAR");
		  $c->addSelectColumn("'' as COSUNI");
		  $c->addSelectColumn("'' as COSUNIFIN");
		  $c->addSelectColumn("'' as CODPRE");
		  $c->addSelectColumn("'' as NOMPRE");
		  $c->addSelectColumn("'' as ID");
	      $c->addGroupByColumn(OcpreobrPeer::CODOBR);
	      $c->addGroupByColumn(OcpreobrPeer::CODPAR);
          $sub = $c->getNewCriterion(OcpreobrPeer::CODOBR, 'SUM('.OcpreobrPeer::CANCON .') < SUM('.OcpreobrPeer::CANOBR .')', Criteria::CUSTOM);
          $c->addHaving($sub);
          $registro= OcpreobrPeer::doSelect($c);
          if ($registro)
          {
            if ($this->getRequestParameter('tipcon')!=$this->con_ins && $this->getRequestParameter('tipcon')!=$this->con_sup && $this->getRequestParameter('tipcon')!=$this->con_pro)
            {
              if (Obras::verificarStatus($this->getRequestParameter('numcon')))
              {
  		        $javascript="cargarpartidas()";
              }
              else
              {
              	$javascript="alert('El Contrato escogido esta anulado no puede asignarle obras');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
              }
            }
          }
          else
          {
          	if ($this->getRequestParameter('tipcon')!=$this->con_ins && $this->getRequestParameter('tipcon')!=$this->con_sup && $this->getRequestParameter('tipcon')!=$this->con_pro)
            {
            	if ($this->getRequestParameter('id'))
            	{
            	  $javascript="alert('La Obra esta completamente contratada');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
            	}
            }
          }
        }
  		else
  		{
          $dato1="";
          $dato2="";
          $dato3="";
          $dato4="";
          $javascript="alert('La Obra no esta registrada');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
  		}
  		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocregcon_poriva","'.$dato1.'",""],["ocregcon_codpre","'.$dato2.'",""],["ocregcon_despre","'.$dato3.'",""],["ocregcon_codpreiva","'.$dato4.'",""],["javascript","'.$javascript.'",""]]';
  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
     else  if ($this->getRequestParameter('ajax')=='3')
     {
       $c= new Criteria();
       $c->add(OcadjobrPeer::CODOBR,$this->getRequestParameter('obra'));
       $c->add(OcadjobrPeer::STATUS,1);
       $regist=OcadjobrPeer::doSelectOne($c);
       if ($regist)
       {
        $c= new Criteria();
	    $c->add(CaproveePeer::CODPRO,$regist->getCodprogan());
        $reg=CaproveePeer::doSelectOne($c);
        if ($reg)
        {
       	 $c = new Criteria();
       	 $c->add(OcoferprePeer::CODPRO,$reg->getCodpro());
       	 $c->add(OcoferprePeer::CODOBR,$this->getRequestParameter('obra'));
       	 $regist= OcoferprePeer::doSelect($c);
       	 if ($regist)
       	 {
       	   $dato=$reg->getCodpro();
       	   $dato1=$reg->getNompro();

       	   $c= new Criteria();
       	   $c->add(OcreglicPeer::CODOBR,$this->getRequestParameter('obra'));
       	   $resul= OcreglicPeer::doSelectOne($c);
       	   if ($resul)
       	   {
       	   	$feclici=date('d/m/Y',strtotime($resul->getFecreg()));
       	   }else $feclici='';
       	   $this->configGridPartidas($this->getRequestParameter('obra'),'');
       	   $javascript="$('$cajtexcom').readOnly=true;    $$('.botoncat')[2].disabled=true;";
       	 }
       	 else
       	 { $javascript="alert('La Empresa Contratista no a ofertado para esta obra');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}

        }else {
         $javascript="alert('La Empresa Contratista no esta registrada');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
        }
       }
       else
       {
       	$javascript="alert('La Empresa Contratista no ganó la adjudicación de esta obra');";
       }
       $output = '[["'.$cajtexcom.'","'.$dato.'",""],["'.$cajtexmos.'","'.$dato1.'",""],["ocregcon_feclic","'.$feclici.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

     }
     else  if ($this->getRequestParameter('ajax')=='4')
     {
       if ($this->getRequestParameter('tipcon')!=$this->con_ins && $this->getRequestParameter('tipcon')!=$this->con_sup && $this->getRequestParameter('tipcon')!=$this->con_pro)
       {
       	$c = new Criteria;
        $c->add(OcproperPeer::CODPRO,$this->getRequestParameter('codpro'));
        $c->addJoin(OcdefperPeer::CEDPER, OcproperPeer::CEDPER);
        $c->addJoin(OcdefperPeer::CODTIPCAR, OcdefempPeer::CODINGRES);
        $c->addJoin(OcdefperPeer::CODTIPCAR, OctipcarPeer::CODTIPCAR);
        $c->addJoin(OcdefempPeer::CODINGRES, OctipcarPeer::CODTIPCAR);
        $resultado= OcdefperPeer::doSelectOne($c);
        if ($resultado)
        {
          $dato=$resultado->getNomper();
        }
        else { $javascript="alert('El Ingeniero no esta registrado');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}
       }
       else
       {
       	 if ($this->getRequestParameter('tipcon')==$this->con_ins || $this->getRequestParameter('tipcon')==$this->con_sup || $this->getRequestParameter('tipcon')==$this->con_pro)
         {
           $c = new Criteria;
           $c->add(OcproperPeer::CODPRO,$this->getRequestParameter('codpro'));
           $c->addJoin(OcdefperPeer::CEDPER, OcproperPeer::CEDPER);
           $c->addJoin(OcdefperPeer::CODTIPCAR, OctipcarPeer::CODTIPCAR);
           $resultado= OcdefperPeer::doSelectOne($c);
           if ($resultado)
           {
             $dato=$resultado->getNomper();
           }
           else { $javascript="alert('El Ingeniero no esta registrado');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}
         }
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='5')
     {
       $c= new Criteria();
       $c->add(OctipretPeer::CODTIP,$this->getRequestParameter('codigo'));
       $registro= OctipretPeer::doSelectOne($c);
       if ($registro)
       {
       	$dato=$registro->getDestip();
       	$dato1=number_format($registro->getPorret(),2,',','.');
       	$dato2=number_format($registro->getBasimp(),2,',','.');
       	$dato3=number_format($registro->getUnitri(),2,',','.');
       	$dato4=number_format($registro->getFactor(),4,',','.');
       	$dato5=number_format($registro->getPorsus(),2,',','.');
       	$dato6=$registro->getStamon();
       }
       else { $dato4=""; $dato5=""; $dato6=""; $javascript="alert('El Tipo de Retención no Existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('porret').'","'.$dato1.'",""],["'.$this->getRequestParameter('baseimp').'","'.$dato2.'",""],["'.$this->getRequestParameter('unidadtri').'","'.$dato3.'",""],["'.$this->getRequestParameter('factor').'","'.$dato4.'",""],["'.$this->getRequestParameter('porsus').'","'.$dato5.'",""],["'.$this->getRequestParameter('estatus').'","'.$dato6.'",""],["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='6')
     {
       $c = new Criteria();
       $c->add(OcregconPeer::CODCON,$this->getRequestParameter('contrato'));
       $result= OcregconPeer::doSelectOne($c);
       if ($result)
       {
       	$alicuota=0;
       	$c = new Criteria();
        $reg=OcdefempPeer::doSelectOne($c);
        if ($reg)
        {
          if ($reg->getPormul()=='')
          {
           $alicuota=0;
          }else { $dato='0,00'; $alicuota=$reg->getPormul();}
        }
        else
        {
         $dato='0,00';
         $javascript="alert('La Alícuota no esta definida en elmodulo de Definición de Institución');";
        }
        if ($javascript=="")
        {
         $fecha=$result->getFecpro();
         $fecha2=$result->getFecfin();
         $fecact=date("Y-m-d");
       	if ($fecha!="")
       	{
         if ($fecact>$fecha)
         {
           $mont=Herramientas::convnume($this->getRequestParameter('montotal'));
           $total=$mont * ($alicuota/1000) * Herramientas::datediff("d",$fecha,$fecact);
           $dato=number_format($total,2,',','.');
         }else { $dato='0,00';}
       	}
       	else
       	{
          if ($fecact>$fecha2)
          {
           $mont=Herramientas::convnume($this->getRequestParameter('montotal'));
           $total=$mont * ($alicuota/1000) * Herramientas::datediff("d",$fecha2,$fecact);
           $dato=number_format($total,2,',','.');
          }else { $dato='0,00';}
       	}
       }
       }else { $dato='0,00';}
       $output = '[["ocregcon_monmul","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='7')
     {
       $combo=$this->getRequestParameter('cmbplatie');
       $tiempo=$this->getRequestParameter('tieeje');
       $dateFormat = new sfDateFormat($this->getUser()->getCulture());
       $fecini = $dateFormat->format($this->getRequestParameter('fecini'), 'i', $dateFormat->getInputPattern('d'));
       if ($combo!="")
       {
         if ($combo=='D')
         {
           $fechatemp=Herramientas::dateAdd('d',$tiempo,$fecini,'+');
           $dato=Herramientas::llevar_a_viernes($fechatemp,&$mensaje);
           if ($mensaje!="")
           $javascript="alert('$mensaje')";
           else $javascript="";
         }
         if ($combo=='S')
         {
           $fechatemp=Herramientas::dateAdd('ww',$tiempo,$fecini,'+');
           $dato=Herramientas::llevar_a_viernes($fechatemp,&$mensaje);
           if ($mensaje!="")
           $javascript="alert('$mensaje')";
           else $javascript="";
         }
         if ($combo=='M')
         {
           $fechatemp=Herramientas::dateAdd('m',$tiempo,$fecini,'+');
           $dato=Herramientas::llevar_a_viernes($fechatemp,&$mensaje);
           if ($mensaje!="")
           $javascript="alert('$mensaje')";
           else $javascript="";
         }
       }
       else
       {
       	$dato=date("d/m/Y",strtotime(Herramientas::dateAdd('d',$tiempo,$fecini,'+')));
       	$javascript="";
       }

       $output = '[["ocregcon_fecfin","'.$dato.'",""],["ocregcon_fecfinmod","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='8')
     {
        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        $fecindex = $dateFormat->format($this->getRequestParameter('fecindex'), 'i', $dateFormat->getInputPattern('d'));
     	$dato=date("d/m/Y",strtotime(Herramientas::dateAdd('d',$this->getRequestParameter('plaini'),$fecindex,'+')));

     	$output = '[["ocregcon_fecini","'.$dato.'",""]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='9')
     {
       $c= new Criteria();
	   $c->add(OctipprlPeer::CODTIPPRO,$this->getRequestParameter('codigo'));
       $reg=OctipprlPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDestippro();
       }else { $javascript="alert('El Tipo de Profesional no existe'); $('". $cajtexcom ."').value='';";}

     	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='10')
     {
       $c= new Criteria();
	   $c->add(OctartipPeer::CODTIPPRO,$this->getRequestParameter('tipopro'));
	   $c->add(OctartipPeer::NIVPRO,$this->getRequestParameter('codigo'));
       $reg=OctartipPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getExppro();
       	$dato1=number_format($reg->getValhor(),2,',','.');
       }else { $javascript="alert('El Nivel de Profesional no esta asociado a ese Tipo de Profesional'); $('". $cajtexcom ."').value='';";}

     	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('valhor').'","'.$dato1.'",""],["javascript","'.$javascript.'",""]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='11')
     {
       $c= new Criteria();
	   $c->addJoin(CaproveePeer::CODPRO,OcproespPeer::CODPRO);
	   $c->add(CaproveePeer::CODPRO,$this->getRequestParameter('codigo'));
       $reg=CaproveePeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getNompro();
       }else { $javascript="alert('La contratista no esta registrada'); $('". $cajtexcom ."').value='';";}

     	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='12')
     {
       $fec1=$this->getRequestParameter('fecha1');
       $fec2=$this->getRequestParameter('fecha2');
       $msj=$this->getRequestParameter('msj');
       $signo=$this->getRequestParameter('signo');
       $limpia=$this->getRequestParameter('blanco');

      if (!Tesoreria::validarFechaMayorMenor($fec1,$fec2,$signo))
      {
       $javascript="alert_('$signo'); $('$limpia').value='';";
      }
      $output = '[["javascript","'.$javascript.'",""]]';
  	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='13')
     {
      $c= new Criteria();
      $c->add(OcpreobrPeer::CODOBR,$this->getRequestParameter('obra'));
      $c->add(OcpreobrPeer::CODPAR,$this->getRequestParameter('partida'));
      $result= OcpreobrPeer::doSelectOne($c);
      if ($result)
      {
        $cantpre=$result->getCanobr();
        $cantcon=$result->getCancon();
      }
      else
      {
      	$cantpre=0;
        $cantcon=0;
      }
      $verificar_contrado=$cantcon - $cantpre;

      $output = '[["ocregcon_contratado","'.$verificar_contrado.'",""]]';
  	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
     }
     else if ($this->getRequestParameter('ajax')=='14')
     {
     	$num=$this->getRequestParameter('num');
       	$monto=$this->getRequestParameter('monto');
       	$anno=$this->getRequestParameter('anno');
       	$grid='';
       	if (Obras::chequearDisponibilidadPresupuesto($this->getRequestParameter('codpre'),$anno,$grid,$num,$monto,&$mondis))
       	{
       	  $javascript="";
       	}
       	else
       	{
          $javascript="No Existe Disponibilidad Presupuestaria . El monto Disponible es: ".$mondis."";
       	}
      $output = '[["ocregcon_disponible","'.$javascript.'",""]]';
  	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
     }
     else if ($this->getRequestParameter('ajax')=='15')
     {
      $c= new Criteria();
      $c->add(OcparconPeer::CODCON,$this->getRequestParameter('contrato'));
      $c->add(OcparconPeer::CODPAR,$this->getRequestParameter('partida'));
      $result= OcparconPeer::doSelectOne($c);
      if ($result)
      {
        $cantantes=$result->getCancon();
        $cantcon=Herramientas::toFloat($this->getRequestParameter('cantidad'));
      }
      else
      {
      	$cantantes=0;
        $cantcon=0;
      }
      $verificar_contrado_part=$cantantes - $cantcon;

      $output = '[["ocregcon_contrapar","'.$verificar_contrado_part.'",""]]';
  	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;

     }
    }


  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIPCON','Octipcon','codtipcon',$this->getRequestParameter('ocregcon[tipcon]'));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODOBR','Ocregobr','codobr',$this->getRequestParameter('ocregcon[codobr]'));
      }
    else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('CODTIPREC','Catiprec','CODTIPREC',str_pad(trim($this->getRequestParameter('caprovee[codtiprec]')),4,0,STR_PAD_LEFT));
      }
    else if ($this->getRequestParameter('ajax')=='4')
      {
       $this->tags=Herramientas::autocompleteAjax('codtipesp','octipesp','codtipesp',str_pad(trim($this->getRequestParameter('caprovee[codtipesp]')),4,0,STR_PAD_LEFT));
      }

  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->ocregcon = $this->getOcregconOrCreate();
   try{	$this->updateOcregconFromRequest();}
   catch (Exception $ex){}

   $this->labels = $this->getLabels();

   if($this->getRequest()->getMethod() == sfRequest::POST)
   {
    if($this->coderror1!=-1)
    {
     $err = Herramientas::obtenerMensajeError($this->coderror1);
     $this->getRequest()->setError('',$err.'El Monto Disponible es: '.$this->disponible);
    }
   }
    return sfView::SUCCESS;
  }

}

