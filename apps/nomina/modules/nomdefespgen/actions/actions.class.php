<?php

/**
 * nomdefespgen actions.
 *
 * @package    siga
 * @subpackage nomdefespgen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespgenActions extends autonomdefespgenActions
{
  protected function updateNpdefgenFromRequest()
  {
    $npdefgen = $this->getRequestParameter('npdefgen');

    if (isset($npdefgen['codemp']))
    {
      $this->npdefgen->setCodemp($npdefgen['codemp']);
    }
    if (isset($npdefgen['nomemp']))
    {
      $this->npdefgen->setNomemp($npdefgen['nomemp']);
    }
    if (isset($npdefgen['forcar']))
    {
      $this->npdefgen->setForcar($npdefgen['forcar']);
    }
    if (isset($npdefgen['foremp']))
    {
      $this->npdefgen->setForemp($npdefgen['foremp']);
    }
    if (isset($npdefgen['fororg']))
    {
      $this->npdefgen->setFororg($npdefgen['fororg']);
    }
    if (isset($npdefgen['foruni']))
    {
      $this->npdefgen->setForuni($npdefgen['foruni']);
    }
    if (isset($npdefgen['unitrib']))
    {
      $this->npdefgen->setUnitrib($npdefgen['unitrib']);
    }
    //if (isset($npdefgen['redmon']))
    //{
      $this->npdefgen->setRedmon($this->getRequestParameter('redmon'));
    //}
    //if (isset($npdefgen['codpre']))
    //{
      $this->npdefgen->setCodpre($this->getRequestParameter('codpre'));
    //}
    //if (isset($npdefgen['asiconnom']))
    //{
      $this->npdefgen->setAsiconnom($this->getRequestParameter('asiconnom'));
    //}
  }
	
}
