<?php

/**
 * Subclass for representing a row from the 'ccdefamo' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdefamo extends BaseCcdefamo
{
    protected $objtabamo=array();
    protected $objcuoesp=array();
    protected $monto="";

    /*Para la calculadora de cuotas*/
    protected $moncuopla1 = 0;
    protected $moncuoesp1 = 0;
    protected $mongravam1 = 0;
    protected $moncuminc1 = 0;
    protected $montotcuo1 = 0;
    protected $montotesp1 = 0;

    protected $moncuopla2 = 0;
    protected $moncuoesp2 = 0;
    protected $mongravam2 = 0;
    protected $moncuminc2 = 0;
    protected $montotcuo2 = 0;
    protected $montotesp2 = 0;

    protected $moncuopla3 = 0;
    protected $moncuoesp3 = 0;
    protected $mongravam3 = 0;
    protected $moncuminc3 = 0;
    protected $montotcuo3 = 0;
    protected $montotesp3 = 0;

    protected $moncuopla4 = 0;
    protected $moncuoesp4 = 0;
    protected $mongravam4 = 0;
    protected $moncuminc4 = 0;
    protected $montotcuo4 = 0;
    protected $montotesp4 = 0;

   /*public function setCantcuoesp($val){
     $this->cantcuoesp = $val;
   }

   public function getCantcuoesp(){
     return $this->cantcuoesp;
   }*/

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

   public function getMonapr()
   {
    $credit = $this->getCccredit();
    if($credit){return $credit->getMonapr();}
    else return '';
   }

    public function getNompar()
   {
    $partid = $this->getCcpartid();
    if($partid){return $partid->getNompar();}
    else return '';
   }

    public function getNompro()
   {
    $progra = $this->getCcprogra();
    if($progra){return $progra->getNompro();}
    else return '';
   }

 public function hydrate(ResultSet $rs, $startcol = 1)
  {
    parent::hydrate($rs,$startcol);
  $parcre= CcparcrePeer::buscarProParCre($this->getCcprograId(),$this->getCcpartidId(),$this->getCccreditId());
if ($parcre)
  $this->monto=number_format($parcre->getMontot(),2,',','.');
  }


}
