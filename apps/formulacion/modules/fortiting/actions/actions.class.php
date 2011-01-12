<?php

/**
 * fortiting actions.
 *
 * @package    Roraima
 * @subpackage fortiting
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fortitingActions extends autofortitingActions
{
	  protected $coderr = -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->forparing = $this->getForparingOrCreate();
    $this->forpar = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonpar=strlen($this->forpar);
    $this->setVars();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateForparingFromRequest();

      $this->saveForparing($this->forparing);

      $this->forparing->setId(Herramientas::getX_vacio('codparing','forparing','id',$this->forparing->getCodparing()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fortiting/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fortiting/list');
      }
      else
      {
        return $this->redirect('fortiting/edit?id='.$this->forparing->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveForparing($forparing)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $gridFF=Herramientas::CargarDatosGrid($this,$this->objFF);
    Formulacion::salvarFortiting($forparing,$grid,$gridFF);
  }

  protected function deleteForparing($forparing)
  {
    Formulacion::eliminarFortiting($forparing);
  }

  protected function getForparingOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $forparing = new Forparing();
      $this->configGridTipoFinanciamiento();
      $this->configGrid();
    }
    else
    {
      $forparing = ForparingPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($forparing->getCodparing());
      $this->configGridTipoFinanciamiento($forparing->getCodparing());
      $this->forward404Unless($forparing);
    }

    return $forparing;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridTipoFinanciamiento($codigo='')
  {
    $c = new Criteria();
    $c->add(ForingdisfuefinPeer::CODPARING ,$codigo);
    $per = ForingdisfuefinPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(true);
    $opciones->setTabla('foringdisfuefin');
    $opciones->setAnchoGrid(500);
    $opciones->setAncho(500);
    $opciones->setTitulo('Fuente de Financiamientos');
	$opciones->setFilas(20);
	$opciones->setName('b');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Codigo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codfin');
    $col1->setHTML('type="text" size="10" ');
    $objq= array ('codfin' => '1','nomext' =>'2');
    $col1->setCatalogo('Fortipfin','sf_admin_edit_form',$objq,'Fortipfin_Fortiting');
    $col1->setAjax('fortiting',2,2);

    $col2 = new Columna('Descripcion');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomext');
    $col2->setEsGrabable(false);
    $col2->setHTML('type="text" size="20"');
    //$col2->setEsTotal(true,'suma');

    $col3 = new Columna('Monto');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsNumerico(true);
    $col3->setNombreCampo('montoing');
    $col3->setJScript('onBlur="Calculo(this.id);"');
    $col3->setEsGrabable(true);
    $col3->setHTML('type="text" size="10"');
    //$col3->setEsTotal(true,'suma');
    
    $mascaracat=H::getObtener_FormatoCategoria_Formulacion();
    $loncat=strlen($mascaracat);
    $col4 = new Columna('Unidad Ejecutora');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('codcat');
    $col4->setHTML('type="text" size="10" maxlength="'.chr(39).$loncat.chr(39).'"');
    $col4->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracat.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&cajtexcom=\'+this.id)"');
    $obja= array ('codcat' => '4','nomcat' =>'5');    
    $params= array('param1' => $loncat, 'val2');
    $col4->setCatalogo('Fordefcatpre','sf_admin_edit_form',$obja,'Fordefcatpre_Forotrcrepre',$params);

    $col5 = new Columna('Descripcion');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('nomcat');
    $col5->setEsGrabable(false);
    $col5->setHTML('type="text" size="20" readOnly="true"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->objFF = $opciones->getConfig($per);
   }



  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(ForingdisperPeer::CODPAR,$codigo);
    $c->addAscendingOrderByColumn(ForingdisperPeer::PERPAR);
    $per = ForingdisperPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
    $opciones->setTabla('foringdisper');
    $opciones->setAnchoGrid(200);
    $opciones->setAncho(300);
    $opciones->setTitulo('Distribución Mensual');

    if ($codigo==''){
    	$opciones->setFilas(12);
    }else{ $opciones->setFilas(0);
    }

    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perpar');
    $col1->setHTML('type="text" size="2" readonly=true');

    $col2 = new Columna('Monto');
    $col2->setTipo(Columna::MONTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsNumerico(true);
    $col2->setNombreCampo('monpar');
    $col2->setJScript('onKeypress="entermonto(event,this.id);" onBlur="monto2(this.id);"');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="15"');
    $col2->setEsTotal(true,'suma');

    $col3 = new Columna('% (+/-)');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('porper');
    $col3->setEsNumerico(true);
    $col3->setJScript('onKeypress="entermonto(event,this.id); porcentaje(event,this.id);"');
    $col3->setHTML('type="text" size="5"');
    $col3->setEsTotal(true,'suma2');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);
   }

   	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
              $dato=""; $js="";
              $longitud = strlen(Herramientas::getObtener_FormatoPartida_Formulacion());
              if ($longitud==strlen($this->getRequestParameter('codigo')))
			$dato=FordefparingPeer::getDesparing($this->getRequestParameter('codigo'));
              else  $js="alert('La Partida de Ingreso no es de Ultimo Nivel'); $('forparing_codparing').value=''; $('forparing_codparing').focus();";
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
	    }
            else  if ($this->getRequestParameter('ajax')=='3')
	    {
              $mascaracat=H::getObtener_FormatoCategoria_Formulacion();
              $loncat=strlen($mascaracat);
              $js=""; $dato="";

              $q= new Criteria();
              $q->add(FordefcatprePeer::CODCAT,$this->getRequestParameter('codigo'));
              $reg= FordefcatprePeer::doSelectOne($q);
              if ($reg)
              {
                if ($loncat==strlen($this->getRequestParameter('codigo')))
                {
                    $dato=$reg->getNomcat();
                }else $js="alert('La Unidad Ejecutora no es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }else $js="alert('La Unidad Ejecutora no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','Codfin',$this->getRequestParameter('forparing[codtipfin]'));
	    }
	}

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateForparingFromRequest()
  {
    $forparing = $this->getRequestParameter('forparing');
    $this->forpar = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonpar=strlen($this->forpar);

    if (isset($forparing['codparing']))
    {
      $this->forparing->setCodparing($forparing['codparing']);
    }
    if (isset($forparing['despar']))
    {
      $this->forparing->setDespar($forparing['despar']);
    }
    if (isset($forparing['montoing']))
    {
      $this->forparing->setMontoing($forparing['montoing']);
      $this->forparing->setMontodis($forparing['montoing']);
    }
    if (isset($forparing['codtipfin']))
    {
      $this->forparing->setCodtipfin($forparing['codtipfin']);
    }
    if (isset($forparing['desfin']))
    {
      $this->forparing->setDesfin($forparing['desfin']);
    }
  }

    /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->forpar = Herramientas::getObtener_FormatoPartida_Formulacion();
    $this->lonpar=strlen($this->forpar);

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/forparing/filters');

    // pager
    $this->pager = new sfPropelPager('Forparing', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	public function setVars()
	{
		$this->asiper = Herramientas :: ObtenerFormato('Fordefniv', 'asiper');
	}


  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->forparing = $this->getForparingOrCreate();
    $this->updateForparingFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

  public function updateError()
  {
    $this->configGridTipoFinanciamiento();
    $this->configGrid();

    $gridFF = Herramientas::CargarDatosGrid($this,$this->objFF);
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);



  }

}
