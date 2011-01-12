<?php

/**
 * Subclass for representing a row from the 'cptrasla'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cptrasla.php 36423 2010-02-09 21:11:15Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cptrasla extends BaseCptrasla
{
  public function getRefmov()
  {
    return self::getReftra();
  }
}
