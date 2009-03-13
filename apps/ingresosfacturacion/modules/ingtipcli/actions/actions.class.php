<?php

/**
 * ingtipcli actions.
 *
 * @package    siga
 * @subpackage ingtipcli
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtipcliActions extends autoingtipcliActions
{

   protected function updateIntipcliFromRequest()
	{
		$intipcli = $this->getRequestParameter('intipcli');

		if (isset($intipcli['codtipcli']))
	    {
	      $this->intipcli->setCodtipcli(str_pad($intipcli['codtipcli'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intipcli['destipcli']))
	    {
	      $this->intipcli->setDestipcli($intipcli['destipcli']);
	    }
    }

}
