<?php

/**
 * nomdefesppar actions.
 *
 * @package    siga
 * @subpackage nomdefesppar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespparActions extends autonomdefespparActions
{
	protected function updateNptipparFromRequest()
  {
    $nptippar = $this->getRequestParameter('nptippar');

    if (isset($nptippar['tippar']))
    {
      $this->nptippar->setTippar(str_pad($nptippar['tippar'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptippar['despar']))
    {
      $this->nptippar->setDespar($nptippar['despar']);
    }
  }
	
}
