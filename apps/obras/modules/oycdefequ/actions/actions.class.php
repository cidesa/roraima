<?php

/**
 * oycdefequ actions.
 *
 * @package    siga
 * @subpackage oycdefequ
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefequActions extends autooycdefequActions
{
	protected function updateOcdefequFromRequest()
	{
		$ocdefequ = $this->getRequestParameter('ocdefequ');
	
		if (isset($ocdefequ['codequ']))
	    {
	      $this->ocdefequ->setCodequ(str_pad($ocdefequ['codequ'],4,'0',STR_PAD_LEFT));
	    }
	    if (isset($ocdefequ['desequ']))
	    {
	      $this->ocdefequ->setDesequ($ocdefequ['desequ']);
	    }
    }	
}
