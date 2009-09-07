<?php

/**
 * Subclase para representar una fila de la tabla 'atdetrecrub'.
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
class Atdetrecrub extends BaseAtdetrecrub
{
  protected $recaudo = false;
  protected $desrec = '';
  protected $requerido = '';

  public function afterHydrate(){

    $atrecaud = $this->getAtrecaud();
    if($atrecaud)
    {
    	$this->desrec = $atrecaud->getDesrec();
        if (!self::getRequerido()) $this->requerido = $atrecaud->getRequerido();
    }

  }


  public function getRecaudid()
  {
    return $this->getAtrecaudId();
  }

  public function setRecaudid($id)
  {
    $this->setAtrecaudId($id);
  }
}
