<?php

/**
 * Subclass for representing a row from the 'attipayu' table.
 *
 *
 *
 * @package lib.model
 */
class Attipayu extends BaseAttipayu
{

  protected $nompre = "";

  public function __toString()
  {
    return $this->desayu;
  }

  public function afterHydrate()
  {

    $c = new Criteria();
    $c->add(CpdeftitPeer::NOMPRE,CpdeftitPeer::NOMPRE." LIKE '".$this->getCodpre()."%'",Criteria::CUSTOM);
    $cpdeftit = CpdeftitPeer::doSelectOne($c);
//H::PrintR($c);
    if($cpdeftit) $this->nompre = $cpdeftit->getNompre();

  }


}
