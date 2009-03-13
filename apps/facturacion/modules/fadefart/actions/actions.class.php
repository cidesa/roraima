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

              //$this->facorrelat->setId(Herramientas::getX_vacio('codart','faartpvp','id',$this->faartpvp->getCodart()));

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
		$col2->setTipo(Columna::TEXTO);		//$c->addJoin(FadefcajPeer::ID,FacorcajPeer::FADEFCAJ_ID);
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

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()
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
	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
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

  protected function saveFadefart($fadefcaj)
  {
  	$lote = Facturacion::salvarNumlot($this->getRequestParameter('facorrelat[numlot]'));
    if($lote!=-1){
      $this->coderror = $lote;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
  	$codcat = Facturacion::salvarCodcat($this->getRequestParameter('facorrelat[codcat]'));
    if($codcat!=-1){
      $this->coderror = $codcat;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $resp=Facturacion::salvarFacorrelat($fadefcaj,$grid);
    if($resp!=-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
  }


  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
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

  }

}
