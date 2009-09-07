<?php

/**
 * docusu actions.
 *
 * @package    Roraima
 * @subpackage docusu
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class docusuActions extends autodocusuActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  public function executeCreate()
  {
    return $this->forward('docusu', 'list');
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateUsuariosFromRequest()
  {
    $usuarios = $this->getRequestParameter('usuarios');
    $this->pasuse = $this->getRequestParameter('pasuse');
    $this->repasuse = $this->getRequestParameter('repasuse');

    if ($this->pasuse == $this->repasuse && trim($this->pasuse) != '')
    {
      $this->usuarios->setPasuse($this->pasuse);
    }
    if (isset($usuarios['numuni']))
    {
      $this->usuarios->setNumuni($usuarios['numuni']);
    }

  }

  protected function getUsuariosOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $usuarios = new Usuarios();
      $usuarios->setApluse('DBA');
    }
    else
    {
      $usuarios = UsuariosPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($usuarios);
    }

    return $usuarios;
  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit(){

    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->usuarios = $this->getUsuariosOrCreate();
      $this->updateUsuariosFromRequest();

      if($this->pasuse != $this->repasuse){
          self::$coderror = 3;
          return false;
      } else {return true;}
    }
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
    $this->usuarios = $this->getUsuariosOrCreate();
    $this->updateUsuariosFromRequest();

    $this->labels = $this->getLabels();


    if(self::$coderror<>-1){
      $err = Herramientas::obtenerMensajeError(self::$coderror);
    $this->getRequest()->setError('usuarios{pasuse}',$err);
      self::$coderror=-1;

    }

    return sfView::SUCCESS;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    return $this->forward('docusu', 'list');
  }
}
