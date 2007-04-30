<?php

/**
 * Subclass for representing a row from the 'cidefniv' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Cidefniv extends BaseCidefniv
{
public function getNomemp()
  {  
  	  $c = new Criteria();
  	  $c->add(EmpresaUserPeer::CODEMP,self::getCodemp());
  	  $nombre = EmpresaUserPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else 
	    return 'No encontrado';  
  }
  
}
