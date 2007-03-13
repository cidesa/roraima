<?php

/**
 * principal actions.
 *
 * @package    cidesa
 * @subpackage principal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class principalActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  	
	if ($this)
	{
		//$this->getUser()->loginOut();
		$this->getUser()->setAttribute('error', 'Principal - Usuario Login');
	}else 
	{
		$this->getUser()->setAttribute('error', 'Usuario Sin Autenticar');
	}
  	
  }
}
