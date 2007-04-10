<?php

/**
 * oycdeftipact actions.
 *
 * @package    siga
 * @subpackage oycdeftipact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipactActions extends autooycdeftipactActions
{
  protected function updateOctipactFromRequest()
  {
    $octipact = $this->getRequestParameter('octipact');

    if (isset($octipact['codtipact']))
    {
      $this->octipact->setCodtipact(str_pad($octipact['codtipact'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipact['destipact']))
    {
      $this->octipact->setDestipact($octipact['destipact']);
    }
  }	
}
