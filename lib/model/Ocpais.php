<?php

/**
 * Subclass for representing a row from the 'ocpais'.
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
class Ocpais extends BaseOcpais
{
  public static function getEstados()
  {
    $e = OcpaisPeer::doSelect(new Criteria());
    if($e){
      $resp = array();
      foreach($e as $esta){
        $resp[$esta->getCodpai()] = $esta->getNompai();
      }
      return $resp;
    }else return array();
  }
}
