<?php

/**
 * Subclass for representing a row from the 'carecpro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Carecpro.php 37135 2010-03-17 14:54:38Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Carecpro extends BaseCarecpro
{
	protected $grupo='';

  public function getDesrec()
  {
  return Herramientas::getX('CODREC','Carecaud','Desrec',self::getCodrec());
  }

  public function getGrupo()
  {
  	$c = new Criteria();
  	//$c->add(CarecaudPeer::CODRED,self::);
  	$c->add(CarecaudPeer::CODREC,self::getCodrec());
  	$c->addJoin(CarecaudPeer::CODTIPREC,CatiprecPeer::CODTIPREC);
  	$reg = CatiprecPeer::doSelectone($c);

  	if ($reg)
  	{
  		return $reg->getDestiprec();
  	}
  }
}
