<?php

/**
 * presnomreghisantpre actions.
 *
 * @package    Roraima
 * @subpackage presnomreghisantpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomreghisantpreActions extends autopresnomreghisantpreActions
{

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npantpre/filters');

    // pager
    $this->pager = new sfPropelPager('Npantpre', 5);
    $c = new Criteria();
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
  protected function updateNpantpreFromRequest()
  {
    $npantpre = $this->getRequestParameter('npantpre');

    if (isset($npantpre['codemp']))
    {
      $this->npantpre->setCodemp($npantpre['codemp']);
    }
    if (isset($npantpre['fecsolant']))
    {
      if ($npantpre['fecsolant'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npantpre['fecsolant']))
          {
            $value = $dateFormat->format($npantpre['fecsolant'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npantpre['fecsolant'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npantpre->setFecsolant($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npantpre->setFecsolant(null);
      }
    }
    if (isset($npantpre['fecant']))
    {
      if ($npantpre['fecant'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npantpre['fecant']))
          {
            $value = $dateFormat->format($npantpre['fecant'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npantpre['fecant'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npantpre->setFecant($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npantpre->setFecant(null);
      }
    }
    if (isset($npantpre['monant']))
    {
      $this->npantpre->setMonant($npantpre['monant']);
    }
    if (isset($npantpre['observacion']))
    {
      $this->npantpre->setObservacion($npantpre['observacion']);
    }
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

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
	  $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }


/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
//Select * From NpAntPre Where Rtrim(CodEmp) = '" + Trim(DatosAntPre(0).Text) + "'
// and FecAnt=to_date('" + Format(FecAnt.Value, "dd/mm/yyyy") + "','dd/mm/yyyy')
	{
	     //$this->mensaje="";

	  if ($this->getRequestParameter('ajax')=='1')
	    { $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
   		  $cajtexfecant=$this->getRequestParameter('cajtexfecant');
   		  $cajtexmonant=$this->getRequestParameter('cajtexmonant');


	      $dato=Herramientas::getX('codemp','nphojint','nomemp',$this->getRequestParameter('codigo'));

	        //$dato1=Herramientas::getX('codemp','npantpre','fecant',$this->getRequestParameter('codigo'));
	   //   print $dato1; exit;

            //$dato_fecha=H::FormatoFecha($dato1);



	    	 //$dato2=Herramientas::getX('codemp','npantpre','monant',$this->getRequestParameter('codigo'));

	    	  //$dato_monto=number_format($dato2,2);
/*	    	if ($this->getRequestParameter('codigo')<>'')
	    	{
	    		$x=Herramientas::getX_vacio('codemp','nphojint','nomemp',$this->getRequestParameter('codigo'));

     	    if (trim($x)=="")
	        {
               //$dato = Herramientas::getX('codemp','nphojint','nomemp',$this->getRequestParameter('codigo'));
			}
			    else
	          	{
	         // 		$this->mensaje="Ya existe información asociada a esta nomina";
	          	}

	        }
*/
			$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

	    	}

            else
	          	{ if ($this->getRequestParameter('ajax')=='2')
	          		{
	          		   $cajtexmos=$this->getRequestParameter('cajtexmos');
   		               $cajtexcom=$this->getRequestParameter('cajtexcom');
	          		 //	print ;

		          	    $fec=$this->getRequestParameter('codigo');
		          		$prueba=split('/',$fec);
		                $dia=$prueba[0];
		                $mes=$prueba[1];
		                $ano = $prueba[2];
		                $fecha = $ano.'-'.$mes.'-'.$dia;

		          		$c = new Criteria();
	  	  			 	$c->add(NpantprePeer::CODEMP,$this->getRequestParameter('cod'));
	  	     			$c->add(NpantprePeer::FECANT,$fecha);
	  	  				$frecuencia = NpantprePeer::doSelectOne($c);
		  				if ($frecuencia)
		  				{
		  				$dato_monto=$frecuencia->getMonant();
		  				}
		  				else $dato_monto='0,00';
	          		$output = '[["'.$cajtexmos.'","'.$dato_monto.'",""]]';
	          		}
	          	}



         $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');


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
  public function saveNpantpre($npantpre)
  {
   //Nomina::salvarpresnomreghisantpre($npantpre);
   $npantpre->save();
   return -1;

  }

  public function deleteNpantpre($Npantpre)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteNpantpre($Npantpre);

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
	  $this->npantpre = $this->getNpantpreOrCreate();
	  $this->updateNpantpreFromRequest();

	  self::$coderror=Nomina::validarNpreghistantpre($this->npantpre->getCodemp(),$this->npantpre->getFecant());

	  if (self::$coderror<>-1)
            {
	      return false;
	    }else return true;
	 }else return true;

 }
  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
  public static $coderror=-1;
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
    {
    $this->preExecute();
    $this->npantpre = $this->getNpantpreOrCreate();
    $this->updateNpantpreFromRequest();

    $this->labels = $this->getLabels();


      if(!$this->validateEdit())

      {
	  $err = Herramientas::obtenerMensajeError(self::$coderror);
	  $this->getRequest()->setError('npantpre{codemp}',$err);
	 // $this->getRequest()->setError('npintfecref{fecfinref}',$err);
        }
       return sfView::SUCCESS;
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
