<?php

/**
 * Subclass for representing a row from the 'forasopryaccespsubacc'.
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
class Forasopryaccespsubacc extends BaseForasopryaccespsubacc
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
}
