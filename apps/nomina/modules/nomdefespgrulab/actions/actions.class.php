<?php

/**
 * nomdefespgrulab actions.
 *
 * @package    siga
 * @subpackage nomdefespgrulab
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespgrulabActions extends autonomdefespgrulabActions
{
	protected function updateNpgrulabFromRequest()
	{
		$npgrulab = $this->getRequestParameter('npgrulab');

		if (isset($npgrulab['codgrulab']))
		{
      		$this->npgrulab->setCodgrulab(str_pad($npgrulab['codgrulab'],4,'0',STR_PAD_LEFT));
   		}
    	if (isset($npgrulab['desgrulab']))
   		{
      		$this->npgrulab->setDesgrulab($npgrulab['desgrulab']);
        }
  }	
}
