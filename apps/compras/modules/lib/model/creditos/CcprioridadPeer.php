<?php

/**
 * Subclass for performing query and update operations on the 'ccprioridad' table.
 *
 *
 *
 * @package lib.model
 */
class CcprioridadPeer extends BaseCcprioridadPeer
{
	public static function getPrioridades(){
	  $c = new Criteria();
	  $c->addAscendingOrderByColumn(CcprioridadPeer::ALIAS);
	  $datos = CcprioridadPeer::doSelect($c);
	  if($datos){
        $arreglo = array();
        foreach($datos as $dato){

          if(strlen($dato->getAlias()."-".$dato->getNompri()) > 90){
            $long = 87 - strlen($dato->getAlias());
            $arreglo[$dato->getId()] = $dato->getAlias()."-".substr($dato->getNompri(),0,$long)."...";
          }else {
            $arreglo[$dato->getId()] = $dato->getAlias()."-".$dato->getNompri();
          }

        }
        return $arreglo;
      }else return array();
	}
}
