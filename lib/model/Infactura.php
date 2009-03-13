<?php

/**
 * Subclass for representing a row from the 'infactura' table.
 *
 *
 *
 * @package lib.model
 */
class Infactura extends BaseInfactura
{
	  protected $rifemp="";
      protected $razsoc="";
	  protected $cedprof="";
      protected $nomprof="";
      protected $apeprof="";
      protected $telhab="";
      protected $especi="";
      protected $telemp="";
      protected $tipemp="";
      protected $codingprof="";
      protected $codmul="";
      protected $desingprof="";
      protected $desmul="";
      protected $unitri="";
      protected $codban="";
      protected $desban="";
      protected $venext="";
      protected $tipempid="";


	  public function afterHydrate(){
      //print 'hola'.$this->getCedrif(); exit;
	  if ($this->getTipper() =='P'){

      $c= new Criteria();
      $c->add(InprofesPeer::CEDPROF,$this->getCedrif());
      //$c->add(InprofesPeer::INESPECI_ID,InespeciPeer::ID);
      $profesional=InprofesPeer::doSelectOne($c);

 	  if ($profesional)
 	  {
 	  	$this->venext=$profesional->getVenext();
        $this->cedprof=$profesional->getCedprof();
        $this->nomprof=$profesional->getNomprof();
        $this->apeprof=$profesional->getApeprof();
        $this->telhab=$profesional->getTelhab();
        $this->especi=$profesional->getDesespeci();

 	  }
	  }
	  else{

 	  $c= new Criteria();
      $c->add(InempresaPeer::RIFEMP,$this->getCedrif());
      //$c->addjoin(InempresaPeer::INTIPEMP_ID,IntipempPeer::ID);
      $empresa=InempresaPeer::doSelectOne($c);

 	  if ($empresa)
 	  {
        $this->rifemp=$empresa->getRifemp();
        $this->razsoc=$empresa->getRazsoc();
        $this->telemp=$empresa->getTelemp();
        $this->tipemp=$empresa->getDestipemp();

 	  }


	  }

	  if($this->getTipconc() == 'I'){

	  $c= new Criteria();
      $c->add(IningprofPeer::ID,$this->getIdconc());
      $ingreso=IningprofPeer::doSelectOne($c);

      if ($ingreso){

      	$this->codingprof=$ingreso->getCodingprof();
      	$this->desingprof=$ingreso->getDesingprof();
      	$this->unitri=$ingreso->getUnitri();
      }

      }
      else{

      $c= new Criteria();
      $c->add(InmultaPeer::ID,$this->getIdconc());
      $multa=InmultaPeer::doSelectOne($c);

      if ($multa){

      	$this->codmul=$multa->getCodmul();
      	$this->desmul=$multa->getDesmul();
      	$this->unitri=$multa->getUnitri();
      }
	 }


	  $banco=$this->getIndefban();
 	  if ($banco)
 	  {
      $this->codban=$banco->getCodban();
      $this->desban=$banco->getDesban();
 	  }

 	  $multa=$this->getInmulta();
 	  if ($multa)
 	  {
      $this->codmul=$multa->getCodmul();
      $this->desmul=$multa->getDesmul();
 	  }

 	  $ingreso=$this->getIningprof();
 	  if ($ingreso)
 	  {
      $this->codingprof=$ingreso->getCodingprof();
      $this->desingprof=$ingreso->getDesingprof();
 	  }


 }


}
