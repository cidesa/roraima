<?php

/**
 * ingcondpag actions.
 *
 * @package    siga
 * @subpackage ingcondpag
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingcondpagActions extends autoingcondpagActions
{
   protected function updateIncondpagFromRequest()
	{
		$incondpag = $this->getRequestParameter('incondpag');

		if (isset($incondpag['codcond']))
	    {
	      $this->incondpag->setCodcond(str_pad($incondpag['codcond'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($incondpag['descond']))
	    {
	      $this->incondpag->setDescond($incondpag['descond']);
	    }
	    if (isset($incondpag['tipcond']))
	    {
	      $this->incondpag->setTipcond($incondpag['tipcond']);
	    }
	    if (isset($incondpag['diascond']))
	    {
	      $this->incondpag->setDiascond($incondpag['diascond']);
	    }
	    if (isset($incondpag['genord']))
	    {
	      $this->incondpag->setGenord($incondpag['genord']);
	    }

    }



}
