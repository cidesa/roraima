<?php

/**
 * Subclass for representing a row from the 'atdetrecrub' table.
 *
 *
 *
 * @package lib.model
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
