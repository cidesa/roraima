<?php

/**
 * nomdeftipgas actions.
 *
 * @package    siga
 * @subpackage nomdeftipgas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdeftipgasActions extends autonomdeftipgasActions
{
	
  protected function updateNptipgasFromRequest()
  {
    $nptipgas = $this->getRequestParameter('nptipgas');

    if (isset($nptipgas['codtipgas']))
    {
      $this->nptipgas->setCodtipgas(str_pad($nptipgas['codtipgas'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nptipgas['destipgas']))
    {
      $this->nptipgas->setDestipgas($nptipgas['destipgas']);
    }
  }
	
}
