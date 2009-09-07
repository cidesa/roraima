<?php

/**
 * Subclass for representing a row from the 'ocofeserval'.
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
class Ocofeserval extends BaseOcofeserval
{
   public $valhor=0.0;
   public $montot=0.0;
   protected $canfin=0.0;

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $c= new Criteria();
      $c->addJoin(OctipprlPeer::CODTIPPRO,OctartipPeer::CODTIPPRO);
      $c->add(OctartipPeer::CODTIPPRO,self::getCodtippro());
      $dat=OctartipPeer::doSelectOne($c);
      if ($dat)
      {
      	$this->valhor=$dat->getValhor();
      	$this->montot=self::getCanhor()*$dat->getValhor();
      }
      else
      {
      	$this->valhor=0.0;
      	$this->montot=0.0;
      }
   }

  public function getDestippro()
  {
    return Herramientas::getX('CODTIPPRO','Octipprl','Destippro',self::getCodtippro());
  }
}
