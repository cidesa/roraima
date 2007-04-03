<?php

/**
 * biedefconlots actions.
 *
 * @package    siga
 * @subpackage biedefconlots
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconlotsActions extends autobiedefconlotsActions
{
  public function executeIndex()
  {
    return $this->forward('biedefconlots', 'edit');
  }	
}
