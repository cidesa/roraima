<?php

/**
 * vacsalidas actions.
 *
 * @package    siga
 * @subpackage vacsalidas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacsalidasActions extends autovacsalidasActions
{
  private static $coderror=-1;

  protected function getNpvacsalidasOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npvacsalidas = new Npvacsalidas();
      $this->configGrid($arreglo = array());
    }
    else
    {
      $npvacsalidas = NpvacsalidasPeer::retrieveByPk($this->getRequestParameter($id));
      $fechaing=date("d/m/Y",strtotime($npvacsalidas->getFecing()));
      $fechavac=date("d/m/Y",strtotime($npvacsalidas->getFecvac()));
	  Nomina::cargarDatosNpvacsalidasFecVac($npvacsalidas->getCodemp(), $fechavac,$fechaing,  &$arreglo, &$diasvac, &$observaciones, &$fecdesde, &$fechasta, &$diaspend);
	  $this->configGrid($arreglo);
      $this->forward404Unless($npvacsalidas);
    }

    return $npvacsalidas;
  }

  public function executeEdit()
  {
    $this->npvacsalidas = $this->getNpvacsalidasOrCreate();
    //$this-> nombres= $this->getMostrar_nombre();
    //$this->rs = $this->Dias();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpvacsalidasFromRequest();

      $this->saveNpvacsalidas($this->npvacsalidas);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vacsalidas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vacsalidas/list');
      }
      else
      {
        return $this->redirect('vacsalidas/edit?id='.$this->npvacsalidas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateNpvacsalidasFromRequest()
  {
    $npvacsalidas = $this->getRequestParameter('npvacsalidas');

    if (isset($npvacsalidas['codemp']))
    {
      $this->npvacsalidas->setCodemp($npvacsalidas['codemp']);
    }
    if (isset($npvacsalidas['nomemp']))
    {
      $this->npvacsalidas->setNomemp($npvacsalidas['nomemp']);
    }
    if (isset($npvacsalidas['fecing']))
    {
      $this->npvacsalidas->setFecing($npvacsalidas['fecing']);
    }
    if (isset($npvacsalidas['fecvac']))
    {
      if ($npvacsalidas['fecvac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacsalidas['fecvac']))
          {
            $value = $dateFormat->format($npvacsalidas['fecvac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacsalidas['fecvac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacsalidas->setFecvac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacsalidas->setFecvac(null);
      }
    }
    if (isset($npvacsalidas['fecdes']))
    {
      if ($npvacsalidas['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacsalidas['fecdes']))
          {
            $value = $dateFormat->format($npvacsalidas['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacsalidas['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacsalidas->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacsalidas->setFecdes(null);
      }
    }
    if (isset($npvacsalidas['fechas']))
    {
      if ($npvacsalidas['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npvacsalidas['fechas']))
          {
            $value = $dateFormat->format($npvacsalidas['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npvacsalidas['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npvacsalidas->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npvacsalidas->setFechas(null);
      }
    }
    if (isset($npvacsalidas['diasdisfrutar']))
    {
      $this->npvacsalidas->setDiasdisfrutar($npvacsalidas['diasdisfrutar']);
    }
    if (isset($npvacsalidas['observa']))
    {
      $this->npvacsalidas->setObserva($npvacsalidas['observa']);
    }
  }

    public function configGrid($arreglo='')
  {

    $per = $arreglo;

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacsalidas_det');
    $opciones->setAnchoGrid(800);
    $opciones->setName('a');
    $opciones->setFilas(25);
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
    $col3->setHTML('type="monto" size="8" readonly= true');

    $col4 = new Columna('Dias disfrutados');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('diasdisfrutados');
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setHTML('type="monto" size="8" readonly= true');

    $col5 = new Columna('Dias de Vacaciones');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('diasvac');
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setHTML('type="text" size="8" readonly= true');

    $col6 = new Columna('Dias por disfrutar');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('diaspdisfrutar');
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setHTML('type="text" size="8" readonly= true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($per);

  }


  public function executeAjax()
  {


   if ($this->getRequestParameter('ajax')=='1')
   {
    $cajtexnom=$this->getRequestParameter('cajtexnom');
    $cajtexfec=$this->getRequestParameter('cajtexfec');
    $cajtexfecvac=$this->getRequestParameter('cajtexfecvac');
    $cajtexfecdes=$this->getRequestParameter('cajtexfecdes');
    $cajtexfechas=$this->getRequestParameter('cajtexfechas');
    $cajtexdiaspend=$this->getRequestParameter('cajtexdiaspend');
    $codigoemp=$this->getRequestParameter('codigo');
    $nombre=NphojintPeer::getNomemp($codigoemp);
    $fechaing=NphojintPeer::getFecing($codigoemp);

    Nomina::cargarDatosNpvacsalidas($codigoemp, $fechaing, &$arreglo, &$diaslaborales,&$fecvac,&$diaspend, $fecvac );

    $fechahasta = Nomina::calcularFechaEntrada(0, date('d/m/Y'), $codigoemp, $fechaing);

    $output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajtexdiaspend.'","'.$diaspend.'",""],["'.$cajtexfecvac.'","'.date('d/m/Y').'",""],["'.$cajtexfecdes.'","'.date('d/m/Y').'",""],["'.$cajtexfechas.'","'.$fechahasta.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    $this->configGrid($arreglo);

   }

   if ($this->getRequestParameter('ajax')=='2')
   {
    $cajtexdiasvac=$this->getRequestParameter('cajtexdiasvac');
    $cajtexfecdesde=$this->getRequestParameter('cajtexfecdesde');
    $cajtexfechasta=$this->getRequestParameter('cajtexfechasta');
    $cajtexobserva=$this->getRequestParameter('cajtexobserva');
    $cajtexdiaspend=$this->getRequestParameter('cajtexdiaspend');
    $codemp=$this->getRequestParameter('codemp');
    $fecvac=$this->getRequestParameter('fecha');
    $fechaing=$this->getRequestParameter('fecing');

    Nomina::cargarDatosNpvacsalidasFecVac($codemp, $fecvac, $fechaing, &$arreglo, &$diasvac, &$observaciones, &$fecdesde, &$fechasta, &$diaspend);

    $output = '[["'.$cajtexdiasvac.'","'.'0'.'",""],["'.$cajtexfecdesde.'","'.$fecdesde.'",""],["'.$cajtexfechasta.'","'.$fechasta.'",""],["'.$cajtexobserva.'","'.$observaciones.'",""],["'.$cajtexdiaspend.'","'.$diaspend.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    $this->configGrid($arreglo);

   }

   if ($this->getRequestParameter('ajax')=='3')  // Aqui va el 3
   {
    $cajtexdiasvac=$this->getRequestParameter('cajtexdiasvac');
    $cajtexdiaspend=$this->getRequestParameter('cajtexdiaspend');
    $cajtexfechas = $this->getRequestParameter('cajtexfechas');
    $codemp=$this->getRequestParameter('codemp');
    $fecvac=$this->getRequestParameter('fecvac');
    $fechaing=$this->getRequestParameter('fecing');
    $diaspend=$this->getRequestParameter('diaspend');
    $fechadesde=$this->getRequestParameter('fecdesde');
    $diasvac=$this->getRequestParameter('diasvac');


    Nomina::cargarDatosNpvacsalidasDiasVac($fechaing, $codemp, &$diasvac, &$arreglo, &$diaspend,$fechadesde,&$fechahasta);
	//$diaspend=$diaspend-$diasvac;

    $output = '[["'.$cajtexdiaspend.'","'.$diaspend.'",""],["'.$cajtexdiasvac.'","'.$diasvac.'",""],["'.$cajtexfechas.'","'.$fechahasta.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


    $this->configGrid($arreglo);

   }

   if ($this->getRequestParameter('ajax')=='4')
   {
    $cajtexfechas = $this->getRequestParameter('cajtexfechas');
    $cajtexdiasvac=$this->getRequestParameter('cajtexdiasvac');
    $cajtexdiaspend=$this->getRequestParameter('cajtexdiaspend');
    $fecdes = $this->getRequestParameter('fecdes');
    $diasvac=$this->getRequestParameter('diasvac');
    $codemp=$this->getRequestParameter('codemp');
    $fechaing=$this->getRequestParameter('fecing');
    $diaspend=$this->getRequestParameter('diaspend');


    $fechahasta = Nomina::calcularFechaEntrada($diasvac, $fecdes, $codemp, $fechaing);

    Nomina::cargarDatosNpvacsalidasDiasVac($fechaing, $codemp, &$diasvac, &$arreglo, &$diaspend,$fecdes,&$fechahasta);

    $output = '[["'.$cajtexdiaspend.'","'.$diaspend.'",""],["'.$cajtexdiasvac.'","'.$diasvac.'",""],["'.$cajtexfechas.'","'.$fechahasta.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	$this->configGrid($arreglo);
   }

  }

    public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->npvacsalidas = $this->getNpvacsalidasOrCreate();
        $this->updateNpvacsalidasFromRequest();

        self::$coderror=Nomina::validarVacsalidas($this->npvacsalidas);

        if (self::$coderror<>-1)
        {
          return false;
        }
        else return true;


      }else return true;
    }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npvacsalidas = $this->getNpvacsalidasOrCreate();
     try
     {
     $this->updateNpvacsalidasFromRequest();
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

  protected function saveNpvacsalidas($npvacsalidas)
  {

    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);

    Vacaciones::salvarNphistorico_det($npvacsalidas,$grid);
    $npvacsalidas->save();

  }

   public function executeDelete()
  {
    $this->npvacsalidas = NpvacsalidasPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npvacsalidas);

    try
    {
      $c2= new Criteria();
	  $c2->add(NpvacsalidasDetPeer::CODEMP,$this->npvacsalidas->getCodemp());
	  $c2->add(NpvacsalidasDetPeer::FECVAC,$this->npvacsalidas->getFecvac());
	  $rs = NpvacsalidasDetPeer::doSelect($c2);

	  foreach($rs as $reg)
	  {
	  	$sql="update npvacdisfrute set diasdisfutar='".$reg->getDiasdisfutar()."',diasdisfrutados='".$reg->getDiasdisfrutados()."'
				where codemp='".$this->npvacsalidas->getCodemp()."' and perini='".$reg->getPerini()."' and perfin='".$reg->getPerfin()."'";
		Herramientas::insertarRegistros($sql);
	  }
	  $c2= new Criteria();
	  $c2->add(NpvacsalidasDetPeer::CODEMP,$this->npvacsalidas->getCodemp());
	  $c2->add(NpvacsalidasDetPeer::FECVAC,$this->npvacsalidas->getFecvac());
	  NpvacsalidasDetPeer::doDelete($c2);

	  $this->deleteNpvacsalidas($this->npvacsalidas);





    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npvacsalidas. Make sure it does not have any associated items.');
      return $this->forward('vacsalidas', 'list');
    }

    return $this->redirect('vacsalidas/list');
  }



}
