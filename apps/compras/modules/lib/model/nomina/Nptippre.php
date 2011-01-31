<?php

/**
 * Subclase para representar una fila de la tabla 'nptippre'.
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
class Nptippre extends BaseNptippre
{
  protected $obj=array();
  protected $codnom="";

  public function getNomcon()
  {
  	  $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,self::getCodcon());
  	  $nombre = NpdefcptPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomcon();
	  else
	    return ' ';
  }

  public function getNomnom()
  {
  	  $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,$this->codnom);
  	  $nombre = NpnominaPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomnom();
	  else
	    return ' ';
  }

}
