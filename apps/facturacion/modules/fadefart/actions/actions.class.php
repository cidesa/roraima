<?php

/**
 * fadefart actions.
 *
 * @package    Roraima
 * @subpackage fadefart
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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
  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
	$this->setVars();
    $this->configGrid();
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


/*


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
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
  }


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
