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

  public function executeEdit()
  {
    $this->ocinscon = $this->getOcinsconOrCreate();
    $this->configGrid($this->ocinscon->getCodcon());

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

  public function executeDelete()
  {
    $this->ocinscon = OcinsconPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocinscon);

    $c= new Criteria();
    $c->add(OcparinsPeer::CODCON,$this->ocinscon->getCodcon());
    $reg= OcparinsPeer::doSelectOn($c);
    if (!$reg)
    {
      $this->deleteOcinscon($this->ocinscon);
    }

    return $this->redirect('oycinscon/list');
  }

  protected function updateOcinsconFromRequest()
  {
    $ocinscon = $this->getRequestParameter('ocinscon');
    $this->configGrid($ocinscon['codcon']);

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

   public function configGrid($codigo='')
   {
     $c = new Criteria();
     $c->add(OcparinsPeer::CODCON,$codigo);
     $reg = OcparinsPeer::doSelect($c);

     $opciones = new OpcionesGrid();
     $opciones->setEliminar(true);
     $opciones->setTabla('Ocparins');
     $opciones->setAncho(1000);
     $opciones->setAnchoGrid(1000);
     $opciones->setFilas(50);
     $opciones->setTitulo('Datos de Partidas Inspeccionadas');
     $opciones->setHTMLTotalFilas(' ');

     $obj= array('codpar' => 1, 'despar' => 2, 'abruni' => 3, 'cancon' => 4);
     $param= array("'+$('ocinscon_codcon').value+'",'val2');

     $col1 = new Columna('Cód. Partida');
     $col1->setTipo(Columna::TEXTO);
     $col1->setEsGrabable(true);
     $col1->setAlineacionObjeto(Columna::CENTRO);
     $col1->setAlineacionContenido(Columna::CENTRO);
     $col1->setNombreCampo('codpar');
     $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxpartidains(event,this.id);"');
     $col1->setCatalogo('ocdefpar','sf_admin_edit_form',$obj,'Ocdefpar_Oycinscon',$param);
     $col1->setHTML('type="text" size="17" maxlength="32"');

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
     $col5->setHTML('type="text" size="10"');
     $col5->setJScript('onKeyPress="entermonto(event,this.id); ejecutado(event,this.id);""');
     $col5->setEsTotal(true,'ocinscon_toteje');

     $col6 = new Columna('Observciones');
     $col6->setTipo(Columna::TEXTO);
     $col6->setEsGrabable(true);
     $col6->setAlineacionObjeto(Columna::CENTRO);
     $col6->setAlineacionContenido(Columna::CENTRO);
     $col6->setNombreCampo('obsins');
     $col6->setHTML('type="text" size="17" maxlength="250"');

     $opciones->addColumna($col1);
     $opciones->addColumna($col2);
     $opciones->addColumna($col3);
     $opciones->addColumna($col4);
     $opciones->addColumna($col5);
     $opciones->addColumna($col6);

     $this->obj = $opciones->getConfig($reg);
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('codcon','ocregcon','codcon',$this->getRequestParameter('ocinscon[codcon]'));
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
        $c->addJoin(OcdefparPeer::CODPAR,OcparconPeer::CODPAR);
        $c->addJoin(OcdefparPeer::CODUNI,OcunidadPeer::CODUNI);
        $reg=OcdefparPeer::doSelectOne($c);
        if ($reg)
        {
         $dato=$reg->getDespar();
         $dato1= number_format($reg->getCancon(),2,',','.');;
         $dato2= $reg->abruni();
       	 $javascript="";
        }else { $javascript="alert('El Código de la Partida no existe'); $('".$cajtexcom."').value=''; $('".$cajtexcom."').focus();";}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato2.'",""],["'.$this->getRequestParameter('cancon').'","'.$dato1.'",""],["javascript","'.$javascript.'",""]]';

        break;


      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
}
