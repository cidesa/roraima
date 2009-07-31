<?php

/**
 * docusu actions.
 *
 * @package    siga
 * @subpackage docusu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class docusuActions extends autodocusuActions
{

  private static $coderror=-1;

  public function executeCreate()
  {
    return $this->forward('docusu', 'list');
  }

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

  public function executeDelete()
  {
    return $this->forward('docusu', 'list');
  }
}
