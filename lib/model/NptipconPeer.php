<?php

/**
 * Subclass for performing query and update operations on the 'nptipcon' table.
 *
 *
 *
 * @package lib.model
 */
 class NptipconPeer extends BaseNptipconPeer
{
    public static function getDestipcon($codigo)
     {
   	  $c=new Criteria();
   	  $c->add(NptipconPeer::CODTIPCON,$codigo);
   	  $per = NptipconPeer::doSelectOne($c);
   	  if ($per)
  	  return $per->getDestipcon();
      else
      return '';
      }

    public static function getDestipcon_vacio($codigo)
     {
      $desc = Herramientas::getX_vacio('CODTIPCON','Nptipcon','DesTipCon',str_pad($codigo,3,'0',STR_PAD_LEFT));
      if ($desc)
      	return $desc;
      else
      	return '';
   }
}
