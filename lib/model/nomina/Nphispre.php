<?php

/**
 * Subclase para representar una fila de la tabla 'nphispre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
