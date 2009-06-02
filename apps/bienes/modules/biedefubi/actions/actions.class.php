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
    if (isset($bnubibie['codubiadm']))
    {
      $this->bnubibie->setCodubiadm($bnubibie['codubiadm']);
    }

  }

  public function executeAjax()
  {
   if ($this->getRequestParameter('ajax')=='1')
   {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $codigo=$this->getRequestParameter('codigo');
    $c= new Criteria();
    $c->add(BnubicaPeer::CODUBI,$codigo);
    $result=BnubicaPeer::doSelectOne($c);
    if ($result)
    {
      $dato=$result->getDesubi();
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    else
    {
      $javascript="alert('El código no existe...');";
      $dato="";
      $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
    }


     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  }

}
