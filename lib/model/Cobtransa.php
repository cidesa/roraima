<?php

/**
 * Subclass for representing a row from the 'cobtransa'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cobtransa extends BaseCobtransa
{
    protected $rifpro="";
	protected $nompro="";
	protected $objdocumentos=array();
	protected $objformapagos=array();
	protected $objrecargos=array();
	protected $objdescuentos=array();
	protected $totmonpag="0,00";
	protected $totmonrec="0,00";
	protected $totmondes="0,00";
	protected $totmonnet="0,00";
	protected $filasdet="0";
	protected $monpagado="0";
	protected $hayingreso="N";
	protected $filasfor="0";
	protected $botones="";
	protected $docfil="";
	protected $orifil="";
	protected $recvie="";
	protected $desvie="";
	protected $fildet="";
	protected $codtip="";
	protected $destip="";
	protected $filgenmov="";
	protected $totalcomprobantes="";
	protected $comprobante="";
	protected $idrefer="";


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
    $resp=array();
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

	public function getRecargos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= CarecargPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getCodrgo()] = $reg->getCodrgo()." - ".$reg->getNomrgo();
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

	public function getBancos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= FaallbancosPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getCtaban()] = $reg->getCtaban()." - ".$reg->getBanco();
	        }
       }
       else
       {
       	$resp[] = "General";
       }
		return $resp;
	}

	 public function getIdrefer()
  {
    return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
  }
}
