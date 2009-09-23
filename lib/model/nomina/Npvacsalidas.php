<?php

/**
 * Subclase para representar una fila de la tabla 'npvacsalidas'.
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
class Npvacsalidas extends BaseNpvacsalidas
{
  protected $diaspend=0;
  protected $objvac=array();	
  protected $pagadas='';
	
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

  public function getFecing($formato=false)
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $fecha = NphojintPeer::doSelectone($c);
	  if ($fecha)
	   if ($formato)
	     return date("d/m/Y",strtotime($fecha->getFecing()));
	   else
	     return date("d/m/Y",strtotime($fecha->getFecing()));
	  	 #return $fecha->getFecing();
	  else
	    return ' ';
   }  
   
}
