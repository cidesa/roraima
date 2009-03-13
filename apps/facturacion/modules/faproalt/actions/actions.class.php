<?php

/**
 * faproalt actions.
 *
 * @package    siga
 * @subpackage faproalt
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faproaltActions extends autofaproaltActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGrid();

  }

  public function configGrid()
  {

		$mascaraarticulo=$this->mascaraarticulo;
		$longart=strlen($this->mascaraarticulo);

		$c = new Criteria();
		if ($this->getRequestParameter('articulo') != "")
			$criterio = $this->getRequestParameter('articulo');
		else
		    $criterio = $this->faproalt->getCodart();

		//$c->addSelectColumn(FaproaltPeer::ID);
		//$c->addSelectColumn(FaproaltPeer::CODALT);
		//$c->addSelectColumn(CaregartPeer::DESART);
		//$c->addJoin(FaproaltPeer::CODALT, CaregartPeer::CODART);
		$c->add(FaproaltPeer::CODART,$criterio);
		$per = FaproaltPeer::doSelect($c);
        //$sql="SELECT faproalt.ID, faproalt.CODALT, caregart.DESART FROM faproalt, caregart WHERE faproalt.CODART = '".$criterio."' AND faproalt.CODALT= caregart.CODART";
        //$reg = Herramientas::BuscarDatos($sql,&$per);

		$mascaraarticulo=$this->mascaraarticulo;

		$opciones = new OpcionesGrid();
        $opciones->setEliminar(true);
		$opciones->setTabla('Faproalt');
		$opciones->setAnchoGrid(705);
		$opciones->setAncho(700);
		$opciones->setFilas(50);
		$opciones->setTitulo('Productos Alternos');
		$opciones->setHTMLTotalFilas(' ');

		$obj1= array ('codart' => '1','desart' =>'2');
		$col1 = new Columna('Cod. Artículo');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setNombreCampo('codalt');
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setHTML('type="text" size="10"');
		$col1->setCatalogo('Caregart','sf_admin_edit_form',$obj1,'Caregart_Faproalt');
		$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
	    $col1->setAjax('faproalt',1,2);

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTO);
		$col2->setNombreCampo('desart');
		$col2->setEsGrabable(false);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setHTML('type="text" size="70" readonly=true');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		$this->obj = $opciones->getConfig($per);

  }
	public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	    {
			$dato=CaregartPeer::getDescripcion_art($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($faproalt)
  {
    return Facturacion::eliminarFaproalt($faproalt->getCodart());
  }

   public function executeEdit()
  {
    $this->faproalt = $this->getFaproaltOrCreate();
    $this->configGrid();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFaproaltFromRequest();

      $this->saveFaproalt($this->faproalt);

      $this->faproalt->setId(Herramientas::getX_vacio('CODART','faproalt','id',$this->faproalt->getCodart()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faproalt/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faproalt/list');
      }
      else
      {
        return $this->redirect('faproalt/edit?id='.$this->faproalt->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 protected function saveFaproalt($faproalt)
  {
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Facturacion::salvarFaproalt($faproalt,$grid);
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->faproalt = $this->getFaproaltOrCreate();
    $this->updateFaproaltFromRequest();
   	$this->configGrid();

    $this->labels = $this->getLabels();
	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }
    return sfView::SUCCESS;
  }

	public function validateEdit()
    {

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->faproalt = $this->getFaproaltOrCreate();
       try{
	     $this->updateFaproaltFromRequest();
          }

    catch(Exception $ex){}

       if ($this->faproalt->getCodart() == ""){
          $this->coderror=1103;
          return false;
       }
   	   $this->configGrid();

       $grid=Herramientas::CargarDatosGrid($this,$this->obj);


       if ($this->ValidarDatosVaciosenGrid($grid,&$error))
           {
              $this->coderror=$error;
              return false;
           }
       return true;
      } else return true;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }
      if ($codcatvacio)
        return true;
      else
        return false;
  }

	public function executeAutocomplete()
	  {
		if ($this->getRequestParameter('ajax')=='1')
		{
		  $this->tags=Herramientas::autocompleteAjax('CODART','Caregart','codart',$this->getRequestParameter('faproalt[codart]'));
	    }
	  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/faproalt/filters');

	$this->pager = new sfPropelPager('Faproalt', 10);
	$c = new Criteria();
	$c->clearSelectColumns();
	$c->clearGroupByColumns();
	$c->Setdistinct();
	$c->addSelectColumn(FaproaltPeer::CODART);
	$c->addSelectColumn(CaregartPeer::DESART);
	$c->addSelectColumn('0');
	$c->addJoin(FaproaltPeer::CODART,CaregartPeer::CODART);
	$c->addGroupByColumn(FaproaltPeer::CODART);
	$c->addGroupByColumn(CaregartPeer::DESART);
	$this->addSortCriteria($c);
	$this->addFiltersCriteria($c);
	$this->pager->setCriteria($c);
	$this->pager->setPage($this->getRequestParameter('page', 1));
	$this->pager->init();

  }

  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FaproaltPeer::CODART,$this->getRequestParameter('articulo'));
    $datos = FaproaltPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $faproalt)
    	{
           $faproalt->delete();
    	}
    }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Faartpvp. Make sure it does not have any associated items.');
      return $this->forward('faproalt', 'list');
    }

    return $this->redirect('faproalt/list');
  }

  protected function getFaproaltOrCreate($id = 'id', $articulo = 'articulo')
  {
    if (!$this->getRequestParameter($articulo) )
    {
      $faproalt = new Faproalt();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(FaproaltPeer::CODART,$this->getRequestParameter($articulo));
  	  $faproalt = FaproaltPeer::doSelectOne($c);
      $this->forward404Unless($faproalt);
    }

    return $faproalt;
  }

}
