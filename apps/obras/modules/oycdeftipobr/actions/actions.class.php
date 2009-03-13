<?php

/**
 * oycdeftipobr actions.
 *
 * @package    siga
 * @subpackage oycdeftipobr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipobrActions extends autooycdeftipobrActions
{
  protected function updateOctipobrFromRequest()
  {
    $octipobr = $this->getRequestParameter('octipobr');

    if (isset($octipobr['codtipobr']))
    {
      $this->octipobr->setCodtipobr(str_pad($octipobr['codtipobr'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipobr['destipobr']))
    {
      $this->octipobr->setDestipobr($octipobr['destipobr']);
    }
  }	
}
