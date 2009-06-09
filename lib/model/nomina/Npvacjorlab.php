<?php

/**
 * Subclass for representing a row from the 'npvacjorlab' table.
 *
 *
 *
 * @package lib.model
 */
class Npvacjorlab extends BaseNpvacjorlab
{
	protected $nomnom='';

 function getNomnom(){

 	$c= new Criteria();
 	$c->add(NpnominaPeer::CODNOM,self::getCodnom());
	$resul=NpnominaPeer::doselectOne($c);

  if ($resul)
   {return $resul->getNomnom();
   }
   else
   return null;
 }
}
