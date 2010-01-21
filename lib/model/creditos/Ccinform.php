<?php

/**
 * Subclass for representing a row from the 'ccinform' table.
 *
 *
 *
 * @package lib.model
 */
class Ccinform extends BaseCcinform
{
protected $objbaremo=array();
protected $div=false;
protected $descri='';
protected $numsol='';
protected $nomben='';
protected $edicion=false;

  public function getNomben()
   {
    $solici = $this->getCcsolici();
    if($solici)
    {
     $beneficiario=$solici->getCcbenefi();
     if ($beneficiario)
        return $beneficiario->getNomben();
     else
        return "";
    }
    else return '';
   }

   public function getNumsol()
   {
    $solici = $this->getCcsolici();
    if($solici){return $solici->getNumsol();}
    else return '';
   }

   public function getDescri()
   {
   	 return Herramientas::getX('id','ccresbar','descri',self::getCcresbarId());

   }

   public function getTipo(){
   	 return Herramientas::getX('id','ccclainf','nominf',self::getCcclainfId());
   }

   public function getEdicion(){
   	 $c = new Criteria();
   	 $c->add(CcinformPeer::CCANALIS_ID,self::getCcanalisId());
   	 $c->add(CcinformPeer::ID,self::getId());
   	 $ccinform = CcinformPeer::doSelectOne($c);
   	 if($ccinform){
   	 	return true;
   	 }
   	 else{
   	 	return false;
   	 }
   }

   public function getAnalista(){
   	 return Herramientas::getX('id','ccanalis','nomana',self::getCcanalisId());
   }

   public function getFecha(){
   	 return self::getFeccul('d/m/Y');
   }

}
