<?php

/**
 * Subclase para representar una fila de la tabla 'npconpri'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Npconpri extends BaseNpconpri
{
  public function getNomina()
  {
      $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $nomina = NpnominaPeer::doSelectone($c);
	  if ($nomina)
	  	return $nomina->getNomnom();
	  else 
	    return '';
  }
  public function getConcepto()
  {
      $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,self::getCodcon());
  	  $concepto = NpdefcptPeer::doSelectone($c);
	  if ($concepto)
	  	return $concepto->getNomcon();
	  else 
	    return '';
  }	
  
}
