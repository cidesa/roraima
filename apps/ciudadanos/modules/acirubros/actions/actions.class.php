<?php

/**
 * acirubros actions.
 *
 * @package    Roraima
 * @subpackage acirubros
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class acirubrosActions extends autoacirubrosActions
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
    $this->configGrid();

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
    $reg = $this->atrubros->getAtdetrecrubs();
    $regrecaudos = array();

    $c = new Criteria();
    $recaudos = AtrecaudPeer::doSelect($c);

    //H::PrintR($recaudos);

    if($recaudos){
      foreach($recaudos as $rec){
        $idrec = $rec->getId();
        $encontrado=false;
        $iddetrecrub = '';
        if($reg){
          foreach($reg as $r){
            if($r->getAtrecaudId()==$idrec){
              $encontrado=true;
              $iddetrecrub = $r->getId();
            }
          }
        }

        if($iddetrecrub!=''){
          $regaxu = AtdetrecrubPeer::retrieveByPK($iddetrecrub);
          $regaxu->setRecaudo(true);
        }else{
          $regaxu = new Atdetrecrub();
          $regaxu->setAtrecaudId($idrec);
          $regaxu->setAtrubrosId($this->atrubros->getId());
          $regaxu->setRecaudo(false);
          $regaxu->afterHydrate();
      //    Herramientas::PrintR($regaxu);
        }

        $regrecaudos[] = $regaxu;
      }
    }

    //$this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/acirubros/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetrecrub',$regrecaudos);
    $this->columns = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/acirubros/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetrecrub');

    $this->columns[1][3]->setCombo(array('S' => 'SI', 'N' => 'NO'));
    $this->obj = $this->columns[0]->getConfig($regrecaudos);


    $this->atrubros->setObjrecaudos($this->obj);

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
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->atrubros= $this->getAtrubrosOrCreate();
      $this->updateAtrubrosFromRequest();
      $this->configGrid();
      $gridrec = Herramientas::CargarDatosGridv2($this,$this->atrubros->getObjrecaudos());

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
      $this->atrubros= $this->getAtrubrosOrCreate();
      $this->updateAtrubrosFromRequest();
      $this->configGrid();

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
  public function saving($atrubros)
  {
      $this->configGrid();

      $gridrec = Herramientas::CargarDatosGridv2($this,$this->atrubros->getObjrecaudos());

      $coderr = Ciudadanos::salvarAcirubros($atrubros,$gridrec);
      return $coderr;
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
