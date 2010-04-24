<?php

/**
 * Subclass for representing a row from the 'fatipmov'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fatipmov.php 33699 2009-10-01 22:15:36Z dmartinez $
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
