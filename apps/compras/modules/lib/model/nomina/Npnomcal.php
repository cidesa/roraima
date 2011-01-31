<?php

/**
 * Subclase para representar una fila de la tabla 'npnomcal'.
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
class Npnomcal extends BaseNpnomcal
{
  public function getNomemp()
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else 
	    return ' ';
  }
	
 public function getFrecal()
  {
  	  $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $frecuencia = NpnominaPeer::doSelectone($c);
	  if ($frecuencia)
	  	return $frecuencia->getFrecal();
	  else 
	    return ' ';
  }
}
