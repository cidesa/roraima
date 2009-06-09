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
    if($usuario) $this->nomuse = $usuario->getNomuse();
    else $this->nomuse = 'Sin Usuario';
    
    $dfatendocdet = $this->getDfatendocdet();
    if($dfatendocdet) $this->nomunid = $dfatendocdet->getNomunid();

  }
}
