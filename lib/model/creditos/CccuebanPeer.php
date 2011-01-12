<?php

/**
 * Subclass for performing query and update operations on the 'cccueban' table.
 *
 *
 *
 * @package lib.model
 */
class CccuebanPeer extends BaseCccuebanPeer
{
  public static function getCuentasBYBanco($id){
     $c = new Criteria();
     $c->add(CccuebanPeer::CCBANCO_ID,$id);
      $lista_tipo = CccuebanPeer::doSelect($c);

      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
        $tipo += array($obj_tipo->getId() => $obj_tipo->getNumcue());
      }
       return $tipo;
   }

}
