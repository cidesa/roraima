<?php

/**
 * Subclass for performing query and update operations on the 'ccpartid' table.
 *
 *
 *
 * @package lib.model
 */
class CcpartidPeer extends BaseCcpartidPeer
{
   public static function getPartidas($idsolici=''){
   if ($idsolici!='')
	  {
	  	$c = new Criteria();
	  	$c->add(CcparsolPeer::CCSOLICI_ID,$idsolici);
	  	$c->addJoin(CcpartidPeer::ID,CcparsolPeer::CCPARTID_ID);
	  }
	  else
	  {
	    $c = new Criteria();
	  }

      $lista_tipo = CcpartidPeer::doSelect($c);

      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
        $tipo += array($obj_tipo->getId() => $obj_tipo->getNompar());
      }
       return $tipo;
   }

   public static function getPartidasbyPk($eId)
  {
    $c = new Criteria();
    $p = CcpartidPeer::doSelectOne($c);
    if($p){
      $resp = array();
      foreach($p as $partid){
        $resp[$partid->getId()] = $partid->getNompar();
      }
      return $resp;
    }else return array();
  }

    public static function getPartidasPorPrograma($codigo){
      $c = new Criteria();
      $c->addJoin(CcparcrePeer::CCPARTID_ID, CcpartidPeer::ID);
      $c->add(CcparcrePeer::CCPROGRA_ID,$codigo);
      $lista_tipo = CcpartidPeer::doSelect($c);
      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
        $tipo += array($obj_tipo->getId() => $obj_tipo->getNompar());
      }

      return $tipo;
    }

    public static function getPartidasPorProgramaBase($codigo){
      $c = new Criteria();
      $c->addJoin(CcparproPeer::CCPARTID_ID, CcpartidPeer::ID);
      $c->add(CcparproPeer::CCPROGRA_ID,$codigo);
      $lista_tipo = CcpartidPeer::doSelect($c);
      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
      	$tipo += array($obj_tipo->getId() => $obj_tipo->getNompar());
      }

      return $tipo;
    }


}
