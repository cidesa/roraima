<?php

/**
 * Subclass for representing a row from the 'viaregtipser'.
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
class Viaregtipser extends BaseViaregtipser
{
	protected $obj = array();
/*
  public static function desctiptab()
  {
    $c = new Criteria();
    $lista = ViaregtiptabPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getdestiptab());
    }
    return $modulos;
  }
*/
}
