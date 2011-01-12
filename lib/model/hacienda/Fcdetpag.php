<?php

/**
 * Subclass for representing a row from the 'fcdetpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdetpag.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdetpag extends BaseFcdetpag
{

  public static function ListaTipPag()
  {
    $c = new Criteria;
    //$c->addAscendingOrderByColumn(ViaregtiptabPeer::DESTIPTAB);
    $lista = FctippagPeer::doSelect($c);

    $modulos = array();

    foreach($lista as $arr)
    {
      $modulos += array($arr->getTippag() => $arr->getDespag());
    }
    return $modulos;

  }
}
