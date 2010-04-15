<?php

/**
 * presnomdefpre actions.
 *
 * @package    Roraima
 * @subpackage presnomdefpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomdefpreActions extends autopresnomdefpreActions
{

 // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

 private static $valor='';


/**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdefpreliq/filters');

    // pager
    $this->pager = new sfPropelPager('Npdefpreliq', 5);
    $c = new Criteria();
    $c->addSelectColumn(NpdefpreliqPeer::CODNOM);
    $c->addSelectColumn(NpdefpreliqPeer::CODCON);
    $c->addSelectColumn("'' AS PERDES");
    $c->addSelectColumn("'' AS PERHAS");
    $c->addSelectColumn("'' AS CODPAR");
    $c->addSelectColumn("max(ID) AS ID");

    $c->addGroupByColumn(NpdefpreliqPeer::CODNOM);
    $c->addGroupByColumn(NpdefpreliqPeer::CODCON);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

 /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdefpreliqFromRequest()
  {
    $this->listaconceptos= Constantes::ListaConceptos();

    $npdefpreliq = $this->getRequestParameter('npdefpreliq');

    if (isset($npdefpreliq['codnom']))
    {
      $this->npdefpreliq->setCodnom($npdefpreliq['codnom']);
    }
    if (isset($npdefpreliq['nomnom']))
    {
      $this->npdefpreliq->setNomnom($npdefpreliq['nomnom']);
    }
  }

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()

	  {
	    $this->listaconceptos= Constantes::ListaConceptos();

	    $this->npdefpreliq = $this->getNpdefpreliqOrCreate();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateNpdefpreliqFromRequest();

	      $this->saveNpdefpreliq($this->npdefpreliq);

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('presnomdefpre/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('presnomdefpre/list');
	      }
	      else
	      {
	        return $this->redirect('presnomdefpre/edit');
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }

  }

protected function getNpdefpreliqOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npdefpreliq = new Npdefpreliq();

      $this->configGrid();
    }
    else
    {

      $npdefpreliq = NpdefpreliqPeer::retrieveByPk($this->getRequestParameter($id));

 //    print $npdefpreliq->getCodnom();print $npdefpreliq->getCodnom();exit;

      $this->configGrid($npdefpreliq->getCodnom(),$npdefpreliq->getCodcon());

      $this->valor=$npdefpreliq->getCodcon();

      $this->forward404Unless($npdefpreliq);
    }

    return $npdefpreliq;
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='',$concepto='')

  {
  	       $c = new Criteria();
   		   $c->add(NpdefpreliqPeer::CODNOM,$codigo);
           $c->add(NpdefpreliqPeer::CODCON,$concepto);
           $per = NpdefpreliqPeer::doSelect($c);



    $filas_arreglo=10;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npdefpreliq');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Período Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setVacia(true);
    $col1->setNombreCampo('perdes');
    $col1->setHTML('type="text" size="10" readonly=false maxlength="4" ');

    $col2 = new Columna('Período Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setVacia(true);
    $col2->setNombreCampo('perhas');
    $col2->setHTML('type="text" size="10" readonly=false maxlength="4"');

    $obja=array('codpar'=> 3, 'nompar' => 4);
    $col3 = new Columna('Codigo De Partida');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setCatalogo('Nppartidas','sf_admin_edit_form',$obja,'Nppartidas_Prenondespre');
    $col3->setNombreCampo('codpar');
    $col3->setAjax('presnomdefpre',2,4);
    $col3->setHTML('type="text" size="30" ');

    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nompar');
    $col4->setHTML('type="text" size="30" readonly=false');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $this->obj = $opciones->getConfig($per);
 //   print "<pre>";
 //   print_r ($per);exit;


  }

/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()

	{
	      $this->mensaje="";
	      $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {

	    		     $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
 				     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  	                 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

		}
		elseif($this->getRequestParameter('ajax')=='2')
        	{
				 $dato=Herramientas::getX_vacio('codpar','nppartidas','nompar',$this->getRequestParameter('codigo'));
				if(!empty($dato))
				{
					$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
				}else
				{
					$js="$('$cajtexcom').value='';";
					$js.="$('$cajtexcom').focus();";
					$js.="alert('Partida no existe');";
					$output = '[["javascript","'.$js.'",""]]';
				}

		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			 	return sfView::HEADER_ONLY;
        	}
        else
        	{
        		$c = new Criteria();
                $c->add(NpdefpreliqPeer::CODNOM,$this->getRequestParameter('cajtexcom1'));
                $c->add(NpdefpreliqPeer::CODCON,$this->getRequestParameter('cod'));
                $per = NpdefpreliqPeer::doSelectone($c);
        		if ($per)
        		   {
        		  	$this->mensaje="Ya existe informacion Asociada a esta nomina con este mismo concepto";
        		   }
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
  public function saveNpdefpreliq($Npdefpreliq)
  {

         $grid=Herramientas::CargarDatosGrid($this,$this->obj);

	   if ($this->valor=='')
  		{
	      EmpleadosBanco::Grabar_grid_Presnomdefpre($this->getRequestParameter('npdefpreliq[codnom]'),$this->getRequestParameter('npdefpreliq[codcon]'),$grid);
	    }
  		else
  		  {
  		  	 EmpleadosBanco::Grabar_grid_Presnomdefpre($this->getRequestParameter('npdefpreliq[codnom]'),$this->valor,$grid);
  		  }

  }

  public function deleteNpdefpreliq($Npdefpreliq)
  {

    $coderr = -1;
    $codigo= $Npdefpreliq->getCodnom();
    $concepto= $Npdefpreliq->getCodcon();
    $c = new Criteria();
   	$c->add(NpdefpreliqPeer::CODNOM,$codigo);
    $c->add(NpdefpreliqPeer::CODCON,$concepto);
    $per = NpdefpreliqPeer::doDelete($c);
    $Npdefpreliq->delete();


/*
    //habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteNpdefpreliq($Npdefpreliq);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }*/

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
    $this->npdefpreliq = $this->getNpdefpreliqOrCreate();


   try{
     $this->updateNpdefpreliqFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
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
       $this->npdefpreliq = $this->getNpdefpreliqOrCreate();

       $this->updateNpdefpreliqFromRequest();

        $grid=Herramientas::CargarDatosGrid($this,$this->obj);


        self::$coderror=EmpleadosBanco::Npdefpreliq_ValRegCompleto($grid);

        if ((self::$coderror==-1))
        {
      $x= $grid[0];
	  $j=0;
	  $s=0;
	  $a=0;
	  $encontrado=false;

     while ($s<count($x) and !$encontrado){
     	$cp= $x[$s]->getCodpar();
        $j=0;

	  while ($j<count($x))
	  {
	  $a=0;
      $j= $j+$s;
      $a= $j+1;

      if ($a>=count($x)){
        break;}
       else{

        $v= $x[$a]->getCodpar();
  	  if ($cp == $v )
	   {
	   	 self::$coderror= 429;
	   	 $encontrado=true;

	   	break;

	   }
      else
        {   self::$coderror=-1;

        }

		$j++;
	  }}
	  $s++;}


        }


        if ((self::$coderror==-1))
        {
           self::$coderror=EmpleadosBanco::Validar_Npdefpreliq_datos($grid);

	        if ((self::$coderror==-1))
	        {
	        	self::$coderror=EmpleadosBanco::Validar_Npdefpreliq($grid,$this->getRequestParameter('npdefpreliq[codnom]'));

	           if ((self::$coderror==-1))
	             {
	                return true;
	             }else return false;

             }else return false;

        }else return false;

      }else return true;

    }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function ActualizarGrid()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);

  }

}
