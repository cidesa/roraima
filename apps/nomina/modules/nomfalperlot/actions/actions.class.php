<?php

/**
 * nomfalperlot actions.
 *
 * @package    Roraima
 * @subpackage nomfalperlot
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 40775 2010-09-28 16:58:41Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomfalperlotActions extends autonomfalperlotActions
{

  private $coderror = -1;

  public function executeIndex()
  {
    return $this->forward('nomfalperlot', 'edit');
  }

  public function executeList()
  {
    return $this->forward('nomfalperlot', 'edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {

    parent::executeEdit();

  }

  protected function getNpfalperOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npfalper = new Npfalper();
 	  $this->configGrid($npfalper->getCodnom(),$npfalper->getFecdes());
    }
    else
    {
      $npfalper = NpfalperPeer::retrieveByPk($this->getRequestParameter($id));
 	  $this->configGrid($npfalper->getCodnom(),$npfalper->getFecdes());
      $this->forward404Unless($npfalper);
    }

    return $npfalper;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='',$fecha='')
  {
	Nomina::Obtener_Arreglo_Nomfalperlot($codigo,$fecha,&$output);
	$per = $output;
	$filas_arreglo=10;


	// Se crea el objeto principal de la clase OpcionesGrid
	$opciones = new OpcionesGrid();
	// Se configuran las opciones globales del Grid
	$opciones->setEliminar(false);
	$opciones->setFilas($filas_arreglo);
	$opciones->setTabla('Npdiaext');
	$opciones->setName('a');
	$opciones->setAnchoGrid(770);
	$opciones->setTitulo('Nomina');
	$opciones->setHTMLTotalFilas(' ');

	$col1 = new Columna('X');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');
    $col1->setJScript('');

	// Se generan las columnas
	$col2 = new Columna('Cédula');
	$col2->setTipo(Columna::TEXTO);
	$col2->setEsGrabable(true);
	$col2->setAlineacionObjeto(Columna::CENTRO);
	$col2->setAlineacionContenido(Columna::CENTRO);
	$col2->setNombreCampo('codemp');
	$col2->setHTML('type="text" size="10" maxlength="10"');


	$col3 = new Columna('Nombre Empleado');
	$col3->setTipo(Columna::TEXTO);
	$col3->setEsGrabable(true);
	$col3->setAlineacionObjeto(Columna::IZQUIERDA);
	$col3->setAlineacionContenido(Columna::IZQUIERDA);
	$col3->setNombreCampo('nomemp');
  	$col3->setEsNumerico(true);
	$col3->setHTML('type="text" size="30" readonly="readonly"');

	$col4 = new Columna('Cargo');
	$col4->setTipo(Columna::TEXTO);
	$col4->setEsGrabable(true);
	$col4->setAlineacionObjeto(Columna::IZQUIERDA);
	$col4->setAlineacionContenido(Columna::IZQUIERDA);
	$col4->setNombreCampo('nomcar');
  	$col4->setEsNumerico(true);
	$col4->setHTML('type="text" size="30" readonly="readonly"');

	$col5 = new Columna('Motivo');
    $col5->setTipo(Columna::COMBO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('codmot');
    $col5->setCombo(self::CargarMotivo());
    $col5->setHTML(' ');


	// Se guardan las columnas en el objetos de opciones
	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	// Ee genera el arreglo de opciones necesario para generar el grid
	$this->obj = $opciones->getConfig($per);
  }

	public function executeGrid()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=NpnominaPeer::getDesnom(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

		$dateFormat = new sfDateFormat('es_VE');
    	$fechabuscada = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));
		$this->configGrid($this->getRequestParameter('codigo'),$fechabuscada);
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
  protected function saveNpfalper($npfalper)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
	/*print'<pre>';
	print_r($grid);
	print'</pre>';
	exit('guardo');*/
	Nomina::Grabar_grid_nomfalperlot($npfalper,$grid);
  }

    public function CargarMotivo()
	{
		$c = new Criteria();
		$lista = NpmotfalPeer::doSelect($c);

		$tipos = array();

		foreach($lista as $obj_tip)
		{
		  $tipos += array($obj_tip->getCodmotfal() => $obj_tip->getDesmotfal());
		}
		return $tipos;
	}


  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */

  /*public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nomfalperlot/filters');

     // 15    // pager
    $this->pager = new sfPropelPager('Npfalper', 15);
    $c = new Criteria();

    $c->addSelectColumn(NpfalperPeer::CODNOM);
    $c->addSelectColumn("'' AS CODEMP");
    $c->addSelectColumn("'' AS CODMOT");
    $c->addSelectColumn("0 AS NRODIA");
    $c->addSelectColumn("'' AS OBSERV");
    $c->addSelectColumn(NpfalperPeer::FECDES);
    $c->addSelectColumn(NpfalperPeer::FECHAS);
    $c->addSelectColumn("max(id) AS ID");


   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");

    $c->addGroupByColumn(NpfalperPeer::CODNOM);
    $c->addGroupByColumn(NpfalperPeer::FECDES);
    $c->addGroupByColumn(NpfalperPeer::FECHAS);


    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }*/


}
