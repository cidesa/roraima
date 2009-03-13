<?php

/**
 * Subclass for representing a row from the 'atdetrecayu' table.
 *
 *
 *
 * @package lib.model
 */
class Atdetrecayu extends BaseAtdetrecayu
{
  protected $entregado = false;
  protected $desrec = '';
  protected $requerido = '';

  public function afterHydrate(){

    $atrecaud = $this->getAtrecaud();
    if($atrecaud)
    {
       $this->desrec = $atrecaud->getDesrec();
       if ($atrecaud->getRequerido()=="S")
           $this->requerido="Si";
       else if ($atrecaud->getRequerido()=="N")
           $this->requerido="No";
       else  $this->requerido="";
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
