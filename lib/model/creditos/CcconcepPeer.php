<?php

/**
 * Subclass for performing query and update operations on the 'ccconcep' table.
 *
 *
 *
 * @package lib.model
 */
class CcconcepPeer extends BaseCcconcepPeer
{

	public static function getConceptos($idsolici=''){
 	 if ($idsolici!='')
	 {
      $c = new Criteria();
 	  $c->add(CcparsolPeer::CCSOLICI_ID,$idsolici);
	  $c->addJoin(CcconcepPeer::ID,CcparsolPeer::CCCONCEP_ID);
	 }else
	 {
	   $c = new Criteria();
	 }
      $lista_tipo = CcconcepPeer::doSelect($c);

      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
        $tipo += array($obj_tipo->getId() => $obj_tipo->getNomcon());
      }
       return $tipo;
   }

}
