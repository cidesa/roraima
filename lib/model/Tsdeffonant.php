<?php

/**
 * Subclase para representar una fila de la tabla 'tsdeffonant'.
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
class Tsdeffonant extends BaseTsdeffonant
{
   protected $longitud="";

   public function getLongitud()
   {
     return strlen(Herramientas::getObtener_FormatoCategoria());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }

    public function getNomcat()
    {
        return Herramientas::getX('codcat','Npcatpre','nomcat',self::getCodcat());
    }

    public function getNomben()
    {
        return Herramientas::getX('cedrif','Opbenefi','nomben',self::getCedrif());
    }

    public function getNomcue()
    {
        return Herramientas::getX('numcue','Tsdefban','nomcue',self::getNumcue());
    }

    public function getDestipmovsal()
    {
        return Herramientas::getX('codtip','Tstipmov','destipmovsal',self::getTipmovsal());
    }

    public function getNommovren()
    {
        return Herramientas::getX('tipcau','Cpdoccau','nomext',self::getTipmovren());
    }
    public function getDesuniadm()
    {
        return Herramientas::getX('coduniadm','Tsuniadm','desuniadm',self::getCoduniadm());
    }

    public function getDesunieje()
    {
        return Herramientas::getX('codubi','Bnubica','desubi',self::getUnieje());
    }

    public function getMonmin()
    {
      $opdefemp=OpdefempPeer::doSelectOne(new Criteria());
      if ($opdefemp)
          $valunitri=$opdefemp->getUnitri();
      else $valunitri=0;
      if (self::getMonmincon()!=0)
          $monto=self::getMonmincon()*$valunitri;
      else $monto=0;

      return number_format($monto,2,',','.');
    }

    public function getMonmax()
    {
      $opdefemp=OpdefempPeer::doSelectOne(new Criteria());
      if ($opdefemp)
          $valunitri=$opdefemp->getUnitri();
      else $valunitri=0;
      if (self::getMonmaxcon()!=0)
          $monto=self::getMonmaxcon()*$valunitri;
      else $monto=0;
      
      return number_format($monto,2,',','.');
    }
}
