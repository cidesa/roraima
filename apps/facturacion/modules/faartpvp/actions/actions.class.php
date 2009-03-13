<?php

/**
 * faartpvp actions.
 *
 * @package    siga
 * @subpackage faartpvp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faartpvpActions extends autofaartpvpActions
{
  public $coderror =-1;

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
	protected function updateFaartpvpFromRequest()
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
