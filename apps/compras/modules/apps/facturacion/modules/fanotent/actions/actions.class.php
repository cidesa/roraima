<?php

/**
 * fanotent actions.
 *
 * @package    Roraima
 * @subpackage fanotent
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fanotentActions extends autofanotentActions
{
  private $coderror1 =-1;

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
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fanotent = $this->getFanotentOrCreate();
    $this->configGrid();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFanotentFromRequest();

      $this->saveFanotent($this->fanotent);

      $this->fanotent->setId(Herramientas::getX_vacio('NRONOT','fanotent','id',$this->fanotent->getNronot()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fanotent/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fanotent/list');
      }
      else
      {
        return $this->redirect('fanotent/edit?id='.$this->fanotent->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid(){
		$this->configGridDetalle($this->getRequestParameter('fanotent[codref]'),$this->getRequestParameter('fanotent[tipref]'));
   }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($codigo='', $tipref='')
  {

   $reg = array();

   if ($this->fanotent->getId() != ''){
     $c= new Criteria();
     $c->add(FaartnotPeer::NRONOT,$this->fanotent->getNronot());
     $reg= FaartnotPeer::doSelect($c);
   }
   else{
	   if (($codigo!="")&&($tipref!=""))
	   {
	   	 if ($tipref=="F"){
	         $c= new Criteria();
	         $c->add(FaartfacPeer::REFFAC,$codigo);
	         $c->addjoin(FaartfacPeer::CODART,CaregartPeer::CODART);
	         $reg= FaartfacPeer::doSelect($c);
	   	 }
	   	 else if ($tipref=="P"){
	         $c= new Criteria();
	         $c->add(FaartpedPeer::NROPED,$codigo);
	         $reg= FaartpedPeer::doSelect($c);
	   	 }
	   }
   }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/fanotent/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_faartnot');
    if ($tipref=="F"){
	    $this->columnas[0]->setTabla('Faartfac');
    }
    else if ($tipref=="P"){
	    $this->columnas[0]->setTabla('Faartped');
    }
    if ($this->fanotent->getId() != ''){
    	$this->columnas[1][0]->setHTML('readonly=true');
    	$this->columnas[1][5]->setHTML('readonly=true');
    }
    else{
    	$objalm= array ('codalm' => '1','nomalm' =>'2');
        $signo="-";
    	$signomas="+";
    	$this->columnas[1][0]->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_Almordrec');
    	$this->columnas[1][0]->setJScript('onBlur=toAjax(6,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signomas.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,2,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());');
    	$this->columnas[1][5]->setHTML('onBlur=Cantidad(this.id);');
    }

    $this->obj = $this->columnas[0]->getConfig($reg);
    $this->fanotent->setObj($this->obj);

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
    $codalm = $this->getRequestParameter('codalm','');
    $codart = $this->getRequestParameter('codart','');
    $canent = $this->getRequestParameter('canent','');
    $cansol = $this->getRequestParameter('cansol','');
    $tipref = $this->getRequestParameter('tipref','');
    $codref = $this->getRequestParameter('codref','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript="";

    switch ($ajax){
      case '1':

        $codcli=""; $rifpro=""; $nompro= ""; $dirpro= ""; $telpro = ""; $javascript="";
       if (($codigo!="")&&($tipref!=""))
       {

       	 if ($tipref=="F"){
	         $c= new Criteria();
	         $c->add(FafacturPeer::REFFAC,$codigo);
	         $reg= FafacturPeer::doSelectOne($c);
	         if ($reg){
				$codcli = $reg->getCodcli();
	         }
	         else{
	         	$javascript = "alert('No existe la Factura de Referencia'); $('fanotent_codref').value='';";
	         }

	         $ci = new Criteria();
	         $ci->add(FaclientePeer::CODPRO,$codcli);
	         $reg= FaclientePeer::doSelectOne($ci);
	         if ($reg){
				$rifpro = $reg->getRifpro();
				$nompro = $reg->getNompro();
				$dirpro = $reg->getDirpro();
				$telpro = $reg->getTelpro();
	         }else {
             	$codcli=""; $rifpro=""; $nompro=""; $dirpro=""; $telpro="";
             }
       	 }
       	 else if ($tipref=="P"){
	         $c= new Criteria();
	         $c->add(FapedidoPeer::NROPED,$codigo);
	         $reg= FapedidoPeer::doSelectOne($c);
	         if ($reg){
				$codcli = $reg->getCodcli();

			    $ci = new Criteria();
			    $ci->add(FaartfacPeer::CODREF,$codigo);
			    $reg= FaartfacPeer::doSelect($ci);
			    if ($reg){
			    	foreach ($reg as $datos){
						$c = new Criteria();
						$c->add(FafacturPeer::REFFAC,$datos->getReffac());
						$c->add(FafacturPeer::TIPREF,'P');
						$c->add(FafacturPeer::STATUS,'A');
						$datos2 = FafacturPeer::doSelect($c);
						if ($datos2){
							$javascript = "alert('El Pedido ya está facturado'); $('fanotent_codref').value='';";
							break;
						}
			    	}
			    }
	         }
	         else{
	         	$javascript = "alert('No existe el Pedido de Referencia'); $('fanotent_codref').value='';";
	         }
             if ($javascript=="")
             {
		         $ci = new Criteria();
		         $ci->add(FaclientePeer::CODPRO,$codcli);
		         $reg= FaclientePeer::doSelectOne($ci);
		         if ($reg){
					$rifpro = $reg->getRifpro();
					$nompro = $reg->getNompro();
					$dirpro = $reg->getDirpro();
					$telpro = $reg->getTelpro();
		         }
             }else {
             	$codcli=""; $rifpro=""; $nompro=""; $dirpro=""; $telpro="";
             }
       	 }
             if ($javascript=="")
             {
	           $this->fanotent = $this->getFanotentOrCreate();
	           $this->configGridDetalle($codigo, $tipref);
             }else{
             	$this->fanotent = $this->getFanotentOrCreate();
	           $this->configGridDetalle();
             }

       }

        $output = '[["fanotent_codcli","'.$codcli.'",""],["fanotent_rifpro","'.$rifpro.'",""],["fanotent_nompro","'.$nompro.'",""],["fanotent_dirpro","'.$dirpro.'",""],["fanotent_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

       break;
      case '2':
        $dato=CadefalmPeer::getDesalmacen($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	return sfView::HEADER_ONLY;
      case '3':
        $dato=FaclientePeer::getNompro($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	return sfView::HEADER_ONLY;

	  case '4':
		if ($codalm == ''){
			$javascript = "alert('Seleccione el Código de Almacén');";
		}
		else{
	        $c= new Criteria();
	        $c->add(CaartalmPeer::CODALM,$codalm);
	        $c->add(CaartalmPeer::CODART,$codart);
	        $reg= CaartalmPeer::doSelectOne($c);
			if ($reg){
				if ($canent > $reg->getExiact()){
		            $javascript = "alert('El Almacén no posee existencia suficiente para la cantidad a Entregar');";
				}
				else{
					$totent = Facturacion::BuscarTotalEntregado($codart, $tipref, $codref);
		        	if ((number_format($cansol) - number_format($totent)) == 0){
		        		$javascript = "alert('El Artículo ha sido entregado en su totalidad');";
		        	}
		        	else if (number_format($canent) > (number_format($cansol) - number_format($totent))){
	            		$javascript = "alert('La Cantidad a Entregar debe ser menor o igual a " . $totent . ", ya que se han entregado');";
		        	}
				}
			}
			else{
	            $javascript = "alert('El Almacén no está asociado para este Artículo');";
			}
		}
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      case '5':
        $dateFormat = new sfDateFormat('es_VE');
	    $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

	    $c= new Criteria();
	    $c->add(FanotentPeer::NRONOT,$this->getRequestParameter('nronot'));
	    $data=FanotentPeer::doSelectOne($c);
	    if ($data)
	    {
	      if ($fecha<$data->getFecnot())
	      {
	      	$msj="alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Nota de Entrega'); $('fanotent_fecanu').value=''";
	      }
	      else { $msj=""; }	    }
	    else  { $msj=""; }
	    $output = '[["javascript","'.$msj.'",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	   case '6':
	    $datos=split('!',$this->getRequestParameter('codigo'));
	  	$codalm=$datos[0];
	  	$codart=$datos[1];
	  	$cajtexmos=$datos[2];
	    $codubi="";
	  	$output = '[["","",""]]';
	  	if ($codart!="")
	  	{
	  		$aux = split('_',$cajtexmos);
			$name=$aux[0];
			$fil=$aux[1];
			$cajtexcom=$name."_".$fil."_3";
			$cajcodalm=$name."_".$fil."_1";
			$cajnomalm=$name."_".$fil."_2";
			$codalm=str_pad($codalm,6,'0',STR_PAD_LEFT);
	  		$c=new Criteria();
		    $c->add(CadefalmPeer::CODALM,$codalm);
		    $datos=CadefalmPeer::doSelectOne($c);
		    if ($datos)
		     {
		       $nomalm=$datos->getNomalm();
		       //busco la primera ubicacion para el almacen seleccionado, para el articulo tipeado
		       $c = new Criteria();
	           $c->add(CaartalmubiPeer::CODALM,$codalm);
	           $c->add(CaartalmubiPeer::CODART,$codart);
	           $alm = CaartalmubiPeer::doSelectOne($c);
	           if (!$alm)
	           {
		    	$javascript="alert('El artículo : ".$codart.", no existe en el Almacén seleccionado: ".$codalm." ');$('".$cajtexmos."').focus()";
		    	$output = '[["'.$cajcodalm.'","",""],["'.$cajnomalm.'","",""],["javascript","'.$javascript.'",""]]';
	           }

		     }
		    else
		    {
		    	$nomalm="";
		    	$javascript="alert('Código del Almacén no existe...')";
		    	$output = '[["javascript","'.$javascript.'",""]]';
		    }// if ($datos)

	  	}

        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

       break;

    }

  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',$this->getRequestParameter('fanotent[codalm]'));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('RIFPRO','Facliente','Rifpro',$this->getRequestParameter('fanotent[rifent]'));
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
      $this->fanotent = $this->getFanotentOrCreate();
      try{ $this->updateFanotentFromRequest();}
      catch (Exception $ex){}
      $this->configGrid();

      if ($this->getRequestParameter('fanotent[codref]')!='')
      {
	   	 if ($this->getRequestParameter('fanotent[tipref]')=="F"){
	         $c= new Criteria();
	         $c->add(FafacturPeer::REFFAC,$this->getRequestParameter('fanotent[codref]'));
	         $reg= FafacturPeer::doSelectOne($c);
	         if ($reg){
		         if ($reg->getStatus() == 'N'){
			      	$this->coderror1=1115;
			        return false;
		         }
		         else if ($reg->getTipref() == 'D'){
			      	$this->coderror1=1116;
			        return false;
		         }
	         }
	   	 }
	   	 else if ($this->getRequestParameter('fanotent[tipref]')=="P"){
	         $c= new Criteria();
	         $c->add(FapedidoPeer::NROPED,$this->getRequestParameter('fanotent[codref]'));
	         $reg= FapedidoPeer::doSelectOne($c);
	         if ($reg){
		         if ($reg->getStatus() == 'N'){
			      	$this->coderror1=1114;
			        return false;
		         }
	         }
	   	 }
      }
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

       if ($this->ValidarDatosVaciosenGrid($grid,&$error))
           {
              $this->coderror1=$error;
              return false;
           }
       else{
       	  $cantconcero = 0;
	      $x=$grid[0];
	      $j=0;
	      while ($j<count($x))
	      {
		       if ( $x[$j]->getCodart()!="")
		       {
		        $c= new Criteria();
		        $c->add(CaartalmPeer::CODALM,$x[$j]->getCodalm());
		        $c->add(CaartalmPeer::CODART,$x[$j]->getCodart());
		        $reg= CaartalmPeer::doSelectOne($c);
				if ($reg){
					if ($x[$j]->getCanent() > 0){
						if ($x[$j]->getCanent() > $reg->getExiact()){
				            $this->coderror1=1119;
				            return false;
						}
						else{
							$totent = Facturacion::BuscarTotalEntregado($x[$j]->getCodart(), $this->getRequestParameter('fanotent[tipref]'), $this->getRequestParameter('fanotent[codref]'));
				        	if ((H::toFloat($x[$j]->getCansol()) - H::toFloat($totent)) == 0){
					            $this->coderror1=1121;
					            return false;
				        	}
				        	else if (H::toFloat($x[$j]->getCanent()) > (H::toFloat($x[$j]->getCansol()) - H::toFloat($totent))){
					            $this->coderror1=1122;
					            return false;
				        	}
						}
					}
					else{
						$cantconcero = $cantconcero + 1;
					}
				}
				else{
		            $this->coderror1=1120;
		            return false;
				}
		       }
		       $j++;
	      }
	      if (count($x) == $cantconcero){
            $this->coderror1=1135;
            return false;
	      }


       }
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
    $this->fanotent = $this->getFanotentOrCreate();

    try{
	    $this->updateFanotentFromRequest();
    }

    catch(Exception $ex){}

    $this->labels = $this->getLabels();
    $this->configGrid();
	if($this->getRequest()->getMethod() == sfRequest::POST){
	    if($this->coderror1!=-1)
		  {
		   $err = Herramientas::obtenerMensajeError($this->coderror1);
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

    //$grid = Herramientas::CargarDatosGridV2($this,$this->obj);

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
  public function saveFanotent($fanotent)
  {
  	if ($this->fanotent->getId() == ''){
	  	 $this->fanotent->setReapor($this->getUser()->getAttribute('loguse',null));
	     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
	     $resp=Facturacion::salvarFafanot($fanotent,$grid,$this->getUser()->getAttribute('loguse',null));
	    if($resp!=-1){
	      $this->coderror1 = $resp;
	      $err = Herramientas::obtenerMensajeError($this->coderror);
	      $this->getRequest()->setError('',$err);
	    }
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

    public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $nronot=$this->getRequestParameter('nronot');
   $fecped=$this->getRequestParameter('fecnot');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecped, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(FanotentPeer::NRONOT,$nronot);
   $c->add(FanotentPeer::FECNOT,$fec);
   $this->fanotent = FanotentPeer::doSelectOne($c);
   sfView::SUCCESS;
   }

  public function executeSalvaranu()
  {
    $nronot=$this->getRequestParameter('nronot');
    $fecanu=$this->getRequestParameter('fecanu');
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
    $this->msg="";
    $c= new Criteria();
    $c->add(FanotentPeer::NRONOT,$nronot);
    $resul= FanotentPeer::doSelectOne($c);
    if ($resul)
    {
      $resul->setFecanu($fec);
      $resul->setStatus('N');
      $resul->save();
    }
    return sfView::SUCCESS;
  }

}
