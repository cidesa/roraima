<?php

/**
 * Subclase para crear funcionalidades especÃ­ficas de busqueda y actualizaciÃ³n en la tabla 'caunialart'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class CaunialartPeer extends BaseCaunialartPeer
{
  public static function getUnidades($codart='')
  {
    $resp = array();
    if ($codart!='')
    {
      $y= new Criteria();
      $y->add(CaregartPeer::CODART,$codart);
      $reg= CaregartPeer::doSelectOne($y);
      if ($reg)
      {
          $resp[$reg->getUnimed()] = $reg->getUnimed();
          if ($reg->getUnialt()!="")
          {
            $resp[$reg->getUnialt()] = $reg->getUnialt();
          }
      }
      
      $c = new Criteria();
      $c->add(CaunialartPeer::CODART,$codart);
      $m = CaunialartPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[$pvp->getUnialt()] = $pvp->getUnialt();
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = CaunialartPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[$pvp->getUnialt()] = $pvp->getUnialt();
       }
      }
    }
   return $resp;
  }
}
