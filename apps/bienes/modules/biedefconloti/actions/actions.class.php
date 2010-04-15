<?php

/**
 * biedefconloti actions.
 *
 * @package    Roraima
 * @subpackage biedefconloti
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biedefconlotiActions extends autobiedefconlotiActions
{
  public function executeIndex()
  {
    return $this->forward('biedefconloti', 'edit');
  }	
}
