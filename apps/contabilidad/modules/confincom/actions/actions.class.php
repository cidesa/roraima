<?php

/**
 * confincom actions.
 *
 * @package    Roraima
 * @subpackage confincom
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 37178 2010-03-18 20:32:40Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class confincomActions extends autoconfincomActions
{

  // Para incluir funcionalidades al executeEdit()
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
  	$err = Contabilidad::verificarCierre();
	if ($err!=-1) {
		$err = Herramientas::obtenerMensajeError($err);
       	$this->getRequest()->setError('',$err);
	}
    $this->configGrid();
    $this->setVars();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
  	if ($this->contabc->getId()!='')
  	{
  	  $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$this->contabc->getNumcom());
      $c->add(Contabc1Peer::FECCOM,$this->contabc->getFeccom());
      $c->addDescendingOrderByColumn(Contabc1Peer::DEBCRE);
      $c->addAscendingOrderByColumn(Contabc1Peer::NUMCOM);
      $c->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $c->addAscendingOrderByColumn(Contabc1Peer::NUMASI);
      $reg = Contabc1Peer::doSelect($c);
  	} 
      $mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
      $loncta=strlen($mascara);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/confincom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_contabc1');
     $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$loncta.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,3);" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&idcaja=\'+this.id);"');

     $this->obj =$this->columnas[0]->getConfig($reg);

    $this->params =array('grid'=>$this->obj);
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
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':      	  
      	$numcom=$codigo;
      	$feccom = $this->getRequestParameter('feccom','');
      	$status = $this->getRequestParameter('status','');
      	$dateFormat = new sfDateFormat('es_VE');
    	$fecha = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
    	$mesj = $status=='A' ? 'ACTUALIZADO' : ($status=='D' ? 'DIFERIDO' : '') ;
    	$mesj2 = $status=='A' ? 'DIFERIDO' : ($status=='D' ? 'ANULADO' : '') ;
    	$js="alert('El Estatus de Comprobante es $mesj y se cambiara su estatus a $mesj2');";

    	$c = new Criteria();
      	$c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
    	$c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
    	$per = Contaba1Peer::doSelectOne($c);
    	if($per)
    		if($per->getStatus()=='A')
    		{
    			$status=='A' ? $stacom='D' : $stacom='N';    			
    			$c = new Criteria();
      			$c->add(ContabcPeer::NUMCOM,$numcom);
      			$c->add(ContabcPeer::FECCOM,$fecha);
      			$objper = ContabcPeer::doSelectOne($c);
      			if($objper)
      			{
      				$objper->setStacom($stacom);
      				$objper->save();
      				
      				$js.="alert('Se ha Realizado la operación con Existo.........');";
      			}      				
      			else
      				$js.="alert('No se pudo realizar la operacion del Comprobante');";
    		}    		
    		else
    			$js.="alert('El Periodo se Encuentra Cerrado no se puede realizar la operación');";
    	
    	else
    		$js.="alert('Comprobante fuera del Periodo Fiscal');";
      	$js.="window.location.reload();";
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        break;      
      case '2':
        $idcaja = $this->getRequestParameter('idcaja','');
        $auxid= split("_", $idcaja);

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$codigo);
        $per = ContabbPeer::doSelectOne($c);
        if($per)
        {
           if ($per->getCargab()=='C')
           {
             $dato=$per->getDescta();
           }else {
               $javascript="alert('La Cuenta Contable no es Cargable'); $('$idcaja').value=''; $('$idcaja').focus();";
           }
        }else {
          $javascript="alert('La Cuenta Contable no existe'); $('$idcaja').value=''; $('$idcaja').focus();";
        }

        $output = '[["'.$auxid[0].'_'.$auxid[1].'_2","'.$dato.'",""],["javascript","'.$javascript.'",""],["","",""]]';
       break;
      case '3':
        $idcaja = $this->getRequestParameter('ides','');
        $javascript="actualizarDiferencia('$idcaja');";
        $output = '[["javascript","'.$javascript.'",""]]';
       break;
      default:
      	$js="";
      	$status = $this->getRequestParameter('status','');
      	$numcom = $this->getRequestParameter('contabc[numcom]','');
      	$feccom = $this->getRequestParameter('contabc[feccom]','');
      	$dateFormat = new sfDateFormat('es_VE');
    	$fecha = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
      	
      	$c = new Criteria();
      	$c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
    	$c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
    	$per = Contaba1Peer::doSelectOne($c);
    	if($per)
      		if($status=='D' && $per->getStatus()=='A')
      		{
      			$c = new Criteria();
      			$c->add(ContabcPeer::NUMCOM,$numcom);
      			$c->add(ContabcPeer::FECCOM,$fecha);
      			$objper = ContabcPeer::doSelectOne($c);
      			
      			if($objper)
      			{
      				$objper->setStacom('A');
      				$objper->save();
      				$js="alert('Comprobante Actualizado.............');";
      			}      				
      			else
      				$js="alert('No se pudo Actualizar el Comprobante');";
      			
      		}elseif($status!='D')
      		    	$js="alert('No se puede Actualizar, Comprobante no Diferido');";
      		    else
      		    	$js="alert('No se puede Actualizar, Periodo Cerrado');";     		    
      	else	
        	$js="alert('Comprobante fuera del Periodo Fiscal');";
        	
        $js.="window.location.reload();";
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
  }

  /*/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');

    $codcta = $grid[$fila][1];
    //$monimp = $grid[$fila][2];

    $c = new Criteria();
    $c->add(Contabc1Peer::CODCTA,$codcta);
    $reg = Contabc1Peer::doSelectOne($c);

    if(!$reg) {
      $grid[$fila][5] = H::FormatoMonto($grid[$fila][5]);
      // enviar mensaje
    }else {
      if($reg[0][3]=='D') {
      	$grid[$fila][5]=H::FormatoMonto('');
        //$mondis = H::Monto_disponible($codpre);
      }else {
        if($reg[0][3]=='C') {
          $grid[$fila][4]=H::FormatoMonto('');
        }
      }
    }

    $output = Herramientas::grid_to_json($grid,$name);

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
	public function validateEdit() {
		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST) {
			$this->coderr = Contabilidad::verificarCierre();
			if ($this->coderr==-1) {
				
			      $this->contabc = $this->getContabcOrCreate();
			      $this->updateContabcFromRequest();
			      $this->configGrid();
			      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
			      
			      if($this->contabc->getId()=='')
			      {
			      	  //validar q el numcom no exista en CONTABC
				      $c= new Criteria();
				      $c->add(ContabcPeer::NUMCOM,$this->getRequestParameter('contabc[numcom]'));
				      $datos = ContabcPeer::doSelectOne($c);
				      if ($datos)
				      {
				 		$this->coderr=196;
				        return false;
				      }	
			      }
			
			      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('contabc[feccom]'))==true)
			      {
			        $this->coderr=529;
			        return false;
			      }
			
			      if ($this->getRequestParameter('contabc[totdeb]')!=$this->getRequestParameter('contabc[totcre]'))
			      {
			      	$this->coderr=519;
			      	return false;
			      }
			
			      if ($this->getRequestParameter('contabc[totdeb]')=='0,00' || $this->getRequestParameter('contabc[totcre]')=='0,00')
			      {
			      	$this->coderr=536;
			      	return false;
			      }			
			      			      
			      if (count($grid[0])==0)
			      {
			        $this->coderr=520;
			        return false;
			      }
			      else
			      {
			      	if($grid[0][0]->getCodcta()=='')
			      	{
			      		$this->coderr=550;
			      		return false;
			      	}
			        if(floatval($grid[0][0]->getMondebito())==0 && floatval($grid[0][0]->getMoncredito())==0)
			      	{
			      		$this->coderr=551;
			      		return false;
			      	}
			        if(floatval($grid[0][0]->getMondebito())>0 && floatval($grid[0][0]->getMoncredito())>0)
			      	{
			      		$this->coderr=551;
			      		return false;
			      	}
			      	if (!Tesoreria::validarComprobanteDescuadrado($grid))
			      	{
			      	  $this->coderr=519;
			      	  return false;
			      	}
			        if (!Tesoreria::validarCuentasGrid($grid))
			      	{
			      	  $this->coderr=549;
			      	  return false;
			      	}
			      }			
			      return true;

			}
      		if($this->coderr!=-1) {
	    		return false;
	  		} else return true;

     	} else return true;
	}

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);
  }

  public function setVars() {
	$contaba = ContabaPeer::doSelectOne(new Criteria());

	$this->params[0] = $contaba->getForcta();
	$this->params[1] = strlen($contaba->getForcta());
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);  	
        if ($clasemodelo->getNumcom()=='########'){
           $numcom = Comprobante::Buscar_Correlativo();
           $clasemodelo->setNumcom($numcom);
        }
    return Comprobante::salvarConfincomnew($clasemodelo,$grid);
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
  	$this->coderr = Comprobante::validarEliminarConfincom($clasemodelo);
	if ($this->coderr!=-1) {
		 return Comprobante::eliminarConfincom($clasemodelo);
	}
	else {
		$err = Herramientas::obtenerMensajeError($err);
       	$this->getRequest()->setError('',$err);
	}
  }
}
