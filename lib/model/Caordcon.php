<?php

/**
 * Subclass for representing a row from the 'caordcon'.
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
class Caordcon extends BaseCaordcon
{
    protected $rifpro="";
    protected $tipprc="";
    protected $durdia="";
    protected $codgru="";
    protected $obj=array();
    protected $obj2=array();
    protected $obj3=array();
    protected $obj4=array();
    protected $longitud="";
    protected $mascara="";    

    public function getLongitud()
   {
     return strlen(H::getX('Codemp', 'Cpdefniv', 'Forpre', '001'));
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

   public function getMascara()
   {
     return H::getX('Codemp', 'Cpdefniv', 'Forpre', '001');
   }

   public function setMascara()
   {
     return $this->mascara;
   }

   public function getStacon2()
    {
     if (self::getId())
     {
      if (self::getStacon()=='N')
      {
      	$si="Anulada el ".date('d/m/Y',strtotime(self::getFecanu()));
      }
      else{
        $si="En Proceso...";
      }
     }else { $si="";}

   return $si;
    }

  public function getRifpro()
  {
   return Herramientas::getX('CODPRO','Caprovee','Rifpro',self::getCodpro());
  }

  public function getNompro()
  {
   return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }

  public function getDurdia()
  {
   return H::restaFechas(date('d-m-Y',$this->fecini), date('d-m-Y',$this->feccul));
  }
}
