<?php

/**
 * fadtocte actions.
 *
 * @package    Roraima
 * @subpackage fadtocte
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
  protected function saveFadtocte($fadtocte)
  {

    $obj=Herramientas::CargarDatosGrid($this,$this->grid);
    Facturacion::salvarFadtocte($fadtocte,$obj);
    return -1;

  }


	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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


   /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
