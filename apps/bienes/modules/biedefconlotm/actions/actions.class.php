<?php

/**
 * biedefconlotm actions.
 *
 * @package    siga
 * @subpackage biedefconlotm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconlotmActions extends autobiedefconlotmActions
{
  public function executeIndex()
  {
    return $this->forward('biedefconlotm', 'edit');
  }
	
}
