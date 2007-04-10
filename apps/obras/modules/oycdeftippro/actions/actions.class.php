<?php

/**
 * oycdeftippro actions.
 *
 * @package    siga
 * @subpackage oycdeftippro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipproActions extends autooycdeftipproActions
{
  protected function updateOctipprlFromRequest()
  {
    $octipprl = $this->getRequestParameter('octipprl');

    if (isset($octipprl['codtippro']))
    {
      $this->octipprl->setCodtippro(str_pad($octipprl['codtippro'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipprl['destippro']))
    {
      $this->octipprl->setDestippro($octipprl['destippro']);
    }
  }	
}
