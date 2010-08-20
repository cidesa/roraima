<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'contaba1'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contaba1Peer.php 32405 2009-09-01 21:27:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contaba1Peer extends BaseContaba1Peer
{
  public static function getPeriodos()
  {
  	$arr = array();
    $c = new Criteria();
    $c->addAscendingOrderByColumn(Contaba1Peer::PEREJE);
    $reg = Contaba1Peer::doSelect($c);
    if($reg){
      foreach($reg as $registros){
        $arr[$registros->getPereje()] = $registros->getPereje();
      }
    }
    return $arr;
  }
}
