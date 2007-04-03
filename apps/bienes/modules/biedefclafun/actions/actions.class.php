<?php

/**
 * biedefclafun actions.
 *
 * @package    siga
 * @subpackage biedefclafun
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefclafunActions extends autobiedefclafunActions
{
	protected function updateBnclafunFromRequest()
	{
		$bnclafun = $this->getRequestParameter('bnclafun');

		if (isset($bnclafun['codcla']))
    {
      $this->bnclafun->setCodcla(str_pad($bnclafun['codcla'],3,'0',STR_PAD_LEFT));
    }
    if (isset($bnclafun['descla']))
    {
      $this->bnclafun->setDescla($bnclafun['descla']);
    }
  }
	
}
