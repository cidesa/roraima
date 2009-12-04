<?php

/**
 * preejeglo actions.
 *
 * @package    Roraima
 * @subpackage preejeglo
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class preejegloActions extends autopreejegloActions {

	public function executeIndex() {
  		return $this->redirect('preejeglo/edit');
  	}

	public function editing() {
  		$this->setVars();
  		$this->configGrid(Presupuesto::generarMovimientos());
  	}

	public function configGrid($arreglo=array()) {

   		$this->obj = H::getConfigGrid('grid_cpasiini_edit',$arreglo);
   		$this->cpdeftit->setObj($this->obj);
   	}

  	public function executeAjax() {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
        $perpre = $this->getRequestParameter('perpre');
        $this->params=array();
        $this->cpdeftit = $this->getCpdeftitOrCreate();
        $this->labels = $this->getLabels();
		$movs=Presupuesto::generarMovimientos();
		Presupuesto::arregloPreejeglo($codigo,$perpre,&$movs,&$dismon,&$dispor,&$msj);
		if ($msj==''){
			$this->configGrid($movs);
			$javascript="";

		}else{
			$this->configGrid($movs);
			$javascript="alert('$msj')";
		}
		$output = '[["cpdeftit_dismon","'.$dismon.'",""],["cpdeftit_dispor","'.$dispor.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

	public function setVars() {
		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());
  		$this->params[0] = $cpdefniv->getForpre();
  		$this->params[1] = strlen($cpdefniv->getForpre());
  	}

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
