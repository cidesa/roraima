<?php

/**
 * almaprsolegr actions.
 *
 * @package    Roraima
 * @subpackage almaprsolegr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almaprsolegrActions extends autoalmaprsolegrActions
{
  public function executeIndex()
  {
    return $this->forward('almaprsolegr', 'edit');
  }

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

	$this->configGrid();
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
    $this->regelim = $regelim;
    $this->nometiact="";
	$this->aprobpresu="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almaprsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('nometiact',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
	       {
	       	$this->nometiact=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['nometiact'];
	       }
		   if(array_key_exists('aprobpresu',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
	       {
	       	$this->aprobpresu=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['aprobpresu'];
	       }
	     }

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
    $aprob=H::getX('CODEMP','Cadefart','Solreqapr','001');	
    	$c = new Criteria();
		if ($this->aprobpresu=='S' && $aprob=='S'){
	    	$c->add(CasolartPeer::STAREQ,'A');
	        $sql = "(casolart.APRREQ<>'S' or casolart.APRREQ isnull) and casolart.reqart not in (select refprc from cpprecom)";
	        $c->add(CasolartPeer::APRREQ, $sql, Criteria :: CUSTOM);			
		}
		else if ($this->aprobpresu=='S'){
	        $sql = "casolart.STAREQ='A' and casolart.reqart not in (select refprc from cpprecom)";
	        $c->add(CasolartPeer::STAREQ, $sql, Criteria :: CUSTOM);
		}else {
	    	$c->add(CasolartPeer::STAREQ,'A');			
	        $sql = "(casolart.APRREQ<>'S' or casolart.APRREQ isnull)";
	        $c->add(CasolartPeer::APRREQ, $sql, Criteria :: CUSTOM);			
		}
    	$c->addAscendingOrderByColumn(CasolartPeer::REQART);
    	$c->addAscendingOrderByColumn(CasolartPeer::FECREQ);
    	$reg = CasolartPeer::doSelect($c);

       $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almaprsolegr/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_casolart');

	    if ($this->nometiact!="") $this->columnas[1][0]->setTitulo('Aprobación Presidencia');
            $this->columnas[1][1]->setHTML('type="text" size="10" readOnly=true onBlur="javascript:event.keyCode=13; ajaxmostrardetalle(event,this.id);"');

	    $this->obj =$this->columnas[0]->getConfig($reg);

        $this->casolart->setObj($this->obj);
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
	$this->sol="";
	$this->art="";
	$this->codp="";
	$this->rec="";

    if($this->getRequest()->getMethod() == sfRequest::POST){
	      $this->casolart = $this->getCasolartOrCreate();
	      try{ $this->updateCasolartFromRequest();}
	      catch (Exception $ex){}
		  $this->configGrid();
		  
	  if ($this->aprobpresu=='S')
	  {
          $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	      $x=$grid[0];
	      $i=0;
		  	while ($i<count($x))
			{
			  if ($x[$i]->getCheck()=='1')
			  {
				  $r= new Criteria();
				  $r->add(CasolartPeer::REQART,$x[$i]->getReqart());
				  $solegreso= CasolartPeer::doSelectOne($r);
				  if ($solegreso){
			  	    SolicituddeEgresos::verificarDispGenComp($solegreso,&$msj1,&$cod1,&$msj2,&$cod2,&$cod3,&$msj3);
				    if ($msj3!=-1)
                                    {
                                     $this->coderr=142;
                                       break;
                                    }
					if ($msj1!=-1)
					{
				       $this->coderr=152; $this->sol=$x[$i]->getReqart(); $this->art=$cod1; $this->codp=$cod3;
					   break;
					}
					if ($msj2!=-1)
					{
				       $this->coderr=$msj2; $this->rec=$cod2;
					   break;
					}
				  }
			  }
			  $i++;			  
			}
		  }
	      
	  
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->casolart->getObj());
    $login=$this->getUser()->getAttribute('loguse');
    $coderr = SolicituddeEgresos::salvarAlmaprsolegr($clasemodelo,$grid,$login,	$this->aprobpresu);

    return $coderr;
  }

  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->casolart = $this->getCasolartOrCreate();
    $this->updateCasolartFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
		if ($this->coderr==152)
        $this->getRequest()->setError('',$err. ' Solicitud N°: '.$this->sol.' Articulo: '.$this->art.' Códido Presup: '.$this->codp);
        elseif ($this->coderr==142)
           $this->getRequest()->setError('',$err);
        else $this->getRequest()->setError('',$err.' '.$this->rec);
      }
    }
    return sfView::SUCCESS;
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
    $javascript="";
    switch ($ajax){
      case '1':
        $this->formulario=array();
        $this->i="";
        $i=0;
        $form="sf_admin/almaprsolegr/almdetsol";
        $f[$i]=$form.$i;
        $this->getUser()->setAttribute('refsol',$codigo,$f[$i]);
        $this->formulario=$f;
        $this->i=$i;

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


}
