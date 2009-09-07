<?php

/**
 * nomdiaext actions.
 *
 * @package    Roraima
 * @subpackage nomdiaext
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdiaextActions extends autonomdiaextActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npdiaext = $this->getNpdiaextOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdiaextFromRequest();

      $this->saveNpdiaext($this->npdiaext);

	  $c= new Criteria();
		 $c->add(NpdiaextPeer::CODNOM,$this->npdiaext->getCodnom());
		 $c->add(NpdiaextPeer::FECHA,$this->npdiaext->getFecha());
		 $npdiaext_bus = NpdiaextPeer::doSelectOne($c);
		 if (count($npdiaext_bus)>0)
		 {
		 	$this->npdiaext->setId($npdiaext_bus->getId());
		 }

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdiaext/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdiaext/list');
      }
      else
      {
        return $this->redirect('nomdiaext/edit?id='.$this->npdiaext->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
	 	$dato=NpnominaPeer::getDesnom(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
	 elseif ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=NpasicarempPeer::getNomemp(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
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
		$c = new Criteria();
		$c->add(NpdiaextPeer::CODNOM,$codigo);
		$c->add(NpdiaextPeer::FECHA,$fecha);
		$c->addAscendingOrderByColumn(NpdiaextPeer::CODNOM);
		$per = NpdiaextPeer::doSelect($c);
		$filas_arreglo=100;


		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npdiaext');
		$opciones->setName('a');
		$opciones->setAnchoGrid(600);
		$opciones->setAncho(700);
		$opciones->setTitulo('Nomina');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Cedula');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codemp');
		$col1->setHTML('type="text" size="15" maxlength="15"');
		//$col1->setCatalogo('npasicaremp','sf_admin_edit_form', array('codemp'=>1,'nomemp' => 2));
		$col1->setCatalogo('npasicaremp','sf_admin_edit_form', array('codemp'=>1,'nomemp' => 2),'Npasicaremp_nomdiaext');
		$col1->setAjax('nomdiaext',2,2);


		$col2 = new Columna('Nombre Empleado');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('nomemp');
      	$col2->setEsNumerico(true);
		$col2->setHTML('type="text" size="80" readonly="readonly"');


		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
  }


/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdiaextFromRequest()
  {
    $npdiaext = $this->getRequestParameter('npdiaext');

    if (isset($npdiaext['codnom']))
    {
      $this->npdiaext->setCodnom($npdiaext['codnom']);
    }
    if (isset($npdiaext['fecha']))
    {
      if ($npdiaext['fecha'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npdiaext['fecha']))
          {
            $value = $dateFormat->format($npdiaext['fecha'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npdiaext['fecha'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npdiaext->setFecha($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npdiaext->setFecha(null);
      }
    }
    if (isset($npdiaext['codemp']))
    {
      $this->npdiaext->setCodemp($npdiaext['codemp']);
    }
  }

  protected function getNpdiaextOrCreate($id = 'id', $codnom = 'codnom', $fecha = 'fecha')
  {
    if (!$this->getRequestParameter($codnom))
    {
      $npdiaext = new Npdiaext();
 	  $this->configGrid($npdiaext->getCodnom(),$npdiaext->getFecha());
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdiaextPeer::CODNOM,$this->getRequestParameter($codnom));
  	  $c->add(NpdiaextPeer::FECHA,$this->getRequestParameter($fecha));
  	  $npdiaext = NpdiaextPeer::doSelectOne($c);
 	  $this->configGrid($this->getRequestParameter($codnom),$this->getRequestParameter($fecha));
      $this->forward404Unless($npdiaext);
    }
    return $npdiaext;
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
  protected function saveNpdiaext($npdiaext)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
	Nomina::Grabar_grid_nomdiaext($npdiaext,$grid);
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdiaext/filters');

    // pager
    $this->pager = new sfPropelPager('Npdiaext', 5);
    $c = new Criteria();

    $c->addSelectColumn(NpdiaextPeer::CODNOM);
    $c->addSelectColumn(NpdiaextPeer::FECHA);
    $c->addSelectColumn("0 AS CODEMP");
    $c->addSelectColumn("0 AS ID");

   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");

    $c->addGroupByColumn(NpdiaextPeer::CODNOM);
    $c->addGroupByColumn(NpdiaextPeer::FECHA);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
   // $this->npdiaext = NpdiaextPeer::retrieveByPk($this->getRequestParameter('id'));
    $c = new Criteria();
    $c->add(NpdiaextPeer::CODNOM,$this->getRequestParameter('codnom'));
  	$c->add(NpdiaextPeer::FECHA,$this->getRequestParameter('fecha'));
    $this->npdiaext = NpdiaextPeer::doSelectOne($c);
    $this->forward404Unless($this->npdiaext);

    try
    {
      $this->deleteNpdiaext($this->npdiaext);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npdiaext. Make sure it does not have any associated items.');
      return $this->forward('nomdiaext', 'list');
    }

    return $this->redirect('nomdiaext/list');
  }

}
