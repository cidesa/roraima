<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'octippar'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class OctipparPeer extends BaseOctipparPeer
{
  public static function getTipospar()
  {
    $e = OctipparPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodtippar()] = $esta->getDestippar();
      }
      return $resp;
    }else return array();
  }
}
