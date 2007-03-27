<?php

/**
 * fordefdirectriz actions.
 *
 * @package    siga
 * @subpackage fordefdirectriz
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefdirectrizActions extends autofordefdirectrizActions
{
	protected function updateFordefdirecFromRequest()
	{
		$fordefdirec = $this->getRequestParameter('fordefdirec');

		if (isset($fordefdirec['coddir']))
		{
	      $this->fordefdirec->setCoddir(str_pad($fordefdirec['coddir'],3,'0',STR_PAD_LEFT));
	    }
	    if (isset($fordefdirec['desdir']))
	    {
	      $this->fordefdirec->setDesdir($fordefdirec['desdir']);
	    }
 	 }	
}
