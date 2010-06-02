<?php

/**
 * Subclase para representar una fila de la tabla 'npasicaremp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npasicaremp.php 37651 2010-04-16 20:12:39Z cramirez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasicaremp extends BaseNpasicaremp
{
	private $codcon = '';
	protected $codnomnew="";
	protected $codcarnew="";
	protected $codcatnew="";
    protected $nomnomnew="";
	protected $nomcarnew="";
	protected $nomcatnew="";
	protected $fecing=null;
        protected $codtipcar="";
        protected $mancencos="";


	public function getCodcon()
	{
		$c = new Criteria();
		$c->add(NpasiconempPeer::CODEMP,self::getCodemp());
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$codigo = NpasiconempPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getCodcon();
		}else{
			return ' ';
		}
	}

	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpasiconempPeer::CODEMP,self::getCodemp());
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$codigo = NpasiconempPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
		}else{
			return ' ';
		}
	}

	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomnom();
		}else{
			return ' ';
		}
	}
	public function getDestipgas()
	{
		$c = new Criteria();
		$c->add(NptipgasPeer::CODTIPGAS,self::getCodtipgas());
		$destipgas = NptipgasPeer::doSelectone($c);
		if ($destipgas){
			return $destipgas->getDestipgas();
		}else{
			return ' ';
		}
	}
	public function getDespaso()
	{
		$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,self::getCodcar());
		$c->add(NpcomocpPeer::CODTIPCAR,NpcargosPeer::CODTIP);
		$c->add(NpcomocpPeer::GRACAR,NpcargosPeer::GRAOCP);
		$suecar = NpcomOcpPeer::doSelectone($c);
		if ($suecar){
			return $suecar->getSuecar();
		}else{
			return ' ';
		}
	}

  public function getCedemp()
    {
       $c = new Criteria();
       $c->add(NphojintPeer::CODEMP,self::getCodemp());;
       $cedu = NphojintPeer::doSelectone($c);
    	if ($cedu)
    	      	  return $cedu->getCodemp();
     }

 public function getModces()
    {
       $c = new Criteria();
       $c->add(NphojintPeer::CODEMP,self::getCodemp());;
       $coden = NphojintPeer::doSelectone($c);
         	if ($coden)
    	  	   {
                  return $coden->getModpagcestic();
    	       }

    }

  public function getNomnomnew()
 {
        $c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,$this->getCodnomnew());
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomnom();
		}else{
			return ' ';
		}
 }

  public function getNomcarnew()
  {
        $c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,$this->getCodcarnew());
		$nomnom = NpcargosPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomcar();
		}else{
			return ' ';
		}
  }

  public function getNomcatnew()
  {
        $c = new Criteria();
		$c->add(NpcatprePeer::CODCAT,$this->getCodcatnew());
		$nomnom = NpcatprePeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomcat();
		}else{
			return ' ';
		}
  }
  public function getFecing()
  {
  	return date('d/m/Y',strtotime(H::Getx('Codemp','Nphojint','Fecing',self::getCodemp())));
  }

  public function getCodtipcar()
    {
        return H::GetX('Codcar','Npcargos','codtip',self::getCodcar());
    }

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

  public function getMancencos()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('nomina',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
	     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos'])){
	       if(array_key_exists('mancencos',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
	       {
	       	$dato=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['mancencos'];
	       }
         }
     return $dato;
  }

  public function setMancencos()
  {
  	return $this->mancencos;
  }
}
