<?php

/**
 * nomdefhcmnom actions.
 *
 * @package    siga
 * @subpackage nomdefhcmnom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefhcmnomActions extends autonomdefhcmnomActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
   $this->configGrid($this->npnomina->getCodnom());

  }

  /**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codnom='')
  {
     $c = new Criteria();
     $c->add(NpporhcmPeer::CODNOM,$codnom);
     $detalle = NpporhcmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefhcmnom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_npporhcm');

     $this->columnas[1][0]->setCombo(array(''=>'Seleccione...','B'=>'BÃ¡sica','A'=>'Adicional','S'=>'Secundario'));
     $this->columnas[1][5]->setCombo(Constantes::PagoDoble());

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->npnomina->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtxtmos = $this->getRequestParameter('cajtxtmos','');
    $iddes = $this->getRequestParameter('ides','');

    switch ($ajax){
      case '1':
          $r= new Criteria();
          $r->add(NptipparPeer::TIPPAR,$codigo);
          $reg = NptipparPeer::doSelectOne($r);
          if ($reg)
          {
              $dato=$reg->getDespar(); $javascript="";
          }else {
             $javascript="alert('El Tipo de Pariente no existe'); $('$iddes').value=''; $('$iddes').focus();";
          }
         $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
    $this->configGrid($this->npnomina->getCodnom());
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
     Nomina::salvarDefHcmNom($clasemodelo,$grid);
    return -1;
  }
}
