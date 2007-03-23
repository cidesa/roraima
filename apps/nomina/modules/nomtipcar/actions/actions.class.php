<?php

/**
 * nomtipcar actions.
 *
 * @package    siga
 * @subpackage nomtipcar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomtipcarActions extends autonomtipcarActions
{
  protected function updateNptipcarFromRequest()
  {
    $nptipcar = $this->getRequestParameter('nptipcar');

    if (isset($nptipcar['codtipcar']))
    {
      $this->nptipcar->setCodtipcar(str_pad($nptipcar['codtipcar'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptipcar['destipcar']))
    {
      $this->nptipcar->setDestipcar($nptipcar['destipcar']);
    }
  }
}
