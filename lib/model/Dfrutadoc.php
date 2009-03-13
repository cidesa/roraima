<?php

/**
 * Subclass for representing a row from the 'dfrutadoc' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Dfrutadoc extends BaseDfrutadoc
{
  protected $nomuni = '';
  protected $tipdoc = '';

  public function afterHydrate()
  {

    $this->nomuni = Herramientas::getX('id','acunidad','nomuni',$this->getIdAcunidad());

    $c = new Criteria();
    $c->add(DftabtipPeer::ID,$this->getIdDftabtip());

    $dftabtip = DftabtipPeer::doSelectOne($c);

    //H::PrintR($dftabtip);

    if($dftabtip) $this->tipdoc = $dftabtip->getTipdoc().' - '.Documentos::getDesDoc($dftabtip->getTipdoc());

    //$this->tipdoc = Herramientas::getX('id','dftabtip','tipdoc',$this->getIdDftabtip());

  }


}
