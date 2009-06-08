<?php

/**
 * tsrelasiord actions.
 *
 * @package    siga
 * @subpackage tsrelasiord
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tsrelasiordActions extends autotsrelasiordActions
{

  public function executeIndex()
  {
    return $this->forward('tsrelasiord', 'edit');
  }

  public function editing()
  {
    $this->setVars();
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridCuentas();
  }

  public function configGridCuentas()
  {
    $c = new Criteria();
    $detalle = TsrelasiordPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tsrelasiord/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cuentas');

    $loncta=$this->tsrelasiord->getLoncta();
    $mascara=$this->tsrelasiord->getMascaracta();
    $obj= array('codcta' => 1, 'descta' => 2);
    $obj2= array('codcta' => 3, 'descta' => 4);
    $params= array('param1' => $loncta, 'val2');
    $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$loncta.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);" onBlur="javascript:event.keyCode=13; ajaxcuentas(event,this.id);"');
    $this->columnas[1][0]->setCatalogo('contabb','sf_admin_edit_form',$obj,'Contabb_Pagemiord',$params);
    $this->columnas[1][2]->setHTML('type="text" size="17" maxlength="'.chr(39).$loncta.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,4);" onBlur="javascript:event.keyCode=13; ajaxcuentas2(event,this.id);"');
    $this->columnas[1][2]->setCatalogo('contabb','sf_admin_edit_form',$obj2,'Contabb_Pagemiord',$params);

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->tsrelasiord->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript="";

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(ContabbPeer::CODCTA,$codigo);
        $registro= ContabbPeer::doSelectOne($c);
        if ($registro)
        {
        	if ($registro->getCargab()=='C')
        	{
               $dato=$registro->getDescta();
        	}else $javascript="alert('La Cuenta Contable no es Cargable');";
        }
        else
         $javascript="alert('La Cuenta Contable no Existe');";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
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
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function setVars()
  {
    $mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $loncta=strlen($mascara);

    $this->tsrelasiord->setMascaracta($mascara);
    $this->tsrelasiord->setLoncta($loncta);
  }

 protected function saving($tsrelasiord)
 {
   $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
   Tesoreria::salvarRelaciones($tsrelasiord,$grid);
    return -1;
 }


}
