<?php

/**
 * bieajuinf actions.
 *
 * @package    siga
 * @subpackage bieajuinf
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class bieajuinfActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
  }
  public function executeList()
  {
    $this->forward('bieajuinf', 'index');
  }
  public function executeEdit()
  {
    $this->forward('bieajuinf', 'index');
  }
  public function executeCreate()
  {
    $this->forward('bieajuinf', 'index');
  }
}
