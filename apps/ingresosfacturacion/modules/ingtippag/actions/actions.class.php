<?php

/**
 * ingtippag actions.
 *
 * @package    siga
 * @subpackage ingtippag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingtippagActions extends autoingtippagActions
{
protected function updateIntippagFromRequest()
	{
		$intippag = $this->getRequestParameter('intippag');

		if (isset($intippag['codtippag']))
	    {
	      $this->intippag->setCodtippag(str_pad($intippag['codtippag'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($intippag['destippag']))
	    {
	      $this->intippag->setDestippag($intippag['destippag']);
	    }
    }


}
