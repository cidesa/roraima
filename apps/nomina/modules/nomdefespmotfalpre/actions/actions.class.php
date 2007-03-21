<?php

/**
 * nomdefespmotfalpre actions.
 *
 * @package    siga
 * @subpackage nomdefespmotfalpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespmotfalpreActions extends autonomdefespmotfalpreActions
{
	protected function updateNpmotfalFromRequest()
	{
		$npmotfal = $this->getRequestParameter('npmotfal');

		if (isset($npmotfal['codmotfal']))
		{
			$this->npmotfal->setCodmotfal(str_pad($npmotfal['codmotfal'],4,'0',STR_PAD_LEFT));
		}
		if (isset($npmotfal['desmotfal']))
		{
			$this->npmotfal->setDesmotfal($npmotfal['desmotfal']);
    	}
  		//if (isset($npmotfal['causa']))
  	    //{
  	    //    $this->npmotfal->setCausa($npmotfal['causa']);
			  $this->npmotfal->setCausa($this->getRequestParameter('checkbox1'));
  	    //}
  }
	
}
