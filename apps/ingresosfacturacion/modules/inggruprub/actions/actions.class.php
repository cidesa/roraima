<?php

/**
 * inggruprub actions.
 *
 * @package    siga
 * @subpackage inggruprub
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class inggruprubActions extends autoinggruprubActions
{

    protected function updateIngruprubFromRequest()
	{
		$ingruprub = $this->getRequestParameter('ingruprub');

		if (isset($ingruprub['codgruprub']))
	    {
	      $this->ingruprub->setCodgruprub(str_pad($ingruprub['codgruprub'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($ingruprub['desgruprub']))
	    {
	      $this->ingruprub->setDesgruprub($ingruprub['desgruprub']);
	    }
    }


}
