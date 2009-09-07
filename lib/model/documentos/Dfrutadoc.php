<?php

/**
 * Subclase para representar una fila de la tabla 'dfrutadoc'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
