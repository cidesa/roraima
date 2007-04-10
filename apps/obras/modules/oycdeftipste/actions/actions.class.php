<?php

/**
 * oycdeftipste actions.
 *
 * @package    siga
 * @subpackage oycdeftipste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipsteActions extends autooycdeftipsteActions
{
 protected function updateOctipsteFromRequest()
  {
    $octipste = $this->getRequestParameter('octipste');

    if (isset($octipste['codste']))
    {
      $this->octipste->setCodste(str_pad($octipste['codste'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipste['desste']))
    {
      $this->octipste->setDesste($octipste['desste']);
    }
    //if (isset($octipste['tipste']))
    //{
      //$this->octipste->setTipste($octipste['tipste']);
        $this->octipste->setTipste($this->getRequestParameter('checkbox1'));
    //}
    /*if (isset($octipste['staste']))
    {
      $this->octipste->setStaste($octipste['staste']);
    }*/
  }
	
}
