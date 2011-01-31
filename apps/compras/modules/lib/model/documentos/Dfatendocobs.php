<?php

/**
 * Subclase para representar una fila de la tabla 'dfatendocobs'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
