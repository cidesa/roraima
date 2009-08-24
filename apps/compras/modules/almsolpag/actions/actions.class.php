<?php

/**
 * almsolpag actions.
 *
 * @package    siga
 * @subpackage almsolpag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almsolpagActions extends autoalmsolpagActions
{
  public function editing()
  {
  	$this->setVars();
  	$this->configGrid();
  }

  public function configGrid()
  {
  	$this->configGridDetalle($this->casolpag->getSolpag(),$this->casolpag->getId());
  }

  public function configGridDetalle($solpag='', $nuevo='')
  {
    $c = new Criteria();
    $c->add(CadetpagPeer::SOLPAG,$solpag);
    $detalle = CadetpagPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almsolpag/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cadetpag');

    $lonpre=$this->casolpag->getLonpre();
    $mascara=$this->casolpag->getMascarapre();
    $obj= array('codpre' => 1, 'nompre' => 2);
    $params= array('param1' => $lonpre, 'val2');
    if ($nuevo=='')
    {
	    $this->columnas[1][0]->setHTML('type="text" size="25" maxlength="'.chr(39).$lonpre.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,3);" onBlur="javascript:event.keyCode=13; ajaxcodigospre(event,this.id);"');
	    $this->columnas[1][0]->setCatalogo('cpdeftit','sf_admin_edit_form',$obj,'Cpdeftit_Almregrgo',$params);
	    $this->columnas[1][2]->setHTML(' size="10" onBlur="javascript: obj=this; ValidarMontoGridv2(obj); event.keyCode=13; disponibilidad(event,this.id)"');
    }
    $this->columnas[1][2]->setEsTotal(true,'casolpag_monsol');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->casolpag->setObjeto($this->objeto);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        $c= new Criteria();
        $c->add(CpdoccomPeer::TIPCOM,$codigo);
        $result= CpdoccomPeer::doSelectOne($c);
        if ($result)
        {
          $dato=$result->getNomext();
        }else $javascript="alert('El tipo de Compromiso no existe'); $('casolpag_tipcom').value='';";

        $output = '[["casolpag_nomext","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '2':
        $c= new Criteria();
        $c->add(OpbenefiPeer::CEDRIF,$codigo);
        $result= OpbenefiPeer::doSelectOne($c);
        if ($result)
        {
          $dato=$result->getNomben();
        }else $javascript="alert('El Beneficiario no existe'); $('casolpag_cedrif').value='';";

        $output = '[["casolpag_nomben","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '3':
        $c= new Criteria();
	    $c->add(CpdeftitPeer::CODPRE,$codigo);
	    $data=CpdeftitPeer::doSelectOne($c);
	    if ($data)
	    {
          if (strlen($codigo)!=strlen(Herramientas::formatoPresupuesto()))
		  {
		  	$javascript="alert('El Código Presupuestario no es de ultimo nivel'); $('$cajtexcom').value='';";
		  }else
		  {
		  	$c= new Criteria();
		    $c->add(CpasiiniPeer::PERPRE,'00');
		    $c->add(CpasiiniPeer::CODPRE,$codigo);
		    $data2=CpasiiniPeer::doSelectOne($c);
		    if ($data2)
		    {
              $dato=$data->getNompre();
		    }else $javascript="alert('El Código Presupuestario no tiene Asignación Inicial'); $('$cajtexcom').value='';";
		  }
	    }else $javascript="alert('El Código Presupuestario no existe'); $('$cajtexcom').value='';";

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
        break;
      case '4':
        $fila=$this->getRequestParameter('fila');
	    $monto=Herramientas::toFloat($this->getRequestParameter('monto'));
	    $letra=$this->getRequestParameter('letra');
	    $afecta=1;
	    $idmonto=$this->getRequestParameter('idmonto');
	    OrdendePago::montoValido($fila,$monto, $letra, $codigo,$afecta,&$msj,&$mondis,&$sobregiro);
        if ($msj=='511')
        {
        	$javascript="alert('Monto Introducido debe ser menor al Monto Disponible que es:  $mondis'); $('$idmonto').value=''; ActualizarSaldosGrid('a',new Array('casolpag_monsol'));";
        }else if ($msj=='512')
        {
        	$javascript="alert('El Titulo Presupuestario no tiene Asignacion Inicial'); $('$idmonto').value=''; ActualizarSaldosGrid('a',new Array('casolpag_monsol'));";
        }
	    $output = '[["javascript","'.$javascript.'",""]]';
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

  protected function saving($casolpag)
  {
  	if ($casolpag->getId())
  	{
  	  $casolpag->save();
  	}else {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->objeto);
    Compras::salvarSolicitudPago($casolpag,$grid);
  	}
    return -1;

  }

  protected function deleting($casolpag)
  {
  	Compras::eliminarSolicitudPago($casolpag);
    return -1;

  }
  public function setVars()
  {
    $mascara=Herramientas::formatoPresupuesto();
    $this->casolpag->setMascarapre($mascara);
    $this->casolpag->setLonpre(strlen($mascara));
  }

}
