<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npprofesion'.
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
