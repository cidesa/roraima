<?php

/**
 * Subclass for representing a row from the 'viaciuente' table.
 *
 *
 *
 * @package lib.model
 */
class Viaciuente extends BaseViaciuente
{
  protected $nompai = '';
  protected $nomciu = '';
  protected $nomedo = '';
  protected $codpai = '';
  protected $codedo = '';

  public function afterHydrate(){

    $c = new Criteria();
    $c->add(OcciudadPeer::ID,self::getOcciudadid());
    $reg = OcciudadPeer::doSelectone($c);

    if ($reg)
    {
      $codpai = $reg->getCodpai();
      $codedo = $reg->getCodedo();
      $codciu = $reg->getCodciu();
    }

    $this->nomedo = Herramientas::getXx('ocestado',array('codedo','codpai'),array($codedo, $codpai),'nomedo');
    $this->nomciu = Herramientas::getXx('occiudad',array('codedo','codpai','codciu'),array($codedo, $codpai, $codciu),'nomciu');
    $this->nompai = Herramientas::getXx('ocpais',array('codpai'),array($codpai),'nompai');
  }
}
