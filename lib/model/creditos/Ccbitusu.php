<?php

/**
 * Subclass for representing a row from the 'ccbitusu' table.
 *
 *
 *
 * @package lib.model
 */
class Ccbitusu extends BaseCcbitusu
{
  protected $loguse = "";
  protected $nomuse = "";
	public function getLoguse (){
		$c= new Criteria();
	    $c->add (UsuariosPeer::ID,self::getUsuario() ,Criteria::EQUAL);
		$s= UsuariosPeer::doSelectOne ($c);
		$loguse= $s->getLoguse();
		return $loguse;}

	public function getNomuse (){
		$c= new Criteria();
	    $c->add (UsuariosPeer::ID,self::getUsuario() ,Criteria::EQUAL);
		$s= UsuariosPeer::doSelectOne ($c);
		$nomuse= $s->getNomuse();
		return $nomuse;}

	public function getLogin (){
		$c= new Criteria();
	    $c->add(CcusuintPeer::ID,(int)self::getUsuario());
		$s= CcusuintPeer::doSelectOne ($c);
		if($s){
			$login= $s->getLogin();
		}
		else {
			$login = 'No encontrado';
		}

		return $login;
	}

	public function getNombre (){
		$c= new Criteria();
	    $c->add (CcusuintPeer::ID,(int)self::getUsuario());
		$s= CcusuintPeer::doSelectOne ($c);
		if($s){
			$nombre = $s->getNomusuint();
		}
		else {
			$nombre = 'No encontrado';
		}

		return $nombre;
	}
}
