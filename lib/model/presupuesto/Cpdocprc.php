<?php

/**
 * Subclass for representing a row from the 'cpdocprc'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cpdocprc.php 35042 2009-11-26 01:33:34Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdocprc extends BaseCpdocprc
{
   public function getTipdocpre()
  {
  	return self::getTipprc();
  }

  public function getNomdocpre()
  {
  	return self::getNomext();
  }
}
