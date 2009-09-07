<?php

/**
 * liccomlic actions.
 *
 * @package    Roraima
 * @subpackage liccomlic
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class liccomlicActions extends autoliccomlicActions
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
    if ($this->licomlic->getId())
    $this->configGrid($this->licomlic->getId());
    else $this->configGrid();
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($id='')
  {
  	$c = new Criteria();
    $c->add(LidetcomPeer::LICOMLIC_ID,$id);
    $per = LidetcomPeer::doSelect($c);
    $reg=$per;
    $obj= array('codemp' => 1, 'cedemp' => 2 ,'nomemp' => 3, 'dirhab' => 4);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liccomlic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empleados');
    $this->columnas[1][0]->setCatalogo('nphojint','sf_admin_edit_form',$obj,'Licomlic_nphojint');

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->licomlic->setObjempleados($this->obj);
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

      $this->licomlic= $this->getLicomlicOrCreate();
      $this->updateLicomlicFromRequest();
      $this->configGrid($this->licomlic->getId());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      $encontrado=false;
      foreach($grid[0] as $item){
        if($item->getCodemp()!=""){
          $encontrado=true;
        }
      }
      if (!$encontrado) { $this->coderr = 908; return false;}

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
      $this->licomlic= $this->getLicomlicOrCreate();
      $this->updateLicomlicFromRequest();
      $this->configGrid();
      //$this->licomlic->afterHydrate();
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
  public function saving($licomlic)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarComisionLicitacion($licomlic,$grid);
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
  public function deleting($licomlic)
  {
    $c= new Criteria();
    $c->add(LidetcomPeer::LICOMLIC_ID,$licomlic->getId());
    LidetcomPeer::doDelete($c);

    $licomlic->delete();
    return -1;


  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->updateError();
    $this->params=array();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);

      }
    }
    return sfView::SUCCESS;
  }


}
