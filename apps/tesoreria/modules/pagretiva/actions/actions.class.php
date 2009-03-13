<?php

/**
 * pagretiva actions.
 *
 * @package    siga
 * @subpackage pagretiva
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagretivaActions extends autopagretivaActions
{
  private static $coderror=-1;

 /* public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
	{
	  $this->tsretiva = $this->getTsretivaOrCreate();
	  $this->updateTsretivaFromRequest();
	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);

	  self::$coderror=Tesoreria::validarPagretiva($this->tsretiva,$grid);
	  if (self::$coderror<>-1)
	  {
	  	return false;
	  }else return true;
     }else return true;
  }*/

  public function executeIndex()
  {
    return $this->redirect('pagretiva/edit');
  }

  public function executeEdit()
  {
    $this->tsretiva = $this->getTsretivaOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsretivaFromRequest();

      $this->saveTsretiva($this->tsretiva);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagretiva/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagretiva/list');
      }
      else
      {
        return $this->redirect('pagretiva/edit?id='.$this->tsretiva->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 public function handleErrorEdit()
  {
    $this->preExecute();
    $this->tsretiva = $this->getTsretivaOrCreate();
    $this->updateTsretivaFromRequest();

    $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	     $err = Herramientas::obtenerMensajeError(self::$coderror);
	     $this->getRequest()->setError('tsretiva{codrec}',$err);
	    }

    return sfView::SUCCESS;
  }

  protected function updateTsretivaFromRequest()
  {
    $tsretiva = $this->getRequestParameter('tsretiva');
    $this->configGrid();

    if (isset($tsretiva['codret']))
    {
      $this->tsretiva->setCodret($tsretiva['codret']);
    }
    if (isset($tsretiva['destip']))
    {
      $this->tsretiva->setDestip($tsretiva['destip']);
    }
    if (isset($tsretiva['codrec']))
    {
      $this->tsretiva->setCodrec($tsretiva['codrec']);
    }
    if (isset($tsretiva['nomrgo']))
    {
      $this->tsretiva->setNomrgo($tsretiva['nomrgo']);
    }
    if (isset($tsretiva['codpar']))
    {
      $this->tsretiva->setCodpar($tsretiva['codpar']);
    }
  }

  protected function saveTsretiva($tsretiva)
  {
    $grid=Herramientas::CargarDatosGrid($this, $this->obj);
    Tesoreria::salvarPagretiva($tsretiva, $grid);
  }

  public function configGrid()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(TsretivaPeer::CODRET);
    $per = TsretivaPeer::doSelect($c);

    $this->fila=count($per);
	$opciones = new OpcionesGrid();
	$opciones->setEliminar(true);
    $opciones->setTabla('tsretiva');
    $opciones->setAnchoGrid(1050);
    $opciones->setTitulo('IVA');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Retención');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codret');
    $col1->setHTML('type="text" size="10" maxlength="3"');
    $objs = array('codtip' => 1, 'destip' => 2);
    $metodo='Optipret_Pagretiva';
    $col1->setCatalogo('Optipret','sf_admin_edit_form',$objs,$metodo);
    $col1->setJScript('onBlur="javascript:event.keyCode=13; ajax(event,this.id);"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('destip');
    $col2->setHTML('type="text" size="40" readonly="true"');

    $col3 = new Columna('Recargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codrec');
    $col3->setHTML('type="text" size="10" maxlength="4"');
    $objs = array('codrgo' => 3, 'nomrgo' => 4, 'monrgo' => 5, 'tiprgo' => 6, 'codpre' => 7);
    $metodo='Optipret_Carecarg';
    $col3->setCatalogo('Carecarg','sf_admin_edit_form',$objs,$metodo);
    $col3->setJScript('onBlur="javascript:event.keyCode=13; ajax2(event,this.id)"');


    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomrgo');
    $col4->setHTML('type="text" size="40" readonly=true');

    $col5 = new Columna('monto Recargo');
    $col5->setTipo(Columna::MONTO);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setNombreCampo('monrgo');
    $col5->setEsNumerico(true);
    $col5->setOculta(true);

    $col6 = new Columna('tipo');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('tiprgo');
    $col6->setOculta(true);

    $col7 = new Columna('Partida');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('codpar');
    $col7->setHTML('type="text" size="20" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    $this->obj = $opciones->getConfig($per);

  }

   public function executeAjax()
   {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
       $cajtexcom=$this->getRequestParameter('cajtexcom');
     if ($this->getRequestParameter('ajax')=='1')
      { $dato="";
      	$c=new Criteria();
        $c->add(OptipretPeer::CODTIP,$this->getRequestParameter('codigo'));
        $data=OptipretPeer::doSelectOne($c);
        if ($data){ $exis1='S';
         $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
        }else{ $exis1='N';}

        $output = '[["exisret","'.$exis1.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $c=new Criteria();
        $c->add(CarecargPeer::CODRGO,$this->getRequestParameter('codigo'));
        $data=CarecargPeer::doSelectOne($c);
        if ($data){ $exis='';}else{ $exis='N';}
        $dato=CarecargPeer::getRecargo($this->getRequestParameter('codigo'));
        $dato2=CarecargPeer::getDato($this->getRequestParameter('codigo'),'tiprgo');
        $dato4=CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo');
        $dato3=CarecargPeer::getDato($this->getRequestParameter('codigo'),'codpre');
        $output = '[["'.$cajtexcom.'","4","c"], ["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('tipo').'","'.$dato2.'",""],["'.$this->getRequestParameter('partida').'","'.$dato3.'",""],["'.$this->getRequestParameter('monto').'","'.$dato4.'",""],["exisrecar","'.$exis.'",""]]';
      }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }

}
