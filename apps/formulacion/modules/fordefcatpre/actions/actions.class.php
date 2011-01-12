<?php

/**
 * fordefcatpre actions.
 *
 * @package    Roraima
 * @subpackage fordefcatpre
 * @author     $Author:jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 33968 2009-10-14 13:41:55Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefcatpreActions extends autofordefcatpreActions
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

    $this->unidad = Herramientas::ObtenerFormato('Fordefegrgen','Foruae');

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefcatpre/filters');

    // pager
    $this->pager = new sfPropelPager('Fordefcatpre', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefcatpre = $this->getFordefcatpreOrCreate();
    $this->unidad = Herramientas::ObtenerFormato('Fordefegrgen','Foruae');
    $this->longunidad=strlen($this->unidad);
    //$this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefcatpreFromRequest();

      $this->saveFordefcatpre($this->fordefcatpre);

      $this->fordefcatpre->setId(Herramientas::getX_vacio('codcat','fordefcatpre','id',$this->fordefcatpre->getCodcat()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefcatpre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefcatpre/list');
      }
      else
      {
        return $this->redirect('fordefcatpre/edit?id='.$this->fordefcatpre->getId());
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
  protected function saveFordefcatpre($fordefcatpre)
   {
     $grid=Herramientas::CargarDatosGrid($this,$this->obj);
     Formulacion::salvarFordefcatpre($fordefcatpre,$grid);
    }

  protected function deleteFordefcatpre($fordefcatpre)
  {
     Herramientas::EliminarRegistro('Fordefdetcatpre','Codcat',$fordefcatpre->getCodcat());
    $fordefcatpre->delete();
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefcatpreFromRequest()
  {
    $fordefcatpre = $this->getRequestParameter('fordefcatpre');
    $this->unidad = Herramientas::ObtenerFormato('Fordefegrgen','Foruae');
    $this->longunidad=strlen($this->unidad);
   // $this->configGrid();

    if (isset($fordefcatpre['codcat']))
    {
      $this->fordefcatpre->setCodcat($fordefcatpre['codcat']);
    }
    if (isset($fordefcatpre['nomcat']))
    {
      $this->fordefcatpre->setNomcat($fordefcatpre['nomcat']);
    }
    if (isset($fordefcatpre['descat']))
    {
      $this->fordefcatpre->setDescat($fordefcatpre['descat']);
    }

    if (isset($fordefcatpre['objsec']))
    {
      $this->fordefcatpre->setObjsec($fordefcatpre['objsec']);
    }

    if (isset($fordefcatpre['codemp']))
    {
      $this->fordefcatpre->setCodemp($fordefcatpre['codemp']);
    }
    if (isset($fordefcatpre['nomemp']))
    {
      $this->fordefcatpre->setNomemp($fordefcatpre['nomemp']);
    }
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
	   $dato=NphojintPeer::getNomemp($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
  	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODEMP','Nphojint','Codemp',$this->getRequestParameter('fordefcatpre[codemp]'));
    }
  }

  public function cargarUnidad()
  {
    $c = new Criteria();
    $lista_unidad = FordefunimedPeer::doSelect($c);

    $unidades = array();

    foreach($lista_unidad as $obj_unidad)
    {
      $unidades += array($obj_unidad->getCodunimed() => $obj_unidad->getDesunimed());
    }
    return $unidades;
  }

 /*   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $c = new Criteria();
    $c->add(FordefdetcatprePeer::CODCAT,$this->fordefcatpre->getCodcat());
    $per = FordefdetcatprePeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Fordefdetcatpre');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('Detalle del Volumen de Trabajo de la Unidad Ejecutora');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setJScript('onBlur="javascript: valor=this.value; valor=valor.pad(3,"0",0);document.getElementById(this.id).value=valor;"');
    $col1->setNombreCampo('codvoltra');
    $col1->setHTML('type="text" size="10" maxlength="3"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('desvoltra');
    $col2->setHTML('type="text" size="25" maxlength="250"');

    $col3 = new Columna('Unidad de Medida');
    $col3->setTipo(Columna::COMBO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('codunimed');
    $col3->setCombo(self::cargarUnidad());
    $col3->setHTML(' ');

    $col4 = new Columna('Cantidad');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setNombreCampo('canvoltra');
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="10"');
    $col4->setJScript('onKeypress="entermonto(event,this.id)"');

    $col5 = new Columna('Período Seguimiento');
    $col5->setTipo(Columna::COMBO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('perseg');
    $col5->setCombo(Constantes::ListaFrecuenciaPago2());
    $col5->setHTML(' ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    $this->obj = $opciones->getConfig($per);
  }
}
