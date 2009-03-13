<?php

/**
 * fordefstatus actions.
 *
 * @package    siga
 * @subpackage fordefstatus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefstatusActions extends autofordefstatusActions
{
	protected function updateFordefstaFromRequest()
	{
		$fordefsta = $this->getRequestParameter('fordefsta');

		if (isset($fordefsta['codsta']))
    {
      $this->fordefsta->setCodsta(str_pad($fordefsta['codsta'], 2, '0', STR_PAD_LEFT));
    }
    if (isset($fordefsta['dessta']))
    {
      $this->fordefsta->setDessta($fordefsta['dessta']);
    }
  }	
}
