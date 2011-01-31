<?php

/**
 * Subclass for representing a row from the 'ccparrec' table.
 *
 *
 *
 * @package lib.model
 */
class Ccparrec extends BaseCcparrec
{

  public function getNumexp()
   {
    $credit = $this->getCccredit();
    if($credit){return $credit->getNumexp();}
    else return '';
   }

  public function getNomben()
   {
    $credit = $this->getCccredit();
    if($credit)
    {
     $beneficiario=$credit->getCcbenefi();
     if ($beneficiario)
        return $beneficiario->getNomben();
     else
        return "";
    }
    else return '';
   }

}
