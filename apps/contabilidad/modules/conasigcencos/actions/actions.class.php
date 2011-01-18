<?php

/**
 * conasigcencos actions.
 *
 * @package    siga
 * @subpackage conasigcencos
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class conasigcencosActions extends autoconasigcencosActions
{
  protected $codigo = -1;
  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid($this->contabc->getNumcom());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($numcom='')
  {
     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/conasigcencos/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_codetcencos');

     $c = new Criteria();
     $c->add(CodetcencosPeer::NUMCOM,$numcom);
     $detalle = CodetcencosPeer::doSelect($c);     
     if (!$detalle)
     {
         $c = new Criteria();
         $c->add(Contabc1Peer::NUMCOM,$numcom);
         $detalle = Contabc1Peer::doSelect($c);

         $this->columnas[0]->setTabla('Contabc1');
     }    

    
    $obj= array('codcta' => 1, 'descta' => 2);
    $params = array (
            'param1' => "'+$('contabc_numcom').value+'",
            'val2'
    );
    $this->columnas[1][0]->setCatalogo('contabb','sf_admin_edit_form',$obj,'Contabb_Conasigcencos',$params);

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->contabc->setObj($this->obj);
  }


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtextmos = $this->getRequestParameter('cajtxtmos','');
    $iddes = $this->getRequestParameter('ides','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
          $r= new Criteria();
          $r->add(CodefcencosPeer::CODCENCOS,$codigo);
          $reg = CodefcencosPeer::doSelectOne($r);
          if ($reg)
          {
              $dato=$reg->getDescencos();
              $javascript="validarrepetido('$iddes');";
          }else {
             $javascript="alert('El Centro de Costo no existe'); $('$iddes').value=''; $('$iddes').focus();";
          }

         $output = '[["'.$cajtextmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
       break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

    /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->contabc = $this->getContabcOrCreate();
    $this->updateContabcFromRequest();
    $this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err.': '.$this->codigo);
      }
    }
    return sfView::SUCCESS;
  }

  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    $this->codigo =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
     $this->contabc = $this->getContabcOrCreate();
      try{ $this->updateContabcFromRequest();}
      catch (Exception $ex){}
       $this->configGrid($this->contabc->getNumcom());
       $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
       
       $this->coderr=Contabilidad::validarMontoTotalCuenta($grid,&$cod);
       $this->codigo=$cod;

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
    $this->configGrid($this->contabc->getNumcom());
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);   
  }

  public function saving($clasemodelo)
  {

    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    //H::PrintR($grid); exit;
    Contabilidad::salvarAsigCentroCosto($clasemodelo,$grid);
    return -1;
  }

}
