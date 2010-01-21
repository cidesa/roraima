<?php

/**
 * Subclass for representing a row from the 'ccsolliq' table.
 *
 *
 *
 * @package lib.model
 */
class Ccsolliq extends BaseCcsolliq
{
  protected $obj=array();
  protected $ccgerenc_id = 0;

  public function getCcgerencId(){
  	return $this->ccgerenc_id;
  }

  public function setCcgerencId($val){
  	$this->ccgerenc_id = $val;
  }

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

    public function getFecdesliq()
   {
    $value=CccuadesPeer::retrieveByPK(self::getCccuadesId());
    if ($value)
    {
    	$this->fecdesliq=date('d/m/Y',strtotime($value->getFecdes()));
     return $this->fecdesliq;
    }else
    {
      $this->fecdesliq='';
     return $this->fecdesliq;
    }
   }

   public function getEstatus()
   {
     $value=CccuadesPeer::retrieveByPK(self::getCccuadesId());
    if ($value)
    {
      if ($value->getFecdes()>=self::getFecliq())
    	$this->estatus='VIGENTE';
      else $this->estatus='VENCIDO';
     return $this->estatus;
    }else
    {
      $this->estatus='';
     return $this->estatus;
    }
   }
}
