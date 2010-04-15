<?php

/**
 * Subclass for representing a row from the 'cobdocume'.
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
class Cobdocume extends BaseCobdocume
{
	protected $rifpro="";
	protected $nompro="";
	protected $objrecargos=array();
	protected $objdescuentos=array();
	protected $montotal="0,00";
	protected $montotalformato="0,00";
	protected $monpagado="0,00";
	protected $monpag="0,00";
	protected $monrec="0,00";
	protected $mondsc="0,00";
	protected $recargos="";
	protected $descuentos="";
	protected $marca="";
	protected $codctacli="";
	protected $totalcomprobantes=0;
    protected $refcomcon="";

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
    $this->monpagado=self::getAbodoc();//number_format(self::getAbodoc(),2,',','.');
    $this->montotalformato=$this->montotal;//number_format($this->montotal,2,',','.');
  }

	public function getFatipmovdeb()
	{
		$resp=array();
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

   public function getRefcomcon()
   {
     return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
    }
	
  public function getMonpag($val=false)
  {
    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
   public function setMonpag($val)
   {
     $this->monpag = $val;
   }	
   
  public function getMondsc($val=false)
  {
    if($val) return number_format($this->mondsc,2,',','.');
    else return $this->mondsc;

  }
  
   public function setMondsc($val)
   {
     $this->mondsc = $val;
   }
   
  public function getMonrec($val=false)
  {
    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
   public function setMonrec($val)
   {
     $this->monrec = $val;
   }   	   
   
  public function getMontotal($val=false)
  {
    if($val) return number_format($this->montotal,2,',','.');
    //else return $this->montotal;

  }
  
   public function setMontotal($val)
   {
     $this->montotal = $val;
   }     
   
  public function getMonpagado($val=false)
  {
    if($val) return number_format($this->monpagado,2,',','.');
    //else return $this->monpagado;

  }
  
   public function setMonpagado($val)
   {
     $this->monpagado = $val;
   }   
   
  public function getMontotalformato($val=false)
  {
    if($val) return number_format($this->montotalformato,2,',','.');
   // else return $this->montotalformato;

  }
  
   public function setMontotalformato($val)
   {
     $this->montotalformato = $val;
   }    

}
