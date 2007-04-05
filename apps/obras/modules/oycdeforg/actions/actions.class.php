<?php

/**
 * oycdeforg actions.
 *
 * @package    siga
 * @subpackage oycdeforg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeforgActions extends autooycdeforgActions
{
	protected function updateOcdeforgFromRequest()
	{
		$ocdeforg = $this->getRequestParameter('ocdeforg');

		if (isset($ocdeforg['codorg']))
		{
			$this->ocdeforg->setCodorg(str_pad($ocdeforg['codorg'],4,'0',STR_PAD_LEFT));
		}
		if (isset($ocdeforg['desorg']))
		{
			$this->ocdeforg->setDesorg($ocdeforg['desorg']);
		}
		if (isset($ocdeforg['codtiporg']))
		{
			$this->ocdeforg->setCodtiporg($ocdeforg['codtiporg']);
		}
		if (isset($ocdeforg['destiporg']))
		{
			$this->ocdeforg->setDestiporg($ocdeforg['destiporg']);
		}
		if (isset($ocdeforg['entorg']))
		{
			$this->ocdeforg->setEntorg($ocdeforg['entorg']);
		}
		if (isset($ocdeforg['dirorg']))
		{
			$this->ocdeforg->setDirorg($ocdeforg['dirorg']);
		}
		if (isset($ocdeforg['codpai']))
		{
			$this->ocdeforg->setCodpai($ocdeforg['codpai']);
		}
		if (isset($ocdeforg['nompai']))
		{
			$this->ocdeforg->setNompai($ocdeforg['nompai']);
		}
		if (isset($ocdeforg['codedo']))
		{
			$this->ocdeforg->setCodedo($ocdeforg['codedo']);
		}
		if (isset($ocdeforg['nomedo']))
		{
			$this->ocdeforg->setNomedo($ocdeforg['nomedo']);
		}
		if (isset($ocdeforg['codciu']))
		{
			$this->ocdeforg->setCodciu($ocdeforg['codciu']);
		}
		if (isset($ocdeforg['nomciu']))
		{
			$this->ocdeforg->setNomciu($ocdeforg['nomciu']);
		}
		if (isset($ocdeforg['telorg']))
		{
			$this->ocdeforg->setTelorg($ocdeforg['telorg']);
		}
		if (isset($ocdeforg['faxorg']))
    {
      $this->ocdeforg->setFaxorg($ocdeforg['faxorg']);
    }
    if (isset($ocdeforg['emaorg']))
    {
      $this->ocdeforg->setEmaorg($ocdeforg['emaorg']);
    }
  }	
}
