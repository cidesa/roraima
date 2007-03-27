<?php

/**
 * Subclass for representing a row from the 'npfalper' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npfalper extends BaseNpfalper
{
  public function getNomemp()
  {
      $c = new Criteria();
  	  $c->add(NphojintPeer::CODEMP,str_pad(self::getCodemp(),3,'0',STR_PAD_LEFT));
  	  $nombre = NphojintPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomemp();
	  else 
	    return '<!Nombre no encontrado!>';
  }

  public function getDesmotfal()
  {
      $c = new Criteria();
  	  $c->add(NpmotfalPeer::CODMOTFAL,self::getCodmot());
  	  $motivo = NpmotfalPeer::doSelectone($c);
	  if ($motivo)
	  	return $motivo->getDesmotfal();
	  else 
	    return '<!Nombre no encontrado!>';
  }

  public function getNomnom()
  {
  	  $c = new Criteria();
  	  $c->add(NpnominaPeer::CODNOM,self::getCodnom());
  	  $nombre = NpnominaPeer::doSelectone($c);
	  if ($nombre)
	  	return $nombre->getNomnom();
	  else 
	    return ' ';
  } 
	
	public function getDesmotfal()
	{

		$c = new Criteria();
		$c->add(NpmotfalPeer::CODMOTFAL,self::getCodmot());
		$registro = NpmotfalPeer::doSelectOne($c);
		if($registro) return $registro->getDesmotfal();
		else return null; 
		
	}
}
