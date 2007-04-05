<?php

/**
 * oycdefper actions.
 *
 * @package    siga
 * @subpackage oycdefper
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefperActions extends autooycdefperActions
{
	protected function updateOcdefperFromRequest()
	{
		$ocdefper = $this->getRequestParameter('ocdefper');

		if (isset($ocdefper['cedper']))
		{
			$this->ocdefper->setCedper(str_pad($ocdefper['cedper'], 15 , ' '));
		}
		if (isset($ocdefper['nomper']))
		{
			$this->ocdefper->setNomper($ocdefper['nomper']);
		}
		if (isset($ocdefper['telper']))
		{
			$this->ocdefper->setTelper($ocdefper['telper']);
		}
		if (isset($ocdefper['codtipcar']))
		{
			$this->ocdefper->setCodtipcar($ocdefper['codtipcar']);
		}
		if (isset($ocdefper['destipcar']))
		{
			$this->ocdefper->setDestipcar($ocdefper['destipcar']);
		}
		if (isset($ocdefper['codtippro']))
		{
			$this->ocdefper->setCodtippro($ocdefper['codtippro']);
    }
    if (isset($ocdefper['destippro']))
    {
      $this->ocdefper->setDestippro($ocdefper['destippro']);
    }
  }
	
	
}
