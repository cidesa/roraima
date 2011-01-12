<?php

/**
 * Subclass for representing a row from the 'ccdetcuades' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdetcuades extends BaseCcdetcuades
{
  protected $cpcompro = null;

  public function getRifter()
   {
   	if ($this->getBenpro())
     return Herramientas::getX('id','ccbenefi','cedrif',self::getCcbenefiId());
   else
     return Herramientas::getX('id','ccpagter','rifter',self::getCcpagterid());
   }

   public function getNomter()
   {
    if ($this->getBenpro())
     return Herramientas::getX('id','ccbenefi','nomben',self::getCcbenefiId());
   else
     return Herramientas::getX('id','ccpagter','nomter',self::getCcpagterid());
   }

   public function getNomcon()
   {
     return Herramientas::getX('id','ccconcep','nomcon',self::getCcconcepid());
   }

   public function getRefcom()
   {
     if(!$this->cpcompro){
       $cccuades = $this->getCccuades();
       if($cccuades){
         $cccredit = $cccuades->getCccredit();
         if($cccredit){
           $this->cpcompro = $cccredit->getCpcompro();
           if($this->cpcompro) return $this->cpcompro->getRefcom();
           else return Constantes::REGVACIO;
         }else return Constantes::REGVACIO;
       }else return Constantes::REGVACIO;
     }else return $this->cpcompro->getRefcom();
     
   }

   public function getDescom()
   {
     if(!$this->cpcompro){
       $cccuades = $this->getCccuades();
       if($cccuades){
         $cccredit = $cccuades->getCccredit();
         if($cccredit){
           $this->cpcompro = $cccredit->getCpcompro();
           if($this->cpcompro) return $this->cpcompro->getDescom();
           else return Constantes::REGVACIO;
         }else return Constantes::REGVACIO;
       }else return Constantes::REGVACIO;
     }else return $this->cpcompro->getDescom();

   }

   public function getCodigo()
   {
     return $this->id;
   }

   public function getFecha()
   {
       $cccuades = $this->getCccuades();
       if($cccuades){
         return $cccuades->getFecdes('d/m/Y');
       }else return Constantes::REGVACIO;
   }

}
