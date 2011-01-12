<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cpniveles'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CpnivelesPeer.php 41678 2010-12-08 20:46:43Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class CpnivelesPeer extends BaseCpnivelesPeer
{
  public static function getNivelesPartidas()
  {
    $resp = array();
    $c = new Criteria();
    $c->add(CpnivelesPeer::CATPAR,'P');
    $c->addAscendingOrderByColumn(CpnivelesPeer::CONSEC);
    $m = CpnivelesPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getConsec()] = $mon->getNomext();
      }
    }
    return $resp;
  }
}
