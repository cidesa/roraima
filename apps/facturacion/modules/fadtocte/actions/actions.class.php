<?php

/**
 * fadtocte actions.
 *
 * @package    siga
 * @subpackage fadtocte
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fadtocteActions extends autofadtocteActions
{
  private $coderror = -1;
  // Para incluir funcionalidades al executeEdit()

	public function executeGrid()
	{
	  if ($this->getRequestParameter('ajax')=='1')
	  {
  		$this->configGrid($this->getRequestParameter('tipcte'));
	  }
	}

  public function executeIndex()
  {
    return $this->forward('fadtocte', 'edit');
  }

  public function CargarTipCte()
	{
	$c = new Criteria();
	$lista_tip = FatipctePeer::doSelect($c);
	$descuentos = array();

	foreach($lista_tip as $obj_tip)
	{
	  $descuentos += array($obj_tip->getId() => $obj_tip->getNomtipcte());
	}

	return $descuentos;
    }

  protected function saveFadtocte($fadtocte)
  {

    $obj=Herramientas::CargarDatosGrid($this,$this->grid);
    Facturacion::salvarFadtocte($fadtocte,$obj);
    return -1;

  }


	public function configGrid($codtipcte=' '){

		$c = new Criteria();
		$c->add(FadtoctePeer::FATIPCTE_ID,$codtipcte);
		$per = FadtoctePeer::doSelect($c);

/*
        if ($codtipcte != "")
        $sql="select fadescto.id, fadescto.coddesc, fadescto.desdesc, fadescto.mondesc from fadtocte, fadescto where fadtocte.coddesc = fadescto.coddesc and fadtocte.fatipcte_id =".$codtipcte;
        else
        $sql="select fadescto.id, fadescto.coddesc, fadescto.desdesc, fadescto.mondesc from fadtocte, fadescto where fadtocte.coddesc = fadescto.coddesc and fadtocte.coddesc is null";
        $reg = Herramientas::BuscarDatos($sql,&$per);
*/
        $this->fila=count($per);

		$opciones = new OpcionesGrid();
		$opciones->setEliminar(true);
		$opciones->setTabla('Fadtocte');
		$opciones->setAnchoGrid(810);
		$opciones->setAncho(800);
		$opciones->setTitulo('Descuentos asociados');
		$opciones->setHTMLTotalFilas(' ');
		$opciones->setFilas(50);

		$col1 = new Columna('Cod. Descuento');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setNombreCampo('coddesc');
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setHTML('type="text" size="10" maxlength="10"');
		$objs = array('coddesc' => 1, 'desdesc' => 2, 'mondesc' => 3);
        $metodo='Fadescto_Fadtocte';
        $col1->setCatalogo('fadescto','sf_admin_edit_form',$objs,$metodo);
		$col1->setJScript('onBlur="ajax(this.id)"');
		$col1->setAjax('fadtocte',2,2);

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTO);
		$col2->setNombreCampo('desdesc');
		$col2->setEsNumerico(false);
		$col2->setEsGrabable(false);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setHTML('type="text" size="40" readonly="true"');

		$col3 = new Columna('Monto');
		$col3->setTipo(Columna::MONTO);
		$col3->setNombreCampo('mondesc');
		$col3->setEsNumerico(true);
		$col3->setEsGrabable(false);
		$col3->setAlineacionContenido(Columna::IZQUIERDA);
		$col3->setAlineacionObjeto(Columna::IZQUIERDA);
		$col3->setHTML('type="text" size="15" readonly="true"');
		$col3->setAjax('fadtocte',3,3);

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		$this->grid = $opciones->getConfig($per);


	}

    public function executeEdit()
  {
    $this->fadtocte = $this->getFadtocteOrCreate();
    $this->descuentos=$this->CargarTipCte();
    $this->configGrid($this->getRequestParameter('tipcte'));

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFadtocteFromRequest();

      if($this->saveFadtocte($this->fadtocte) ==-1){
        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('fadtocte/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('fadtocte/list');
        }
        else
        {
            return $this->redirect('fadtocte/edit');
        }

      }else{
        $this->labels = $this->getLabels();
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
    $this->fadtocte = $this->getFadtocteOrCreate();
    $this->updateFadtocteFromRequest();

      $this->configGrid($this->getRequestParameter('tipcte'));
      $obj = Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
        $this->updateError();
      }
    }
    return sfView::SUCCESS;
  }

  public function executeAjax()
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    if ($this->getRequestParameter('ajax')=='2')
    {
      $dato=FadesctoPeer::getDescripcion($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else  if ($this->getRequestParameter('ajax')=='3')
    {
      $dato=FadesctoPeer::getMondesc($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

}
