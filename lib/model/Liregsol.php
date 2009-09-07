<?php

/**
 * Subclass for representing a row from the 'liregsol'.
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
class Liregsol extends BaseLiregsol
{

  protected $codcom = '';
  protected $descom = '';
  protected $coduniste = '';
  protected $desuniste = '';
  protected $nomemp = '';

  public function __toString()
  {
    return $this->getDessol();
  }

 public function afterHydrate()
 {
    $lidatste = $this->getLidatste();
    $licomlic = $this->getLicomlic();


    if($lidatste)
    {
      $this->coduniste = $lidatste->getCoduniste();
      $this->desuniste = $lidatste->getDesuniste();
    }

    if($licomlic)
    {
      $this->codcom = $licomlic->getCodcom();
      $this->descom = $licomlic->getDescom();
    }

     $c = new Criteria();
     $c->add(NphojintPeer::CODEMP,self::getCodemp());
     $empleado = NphojintPeer::doSelectOne($c);
     if ($empleado)
     {
     	$this->nomemp=$empleado->getNomemp();
     }

  }

}
