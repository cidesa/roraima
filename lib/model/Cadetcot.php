<?php

/**
 * Subclass for representing a row from the 'cadetcot' table.
 *
 *
 *
 * @package lib.model
 */
class Cadetcot extends BaseCadetcot
{
   protected $desart="";
   protected $priori="";

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->desart= Herramientas::getX('CODART','Caregart','Desart',self::getCodart());;
   }



  public function getProvee()
  {
     $c = new Criteria();
  $c->add(CacotizaPeer::REFCOT,self::getRefcot());
  $c->addJoin(CaproveePeer::CODPRO,CacotizaPeer::CODPRO);
  $datos = CaproveePeer::doSelectone($c);
  if ($datos)
          return $datos->getCodpro().'  '.$datos->getNompro();
    else
          return Herramientas::REGVACIO;
  }

   public function setProvee($val)
   {
    $this->provee = $val;

  }
}
