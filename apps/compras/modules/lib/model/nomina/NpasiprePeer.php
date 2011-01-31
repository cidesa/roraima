<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npasipre'.
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
class NpasiprePeer extends BaseNpasiprePeer
{
	public static function getDesasi_asi($codigoasi,$codcont)
  {
  	 $c=new Criteria();
  	 $c->add(NpasiprePeer::CODCON,$codcont);
  	 $c->add(NpasiprePeer::CODASI,$codigoasi);
  	 $per = NpasiprePeer::doSelectOne($c);
  	 if ($per)
  	 return $per->getDesasi();
     else
     return '';
      }


public static function getDesasi_asi1($codigoasi)
  {
  	 $c=new Criteria();
  	 //$c->add(NpasiprePeer::CODCON,$codcont);
  	 $c->add(NpasiprePeer::CODASI,$codigoasi);
  	 $per = NpasiprePeer::doSelectOne($c);
  	 if ($per)
  	 return $per->getDesasi();
     else
     return '';
      }

    public static function getDesasi($cod)
    {
  	  return Herramientas::getX_vacio('codcont','npasipre','desasi',str_pad($cod,3,'0',STR_PAD_LEFT));
    }



}
