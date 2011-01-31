<?php

/**
 * almusuuni actions.
 *
 * @package    siga
 * @subpackage almusuuni
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almusuuniActions extends autoalmusuuniActions
{

  public function executeIndex()
  {
    return $this->redirect('almusuuni/edit');
  }

  public function editing()
  {
    $this->usuarios->setLoncat(strlen(Herramientas::getObtener_FormatoCategoria()));
    $this->usuarios->setMascaracat(Herramientas::getObtener_FormatoCategoria());
    $this->configGrid($this->getRequestParameter('usuarios[loguse]'));
  }

  public function configGrid($codusu="")
  {
    $c = new Criteria();
    $c->add(CausuuniPeer::LOGUSE,$codusu);
    $detalle = CausuuniPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almusuuni/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_categorias');

    $loncat=$this->usuarios->getLoncat();
    $mascara=$this->usuarios->getMascaracat();

    $obj= array('codcat' => 1, 'nomcat' => 2);
    $params= array('param1' => $loncat, 'val2');
    $this->columnas[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$loncat.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);" onBlur="javascript:event.keyCode=13; ajaxcategorias(event,this.id);"');
    $this->columnas[1][0]->setCatalogo('Npcatpre','sf_admin_edit_form',$obj,'Npcatpre2_Almsolegr',$params);

    $this->grid =$this->columnas[0]->getConfig($detalle);

    $this->usuarios->setGrid($this->grid);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $cajtextmos = $this->getRequestParameter('cajtextmos','');
    $cajtextcom = $this->getRequestParameter('cajtextcom','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        $this->usuarios = $this->getUsuariosOrCreate();
	  	$this->updateUsuariosFromRequest();
	  	$this->params=array();
	  	$this->labels = $this->getLabels();
	  	$this->usuarios->setLoncat(strlen(Herramientas::getObtener_FormatoCategoria()));
        $this->usuarios->setMascaracat(Herramientas::getObtener_FormatoCategoria());
        $p= new Criteria();
        $p->add(UsuariosPeer::LOGUSE,$codigo);
        $reg= UsuariosPeer::doSelectOne($p);
        if ($reg)
        {
        	$dato=$reg->getNomuse();
        	$this->configGrid($codigo);
        }else {
        	$javascript="alert('El Usuario no Existe');";
        	$this->configGrid();
        }

        $output = '[["javascript","'.$javascript.'",""],["'.$cajtextmos.'","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $l= new Criteria();
        $l->add(NpcatprePeer::CODCAT,$codigo);
        $reg= NpcatprePeer::doSelectOne($l);
        if ($reg)
        {
        	$dato=$reg->getNomcat();
        }else{
          $javascript="alert('El C&oacute;digo no Existe'); $('$cajtextcom').value=''; $('$cajtextcom').focus();";
        }

        $output = '[["javascript","'.$javascript.'",""],["'.$cajtextmos.'","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
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

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridV2($this,$this->grid);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridV2($this,$this->grid);
  	Compras::salvarUnidadesUsuari($clasemodelo,$grid);
    return -1;
  }

}
