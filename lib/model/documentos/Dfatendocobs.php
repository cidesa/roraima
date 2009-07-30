<?php

/**
 * Subclass for representing a row from the 'dfatendocobs' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Dfatendocobs extends BaseDfatendocobs
{
  protected $nomuse = '';  
  protected $nomunid = '';  
  
  public function afterHydrate()
  {
    $usuario = UsuariosPeer::retrieveByPK($this->getIdUsuario());
    if($usuario) {
      $this->nomuse = $usuario->getNomuse();  

      $acunidad = AcunidadPeer::retrieveByPK($usuario->getNumuni());
      if($acunidad) $this->nomunid = $acunidad->getNomuni();
      else $this->nomunid = '';
      
    }
    else{
      $this->nomuse = 'Sin Usuario';
      $this->nomunid = '';
    } 
    

  }
}
