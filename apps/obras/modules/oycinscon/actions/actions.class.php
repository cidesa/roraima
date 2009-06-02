<?php

/**
 * oycinscon actions.
 *
 * @package    siga
 * @subpackage oycinscon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycinsconActions extends autooycinsconActions
{
  public  $coderror1=-1;

  public function executeEdit()
  {
    $this->ocinscon = $this->getOcinsconOrCreate();
    if (!$this->ocinscon->getId())
    {
    	$this->configGrid($this->getRequestParameter('ocinscon[codcon]'),$this->getRequestParameter('ocinscon[numins]'));
    }else {
    $this->configGrid($this->ocinscon->getCodcon(),$this->ocinscon->getNumins());}

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcinsconFromRequest();

      $this->saveOcinscon($this->ocinscon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycinscon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycinscon/list');
      }
      else
      {
        return $this->redirect('oycinscon/edit?id='.$this->ocinscon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function saveOcinscon($ocinscon)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Obras::salvarOycinscon($ocinscon,$grid);

  }
  protected function deleteOcinscon($ocinscon)
  {
    $c= new Criteria();
    $c->add(OcparinsPeer::CODCON,$ocinscon->getCodcon());
    $c->add(OcparinsPeer::NUMINS,$ocinscon->getNumins());
    OcparinsPeer::doDelete($c);

    $ocinscon->delete();
  }

  protected function updateOcinsconFromRequest()
  {
    $ocinscon = $this->getRequestParameter('ocinscon');
    $this->configGrid($ocinscon['codcon'],$ocinscon['numins']);

    if (isset($ocinscon['codcon']))
    {
      $this->ocinscon->setCodcon($ocinscon['codcon']);
    }
    if (isset($ocinscon['descon']))
    {
      $this->ocinscon->setDescon($ocinscon['descon']);
    }
    if (isset($ocinscon['codobr']))
    {
      $this->ocinscon->setCodobr($ocinscon['codobr']);
    }
    if (isset($ocinscon['desobr']))
    {
      $this->ocinscon->setDesobr($ocinscon['desobr']);
    }
    if (isset($ocinscon['codpro']))
    {
      $this->ocinscon->setCodpro($ocinscon['codpro']);
    }
    if (isset($ocinscon['nompro']))
    {
      $this->ocinscon->setNompro($ocinscon['nompro']);
    }
    if (isset($ocinscon['codtipins']))
    {
      $this->ocinscon->setCodtipins($ocinscon['codtipins']);
    }
    if (isset($ocinscon['numins']))
    {
      $this->ocinscon->setNumins($ocinscon['numins']);
    }
    if (isset($ocinscon['feccom']))
    {
      if ($ocinscon['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocinscon['feccom']))
          {
            $value = $dateFormat->format($ocinscon['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocinscon['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocinscon->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocinscon->setFeccom(null);
      }
    }
    if (isset($ocinscon['fecter']))
    {
      if ($ocinscon['fecter'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($ocinscon['fecter']))
          {
            $value = $dateFormat->format($ocinscon['fecter'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $ocinscon['fecter'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->ocinscon->setFecter($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->ocinscon->setFecter(null);
      }
    }
    if (isset($ocinscon['portietra']))
    {
      $this->ocinscon->setPortietra($ocinscon['portietra']);
    }
  }

   public function configGrid($codigo='', $numins='')
   {
     $c = new Criteria();
     $c->add(OcparinsPeer::CODCON,$codigo);
     $c->add(OcparinsPeer::NUMINS,$numins);
     $reg = OcparinsPeer::doSelect($c);

     $opciones = new OpcionesGrid();
     $opciones->setEliminar(true);
     $opciones->setTabla('Ocparins');
     $opciones->setAncho(1100);
     $opciones->setAnchoGrid(1100);
     $opciones->setFilas(50);
     $opciones->setTitulo('Datos de Partidas Inspeccionadas');
     $opciones->setHTMLTotalFilas(' ');

     $obj= array('codpar' => 1, 'despar' => 2, 'abruni' => 3, 'cancon' => 4, 'codcon' => 7);
     $param= array("'+$('ocinscon_codcon').value+'",'val2');

     $col1 = new Columna('Cód. Partida');
     $col1->setTipo(Columna::TEXTO);
     $col1->setEsGrabable(true);
     $col1->setAlineacionObjeto(Columna::CENTRO);
     $col1->setAlineacionContenido(Columna::CENTRO);
     $col1->setNombreCampo('codpar');
     $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxpartidains(event,this.id);"');
     if (!$this->ocinscon->getId()){
     $col1->setCatalogo('ocdefpar','sf_admin_edit_form',$obj,'Ocdefpar_Oycinscon',$param);
     $col1->setHTML('type="text" size="17" maxlength="32"');
   }else {
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
     $col3->setNombreCampo('abruni');
     $col3->setEsGrabable(false);
     $col3->setHTML('type="text" size="5" readonly=true');

     $col4 = new Columna('Cantidad contratada');
     $col4->setTipo(Columna::MONTO);
     $col4->setAlineacionContenido(Columna::DERECHA);
     $col4->setAlineacionObjeto(Columna::DERECHA);
     $col4->setNombreCampo('cancon');
     $col4->setEsNumerico(true);
     $col4->setHTML('type="text" size="10" readonly=true');

     $col5 = clone $col4;
     $col5->setTitulo('Ejecutado');
     $col5->setNombreCampo('poreje');
     $col5->setEsGrabable(true);
      if (!$this->ocinscon->getId()){
     $col5->setHTML('type="text" size="10"');
      }else {
      	$col5->setHTML('type="text" size="10" readonly=true');
      }
     $col5->setJScript('onKeyPress="entermonto(event,this.id); ejecutado(event,this.id);"');
     $col5->setEsTotal(true,'ocinscon_toteje');

     $col6 = new Columna('Observaciones');
     $col6->setTipo(Columna::TEXTO);
     $col6->setEsGrabable(true);
     $col6->setAlineacionObjeto(Columna::CENTRO);
     $col6->setAlineacionContenido(Columna::CENTRO);
     $col6->setNombreCampo('obsins');
     if (!$this->ocinscon->getId()){
     $col6->setHTML('type="text" size="17" maxlength="250"');
     }else{
     	$col6->setHTML('type="text" size="17" maxlength="250" readonly=true');
     }


     $col7 = new Columna('Contrato');
     $col7->setTipo(Columna::TEXTO);
     $col7->setAlineacionObjeto(Columna::IZQUIERDA);
     $col7->setAlineacionContenido(Columna::IZQUIERDA);
     $col7->setNombreCampo('codcon');
     $col7->setEsGrabable(true);
     $col7->setOculta(true);
     $col7->setHTML('type="text" size="30" readonly=true');

     $opciones->addColumna($col1);
     $opciones->addColumna($col2);
     $opciones->addColumna($col3);
     $opciones->addColumna($col4);
     $opciones->addColumna($col5);
     $opciones->addColumna($col6);
     $opciones->addColumna($col7);

     $this->obj = $opciones->getConfig($reg);
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('codcon','ocregcon','codcon',$this->getRequestParameter('ocinscon[codcon]'));
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $this->tags=Herramientas::autocompleteAjax('codtipins','octipins','codtipins',$this->getRequestParameter('ocinscon[codtipins]'));
    }
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(OcregconPeer::CODCON,$codigo);
        $data=OcregconPeer::doSelectOne($c);
        if ($data)
        {
          $dato=$data->getDescon();
          $dato1=$data->getCodobr();
          $dato2=Herramientas::getX('CODOBR','Ocregobr','Desobr',$dato1);
          $dato3=$data->getCodpro();
          $dato4=Herramientas::getX('CODPRO','Caprovee','Nompro',$dato3);
          $dato5=$data->getStacon();
          $javascript="";
        }
        else { $dato=""; $dato1=""; $dato2=""; $dato3=""; $dato4=""; $dato5="";
        	$javascript="alert('El Número de Contrato no existe'); $('".$cajtexcom."').value";}
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocinscon_codobr","'.$dato1.'",""],["ocinscon_desobr","'.$dato2.'",""],["ocinscon_codpro","'.$dato3.'",""],["ocinscon_nompro","'.$dato4.'",""],["ocinscon_stacon","'.$dato5.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(OcparconPeer::CODCON,$this->getRequestParameter('contrato'));
        $c->add(OcparconPeer::CODPAR,$this->getRequestParameter('codigo'));
        $c->addJoin(OcdefparPeer::CODPAR,OcparconPeer::CODPAR);
        $c->addJoin(OcdefparPeer::CODUNI,OcunidadPeer::CODUNI);
        $reg=OcdefparPeer::doSelectOne($c);
        if ($reg)
        {
         $dato=$reg->getDespar();
         $q= new Criteria();
         $q->add(OcparconPeer::CODCON,$this->getRequestParameter('contrato'));
         $q->add(OcparconPeer::CODPAR,$reg->getCodpar());
         $regi= OcparconPeer::doSelectOne($q);
         if ($regi)
         {
         	$canc=$regi->getCancon();
         }else $canc=0;
         $dato1= number_format($canc,2,',','.');
         $dato3=$this->getRequestParameter('contrato');
         $desuni=H::getX('coduni','ocunidad','abruni',$reg->getCoduni());
         $dato2= $desuni;
       	 $javascript="";
        }else { $javascript="alert('El Código de la Partida no existe'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";
         $dato="";
         $dato1="0,00";
         $dato2="";
         $dato3="";
        }

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato2.'",""],["'.$this->getRequestParameter('numcont').'","'.$dato3.'",""],["'.$this->getRequestParameter('cancon').'","'.$dato1.'",""],["javascript","'.$javascript.'",""]]';
        break;
      case '3':
         $portrans="0,00";
         $javascript="";
         if ($this->getRequestParameter('codigo')=='')
         {
         	$fecha=date('d/m/Y');

         	$dateFormat = new sfDateFormat('es_VE');
            $fecha2 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
            //Funcion Calcula tiempo transcurrido
         	$q= new Criteria();
         	$q->add(OcregconPeer::CODCON,$this->getRequestParameter('numcon'));
         	$result= OcregconPeer::doSelectOne($q);
         	if ($result)
         	{
              $fecini=$result->getFecini();
              $fecfin=$result->getFecfin();
              $fecfinmod=$result->getFecfinmod();
              if ($fecha2 <= $fecini)
              {
              	$portrans="0,00";
              }
              else
              {
                 if ($fecha2 >= $fecfinmod)
                 {
                 	$portrans="100,00";
                 }
                 else
                 {
                 	$totaldias=Herramientas :: dateDiff('d', $fecini, $fecfin);
                 	$diasfalta=Herramientas :: dateDiff('d', $fecha2, $fecfinmod);
                    if ($diasfalta>=$totaldias)
                    {
                    	$portrans="0,00";
                    }else
                    {
                    	$calculo= ((($totaldias-$diasfalta)/$totaldias)*100);
                    	$portrans=number_format($calculo,2,',','.');
                    }
                 }
              }

         	}             // fin Funcion Calcula tiempo transcurrido
         }
         else
         {
           $dateFormat = new sfDateFormat('es_VE');
           $fecha2 = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));
           $fec2_aux = split("/", $this->getRequestParameter('codigo'));
           $fecha=$this->getRequestParameter('codigo');
            if (checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2])))
            {
                          //Funcion Calcula tiempo transcurrido
         	$q= new Criteria();
         	$q->add(OcregconPeer::CODCON,$this->getRequestParameter('numcon'));
         	$result= OcregconPeer::doSelectOne($q);
         	if ($result)
         	{
              $fecini=$result->getFecini();
              $fecfin=$result->getFecfin();
              $fecfinmod=$result->getFecfinmod();
              if ($fecha2 <= $fecini)
              {
              	$portrans="0,00";
              }
              else
              {
                 if ($fecha2 >= $fecfinmod)
                 {
                 	$portrans="100,00";
                 }
                 else
                 {
                 	$totaldias=Herramientas :: dateDiff('d', $fecini, $fecfin);
                 	$diasfalta=Herramientas :: dateDiff('d', $fecha2, $fecfinmod);
                    if ($diasfalta>=$totaldias)
                    {
                    	$portrans="0,00";
                    }else
                    {
                    	$calculo= ((($totaldias-$diasfalta)/$totaldias)*100);
                    	$portrans=number_format($calculo,2,',','.');
                    }
                 }
              }

         	}             // fin Funcion Calcula tiempo transcurrido
            }
            else
            {
            	$fecha="";
            	$javascript="alert('Fecha Inv&acute;lida'); $('ocinscon_feccom').value=''; $('ocinscon_feccom').focus();";
            }
         }
        $output = '[["ocinscon_feccom","'.$fecha.'",""],["ocinscon_portietra","'.$portrans.'",""],["javascript","'.$javascript.'",""]]';
       break;
      case '4':
         $javascript="";
         if ($this->getRequestParameter('codigo')=='')
         {
         	$fecha=date('d/m/Y');
         }
         else
         {
         	$dateFormat = new sfDateFormat('es_VE');
            $fecfin = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

            $dateFormat = new sfDateFormat('es_VE');
            $fecini = $dateFormat->format($this->getRequestParameter('fecini'), 'i', $dateFormat->getInputPattern('d'));

         	$fecha=$this->getRequestParameter('codigo');
         	$fec2_aux = split("/", $this->getRequestParameter('codigo'));
            if (checkdate(intval($fec2_aux[1]), intval($fec2_aux[0]), intval($fec2_aux[2])))
            {
              if ($fecfin<$fecini)
              {
              	$fecha="";
            	$javascript="alert('Fecha de Culminacion tiene que ser Mayor que las Fecha de Inicio'); $('ocinscon_fecter').value=''; $('ocinscon_fecter').focus();";
              }

            }else
            {
            	$fecha="";
            	$javascript="alert('Fecha Inv&acute;lida'); $('ocinscon_fecter').value=''; $('ocinscon_fecter').focus();";
            }
         }
        $output = '[["ocinscon_fecter","'.$fecha.'",""],["javascript","'.$javascript.'",""]]';
       break;
      case '5':
         $c= new Criteria();
        $c->add(OctipinsPeer::CODTIPINS,$codigo);
        $reg= OctipinsPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDestipins();
          $javascript="";
        }else
        {
         $javascript="alert('El Tipo de Inspecci&oacute;n no Existe'); $('$cajtexcom').avlue='';";
         $dato="";
        }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->ocinscon = $this->getOcinsconOrCreate();
      try{ $this->updateOcinsconFromRequest();}
      catch (Exception $ex){}
      $this->configGrid($this->ocinscon->getCodcon(),$this->ocinscon->getNumins());
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      $q= new Criteria();
      $q->add(OcinsconPeer::CODCON,$this->getRequestParameter('ocinscon[codcon]'));
      $q->add(OcinsconPeer::NUMINS,$this->getRequestParameter('ocinscon[numins]'));
      $resu= OcinsconPeer::doSelectOne($q);
      if ($resu)
      {
      	$this->coderror1=1021;
      	return false;
      }

      if (count($grid[0])==0)
      {
      	$this->coderror1=1019;
      }else
      {
      	$x=$grid[0];
      	$i=0;
      	while ($i<count($x))
      	{
      	  if ($x[$i]->getPoreje()<=0)
      	  {
      	  	$this->coderror1=1020;
      	  	break;
      	  }
      	  $i++;
      	}
      }

  	  if ($this->coderror1<>-1)
       {
        return false;
       }else return true;
    }else return true;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->ocinscon = $this->getOcinsconOrCreate();
     try{	$this->updateOcinsconFromRequest();}
   catch (Exception $ex){}


    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
   {
    if($this->coderror1!=-1)
    {
     $err = Herramientas::obtenerMensajeError($this->coderror1);
     $this->getRequest()->setError('',$err);
    }
   }

    return sfView::SUCCESS;
  }

}
