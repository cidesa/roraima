<?php

/**
 * fadevolu actions.
 *
 * @package    Roraima
 * @subpackage fadevolu
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fadevoluActions extends autofadevoluActions
{
  private $coderror =-1;

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fadevolu = $this->getFadevoluOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFadevoluFromRequest();

      $this->saveFadevolu($this->fadevolu);

      $this->fadevolu->setId(Herramientas::getX_vacio('NRODEV','fadevolu','id',$this->fadevolu->getNrodev()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fadevolu/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fadevolu/list');
      }
      else
      {
        return $this->redirect('fadevolu/edit?id='.$this->fadevolu->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  protected function getFadevoluOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $fadevolu = new Fadevolu();
      $this->configGridDetalle('', $this->getRequestParameter('fadevolu[refdes]'));
    }
    else
    {
      $fadevolu = FadevoluPeer::retrieveByPk($this->getRequestParameter($id));
	  $this->configGridDetalle($fadevolu->getNrodev(),'');
      $this->forward404Unless($fadevolu);

    }

    return $fadevolu;
  }

/*
  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  /*protected function updateFadevoluFromRequest()
  {
    $fadevolu = $this->getRequestParameter('fadevolu');


    if (isset($fadevolu['nrodev']))
    {
      $this->fadevolu->setNrodev($fadevolu['nrodev']);
    }
    if (isset($fadevolu['fecdev']))
    {
      if ($fadevolu['fecdev'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fadevolu['fecdev']))
          {
            $value = $dateFormat->format($fadevolu['fecdev'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fadevolu['fecdev'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fadevolu->setFecdev($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fadevolu->setFecdev(null);
      }
    }
    if (isset($fadevolu['codalm']))
    {
      $this->fadevolu->setCodalm($fadevolu['codalm']);
    }
    if (isset($fadevolu['nomalm']))
    {
      $this->fadevolu->setNomalm($fadevolu['nomalm']);
    }
    if (isset($fadevolu['refdes']))
    {
      $this->fadevolu->setRefdes($fadevolu['refdes']);
    }
    if (isset($fadevolu['desdev']))
    {
      $this->fadevolu->setDesreq($fadevolu['desdev']);
    }


    if (isset($fadevolu['rifpro']))
    {
      $this->fadevolu->setRifpro($fadevolu['rifpro']);
    }
    if (isset($fadevolu['nompro']))
    {
      $this->fadevolu->setNompro($fadevolu['nompro']);
    }
    if (isset($fadevolu['dirpro']))
    {
      $this->fadevolu->setDirpro($fadevolu['dirpro']);
    }
    if (isset($fadevolu['telpro']))
    {
      $this->fadevolu->setTelpro($fadevolu['telpro']);
    }
    if (isset($fadevolu['fatipdev_id']))
    {
      $this->fadevolu->setFatipdevId($fadevolu['fatipdev_id']);
    }

  }
*/

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('REQART','Cadphart','reqart',$this->getRequestParameter('fadevolu[refdes]'));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',$this->getRequestParameter('fadevolu[codalm]'));
      }
  }

  public function executeGrid(){
  	$javascript = '';
	if ($this->getRequestParameter('codigo')!=""){
		if ($this->getRequestParameter('ajax')=='1'){
			$codpro = '';
			$rifpro = '';
			$nompro = '';
			$dirpro = '';
			$telpro = '';

            $codigo=str_pad($this->getRequestParameter('codigo'), 8 , '0','STR_PAD_LEFT');
            $c = new Criteria();
      		$c->add(CadphartPeer::DPHART,$codigo);
      		$datos = CadphartPeer::doSelectOne($c);
      		if ($datos)
      		{
      			if ($datos->getStadph() == 'A'){
	      			$codpro = $datos->getCodcli();
			  		if ($codpro != ''){
			  			$c2 = new Criteria();
			  			$c2->add(FaclientePeer::CODPRO, $codpro);
			  			$reg2 = FaclientePeer::doSelectOne($c2);
			  			if ($reg2){
							$rifpro = $reg2->getRifpro();
							$nompro = $reg2->getNompro();
							$dirpro = $reg2->getDirpro();
							$telpro = $reg2->getTelpro();

			  			}

			  		}
			  		$this->configGridDetalle('', $codigo);

		            $output = '[["fadevolu_codpro","'.$codpro.'",""],["fadevolu_rifpro","'.$rifpro.'",""],["fadevolu_nompro","'.$nompro.'",""],["fadevolu_dirpro","'.$dirpro.'",""],["fadevolu_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""]]';
		         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		            //return sfView::HEADER_ONLY;
      			}
      			else{
	                $javascript = "alert('No puede hacer Devoluciones sobre un Despacho Anulado');";
			        $output = '[["javascript","'.$javascript.'",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      			}
      		}
      		else
      		{//no existe el despacho
                $javascript = "alert('El número de despacho no existe');";
		        $output = '[["javascript","'.$javascript.'",""]]';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        $this->configGrid();

      		}


		}

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
	$this->configGridDetalle($this->getRequestParameter('fadevolu[nrodev]'), $this->getRequestParameter('fadevolu[refdes]'));
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($nrodev = '', $codigo='')
  {

	   $reg = array();

	   if ($codigo!="")
	   {
         $c= new Criteria();
         $c->add(CaartdphPeer::DPHART,$codigo);
         $reg= CaartdphPeer::doSelect($c);
	   }
	   else{
	   	 if ($nrodev != ''){
		     $c= new Criteria();
		     $c->add(FaartdevPeer::NRODEV,$nrodev);
		     $reg= FaartdevPeer::doSelect($c);
	   	 }
	   }

	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(false);
	    if ($codigo!=""){
		    $opciones->setTabla('Caartdph');
	    }
        else{
        	$opciones->setTabla('Faartdev');
        }
        $opciones->setAnchoGrid(1400);
        $opciones->setAncho(1400);
        $opciones->setTitulo('Detalle de la Devolución');
        $opciones->setName('a');
        $opciones->setFilas(0);
        $opciones->setHTMLTotalFilas(' ');

        // Se generan las columnas
        $col1 = new Columna('Código del Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="10" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col7 = clone $col2;
        $col7->setTipo(Columna::TEXTO);
        $col7->setTitulo('U. Medida');
        $col7->setNombreCampo('unimed');
        $col7->setHTML('type="text" size="20" readonly=true');

        $col3 = new Columna('Cant. Desp');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       // $col3->setNombreCampo('canreq');
        if ($codigo!="")
		   $col3->setNombreCampo('candph');
        else
           $col3->setNombreCampo('candes');
        $col3->setEsNumerico(true);
        $col3->setHTML('type="text" size="10" readonly=true');
        //$col3->setJScript('onKeypress="cantdespachada(event,this.id)"');

        $col4 = clone $col3;
        $col4->setTitulo('Cant. Dev');
        //$col4->setNombreCampo('canrec');
		$col4->setNombreCampo('candev');
        $col4->setHTML('type="text" size="10"');
        $col4->setJScript('');
        $col4->setHTML('onBlur=Cantidad(this.id);');
        //$col4->setEsTotal(true,'totalcantnd');

        $col5 = clone $col3;
        $col5->setTitulo('Costo');
        $col5->setNombreCampo('preart');
        $col5->setHTML('type="text" size="10" readonly=true');
        $col5->setJScript('');
        //$col5->setEsTotal(true,'cadphart_mondph');
        //$col5->setEsTotal(true,'totalcosto');

        $col6 = clone $col3;
        $col6->setTitulo('Total');
        if ($codigo!="")
        	$col6->setNombreCampo('montot');
        else
        	$col6->setNombreCampo('totart');
        $col6->setHTML('type="text" size="10" readonly=true');
        $col6->setJScript('');
        $col6->setEsTotal(true,'fadevolu_mondev');
        //$col5->setEsTotal(true,'totalcosto');

        $col7 = new Columna('Código del Almacen');
        $col7->setTipo(Columna::TEXTO);
        $col7->setEsGrabable(true);
        $col7->setAlineacionObjeto(Columna::CENTRO);
        $col7->setAlineacionContenido(Columna::CENTRO);
        $col7->setNombreCampo('codalm');
        $col7->setHTML('type="text" size="10" readonly=true');
        $col7->setOculta(true);

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($reg);

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
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
        $dato=CadefalmPeer::getDesalmacen($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	return sfView::HEADER_ONLY;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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
      $this->fadevolu = $this->getFadevoluOrCreate();
      try{ $this->updateFadevoluFromRequest();}
      catch (Exception $ex){}

	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
      	if ($x[$j]->getCandev()>0){
	         $c= new Criteria();
	         $c->add(CaartalmPeer::CODALM,$this->fadevolu->getCodalm());
	         $c->add(CaartalmPeer::CODART,$x[$j]->getCodart());
	         $reg= CaartalmPeer::doSelectOne($c);
			 if (!$reg){
	            $this->coderror=1127;
	            return false;
			 }
      	}
      	else{
            $this->coderror=1126;
            return false;
      	}
         $j++;
      } //while ($j<count($x))

   	  return true;

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
    $this->fadevolu = $this->getFadevoluOrCreate();
    try{
    $this->updateFadevoluFromRequest();
    }
    catch(Exception $ex){}
	//$grid2=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();
	$this->configGrid();
 	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }

    return sfView::SUCCESS;
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
  protected function saveFadevolu($fadevolu)
  {
    if ($fadevolu->getId())
    {
      $fadevolu->save();

    }
    else //nuevo
    {
  	  $grid2=Herramientas::CargarDatosGrid($this,$this->obj);

	  Facturacion::salvarFadevolu($fadevolu,$grid2);
    }
    return -1;
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
