<?php

/**
 * oycdeftipsol actions.
 *
 * @package    siga
 * @subpackage oycdeftipsol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipsolActions extends autooycdeftipsolActions
{
  protected function updateOctipsolFromRequest()
  {
    $octipsol = $this->getRequestParameter('octipsol');

    if (isset($octipsol['codsol']))
    {
      $this->octipsol->setCodsol(str_pad($octipsol['codsol'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipsol['dessol']))
    {
      $this->octipsol->setDessol($octipsol['dessol']);
    }
    //if (isset($octipsol['tipsol']))
    //{
      //$this->octipsol->setTipsol($octipsol['tipsol']);
      $this->octipsol->setTipsol($this->getRequestParameter('checkbox1'));
    //}
    if (isset($octipsol['maxdia']))
    {
      $this->octipsol->setMaxdia($octipsol['maxdia']);
    }
   // if (isset($octipsol['stasol']))
    //{
     // $this->octipsol->setStasol($octipsol['stasol']);
   // }
  }	
}
