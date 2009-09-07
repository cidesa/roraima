<?php

/**
 * faautdes actions.
 *
 * @package    Roraima
 * @subpackage faautdes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faautdesActions extends autofaautdesActions
{
    public $coderror1=-1;

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fanotent = $this->getFanotentOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFanotentFromRequest();

      $this->saveFanotent($this->fanotent);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faautdes/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faautdes/list');
      }
      else
      {
        return $this->redirect('faautdes/edit?id='.$this->fanotent->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
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

      if ($this->fanotent->getNronot()!='')
      {
         $c= new Criteria();
         $c->add(FanotentPeer::NRONOT,$this->fanotent->getNronot());
         $reg= FanotentPeer::doSelectOne($c);
         if ($reg){
	         if ($reg->getAutori() == 'S'){
		      	$this->coderror1=1123;
		        return false;
	         }
	         if ($reg->getStatus() == 'N'){
		      	$this->coderror1=1124;
		        return false;
	         }
         }
      }
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
    $this->fanotent = $this->getFanotentOrCreate();

    try{
	    $this->updateFanotentFromRequest();
    }

    catch(Exception $ex){}

    $this->labels = $this->getLabels();
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

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFanotentFromRequest(){
  	 $this->fanotent->setAutpor($this->getUser()->getAttribute('loguse',null));
  	 $this->fanotent->setAutori('S');
  	 $this->fanotent->setFecaut(date('Y-m-d'));
  }
/*
  protected function getFanotentOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $fanotent = new Fanotent();
    }
    else
    {
      $fanotent = FanotentPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($fanotent);
    }

    return $fanotent;
  }
*/
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
    return parent::saving($clasemodelo);
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
