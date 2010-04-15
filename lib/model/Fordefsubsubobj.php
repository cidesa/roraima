<?php

/**
 * Subclass for representing a row from the 'fordefsubsubobj'.
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
class Fordefsubsubobj extends BaseFordefsubsubobj
{
  public function getDesequ()
  {
	return Herramientas::getX('CODEQU','Fordefequ','Desequ',self::getCodequ());
  }

  public function getDessubobj()
  {

	$c= new Criteria();
	$c->add(FordefsubobjPeer::CODSUBOBJ,self::getCodsubobj());
	$c->add(FordefsubobjPeer::CODEQU,self::getCodequ());
	$datos=FordefsubobjPeer::doSelectOne($c);
	if ($datos)
	  return $datos->getDessubobj();
	else
	 return "";

  }
}
