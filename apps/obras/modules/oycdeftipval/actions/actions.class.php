<?php

/**
 * oycdeftipval actions.
 *
 * @package    siga
 * @subpackage oycdeftipval
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipvalActions extends autooycdeftipvalActions
{
  protected function updateOctipvalFromRequest()
  {
    $octipval = $this->getRequestParameter('octipval');

    if (isset($octipval['codtipval']))
    {
      $this->octipval->setCodtipval(str_pad($octipval['codtipval'],2,'0',STR_PAD_LEFT));
    }
    if (isset($octipval['destipval']))
    {
      $this->octipval->setDestipval($octipval['destipval']);
    }
    if (isset($octipval['nomabr']))
    {
      $this->octipval->setNomabr($octipval['nomabr']);
    }
  }	
}
