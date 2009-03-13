<?php

/**
 * Subclass for representing a row from the 'atdetayu' table.
 *
 *
 *
 * @package lib.model
 */
class Atdetayu extends BaseAtdetayu
{
  protected $aprobado = '';
  protected $codgru = '';
  protected $desgru = '';

  protected $coddon = '';
  protected $desdon = '';

  public function afterHydrate(){

    $atdonaciones = $this->getAtdonaciones();

    if($atdonaciones){


      $this->coddon = $atdonaciones->getCoddon();
      $this->desdon = $atdonaciones->getDesdon();


    }

  }

}
