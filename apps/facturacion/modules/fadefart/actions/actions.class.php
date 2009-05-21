<?php

/**
 * fadefart actions.
 *
 * @package    siga
 * @subpackage fadefart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fadefartActions extends autofadefartActions
{
  public $coderror =-1;

  public function executeIndex()
  {
  	$this->setVars();
  	$c= new	Criteria();
  	$data=FacorrelatPeer::doSelectOne($c);
    if ($data)
    { $id=$data->getId();
    return $this->redirect('fadefart/edit?id='.$id);
    }
    else { return $this->redirect('fadefart/edit');}

  }

	public function executeEdit()
	{
	    $this->facorrelat = $this->getFacorrelatOrCreate();
	    $this->setVars();
	    $this->configGrid();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFacorrelatFromRequest();
	      if ($this->saveFadefart($this->facorrelat)==-1)
		  {
		      $this->setFlash('notice', 'Your modifications have been saved');

              $this->Bitacora('Guardo');

		      if ($this->getRequestParameter('save_and_add'))
		      {
		        return $this->redirect('fadefart/create');
		      }
		      else if ($this->getRequestParameter('save_and_list'))
		      {
		        return $this->redirect('fadefart/list');
		      }
		      else
		      {
				return $this->redirect('fadefart/edit?id='.$this->facorrelat->getId());
		      }
		    }
		   else
		    {
	          $this->labels = $this->getLabels();
	          $err = Herramientas::obtenerMensajeError($this->coderror);
       	      $this->getRequest()->setError('',$err);
              return sfView::SUCCESS;

	        }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }

	}

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->setVars();
    $this->configGrid();
  }

  public function configGrid()
  {
		$c = new Criteria();
		$per = FadefcajPeer::doSelect($c);

        $this->fila=count($per);

		$opciones = new OpcionesGrid();
		$opciones->setTabla('Fadefcaj');
		$opciones->setAnchoGrid(310);
		$opciones->setAncho(300);
		$opciones->setTitulo('');
		$opciones->setHTMLTotalFilas(' ');
		$opciones->setFilas(50);
		$opciones->setEliminar(false);

		$col1 = new Columna('Descripción');
		$col1->setTipo(Columna::TEXTO);
		$col1->setNombreCampo('descaj');
		$col1->setEsNumerico(false);
		$col1->setEsGrabable(false);
		$col1->setAlineacionContenido(Columna::IZQUIERDA);
		$col1->setAlineacionObjeto(Columna::IZQUIERDA);
		$col1->setHTML('type="text" size="40" readonly="true"');

		$col2 = new Columna('Correlativo');
		$col2->setTipo(Columna::TEXTO);
		$col2->setNombreCampo('corcaj');
		$col2->setEsNumerico(false);
		$col2->setEsGrabable(true);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setHTML('type="text" size="15"');
		$col2->setJScript('onBlur="if(!IsNumeric(this.value))alert(\'Correlativo inválido\');"');

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
        	$dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
        	$dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

	}


/*  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

   	   $this->configGrid();
       $grid=Herramientas::CargarDatosGrid($this,$this->obj);

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;

  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->setVars();
    $this->facorrelat = $this->getFacorrelatOrCreate();
    $this->updateFacorrelatFromRequest();
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
  }*/


  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);
	$this->setVars();
  }

  protected function saveFadefart($fadefcaj)
  {
  	$lote = Facturacion::salvarNumlot($this->getRequestParameter('facorrelat[numlot]'));
    /*if($lote!=-1){
      $this->coderror = $lote;
      return $this->coderror;
    }*/
  	$codcat = Facturacion::salvarCodcat($this->getRequestParameter('facorrelat[codcat]'));
   /* if($codcat!=-1){
      $this->coderror = $codcat;
      return $this->coderror;
    }*/
    $resp= Facturacion::salvarCuentas($this->getRequestParameter('facorrelat[ctadev]'),$this->getRequestParameter('facorrelat[ctavco]'),$this->getRequestParameter('facorrelat[generaop]'),$this->getRequestParameter('facorrelat[generacom]'),$this->getRequestParameter('facorrelat[apliclades]'));
    if($resp!=-1){
      $this->coderror = $resp;
      return $this->coderror;
    }

    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $resp=Facturacion::salvarFacorrelat($fadefcaj,$grid);
    if($resp!=-1){
      $this->coderror = $resp;
      return $this->coderror;
    }
    return -1;
  }


  public function setVars()
  {
    $c = new Criteria();
    $datos=CaregartPeer::doselect($c);
    if ($datos)
    { $this->esta='1';}
    else { $this->esta='0';}

    $c = new Criteria();
    $dato=CadefubiPeer::doselect($c);
    if ($dato)
    { $this->esta1='1';}
    else { $this->esta1='0';}

    $c = new Criteria();
    $data=CacatsncPeer::doselect($c);
    if ($data)
    { $this->esta2='1';}
    else { $this->esta2='0';}

	  $this->mascarapresupuestaria = Herramientas::Obtener_FormatoPresupuesto();
	  $this->longpre=strlen($this->mascarapresupuestaria);
	  $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
	  $this->longcon=strlen($this->mascaracontabilidad);

  }

}
