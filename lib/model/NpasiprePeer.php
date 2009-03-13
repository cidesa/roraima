<?php

/**
 * Subclass for performing query and update operations on the 'npasipre' table.
 *
 *
 *
 * @package lib.model
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
