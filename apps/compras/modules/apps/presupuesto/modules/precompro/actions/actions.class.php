<?php

/**
 * precompro actions.
 *
 * @package    Roraima
 * @subpackage precompro

 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class precomproActions extends autoprecomproActions
{

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
	public function editing() {
		$this->configGrid();
		$this->setVars();
	}

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
	public function configGrid($reg = array(),$regelim = array()) {
		$this->params=array();

		$c = new Criteria();
    	$c->add(CpimpcomPeer::REFCOM,$this->cpcompro->getRefcom());
    	$reg = CpimpcomPeer::doSelect($c);

    	$this->obj = H::getConfigGrid($this->cpcompro->getId()=='' ? 'grid_cpimpcom_create' : 'grid_cpimpcom_edit',$reg);
    	$this->params['grid'] = $this->obj;
    }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
	public function executeAjaxfila() {
		$name = $this->getRequestParameter('grid','a');
		$grid = $this->getRequestParameter('grid'.$name,'');

		$fila = $this->getRequestParameter('fila','');
		$codpre = $grid[$fila][1];
		$monimp = $grid[$fila][2];
		$c = new Criteria();
		$c->add(CpasiiniPeer::CODPRE,$codpre);
		$cpasiini = CpasiiniPeer::doSelectOne($c);

		if(!$cpasiini) {
			$grid[$fila][1] = '';
      		$grid[$fila][2] = 0.00;
		    //enviar mensaje
    	}else{
      		if($monimp>0){
        		$mondis = H::Monto_disponible($codpre);
        		if($mondis<$monimp){
          			$msj=H::obtenerMensajeError(1338);
          			$grid[$fila][2] = 0.00;
          			$grid[$fila][3] = $mondis;
        		}
        		else{
          			$grid[$fila][3] = $mondis-$monimp;
        		}
      		}
    	}
    	$output = Herramientas::grid_to_json($grid,$name);
    	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	return sfView::HEADER_ONLY;
    }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
    $ajax = $this->getRequestParameter('ajax','');

    $refcom = $this->getRequestParameter('refcom','');
    $feccom = $this->getRequestParameter('feccom','');
    $salcau = $this->getRequestParameter('salcau','');

    switch ($ajax){
      case '1':
      	$msj = Presupuesto::verificarAnuPrecompro($refcom,$salcau);
      	if ($msj==''){
      		$javascript="abrirAnular('$refcom','$feccom')";
      	}else {
      		$javascript="alert('$msj')";
      	}
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '2':
      	$refcom = $this->getRequestParameter('cpcompro[refcom]','');
      	$c = new Criteria();
		$c->add(CpcomproPeer::REFCOM,$refcom);
		$reg = CpcomproPeer::doSelectOne($c);
		$codE=Presupuesto::autorizarCompromiso($reg);
		if ($codE!=-1){
			$msj=H::obtenerMensajeError($codE);
		}
		else {
			$msj='Compromiso aprobado';
		}
		$javascript="alert('$msj')";
		$output = '[["javascript","'.$javascript.'",""]]';
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

	public function validateEdit() {
		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST){
			$this->cpcompro = $this->getCpcomproOrCreate();
			$this->configGrid();
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
			if (count($grid)>0){
				$this->coderr = Presupuesto::validarPreCom($this->cpcompro,$grid);
			}
			else $this->coderr=1342;
			if($this->coderr!=-1){
				return false;
			} else return true;
		}else return true;
	}

	public function updateError() {
    	$this->configGrid();
	    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    	$this->configGrid($grid[0],$grid[1]);
    }

	public function executeAnular() {
		$this->refcom=$this->getRequestParameter('refcom');
  		$feccom=$this->getRequestParameter('feccom');
		$salcau=$this->getRequestParameter('salcau');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));

	   	$c = new Criteria();
   		$c->add(CpcomproPeer::REFCOM,$this->refcom);
   		$c->add(CpcomproPeer::FECCOM,$fec);
   		$this->cpcompro = CpcomproPeer::doSelectOne($c);
   		$id = $this->cpcompro->getId();

   		sfView::SUCCESS;
	}

	public function executeSalvaranu(){
		$refcom=$this->getRequestParameter('refcom');
		$feccom=$this->getRequestParameter('feccom');
  		$fecanu=$this->getRequestParameter('fecanu');
		$desanu=$this->getRequestParameter('desanu');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

		$this->msj='';
		if (strtotime($fec) < strtotime($feccom)){
			$this->msj='La fecha de Anulación no puede ser menor a la del Compromiso';
		}else {
			Presupuesto::salvarAnuPrecompro($refcom,$fecanu,$desanu);
		}
		sfView::SUCCESS;
	}

	public function setVars() {
		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());

		$this->params[0] = $cpdefniv->getForpre();
  		$this->params[1] = strlen($cpdefniv->getForpre());
  		$this->params[2] = H::getX('TIPCOM','Cpdoccom','Reqaut',$this->cpcompro->getTipcom());
  	}

  	public function saving($clasemodelo) {
  		$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  		return Presupuesto::salvarPrecompro($clasemodelo,$grid);
  	}

  	public function deleting($clasemodelo){
  		return Presupuesto::eliminarPrecompro($clasemodelo);
  	}
}
