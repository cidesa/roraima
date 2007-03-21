<?php

/**
 * nomdefespnivorg actions.
 *
 * @package    siga
 * @subpackage nomdefespnivorg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespnivorgActions extends autonomdefespnivorgActions
{
  protected function updateNpestorgFromRequest()
  {
    $npestorg = $this->getRequestParameter('npestorg');

    if (isset($npestorg['codniv']))
    {
      $this->npestorg->setCodniv(str_pad($npestorg['codniv'],16,' '));
    }
    if (isset($npestorg['desniv']))
    {
      $this->npestorg->setDesniv($npestorg['desniv']);
    }
    if (isset($npestorg['telext']))
    {
      $this->npestorg->setTelext($npestorg['telext']);
    }
  }
	
}
