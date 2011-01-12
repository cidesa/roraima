<?php

/**
 * Subclass for representing a row from the 'fcdeclar'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdeclar.php 32925 2009-09-10 13:11:09Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdeclar extends BaseFcdeclar
{
	protected $gridactcom = array();
	protected $griddisdeu = array();
	protected $edodecstatus= '';
	protected $rifrep= '';
	protected $check= false;
	protected $montopag=0;
	protected $monpag=0;
	protected $montopagcon=0;
	protected $saldo=0;
	protected $totalmon=0;

	protected $nomcon = "";
	protected $dircon = "";
	protected $naccon = "";
	protected $tipcon = "";
	protected $exipaguni = "";
	protected $fecfin = "";
	protected $edodeu = "";
	protected $coduso = "";

	protected $griddeuda = "";
	protected $grid      = "";
	protected $fportion  = "";

	protected $tippro = "";
	protected $fechainicio = "";
	protected $fechafin = "";
	protected $fuente = "";

	protected $tipesp  = "";
	protected $serapui = "";
	protected $serapuf = "";

	protected $tipapu = "";

	protected $anohasta;
	protected $anodesde;
	protected $zonadesde;
	protected $zonahasta;


  public function afterHydrate()
  {
  	  $c=new Criteria();
      $c->add(FcsollicPeer::STALIC, 'V');
      $c->add(FcsollicPeer::NUMLIC, self::getNumsol());
      $fcsollic = FcsollicPeer::doSelectOne($c);

      if ($fcsollic)
      {
	    $this->destiplic = Herramientas::getX('codtiplic','fctiplic','destiplic',$fcsollic->getCodtiplic());
	    $this->rifrep = $fcsollic->getRifrep();
	    $this->nomneg = $fcsollic->getNomneg();
      }
  }

	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

  	  $c=new Criteria();
      $c->add(FcfueprePeer::CODFUE, self::getFueing());
      $fcfuepr = FcfueprePeer::doSelectOne($c);

      if ($fcfuepr)
      {
	    $this->nomabr = $fcfuepr->getNomabr();
	    $this->nomfue = $fcfuepr->getNomfue();
	    $this->nomabrnumref = $fcfuepr->getNomabr()."-".$fcfuepr->getNomfue();
      }

  	  $c=new Criteria();
      $c->add(FcconrepPeer::RIFCON, self::getRifcon());
      $fcfuepr = FcconrepPeer::doSelectOne($c);

      if ($fcfuepr)
      {
	    $this->dircon = $fcfuepr->getDircon();
	    $this->naccon = $fcfuepr->getNaccon();
	    $this->nomcon = $fcfuepr->getNomcon();
	    $this->tipcon = $fcfuepr->getTipcon();

      }

	 $this->nroinm = Herramientas::getX('codcatinm','fcreginm','nroinm',self::getNumdec());

  	  $c=new Criteria();
      $c->add(FcreginmPeer::NROINM, $this->nroinm);
      $fcreginm = FcreginmPeer::doSelectOne($c);

      if ($fcreginm)
      {
	    $this->mensaje   = $fcreginm->getEstinm()=='D' ? 'Inmueble fue Desincorporado' : '';
	    $this->codcatinm = $fcfuepr->getCodcatinm();
	    $this->coduso = $fcfuepr->getCoduso();
	    $this->bscon  = $fcfuepr->getBscon();
	    $this->codsitinm = $fcfuepr->getCodsitinm();
	    $this->codcarinm = $fcfuepr->getCodcarinm();
	    $this->mtrter = $fcfuepr->getMtrter();
	    $this->bster  = $fcfuepr->getBster();
	    $this->mtrcon = $fcfuepr->getMtrcon();
	    $this->feccal = $fcfuepr->getFeccal();
	    $this->fecreg = $fcfuepr->getFecreg();


      }else{
      	$this->mensaje = 'Inmueble no Existe';
      }


	  $this->plaveh = self::getNumref();

  	  $c=new Criteria();
      $c->add(FcregvehPeer::PLAVEH, self::getNumref());
      $fcregveh = FcregvehPeer::doSelectOne($c);

      if ($fcregveh)
      {
			if ($fcregveh=='A') $mensaje = "REGISTRADO";
			else  $mensaje = "DESINCORPORADO";

			$this->coduso = $fcregveh->getCoduso();
		    $this->desuso = Herramientas::getX('coduso','fcusoveh','desuso',$this->coduso);
		    $this->marveh = $fcregveh->getMarveh();
		    $this->modveh = $fcregveh->getModveh();
		    $this->colveh = $fcregveh->getColveh();
		    $this->valori = $fcregveh->getValori();
		    $this->anoveh = $fcregveh->getAnoveh();
		    $this->sermot = $fcregveh->getSermot();
		    $this->sercar = $fcregveh->getSercar();

      }
/*
		$this->fuente = Herramientas :: getX_vacio('codemp', 'Fcdefins', 'codveh', '001');
        $this->frecob = Herramientas :: getX_vacio('codfue', 'fcfuepre', 'frecob', $this->fuente);

		$c = new Criteria();
		$c->add(FcfueprePeer::CODFUE, $this->fuente);
		$reg = FcfueprePeer::doSelectone($c);

		if ($reg->getFrecob()=='999')
		{
			$this->fportion = '1';
			$this->fechainicio = $reg->getInieje();
			$this->fechafin    = $reg->getFineje();
		}else{
			$this->frecuencia  = $reg->getFrecob();
			$this->fechainicio = $reg->getInieje();
			$this->fechafin    = $reg->getFineje();

		}
*/
		$c = new Criteria();
		$c->add(FcprolicPeer::NROCON, $this->numref);
		$reg = FcprolicPeer::doSelectOne($c);
		if ($reg)
		{
			$this->texpub = $reg->getTexpub();
			$this->tippro = $reg->getTippro();
			$this->despro = $reg->getDespro();
			$this->dirpro = $reg->getDirpro();
		}

		$c = new Criteria();
		$c->add(FcesplicPeer::NROCON, self::getNumref());
		$reg = FcesplicPeer::doSelectOne($c);
		if ($reg)
		{
			$this->tipesp  = $reg->getTipesp();
			$this->diresp  = $reg->getDiresp();
			$this->desesp  = $reg->getDesesp();
			$this->fecesp  = $reg->getFecesp();
			$this->tipesp  = $reg->getTipesp();
			$this->horespi = $reg->getHorespi();
			$this->horespf = $reg->getHorespf();
			$this->nroent  = $reg->getNroent();
			$this->monent  = $reg->getMonent();
			$this->exoesp  = $reg->getExoesp();
			$this->texexo  = $reg->getTexexo();
			$this->destip = Herramientas :: getX_vacio('tipesp', 'fctipesp', 'destip', $this->tipesp);
		}


		$c = new Criteria();
		$c->add(FcapulicPeer::NROCON, self::getNumref());
		$reg = FcapulicPeer::doSelectOne($c);
		if ($reg)
		{
			$this->tipapu  = $reg->getTipapu();
			$this->desapu  = $reg->getDesapu();
			$this->dirapu  = $reg->getDirapu();
			$this->fecapu  = $reg->getFecapu();
			$this->horapu  = $reg->getHorapu();
			$this->serapui = $reg->getSerapui();
			$this->serapuf = $reg->getSerapuf();
			$this->exoapu  = $reg->getExoapu();
			$this->texexo  = $reg->getTexexo();

			$this->destip = Herramientas :: getX_vacio('tipapu', 'fctipapu', 'destip', $this->tipapu);
		}

	}

  	public function getEdodecstatus()
	{
		if (self::getEdodec() == 'P'){
			$edodecstatus = "PAGADA";
		}else{
			if (H::dateDiff('d',self::getFecven(),date('d')) <= 0){
				$edodecstatus = "VIGENTE";
			}else{
				$edodecstatus = "VENCIDA";
			}

		}
		return $edodecstatus;
	}


  public function getNumsol()
  {
    return self::getNumref();
  }

  	public function getEdodecgrid()
	{
		if (self::getEdodec() == 'P'){
			$edodecstatus = "PAGADA";
		}else if (self::getEdodec() == 'V'){
			$edodecstatus = "VIGENTE";
		}else if (self::getEdodec() == 'E'){
			$edodecstatus = "VENCIDA";
		}

		return $edodecstatus;
	}


  	public function getConpagstatus()
	{
		$edodecstatus = "SI";
		return $edodecstatus;
	}

  public function getNomcon(){
      return H::getX('RIFCOM', 'Fcconrep', 'Nomcon', self::getRifcom());
  }

  public function getDircon(){
      return H::getX('RIFCOM', 'Fcconrep', 'dircon', self::getRifcom());
  }

}


