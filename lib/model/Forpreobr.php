<?php

/**
 * Subclase para representar una fila de la tabla 'forpreobr'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Forpreobr extends BaseForpreobr
{
    protected $objobr=array();
    protected $objper=array();
    protected $objorg=array();
    protected $objfin=array();
    protected $longitud="";
    protected $mascara="";
    protected $cadenaper="";
    protected $cadenafin="";
    protected $cadenaorg="";
    protected $filper="";
    protected $filfin="";
    protected $filorg="";
    protected $totfil="0,00";

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

    public function getNomobr()
    {
      return Herramientas::getX('CODOBR','Fordefobr','Nomobr',self::getCodobr());
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
