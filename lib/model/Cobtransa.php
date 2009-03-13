<?php

/**
 * Subclass for representing a row from the 'cobtransa' table.
 *
 *
 *
 * @package lib.model
 */
class Cobtransa extends BaseCobtransa
{
    protected $rifpro="";
	protected $nompro="";
	protected $objdocumentos=array();
	protected $objformapagos=array();


  public function afterHydrate()
  {
    $c=new Criteria();
	$c->add(FaclientePeer::CODPRO,self::getCodcli());
	$cliente = FaclientePeer::doSelectOne($c);
    if($cliente)
    {
    	$this->rifpro=$cliente->getRifpro();
    	$this->nompro=$cliente->getNompro();
    }

  }

	public function getFatipmovcre()
	{
		$c=new Criteria();
		$c->add(FatipmovPeer::DEBCRE,"C");
        $datos= FatipmovPeer::doSelect($c);
		 if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getId()] = $reg->getDesmov();
	        }
       }
		return $resp;
	}
}
