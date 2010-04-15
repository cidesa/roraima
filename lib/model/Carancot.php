<?php

/**
 * Subclass for representing a row from the 'carancot'.
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
class Carancot extends BaseCarancot
{

  public function getCandes($val=false)
  {
    if(parent::getId()=='' && parent::getCandes()==''){
      $c = new Criteria();
      $c->addDescendingOrderByColumn(CarancotPeer::ID);
      $carancots = CarancotPeer::doSelectOne($c);
      if($carancots){
        return ($carancots->getCanhas(false)+1);
      }return 0;
    }else return parent::getCandes($val);
  }

  public function getCandes_($val=false)
  {
    return parent::getCandes($val);
  }

  public function getCancotent()
  {
    if ((parent::getCancot()))
    	 return parent::getCancot();
   	else
   		 return 0;
  }
}
