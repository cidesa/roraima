<?php

/**
 * nomdefespban actions.
 *
 * @package    siga
 * @subpackage nomdefespban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespbanActions extends autonomdefespbanActions
{
	protected function updateNpbancosFromRequest()
	{
		$npbancos = $this->getRequestParameter('npbancos');

	if (isset($npbancos['codban']))
    {
      $this->npbancos->setCodban(str_pad($npbancos['codban'],2,'0',STR_PAD_LEFT));
    }
    if (isset($npbancos['nomban']))
    {
      $this->npbancos->setNomban($npbancos['nomban']);
    }
  }
	
}
