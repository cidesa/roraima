<?php

/**
 * farecart actions.
 *
 * @package    siga
 * @subpackage farecart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class farecartActions extends autofarecartActions
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
		if ($this->getRequestParameter('recargo') != "")
			$criterio = $this->getRequestParameter('recargo');
		else
		    $criterio = $this->farecart->getCodrgo();
		$c->add(FarecartPeer::CODRGO,$criterio);
		$per = FarecartPeer::doSelect($c);

		$mascaraarticulo=$this->mascaraarticulo;

		$opciones = new OpcionesGrid();
        $opciones->setEliminar(true);
		$opciones->setTabla('Farecart');
		$opciones->setAnchoGrid(705);
		$opciones->setAncho(700);
		$opciones->setFilas(50);
		$opciones->setTitulo('Artículos asociados');
		$opciones->setHTMLTotalFilas(' ');

		$obj1= array ('codart' => '1','desart' =>'2');
		$col1 = new Columna('Cod. Artículo');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setNombreCampo('codart');
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setHTML('type="text" size="10"');
		$col1->setCatalogo('Caregart','sf_admin_edit_form',$obj1,'Caregart_Faproalt');
		$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
	    //$col1->setAjax('farecart',1,2);

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
			$dato=FarecargPeer::getRecargo($this->getRequestParameter('codigo'));
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


  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FarecartPeer::CODRGO,$this->getRequestParameter('recargo'));
    $datos = FarecartPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $farecart)
    	{
           $farecart->delete();
    	}
    }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Faartpvp. Make sure it does not have any associated items.');
      return $this->forward('farecart', 'list');
    }

    return $this->redirect('farecart/list');
  }

   public function executeEdit()
  {
    $this->farecart = $this->getFarecartOrCreate();

    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFarecartFromRequest();
      $this->saveFarecart($this->farecart);

      $this->farecart->setId(Herramientas::getX_vacio('codrgo','farecart','id',$this->farecart->getCodrgo()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('farecart/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('farecart/list');
      }
      else
      {
        //return $this->redirect('farecart/edit?id='.$this->farecart->getId());
        return $this->redirect('farecart/edit?id='.$this->farecart->getId().'&recargo='.$this->farecart->getCodrgo());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

 protected function saveFarecart($farecart)
  {
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Facturacion::salvarFarecart($farecart,$grid,$this->farecart->getCodrgo());
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->farecart = $this->getFarecartOrCreate();
    $this->updateFarecartFromRequest();
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
       $this->farecart = $this->getFarecartOrCreate();
       try{
	     $this->updateFarecartFromRequest();
          }

    catch(Exception $ex){}

       if ($this->farecart->getCodrgo() == ""){
          $this->coderror=1101;
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

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/farecart/filters');

	$this->pager = new sfPropelPager('Farecart', 10);
	$c = new Criteria();
	$c->clearSelectColumns();
	$c->clearGroupByColumns();
	$c->Setdistinct();
	$c->addSelectColumn(FarecartPeer::CODRGO);
	$c->addSelectColumn(FarecargPeer::NOMRGO);
	$c->addSelectColumn('0');
	$c->addJoin(FarecartPeer::CODRGO,FarecargPeer::CODRGO);
	$c->addGroupByColumn(FarecartPeer::CODRGO);
	$c->addGroupByColumn(FarecargPeer::NOMRGO);
	$this->addSortCriteria($c);
	$this->addFiltersCriteria($c);
	$this->pager->setCriteria($c);
	$this->pager->setPage($this->getRequestParameter('page', 1));
	$this->pager->init();

  }

  protected function getFarecartOrCreate($id = 'id', $recargo = 'recargo')
  {
    if (!$this->getRequestParameter($recargo) )
    {
      $farecart = new Farecart();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(FarecartPeer::CODRGO,$this->getRequestParameter($recargo));
  	  $farecart = FarecartPeer::doSelectOne($c);
      $this->forward404Unless($farecart);
    }

    return $farecart;
  }


}
