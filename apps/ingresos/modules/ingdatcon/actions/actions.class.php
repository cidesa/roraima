<?php

/**
 * ingdatcon actions.
 *
 * @package    siga
 * @subpackage ingdatcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdatconActions extends autoingdatconActions
{
	  protected function updateCiconrepFromRequest()
  {
    $ciconrep = $this->getRequestParameter('ciconrep');

   	
    if (isset($ciconrep['rifcon']))
    {
      $this->ciconrep->setRifcon($ciconrep['rifcon']);
    }
    if (isset($ciconrep['nomcon']))
    {
      $this->ciconrep->setNomcon($ciconrep['nomcon']);
    }
    if (isset($ciconrep['nitcon']))
    {
      $this->ciconrep->setNitcon($ciconrep['nitcon']);
    }
    if (isset($ciconrep['naccon']))
    {
      $this->ciconrep->setNaccon($ciconrep['naccon']);
    }
    if (isset($ciconrep['dircon']))
    {
      $this->ciconrep->setDircon($ciconrep['dircon']);
    }
    if (isset($ciconrep['ciucon']))
    {
      $this->ciconrep->setCiucon($ciconrep['ciucon']);
    }
    if (isset($ciconrep['cpocon']))
    {
      $this->ciconrep->setCpocon($ciconrep['cpocon']);
    }
    if (isset($ciconrep['apocon']))
    {
      $this->ciconrep->setApocon($ciconrep['apocon']);
    }
    if (isset($ciconrep['telcon']))
    {
      $this->ciconrep->setTelcon($ciconrep['telcon']);
    }
    if (isset($ciconrep['faxcon']))
    {
      $this->ciconrep->setFaxcon($ciconrep['faxcon']);
    }
    if (isset($ciconrep['emacon']))
    {
      $this->ciconrep->setEmacon($ciconrep['emacon']);
    }
    if (isset($ciconrep['urlcon']))
    {
      $this->ciconrep->setUrlcon($ciconrep['urlcon']);
    }
    if (isset($ciconrep['tipcon']))
    {
      $this->ciconrep->setTipcon($ciconrep['tipcon']);
    }
    $this->ciconrep->setRepcon('C');
  }
	
}
