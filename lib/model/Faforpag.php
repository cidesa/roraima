<?php

/**
 * Subclass for representing a row from the 'faforpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faforpag.php 33699 2009-10-01 22:15:36Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faforpag extends BaseFaforpag
{
	protected $obj = array();
	protected $destippag="";
	protected $nomcue="";
	protected $codmov="";
	protected $genmov="";

  public function getDestippag()
  {
   return Herramientas::getX('ID','Fatippag','Destippag',self::getTippag());
  }

  public function getNomcue()
  {
  	$valor="";
  	$c= new Criteria();
  	$c->add(TsdefbanPeer::NUMCUE,self::getNomban());
  	$reg= TsdefbanPeer::doSelectOne($c);
  	if ($reg)
  	{
      $valor=$reg->getNomcue();
  	}
  	else
  	{
  	 $e= new Criteria();
  	 $e->add(FabancosPeer::CODBAN,self::getNomban());
  	 $regi= FabancosPeer::doSelectOne($e);
  	 if ($regi)
  	 {
  	 	$valor=$regi->getNomban();
  	 }
  	}

   return $valor;
  }
}
