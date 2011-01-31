<?php

/**
 * faciudad actions.
 *
 * @package    Roraima
 * @subpackage faciudad
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faciudadActions extends autofaciudadActions
{
  private $coderror = -1;

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

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	   $this->faciudad= $this->getFaciudadOrCreate();

	   $c = new Criteria();
	   $c->Add(FaestadoPeer::ID, $this->getRequestParameter('edo'));
	   $datos = FaestadoPeer::doSelect($c);

	   if ($datos){
	   	  foreach ($datos as $reg){
		    $pais = $reg->getFapaisId();
	   	  }
	   }
	   else
	   	  $pais = ' ';

	   $this->setVars($pais);


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateFaciudadFromRequest();

      $this->saveFaciudad($this->faciudad);

      $this->faciudad->setId(Herramientas::getX_vacio('id','faciudad','id',$this->faciudad->getId()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faciudad/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faciudad/list');
      }
      else
      {
        return $this->redirect('faciudad/edit?id='.$this->faciudad->getId());
      }


    }
    else
    {
      $this->labels = $this->getLabels();
    }

  }
/*
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFaciudadFromRequest()
  {
    $faciudad = $this->getRequestParameter('faciudad');
    if (isset($faciudad['estado']))
    {
      $this->faciudad->setFaestadoId($faciudad['estado']);
    }
    if (isset($faciudad['nomciu']))
    {
      $this->faciudad->setNomciu($faciudad['nomciu']);
    }
  }
//*/
  public function setVars($pais = ' ')
  {
    $this->paises=$this->CargarPais();
    $this->estados=$this->CargarEstado($pais);
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
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.
 
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
	   $c = new Criteria();
	   $c->Add(FaestadoPeer::ID, $this->getRequestParameter('edo'));
	   $datos = FaestadoPeer::doSelect($c);

	   if ($datos){
	   	  foreach ($datos as $reg){
		    $pais = $reg->getFapaisId();
	   	  }
	   }
	   else
	   	  $pais = ' ';

	   $this->setVars($pais);

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
       $this->faciudad = $this->getFaciudadOrCreate();
       try{
	     $this->updateFaciudadFromRequest();
          }

       catch(Exception $ex){}
/*
	       if ($this->getRequestParameter('edo') == ''){
	          $this->coderror=1102;
	          return false;
	       }
*/
          return true;
      } else return true;
  }

/*
  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
/* modificado 14/09  
public function validateEdit()
  {
    $this->coderror =-1;
    $this->setVars();
    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->coderror=170;

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderror!=-1){
        return false;
      } else return true;

    }else return true;



  }
*/ //MODIFICADO 14/09

 /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {

      $this->labels = $this->getLabels();
      $this->preExecute();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror!=-1){
         $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('',$err);
        }
      }
      try{
    	$this->updateFaciudadFromRequest();
      }
      catch(Exception $ex){}

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
  protected function saveFaciudad($faciudad)
  {

     Facturacion::salvarFaciudad($faciudad,$this->getRequestParameter('estado'),$this->getRequestParameter('faciudad[nomciu]'));

  }

/*
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

  public function CargarPais()
  {
    $tablas=array('Fapais');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('id','nompai');// arreglos donde me traigo el nombre y el codigo
    $paisesresult = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    $paises=array();
	foreach ($paisesresult as $pai => $paiv)
	{
		$paises[$pai] = ucfirst($paiv);
	}
    return $paises;

  }

  public function CargarEstado($codpais)
  {
    $tablas=array('Faestado');//areglo de los joins de las tablas
    $filtros_tablas=array('fapais_id');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('id','nomedo');// arreglos donde me traigo el nombre y el codigo
    $estadosresult = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    $estados=array();
	foreach ($estadosresult as $est => $estv)
	{
		$estados[$est] = ucfirst($estv);
	}
    return $estados;

  }

   public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->estados = $this->CargarEstado($this->getRequestParameter('pais'));
      $this->tipo='P';
    }
  }

}
