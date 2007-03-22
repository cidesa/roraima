<?php

/**
 * nomdefesppai actions.
 *
 * @package    siga
 * @subpackage nomdefesppai
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesppaiActions extends autonomdefesppaiActions
{
	 protected function updateNppaisFromRequest()
  {
    $nppais = $this->getRequestParameter('nppais');

    if (isset($nppais['codpai']))
    {
      $this->nppais->setCodpai(str_pad($nppais['codpai'],4,'0',STR_PAD_LEFT));      
    }
    if (isset($nppais['nompai']))
    {
      $this->nppais->setNompai($nppais['nompai']);
    }
  }

  
}
