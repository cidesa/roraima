<?php

/**
 * Subclass for representing a row from the 'ccsoldes' table.
 *
 *
 *
 * @package lib.model
 */
class Ccsoldes extends BaseCcsoldes
{
	protected $objcuades=array();
	protected $elaborado = "";
	protected $revisado = "";

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

   public function getNumexp()
   {
    $credit = $this->getCccredit();
    if($credit){return $credit->getNumexp();}
    else return '';
   }
}
