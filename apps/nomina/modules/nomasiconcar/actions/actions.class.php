<?php

/**
 * nomasiconcar actions.
 *
 * @package    siga
 * @subpackage nomasiconcar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomasiconcarActions extends autonomasiconcarActions
{
  public function executeIndex()
  {
    return $this->redirect('nomasiconcar/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($codcar='')
  {
    $c = new Criteria();
    $c->add(NpasiconcarPeer::CODCAR,$codcar);
    $detalle = NpasiconcarPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomasiconcar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_conceptos');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->npasiconcar->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtxtmos = $this->getRequestParameter('cajtxtmos','');
    $cajtxtcom = $this->getRequestParameter('cajtxtcom','');
    $javascript=""; $dato="";
    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(NpcargosPeer::CODCAR,$codigo);
        $reg= NpcargosPeer::doSelectOne($t);
        if ($reg)
        {
          $dato=$reg->getNomcar();          
        }else {
          $javascript="alert('El Cargo no Existe'); $('npasiconcar_codcar').value=''; $('npasiconcar_codcar').focus();";
        }
        $this->params=array();
        $this->npasiconcar = $this->getNpasiconcarOrCreate();
        $this->labels = $this->getLabels();
        $this->configGrid($codigo);
        
        $output = '[["npasiconcar_nomcar","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $t= new Criteria();
        $t->add(NpdefcptPeer::CODCON,$codigo);
        $reg= NpdefcptPeer::doSelectOne($t);
        if ($reg)
        {
          $dato=$reg->getNomcon();
        }else {
          $javascript="alert('El Concepto no Existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
        }
        $output = '[["'.$cajtxtmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }


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
     $this->npasiconcar = $this->getNpasiconcarOrCreate();
      $this->updateNpasiconcarFromRequest();
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      if(count($grid[0])<1)
      {
        $this->coderr=4;
      }

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
    Nomina::grabarAsignacionConceptosCargos($clasemodelo,$grid);
    return -1;
  }

}
