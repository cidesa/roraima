<?php

/**
 * Subclass for representing a row from the 'cobdocume' table.
 *
 *
 *
 * @package lib.model
 */
class Cobdocume extends BaseCobdocume
{
	protected $rifpro="";
	protected $nompro="";
	protected $objrecargos=array();
	protected $objdescuentos=array();
	protected $montotal=0;
	protected $montotalformato=0;
	protected $monpagado=0;

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
    $this->montotal= self::getMondoc() + self::getRecdoc() - self::getDscdoc();
    $this->montotalformato=number_format($this->montotal,2,',','.');
  }

	public function getFatipmovdeb()
	{
		$c=new Criteria();
		$c->add(FatipmovPeer::DEBCRE,"D");
        $datos= FatipmovPeer::doSelect($c);
		 if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getId()] = $reg->getDesmov();
	        }
       }
		return $resp;
	}

	public function getRecargos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= CarecargPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getCodRgo()] = $reg->getCodRgo()." - ".$reg->getNomrgo();
	        }
       }
		return $resp;
	}

	public function getDescuentos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= FadesctoPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getCoddesc()] = $reg->getCoddesc()." - ".$reg->getDesdesc();
	        }
       }
	  return $resp;
	}


}
