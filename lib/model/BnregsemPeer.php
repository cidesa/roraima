<?php

/**
 * Subclass for performing query and update operations on the 'bnregsem' table.
 *
 *
 *
 * @package lib.model
 */
class BnregsemPeer extends BaseBnregsemPeer
{
  public static function getCodsem($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnregsem','codsem',trim($codigo));
  }

  public static function getCodact($codigo)
  {
    return Herramientas::getX_vacio('CODACT','Bnregsem','codact',trim($codigo));
  }


  public static function getDessem22($codigo1,$codigo2)
  {
    return Herramientas::getXx('Bnregsem',array('CODACT','CODSEM'),array(trim($codigo1),trim($codigo2)),'Dessem');
  }

  public static function getDessem($cod)
  {
        return Herramientas::getX_vacio('codact','bnregsem','dessem',trim($cod));
  }

}
