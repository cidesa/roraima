<?php

/**
 * biedefconloti actions.
 *
 * @package    siga
 * @subpackage biedefconloti
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconlotiActions extends autobiedefconlotiActions
{
  public function executeIndex()
  {
    return $this->forward('biedefconloti', 'edit');
  }	
}
