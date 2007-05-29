<?php


abstract class BaseFordefpry extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $nompro;


	
	protected $proacc;


	
	protected $codsta;


	
	protected $codsitpre;


	
	protected $conpoa;


	
	protected $fecini;


	
	protected $feccul;


	
	protected $ubinac;


	
	protected $codequ;


	
	protected $codsubobj;


	
	protected $codsubsubobj;


	
	protected $objestnueeta;


	
	protected $objestins;


	
	protected $objeesppro;


	
	protected $indpro;


	
	protected $enupro;


	
	protected $indsitact;


	
	protected $fecultdat;


	
	protected $forind;


	
	protected $fueind;


	
	protected $indsitobj;


	
	protected $tieimp;


	
	protected $respro;


	
	protected $desmet;


	
	protected $codunimedmet;


	
	protected $cantmet;


	
	protected $benpro;


	
	protected $codejedes;


	
	protected $codnucdes;


	
	protected $codzoneco;


	
	protected $comindust;


	
	protected $codsec;


	
	protected $codsubsec;


	
	protected $montotpry;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $caremp;


	
	protected $uniadsemp;


	
	protected $telemp;


	
	protected $faxemp;


	
	protected $emaemp;


	
	protected $accotrins;


	
	protected $obsaccotrins;


	
	protected $conpryotr;


	
	protected $obsconpryotr;


	
	protected $conotrpry;


	
	protected $obsconotrpry;


	
	protected $tipaccage;


	
	protected $placontin;


	
	protected $obsplacontin;


	
	protected $nroempdir;


	
	protected $nroempind;


	
	protected $desbrepry;


	
	protected $poravafis;


	
	protected $poravafin;


	
	protected $uniejepri;


	
	protected $ubigeo;


	
	protected $plactg;


	
	protected $coddir;


	
	protected $facrzg;


	
	protected $objpndes;


	
	protected $unimedres;


	
	protected $codprg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getNompro()
	{

		return $this->nompro; 		
	}
	
	public function getProacc()
	{

		return $this->proacc; 		
	}
	
	public function getCodsta()
	{

		return $this->codsta; 		
	}
	
	public function getCodsitpre()
	{

		return $this->codsitpre; 		
	}
	
	public function getConpoa()
	{

		return $this->conpoa; 		
	}
	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFeccul($format = 'Y-m-d')
	{

		if ($this->feccul === null || $this->feccul === '') {
			return null;
		} elseif (!is_int($this->feccul)) {
						$ts = strtotime($this->feccul);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
			}
		} else {
			$ts = $this->feccul;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUbinac()
	{

		return $this->ubinac; 		
	}
	
	public function getCodequ()
	{

		return $this->codequ; 		
	}
	
	public function getCodsubobj()
	{

		return $this->codsubobj; 		
	}
	
	public function getCodsubsubobj()
	{

		return $this->codsubsubobj; 		
	}
	
	public function getObjestnueeta()
	{

		return $this->objestnueeta; 		
	}
	
	public function getObjestins()
	{

		return $this->objestins; 		
	}
	
	public function getObjeesppro()
	{

		return $this->objeesppro; 		
	}
	
	public function getIndpro()
	{

		return $this->indpro; 		
	}
	
	public function getEnupro()
	{

		return $this->enupro; 		
	}
	
	public function getIndsitact()
	{

		return $this->indsitact; 		
	}
	
	public function getFecultdat($format = 'Y-m-d')
	{

		if ($this->fecultdat === null || $this->fecultdat === '') {
			return null;
		} elseif (!is_int($this->fecultdat)) {
						$ts = strtotime($this->fecultdat);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecultdat] as date/time value: " . var_export($this->fecultdat, true));
			}
		} else {
			$ts = $this->fecultdat;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getForind()
	{

		return $this->forind; 		
	}
	
	public function getFueind()
	{

		return $this->fueind; 		
	}
	
	public function getIndsitobj()
	{

		return $this->indsitobj; 		
	}
	
	public function getTieimp()
	{

		return $this->tieimp; 		
	}
	
	public function getRespro()
	{

		return $this->respro; 		
	}
	
	public function getDesmet()
	{

		return $this->desmet; 		
	}
	
	public function getCodunimedmet()
	{

		return $this->codunimedmet; 		
	}
	
	public function getCantmet()
	{

		return number_format($this->cantmet,2,',','.');
		
	}
	
	public function getBenpro()
	{

		return $this->benpro; 		
	}
	
	public function getCodejedes()
	{

		return $this->codejedes; 		
	}
	
	public function getCodnucdes()
	{

		return $this->codnucdes; 		
	}
	
	public function getCodzoneco()
	{

		return $this->codzoneco; 		
	}
	
	public function getComindust()
	{

		return $this->comindust; 		
	}
	
	public function getCodsec()
	{

		return $this->codsec; 		
	}
	
	public function getCodsubsec()
	{

		return $this->codsubsec; 		
	}
	
	public function getMontotpry()
	{

		return number_format($this->montotpry,2,',','.');
		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getCaremp()
	{

		return $this->caremp; 		
	}
	
	public function getUniadsemp()
	{

		return $this->uniadsemp; 		
	}
	
	public function getTelemp()
	{

		return $this->telemp; 		
	}
	
	public function getFaxemp()
	{

		return $this->faxemp; 		
	}
	
	public function getEmaemp()
	{

		return $this->emaemp; 		
	}
	
	public function getAccotrins()
	{

		return $this->accotrins; 		
	}
	
	public function getObsaccotrins()
	{

		return $this->obsaccotrins; 		
	}
	
	public function getConpryotr()
	{

		return $this->conpryotr; 		
	}
	
	public function getObsconpryotr()
	{

		return $this->obsconpryotr; 		
	}
	
	public function getConotrpry()
	{

		return $this->conotrpry; 		
	}
	
	public function getObsconotrpry()
	{

		return $this->obsconotrpry; 		
	}
	
	public function getTipaccage()
	{

		return $this->tipaccage; 		
	}
	
	public function getPlacontin()
	{

		return $this->placontin; 		
	}
	
	public function getObsplacontin()
	{

		return $this->obsplacontin; 		
	}
	
	public function getNroempdir()
	{

		return number_format($this->nroempdir,2,',','.');
		
	}
	
	public function getNroempind()
	{

		return number_format($this->nroempind,2,',','.');
		
	}
	
	public function getDesbrepry()
	{

		return $this->desbrepry; 		
	}
	
	public function getPoravafis()
	{

		return number_format($this->poravafis,2,',','.');
		
	}
	
	public function getPoravafin()
	{

		return number_format($this->poravafin,2,',','.');
		
	}
	
	public function getUniejepri()
	{

		return $this->uniejepri; 		
	}
	
	public function getUbigeo()
	{

		return $this->ubigeo; 		
	}
	
	public function getPlactg()
	{

		return $this->plactg; 		
	}
	
	public function getCoddir()
	{

		return $this->coddir; 		
	}
	
	public function getFacrzg()
	{

		return $this->facrzg; 		
	}
	
	public function getObjpndes()
	{

		return $this->objpndes; 		
	}
	
	public function getUnimedres()
	{

		return $this->unimedres; 		
	}
	
	public function getCodprg()
	{

		return $this->codprg; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODPRO;
		}

	} 
	
	public function setNompro($v)
	{

		if ($this->nompro !== $v) {
			$this->nompro = $v;
			$this->modifiedColumns[] = FordefpryPeer::NOMPRO;
		}

	} 
	
	public function setProacc($v)
	{

		if ($this->proacc !== $v) {
			$this->proacc = $v;
			$this->modifiedColumns[] = FordefpryPeer::PROACC;
		}

	} 
	
	public function setCodsta($v)
	{

		if ($this->codsta !== $v) {
			$this->codsta = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODSTA;
		}

	} 
	
	public function setCodsitpre($v)
	{

		if ($this->codsitpre !== $v) {
			$this->codsitpre = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODSITPRE;
		}

	} 
	
	public function setConpoa($v)
	{

		if ($this->conpoa !== $v) {
			$this->conpoa = $v;
			$this->modifiedColumns[] = FordefpryPeer::CONPOA;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = FordefpryPeer::FECINI;
		}

	} 
	
	public function setFeccul($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccul !== $ts) {
			$this->feccul = $ts;
			$this->modifiedColumns[] = FordefpryPeer::FECCUL;
		}

	} 
	
	public function setUbinac($v)
	{

		if ($this->ubinac !== $v) {
			$this->ubinac = $v;
			$this->modifiedColumns[] = FordefpryPeer::UBINAC;
		}

	} 
	
	public function setCodequ($v)
	{

		if ($this->codequ !== $v) {
			$this->codequ = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODEQU;
		}

	} 
	
	public function setCodsubobj($v)
	{

		if ($this->codsubobj !== $v) {
			$this->codsubobj = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODSUBOBJ;
		}

	} 
	
	public function setCodsubsubobj($v)
	{

		if ($this->codsubsubobj !== $v) {
			$this->codsubsubobj = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODSUBSUBOBJ;
		}

	} 
	
	public function setObjestnueeta($v)
	{

		if ($this->objestnueeta !== $v) {
			$this->objestnueeta = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBJESTNUEETA;
		}

	} 
	
	public function setObjestins($v)
	{

		if ($this->objestins !== $v) {
			$this->objestins = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBJESTINS;
		}

	} 
	
	public function setObjeesppro($v)
	{

		if ($this->objeesppro !== $v) {
			$this->objeesppro = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBJEESPPRO;
		}

	} 
	
	public function setIndpro($v)
	{

		if ($this->indpro !== $v) {
			$this->indpro = $v;
			$this->modifiedColumns[] = FordefpryPeer::INDPRO;
		}

	} 
	
	public function setEnupro($v)
	{

		if ($this->enupro !== $v) {
			$this->enupro = $v;
			$this->modifiedColumns[] = FordefpryPeer::ENUPRO;
		}

	} 
	
	public function setIndsitact($v)
	{

		if ($this->indsitact !== $v) {
			$this->indsitact = $v;
			$this->modifiedColumns[] = FordefpryPeer::INDSITACT;
		}

	} 
	
	public function setFecultdat($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecultdat] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecultdat !== $ts) {
			$this->fecultdat = $ts;
			$this->modifiedColumns[] = FordefpryPeer::FECULTDAT;
		}

	} 
	
	public function setForind($v)
	{

		if ($this->forind !== $v) {
			$this->forind = $v;
			$this->modifiedColumns[] = FordefpryPeer::FORIND;
		}

	} 
	
	public function setFueind($v)
	{

		if ($this->fueind !== $v) {
			$this->fueind = $v;
			$this->modifiedColumns[] = FordefpryPeer::FUEIND;
		}

	} 
	
	public function setIndsitobj($v)
	{

		if ($this->indsitobj !== $v) {
			$this->indsitobj = $v;
			$this->modifiedColumns[] = FordefpryPeer::INDSITOBJ;
		}

	} 
	
	public function setTieimp($v)
	{

		if ($this->tieimp !== $v) {
			$this->tieimp = $v;
			$this->modifiedColumns[] = FordefpryPeer::TIEIMP;
		}

	} 
	
	public function setRespro($v)
	{

		if ($this->respro !== $v) {
			$this->respro = $v;
			$this->modifiedColumns[] = FordefpryPeer::RESPRO;
		}

	} 
	
	public function setDesmet($v)
	{

		if ($this->desmet !== $v) {
			$this->desmet = $v;
			$this->modifiedColumns[] = FordefpryPeer::DESMET;
		}

	} 
	
	public function setCodunimedmet($v)
	{

		if ($this->codunimedmet !== $v) {
			$this->codunimedmet = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODUNIMEDMET;
		}

	} 
	
	public function setCantmet($v)
	{

		if ($this->cantmet !== $v) {
			$this->cantmet = $v;
			$this->modifiedColumns[] = FordefpryPeer::CANTMET;
		}

	} 
	
	public function setBenpro($v)
	{

		if ($this->benpro !== $v) {
			$this->benpro = $v;
			$this->modifiedColumns[] = FordefpryPeer::BENPRO;
		}

	} 
	
	public function setCodejedes($v)
	{

		if ($this->codejedes !== $v) {
			$this->codejedes = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODEJEDES;
		}

	} 
	
	public function setCodnucdes($v)
	{

		if ($this->codnucdes !== $v) {
			$this->codnucdes = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODNUCDES;
		}

	} 
	
	public function setCodzoneco($v)
	{

		if ($this->codzoneco !== $v) {
			$this->codzoneco = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODZONECO;
		}

	} 
	
	public function setComindust($v)
	{

		if ($this->comindust !== $v) {
			$this->comindust = $v;
			$this->modifiedColumns[] = FordefpryPeer::COMINDUST;
		}

	} 
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODSEC;
		}

	} 
	
	public function setCodsubsec($v)
	{

		if ($this->codsubsec !== $v) {
			$this->codsubsec = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODSUBSEC;
		}

	} 
	
	public function setMontotpry($v)
	{

		if ($this->montotpry !== $v) {
			$this->montotpry = $v;
			$this->modifiedColumns[] = FordefpryPeer::MONTOTPRY;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODEMP;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = FordefpryPeer::NOMEMP;
		}

	} 
	
	public function setCaremp($v)
	{

		if ($this->caremp !== $v) {
			$this->caremp = $v;
			$this->modifiedColumns[] = FordefpryPeer::CAREMP;
		}

	} 
	
	public function setUniadsemp($v)
	{

		if ($this->uniadsemp !== $v) {
			$this->uniadsemp = $v;
			$this->modifiedColumns[] = FordefpryPeer::UNIADSEMP;
		}

	} 
	
	public function setTelemp($v)
	{

		if ($this->telemp !== $v) {
			$this->telemp = $v;
			$this->modifiedColumns[] = FordefpryPeer::TELEMP;
		}

	} 
	
	public function setFaxemp($v)
	{

		if ($this->faxemp !== $v) {
			$this->faxemp = $v;
			$this->modifiedColumns[] = FordefpryPeer::FAXEMP;
		}

	} 
	
	public function setEmaemp($v)
	{

		if ($this->emaemp !== $v) {
			$this->emaemp = $v;
			$this->modifiedColumns[] = FordefpryPeer::EMAEMP;
		}

	} 
	
	public function setAccotrins($v)
	{

		if ($this->accotrins !== $v) {
			$this->accotrins = $v;
			$this->modifiedColumns[] = FordefpryPeer::ACCOTRINS;
		}

	} 
	
	public function setObsaccotrins($v)
	{

		if ($this->obsaccotrins !== $v) {
			$this->obsaccotrins = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBSACCOTRINS;
		}

	} 
	
	public function setConpryotr($v)
	{

		if ($this->conpryotr !== $v) {
			$this->conpryotr = $v;
			$this->modifiedColumns[] = FordefpryPeer::CONPRYOTR;
		}

	} 
	
	public function setObsconpryotr($v)
	{

		if ($this->obsconpryotr !== $v) {
			$this->obsconpryotr = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBSCONPRYOTR;
		}

	} 
	
	public function setConotrpry($v)
	{

		if ($this->conotrpry !== $v) {
			$this->conotrpry = $v;
			$this->modifiedColumns[] = FordefpryPeer::CONOTRPRY;
		}

	} 
	
	public function setObsconotrpry($v)
	{

		if ($this->obsconotrpry !== $v) {
			$this->obsconotrpry = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBSCONOTRPRY;
		}

	} 
	
	public function setTipaccage($v)
	{

		if ($this->tipaccage !== $v) {
			$this->tipaccage = $v;
			$this->modifiedColumns[] = FordefpryPeer::TIPACCAGE;
		}

	} 
	
	public function setPlacontin($v)
	{

		if ($this->placontin !== $v) {
			$this->placontin = $v;
			$this->modifiedColumns[] = FordefpryPeer::PLACONTIN;
		}

	} 
	
	public function setObsplacontin($v)
	{

		if ($this->obsplacontin !== $v) {
			$this->obsplacontin = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBSPLACONTIN;
		}

	} 
	
	public function setNroempdir($v)
	{

		if ($this->nroempdir !== $v) {
			$this->nroempdir = $v;
			$this->modifiedColumns[] = FordefpryPeer::NROEMPDIR;
		}

	} 
	
	public function setNroempind($v)
	{

		if ($this->nroempind !== $v) {
			$this->nroempind = $v;
			$this->modifiedColumns[] = FordefpryPeer::NROEMPIND;
		}

	} 
	
	public function setDesbrepry($v)
	{

		if ($this->desbrepry !== $v) {
			$this->desbrepry = $v;
			$this->modifiedColumns[] = FordefpryPeer::DESBREPRY;
		}

	} 
	
	public function setPoravafis($v)
	{

		if ($this->poravafis !== $v) {
			$this->poravafis = $v;
			$this->modifiedColumns[] = FordefpryPeer::PORAVAFIS;
		}

	} 
	
	public function setPoravafin($v)
	{

		if ($this->poravafin !== $v) {
			$this->poravafin = $v;
			$this->modifiedColumns[] = FordefpryPeer::PORAVAFIN;
		}

	} 
	
	public function setUniejepri($v)
	{

		if ($this->uniejepri !== $v) {
			$this->uniejepri = $v;
			$this->modifiedColumns[] = FordefpryPeer::UNIEJEPRI;
		}

	} 
	
	public function setUbigeo($v)
	{

		if ($this->ubigeo !== $v) {
			$this->ubigeo = $v;
			$this->modifiedColumns[] = FordefpryPeer::UBIGEO;
		}

	} 
	
	public function setPlactg($v)
	{

		if ($this->plactg !== $v) {
			$this->plactg = $v;
			$this->modifiedColumns[] = FordefpryPeer::PLACTG;
		}

	} 
	
	public function setCoddir($v)
	{

		if ($this->coddir !== $v) {
			$this->coddir = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODDIR;
		}

	} 
	
	public function setFacrzg($v)
	{

		if ($this->facrzg !== $v) {
			$this->facrzg = $v;
			$this->modifiedColumns[] = FordefpryPeer::FACRZG;
		}

	} 
	
	public function setObjpndes($v)
	{

		if ($this->objpndes !== $v) {
			$this->objpndes = $v;
			$this->modifiedColumns[] = FordefpryPeer::OBJPNDES;
		}

	} 
	
	public function setUnimedres($v)
	{

		if ($this->unimedres !== $v) {
			$this->unimedres = $v;
			$this->modifiedColumns[] = FordefpryPeer::UNIMEDRES;
		}

	} 
	
	public function setCodprg($v)
	{

		if ($this->codprg !== $v) {
			$this->codprg = $v;
			$this->modifiedColumns[] = FordefpryPeer::CODPRG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefpryPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpro = $rs->getString($startcol + 0);

			$this->nompro = $rs->getString($startcol + 1);

			$this->proacc = $rs->getString($startcol + 2);

			$this->codsta = $rs->getString($startcol + 3);

			$this->codsitpre = $rs->getString($startcol + 4);

			$this->conpoa = $rs->getString($startcol + 5);

			$this->fecini = $rs->getDate($startcol + 6, null);

			$this->feccul = $rs->getDate($startcol + 7, null);

			$this->ubinac = $rs->getString($startcol + 8);

			$this->codequ = $rs->getString($startcol + 9);

			$this->codsubobj = $rs->getString($startcol + 10);

			$this->codsubsubobj = $rs->getString($startcol + 11);

			$this->objestnueeta = $rs->getString($startcol + 12);

			$this->objestins = $rs->getString($startcol + 13);

			$this->objeesppro = $rs->getString($startcol + 14);

			$this->indpro = $rs->getString($startcol + 15);

			$this->enupro = $rs->getString($startcol + 16);

			$this->indsitact = $rs->getString($startcol + 17);

			$this->fecultdat = $rs->getDate($startcol + 18, null);

			$this->forind = $rs->getString($startcol + 19);

			$this->fueind = $rs->getString($startcol + 20);

			$this->indsitobj = $rs->getString($startcol + 21);

			$this->tieimp = $rs->getString($startcol + 22);

			$this->respro = $rs->getString($startcol + 23);

			$this->desmet = $rs->getString($startcol + 24);

			$this->codunimedmet = $rs->getString($startcol + 25);

			$this->cantmet = $rs->getFloat($startcol + 26);

			$this->benpro = $rs->getString($startcol + 27);

			$this->codejedes = $rs->getString($startcol + 28);

			$this->codnucdes = $rs->getString($startcol + 29);

			$this->codzoneco = $rs->getString($startcol + 30);

			$this->comindust = $rs->getString($startcol + 31);

			$this->codsec = $rs->getString($startcol + 32);

			$this->codsubsec = $rs->getString($startcol + 33);

			$this->montotpry = $rs->getFloat($startcol + 34);

			$this->codemp = $rs->getString($startcol + 35);

			$this->nomemp = $rs->getString($startcol + 36);

			$this->caremp = $rs->getString($startcol + 37);

			$this->uniadsemp = $rs->getString($startcol + 38);

			$this->telemp = $rs->getString($startcol + 39);

			$this->faxemp = $rs->getString($startcol + 40);

			$this->emaemp = $rs->getString($startcol + 41);

			$this->accotrins = $rs->getString($startcol + 42);

			$this->obsaccotrins = $rs->getString($startcol + 43);

			$this->conpryotr = $rs->getString($startcol + 44);

			$this->obsconpryotr = $rs->getString($startcol + 45);

			$this->conotrpry = $rs->getString($startcol + 46);

			$this->obsconotrpry = $rs->getString($startcol + 47);

			$this->tipaccage = $rs->getString($startcol + 48);

			$this->placontin = $rs->getString($startcol + 49);

			$this->obsplacontin = $rs->getString($startcol + 50);

			$this->nroempdir = $rs->getFloat($startcol + 51);

			$this->nroempind = $rs->getFloat($startcol + 52);

			$this->desbrepry = $rs->getString($startcol + 53);

			$this->poravafis = $rs->getFloat($startcol + 54);

			$this->poravafin = $rs->getFloat($startcol + 55);

			$this->uniejepri = $rs->getString($startcol + 56);

			$this->ubigeo = $rs->getString($startcol + 57);

			$this->plactg = $rs->getString($startcol + 58);

			$this->coddir = $rs->getString($startcol + 59);

			$this->facrzg = $rs->getString($startcol + 60);

			$this->objpndes = $rs->getString($startcol + 61);

			$this->unimedres = $rs->getString($startcol + 62);

			$this->codprg = $rs->getString($startcol + 63);

			$this->id = $rs->getInt($startcol + 64);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 65; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefpry object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefpryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefpryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefpryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FordefpryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefpryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = FordefpryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefpryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getNompro();
				break;
			case 2:
				return $this->getProacc();
				break;
			case 3:
				return $this->getCodsta();
				break;
			case 4:
				return $this->getCodsitpre();
				break;
			case 5:
				return $this->getConpoa();
				break;
			case 6:
				return $this->getFecini();
				break;
			case 7:
				return $this->getFeccul();
				break;
			case 8:
				return $this->getUbinac();
				break;
			case 9:
				return $this->getCodequ();
				break;
			case 10:
				return $this->getCodsubobj();
				break;
			case 11:
				return $this->getCodsubsubobj();
				break;
			case 12:
				return $this->getObjestnueeta();
				break;
			case 13:
				return $this->getObjestins();
				break;
			case 14:
				return $this->getObjeesppro();
				break;
			case 15:
				return $this->getIndpro();
				break;
			case 16:
				return $this->getEnupro();
				break;
			case 17:
				return $this->getIndsitact();
				break;
			case 18:
				return $this->getFecultdat();
				break;
			case 19:
				return $this->getForind();
				break;
			case 20:
				return $this->getFueind();
				break;
			case 21:
				return $this->getIndsitobj();
				break;
			case 22:
				return $this->getTieimp();
				break;
			case 23:
				return $this->getRespro();
				break;
			case 24:
				return $this->getDesmet();
				break;
			case 25:
				return $this->getCodunimedmet();
				break;
			case 26:
				return $this->getCantmet();
				break;
			case 27:
				return $this->getBenpro();
				break;
			case 28:
				return $this->getCodejedes();
				break;
			case 29:
				return $this->getCodnucdes();
				break;
			case 30:
				return $this->getCodzoneco();
				break;
			case 31:
				return $this->getComindust();
				break;
			case 32:
				return $this->getCodsec();
				break;
			case 33:
				return $this->getCodsubsec();
				break;
			case 34:
				return $this->getMontotpry();
				break;
			case 35:
				return $this->getCodemp();
				break;
			case 36:
				return $this->getNomemp();
				break;
			case 37:
				return $this->getCaremp();
				break;
			case 38:
				return $this->getUniadsemp();
				break;
			case 39:
				return $this->getTelemp();
				break;
			case 40:
				return $this->getFaxemp();
				break;
			case 41:
				return $this->getEmaemp();
				break;
			case 42:
				return $this->getAccotrins();
				break;
			case 43:
				return $this->getObsaccotrins();
				break;
			case 44:
				return $this->getConpryotr();
				break;
			case 45:
				return $this->getObsconpryotr();
				break;
			case 46:
				return $this->getConotrpry();
				break;
			case 47:
				return $this->getObsconotrpry();
				break;
			case 48:
				return $this->getTipaccage();
				break;
			case 49:
				return $this->getPlacontin();
				break;
			case 50:
				return $this->getObsplacontin();
				break;
			case 51:
				return $this->getNroempdir();
				break;
			case 52:
				return $this->getNroempind();
				break;
			case 53:
				return $this->getDesbrepry();
				break;
			case 54:
				return $this->getPoravafis();
				break;
			case 55:
				return $this->getPoravafin();
				break;
			case 56:
				return $this->getUniejepri();
				break;
			case 57:
				return $this->getUbigeo();
				break;
			case 58:
				return $this->getPlactg();
				break;
			case 59:
				return $this->getCoddir();
				break;
			case 60:
				return $this->getFacrzg();
				break;
			case 61:
				return $this->getObjpndes();
				break;
			case 62:
				return $this->getUnimedres();
				break;
			case 63:
				return $this->getCodprg();
				break;
			case 64:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefpryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getNompro(),
			$keys[2] => $this->getProacc(),
			$keys[3] => $this->getCodsta(),
			$keys[4] => $this->getCodsitpre(),
			$keys[5] => $this->getConpoa(),
			$keys[6] => $this->getFecini(),
			$keys[7] => $this->getFeccul(),
			$keys[8] => $this->getUbinac(),
			$keys[9] => $this->getCodequ(),
			$keys[10] => $this->getCodsubobj(),
			$keys[11] => $this->getCodsubsubobj(),
			$keys[12] => $this->getObjestnueeta(),
			$keys[13] => $this->getObjestins(),
			$keys[14] => $this->getObjeesppro(),
			$keys[15] => $this->getIndpro(),
			$keys[16] => $this->getEnupro(),
			$keys[17] => $this->getIndsitact(),
			$keys[18] => $this->getFecultdat(),
			$keys[19] => $this->getForind(),
			$keys[20] => $this->getFueind(),
			$keys[21] => $this->getIndsitobj(),
			$keys[22] => $this->getTieimp(),
			$keys[23] => $this->getRespro(),
			$keys[24] => $this->getDesmet(),
			$keys[25] => $this->getCodunimedmet(),
			$keys[26] => $this->getCantmet(),
			$keys[27] => $this->getBenpro(),
			$keys[28] => $this->getCodejedes(),
			$keys[29] => $this->getCodnucdes(),
			$keys[30] => $this->getCodzoneco(),
			$keys[31] => $this->getComindust(),
			$keys[32] => $this->getCodsec(),
			$keys[33] => $this->getCodsubsec(),
			$keys[34] => $this->getMontotpry(),
			$keys[35] => $this->getCodemp(),
			$keys[36] => $this->getNomemp(),
			$keys[37] => $this->getCaremp(),
			$keys[38] => $this->getUniadsemp(),
			$keys[39] => $this->getTelemp(),
			$keys[40] => $this->getFaxemp(),
			$keys[41] => $this->getEmaemp(),
			$keys[42] => $this->getAccotrins(),
			$keys[43] => $this->getObsaccotrins(),
			$keys[44] => $this->getConpryotr(),
			$keys[45] => $this->getObsconpryotr(),
			$keys[46] => $this->getConotrpry(),
			$keys[47] => $this->getObsconotrpry(),
			$keys[48] => $this->getTipaccage(),
			$keys[49] => $this->getPlacontin(),
			$keys[50] => $this->getObsplacontin(),
			$keys[51] => $this->getNroempdir(),
			$keys[52] => $this->getNroempind(),
			$keys[53] => $this->getDesbrepry(),
			$keys[54] => $this->getPoravafis(),
			$keys[55] => $this->getPoravafin(),
			$keys[56] => $this->getUniejepri(),
			$keys[57] => $this->getUbigeo(),
			$keys[58] => $this->getPlactg(),
			$keys[59] => $this->getCoddir(),
			$keys[60] => $this->getFacrzg(),
			$keys[61] => $this->getObjpndes(),
			$keys[62] => $this->getUnimedres(),
			$keys[63] => $this->getCodprg(),
			$keys[64] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefpryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setNompro($value);
				break;
			case 2:
				$this->setProacc($value);
				break;
			case 3:
				$this->setCodsta($value);
				break;
			case 4:
				$this->setCodsitpre($value);
				break;
			case 5:
				$this->setConpoa($value);
				break;
			case 6:
				$this->setFecini($value);
				break;
			case 7:
				$this->setFeccul($value);
				break;
			case 8:
				$this->setUbinac($value);
				break;
			case 9:
				$this->setCodequ($value);
				break;
			case 10:
				$this->setCodsubobj($value);
				break;
			case 11:
				$this->setCodsubsubobj($value);
				break;
			case 12:
				$this->setObjestnueeta($value);
				break;
			case 13:
				$this->setObjestins($value);
				break;
			case 14:
				$this->setObjeesppro($value);
				break;
			case 15:
				$this->setIndpro($value);
				break;
			case 16:
				$this->setEnupro($value);
				break;
			case 17:
				$this->setIndsitact($value);
				break;
			case 18:
				$this->setFecultdat($value);
				break;
			case 19:
				$this->setForind($value);
				break;
			case 20:
				$this->setFueind($value);
				break;
			case 21:
				$this->setIndsitobj($value);
				break;
			case 22:
				$this->setTieimp($value);
				break;
			case 23:
				$this->setRespro($value);
				break;
			case 24:
				$this->setDesmet($value);
				break;
			case 25:
				$this->setCodunimedmet($value);
				break;
			case 26:
				$this->setCantmet($value);
				break;
			case 27:
				$this->setBenpro($value);
				break;
			case 28:
				$this->setCodejedes($value);
				break;
			case 29:
				$this->setCodnucdes($value);
				break;
			case 30:
				$this->setCodzoneco($value);
				break;
			case 31:
				$this->setComindust($value);
				break;
			case 32:
				$this->setCodsec($value);
				break;
			case 33:
				$this->setCodsubsec($value);
				break;
			case 34:
				$this->setMontotpry($value);
				break;
			case 35:
				$this->setCodemp($value);
				break;
			case 36:
				$this->setNomemp($value);
				break;
			case 37:
				$this->setCaremp($value);
				break;
			case 38:
				$this->setUniadsemp($value);
				break;
			case 39:
				$this->setTelemp($value);
				break;
			case 40:
				$this->setFaxemp($value);
				break;
			case 41:
				$this->setEmaemp($value);
				break;
			case 42:
				$this->setAccotrins($value);
				break;
			case 43:
				$this->setObsaccotrins($value);
				break;
			case 44:
				$this->setConpryotr($value);
				break;
			case 45:
				$this->setObsconpryotr($value);
				break;
			case 46:
				$this->setConotrpry($value);
				break;
			case 47:
				$this->setObsconotrpry($value);
				break;
			case 48:
				$this->setTipaccage($value);
				break;
			case 49:
				$this->setPlacontin($value);
				break;
			case 50:
				$this->setObsplacontin($value);
				break;
			case 51:
				$this->setNroempdir($value);
				break;
			case 52:
				$this->setNroempind($value);
				break;
			case 53:
				$this->setDesbrepry($value);
				break;
			case 54:
				$this->setPoravafis($value);
				break;
			case 55:
				$this->setPoravafin($value);
				break;
			case 56:
				$this->setUniejepri($value);
				break;
			case 57:
				$this->setUbigeo($value);
				break;
			case 58:
				$this->setPlactg($value);
				break;
			case 59:
				$this->setCoddir($value);
				break;
			case 60:
				$this->setFacrzg($value);
				break;
			case 61:
				$this->setObjpndes($value);
				break;
			case 62:
				$this->setUnimedres($value);
				break;
			case 63:
				$this->setCodprg($value);
				break;
			case 64:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefpryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setProacc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodsta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodsitpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConpoa($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecini($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeccul($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUbinac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodequ($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodsubobj($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodsubsubobj($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObjestnueeta($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObjestins($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setObjeesppro($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setIndpro($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEnupro($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setIndsitact($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecultdat($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setForind($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFueind($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setIndsitobj($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTieimp($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setRespro($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDesmet($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodunimedmet($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCantmet($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setBenpro($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodejedes($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodnucdes($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodzoneco($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setComindust($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodsec($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodsubsec($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setMontotpry($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodemp($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNomemp($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCaremp($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setUniadsemp($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setTelemp($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setFaxemp($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setEmaemp($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setAccotrins($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setObsaccotrins($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setConpryotr($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setObsconpryotr($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setConotrpry($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setObsconotrpry($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setTipaccage($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setPlacontin($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setObsplacontin($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setNroempdir($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setNroempind($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setDesbrepry($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setPoravafis($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setPoravafin($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setUniejepri($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setUbigeo($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setPlactg($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setCoddir($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setFacrzg($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setObjpndes($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setUnimedres($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setCodprg($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setId($arr[$keys[64]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefpryPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefpryPeer::CODPRO)) $criteria->add(FordefpryPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordefpryPeer::NOMPRO)) $criteria->add(FordefpryPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(FordefpryPeer::PROACC)) $criteria->add(FordefpryPeer::PROACC, $this->proacc);
		if ($this->isColumnModified(FordefpryPeer::CODSTA)) $criteria->add(FordefpryPeer::CODSTA, $this->codsta);
		if ($this->isColumnModified(FordefpryPeer::CODSITPRE)) $criteria->add(FordefpryPeer::CODSITPRE, $this->codsitpre);
		if ($this->isColumnModified(FordefpryPeer::CONPOA)) $criteria->add(FordefpryPeer::CONPOA, $this->conpoa);
		if ($this->isColumnModified(FordefpryPeer::FECINI)) $criteria->add(FordefpryPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FordefpryPeer::FECCUL)) $criteria->add(FordefpryPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(FordefpryPeer::UBINAC)) $criteria->add(FordefpryPeer::UBINAC, $this->ubinac);
		if ($this->isColumnModified(FordefpryPeer::CODEQU)) $criteria->add(FordefpryPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(FordefpryPeer::CODSUBOBJ)) $criteria->add(FordefpryPeer::CODSUBOBJ, $this->codsubobj);
		if ($this->isColumnModified(FordefpryPeer::CODSUBSUBOBJ)) $criteria->add(FordefpryPeer::CODSUBSUBOBJ, $this->codsubsubobj);
		if ($this->isColumnModified(FordefpryPeer::OBJESTNUEETA)) $criteria->add(FordefpryPeer::OBJESTNUEETA, $this->objestnueeta);
		if ($this->isColumnModified(FordefpryPeer::OBJESTINS)) $criteria->add(FordefpryPeer::OBJESTINS, $this->objestins);
		if ($this->isColumnModified(FordefpryPeer::OBJEESPPRO)) $criteria->add(FordefpryPeer::OBJEESPPRO, $this->objeesppro);
		if ($this->isColumnModified(FordefpryPeer::INDPRO)) $criteria->add(FordefpryPeer::INDPRO, $this->indpro);
		if ($this->isColumnModified(FordefpryPeer::ENUPRO)) $criteria->add(FordefpryPeer::ENUPRO, $this->enupro);
		if ($this->isColumnModified(FordefpryPeer::INDSITACT)) $criteria->add(FordefpryPeer::INDSITACT, $this->indsitact);
		if ($this->isColumnModified(FordefpryPeer::FECULTDAT)) $criteria->add(FordefpryPeer::FECULTDAT, $this->fecultdat);
		if ($this->isColumnModified(FordefpryPeer::FORIND)) $criteria->add(FordefpryPeer::FORIND, $this->forind);
		if ($this->isColumnModified(FordefpryPeer::FUEIND)) $criteria->add(FordefpryPeer::FUEIND, $this->fueind);
		if ($this->isColumnModified(FordefpryPeer::INDSITOBJ)) $criteria->add(FordefpryPeer::INDSITOBJ, $this->indsitobj);
		if ($this->isColumnModified(FordefpryPeer::TIEIMP)) $criteria->add(FordefpryPeer::TIEIMP, $this->tieimp);
		if ($this->isColumnModified(FordefpryPeer::RESPRO)) $criteria->add(FordefpryPeer::RESPRO, $this->respro);
		if ($this->isColumnModified(FordefpryPeer::DESMET)) $criteria->add(FordefpryPeer::DESMET, $this->desmet);
		if ($this->isColumnModified(FordefpryPeer::CODUNIMEDMET)) $criteria->add(FordefpryPeer::CODUNIMEDMET, $this->codunimedmet);
		if ($this->isColumnModified(FordefpryPeer::CANTMET)) $criteria->add(FordefpryPeer::CANTMET, $this->cantmet);
		if ($this->isColumnModified(FordefpryPeer::BENPRO)) $criteria->add(FordefpryPeer::BENPRO, $this->benpro);
		if ($this->isColumnModified(FordefpryPeer::CODEJEDES)) $criteria->add(FordefpryPeer::CODEJEDES, $this->codejedes);
		if ($this->isColumnModified(FordefpryPeer::CODNUCDES)) $criteria->add(FordefpryPeer::CODNUCDES, $this->codnucdes);
		if ($this->isColumnModified(FordefpryPeer::CODZONECO)) $criteria->add(FordefpryPeer::CODZONECO, $this->codzoneco);
		if ($this->isColumnModified(FordefpryPeer::COMINDUST)) $criteria->add(FordefpryPeer::COMINDUST, $this->comindust);
		if ($this->isColumnModified(FordefpryPeer::CODSEC)) $criteria->add(FordefpryPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(FordefpryPeer::CODSUBSEC)) $criteria->add(FordefpryPeer::CODSUBSEC, $this->codsubsec);
		if ($this->isColumnModified(FordefpryPeer::MONTOTPRY)) $criteria->add(FordefpryPeer::MONTOTPRY, $this->montotpry);
		if ($this->isColumnModified(FordefpryPeer::CODEMP)) $criteria->add(FordefpryPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FordefpryPeer::NOMEMP)) $criteria->add(FordefpryPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(FordefpryPeer::CAREMP)) $criteria->add(FordefpryPeer::CAREMP, $this->caremp);
		if ($this->isColumnModified(FordefpryPeer::UNIADSEMP)) $criteria->add(FordefpryPeer::UNIADSEMP, $this->uniadsemp);
		if ($this->isColumnModified(FordefpryPeer::TELEMP)) $criteria->add(FordefpryPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(FordefpryPeer::FAXEMP)) $criteria->add(FordefpryPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(FordefpryPeer::EMAEMP)) $criteria->add(FordefpryPeer::EMAEMP, $this->emaemp);
		if ($this->isColumnModified(FordefpryPeer::ACCOTRINS)) $criteria->add(FordefpryPeer::ACCOTRINS, $this->accotrins);
		if ($this->isColumnModified(FordefpryPeer::OBSACCOTRINS)) $criteria->add(FordefpryPeer::OBSACCOTRINS, $this->obsaccotrins);
		if ($this->isColumnModified(FordefpryPeer::CONPRYOTR)) $criteria->add(FordefpryPeer::CONPRYOTR, $this->conpryotr);
		if ($this->isColumnModified(FordefpryPeer::OBSCONPRYOTR)) $criteria->add(FordefpryPeer::OBSCONPRYOTR, $this->obsconpryotr);
		if ($this->isColumnModified(FordefpryPeer::CONOTRPRY)) $criteria->add(FordefpryPeer::CONOTRPRY, $this->conotrpry);
		if ($this->isColumnModified(FordefpryPeer::OBSCONOTRPRY)) $criteria->add(FordefpryPeer::OBSCONOTRPRY, $this->obsconotrpry);
		if ($this->isColumnModified(FordefpryPeer::TIPACCAGE)) $criteria->add(FordefpryPeer::TIPACCAGE, $this->tipaccage);
		if ($this->isColumnModified(FordefpryPeer::PLACONTIN)) $criteria->add(FordefpryPeer::PLACONTIN, $this->placontin);
		if ($this->isColumnModified(FordefpryPeer::OBSPLACONTIN)) $criteria->add(FordefpryPeer::OBSPLACONTIN, $this->obsplacontin);
		if ($this->isColumnModified(FordefpryPeer::NROEMPDIR)) $criteria->add(FordefpryPeer::NROEMPDIR, $this->nroempdir);
		if ($this->isColumnModified(FordefpryPeer::NROEMPIND)) $criteria->add(FordefpryPeer::NROEMPIND, $this->nroempind);
		if ($this->isColumnModified(FordefpryPeer::DESBREPRY)) $criteria->add(FordefpryPeer::DESBREPRY, $this->desbrepry);
		if ($this->isColumnModified(FordefpryPeer::PORAVAFIS)) $criteria->add(FordefpryPeer::PORAVAFIS, $this->poravafis);
		if ($this->isColumnModified(FordefpryPeer::PORAVAFIN)) $criteria->add(FordefpryPeer::PORAVAFIN, $this->poravafin);
		if ($this->isColumnModified(FordefpryPeer::UNIEJEPRI)) $criteria->add(FordefpryPeer::UNIEJEPRI, $this->uniejepri);
		if ($this->isColumnModified(FordefpryPeer::UBIGEO)) $criteria->add(FordefpryPeer::UBIGEO, $this->ubigeo);
		if ($this->isColumnModified(FordefpryPeer::PLACTG)) $criteria->add(FordefpryPeer::PLACTG, $this->plactg);
		if ($this->isColumnModified(FordefpryPeer::CODDIR)) $criteria->add(FordefpryPeer::CODDIR, $this->coddir);
		if ($this->isColumnModified(FordefpryPeer::FACRZG)) $criteria->add(FordefpryPeer::FACRZG, $this->facrzg);
		if ($this->isColumnModified(FordefpryPeer::OBJPNDES)) $criteria->add(FordefpryPeer::OBJPNDES, $this->objpndes);
		if ($this->isColumnModified(FordefpryPeer::UNIMEDRES)) $criteria->add(FordefpryPeer::UNIMEDRES, $this->unimedres);
		if ($this->isColumnModified(FordefpryPeer::CODPRG)) $criteria->add(FordefpryPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FordefpryPeer::ID)) $criteria->add(FordefpryPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefpryPeer::DATABASE_NAME);

		$criteria->add(FordefpryPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNompro($this->nompro);

		$copyObj->setProacc($this->proacc);

		$copyObj->setCodsta($this->codsta);

		$copyObj->setCodsitpre($this->codsitpre);

		$copyObj->setConpoa($this->conpoa);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setUbinac($this->ubinac);

		$copyObj->setCodequ($this->codequ);

		$copyObj->setCodsubobj($this->codsubobj);

		$copyObj->setCodsubsubobj($this->codsubsubobj);

		$copyObj->setObjestnueeta($this->objestnueeta);

		$copyObj->setObjestins($this->objestins);

		$copyObj->setObjeesppro($this->objeesppro);

		$copyObj->setIndpro($this->indpro);

		$copyObj->setEnupro($this->enupro);

		$copyObj->setIndsitact($this->indsitact);

		$copyObj->setFecultdat($this->fecultdat);

		$copyObj->setForind($this->forind);

		$copyObj->setFueind($this->fueind);

		$copyObj->setIndsitobj($this->indsitobj);

		$copyObj->setTieimp($this->tieimp);

		$copyObj->setRespro($this->respro);

		$copyObj->setDesmet($this->desmet);

		$copyObj->setCodunimedmet($this->codunimedmet);

		$copyObj->setCantmet($this->cantmet);

		$copyObj->setBenpro($this->benpro);

		$copyObj->setCodejedes($this->codejedes);

		$copyObj->setCodnucdes($this->codnucdes);

		$copyObj->setCodzoneco($this->codzoneco);

		$copyObj->setComindust($this->comindust);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodsubsec($this->codsubsec);

		$copyObj->setMontotpry($this->montotpry);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setCaremp($this->caremp);

		$copyObj->setUniadsemp($this->uniadsemp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setEmaemp($this->emaemp);

		$copyObj->setAccotrins($this->accotrins);

		$copyObj->setObsaccotrins($this->obsaccotrins);

		$copyObj->setConpryotr($this->conpryotr);

		$copyObj->setObsconpryotr($this->obsconpryotr);

		$copyObj->setConotrpry($this->conotrpry);

		$copyObj->setObsconotrpry($this->obsconotrpry);

		$copyObj->setTipaccage($this->tipaccage);

		$copyObj->setPlacontin($this->placontin);

		$copyObj->setObsplacontin($this->obsplacontin);

		$copyObj->setNroempdir($this->nroempdir);

		$copyObj->setNroempind($this->nroempind);

		$copyObj->setDesbrepry($this->desbrepry);

		$copyObj->setPoravafis($this->poravafis);

		$copyObj->setPoravafin($this->poravafin);

		$copyObj->setUniejepri($this->uniejepri);

		$copyObj->setUbigeo($this->ubigeo);

		$copyObj->setPlactg($this->plactg);

		$copyObj->setCoddir($this->coddir);

		$copyObj->setFacrzg($this->facrzg);

		$copyObj->setObjpndes($this->objpndes);

		$copyObj->setUnimedres($this->unimedres);

		$copyObj->setCodprg($this->codprg);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new FordefpryPeer();
		}
		return self::$peer;
	}

} 