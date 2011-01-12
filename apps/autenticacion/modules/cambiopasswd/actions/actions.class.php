<?php

/**
 * cambiopasswd actions.
 *
 * @package    Roraima
 * @subpackage cambiopasswd
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cambiopasswdActions extends autocambiopasswdActions
{
  //public $coderr = -1;

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    return $this->forward('cambiopasswd', 'edit');
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    return $this->forward('cambiopasswd', 'edit');
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

    $this->usuarios = UsuariosPeer::retrieveByPK($this->getUser()->getAttribute('usuario_id'));

    $this->usuarios->setPasuse('');

  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    //$this->coderr =-1;


    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->usuarios = $this->getUsuariosOrCreate();

      $this->updateUsuariosFromRequest();

      $oldpassword = 'md5'.md5(strtoupper($this->usuarios->getLoguse()).$this->usuarios->getPasuse());

      $usuario = UsuariosPeer::retrieveByPK($this->getUser()->getAttribute('usuario_id'));

      if($oldpassword!=$usuario->getPasuse()){
        $this->coderr = 30;
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



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
  public function saving($clasemodelo)
  {
    $clasemodelo->setPasuse('md5'.md5(strtoupper($clasemodelo->getLoguse()).$clasemodelo->getPassword()));

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
