<?php

/**
 * nomdefespperfil actions.
 *
 * @package    siga
 * @subpackage nomdefespperfil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespperfilActions extends autonomdefespperfilActions
{
protected function updateNpperfilFromRequest()
  {
    $npperfil = $this->getRequestParameter('npperfil');

    if (isset($npperfil['codperfil']))
    {
      $this->npperfil->setCodperfil(str_pad($npperfil['codperfil'],4,'0',STR_PAD_LEFT));
    }
    if (isset($npperfil['desperfil']))
    {
      $this->npperfil->setDesperfil($npperfil['desperfil']);
    }
  }
}
