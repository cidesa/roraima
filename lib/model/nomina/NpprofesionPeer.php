<?php

/**
 * Subclass for performing query and update operations on the 'npprofesion' table.
 *
 * 
 *
 * @package lib.model
 */ 
class NpprofesionPeer extends BaseNpprofesionPeer
{

	public static function cargarSelect($object, $method, $options)
	{	  	
      $codcar = $object->getCodcar();
	  
	  $c = new Criteria();
	  $c->addJoin(NpprofesionPeer::CODPROFES,NpprocarPeer::CODPROFES);
	  $c->add(NpprocarPeer::CODCAR,$codcar);
	  $objects_associated = NpprofesionPeer::doSelect($c);	

	  $ids = array();
	  foreach ($objects_associated as $object2)
      {		
        $ids[] = $object2->getId();
      }
	  //print count($ids);
	  //exit;	     
	  
	  $c = new Criteria();
	  $objects = NpprofesionPeer::doSelect($c);
	  
	  
	  return array($objects, $objects_associated, $ids);
    
	}

}
