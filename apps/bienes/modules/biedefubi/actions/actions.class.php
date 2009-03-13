<?php

/**
 * biedefubi actions.
 *
 * @package    siga
 * @subpackage biedefubi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefubiActions extends autobiedefubiActions
{
  public function executeEdit()
  {
    $this->setVars();
    parent::executeEdit();
  }

  public function setVars()
  {
    $this->forubi = Herramientas::ObtenerFormato('Bndefins','forubi');
    $this->lonubi=strlen($this->forubi);
  }

  protected function updateBnubibieFromRequest()
  {
    $bnubibie = $this->getRequestParameter('bnubibie');
    $this->setVars();

    if (isset($bnubibie['codubi']))
    {
      $this->bnubibie->setCodubi($bnubibie['codubi']);
    }
    if (isset($bnubibie['desubi']))
    {
      $this->bnubibie->setDesubi($bnubibie['desubi']);
    }
    if (isset($bnubibie['dirubi']))
    {
      $this->bnubibie->setDirubi($bnubibie['dirubi']);
    }
  }


}
