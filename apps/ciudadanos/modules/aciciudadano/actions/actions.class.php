<?php

/**
 * aciciudadano actions.
 *
 * @package    siga
 * @subpackage aciciudadano
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class aciciudadanoActions extends autoaciciudadanoActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $muni = Ciudadanos::getMunicipios($this->getRequestParameter('atciudadano[atestados_id]',''));
    $parr = Ciudadanos::getParroquias($this->getRequestParameter('atciudadano[atmunicipios_id]',''));
//    H::PrintR($muni);
    $this->atciudadano->setMunicipios($muni);
    $this->atciudadano->setParroquias($parr);

    $this->configGrid();

  }

  public function configGrid()
  {

    // Detalle de grupo familiar

    if($this->atciudadano->getId()){

      $c = new Criteria();
      $c->add(AtgrufamPeer::ATCIUDADANO_ID,$this->atciudadano->getId());

      $reg = AtgrufamPeer::doSelect($c);

    }else $reg = Array();

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciciudadano/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atgrufam',$reg);

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

        $this->atciudadano = $this->getAtciudadanoOrCreate($codigo);
        $this->atciudadano->setMunicipios(Ciudadanos::getMunicipios($codigo));

        break;
      case '2':
        $output = '[["","",""],["","",""],["","",""]]';

        $this->atciudadano = $this->getAtciudadanoOrCreate();
        $this->atciudadano->setParroquias(Ciudadanos::getParroquias($codigo));

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
    $this->editing();

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $this->configGrid();

    $gridgrufam = Herramientas::CargarDatosGridv2($this,$this->obj);

    return Ciudadanos::salvarAciciudadano($clasemodelo,$gridgrufam);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
