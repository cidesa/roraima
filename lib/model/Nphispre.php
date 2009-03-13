<?php

/**
 * Subclass for representing a row from the 'nphispre' table.
 *
 *
 *
 * @package lib.model
 */
class Nphispre extends BaseNphispre
{
	protected $salant = 0.00;
	protected $moncuota = 0.00;
	protected $signo = false;


   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      	parent::hydrate($rs, $startcol);
      	$myobj=NominaConceptos::obtenerObjNpasiconemp($this->getCodtippre(),$this->getCodemp());
 		if ($myobj){
		   $this->moncuota= $myobj->getCantidad();
	    }
		else
		 {
		   $this->moncuota= 0.00;
		 }
   }

  public function getSalant()
  {
  	    $objNpasiconemp=NominaConceptos::obtenerObjNpasiconemp($this->getCodtippre(),$this->getCodemp());
 		if ($objNpasiconemp)
	  	 	return $objNpasiconemp->getAcumulado();
  		else
  			return 0.00;
  }


  public function getNomemp()
  {
  	  $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,self::getCodemp());
  	  $nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else
	    return ' ';
  }



  public function getNomtippre()
  {
  	  $c = new Criteria();
  	  $c->add(NptipprePeer::CODTIPPRE,self::getCodtippre());
  	  $nombre = NptipprePeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getDestippre();
	  else
	    return ' ';
  }
}
