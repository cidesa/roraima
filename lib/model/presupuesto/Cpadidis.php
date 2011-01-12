<?php

/**
 * Subclass for representing a row from the 'cpadidis'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpadidis.php 36423 2010-02-09 21:11:15Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpadidis extends BaseCpadidis
{
  public function getRefmov()
  {
    return self::getRefadi();
  }
}
