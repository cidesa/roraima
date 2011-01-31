<?php

/**
 * almretser actions.
 *
 * @package    Roraima
 * @subpackage almretser
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almretserActions extends autoalmretserActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->caretser = $this->getCaretserOrCreate();
	  	$this->setVars();
	    $this->configGrid();


		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCaretserFromRequest();

			$this->saveCaretser($this->caretser);

            $this->caretser->setId(Herramientas::getX_vacio('codser','caretser','codser',$this->caretser->getCodser()));

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('almretser/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('almretser/list');
			}
			else
			{
				return $this->redirect('almretser/edit?id='.$this->caretser->getId().'&codser='.$this->caretser->getCodser());
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
      $c = new Criteria();
	  $c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
      $c->add(CaregartPeer::TIPO,'S');
      $reg = CaregartPeer::doSelectOne($c);
      if ($reg)
          $dato=$reg->getDesart();
       else
          $dato="<Registro no encontrado>";

      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else if ($this->getRequestParameter('ajax')=='2')
    {
      $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }


    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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
		$c->add(CaretserPeer::CODSER,$this->caretser->getCodser());
		$per = CaretserPeer::doSelect($c);

		$mascaraarticulo=$this->mascaraarticulo;
		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setTabla('Caretser');
		$opciones->setAnchoGrid(805);
		$opciones->setTitulo('Detalle de la Retencion');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código Retención');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('Codret');
		$col1->setHTML('type="text" size="10"');
        $col1->setCatalogo('optipret','sf_admin_edit_form',array('codtip' => 1, 'destip' => 2), 'Caretser_Almretser');
      	$col1->setAjax('almretser',2,2);

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTO);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('destip');
		$col2->setHTML('type="text" size="100" disabled=true');


		// Se guardan las columnas en el objetos de opciones

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);

	}

	public function setVars()
	{
		$this->mascaraarticulo = Herramientas::getMascaraArticulo();
		$this->longitudarticulo=strlen($this->mascaraarticulo);
		//$this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
		//$this->mascarapartida = Herramientas::getMascaraPartida();
		//$this->mascaraubicacion = Herramientas::getMascaraUbicacion();

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
  protected function saveCaretser($caretser)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Articulos::salvarAlmretser($caretser,$grid);
	}

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCaretserFromRequest()
	{
		$caretser = $this->getRequestParameter('caretser');
		$this->setVars();
    		$this->configGrid();

    		if (isset($caretser['codser']))
		    {
		      $this->caretser->setCodser($caretser['codser']);
		    }
		    if (isset($caretser['desart']))
		    {
		      $this->caretser->setDesart($caretser['desart']);
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

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caretser/filters');

    // pager
    $this->pager = new sfPropelPager('Caretser', 10);
    $c = new Criteria();

    $c->addSelectColumn(CaretserPeer::CODSER);
    $c->addSelectColumn("0 AS CODRET");

   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");
    $c->addGroupByColumn(CaretserPeer::CODSER);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getCaretserOrCreate($id = 'id', $codser = 'codser')
  {
    if (!$this->getRequestParameter($codser) )
    {
      $caretser = new Caretser();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(CaretserPeer::CODSER,$this->getRequestParameter($codser));
  	  $caretser = CaretserPeer::doSelectOne($c);
      $this->forward404Unless($caretser);
    }

    return $caretser;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
 //   $this->caretser = CaretserPeer::retrieveByPk($this->getRequestParameter('id'));
    $c = new Criteria();
    $c->add(CaretserPeer::CODSER,$this->getRequestParameter('codser'));
    $datos = CaretserPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $caretser)
    	{
           $caretser->delete();
    	}
    	$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
    }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Caretser. Make sure it does not have any associated items.');
      return $this->forward('almretser', 'list');
    }

    return $this->redirect('almretser/list');
  }

}
