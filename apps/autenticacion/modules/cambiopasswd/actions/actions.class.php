<?php

/**
 * cambiopasswd actions.
 *
 * @package    siga
 * @subpackage cambiopasswd
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class cambiopasswdActions extends autocambiopasswdActions
{
  //public $coderr = -1;

  public function executeList()
  {
    return $this->forward('cambiopasswd', 'edit');
  }

  public function executeDelete()
  {
    return $this->forward('cambiopasswd', 'edit');
  }


  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {

    $this->usuarios = UsuariosPeer::retrieveByPK($this->getUser()->getAttribute('usuario_id'));

    $this->usuarios->setPasuse('');

  }

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

  public function saving($clasemodelo)
  {
    $clasemodelo->setPasuse('md5'.md5(strtoupper($clasemodelo->getLoguse()).$clasemodelo->getPassword()));

    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
