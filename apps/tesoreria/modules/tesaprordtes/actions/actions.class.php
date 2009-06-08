<?php

/**
 * tesaprordtes actions.
 *
 * @package    siga
 * @subpackage tesaprordtes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesaprordtesActions extends autotesaprordtesActions
{
  public function executeIndex()
  {
    return $this->forward('tesaprordtes', 'edit');
  }

  public function editing()
  {
    $this->configGrid();
    $this->opordpag->setFilasord($this->filas);
  }


  public function configGrid()
  {
    $this->configGridOrdenes();
  }

  public function configGridOrdenes()
  {
    $c = new Criteria();
    $c->add(OpordpagPeer::STATUS,'N');
    $c->add(OpordpagPeer::APROBADOORD,'A');
    $c->add(OpordpagPeer::NUMCHE,null);
    $detalle = OpordpagPeer::doSelect($c);

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesaprordtes/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordenes');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
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

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

  protected function saving($opordpag)
 {
   $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
   OrdendePago::aprobarOrdenesTes($opordpag,$grid);
   return -1;
 }

}
