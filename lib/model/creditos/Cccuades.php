<?php

/**
 * Subclass for representing a row from the 'cccuades' table.
 *
 *
 *
 * @package lib.model
 */
class Cccuades extends BaseCccuades
{
  protected $objcuades=array();
  protected $div=false;
  protected $obj=array();
  protected $seleccionado="";
  protected $objopciones=array();


  /**  Para Recaudos por Desembolso - WYanez */
 protected $objrecdes=array();
protected $parrec = false;

 public function hydrate(ResultSet $rs, $startcol = 1)
  {
  	parent::hydrate($rs, $startcol);
  	if ($this->getId()!=''){
    	$c = new Criteria();
    	$c->add(CcparrecPeer::CCCUADES_ID,self::getId());
    	$ccpagrec = CcparrecPeer::doSelectOne($c);

      	if ($ccpagrec){
      		$this->parrec=true;
      	}

  	}
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

   public function getApldedu()
   {
    $credit = $this->getCccredit();
    if($credit)
    {
      $c= new Criteria();
      $c->add(CcdedcrePeer::CCCREDIT_ID,$credit->getId());
      $deduccion= CcdedcrePeer::doSelect($c);
      if ($deduccion)
      {
      	return true;
      }else { return false;}
    }
    else return false;
   }

   public function getDisdes()
   {
    $credit = $this->getCccredit();
    if($credit)
    {
        return $credit->getDisdes();
    }
    else return '';
   }

   public function getMontot(){
   	$c = new Criteria();
   	$c->add(CcparcrePeer::CCCREDIT_ID,$this->getCccreditId());
   	$c->add(CcparcrePeer::CCPROGRA_ID,$this->getCcprograId());
   	$c->add(CcparcrePeer::CCPARTID_ID,$this->getCcpartidId());
   	$parcre = CcparcrePeer::doSelectOne($c);
     if ($parcre)
          return number_format($parcre->getMontot(),2,',','.');
     else
        return "0,00";
   }


   public function getMonres(){
if ($this->id!="" || $this->getCcpartidId()!=null){
   	  $sql="select sum(a.monto) as montoresta from ccdetcuades a, cccuades b where b.cccredit_id = ".$this->getCccreditId()." and b.ccprogra_id = ".$this->getCcprograId()." and b.ccpartid_id = ".$this->getCcpartidId()." and a.cccuades_id = b.id limit 1";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
          $valu= (Herramientas::toFloat($this->getMontot()) - $result[0]['montoresta'] );

          return number_format($valu,2,',','.');
      }
     else
        return "0,00";
} else
        return "0,00";
   }

   public function getNumexp()
   {
    $credit = $this->getCccredit();
    if($credit){return $credit->getNumexp();}
    else return '';
   }

   public function getNompro()
   {
    $progra = $this->getCcprogra();
    if($progra){return $progra->getNompro();}
    else return '';
   }

   public function getNompar()
   {
    $partid = $this->getCcpartid();
    if($partid){return $partid->getNompar();}
    else return '';
   }
/* ESTO DA ERROR NO SE HACE!!!!!!!!!!!!!!!!!!!
   public function __toString(){
   	   return $this->getId();
   }*/

   public function __toString(){
    return $this->getOrddes();
   }
}
