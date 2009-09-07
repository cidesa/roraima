<?php

/**
 * fapresup actions.
 *
 * @package    Roraima
 * @subpackage fapresup
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fapresupActions extends autofapresupActions
{
  public $coderror =-1;

  public function setVars()
  {
    $this->moneda = Herramientas::cargarMoneda();
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->lonart=strlen($this->mascaraarticulo);
	$this->numreg=0;
  }

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fapresup = $this->getFapresupOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      	$this->updateFapresupFromRequest();

        $this->saveFapresup($this->fapresup);

 	    $this->fapresup->setId(Herramientas::getX_vacio('REFPRE','fapresup','id',$this->fapresup->getRefpre()));

		if ($this->coderror!=-1){
			$this->labels = $this->getLabels();
		}
		else{
	        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	        if ($this->getRequestParameter('save_and_add'))
	        {
	          return $this->redirect('fapresup/create');
	        }
	        else if ($this->getRequestParameter('save_and_list'))
	        {
	          return $this->redirect('fapresup/list');
	        }
	        else
	        {
	            return $this->redirect('fapresup/edit?id='.$this->fapresup->getId());
	        }
		}
    }
    else
    {
      $this->labels = $this->getLabels();
    }

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
	$this->configGrid();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid(){
  	$this->configGridDetPre($this->fapresup->getRefpre(),$this->getRequestParameter('fapresup[refpre]'));
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetPre($nropre = '', $refpre='')
  {
    $this->setVars();

  	$c = new Criteria();
  	if ($refpre!='')
  	$c->add(FadetprePeer::REFPRE,$refpre);
  	else
  	$c->add(FadetprePeer::REFPRE,$nropre);
  	$reg = FadetprePeer::doSelect($c);

    if(!$reg) $reg = array();

	$this->fil1=count($reg);

  	$mascara=$this->mascaraarticulo;
  	$lonarti=$this->lonart;

    $this->columns = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fapresup/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fadetpre');
    if ($nropre!='')
    $this->columns[0]->setEliminar(false);
    else
    $this->columns[0]->setEliminar(true);

    $obj= array('codart' => 1, 'desart' => 2);
    $params= array('param1' => $lonarti, 'val2');
    if (($nropre!='')&&($this->fapresup->getRefpre()!='########')){
    	$this->columns[1][0]->setHTML('type="text" size="20" readonly=true');
    	$this->columns[1][3]->setTipo(Columna::MONTO);
    	$this->columns[1][3]->setHTML('type="text" size="20" readonly=true');
	    $this->columns[1][2]->setHTML('readonly=true');
	    $this->columns[1][3]->setHTML('readonly=true');
    	$this->columns[1][5]->setHTML('readonly=true');
    	$this->columns[1][7]->setVacia(true);
    }
    else{
    	$this->columns[1][0]->setHTML('type="text" size="20" maxlength="'.chr(39).$lonarti.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,8);" onBlur="javascript:event.keyCode=13; ajaxarticulos(event,this.id);"');
    	$this->columns[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Fapedido',$params);
	    $this->columns[1][0]->setAjax('fapresup',4,9);
	    $this->columns[1][2]->setHTML('onBlur=Cantidad(this.id);');
	    $this->columns[1][3]->setHTML('onChange=Precio(this.id);');
	    //$this->columns[1][3]->setCombo(FaartpvpPeer::getPrecios());
    	$this->columns[1][5]->setHTML('onBlur=Descuento(this.id);');
    }
	$this->columns[1][1]->setTipo(Columna::TEXTAREA);
	$this->columns[1][1]->setHTML('type="text"  size="25x1" readonly=true');
    $this->columns[1][6]->setEsTotal(true,'fapresup_monpre');

    $this->obj = $this->columns[0]->getConfig($reg);

    $this->fapresup->setObj($this->obj);


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
        $codcli=""; $nompro= ""; $dirpro= ""; $telpro = ""; $javascript="";
       if ($codigo!="")
       {
         $c= new Criteria();
         $c->add(FaclientePeer::RIFPRO,$codigo);
         $reg= FaclientePeer::doSelectOne($c);
         if ($reg)
         {
             $codcli=$reg->getCodpro();
             $nompro=$reg->getNompro();
             $dirpro=$reg->getDirpro();
             $telpro=$reg->getTelpro();
         }
         else
         {
         	$javascript="alert('El Cliente no existe'); $('fapresup_codcli').value='';";
         }
       }
        $output = '[["fapresup_codcli","'.$codcli.'",""],["fapresup_nompro","'.$nompro.'",""],["fapresup_dirpro","'.$dirpro.'",""],["fapresup_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '2':
	      $dateFormat = new sfDateFormat('es_VE');
	      $fec = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));

	      $c = new Criteria();
	      $c->add(TsdesmonPeer::CODMON,$codigo);
	      $c->add(TsdesmonPeer::FECMON,$fec);
	      $resul= TsdesmonPeer::doSelectOne($c);
	      if ($resul)
	      {
	      	$dato=$resul->getValmon();
	      }
	      else
	      {
	      	$sql="Select MAX(VALMON) as valmon,MAX(AUMDIS) as aumdis,MAX(CODMON) as codmon from TSDesMon where codmon='".$this->getRequestParameter('codigo')."'";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	        {
	          $dato=$result[0]['valmon'];
	        }
	        else { $dato=0;}
	      }
		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '3':
        $c= new Criteria();
		$c->add(CaregartPeer::CODART,$codigo);
      	$reg=CaregartPeer::doSelectOne($c);
  		if ($reg)
  		{
	        $dato=$reg->getDesart();
	        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  		}
  		else
  		{
  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
        	 $output = '[["javascript","'.$javascript.'",""]]';
  		}
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '4':
        $c= new Criteria();
        $c->add(FarecargPeer::TIPRGO,'P');
        $this->sql = "codrgo in (select codrgo from farecart where codart = '".$codigo."')";
		$c->add(FarecargPeer::CODRGO,$this->sql,Criteria :: CUSTOM);
      	$reg=FarecargPeer::doSelect($c);
	    $porcrgo=0;
	    foreach ($reg as $sum)
	    {
	        $porcrgo += $sum->getMonrgo();
	    }
        $porcrgo=number_format($porcrgo,2,',','.');

        $output = '[["'.$cajtexmos.'","'.$porcrgo.'",""]]';

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
       break;
      case '5':
        $this->ajaxs='5';
        $this->precios=array();
        $this->precios=FaartpvpPeer::getPrecios($codigo);
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
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->fapresup = $this->getFapresupOrCreate();
      try{ $this->updateFapresupFromRequest();}
      catch (Exception $ex){}

      $this->configGrid();

	  $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

	  $this->numreg=count($grid[0]);

	  if ($this->ValidarDatosVaciosenGrid($grid,&$error))
	       {
	          $this->coderror=$error;
	          return false;
	       }
	   	if ($this->fapresup->getRefpre()!="")
	   	{
	        $c= new Criteria();
	        $c->add(FapresupPeer::REFPRE,$this->fapresup->getRefpre());
	      	$reg=FapresupPeer::doSelectOne($c);

			if ($reg)
			{
				$this->coderror=1113;
	            return false;
			}
			else
			{
	            return true;
			}
	   	}
	   	else
	   	  return true;

    }else return true;
  }

   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }
      if ($codcatvacio)
        return true;
      else
        return false;
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fapresup = $this->getFapresupOrCreate();

    try{
	    $this->updateFapresupFromRequest();
    }

    catch(Exception $ex){}

	$this->configGrid();
  	//$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
      {
	    if($this->coderror!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror);
		   $this->getRequest()->setError('',$err);
		  }
      }
    return sfView::SUCCESS;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  public function saveFapresup($fapresup)
  {
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
     $resp=Facturacion::salvarFapresup($fapresup,$grid);
    if($resp!=-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
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
    return parent::deleting($clasemodelo);
  }


}
