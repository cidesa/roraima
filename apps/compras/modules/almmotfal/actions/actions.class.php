<?php

/**
 * almmotfal actions.
 *
 * @package    siga
 * @subpackage almmotfal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almmotfalActions extends autoalmmotfalActions
{
 protected function updateCamotfalFromRequest()
 {
 	$camotfal = $this->getRequestParameter('camotfal');

 	if (isset($camotfal['codfal']))
 	{
 		$this->camotfal->setCodfal($camotfal['codfal']);
 	}
 	if (isset($camotfal['desfal']))
 	{
 		$this->camotfal->setDesfal($camotfal['desfal']);
    }
    //if (isset($camotfal['tipfal']))
   // {
     // $this->camotfal->setTipfal($camotfal['tipfal']);
		$this->camotfal->setTipfal($this->getRequestParameter('checkbox1'));
   // }
  }	
}
