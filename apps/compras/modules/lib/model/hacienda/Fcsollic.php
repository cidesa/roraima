<?php


/**
 * Subclass for representing a row from the 'fcsollic'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcsollic.php 32925 2009-09-10 13:11:09Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcsollic extends BaseFcsollic {
	protected $nacconcon = "";
	protected $nomcon = "";
	protected $tipconcon = "";
	protected $nomconrep = "";
	protected $dirconrep = "";
	protected $nacconrep = "";
	protected $tipconrep = "";
	protected $refmod = "";
	protected $fecmod = "";
	protected $motmod = "";
	/*campos de cambios*/
	protected $idlic = "";
	protected $fechlic = '';
	protected $comnlic = "";
	/*otros */
	protected $mascara = "";
	protected $lonubi = 0;
	protected $desubicat = "";
	protected $grid = array ();
	/*negacion campos*/
	protected $numneg = "";
	protected $funneg = "";
	protected $tomon = "";
	protected $numeron = "";
	protected $resolu = "";
	protected $folion = "";
	protected $motneg = "";
	protected $fecneg = "";
	protected $licnegada = '';
	protected $licmodificada = '';
	protected $tipo_licencia = "";
	/*Suspencion*/
	protected $numsus = "";
	protected $fecsus = "";
	protected $funsus = "";
	protected $motsus = "";
	protected $solsus = "";
	protected $folsus = "";
	protected $actsus = "";
	protected $resolsus = "";
	/*operaciones licencias*/
	protected $operacion = "";

	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

		$this->numneg  = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'numneg', self :: getNumsol());
		$this->funneg  = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'funneg', self :: getNumsol());
		$this->tomon   = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'tomon', self :: getNumsol());
		$this->numeron = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'numeron', self :: getNumsol());
		$this->folion  = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'folion', self :: getNumsol());
		$this->motneg  = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'motneg', self :: getNumsol());
		$this->fecneg  = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'fecneg', self :: getNumsol());
		$this->resolu  = Herramientas :: getX_vacio('numsol', 'fcsolneg', 'resolu', self :: getNumsol());
		/*suspenciones*/
		$this->numsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'numsus', self :: getNumsol());
		$this->fecsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'fecsus', self :: getNumsol());
		$this->funsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'funsus', self :: getNumsol());
		$this->motsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'motsus', self :: getNumsol());
		$this->solsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'tomo', self :: getNumsol());
		$this->folsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'folio', self :: getNumsol());
		$this->actsus = Herramientas :: getX_vacio('numsol', 'fcsuscan', 'numero', self :: getNumsol());

		$this->dirconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self :: getRifrep());
		$this->nacconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self :: getRifrep());
		$this->nomconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self :: getRifrep());
		$this->tipconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self :: getRifrep());

		//$this->dircon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self :: getRifcon());
		$this->nacconcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self :: getRifcon());
		//$this->nomcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self :: getRifcon());
		$this->tipconcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self :: getRifcon());

	}


	public function getNumlic() {
		return  H::iif($this->numlic, $this->numlic, self::getNumsol());
	}


	public function getNomcatrasto() {
		return Herramientas :: getX('codcatinm', 'fcreginm', 'nomcon', self :: getCatcon());
	}

	public function getDescripcionruta() {
		return Herramientas :: getX('codrut', 'fcrutas', 'desrut', self :: getCodrut());
	}

	public function getRefmod() {


		$c = new Criteria();
		$c->add(FcmodlicPeer :: NUMSOL, self :: getNumsol() . '%', Criteria :: LIKE);
		$reg = FcmodlicPeer :: doSelectOne($c);
		if ((count($reg) > 0) and (self :: getNumsol()!=''))
			return $reg->getRefmod();
		else
			return "";
	}

	public function getNomcon() {
		return Herramientas :: getX('rifcon', 'fcconrep', 'nomcon', self :: getRifcon());
	}

	public function getFecmod() {
		$c = new Criteria();
		$c->add(FcmodlicPeer :: NUMSOL, self :: getNumsol() . '%', Criteria :: LIKE);
		$reg = FcmodlicPeer :: doSelectOne($c);
		if ((count($reg) > 0) and (self :: getNumsol()!='')){
            return  $reg->getFecmod();
        }else
			return "";
	}

	public function getMotmod() {
		$c = new Criteria();
		$c->add(FcmodlicPeer :: NUMSOL, self :: getNumsol() . '%', Criteria :: LIKE);
		$reg = FcmodlicPeer :: doSelectOne($c);
		if ((count($reg) > 0) and (self :: getNumsol()!=''))
			return $reg->getMotmod();
		else
			return "";
	}

	public function getDesubicat() {
		return Herramientas :: getX('codcatinm', 'fcreginm', 'nomcon', self :: getCatcon());
	}
}