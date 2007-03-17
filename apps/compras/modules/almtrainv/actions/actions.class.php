<?php

/**
 * almtrainv actions.
 *
 * @package    siga
 * @subpackage almtrainv
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class almtrainvActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
	$this->traspasado = false;
    
  }
  
  public function executeTraspasar()
  {
	$this->traspasado = true;
	//return sfView::SUCCESS;
  }
  
}
