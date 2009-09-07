<?php

/**
 * Subclass for representing a row from the 'fatipmov'.
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
class Fatipmov extends BaseFatipmov
{
   public function __toString()
  {
    return $this->desmov;
  }
  
  public static function getFirst()
  {
    $c= new Criteria();
    $c->addAscendingOrderByColumn(FatipmovPeer::ID);
    return FatipmovPeer::doSelectOne($c);
  }
}
