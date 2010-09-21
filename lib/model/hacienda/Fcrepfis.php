<?php

/**
 * Subclass for representing a row from the 'fcrepfis'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcrepfis.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcrepfis extends BaseFcrepfis
{
	private $rifcon;
	private $nomcon;
	private $dircon;
	private $naccon;
	private $tipcon;
	protected $grid= array();
	protected $griddistribucion= array();
	protected $totdec='';


  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->codestinm = Herramientas::getX_vacio('nroinm','fcdetinm','codestinm',self::getNumlic());
      $this->desestinm = Herramientas::getX_vacio('nroinm','fcdetinm','desestinm',self::getNumlic());
      $this->anoava    = Herramientas::getX_vacio('nroinm','fcdetinm','anoava',self::getNumlic());
      $this->codzon    = Herramientas::getX_vacio('nroinm','fcdetinm','codzon',self::getNumlic());
      $this->mensaje = self::getEstinm()=='D' ? 'DESINCORPORADO' : '' ;

/*
       $c = new Criteria();
       $c->add(FcsollicPeer::NUMSOL,$reg->getNumsol());
       $regi = FcsollicPeer::doSelectOne($c);
       if ($regi)
       {
         $this->dircon=$regi->getDircon();
         $this->nomcon=$regi->getNomcon();
 		 $this->naccon = $regi->getNaccon();
		 $this->tipcon = $regi->getTipcon();


       }*/


   }

	public static function Fuentedeingresor()
    {
    	$tira=array();
 		$c = new Criteria();
 		$c->addAscendingOrderByColumn(FcfueprePeer :: CODFUE);
 		$reg = FcfueprePeer::doSelect($c);
 		foreach($reg as $valor)
 		{
 			$tira += array($valor->getCodfue() => $valor->getCodfue()." - ".$valor->getNomfue());
 		}
 		return $tira;

    }

	public static function Fuentedeingresos()
    {
    	$tira=array();
 		$c = new Criteria();
 		$c->addAscendingOrderByColumn(FcfueprePeer :: CODFUE);
 		$reg = FcfueprePeer::doSelect($c);
 		foreach($reg as $valor)
 		{
 			$tira += array($valor->getCodfue() => $valor->getCodfue()." - ".$valor->getNomfue());
 		}
 		return $tira;

    }
/*
	public function datosContribuyente()
	  {

	  	  $rif=Herramientas::getX('NUMREF','Fcdeclar','Rifcon',self::getNumlic());
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::RIFCON,$rif);
	  	  $this->contribuyente = FcconrepPeer::doSelect($c);
	  	  if ($this->contribuyente)
		  	{
		  		$this->rifcon = $this->contribuyente[0]->getRifcon();
		  		$this->nomcon = $this->contribuyente[0]->getNomcon();
		  		$this->dircon = $this->contribuyente[0]->getDircon();
		  		$this->naccon = $this->contribuyente[0]->getNaccon();
		  	    $this->tipcon = $this->contribuyente[0]->getTipcon();
		  	    return true;
		  	}
		  	else
		  	{
		  		$this->rifcon = 'No encontrado';
		  		$this->nomcon = 'No encontrado';
		  		$this->dircon = 'No encontrado';
		  		$this->naccon = 'No encontrado';
		  	    $this->tipcon = 'No encontrado';
		  	    return false;
		  	}

	  }*/
}

