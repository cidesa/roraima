<?php

/**
 * almsalalm actions.
 *
 * @package    Roraima
 * @subpackage almsalalm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almsalalmActions extends autoalmsalalmActions
{
  private $coderror =-1;

  protected function getCasalalmOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $casalalm = new Casalalm();
    }
    else
    {
      $casalalm = CasalalmPeer::retrieveByPk($this->getRequestParameter($id));
      $this->forward404Unless($casalalm);
    }

    return $casalalm;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->casalalm = $this->getCasalalmOrCreate();
    $this->setVars();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCasalalmFromRequest();

      if ($this->saveCasalalm($this->casalalm)==-1)
      {
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('almsalalm/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('almsalalm/list');
	      }
	      else
	      {
	        return $this->redirect('almsalalm/edit?id='.$this->casalalm->getId());
	      }
      }//if ($this->saveCasalalm($this->casalalm)==-1)
     else
	 {
          $this->labels = $this->getLabels();
       	  if($this->coderror!=-1)
	      {
	       $err = Herramientas::obtenerMensajeError($this->coderror);
	       $this->getRequest()->setError('',$err);
	      }
          return sfView::SUCCESS;
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
  protected function saveCasalalm($casalalm)
  {
    if ($casalalm->getId())
        $griddet=array();
   else
        $griddet=Herramientas::CargarDatosGrid($this,$this->obj);

	$coderr=Almacen::salvarAlmsalalm($casalalm,$griddet);
	$this->coderror=$coderr;
	return $coderr;
  }

  protected function deleteCasalalm($casalalm)
  {
    Almacen::eliminarAlmsalalm($casalalm);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCasalalmFromRequest()
  {
    $casalalm = $this->getRequestParameter('casalalm');

    if (isset($casalalm['codsal']))
    {
      $this->casalalm->setCodsal($casalalm['codsal']);
    }
    if (isset($casalalm['fecsal']))
    {
      if ($casalalm['fecsal'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($casalalm['fecsal']))
          {
            $value = $dateFormat->format($casalalm['fecsal'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $casalalm['fecsal'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->casalalm->setFecsal($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->casalalm->setFecsal(null);
      }
    }
    if (isset($casalalm['codalm']))
    {
      $this->casalalm->setCodalm($casalalm['codalm']);
    }
    if (isset($casalalm['nomalm']))
    {
      $this->casalalm->setNomalm($casalalm['nomalm']);
    }
    if (isset($casalalm['rifpro']))
    {
      $this->casalalm->setRifpro($casalalm['rifpro']);
      $this->casalalm->setCodpro(Herramientas::getX_vacio('rifpro','caprovee','codpro',$casalalm['rifpro']));
    }

    if (isset($casalalm['nompro']))
    {
      $this->casalalm->setNompro($casalalm['nompro']);
    }
    if (isset($casalalm['dessal']))
    {
      $this->casalalm->setDessal($casalalm['dessal']);
    }
    if (isset($casalalm['tipmov']))
    {
      $this->casalalm->setTipmov($casalalm['tipmov']);
    }
    if (isset($casalalm['destipsal']))
    {
      $this->casalalm->setDestipsal($casalalm['destipsal']);
    }
    if (isset($casalalm['monsal']))
    {
      $this->casalalm->setMonsal($casalalm['monsal']);
    }
    if (isset($casalalm['codubi']))
    {
      $this->casalalm->setCodubi($casalalm['codubi']);
    }
    if (isset($casalalm['observ']))
    {
      $this->casalalm->setObserv($casalalm['observ']);
    }


    $this->casalalm->setStasal('A');
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
   $cajtexcom=$this->getRequestParameter('cajtexcom');
   if ($this->getRequestParameter('ajax')=='1')
   {
    $datos=split('!',$this->getRequestParameter('codigo'));
  	$codalm=$datos[0];
  	$codart=$datos[1];
  	$cajtexmos=$datos[2];
    $codubi="";
  	$output = '[["","",""]]';
  	if ($codart=="")
  	{
     $javascript="alert('Debe primero seleccionar el artículo');";
     $output = '[["javascript","'.$javascript.'",""]]';
  	}
  	else//articulo viene informado
  	{
  		$aux = split('_',$cajtexmos);
		$name=$aux[0];
		$fil=$aux[1];
		$cajtexcom=$name."_".$fil."_6";
		$cajcodubi=$name."_".$fil."_8";
		$cajnomubi=$name."_".$fil."_9";
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
           $c->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
           $alm = CaartalmubiPeer::doSelectOne($c);
           if ($alm)
           {
             	$codubi=$alm->getCodubi();
             	$nomubi=CadefubiPeer::getDesubicacion($codubi);
             	$output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajtexcom.'","6","c"],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""]]';
           }
           else//el almacen seleccionado no existe para el articulo introducido por el usuario
           {
	    	$javascript="alert('El articulo : ".$codart.", no existe en el Almacen seleccionado: ".$codalm." ');$('".$cajtexmos."').focus()";
	    	$output = '[["'.$cajtexmos.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
           }

	     }
	    else
	    {
	    	$nomalm="";
	    	$javascript="alert('Codigo del Almacen no existe...')";
	    	$output = '[["'.$cajtexmos.'","'.$nomalm.'",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
	    }// if ($datos)

  	}
  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='2')
   {
     $dato=CaproveePeer::getNompro($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='3')
   {
   	 $cod=str_pad($this->getRequestParameter('codigo'),3,'0',STR_PAD_LEFT);
     $dato=CatipsalPeer::getDestipo($cod);
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
   else  if ($this->getRequestParameter('ajax')=='4')
   {
     $dato=CaregartPeer::getDesart($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  else if ($this->getRequestParameter('ajax')=='5')
	{
	  	$datos=split('!',$this->getRequestParameter('codigo'));
	   	$codubi=$datos[0];
	  	$codalm=$datos[1];
	  	$codart=$datos[2];
	  	$cajtexmos=$datos[3];
	  	$output = '[["","",""]]';
	  	if ($codart=="")
	  	{
	     $javascript="alert('Debe primero seleccionar el artículo');";
	     $output = '[["javascript","'.$javascript.'",""]]';
	  	}
	  	else
	  	{
	  		$aux = split('_',$cajtexmos);
			$name=$aux[0];
			$fil=$aux[1];
			$cajcodubi=$name."_".$fil."_8";
			$cajnomubi=$name."_".$fil."_9";
			if (trim($codalm)!="")
	        {
               $c = new Criteria();
	           $c->add(CaartalmubiPeer::CODALM,$codalm);
	           $c->add(CaartalmubiPeer::CODUBI,$codubi);
	           $c->add(CaartalmubiPeer::CODART,$codart);
	           $alm = CaartalmubiPeer::doSelectOne($c);
           	   if ($alm)
           	   {
           	   		$dato=CadefubiPeer::getDesubicacion($codubi);
           	   		$javascript="";
           	   }
              else
              {
                  $javascript="alert('La ubicacion : ".$codubi.", no existe para el almacen seleccionado: ".$codalm." y el articulo ".$codart." ')";
                  $dato="";
                  $codubi="";
              }
            $output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
	      }
	      else
	      {
	      	$javascript="alert('Primero debe seleccionar un Almacen...');";
	      	$dato="";
	      	$codubi="";
  			$output = '[["'.$cajnomubi.'","'.$dato.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["javascript","'.$javascript.'",""]]';
	      }

	  	}
  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
   }
  else if ($this->getRequestParameter('ajax')=='6')
  {
    $datos=split('!',$this->getRequestParameter('codigo'));
  	$codart=$datos[0];
  	$cajtexmos=$datos[1];
    $codalm="";
    $codubi="";
  	$output = '[["","",""]]';
  	if ($codart!="")
  	{
  		$aux = split('_',$cajtexmos);
		$name=$aux[0];
		$fil=$aux[1];
		$cajtexcom=$name."_".$fil."_1";
		$cajcodalm=$name."_".$fil."_6";
		$cajnomalm=$name."_".$fil."_7";
		$cajcodubi=$name."_".$fil."_8";
		$cajnomubi=$name."_".$fil."_9";
  		$c=new Criteria();
	    $c->add(CaregartPeer::CODART,$codart);
	    $datos=CaregartPeer::doSelectOne($c);
	    if ($datos)
	     {
	       $desart=$datos->getDesart();
	       //busco el primer almacen y la primera ubicacion para el articulo seleccionado
	       $c = new Criteria();
           $c->add(CaartalmubiPeer::CODART,$codart);
           $c->addAscendingOrderByColumn(CaartalmubiPeer::CODALM);
           $alm = CaartalmubiPeer::doSelectOne($c);
           if ($alm)
           {
             	$codalm=$alm->getCodalm();
             	$nomalm=CadefalmPeer::getDesalmacen($codalm);
             	$codubi=$alm->getCodubi();
             	$nomubi=CadefubiPeer::getDesubicacion($codubi);
             	$output = '[["'.$cajtexmos.'","'.$desart.'",""],["'.$cajnomalm.'","'.$nomalm.'",""],["'.$cajcodalm.'","'.$codalm.'",""],["'.$cajcodubi.'","'.$codubi.'",""],["'.$cajnomubi.'","'.$nomubi.'",""]]';
           }
           else//el almacen seleccionado no existe para el articulo introducido por el usuario
           {
	    	$javascript="alert('El articulo : ".$codart.", no esta asociado a ningún almacen')";
	    	$output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
           }

	     }
	    else
	    {
	    	$nomalm="";
	    	$javascript="alert('Codigo del Articulo no existe...')";
	    	$output = '[["'.$cajtexmos.'","",""],["'.$cajnomalm.'","",""],["'.$cajcodalm.'","",""],["'.$cajcodubi.'","",""],["'.$cajnomubi.'","",""],["'.$cajtexcom.'","",""],["javascript","'.$javascript.'",""]]';
	    }// if ($datos)

  	}//if ($codart!="")
  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;

  }else  if ($this->getRequestParameter('ajax')=='7')
   {
     $dato=CaramartPeer::getDesramo($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','codalm',$this->getRequestParameter('casalalm[codalm]'));
    }
    else  if ($this->getRequestParameter('ajax')=='2')
    {
      $this->tags=Herramientas::autocompleteAjax('RIFPRO','Caprovee','rifpro',$this->getRequestParameter('casalalm[rifpro]'));
	}
	else  if ($this->getRequestParameter('ajax')=='3')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODTIPSAL','Catipsal','codtipsal',$this->getRequestParameter('casalalm[tipmov]'));
    }
	else  if ($this->getRequestParameter('ajax')=='4')
	{
	  $this->tags=Herramientas::autocompleteAjax('RAMART','Caramart','ramart',$this->getRequestParameter('casalalm[ramart]'));
    }

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
    $c = new Criteria();
    $c->add(CadetsalPeer::CODSAL,$this->casalalm->getCodsal());
    $c->addAscendingOrderByColumn(CadetsalPeer::CODART);
    $per = CadetsalPeer::doSelect($c);

	$mascaraarticulo=$this->mascaraarticulo;
    $lonart=$this->longart;

	$opciones = new OpcionesGrid();
	if ($this->casalalm->getId())
	   $opciones->setEliminar(false);
	else
	   $opciones->setEliminar(true);

    $opciones->setTabla('Cadetsal');
    $opciones->setAnchoGrid(1100);
    $opciones->setAncho(1200);
    $opciones->setName('b');
    $opciones->setTitulo('Detalle de la Salida');
    $opciones->setHTMLTotalFilas(' ');
    if ($this->casalalm->getId()){
       $opciones->setFilas(0);
    }else{
    	$opciones->setFilas(100);
    }

    $col1 = new Columna('Código Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codart');
    if ($this->casalalm->getId())
    {
    	$col1->setHTML('type="text"  size="15"  readonly=true');
    }
    else
    {
    	$signo="+";
	    $col1->setCatalogo('Caregart','sf_admin_edit_form', array('codart'=> 1, 'desart'=> 2),'Caregart_Almentalm');
	    $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(6,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signo.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
	    $col1->setHTML('type="text" size="15"  maxlength="'.chr(39).$lonart.chr(39).'"');
    }

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desart');
    $col2->setHTML('type="text" size="20x2" readonly=true');


    $col3 = new Columna('Cantidad');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setEsNumerico(true);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setNombreCampo('cantot');
    if ($this->casalalm->getId())
    {
    	$col3->setHTML('type="text" size="8" readonly=true');
    }
    else
    {
    	$col3->setHTML('type="text" size="8" ');
    	$col3->setJScript('onKeypress="canttotal(event,this.id)"');
    }


    $col4 = clone $col3;
    $col4->setTitulo('Costo');
    $col4->setNombreCampo('cosart');
    if ($this->casalalm->getId())
    {
    	$col4->setHTML('readonly=true');
    }
    else
    {
        $col4->setJScript('onKeypress="canttotal(event,this.id)"');
    }

    $col5 = clone $col3;
    $col5->setTitulo('Total');
    $col5->setNombreCampo('totart');
    $col5->setHTML('type="text" size="8" readonly=true');
	if ($this->casalalm->getId())
    {
    	$col5->setHTML('readonly=true');
    }
    else
    {
        $col5->setEsTotal(true,'casalalm_monsal');
    }

    $objalm= array ('codalm' => '6','nomalm' =>'7');
	$col6 = new Columna('Codigo del Almacen');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('codalm');
    if ($this->casalalm->getId())
    {
        $col6->setHTML('type="text" size="8" maxlength="6" readonly=true');
    }
    else
    {
	    $col6->setHTML('type="text" size="8" maxlength="6"');
	    $col6->setCatalogo('Cadefalm','sf_admin_edit_form',$objalm,'Cadelfalm_Almordrec');
        $signo="-";
    	$signomas="+";
	    $col6->setJScript('onBlur="toAjax(1,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,5,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
    }



    $col7 = new Columna('Nombre Almacén');
	$col7->setTipo(Columna::TEXTAREA);
	$col7->setEsGrabable(true);
	$col7->setNombreCampo('nomalm');
	$col7->setAlineacionObjeto(Columna::CENTRO);
	$col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setHTML('type="text" size="15x1" readonly=true');

    $objubi= array ('codubi' => '8','nomubi' =>'9');
    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $col8 = new Columna('Codigo de Ubicacion');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('codubi');
    if ($this->casalalm->getId())
    {
	    $col8->setHTML('type="text" size="8" readonly=true');
    }
    else
    {   $signo="-";
    	$signomas="+";
	    $col8->setHTML('type="text" size="8" maxlength="'.chr(39).$this->lonubi.chr(39).'"');
	    $col8->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);
	    $col8->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaraubi.chr(39).')"  onBlur="toAjax(5,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+$(obtenerColumna(this.id,7,'.chr(39).$signo.chr(39).')).value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signomas.chr(39).'),devuelveParVacios(),devuelveParVacios());"');
    }

    $col9 = new Columna('Nombre Ubicación');
	$col9->setTipo(Columna::TEXTAREA);
	$col9->setEsGrabable(true);
	$col9->setNombreCampo('nomubi');
	$col9->setAlineacionObjeto(Columna::CENTRO);
	$col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setHTML('type="text" size="8x1" readonly=true');



    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $this->obj = $opciones->getConfig($per);

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
		    $this->casalalm = $this->getCasalalmOrCreate();
        	try{
			$this->updateCasalalmFromRequest();
			}catch(Exception $ex){}
		    $this->setVars();
		    $this->configGrid();
		    $grid=Herramientas::CargarDatosGrid($this,$this->obj);


           if (!$this->casalalm->getId())
           {

			    	//verificar en el grid de articulos que todos los articulos pertenezcan al almacen y ubicacion indicada
			    	//y verificar que al menos un articulo del grid tenga cantidad mayo que cero.
			    	  $x=$grid[0];
				      $j=0;
				      $msg="";
				      $h=0;
				      $encontro=false;
				      while ($j<count($x))
				      {
				       if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" )
				      	 {
				      	 	$msg="Debe indicar el Código del Almacén, la Ubicación de todos los Artículos del Detalle de la Salida";
				      	 	$this->getRequest()->setError('',$msg);
			 				return false;
				      	 }// if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="")
				      	 if ($x[$j]->getCantot()>0)
				      	 {
				      	  $encontro=true;
				          if (!Despachos::verificaexisydisp($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),H::toFloat($x[$j]->getCantot()),&$msg))
		                  {
							$this->getRequest()->setError('',$msg);
			 				return false;
		                  }
				      	 }//if ($x[$j]->getCantot()>0)
				      	 else
				      	 {
				      		$this->getRequest()->setError('',"La cantidad a registrar para la salida del artículo debe ser mayor que cero...");
			 				return false;
				      	 }//else if ($x[$j]->getCantot()>0)
				         $j++;
				      } //while ($j<count($x))
                       if (!$encontro)
	                   {
	                   	$mierr = Herramientas::obtenerMensajeError('160');
	                    $this->getRequest()->setError('',$mierr);
				 		return false;
	                   }
	                   return true;
           }//if (!$this->casalalm->getId())
           else return true;
   }else return true;
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
    $this->casalalm = $this->getCasalalmOrCreate();


	try{
		$this->updateCasalalmFromRequest();
		}catch(Exception $ex){}

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


   public function setVars()
  {
     $this->mascaraarticulo = Herramientas::ObtenerFormato('Cadefart','Forart');
     $this->longart=strlen($this->mascaraarticulo);
     $this->mascaraubi= Herramientas::ObtenerFormato('Cadefart','Forubi');
     $this->lonubi=strlen($this->mascaraubi);
  }


}
