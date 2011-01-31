<?php

/**
 * Subclass for representing a row from the 'viaregact'.
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
class Viaregact extends BaseViaregact
{
  public static function ListAct()
  {
    $c = new Criteria();
    $lista = ViaregactPeer::doSelect($c);
    $modulos = array();
    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getDesact());
    }
    return $modulos;
  }

}
