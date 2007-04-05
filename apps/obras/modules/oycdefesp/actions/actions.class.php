<?php

/**
 * oycdefesp actions.
 *
 * @package    siga
 * @subpackage oycdefesp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefespActions extends autooycdefespActions
{
	protected function updateOctipespFromRequest()
	{
		$octipesp = $this->getRequestParameter('octipesp');

		if (isset($octipesp['codtipesp']))
		{
			$this->octipesp->setCodtipesp(str_pad($octipesp['codtipesp'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipesp['destipesp']))
    {
      $this->octipesp->setDestipesp($octipesp['destipesp']);
    }
  }
	
}
