<?php

/**
 * nomdefconsuelaportes actions.
 *
 * @package    siga
 * @subpackage nomdefconsuelaportes
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefconsuelaportesActions extends autonomdefconsuelaportesActions
{

  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridAportes($this->nptipaportes->getCodtipapo());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridAportes($codtipapo='')
  {
    $a= new Criteria();
    $a->add(NpconsuelaporetPeer::CODTIPAPO,$codtipapo);
    $a->add(NpconsuelaporetPeer::TIPO,'A');
    $det= NpconsuelaporetPeer::doSelect($a);   

    $obj = array ('codcon' => 3, 'nomcon' => 4);
    $params = array('param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefconsuelaportes/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_npconsuelaporet');
    $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', $obj, 'Npdefcpt_Nomdefconaportes', $params);
    $this->objeto =$this->columnas[0]->getConfig($det);

    $this->nptipaportes->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');    
    $ajax = $this->getRequestParameter('ajax','');
    $ides = $this->getRequestParameter('ides');
    $cajtxtmos = $this->getRequestParameter('cajtxtmos');
    $javascript="";
    switch ($ajax){
      case '1':
          $c= new Criteria();
          $c->add(NpnominaPeer::CODNOM,$codigo);
          $reg= NpnominaPeer::doSelectOne($c);
          if ($reg)
          {
            $data=$reg->getNomnom();
          }else { $data=""; $javascript="alert('El Codigo de la Nomina no existe'); $('$ides').value=''; $('$ides').focus()";}
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtxtmos.'","'.$data.'",""],["","",""]]';
        break;
      case '2':
          $c= new Criteria();
          $c->add(NpdefcptPeer::CODCON,$codigo);
          $reg= NpdefcptPeer::doSelectOne($c);
          if ($reg)
          {
            if ($this->getRequestParameter('nomina')!=''){
            $d = new Criteria();
            $d->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
            $d->add(NpasiconnomPeer::CODCON,$codigo);
            $resul= NpasiconnomPeer::doSelectOne($c);
            if ($resul)
            {              
              $data=$reg->getNomcon();
              $nomcon=$this->getRequestParameter('nomina').$codigo;
              $fila = split('_', $ides);
              $javascript="validarepetido('$nomcon','$fila[1]');";
            }else{
                $data=""; $javascript="alert_('El C&oacute;digo del Concepto no esta asociado a la N&oacute;mina seleccionada'); $('$ides').value=''; $('$ides').focus()";
            }
            }else {$data=""; $javascript="alert_('Primero debe introducir el C&oacute;digo de la N&oacute;mina');";}
          }else { $data=""; $javascript="alert_('El C&oacute;digo del Concepto no existe'); $('$ides').value=''; $('$ides').focus()";}
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtxtmos.'","'.$data.'",""],["","",""]]';
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
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
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
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

   /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($nptipaportes)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->objeto);
    Nomina::salvarConceptosSueldosAportes($nptipaportes,$grid);
    return -1;

  }

  /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de eliminación adecuado para cada formulario.
   *
   */
  protected function deleting($nptipaportes)
  {
    Nomina::eliminarConceptosSueldosAportes($nptipaportes);
    return -1;

  }


}
