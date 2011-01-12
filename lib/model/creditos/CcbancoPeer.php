<?php

/**
 * Subclass for performing query and update operations on the 'ccbanco' table.
 *
 *
 *
 * @package lib.model
 */
class CcbancoPeer extends BaseCcbancoPeer
{
	public static function getBancos(){
     $c = new Criteria();
      $lista_tipo = CcbancoPeer::doSelect($c);

      $tipo = array();

      foreach($lista_tipo as $obj_tipo)
      {
        $tipo += array($obj_tipo->getId() => $obj_tipo->getNomban());
      }
       return $tipo;
   }


}
