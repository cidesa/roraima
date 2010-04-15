<?php

/**
 * nomdefespconsue actions.
 *
 * @package    Roraima
 * @subpackage nomdefespconsue
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespconsueActions extends autonomdefespconsueActions
{
  public function executeIndex()
  {
  	return $this->redirect('nomdefespconsue/edit');
  }

  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
  	$this->npasiconsue->setTippres(Nomina::getPrestamo());
    $this->configGrid();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $this->configGridSueldoCompensacion();
    $this->configGridSalarioIntegral();
    $this->configGridSueldoReportes();
    $this->configGridARC();
    if($this->getRequest()->getMethod() == sfRequest::POST){
    $this->configGridCASEP($this->getRequestParameter('npasiconsue[tippres]'));}
    else { $this->configGridCASEP($this->npasiconsue->getTippres()); }
    $this->configGridConstancia();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridSueldoCompensacion()
  {
  	$sql="select a.codnom as codnom, a.nomnom as nomnom, b.codcon as codcon, c.nomcon as nomcon, b.codcom as codcom, c.nomcon as nomcon2, 9 as id  from npnomina a left outer join npasiconsue b on a.codnom=b.codnom left outer join npdefcpt c on b.codcon=c.codcon order by a.codnom,b.codcon";
    Herramientas :: BuscarDatos($sql, & $result);
    $reg1=$result;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespconsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_sueldocompensacion');
    $this->columnas[1][2]->setAjax('nomdefespconsue',1,4);
    $this->columnas[1][4]->setAjax('nomdefespconsue',1,6);
    $this->obj1 =$this->columnas[0]->getConfig($reg1);

    $this->npasiconsue->setObj1($this->obj1);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridSalarioIntegral()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(NpconsalintPeer::CODNOM);
    $c->addAscendingOrderByColumn(NpconsalintPeer::CODCON);
    $reg2 = NpconsalintPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespconsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_salariointegral');

	$params = array (
			'param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",
			'val2'
		);

    $objs=array('codcon' => 3, 'nomcon' => 4);
    $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', $objs, 'Npdefcpt_Nomdefespconsue', $params);
    $this->columnas[1][2]->setHTML('type="text" size=5 maxlength=3 onBlur="javascript:event.keyCode=13; ajaxconcepto(event,this.id);"');
    $this->columnas[1][0]->setAjax('nomdefespconsue',2,2);
    $this->obj2 =$this->columnas[0]->getConfig($reg2);

    $this->npasiconsue->setObj2($this->obj2);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridSueldoReportes()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(NpconsueldoPeer::CODNOM);
    $c->addAscendingOrderByColumn(NpconsueldoPeer::CODCON);
    $reg3 = NpconsueldoPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespconsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_sueldoreportes');

    $params = array (
			'param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",
			'val2'
		);
    $objs=array('codcon' => 3, 'nomcon' => 4);
    $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', $objs, 'Npdefcpt_Nomdefespconsue', $params);
    $this->columnas[1][2]->setHTML('type="text" size=5 maxlength=3 onBlur="javascript:event.keyCode=13; ajaxconcepto(event,this.id);"');
    $this->columnas[1][0]->setAjax('nomdefespconsue',2,2);

    $this->obj3 =$this->columnas[0]->getConfig($reg3);

    $this->npasiconsue->setObj3($this->obj3);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridARC()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(NpconarcPeer::CODNOM);
    $c->addAscendingOrderByColumn(NpconarcPeer::CODCON);
    $reg4 = NpconarcPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespconsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_arc');

    $params = array (
			'param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",
			'val2'
		);
    $objs=array('codcon' => 3, 'nomcon' => 4);
    $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', $objs, 'Npdefcpt_Nomdefespconsue', $params);
    $this->columnas[1][2]->setHTML('type="text" size=5 maxlength=3 onBlur="javascript:event.keyCode=13; ajaxconcepto(event,this.id);"');
    $this->columnas[1][0]->setAjax('nomdefespconsue',2,2);

    $this->obj4 =$this->columnas[0]->getConfig($reg4);

    $this->npasiconsue->setObj4($this->obj4);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCASEP($tipo='')
  {
    $c = new Criteria();
    $c->add(NpdefconcasepPeer::TIPO,$tipo);
    $c->addAscendingOrderByColumn(NpdefconcasepPeer::CODNOM);
    $c->addAscendingOrderByColumn(NpdefconcasepPeer::CODCON);
    $reg5 = NpdefconcasepPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespconsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_casep');
    $params = array (
			'param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",
			'val2'
		);
    $objs=array('codcon' => 3, 'nomcon' => 4);
    $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', $objs, 'Npdefcpt_Nomdefespconsue', $params);
    $this->columnas[1][2]->setHTML('type="text" size=5 maxlength=3 onBlur="javascript:event.keyCode=13; ajaxconcepto(event,this.id);"');
    $this->columnas[1][0]->setAjax('nomdefespconsue',2,2);
    $this->obj5 =$this->columnas[0]->getConfig($reg5);

    $this->npasiconsue->setObj5($this->obj5);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridConstancia()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(NpcontraPeer::CODNOM);
    $c->addAscendingOrderByColumn(NpcontraPeer::CODCON);
    $reg6 = NpcontraPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomdefespconsue/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_constancia');

    $params = array (
			'param1' => "'+$(this.id).up().previous(1).descendants()[0].value+'",
			'val2'
		);
    $objs=array('codcon' => 3, 'nomcon' => 4);
    $this->columnas[1][2]->setCatalogo('npdefcpt', 'sf_admin_edit_form', $objs, 'Npdefcpt_Nomdefespconsue', $params);
    $this->columnas[1][2]->setHTML('type="text" size=5 maxlength=3 onBlur="javascript:event.keyCode=13; ajaxconcepto(event,this.id);"');
    $this->columnas[1][0]->setAjax('nomdefespconsue',2,2);
    $this->columnas[1][4]->setCombo(Constantes::PagoDoble());
    $this->columnas[1][5]->setCombo(Constantes::TipoBono());
    $this->obj6 =$this->columnas[0]->getConfig($reg6);

    $this->npasiconsue->setObj6($this->obj6);
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        if ($codigo!="")
        {
          $t= new Criteria();
          $t->add(NpdefcptPeer::CODCON,$codigo);
          $resultado= NpdefcptPeer::doSelectOne($t);
          if ($resultado)
          {
            $dato=$resultado->getNomcon();
          }else {
          	$javascript="alert('El Concepto no existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
          }
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
        if ($codigo!="")
        {
          $t= new Criteria();
          $t->add(NpnominaPeer::CODNOM,$codigo);
          $resultado= NpnominaPeer::doSelectOne($t);
          if ($resultado)
          {
            $dato=$resultado->getNomnom();
          }else {
          	$javascript="alert('El Tipo de Nómina no existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
          }
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
         return sfView::HEADER_ONLY;
        break;
      case '3':
         $nomina=$this->getRequestParameter('nomina');
        $t= new Criteria();
        $t->add(NpdefcptPeer::CODCON,$codigo);
        $datos= NpdefcptPeer::doSelectOne($t);
        if ($datos)
        {
          	$c = new Criteria();
            $c->add(NpasiconnomPeer::CODNOM,$nomina);
            $c->add(NpasiconnomPeer::CODCON,$codigo);
            $resul= NpasiconnomPeer::doSelectOne($c);
            if ($resul)
            {
              $dato=NpdefcptPeer::getDescon($codigo);
            }
            else $javascript="alert('El Tipo de Concepto no esta asociado a la nomina -> $nomina'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
         }
         else $javascript="alert('El Código de Concepto no Existe'); $('$cajtexcom').value=''; $('$cajtexmos').value=''; $('$cajtexcom').focus();";
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->npasiconsue = $this->getNpasiconsueOrCreate();
        $this->configGridCASEP($codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }
  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
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

  public function updateError()
  {
    $this->configGrid();
    $grid1=Herramientas::CargarDatosGridv2($this,$this->obj1,true);
    $grid2=Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid5=Herramientas::CargarDatosGridv2($this,$this->obj5);
    $grid6=Herramientas::CargarDatosGridv2($this,$this->obj6);
  }

  protected function saving($npasiconsue)
  {
    $grid1=Herramientas::CargarDatosGridv2($this,$this->obj1,true);
    $grid2=Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3=Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid5=Herramientas::CargarDatosGridv2($this,$this->obj5);
    $grid6=Herramientas::CargarDatosGridv2($this,$this->obj6);
    Nomina::salvarConceptosReportes($npasiconsue,$grid1,$grid2,$grid3,$grid4,$grid5,$grid6);
    return -1;

  }
}
