<?php

/**
 * Facdefdprinm actions.
 *
 * @package    siga
 * @subpackage Facdefdprinm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacdefdprinmActions extends autoFacdefdprinmActions
{
  public function executeIndex()
  {
    return $this->forward('facdefdprinm', 'edit');
  }

  public function editing()
  {
		$this->configGrid();
  }

  public function configGrid($anovig='', $reg = array(),$regelim = array())
  {
    $c = new Criteria();
    if ($this->fcdprinm->getAnovig()!='')
    	$c->add(FcdprinmPeer::ANOVIG,$this->fcdprinm->getAnovig());
    else
    	$c->add(FcdprinmPeer::ANOVIG,$anovig);
   	$c->addAscendingOrderByColumn(FcdprinmPeer::ANTINM);
    //$c->setLimit(10);
    $per = FcdprinmPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdefdprinm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[1][1]->setCombo(self::ListaEstadosin());
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcdprinm->setGrid($this->grid);
  }

  public function ListaEstadosin()
  {
    $c = new Criteria();
    $lista = FcestinmPeer::doSelect($c);

    $estadosinm = array();
    foreach($lista as $obj_estados)
    {
      $estadosinm += array($obj_estados->getCodestinm() => $obj_estados->getDesestinm());
    }
    return $estadosinm;
  }

  public function executeAjax()
  {
    $anovig = $this->getRequestParameter('codigo','');
    $ajax   = $this->getRequestParameter('ajax','');

    switch ($ajax){
      case '1':
		//$anoini = substr(Herramientas::getX('codemp','cpdefniv','fecini','001'),0,4);
        $this->fcdprinm  =  $this->getFcdprinmOrCreate();
        $this->params=array();
        $this->labels = $this->getLabels();
		$this->configGrid($anovig);
		$output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($fcdprinm)
  {
    //$fcdprinm->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Facdefdprinm($fcdprinm, $grid);
	return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
