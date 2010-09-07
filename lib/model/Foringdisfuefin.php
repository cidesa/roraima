<?php

/**
 * Subclass for representing a row from the 'foringdisfuefin'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Foringdisfuefin.php 32428 2009-09-02 04:18:52Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Foringdisfuefin extends BaseForingdisfuefin
{

 public function getNomext()
  {
  return Herramientas::getX('codfin','Fortipfin','Nomext',self::getCodfin());
  }

 public function getNomcat()
  {
  return Herramientas::getX('codcat','Fordefcatpre','Nomcat',self::getCodcat());
  }

}
