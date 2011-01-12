<?php

/**
 * formodmonart actions.
 *
 * @package    siga
 * @subpackage formodmonart
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class formodmonartActions extends autoformodmonartActions
{
  public function executeIndex()
  {
    return $this->forward('formodmonart', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $long=strlen(Herramientas::ObtenerFormato('Cadefart','Forart'));
    $c= new Criteria();
    $this->sql="length(codart)='".$long."'";
    $c->add(ForregartPeer::CODART,$this->sql,Criteria::CUSTOM);
    $c->addAscendingOrderByColumn(ForregartPeer::DESART);
    $reg=ForregartPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formodmonart/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_articulos');

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->forregart->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js="";

    switch ($ajax){
      case '1':
       // $filacos = $this->getRequestParameter('filacos');
        //$ecuacion = $this->getRequestParameter('ecuacion');
        //$total=$ecuacion;
        //$ecuacion=Nomina::posfix($total);

        $js="";
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Formulacion::grabarModificarMontos($grid);
    return -1;
  }

}
