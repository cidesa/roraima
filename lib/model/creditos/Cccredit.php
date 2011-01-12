<?php

/**
 * Subclass for representing a row from the 'cccredit' table.
 *
 *
 *
 * @package lib.model
 */
class Cccredit extends BaseCccredit
{
  protected $objdeducc=array();
  protected $objdesemb=array();
  protected $objfiador=array();
  protected $objgarant=array();
  protected $objconcre=array();
  protected $objopciones=array();
  protected $objcuades=array();
  protected $objreccre=array();
  protected $orddes="";
  protected $ccprogra_id=0;
  protected $ccpartid_id=0;
  protected $mondes=0;
  protected $fecdes="";
  protected $cccuades='';
  protected $cedrif='';
  protected $cedrifper='';
  protected $nomben='';
  protected $codage='';
  protected $dirage='';
  protected $autogen='';
  //protected $objopciones=array();
  protected $idcat="";
  protected $gerencia='';
  protected $usuario='';
  protected $apldeduc=false;
  protected $concre = "";
  protected $fecfordmy = "";
  protected $ente = "";
  protected $conben = "";
  protected $compro = "";

 public function __toString(){
    return $this->getNumexp();
   }

  public function getConcre(){
   return Herramientas::getX('id','cccondic','nomcondic',self::getCccondicId());
  }

  public function getFecfordmy(){
   return self::getFecapr("d/m/Y");
  }

  public function getNomben(){
   return Herramientas::getX('id','ccbenefi','nomben',self::getCcbenefiId());
  }

  public function getEnte(){
   $c = new Criteria();
   $c->add(CcbenefiPeer::ID,self::getCcbenefiId());
   $c->addJoin(CcbenefiPeer::CCTIPUPS_ID,CctipupsPeer::ID);
   $cctipups = CctipupsPeer::doSelectOne($c);

   if($cctipups){
     return $cctipups->getNomtipups();
   }else{
     return "";
   }
  }

  public function getConben(){
   $c = new Criteria();
   $c->add(CcbenefiPeer::ID,self::getCcbenefiId());
   $c->addJoin(CcbenefiPeer::CCCONDIC_ID,CccondicPeer::ID);
   $cccondic = CccondicPeer::doSelectOne($c);

   if($cccondic){
     return $cccondic->getNomcondic();
   }else{
     return "";
   }
  }

  public function getModalidad(){
   return Herramientas::getX('id','ccpartid','nompar',self::getCcpartidId());
  }

    public function getCedrif(){
   return Herramientas::getX('id','ccbenefi','cedrif',self::getCcbenefiId());
  }

  public function getCedrifper(){
   $ced = Herramientas::getX('id','ccbenefi','cedrif',self::getCcbenefiId());
   $ccbenefi = CcbenefiPeer::retrieveByPk(self::getCcbenefiId());
   $per = Herramientas::getX('id','ccperpre','prefijo',$ccbenefi->getCcperpreId());
   return $per."-".$ced;
  }

    public function getCodage(){
   return Herramientas::getX('id','ccagenci','codage',self::getCcagenciId());
  }

    public function getDirage(){
   return Herramientas::getX('id','ccagenci','dirage',self::getCcagenciId());
  }

  public function getCcprograId(){
  	return $this->ccprogra_id;
  }

  public function setCcprograId($val){
  	$this->ccprogra_id=$val;
  }

  public function getCcpartidId(){
  	return $this->ccpartid_id;
  }

  public function setCcpartidId($val){
  	$this->ccpartid_id=$val;
  }

   public function getApldeduc()
   {
   	  $c= new Criteria();
   	  $c->add(CcdedcrePeer::CCCREDIT_ID,self::getId());
      $deduccion= CcdedcrePeer::doSelect($c);
      if ($deduccion)
      {
      	$this->apldeduc=true;
      	return $this->apldeduc;
      }else {$this->apldeduc=false;
      	return $this->apldeduc;}
   }

  public function setApldeduc($val){
  	$this->apldeduc=$val;
  }

  public function getNumsol(){
   return Herramientas::getX('id','ccsolici','numsol',self::getCcsoliciId());
  }

   public function getCodsol(){
   return Herramientas::getX('id','ccsolici','numsol',self::getCcsoliciId());
  }

  public function getCompro()
  {
      $cpcompro = $this->getCpcompro();
      if($cpcompro) return $cpcompro->__toString();
      else C::REGVACIO;
  }

}
