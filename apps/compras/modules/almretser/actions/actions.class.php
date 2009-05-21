<?php

/**
 * almretser actions.
 *
 * @package    siga
 * @subpackage almretser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almretserActions extends autoalmretserActions
{
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

	protected function saveCaretser($caretser)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Articulos::salvarAlmretser($caretser,$grid);
	}

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
