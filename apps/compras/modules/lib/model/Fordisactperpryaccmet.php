<?php

/**
 * Subclass for representing a row from the 'fordisactperpryaccmet'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fordisactperpryaccmet extends BaseFordisactperpryaccmet
{
  public function getNompro()
  {
  	  $c = new Criteria();
  	  $c->add(FordefpryPeer::CODPRO,self::getCodpro());
  	  $nombre = FordefpryPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNompro();
	  else 
	    return ' ';
  }
	
public function getDesmet()
  {
  	  $c = new Criteria();
  	  $c->add(FordefpryaccmetPeer::CODMET,self::getCodmet());
  	  $descripcion = FordefpryaccmetPeer::doSelectone($c);
	  if ($descripcion)
	  	return $descripcion->getDesmet();
	  else 
	    return ' ';
  }
}
