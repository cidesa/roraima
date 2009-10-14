<?php

/**
 * faartpvp actions.
 *
 * @package    Roraima
 * @subpackage faartpvp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faartpvpActions extends autofaartpvpActions
{
  public $coderror =-1;

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
	    $this->faartpvp = $this->getFaartpvpOrCreate();
	    $this->configGrid();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFaartpvpFromRequest();

	      if ($this->saveFaartpvp($this->faartpvp)==-1)
		  {
		      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

              $this->faartpvp->setId(Herramientas::getX_vacio('codart','faartpvp','id',$this->faartpvp->getCodart()));

		      if ($this->getRequestParameter('save_and_add'))
		      {
		        return $this->redirect('faartpvp/create');
		      }
		      else if ($this->getRequestParameter('save_and_list'))
		      {
		        return $this->redirect('faartpvp/list');
		      }
		      else
		      {
				return $this->redirect('faartpvp/edit?id='.$this->faartpvp->getId().'&codart='.$this->faartpvp->getCodart());
		      }
		    }
		   else
		    {
	          $this->labels = $this->getLabels();
	          return sfView::SUCCESS;
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
      //$c->add(CaregartPeer::TIPO,'A');
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
		$c->add(FaartpvpPeer::CODART,$this->faartpvp->getCodart());
		$per = FaartpvpPeer::doSelect($c);

		$mascaraarticulo=$this->mascaraarticulo;

		$opciones = new OpcionesGrid();
		$opciones->setEliminar(true);
		$opciones->setTabla('Faartpvp');
		$opciones->setAnchoGrid(805);
		$opciones->setAncho(800);
		$opciones->setTitulo('Datos del Precio');
		$opciones->setHTMLTotalFilas(' ');
		$opciones->setFilas(50);

		$col1 = new Columna('Descripción');
		$col1->setTipo(Columna::TEXTO);
		$col1->setNombreCampo('despvp');
        $col1->setEsGrabable(true);
		$col1->setAlineacionContenido(Columna::IZQUIERDA);
		$col1->setAlineacionObjeto(Columna::IZQUIERDA);
		$col1->setHTML('type="text" size="100"');

		$col2 = new Columna('PVP');
		$col2->setTipo(Columna::MONTO);
		$col2->setNombreCampo('pvpart');
		$col2->setHTML('type="text" size="12"');
        $col2->setEsNumerico(true);
        $col2->setEsGrabable(true);
        $col2->setAlineacionContenido(Columna::DERECHA);
        $col2->setAlineacionObjeto(Columna::DERECHA);
        $col2->setJScript('onKeypress="entermonto(event,this.id)"');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		$this->obj = $opciones->getConfig($per);

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
  protected function saveFaartpvp($faartpvp)
	{
	  // if ($faartpvp->getCodart())
	  //   {
      //	 $faartpvp->save();
	  //  }
	  //  else //nuevo
	  //  {
			$grid=Herramientas::CargarDatosGrid($this,$this->obj);
			Facturacion::salvarFaartpvp($faartpvp,$grid,$this->faartpvp->getCodart());
			return -1;
	  //	}
	}
/*
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  /*protected function updateFaartpvpFromRequest()
	{
	    $faartpvp = $this->getRequestParameter('faartpvp');
		$this->configGrid();

		if (isset($faartpvp['codart']))
	    {
	      $this->faartpvp->setCodart($faartpvp['codart']);
	    }
	    if (isset($faartpvp['desart']))
	    {
	      $this->faartpvp->setDesart($faartpvp['desart']);
	    }
  }
*/
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/faartpvp/filters');

	$this->pager = new sfPropelPager('Faartpvp', 10);
	$c = new Criteria();
	$c->clearSelectColumns();
	$c->clearGroupByColumns();
	$c->Setdistinct();
	$c->addSelectColumn(FaartpvpPeer::CODART);
	$c->addSelectColumn(CaregartPeer::DESART);
	$c->addSelectColumn('0');
	$c->addSelectColumn('0');
	$c->addJoin(FaartpvpPeer::CODART,CaregartPeer::CODART);
	$c->addGroupByColumn(FaartpvpPeer::CODART);
	$c->addGroupByColumn(CaregartPeer::DESART);
	$this->addSortCriteria($c);
	$this->addFiltersCriteria($c);
	$this->pager->setCriteria($c);
	$this->pager->setPage($this->getRequestParameter('page', 1));
	$this->pager->init();

  }

  protected function getFaartpvpOrCreate($id = 'id', $codart = 'codart')
  {
    if (!$this->getRequestParameter($codart) )
    {
      $faartpvp = new Faartpvp();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(FaartpvpPeer::CODART,$this->getRequestParameter($codart));
  	  $faartpvp = FaartpvpPeer::doSelectOne($c);
      $this->forward404Unless($faartpvp);
    }

    return $faartpvp;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FaartpvpPeer::CODART,$this->getRequestParameter('codart'));
    $datos = FaartpvpPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $faartpvp)
    	{
           $faartpvp->delete();
    	}
    	$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
    }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Faartpvp. Make sure it does not have any associated items.');
      return $this->forward('faartpvp', 'list');
    }

    return $this->redirect('faartpvp/list');
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;
      if (count($x)==0)
      {
         //$error=1100;
         //return true;
      }
      while ($j<count($x) && !$codcatvacio)
      {
        if (trim($x[$j]->getCodart())!="")
        {
	        if ((trim($x[$j]->getDespvp())=="")||($x[$j]->getPvpart()<=0))
	        {
	          $codcatvacio=true;
	          $error=1100;
	        }
        }
        $j++;
      } //while ($j<count($x))
      if ($codcatvacio)
        return true;
      else
        return false;
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
    $this->faartpvp = $this->getFaartpvpOrCreate();

    try{
	    $this->updateFaartpvpFromRequest();
    }

    catch(Exception $ex){}

	$this->configGrid();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	    if($this->coderror!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror);
		   $this->getRequest()->setError('',$err);
		  }
      }
    return sfView::SUCCESS;
  }

}
