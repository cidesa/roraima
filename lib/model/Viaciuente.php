<?php

/**
 * Subclass for representing a row from the 'viaciuente'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
