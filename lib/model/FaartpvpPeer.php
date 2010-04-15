<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'faartpvp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FaartpvpPeer.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FaartpvpPeer extends BaseFaartpvpPeer
{
  public static function getPrecios($codart='')
  {
  	$resp = array();
    if ($codart!='')
    {
      $c = new Criteria();
      $c->add(FaartpvpPeer::CODART,$codart);
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = number_format($pvp->getPvpart(), 2, ',', '.');
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = number_format($pvp->getPvpart(), 2, ',', '.');
       }
      }
    }
   return $resp;
  }
}
