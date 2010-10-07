<?php

/**
 * Subclass for representing a row from the 'forotrcrepre'.
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
class Forotrcrepre extends BaseForotrcrepre
{
    protected $objpar=array();
    protected $objper=array();
    protected $objorg=array();
    protected $objfin=array();
    protected $longitud="";
    protected $mascara="";
    protected $mascarapar="";
    protected $cadenaper="";
    protected $cadenafin="";
    protected $cadenaorg="";
    protected $filper="";
    protected $filfin="";
    protected $filorg="";
    protected $totfil="0,00";

  public function afterHydrate()
  {
        /* $c= new Criteria();
	 $c->add(CadisrgoPeer::REQART,self::getReqart());
	 $c->add(CadisrgoPeer::CODART,self::getCodart());
	 $c->add(CadisrgoPeer::CODCAT,self::getCodcat());
	 $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
	 $result=CadisrgoPeer::doSelect($c);
	 if ($result)
	 {
            foreach ($result as $datos)
            {
               $monrgo=number_format($datos->getMonrgo(),2,',','.');
               $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
               $this->datosrecargo=$this->datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $monrgo .'_'. $datos->getCodpar(). '!';
            }
	 }*/
  }

   public function getLongitud()
   {
     return strlen(H::getObtener_FormatoCategoria_Formulacion());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascara()
   {
     return H::getObtener_FormatoCategoria_Formulacion();
   }

   public function setMascara()
   {
     return $this->mascara;
   }

   public function getMascarapar()
   {
     return H::getObtener_FormatoPartida_Formulacion();
   }

   public function setMascarapar()
   {
     return $this->mascarapar;
   }   

    public function getNomparegr()
    {
      return Herramientas::getX('CODPAREGR','Fordefparegr','Nomparegr',self::getCodparegr());
    }

    public function getDestip()
    {
      return Herramientas::getX('CODTIP','Fortiptit','Destip',self::getCodtip());
    }

    public function getNomext()
    {
      if (self::getCodfin()=='Mixtos')
          return "Diversos";
      else return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getCodfin());
    }

    public function getNomorg()
    {
      return Herramientas::getX('CODORG','Fordeforgpub','Nomorg',self::getCodorg());
    }
}
