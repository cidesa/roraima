<?php

/**
 * Subclass for representing a row from the 'liressol'.
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
