<?php

/**
 * Subclass for representing a row from the 'bnubica'.
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
class Bnubica extends BaseBnubica
{
  private $genera= '';

  public function getGenera()
  {
    if (self::getStacod()=='C')
    { $var=true;}else { $var=false;}
    return $var;
  }
  public function setGenera($val)
  {
    $this->genera = $val;
  }

  public function getCodubiadm()
  {
  	return self::getCodubi();
  }

  public function getDesubiadm()
  {
  	return self::getDesubi();
  }
}
