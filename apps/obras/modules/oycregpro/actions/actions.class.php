<?php

/**
 * oycregpro actions.
 *
 * @package    siga
 * @subpackage oycregpro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycregproActions extends autooycregproActions
{
	public function executeEdit()
	{
		$this->caprovee = $this->getCaproveeOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCaproveeFromRequest();

			$this->saveCaprovee($this->caprovee);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('oycregpro/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('oycregpro/list');
			}
			else
			{
				return $this->redirect('oycregpro/edit?id='.$this->caprovee->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}


  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('RAMART','Caramart','Ramart',trim($this->getRequestParameter('caprovee[codram]')));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('caprovee[codcta]')));
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

public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    if ($this->getRequestParameter('ajax')=='1')
      {
        $dato=Herramientas::getX('RAMART','Caramart','desramo',str_pad($codigo,4,0,STR_PAD_LEFT));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
      }
     else  if ($this->getRequestParameter('ajax')=='3')
      {
        $dato=Herramientas::getX('CODTIPREC','Catiprec','Destiprec',str_pad($codigo,4,0,STR_PAD_LEFT));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
     else  if ($this->getRequestParameter('ajax')=='4')
      {
        $dato=Herramientas::getX('codtipesp','octipesp','destipesp',str_pad($codigo,4,0,STR_PAD_LEFT));
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='5')
      {
      	if ($this->getRequestParameter('tiporec')!="")
      	{
        $c= new Criteria();
        $c->add(CarecaudPeer::CODREC,$codigo);
        $c->add(CarecaudPeer::CODTIPREC,$this->getRequestParameter('tiporec'));
        $reg= CarecaudPeer::doSelectOne($c);
        if ($reg)
        {
         $dato=$reg->getDesrec();
         $javascript="";
        }else { $dato=""; $javascript="alert('El Recaudo no esta asociado al grupo de recaudo seleccionado'); $('". $cajtexcom ."').value='';";}
      	}
      	else { $dato=""; $javascript="alert('Debe Seleccionar el grupo de Recaudo'); $('". $cajtexcom ."').value='';";}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
        $c= new Criteria();
        $c->add(OcdefperPeer::CEDPER,$codigo);
        $reg= OcdefperPeer::doSelectOne($c);
        if ($reg)
        {
         $dato=$reg->getNomper();
         $dato1=Herramientas::getX('codtippro','octippro','destippro',$reg->getCodtippro());
         $dato2=Herramientas::getX('codtipcar','octipcar','destipcar',$reg->getCodtipcar());
         $javascript="";
        }else { $dato=""; $dato1=""; $dato2=""; $javascript="alert('El Persoal no esta Registrado'); $('". $cajtexcom ."').value='';";}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('profe').'","'.$dato1.'",""],["'.$this->getRequestParameter('cargo').'","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='7')
      {
        $c= new Criteria();
        $c->add(OcdefequPeer::CODEQU,$codigo);
        $reg= OcdefequPeer::doSelectOne($c);
        if ($reg)
        {
          $dato=$reg->getDesequ();
          $javascript="";
        }else { $dato=""; $javascript="alert('El Equipo no esta registrado'); $('". $cajtexcom ."').value='';";}

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
  }

  public function configGridRecaudos($codpro='')
  {
    $c = new Criteria();
    $c->add(CarecproPeer::CODPRO,$codpro);
    $per = CarecproPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Carecpro');
    $opciones->setAncho(700);
    $opciones->setAnchoGrid(700);
    $opciones->setName('a');
    $opciones->setTitulo('');
    $opciones->setFilas(15);
    $opciones->setHTMLTotalFilas(' ');

    $obj= array('codrec' => 1, 'desrec' => 2);
    $params = array("'+$('caprovee_codtiprec').value+'",'val2');

    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codrec');
    $col1->setHTML('type="text" size="10" maxlength="10"');
    $col1->setCatalogo('carecaud','sf_admin_edit_form',$obj,'Carecaud_Oycregpro',$params);
    $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxrecaudo(event,this.id)"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desrec');
    $col2->setHTML('type="text" size="25" readonly="true"');

    $col3 = new Columna('Fecha Entrega');
    $col3->setTipo(Columna::FECHA);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setHTML(' ');
    $col3->setVacia(true);
    $col3->setNombreCampo('fecent');

    $col4 = clone $col3;
    $col4->setTitulo('Fecha Vencimiento');
    $col4->setNombreCampo('fecven');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj = $opciones->getConfig($per);
  }

 public function configGridPersonal($codpro='')
 {
   $c = new Criteria();
   $c->add(OcproperPeer::CODPRO,$codpro);
   $reg = OcproperPeer::doSelect($c);

   $opciones = new OpcionesGrid();
   $opciones->setEliminar(true);
   $opciones->setTabla('Ocproper');
   $opciones->setAncho(800);
   $opciones->setAnchoGrid(800);
   $opciones->setTitulo('');
   $opciones->setName('b');
   $opciones->setFilas(10);
   $opciones->setHTMLTotalFilas(' ');

   $obj= array('cedper' => 1, 'nomper' => 2, 'destippro' => 3, 'destipcar' => 4);

   $col1 = new Columna('Código');
   $col1->setTipo(Columna::TEXTO);
   $col1->setEsGrabable(true);
   $col1->setAlineacionObjeto(Columna::CENTRO);
   $col1->setAlineacionContenido(Columna::CENTRO);
   $col1->setNombreCampo('cedper');
   $col1->setHTML('type="text" size="10" maxlength="15"');
   $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxpersonal(event,this.id)"');
   $col1->setCatalogo('ocdefper','sf_admin_edit_form',$obj,'Ocdefper_Oycregpro');


   $col2 = new Columna('Nombre');
   $col2->setTipo(Columna::TEXTO);
   $col2->setAlineacionObjeto(Columna::IZQUIERDA);
   $col2->setAlineacionContenido(Columna::IZQUIERDA);
   $col2->setNombreCampo('nomper');
   $col2->setHTML('type="text" size="25" readonly=true');

   $col3 = clone $col2;
   $col3->setTitulo('Profesión');
   $col3->setNombreCampo('destippro');

   $col4 = clone $col2;
   $col4->setTitulo('Cargo');
   $col4->setNombreCampo('destipcar');

   $opciones->addColumna($col1);
   $opciones->addColumna($col2);
   $opciones->addColumna($col3);
   $opciones->addColumna($col4);

   $this->obj2 = $opciones->getConfig($reg);

  }

  public function configGridEquipos($codpro='')
  {
   $c = new Criteria();
   $c->add(OcproequPeer::CODPRO,$codpro);
   $reg = OcproequPeer::doSelect($c);

   $opciones = new OpcionesGrid();
   $opciones->setEliminar(true);
   $opciones->setTabla('Ocproequ');
   $opciones->setAncho(600);
   $opciones->setAnchoGrid(600);
   $opciones->setTitulo('');
   $opciones->setName('c');
   $opciones->setFilas(10);
   $opciones->setHTMLTotalFilas(' ');

   $col1 = new Columna('Código');
   $col1->setTipo(Columna::TEXTO);
   $col1->setEsGrabable(true);
   $col1->setAlineacionObjeto(Columna::CENTRO);
   $col1->setAlineacionContenido(Columna::CENTRO);
   $col1->setNombreCampo('codequ');
   $col1->setHTML('type="text" size="15" maxlength="6"');
   $col1->setCatalogo('ocdefequ','sf_admin_edit_form',array('codequ' => 1, 'desequ' => 2),'Ocdefequ_Oycregpro');
   $col1->setAjax('oycregpro',7,2);

   $col2 = new Columna('Descripción');
   $col2->setTipo(Columna::TEXTO);
   $col2->setAlineacionObjeto(Columna::IZQUIERDA);
   $col2->setAlineacionContenido(Columna::IZQUIERDA);
   $col2->setNombreCampo('desequ');
   $col2->setHTML('type="text" size="25" readonly=true');

   $col3 = new Columna('Cantidad');
   $col3->setTipo(Columna::MONTO);
   $col3->setEsGrabable(true);
   $col3->setAlineacionContenido(Columna::DERECHA);
   $col3->setAlineacionObjeto(Columna::DERECHA);
   $col3->setNombreCampo('canequ');
   $col3->setEsNumerico(true);
   $col3->setHTML('type="text" size="25"');
   $col3->setJScript('onKeypress="entermonto_c(event,this.id);"');

   $opciones->addColumna($col1);
   $opciones->addColumna($col2);
   $opciones->addColumna($col3);

   $this->obj3 = $opciones->getConfig($reg);

  }

  protected function saveCaprovee($caprovee)
  {
  	$grid1=Herramientas::CargarDatosGrid($this,$this->obj);
    $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
    $grid3=Herramientas::CargarDatosGrid($this,$this->obj3);
    Obras::salvarOycregpro($caprovee,$grid1,$grid2,$grid3);

  }

  protected function deleteCaprovee($caprovee)
  {
    if (!Obras::eliminarOycregpro($caprovee))
    {
     return false;
    }
    else
    {
    	return true;
    }
  }

  protected function getCaproveeOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $caprovee = new Caprovee();
      $this->setVars();
      $this->configGridRecaudos($this->getRequestParameter('caprovee[codpro]'));
	  $this->configGridEquipos($this->getRequestParameter('caprovee[codpro]'));
	  $this->configGridPersonal($this->getRequestParameter('caprovee[codpro]'));

    }
    else
    {
      $caprovee = CaproveePeer::retrieveByPk($this->getRequestParameter($id));
      $this->setVars();
      $this->configGridRecaudos($caprovee->getCodpro());
	  $this->configGridEquipos($caprovee->getCodpro());
	  $this->configGridPersonal($caprovee->getCodpro());

      $this->forward404Unless($caprovee);
    }

    return $caprovee;
  }

    public function setVars()
  {
      $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
      $this->loncta=strlen($this->mascara);
  }

  public function executeDelete()
  {
    $this->caprovee = CaproveePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->caprovee);
    $id=$this->getRequestParameter('id');

    if (!$this->deleteCaprovee($this->caprovee))
    {
    	$this->setFlash('notice','No se puede eliminar esta contratista, existen registros Asociados');
        return $this->redirect('oycregpro/edit?id='.$id);
    }

    return $this->redirect('oycregpro/list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caprovee/filters');

    // pager
    $this->pager = new sfPropelPager('Caprovee', 10);
    $c = new Criteria();
    $c->addJoin(CaproveePeer::CODPRO,OcproespPeer::CODPRO);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

}

