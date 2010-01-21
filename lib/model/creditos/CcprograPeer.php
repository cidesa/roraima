<?php

/**
 * Subclass for performing query and update operations on the 'ccprogra' table.
 *
 *
 *
 * @package lib.model
 */
class CcprograPeer extends BaseCcprograPeer
{
	public static function cargarSelect($object, $method, $options)
	{
      $codsol = $object->getId();

	  $c = new Criteria();
	  $c->addJoin(CcprograPeer::ID,CcprosolPeer::CCPROGRA_ID);
	  $c->add(CCprosolPeer::CCSOLICI_ID,$codsol);
	  $objects_associated = CcprograPeer::doSelect($c);

	  $ids = array();
	  foreach ($objects_associated as $object2)
      {
        $ids[] = $object2->getId();
      }
	  //print count($ids);
	  //exit;

	  $c = new Criteria();
	  $objects = CcprograPeer::doSelect($c);


	  return array($objects, $objects_associated, $ids);

	}


	public static function getProgramas($idsolici=''){
	  if ($idsolici!='')
	  {
	  	$c = new Criteria();
	  	$c->add(CcprosolPeer::CCSOLICI_ID,$idsolici);
	  	$c->addJoin(CcprograPeer::ID,CcprosolPeer::CCPROGRA_ID);
	  }
	  else
	  {
	    $c = new Criteria();
	  }

      $lista_tipo = CcprograPeer::doSelect($c);

      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
        if(strlen($obj_tipo->getNomproCom()) > 17){
        	$pun = "...";
        }
        else {
        	$pun = "";
        }
        $tipo += array($obj_tipo->getId() => substr($obj_tipo->getNomproCom(),0,17).$pun."(".$obj_tipo->getNompro().")");
      }
       return $tipo;

	}

	public static function getProgramasPorCredito($codigo){
      $c = new Criteria();
      $c->addJoin(CcparcrePeer::CCPROGRA_ID, CcprograPeer::ID);
      $c->add(CcparcrePeer::CCCREDIT_ID,$codigo);
      $lista_tipo = CcprograPeer::doSelect($c);
      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
      	if(strlen($obj_tipo->getNomproCom()) > 17){
        	$pun = "...";
        }
        else {
        	$pun = "";
        }
        $tipo += array($obj_tipo->getId() => substr($obj_tipo->getNomproCom(),0,17).$pun."(".$obj_tipo->getNompro().")");
        //$tipo += array($obj_tipo->getId() => $obj_tipo->getNompro());
      }

      return $tipo;

    }

}
