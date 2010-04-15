<?php

/**
 * empleadosbanco actions.
 *
 * @package    Roraima
 * @subpackage empleadosbanco
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class empleadosbancoActions extends autoempleadosbancoActions
{
 /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npempleados_banco/filters');

    // pager
    $this->pager = new sfPropelPager('NpempleadosBanco', 10);
    $c = new Criteria();
    $c->addSelectColumn("'' AS CODEMP");
    $c->addSelectColumn("'' AS CODEMPANT");
    $c->addSelectColumn("'' AS CODBAN");
    $c->addSelectColumn("'' AS CUENTA_BANCO");
    $c->addSelectColumn("0 AS MONTO");
	$c->addSelectColumn(NpempleadosBancoPeer::CODNOM);
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(NpempleadosBancoPeer::CODNOM);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='',$arreglo=array())
    {

    $per=$arreglo;

    $filas_arreglo=30;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('NpempleadosBanco');
    $opciones->setAnchoGrid(900);
    $opciones->setName('a');
    $opciones->setFilas($filas_arreglo);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('cedemp');
    $col1->setHTML('type="text" size="10"');

    $col2 = new Columna('Nombre del Empleado');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="25"');

    $obja=array('codban'=> 3, 'nomban' => 4);
    $col3 = new Columna('Cod. Banco');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('codban');
    $col3->setCatalogo('Npbancos','sf_admin_edit_form',$obja,'Npbancos_EmpleadosBanco');
    $col3->setHTML('type="text" size="5"');

    $col4 = new Columna('Nombre del Banco');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('nomban');
    $col4->setHTML('type="text" size="15" readonly=true');

    $col5 = new Columna('Número de Cuenta');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('cueban');
    $col5->setHTML('type="text" size="25" readonly=false');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $this->obj = $opciones->getConfig($per);
/*$opciones = new OpcionesGrid();
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
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('diasdisfutar');
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setJScript('onBlur="javascript:event.keyCode=13; calcular_dias(event,this.id);"');
    $col3->setHTML('type="monto" size="8"');

    $col4 = new Columna('Dias disfrutados');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('diasdisfrutados');
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setJScript('onBlur="javascript:event.keyCode=13; calcular_dias2(event,this.id);"');
    $col4->setHTML('type="monto" size="8"');

    $col5 = new Columna('Dias de Vacaciones');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(false);
    $col5->setNombreCampo('diasvac');
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setHTML('type="text" size="8" readonly= true');

    $col6 = new Columna('Dias por disfrutar');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(false);
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
*/

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
     EmpleadosBanco::ArregloEmpleados($this->getRequestParameter('codigo'),&$arreglodet);
     $this->configGrid($this->getRequestParameter('codigo'),&$arreglodet);
     $dato = Herramientas::getX('codnom','Npnomina','nomnom',$this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

     //return sfView::HEADER_ONLY;
   }
  }


   protected function getNpempleadosBancoOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      EmpleadosBanco::ArregloEmpleados($this->getRequestParameter('npempleados_banco[codnom]'),&$arreglodet);
      $this->configGrid($this->getRequestParameter('npempleados_banco[codnom]'),&$arreglodet);
      $npempleados_banco = new NpempleadosBanco();
    }
    else
    {
      $npempleados_banco = NpempleadosBancoPeer::retrieveByPk($this->getRequestParameter($id));
      EmpleadosBanco::ArregloEmpleados($npempleados_banco->getCodnom(),&$arreglodet);
      $this->configGrid($npempleados_banco->getCodnom(),&$arreglodet);
      $this->forward404Unless($npempleados_banco);
    }

    return $npempleados_banco;
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
  protected function saveNpempleadosBanco($npempleados_banco)
  {

    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    EmpleadosBanco::Grabar_grid_EmpleadosBancos($npempleados_banco,$grid);
  }


}
