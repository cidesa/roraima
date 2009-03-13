<?php

/**
 * Subclass for representing a row from the 'liressol' table.
 *
 *
 *
 * @package lib.model
 */
class Liressol extends BaseLiressol
{
  protected $nomempemi = '';
  protected $nomempfir = '';
  protected $numsol = '';
  protected $dessol = '';
  protected $coduniste='';
  protected $desuniste='';


 public function afterHydrate()
 {

    $liregsol = $this->getLiregsol();

    if($liregsol)
    {
      $this->numsol = $liregsol->getNumsol();
      $this->dessol = $liregsol->getDessol();
      $lidatste = $liregsol->getLidatste();
	  if($lidatste)
	    {
	      $this->coduniste = $lidatste->getCoduniste();
	      $this->desuniste = $lidatste->getDesuniste();
	    }
    }

     $c = new Criteria();
     $c->add(NphojintPeer::CODEMP,self::getCodempemi());
     $empleado = NphojintPeer::doSelectOne($c);
     if ($empleado)
     {
     	$this->nomempemi=$empleado->getNomemp();
     }

     $c = new Criteria();
     $c->add(NphojintPeer::CODEMP,self::getCodempfir());
     $empleadofir = NphojintPeer::doSelectOne($c);
     if ($empleadofir)
     {
     	$this->nomempfir=$empleadofir->getNomemp();
     }


  }

}
