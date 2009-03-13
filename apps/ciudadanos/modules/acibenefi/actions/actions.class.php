<?php

/**
 * acibenefi actions.
 *
 * @package    siga
 * @subpackage acibenefi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class acibenefiActions extends autoacibenefiActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $muni = Ciudadanos::getMunicipios($this->getRequestParameter('atbenefi[atestados_id]',''));
    $parr = Ciudadanos::getParroquias($this->getRequestParameter('atbenefi[atmunicipios_id]',''));
//    H::PrintR($muni);
    $this->atbenefi->setMunicipios($muni);
    $this->atbenefi->setParroquias($parr);

    $this->configGrid();

  }

  public function configGrid()
  {

    // Detalle de grupo familiar

    if($this->atbenefi->getId()){
      
      $c = new Criteria();
      $c->add(AtgrufamPeer::ATBENEFI_ID,$this->atbenefi->getId());
      
      $reg = AtgrufamPeer::doSelect($c);

    }else $reg = Array();

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/acibenefi/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atgrufam',$reg);

    $this->setFlash('atgrufam', $this->obj);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');

    $ajax = $this->getRequestParameter('ajax','');
    $this->ajax = $ajax;


    switch ($ajax){
      case '1':

        $output = '[["","",""],["","",""],["","",""]]';

        $this->atbenefi = $this->getAtbenefiOrCreate($codigo);
        $this->atbenefi->setMunicipios(Ciudadanos::getMunicipios($codigo));

        break;
      case '2':
        $output = '[["","",""],["","",""],["","",""]]';

        $this->atbenefi = $this->getAtbenefiOrCreate();
        $this->atbenefi->setParroquias(Ciudadanos::getParroquias($codigo));

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }


  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

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

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {    
    $this->configGrid();

    $gridgrufam = Herramientas::CargarDatosGridv2($this,$this->obj);

    return Ciudadanos::salvarAcibenefi($clasemodelo,$gridgrufam);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
