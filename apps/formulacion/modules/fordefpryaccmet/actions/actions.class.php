<?php

/**
 * fordefpryaccmet actions.
 *
 * @package    Roraima
 * @subpackage fordefpryaccmet
 * @author     $Author:jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 34632 2009-11-10 14:32:11Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefpryaccmetActions extends autofordefpryaccmetActions
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

    $this->setVars();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefpryaccmet/filters');

    // pager
    $this->pager = new sfPropelPager('Fordefaccesp', 10);
    $c = new Criteria();
    $c->addJoin(FordefpryaccmetPeer::CODPRO,FordefaccespPeer::CODPRO);
    $c->addJoin(FordefpryaccmetPeer::CODACCESP,FordefaccespPeer::CODACCESP);
    $c->addAscendingOrderByColumn(FordefpryaccmetPeer::CODPRO);
    $c->addAscendingOrderByColumn(FordefpryaccmetPeer::CODACCESP);
    $c->addAscendingOrderByColumn(FordefpryaccmetPeer::CODMET);
    $c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getFordefpryaccmetOrCreate($id = 'id', $codpro= 'codpro', $accion= 'accion')
  {
    if (!($this->getRequestParameter($codpro)) && !($this->getRequestParameter($accion)))
    {
      $fordefpryaccmet = new Fordefpryaccmet();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(FordefpryaccmetPeer::CODPRO,$this->getRequestParameter($codpro));
  	  $c->add(FordefpryaccmetPeer::CODACCESP,$this->getRequestParameter($accion));
  	  $fordefpryaccmet = FordefpryaccmetPeer::doSelectOne($c);

      $this->forward404Unless($fordefpryaccmet);
    }

    return $fordefpryaccmet;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefpryaccmet = $this->getFordefpryaccmetOrCreate();
    $this->setVars();
    $this->configGrid();
    $this->configGrid2();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefpryaccmetFromRequest();

      $this->saveFordefpryaccmet($this->fordefpryaccmet);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefpryaccmet/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefpryaccmet/list');
      }
      else
      {
        return $this->redirect('fordefpryaccmet/edit?id='.$this->fordefpryaccmet->getId());
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
    $this->fordefpryaccmet = $this->getFordefpryaccmetOrCreate();
    $this->updateFordefpryaccmetFromRequest();
    $this->configGrid();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
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
  protected function saveFordefpryaccmet($fordefpryaccmet)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Formulacion::salvarFordefpryaccmet($fordefpryaccmet,$grid);
  }

  protected function deleteFordefpryaccmet($fordefpryaccmet)
  {
    Formulacion::eliminarFordefpryaccmet($fordefpryaccmet);
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefpryaccmetFromRequest()
  {
    $fordefpryaccmet = $this->getRequestParameter('fordefpryaccmet');
    $this->setVars();
    $this->configGrid();
    $this->configGrid2();

    if (isset($fordefpryaccmet['codpro']))
    {
      $this->fordefpryaccmet->setCodpro($fordefpryaccmet['codpro']);
    }
    if (isset($fordismetperpryaccmet['proacc']))
    {
      $this->fordismetperpryaccmet->setProacc($fordismetperpryaccmet['proacc']);
    }
    if (isset($fordefpryaccmet['nompro']))
    {
      $this->fordefpryaccmet->setNompro($fordefpryaccmet['nompro']);
    }
    if (isset($fordefpryaccmet['tippro']))
    {
      $this->fordefpryaccmet->setTippro($fordefpryaccmet['tippro']);
    }
    if (isset($fordefpryaccmet['codaccesp']))
    {
      $this->fordefpryaccmet->setCodaccesp($fordefpryaccmet['codaccesp']);
    }
    if (isset($fordefpryaccmet['desaccesp']))
    {
      $this->fordefpryaccmet->setDesaccesp($fordefpryaccmet['desaccesp']);
    }
    if (isset($fordefpryaccmet['codmet']))
    {
      $this->fordefpryaccmet->setCodmet($fordefpryaccmet['codmet']);
    }
    if (isset($fordefpryaccmet['desmet']))
    {
      $this->fordefpryaccmet->setDesmet($fordefpryaccmet['desmet']);
    }
    if (isset($fordefpryaccmet['desunimed']))
    {
      $this->fordefpryaccmet->setDesunimed($fordefpryaccmet['desunimed']);
    }
    if (isset($fordefpryaccmet['codunimed']))
    {
      $this->fordefpryaccmet->setCodunimed($fordefpryaccmet['codunimed']);
    }
  }

  /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FordefpryaccmetPeer::CODPRO,$this->getRequestParameter('codpro'));
    $c->add(FordefpryaccmetPeer::CODACCESP,$this->getRequestParameter('accion'));
    $this->fordefpryaccmet=FordefpryaccmetPeer::doSelectOne($c);

    $this->forward404Unless($this->fordefpryaccmet);

    try
    {
      $this->deleteFordefpryaccmet($this->fordefpryaccmet);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Fordefpryaccmet. Make sure it does not have any associated items.');
      return $this->forward('fordefpryaccmet', 'list');
    }

    return $this->redirect('fordefpryaccmet/list');
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $c = new Criteria();
    $c->add(FordefpryaccmetPeer::CODPRO,$this->fordefpryaccmet->getCodpro());
    $c->add(FordefpryaccmetPeer::CODACCESP,$this->fordefpryaccmet->getCodaccesp());
    $per = FordefpryaccmetPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(true);
    $opciones->setTabla('fordefpryaccmet');
    $opciones->setAnchoGrid(500);
    $opciones->setAncho(500);
    $opciones->setTitulo('Metas');
    $opciones->setFilas(20);
    $opciones->setHTMLTotalFilas(' ');
    if ($per){$opciones->setFilas(100-count($per));}else{$opciones->setFilas(100);}

    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codmet');
    $col1->setHTML('type="text" size="5" maxlength="5"');
    $col1->setJScript('onBlur="validargrid(this.id);"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desmet');
    $col2->setHTML('type="text" size="20" maxlength="250"');

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
    $col4->setNombreCampo('canmet');
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="10" disabled="true" autocomplete = "off"');
    $col4->setJScript('onKeypress="entermonto(event,this.id); mostrar(event,this.id);"');

    $col5 = new Columna('Distribucion Cantidad');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('distribucion');
    $col5->setHTML('type="text" size="10"');
    $col5->setOculta(true);

    $col6 = new Columna('');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(false);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('anadir');
    $col6->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" autocomplete = "off"');
    $col6->setJScript('onClick="mostrar(this.id)"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($proyecto='', $accion='', $meta='')
  {
    $c = new Criteria();
    $c->add(FordismetperpryaccmetPeer::CODPRO,$proyecto);
    $c->add(FordismetperpryaccmetPeer::CODACCESP,$accion);
    $c->add(FordismetperpryaccmetPeer::CODMET,$meta);
    $c->addAscendingOrderByColumn(FordismetperpryaccmetPeer::PERPRE);
    $per = FordismetperpryaccmetPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(false);
    $opciones->setTabla('fordismetperpryaccmet');
    $opciones->setAnchoGrid(100);
    $opciones->setAncho(200);
    $opciones->setName('b');
    $opciones->setTitulo('Distribución de la Meta Física');
    if ($per){$opciones->setFilas(0);}else{$opciones->setFilas(12);}
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perpre');
    $col1->setHTML('type="text" size="2" readonly=true');

    $col2 = new Columna('Cant. Prog. Anual');
    $col2->setTipo(Columna::MONTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsNumerico(true);
    $col2->setNombreCampo('canmet');
    $col2->setJScript('onKeypress="entermonto_b(event,this.id); CalculoTrimestral();"');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="10"');
    $col2->setEsTotal(true,'total');

    $col3 = new Columna('Cant. Reprog. Anual');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('canmeteje');
    $col3->setEsNumerico(true);
    $col3->setOculta(true);
    $col3->setJScript('onKeypress="entermonto_b(event,this.id); "');
    $col3->setHTML('type="text" size="10"');

    $col4 = new Columna('Totales');
    $col4->setTipo(Columna::MONTO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setEsGrabable(false);
    $col4->setNombreCampo('trimestre');
    $col4->setEsNumerico(true);
    $col4->setOculta(false);
    $col4->setHTML('type="text" size="10"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj2 = $opciones->getConfig($per);
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
     $dato=FordefpryPeer::getTipo($this->getRequestParameter('codigo'));
     if ($dato=='<!Registro no Encontrado o Vacio!>')
     {$existe='S';}else{$existe='';}
     $nombre=FordefpryPeer::getNombre($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fordefpryaccmet_nompro","'.$nombre.'",""],["existe1","'.$existe.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='2')
   {
     $c= new Criteria();
     $c->add(FordefaccespPeer::CODPRO,$this->getRequestParameter('proyec'));
     $c->add(FordefaccespPeer::CODACCESP,$this->getRequestParameter('codigo'));
     $resul=FordefaccespPeer::doSelectOne($c);
     if ($resul)
     { $existe2='';
     $dato=FordefaccespPeer::getAccion($this->getRequestParameter('codigo'));
     $c->add(FordefpryaccmetPeer::CODPRO,$this->getRequestParameter('proyec'));
     $c->add(FordefpryaccmetPeer::CODACCESP,$this->getRequestParameter('codigo'));
     $resul2=FordefpryaccmetPeer::doSelect($c);
     if ($resul2)
     { $duplicado='S';}else {  $duplicado='';}
     }else{ $existe2='S'; $dato=''; $duplicado='';}
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["existe2","'.$existe2.'",""],["duplicada","'.$duplicado.'",""]]';

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='3')
   {
     $dato=FordefunimedPeer::getUnidad(str_pad($this->getRequestParameter('codigo'),3,'0',STR_PAD_LEFT));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';

     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
   return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='4')
   {
   	 $proyecto = $this->getRequestParameter('proyecto');
     $accion   = $this->getRequestParameter('accion');
     $meta     = $this->getRequestParameter('meta');
     $fila     = $this->getRequestParameter('fil');

     $this->configGrid2($proyecto,$accion,$meta);

     $javascript='actualizarsaldos_b();distribuirPeriodos();CalculoTrimestral();';
     $output = '[["fila","'.$fila.'",""],["javascript","'.$javascript.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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

  public function setVars()
  {
    $this->mascaraproyecto = Herramientas::ObtenerFormato('Fordefegrgen','Forproacc');
    $this->lonpry=strlen($this->mascaraproyecto);
	$this->mascaraaccion = Herramientas::ObtenerFormato('Fordefegrgen','Foraccesp');
	$this->lonacc=strlen($this->mascaraaccion);
  }
}
