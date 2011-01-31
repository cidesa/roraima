<?php

/**
 * Subclass for representing a row from the 'formetotrcre'.
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
class Formetotrcre extends BaseFormetotrcre
{
    protected $obj=array();
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

   public function getMascarapar()
   {
     return H::getObtener_FormatoPartida_Formulacion();
   }

   public function setMascarapar()
   {
     return $this->mascarapar;
   }

   public function getLongitud()
   {
     return strlen(H::getObtener_FormatoPartida_Formulacion());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

    public function getNomparegr()
    {
      return Herramientas::getX('CODPAREGR','Fordefparegr','Nomparegr',self::getCodparegr());
    }

    public function getDesact()
    {
      return Herramientas::getX('CODACT','Fordefact','Desact',self::getCodact());
    }

    public function getNomparing()
    {
      if (self::getCodfin()=='Mixtos')
          return "Diversos";
      else return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getCodfin());
    }

     public function getNomorg()
    {
      return Herramientas::getX('CODORG','Fordeforgpub','Nomorg',self::getCodorg());
    }

    public function getDestip()
    {
      return Herramientas::getX('CODTIP','Fortiptit','Destip',self::getCodtip());
    }

    public function getDesmet()
    {
      return Herramientas::getX('CODMET','Fordefmet','Desmet',self::getCodmet());
    }

    public function getDespro()
    {
      return Herramientas::getX('CODPRO','Fordefpro','Despro',self::getCodpro());
    }

}
