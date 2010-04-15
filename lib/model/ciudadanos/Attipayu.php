<?php

/**
 * Subclase para representar una fila de la tabla 'attipayu'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
