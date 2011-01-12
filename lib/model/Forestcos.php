<?php

/**
 * Subclass for representing a row from the 'forestcos'.
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
class Forestcos extends BaseForestcos
{
    protected $obj=array();
    protected $objper=array();
    protected $objfin=array();
    protected $cadenaper="";
    protected $cadenafin="";
    protected $filper="";
    protected $filfin="";
    protected $totfil="0,00";
    protected $mascaraart="";
    protected $longitud="";
    protected $desact="";
    protected $tipuni="";

   public function getLongitud()
   {
     return strlen(Herramientas::getMascaraArticulo());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascaraart()
   {
     return Herramientas::getMascaraArticulo();
   }

   public function setMascaraart()
   {
     return $this->mascaraart;
   }


    public function getDesmet()
    {
      return Herramientas::getX('CODMET','Fordefmet','Desmet',self::getCodmet());
    }

    public function getDespro()
    {
      return Herramientas::getX('CODPRO','Fordefpro','Despro',self::getCodpro());
    }

    public function getDesact()
    {
      return Herramientas::getX('CODACT','Fordefact','Desact',self::getCodact());
    }
    
    public function setDesact()
   {
     return $this->desact;
   }

    public function getDesart()
    {
      return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }
    
    public function getUnimed()
    {
      return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
    }

    public function getCodpar()
    {
      return Herramientas::getX('CODART','Caregart','Codpar',self::getCodart());
    }

    public function getNompar()
    {
      return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
    }

    public function getDestip()
    {
      return Herramientas::getX('CODTIP','Fortiptit','Destip',self::getCodtip());
    }

    public function getNomparing()
    {
      if (self::getCodfin()=='Mixtos')
          return "Diversos";
      else return Herramientas::getX('CODPARING','Fordefparing','Nomparing',self::getCodfin());
    }


}

