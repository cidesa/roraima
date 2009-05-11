<?php

/**
 * bieregseginm actions.
 *
 * @package    siga
 * @subpackage bieregseginm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieregseginmActions extends autobieregseginmActions
{
  private $coderror = -1;

  public function executeEdit()
  {
    $this->bnseginm = $this->getBnseginmOrCreate();
    $this->setVars();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnseginmFromRequest();

      $this->saveBnseginm($this->bnseginm);

      $this->setFlash('notice', 'Your modifications have been saved');

      $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('bieregseginm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('bieregseginm/list');
      }
      else
      {
        return $this->redirect('bieregseginm/edit?id='.$this->bnseginm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateBnseginmFromRequest()
  {
    $bnseginm = $this->getRequestParameter('bnseginm');
    $this->setVars();

    if (isset($bnseginm['codact']))
    {
      $this->bnseginm->setCodact($bnseginm['codact']);
    }
    if (isset($bnseginm['codmue']))
    {
      $this->bnseginm->setCodmue($bnseginm['codmue']);
    }
    if (isset($bnseginm['nroseginm']))
    {
      $this->bnseginm->setNroseginm($bnseginm['nroseginm']);
    }
    if (isset($bnseginm['fecseginm']))
    {
      if ($bnseginm['fecseginm'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnseginm['fecseginm']))
          {
            $value = $dateFormat->format($bnseginm['fecseginm'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnseginm['fecseginm'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnseginm->setFecseginm($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnseginm->setFecseginm(null);
      }
    }
    if (isset($bnseginm['nomseginm']))
    {
      $this->bnseginm->setNomseginm($bnseginm['nomseginm']);
    }
    if (isset($bnseginm['cobseginm']))
    {
      $this->bnseginm->setCobseginm($bnseginm['cobseginm']);
    }
    if (isset($bnseginm['monseginm']))
    {
      $this->bnseginm->setMonseginm($bnseginm['monseginm']);
    }
    if (isset($bnseginm['fecsegven']))
    {
      if ($bnseginm['fecsegven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnseginm['fecsegven']))
          {
            $value = $dateFormat->format($bnseginm['fecsegven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnseginm['fecsegven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnseginm->setFecsegven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnseginm->setFecsegven(null);
      }
    }
    if (isset($bnseginm['proseginm']))
    {
      $this->bnseginm->setProseginm($bnseginm['proseginm']);
    }
    if (isset($bnseginm['obsseginm']))
    {
      $this->bnseginm->setObsseginm($bnseginm['obsseginm']);
    }
    if (isset($bnseginm['staseginm']))
    {
      $this->bnseginm->setStaseginm($bnseginm['staseginm']);
    }
  }

 public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
  }


  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');

    switch ($ajax){

      case '1':
      $dato=BnreginmPeer::getCodinm($codigo);
      $dato1=BnreginmPeer::getDesinm($codigo,$dato);
      $output = '[["'.$cajtexmos.'","'.$dato.'",""], ["desinm","'.$dato1.'",""]]';
        break;
      case '2':

        $output = '[["'.$cajtexcom.'","'.$codigo.'",""],["'.$cajtexcom.'","6","c"]]';

        break;

      case '3':

        $dato=BncobsegPeer::getDesubi($codigo);

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';


        break;

        default:
        $output = '[["","",""],["","",""],["","",""]]';

        case '4':
        $codact="";
       	$desinm="";

        $c= new Criteria();
        $c->add(BnreginmPeer::CODINM,$codigo );
        $datos=BnreginmPeer::doSelectOne($c);
		if ($datos)
		{
       		$codact=$datos->getCodact();
       		$desinm=$datos->getDesinm();
		}

        $output = '[["'.$cajtexmos.'","'.$codact.'",""], ["'.$cajtexcom.'","'.$desinm.'",""]]';


      break;
    }


    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODACT','Bnreginm','codact',trim($this->getRequestParameter('bnseginm[codact]')));
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',str_pad(trim($this->getRequestParameter('bnseginm[cobseginm]')),4,'0',STR_PAD_LEFT));
      }else
    if ($this->getRequestParameter('ajax')=='3')
      {
       //$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnseginm[cobsegmue]')));
      }
  }

  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
     $this->bnseginm = $this->getBnseginmOrCreate();
     $this->updateBnseginmFromRequest();
	 $this->configGrid();
	 $grid=Herramientas::CargarDatosGrid($this,$this->obj);
     if (!$this->bnseginm->getId())
     {
      Inmuebles::validarBieregseginm($this->bnseginm,&$msj);
      $this->coderror=$msj;
      if ($this->coderror<>-1)
      {
        return false;
      }else return true;
     }else return true;
    }else return true;
  }


  public function handleErrorEdit()
  {
  	$this->preExecute();
    $this->bnseginm = $this->getBnseginmOrCreate();
    $this->updateBnseginmFromRequest();
    $this->setVars();
	$this->configGrid();
	$grid=Herramientas::CargarDatosGrid($this,$this->obj);

     $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('bnseginm{nroseginm}',$err);
      }
    }
    return sfView::SUCCESS;

  }

   public function configGrid()
   {
      $c= new Criteria();
      $c->add(BncobseginmPeer::CODINM,$this->bnseginm->getCodmue());
      $c->add(BncobseginmPeer::CODACT,$this->bnseginm->getCodact());
      $c->add(BncobseginmPeer::NROSEGMUE,$this->bnseginm->getNroseginm());
      $per=BncobseginmPeer::doSelect($c);


      $opciones = new OpcionesGrid();
      $opciones->setEliminar(true);
      $opciones->setTabla('Bncobseginm');
      $opciones->setAnchoGrid(650);
      $opciones->setAncho(650);
      $opciones->setName('a');
      $opciones->setTitulo('Coberturas');
      $opciones->setHTMLTotalFilas(' ');
      $opciones->setFilas(10);


      $obj= array ('codcob' => '1','descob' =>'2');
      $col1 = new Columna('Código Cobertura');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codcob');
      $col1->setHTML('type="text" size="10"');
      $col1->setCatalogo('Bncobseg','sf_admin_edit_form',$obj,'Bncobseg_Bieregseginm');
	  $col1->setAjax('bieregseginm',3,2);



	  $col2 = new Columna('Nombre');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('descob');
      $col2->setHTML('type="text" size="50" readonly=true');

       $col3 = new Columna('Monto');
       $col3->setEsGrabable(true);
       $col3->setTipo(Columna::MONTO);
       $col3->setAlineacionContenido(Columna::DERECHA);
       $col3->setAlineacionObjeto(Columna::DERECHA);
       $col3->setNombreCampo('monto');
       $col3->setEsNumerico(true);
       $col3->setHTML('type="text" size="10"');
       $col3->setJScript('onKeypress="entermonto(event,this.id)"');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $this->obj = $opciones->getConfig($per);
  }

  public function saveBnseginm($bnseginm)
  {
    $coderr = -1;

    try {
      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      $coderr = Inmuebles::salvarbieregseginm($bnseginm,$grid);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }

    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }

  protected function deleteBnseginm($bnseginm)
  {

  	  $c= new Criteria();
      $c->add(BncobseginmPeer::CODINM,$this->bnseginm->getCodmue());
      $c->add(BncobseginmPeer::CODACT,$this->bnseginm->getCodact());
      $c->add(BncobseginmPeer::NROSEGMUE,$this->bnseginm->getNroseginm());
      BncobseginmPeer::doDelete($c);

      $bnseginm->delete();
  }


}
