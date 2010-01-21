<?php


abstract class BaseCcbenefi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $sexrep;


	
	protected $fecnac;


	
	protected $numaso;


	
	protected $numhom;


	
	protected $nummuj;


	
	protected $numregsun;


	
	protected $empactmuj;


	
	protected $empacthom;


	
	protected $capsoc;


	
	protected $capcon;


	
	protected $feccon;


	
	protected $duraci;


	
	protected $dirnomurb;


	
	protected $dircalles;


	
	protected $dircasedi;


	
	protected $dirnumpis;


	
	protected $dirapatar;


	
	protected $dirpunref;


	
	protected $telben;


	
	protected $celben;


	
	protected $faxben;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $codarefax;


	
	protected $corele;


	
	protected $creant;


	
	protected $proela;


	
	protected $matpri;


	
	protected $dissisven;


	
	protected $ingres;


	
	protected $espacteco;


	
	protected $ocupa;


	
	protected $profe;


	
	protected $numnom;


	
	protected $fecing;


	
	protected $exten;


	
	protected $ingmen;


	
	protected $otroing;


	
	protected $detotroing;


	
	protected $ccperpre_id;


	
	protected $ccestciv_id;


	
	protected $cctipups_id;


	
	protected $ccparroq_id;


	
	protected $ccsececo_id;


	
	protected $ccacteco_id;


	
	protected $ccorimatpri_id;


	
	protected $cccargo_id;


	
	protected $cccondic_id;


	
	protected $ccubiadm_id;


	
	protected $ccciudad_id;

	
	protected $aCcperpre;

	
	protected $aCcestciv;

	
	protected $aCctipups;

	
	protected $aCcparroq;

	
	protected $aCcsececo;

	
	protected $aCcacteco;

	
	protected $aCcorimatpri;

	
	protected $aCccargo;

	
	protected $aCccondic;

	
	protected $aCcubiadm;

	
	protected $aCcciudad;

	
	protected $collCcbalgers;

	
	protected $lastCcbalgerCriteria = null;

	
	protected $collCcconbens;

	
	protected $lastCcconbenCriteria = null;

	
	protected $collCccreants;

	
	protected $lastCccreantCriteria = null;

	
	protected $collCccredits;

	
	protected $lastCccreditCriteria = null;

	
	protected $collCcdetcuadess;

	
	protected $lastCcdetcuadesCriteria = null;

	
	protected $collCcdircorbens;

	
	protected $lastCcdircorbenCriteria = null;

	
	protected $collCcperbens;

	
	protected $lastCcperbenCriteria = null;

	
	protected $collCcrepbens;

	
	protected $lastCcrepbenCriteria = null;

	
	protected $collCcsolicis;

	
	protected $lastCcsoliciCriteria = null;

	
	protected $collCcusuarios;

	
	protected $lastCcusuarioCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getSexrep()
  {

    return trim($this->sexrep);

  }
  
  public function getFecnac($format = 'Y-m-d')
  {

    if ($this->fecnac === null || $this->fecnac === '') {
      return null;
    } elseif (!is_int($this->fecnac)) {
            $ts = adodb_strtotime($this->fecnac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
      }
    } else {
      $ts = $this->fecnac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumaso()
  {

    return $this->numaso;

  }
  
  public function getNumhom()
  {

    return $this->numhom;

  }
  
  public function getNummuj()
  {

    return $this->nummuj;

  }
  
  public function getNumregsun()
  {

    return $this->numregsun;

  }
  
  public function getEmpactmuj()
  {

    return $this->empactmuj;

  }
  
  public function getEmpacthom()
  {

    return $this->empacthom;

  }
  
  public function getCapsoc()
  {

    return $this->capsoc;

  }
  
  public function getCapcon($val=false)
  {

    if($val) return number_format($this->capcon,2,',','.');
    else return $this->capcon;

  }
  
  public function getFeccon($format = 'Y-m-d')
  {

    if ($this->feccon === null || $this->feccon === '') {
      return null;
    } elseif (!is_int($this->feccon)) {
            $ts = adodb_strtotime($this->feccon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
      }
    } else {
      $ts = $this->feccon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDuraci()
  {

    return $this->duraci;

  }
  
  public function getDirnomurb()
  {

    return trim($this->dirnomurb);

  }
  
  public function getDircalles()
  {

    return trim($this->dircalles);

  }
  
  public function getDircasedi()
  {

    return trim($this->dircasedi);

  }
  
  public function getDirnumpis()
  {

    return trim($this->dirnumpis);

  }
  
  public function getDirapatar()
  {

    return trim($this->dirapatar);

  }
  
  public function getDirpunref()
  {

    return trim($this->dirpunref);

  }
  
  public function getTelben()
  {

    return trim($this->telben);

  }
  
  public function getCelben()
  {

    return trim($this->celben);

  }
  
  public function getFaxben()
  {

    return trim($this->faxben);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getCodarefax()
  {

    return trim($this->codarefax);

  }
  
  public function getCorele()
  {

    return trim($this->corele);

  }
  
  public function getCreant()
  {

    return $this->creant;

  }
  
  public function getProela()
  {

    return trim($this->proela);

  }
  
  public function getMatpri()
  {

    return trim($this->matpri);

  }
  
  public function getDissisven()
  {

    return trim($this->dissisven);

  }
  
  public function getIngres($val=false)
  {

    if($val) return number_format($this->ingres,2,',','.');
    else return $this->ingres;

  }
  
  public function getEspacteco()
  {

    return trim($this->espacteco);

  }
  
  public function getOcupa()
  {

    return trim($this->ocupa);

  }
  
  public function getProfe()
  {

    return trim($this->profe);

  }
  
  public function getNumnom()
  {

    return trim($this->numnom);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getExten()
  {

    return trim($this->exten);

  }
  
  public function getIngmen($val=false)
  {

    if($val) return number_format($this->ingmen,2,',','.');
    else return $this->ingmen;

  }
  
  public function getOtroing($val=false)
  {

    if($val) return number_format($this->otroing,2,',','.');
    else return $this->otroing;

  }
  
  public function getDetotroing()
  {

    return trim($this->detotroing);

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCcestcivId()
  {

    return $this->ccestciv_id;

  }
  
  public function getCctipupsId()
  {

    return $this->cctipups_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
  
  public function getCcsececoId()
  {

    return $this->ccsececo_id;

  }
  
  public function getCcactecoId()
  {

    return $this->ccacteco_id;

  }
  
  public function getCcorimatpriId()
  {

    return $this->ccorimatpri_id;

  }
  
  public function getCccargoId()
  {

    return $this->cccargo_id;

  }
  
  public function getCccondicId()
  {

    return $this->cccondic_id;

  }
  
  public function getCcubiadmId()
  {

    return $this->ccubiadm_id;

  }
  
  public function getCcciudadId()
  {

    return $this->ccciudad_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::ID;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = CcbenefiPeer::NOMBEN;
      }
  
	} 
	
	public function setSexrep($v)
	{

    if ($this->sexrep !== $v) {
        $this->sexrep = $v;
        $this->modifiedColumns[] = CcbenefiPeer::SEXREP;
      }
  
	} 
	
	public function setFecnac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnac !== $ts) {
      $this->fecnac = $ts;
      $this->modifiedColumns[] = CcbenefiPeer::FECNAC;
    }

	} 
	
	public function setNumaso($v)
	{

    if ($this->numaso !== $v) {
        $this->numaso = $v;
        $this->modifiedColumns[] = CcbenefiPeer::NUMASO;
      }
  
	} 
	
	public function setNumhom($v)
	{

    if ($this->numhom !== $v) {
        $this->numhom = $v;
        $this->modifiedColumns[] = CcbenefiPeer::NUMHOM;
      }
  
	} 
	
	public function setNummuj($v)
	{

    if ($this->nummuj !== $v) {
        $this->nummuj = $v;
        $this->modifiedColumns[] = CcbenefiPeer::NUMMUJ;
      }
  
	} 
	
	public function setNumregsun($v)
	{

    if ($this->numregsun !== $v) {
        $this->numregsun = $v;
        $this->modifiedColumns[] = CcbenefiPeer::NUMREGSUN;
      }
  
	} 
	
	public function setEmpactmuj($v)
	{

    if ($this->empactmuj !== $v) {
        $this->empactmuj = $v;
        $this->modifiedColumns[] = CcbenefiPeer::EMPACTMUJ;
      }
  
	} 
	
	public function setEmpacthom($v)
	{

    if ($this->empacthom !== $v) {
        $this->empacthom = $v;
        $this->modifiedColumns[] = CcbenefiPeer::EMPACTHOM;
      }
  
	} 
	
	public function setCapsoc($v)
	{

    if ($this->capsoc !== $v) {
        $this->capsoc = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CAPSOC;
      }
  
	} 
	
	public function setCapcon($v)
	{

    if ($this->capcon !== $v) {
        $this->capcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbenefiPeer::CAPCON;
      }
  
	} 
	
	public function setFeccon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = CcbenefiPeer::FECCON;
    }

	} 
	
	public function setDuraci($v)
	{

    if ($this->duraci !== $v) {
        $this->duraci = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DURACI;
      }
  
	} 
	
	public function setDirnomurb($v)
	{

    if ($this->dirnomurb !== $v) {
        $this->dirnomurb = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DIRNOMURB;
      }
  
	} 
	
	public function setDircalles($v)
	{

    if ($this->dircalles !== $v) {
        $this->dircalles = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DIRCALLES;
      }
  
	} 
	
	public function setDircasedi($v)
	{

    if ($this->dircasedi !== $v) {
        $this->dircasedi = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DIRCASEDI;
      }
  
	} 
	
	public function setDirnumpis($v)
	{

    if ($this->dirnumpis !== $v) {
        $this->dirnumpis = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DIRNUMPIS;
      }
  
	} 
	
	public function setDirapatar($v)
	{

    if ($this->dirapatar !== $v) {
        $this->dirapatar = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DIRAPATAR;
      }
  
	} 
	
	public function setDirpunref($v)
	{

    if ($this->dirpunref !== $v) {
        $this->dirpunref = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DIRPUNREF;
      }
  
	} 
	
	public function setTelben($v)
	{

    if ($this->telben !== $v) {
        $this->telben = $v;
        $this->modifiedColumns[] = CcbenefiPeer::TELBEN;
      }
  
	} 
	
	public function setCelben($v)
	{

    if ($this->celben !== $v) {
        $this->celben = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CELBEN;
      }
  
	} 
	
	public function setFaxben($v)
	{

    if ($this->faxben !== $v) {
        $this->faxben = $v;
        $this->modifiedColumns[] = CcbenefiPeer::FAXBEN;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CODARECEL;
      }
  
	} 
	
	public function setCodarefax($v)
	{

    if ($this->codarefax !== $v) {
        $this->codarefax = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CODAREFAX;
      }
  
	} 
	
	public function setCorele($v)
	{

    if ($this->corele !== $v) {
        $this->corele = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CORELE;
      }
  
	} 
	
	public function setCreant($v)
	{

    if ($this->creant !== $v) {
        $this->creant = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CREANT;
      }
  
	} 
	
	public function setProela($v)
	{

    if ($this->proela !== $v) {
        $this->proela = $v;
        $this->modifiedColumns[] = CcbenefiPeer::PROELA;
      }
  
	} 
	
	public function setMatpri($v)
	{

    if ($this->matpri !== $v) {
        $this->matpri = $v;
        $this->modifiedColumns[] = CcbenefiPeer::MATPRI;
      }
  
	} 
	
	public function setDissisven($v)
	{

    if ($this->dissisven !== $v) {
        $this->dissisven = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DISSISVEN;
      }
  
	} 
	
	public function setIngres($v)
	{

    if ($this->ingres !== $v) {
        $this->ingres = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbenefiPeer::INGRES;
      }
  
	} 
	
	public function setEspacteco($v)
	{

    if ($this->espacteco !== $v) {
        $this->espacteco = $v;
        $this->modifiedColumns[] = CcbenefiPeer::ESPACTECO;
      }
  
	} 
	
	public function setOcupa($v)
	{

    if ($this->ocupa !== $v) {
        $this->ocupa = $v;
        $this->modifiedColumns[] = CcbenefiPeer::OCUPA;
      }
  
	} 
	
	public function setProfe($v)
	{

    if ($this->profe !== $v) {
        $this->profe = $v;
        $this->modifiedColumns[] = CcbenefiPeer::PROFE;
      }
  
	} 
	
	public function setNumnom($v)
	{

    if ($this->numnom !== $v) {
        $this->numnom = $v;
        $this->modifiedColumns[] = CcbenefiPeer::NUMNOM;
      }
  
	} 
	
	public function setFecing($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = CcbenefiPeer::FECING;
    }

	} 
	
	public function setExten($v)
	{

    if ($this->exten !== $v) {
        $this->exten = $v;
        $this->modifiedColumns[] = CcbenefiPeer::EXTEN;
      }
  
	} 
	
	public function setIngmen($v)
	{

    if ($this->ingmen !== $v) {
        $this->ingmen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbenefiPeer::INGMEN;
      }
  
	} 
	
	public function setOtroing($v)
	{

    if ($this->otroing !== $v) {
        $this->otroing = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbenefiPeer::OTROING;
      }
  
	} 
	
	public function setDetotroing($v)
	{

    if ($this->detotroing !== $v) {
        $this->detotroing = $v;
        $this->modifiedColumns[] = CcbenefiPeer::DETOTROING;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCcestcivId($v)
	{

    if ($this->ccestciv_id !== $v) {
        $this->ccestciv_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCESTCIV_ID;
      }
  
		if ($this->aCcestciv !== null && $this->aCcestciv->getId() !== $v) {
			$this->aCcestciv = null;
		}

	} 
	
	public function setCctipupsId($v)
	{

    if ($this->cctipups_id !== $v) {
        $this->cctipups_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCTIPUPS_ID;
      }
  
		if ($this->aCctipups !== null && $this->aCctipups->getId() !== $v) {
			$this->aCctipups = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
	
	public function setCcsececoId($v)
	{

    if ($this->ccsececo_id !== $v) {
        $this->ccsececo_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCSECECO_ID;
      }
  
		if ($this->aCcsececo !== null && $this->aCcsececo->getId() !== $v) {
			$this->aCcsececo = null;
		}

	} 
	
	public function setCcactecoId($v)
	{

    if ($this->ccacteco_id !== $v) {
        $this->ccacteco_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCACTECO_ID;
      }
  
		if ($this->aCcacteco !== null && $this->aCcacteco->getId() !== $v) {
			$this->aCcacteco = null;
		}

	} 
	
	public function setCcorimatpriId($v)
	{

    if ($this->ccorimatpri_id !== $v) {
        $this->ccorimatpri_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCORIMATPRI_ID;
      }
  
		if ($this->aCcorimatpri !== null && $this->aCcorimatpri->getId() !== $v) {
			$this->aCcorimatpri = null;
		}

	} 
	
	public function setCccargoId($v)
	{

    if ($this->cccargo_id !== $v) {
        $this->cccargo_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCCARGO_ID;
      }
  
		if ($this->aCccargo !== null && $this->aCccargo->getId() !== $v) {
			$this->aCccargo = null;
		}

	} 
	
	public function setCccondicId($v)
	{

    if ($this->cccondic_id !== $v) {
        $this->cccondic_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCCONDIC_ID;
      }
  
		if ($this->aCccondic !== null && $this->aCccondic->getId() !== $v) {
			$this->aCccondic = null;
		}

	} 
	
	public function setCcubiadmId($v)
	{

    if ($this->ccubiadm_id !== $v) {
        $this->ccubiadm_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCUBIADM_ID;
      }
  
		if ($this->aCcubiadm !== null && $this->aCcubiadm->getId() !== $v) {
			$this->aCcubiadm = null;
		}

	} 
	
	public function setCcciudadId($v)
	{

    if ($this->ccciudad_id !== $v) {
        $this->ccciudad_id = $v;
        $this->modifiedColumns[] = CcbenefiPeer::CCCIUDAD_ID;
      }
  
		if ($this->aCcciudad !== null && $this->aCcciudad->getId() !== $v) {
			$this->aCcciudad = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->cedrif = $rs->getString($startcol + 1);

      $this->nomben = $rs->getString($startcol + 2);

      $this->sexrep = $rs->getString($startcol + 3);

      $this->fecnac = $rs->getDate($startcol + 4, null);

      $this->numaso = $rs->getInt($startcol + 5);

      $this->numhom = $rs->getInt($startcol + 6);

      $this->nummuj = $rs->getInt($startcol + 7);

      $this->numregsun = $rs->getInt($startcol + 8);

      $this->empactmuj = $rs->getInt($startcol + 9);

      $this->empacthom = $rs->getInt($startcol + 10);

      $this->capsoc = $rs->getInt($startcol + 11);

      $this->capcon = $rs->getFloat($startcol + 12);

      $this->feccon = $rs->getDate($startcol + 13, null);

      $this->duraci = $rs->getInt($startcol + 14);

      $this->dirnomurb = $rs->getString($startcol + 15);

      $this->dircalles = $rs->getString($startcol + 16);

      $this->dircasedi = $rs->getString($startcol + 17);

      $this->dirnumpis = $rs->getString($startcol + 18);

      $this->dirapatar = $rs->getString($startcol + 19);

      $this->dirpunref = $rs->getString($startcol + 20);

      $this->telben = $rs->getString($startcol + 21);

      $this->celben = $rs->getString($startcol + 22);

      $this->faxben = $rs->getString($startcol + 23);

      $this->codaretel = $rs->getString($startcol + 24);

      $this->codarecel = $rs->getString($startcol + 25);

      $this->codarefax = $rs->getString($startcol + 26);

      $this->corele = $rs->getString($startcol + 27);

      $this->creant = $rs->getBoolean($startcol + 28);

      $this->proela = $rs->getString($startcol + 29);

      $this->matpri = $rs->getString($startcol + 30);

      $this->dissisven = $rs->getString($startcol + 31);

      $this->ingres = $rs->getFloat($startcol + 32);

      $this->espacteco = $rs->getString($startcol + 33);

      $this->ocupa = $rs->getString($startcol + 34);

      $this->profe = $rs->getString($startcol + 35);

      $this->numnom = $rs->getString($startcol + 36);

      $this->fecing = $rs->getDate($startcol + 37, null);

      $this->exten = $rs->getString($startcol + 38);

      $this->ingmen = $rs->getFloat($startcol + 39);

      $this->otroing = $rs->getFloat($startcol + 40);

      $this->detotroing = $rs->getString($startcol + 41);

      $this->ccperpre_id = $rs->getInt($startcol + 42);

      $this->ccestciv_id = $rs->getInt($startcol + 43);

      $this->cctipups_id = $rs->getInt($startcol + 44);

      $this->ccparroq_id = $rs->getInt($startcol + 45);

      $this->ccsececo_id = $rs->getInt($startcol + 46);

      $this->ccacteco_id = $rs->getInt($startcol + 47);

      $this->ccorimatpri_id = $rs->getInt($startcol + 48);

      $this->cccargo_id = $rs->getInt($startcol + 49);

      $this->cccondic_id = $rs->getInt($startcol + 50);

      $this->ccubiadm_id = $rs->getInt($startcol + 51);

      $this->ccciudad_id = $rs->getInt($startcol + 52);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 53; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbenefi object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcbenefiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbenefiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbenefiPeer::DATABASE_NAME);
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


												
			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCcestciv !== null) {
				if ($this->aCcestciv->isModified()) {
					$affectedRows += $this->aCcestciv->save($con);
				}
				$this->setCcestciv($this->aCcestciv);
			}

			if ($this->aCctipups !== null) {
				if ($this->aCctipups->isModified()) {
					$affectedRows += $this->aCctipups->save($con);
				}
				$this->setCctipups($this->aCctipups);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}

			if ($this->aCcsececo !== null) {
				if ($this->aCcsececo->isModified()) {
					$affectedRows += $this->aCcsececo->save($con);
				}
				$this->setCcsececo($this->aCcsececo);
			}

			if ($this->aCcacteco !== null) {
				if ($this->aCcacteco->isModified()) {
					$affectedRows += $this->aCcacteco->save($con);
				}
				$this->setCcacteco($this->aCcacteco);
			}

			if ($this->aCcorimatpri !== null) {
				if ($this->aCcorimatpri->isModified()) {
					$affectedRows += $this->aCcorimatpri->save($con);
				}
				$this->setCcorimatpri($this->aCcorimatpri);
			}

			if ($this->aCccargo !== null) {
				if ($this->aCccargo->isModified()) {
					$affectedRows += $this->aCccargo->save($con);
				}
				$this->setCccargo($this->aCccargo);
			}

			if ($this->aCccondic !== null) {
				if ($this->aCccondic->isModified()) {
					$affectedRows += $this->aCccondic->save($con);
				}
				$this->setCccondic($this->aCccondic);
			}

			if ($this->aCcubiadm !== null) {
				if ($this->aCcubiadm->isModified()) {
					$affectedRows += $this->aCcubiadm->save($con);
				}
				$this->setCcubiadm($this->aCcubiadm);
			}

			if ($this->aCcciudad !== null) {
				if ($this->aCcciudad->isModified()) {
					$affectedRows += $this->aCcciudad->save($con);
				}
				$this->setCcciudad($this->aCcciudad);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbenefiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbenefiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbalgers !== null) {
				foreach($this->collCcbalgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcconbens !== null) {
				foreach($this->collCcconbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccreants !== null) {
				foreach($this->collCccreants as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccredits !== null) {
				foreach($this->collCccredits as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdetcuadess !== null) {
				foreach($this->collCcdetcuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdircorbens !== null) {
				foreach($this->collCcdircorbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcperbens !== null) {
				foreach($this->collCcperbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrepbens !== null) {
				foreach($this->collCcrepbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolicis !== null) {
				foreach($this->collCcsolicis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcusuarios !== null) {
				foreach($this->collCcusuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCcestciv !== null) {
				if (!$this->aCcestciv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestciv->getValidationFailures());
				}
			}

			if ($this->aCctipups !== null) {
				if (!$this->aCctipups->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipups->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}

			if ($this->aCcsececo !== null) {
				if (!$this->aCcsececo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsececo->getValidationFailures());
				}
			}

			if ($this->aCcacteco !== null) {
				if (!$this->aCcacteco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcacteco->getValidationFailures());
				}
			}

			if ($this->aCcorimatpri !== null) {
				if (!$this->aCcorimatpri->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcorimatpri->getValidationFailures());
				}
			}

			if ($this->aCccargo !== null) {
				if (!$this->aCccargo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccargo->getValidationFailures());
				}
			}

			if ($this->aCccondic !== null) {
				if (!$this->aCccondic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccondic->getValidationFailures());
				}
			}

			if ($this->aCcubiadm !== null) {
				if (!$this->aCcubiadm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcubiadm->getValidationFailures());
				}
			}

			if ($this->aCcciudad !== null) {
				if (!$this->aCcciudad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcciudad->getValidationFailures());
				}
			}


			if (($retval = CcbenefiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbalgers !== null) {
					foreach($this->collCcbalgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcconbens !== null) {
					foreach($this->collCcconbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccreants !== null) {
					foreach($this->collCccreants as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccredits !== null) {
					foreach($this->collCccredits as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdetcuadess !== null) {
					foreach($this->collCcdetcuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdircorbens !== null) {
					foreach($this->collCcdircorbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcperbens !== null) {
					foreach($this->collCcperbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrepbens !== null) {
					foreach($this->collCcrepbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolicis !== null) {
					foreach($this->collCcsolicis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcusuarios !== null) {
					foreach($this->collCcusuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbenefiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCedrif();
				break;
			case 2:
				return $this->getNomben();
				break;
			case 3:
				return $this->getSexrep();
				break;
			case 4:
				return $this->getFecnac();
				break;
			case 5:
				return $this->getNumaso();
				break;
			case 6:
				return $this->getNumhom();
				break;
			case 7:
				return $this->getNummuj();
				break;
			case 8:
				return $this->getNumregsun();
				break;
			case 9:
				return $this->getEmpactmuj();
				break;
			case 10:
				return $this->getEmpacthom();
				break;
			case 11:
				return $this->getCapsoc();
				break;
			case 12:
				return $this->getCapcon();
				break;
			case 13:
				return $this->getFeccon();
				break;
			case 14:
				return $this->getDuraci();
				break;
			case 15:
				return $this->getDirnomurb();
				break;
			case 16:
				return $this->getDircalles();
				break;
			case 17:
				return $this->getDircasedi();
				break;
			case 18:
				return $this->getDirnumpis();
				break;
			case 19:
				return $this->getDirapatar();
				break;
			case 20:
				return $this->getDirpunref();
				break;
			case 21:
				return $this->getTelben();
				break;
			case 22:
				return $this->getCelben();
				break;
			case 23:
				return $this->getFaxben();
				break;
			case 24:
				return $this->getCodaretel();
				break;
			case 25:
				return $this->getCodarecel();
				break;
			case 26:
				return $this->getCodarefax();
				break;
			case 27:
				return $this->getCorele();
				break;
			case 28:
				return $this->getCreant();
				break;
			case 29:
				return $this->getProela();
				break;
			case 30:
				return $this->getMatpri();
				break;
			case 31:
				return $this->getDissisven();
				break;
			case 32:
				return $this->getIngres();
				break;
			case 33:
				return $this->getEspacteco();
				break;
			case 34:
				return $this->getOcupa();
				break;
			case 35:
				return $this->getProfe();
				break;
			case 36:
				return $this->getNumnom();
				break;
			case 37:
				return $this->getFecing();
				break;
			case 38:
				return $this->getExten();
				break;
			case 39:
				return $this->getIngmen();
				break;
			case 40:
				return $this->getOtroing();
				break;
			case 41:
				return $this->getDetotroing();
				break;
			case 42:
				return $this->getCcperpreId();
				break;
			case 43:
				return $this->getCcestcivId();
				break;
			case 44:
				return $this->getCctipupsId();
				break;
			case 45:
				return $this->getCcparroqId();
				break;
			case 46:
				return $this->getCcsececoId();
				break;
			case 47:
				return $this->getCcactecoId();
				break;
			case 48:
				return $this->getCcorimatpriId();
				break;
			case 49:
				return $this->getCccargoId();
				break;
			case 50:
				return $this->getCccondicId();
				break;
			case 51:
				return $this->getCcubiadmId();
				break;
			case 52:
				return $this->getCcciudadId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbenefiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCedrif(),
			$keys[2] => $this->getNomben(),
			$keys[3] => $this->getSexrep(),
			$keys[4] => $this->getFecnac(),
			$keys[5] => $this->getNumaso(),
			$keys[6] => $this->getNumhom(),
			$keys[7] => $this->getNummuj(),
			$keys[8] => $this->getNumregsun(),
			$keys[9] => $this->getEmpactmuj(),
			$keys[10] => $this->getEmpacthom(),
			$keys[11] => $this->getCapsoc(),
			$keys[12] => $this->getCapcon(),
			$keys[13] => $this->getFeccon(),
			$keys[14] => $this->getDuraci(),
			$keys[15] => $this->getDirnomurb(),
			$keys[16] => $this->getDircalles(),
			$keys[17] => $this->getDircasedi(),
			$keys[18] => $this->getDirnumpis(),
			$keys[19] => $this->getDirapatar(),
			$keys[20] => $this->getDirpunref(),
			$keys[21] => $this->getTelben(),
			$keys[22] => $this->getCelben(),
			$keys[23] => $this->getFaxben(),
			$keys[24] => $this->getCodaretel(),
			$keys[25] => $this->getCodarecel(),
			$keys[26] => $this->getCodarefax(),
			$keys[27] => $this->getCorele(),
			$keys[28] => $this->getCreant(),
			$keys[29] => $this->getProela(),
			$keys[30] => $this->getMatpri(),
			$keys[31] => $this->getDissisven(),
			$keys[32] => $this->getIngres(),
			$keys[33] => $this->getEspacteco(),
			$keys[34] => $this->getOcupa(),
			$keys[35] => $this->getProfe(),
			$keys[36] => $this->getNumnom(),
			$keys[37] => $this->getFecing(),
			$keys[38] => $this->getExten(),
			$keys[39] => $this->getIngmen(),
			$keys[40] => $this->getOtroing(),
			$keys[41] => $this->getDetotroing(),
			$keys[42] => $this->getCcperpreId(),
			$keys[43] => $this->getCcestcivId(),
			$keys[44] => $this->getCctipupsId(),
			$keys[45] => $this->getCcparroqId(),
			$keys[46] => $this->getCcsececoId(),
			$keys[47] => $this->getCcactecoId(),
			$keys[48] => $this->getCcorimatpriId(),
			$keys[49] => $this->getCccargoId(),
			$keys[50] => $this->getCccondicId(),
			$keys[51] => $this->getCcubiadmId(),
			$keys[52] => $this->getCcciudadId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbenefiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCedrif($value);
				break;
			case 2:
				$this->setNomben($value);
				break;
			case 3:
				$this->setSexrep($value);
				break;
			case 4:
				$this->setFecnac($value);
				break;
			case 5:
				$this->setNumaso($value);
				break;
			case 6:
				$this->setNumhom($value);
				break;
			case 7:
				$this->setNummuj($value);
				break;
			case 8:
				$this->setNumregsun($value);
				break;
			case 9:
				$this->setEmpactmuj($value);
				break;
			case 10:
				$this->setEmpacthom($value);
				break;
			case 11:
				$this->setCapsoc($value);
				break;
			case 12:
				$this->setCapcon($value);
				break;
			case 13:
				$this->setFeccon($value);
				break;
			case 14:
				$this->setDuraci($value);
				break;
			case 15:
				$this->setDirnomurb($value);
				break;
			case 16:
				$this->setDircalles($value);
				break;
			case 17:
				$this->setDircasedi($value);
				break;
			case 18:
				$this->setDirnumpis($value);
				break;
			case 19:
				$this->setDirapatar($value);
				break;
			case 20:
				$this->setDirpunref($value);
				break;
			case 21:
				$this->setTelben($value);
				break;
			case 22:
				$this->setCelben($value);
				break;
			case 23:
				$this->setFaxben($value);
				break;
			case 24:
				$this->setCodaretel($value);
				break;
			case 25:
				$this->setCodarecel($value);
				break;
			case 26:
				$this->setCodarefax($value);
				break;
			case 27:
				$this->setCorele($value);
				break;
			case 28:
				$this->setCreant($value);
				break;
			case 29:
				$this->setProela($value);
				break;
			case 30:
				$this->setMatpri($value);
				break;
			case 31:
				$this->setDissisven($value);
				break;
			case 32:
				$this->setIngres($value);
				break;
			case 33:
				$this->setEspacteco($value);
				break;
			case 34:
				$this->setOcupa($value);
				break;
			case 35:
				$this->setProfe($value);
				break;
			case 36:
				$this->setNumnom($value);
				break;
			case 37:
				$this->setFecing($value);
				break;
			case 38:
				$this->setExten($value);
				break;
			case 39:
				$this->setIngmen($value);
				break;
			case 40:
				$this->setOtroing($value);
				break;
			case 41:
				$this->setDetotroing($value);
				break;
			case 42:
				$this->setCcperpreId($value);
				break;
			case 43:
				$this->setCcestcivId($value);
				break;
			case 44:
				$this->setCctipupsId($value);
				break;
			case 45:
				$this->setCcparroqId($value);
				break;
			case 46:
				$this->setCcsececoId($value);
				break;
			case 47:
				$this->setCcactecoId($value);
				break;
			case 48:
				$this->setCcorimatpriId($value);
				break;
			case 49:
				$this->setCccargoId($value);
				break;
			case 50:
				$this->setCccondicId($value);
				break;
			case 51:
				$this->setCcubiadmId($value);
				break;
			case 52:
				$this->setCcciudadId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbenefiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedrif($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSexrep($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecnac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumaso($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumhom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNummuj($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumregsun($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmpactmuj($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEmpacthom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCapsoc($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCapcon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFeccon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDuraci($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDirnomurb($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDircalles($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDircasedi($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDirnumpis($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDirapatar($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDirpunref($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setTelben($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCelben($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFaxben($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodaretel($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodarecel($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodarefax($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCorele($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCreant($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setProela($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setMatpri($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setDissisven($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setIngres($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setEspacteco($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setOcupa($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setProfe($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNumnom($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setFecing($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setExten($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setIngmen($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setOtroing($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setDetotroing($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setCcperpreId($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCcestcivId($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setCctipupsId($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setCcparroqId($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setCcsececoId($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setCcactecoId($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setCcorimatpriId($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setCccargoId($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setCccondicId($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setCcubiadmId($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setCcciudadId($arr[$keys[52]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbenefiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbenefiPeer::ID)) $criteria->add(CcbenefiPeer::ID, $this->id);
		if ($this->isColumnModified(CcbenefiPeer::CEDRIF)) $criteria->add(CcbenefiPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CcbenefiPeer::NOMBEN)) $criteria->add(CcbenefiPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(CcbenefiPeer::SEXREP)) $criteria->add(CcbenefiPeer::SEXREP, $this->sexrep);
		if ($this->isColumnModified(CcbenefiPeer::FECNAC)) $criteria->add(CcbenefiPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(CcbenefiPeer::NUMASO)) $criteria->add(CcbenefiPeer::NUMASO, $this->numaso);
		if ($this->isColumnModified(CcbenefiPeer::NUMHOM)) $criteria->add(CcbenefiPeer::NUMHOM, $this->numhom);
		if ($this->isColumnModified(CcbenefiPeer::NUMMUJ)) $criteria->add(CcbenefiPeer::NUMMUJ, $this->nummuj);
		if ($this->isColumnModified(CcbenefiPeer::NUMREGSUN)) $criteria->add(CcbenefiPeer::NUMREGSUN, $this->numregsun);
		if ($this->isColumnModified(CcbenefiPeer::EMPACTMUJ)) $criteria->add(CcbenefiPeer::EMPACTMUJ, $this->empactmuj);
		if ($this->isColumnModified(CcbenefiPeer::EMPACTHOM)) $criteria->add(CcbenefiPeer::EMPACTHOM, $this->empacthom);
		if ($this->isColumnModified(CcbenefiPeer::CAPSOC)) $criteria->add(CcbenefiPeer::CAPSOC, $this->capsoc);
		if ($this->isColumnModified(CcbenefiPeer::CAPCON)) $criteria->add(CcbenefiPeer::CAPCON, $this->capcon);
		if ($this->isColumnModified(CcbenefiPeer::FECCON)) $criteria->add(CcbenefiPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CcbenefiPeer::DURACI)) $criteria->add(CcbenefiPeer::DURACI, $this->duraci);
		if ($this->isColumnModified(CcbenefiPeer::DIRNOMURB)) $criteria->add(CcbenefiPeer::DIRNOMURB, $this->dirnomurb);
		if ($this->isColumnModified(CcbenefiPeer::DIRCALLES)) $criteria->add(CcbenefiPeer::DIRCALLES, $this->dircalles);
		if ($this->isColumnModified(CcbenefiPeer::DIRCASEDI)) $criteria->add(CcbenefiPeer::DIRCASEDI, $this->dircasedi);
		if ($this->isColumnModified(CcbenefiPeer::DIRNUMPIS)) $criteria->add(CcbenefiPeer::DIRNUMPIS, $this->dirnumpis);
		if ($this->isColumnModified(CcbenefiPeer::DIRAPATAR)) $criteria->add(CcbenefiPeer::DIRAPATAR, $this->dirapatar);
		if ($this->isColumnModified(CcbenefiPeer::DIRPUNREF)) $criteria->add(CcbenefiPeer::DIRPUNREF, $this->dirpunref);
		if ($this->isColumnModified(CcbenefiPeer::TELBEN)) $criteria->add(CcbenefiPeer::TELBEN, $this->telben);
		if ($this->isColumnModified(CcbenefiPeer::CELBEN)) $criteria->add(CcbenefiPeer::CELBEN, $this->celben);
		if ($this->isColumnModified(CcbenefiPeer::FAXBEN)) $criteria->add(CcbenefiPeer::FAXBEN, $this->faxben);
		if ($this->isColumnModified(CcbenefiPeer::CODARETEL)) $criteria->add(CcbenefiPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcbenefiPeer::CODARECEL)) $criteria->add(CcbenefiPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcbenefiPeer::CODAREFAX)) $criteria->add(CcbenefiPeer::CODAREFAX, $this->codarefax);
		if ($this->isColumnModified(CcbenefiPeer::CORELE)) $criteria->add(CcbenefiPeer::CORELE, $this->corele);
		if ($this->isColumnModified(CcbenefiPeer::CREANT)) $criteria->add(CcbenefiPeer::CREANT, $this->creant);
		if ($this->isColumnModified(CcbenefiPeer::PROELA)) $criteria->add(CcbenefiPeer::PROELA, $this->proela);
		if ($this->isColumnModified(CcbenefiPeer::MATPRI)) $criteria->add(CcbenefiPeer::MATPRI, $this->matpri);
		if ($this->isColumnModified(CcbenefiPeer::DISSISVEN)) $criteria->add(CcbenefiPeer::DISSISVEN, $this->dissisven);
		if ($this->isColumnModified(CcbenefiPeer::INGRES)) $criteria->add(CcbenefiPeer::INGRES, $this->ingres);
		if ($this->isColumnModified(CcbenefiPeer::ESPACTECO)) $criteria->add(CcbenefiPeer::ESPACTECO, $this->espacteco);
		if ($this->isColumnModified(CcbenefiPeer::OCUPA)) $criteria->add(CcbenefiPeer::OCUPA, $this->ocupa);
		if ($this->isColumnModified(CcbenefiPeer::PROFE)) $criteria->add(CcbenefiPeer::PROFE, $this->profe);
		if ($this->isColumnModified(CcbenefiPeer::NUMNOM)) $criteria->add(CcbenefiPeer::NUMNOM, $this->numnom);
		if ($this->isColumnModified(CcbenefiPeer::FECING)) $criteria->add(CcbenefiPeer::FECING, $this->fecing);
		if ($this->isColumnModified(CcbenefiPeer::EXTEN)) $criteria->add(CcbenefiPeer::EXTEN, $this->exten);
		if ($this->isColumnModified(CcbenefiPeer::INGMEN)) $criteria->add(CcbenefiPeer::INGMEN, $this->ingmen);
		if ($this->isColumnModified(CcbenefiPeer::OTROING)) $criteria->add(CcbenefiPeer::OTROING, $this->otroing);
		if ($this->isColumnModified(CcbenefiPeer::DETOTROING)) $criteria->add(CcbenefiPeer::DETOTROING, $this->detotroing);
		if ($this->isColumnModified(CcbenefiPeer::CCPERPRE_ID)) $criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcbenefiPeer::CCESTCIV_ID)) $criteria->add(CcbenefiPeer::CCESTCIV_ID, $this->ccestciv_id);
		if ($this->isColumnModified(CcbenefiPeer::CCTIPUPS_ID)) $criteria->add(CcbenefiPeer::CCTIPUPS_ID, $this->cctipups_id);
		if ($this->isColumnModified(CcbenefiPeer::CCPARROQ_ID)) $criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->ccparroq_id);
		if ($this->isColumnModified(CcbenefiPeer::CCSECECO_ID)) $criteria->add(CcbenefiPeer::CCSECECO_ID, $this->ccsececo_id);
		if ($this->isColumnModified(CcbenefiPeer::CCACTECO_ID)) $criteria->add(CcbenefiPeer::CCACTECO_ID, $this->ccacteco_id);
		if ($this->isColumnModified(CcbenefiPeer::CCORIMATPRI_ID)) $criteria->add(CcbenefiPeer::CCORIMATPRI_ID, $this->ccorimatpri_id);
		if ($this->isColumnModified(CcbenefiPeer::CCCARGO_ID)) $criteria->add(CcbenefiPeer::CCCARGO_ID, $this->cccargo_id);
		if ($this->isColumnModified(CcbenefiPeer::CCCONDIC_ID)) $criteria->add(CcbenefiPeer::CCCONDIC_ID, $this->cccondic_id);
		if ($this->isColumnModified(CcbenefiPeer::CCUBIADM_ID)) $criteria->add(CcbenefiPeer::CCUBIADM_ID, $this->ccubiadm_id);
		if ($this->isColumnModified(CcbenefiPeer::CCCIUDAD_ID)) $criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->ccciudad_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbenefiPeer::DATABASE_NAME);

		$criteria->add(CcbenefiPeer::ID, $this->id);

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

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setSexrep($this->sexrep);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setNumaso($this->numaso);

		$copyObj->setNumhom($this->numhom);

		$copyObj->setNummuj($this->nummuj);

		$copyObj->setNumregsun($this->numregsun);

		$copyObj->setEmpactmuj($this->empactmuj);

		$copyObj->setEmpacthom($this->empacthom);

		$copyObj->setCapsoc($this->capsoc);

		$copyObj->setCapcon($this->capcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setDuraci($this->duraci);

		$copyObj->setDirnomurb($this->dirnomurb);

		$copyObj->setDircalles($this->dircalles);

		$copyObj->setDircasedi($this->dircasedi);

		$copyObj->setDirnumpis($this->dirnumpis);

		$copyObj->setDirapatar($this->dirapatar);

		$copyObj->setDirpunref($this->dirpunref);

		$copyObj->setTelben($this->telben);

		$copyObj->setCelben($this->celben);

		$copyObj->setFaxben($this->faxben);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setCodarefax($this->codarefax);

		$copyObj->setCorele($this->corele);

		$copyObj->setCreant($this->creant);

		$copyObj->setProela($this->proela);

		$copyObj->setMatpri($this->matpri);

		$copyObj->setDissisven($this->dissisven);

		$copyObj->setIngres($this->ingres);

		$copyObj->setEspacteco($this->espacteco);

		$copyObj->setOcupa($this->ocupa);

		$copyObj->setProfe($this->profe);

		$copyObj->setNumnom($this->numnom);

		$copyObj->setFecing($this->fecing);

		$copyObj->setExten($this->exten);

		$copyObj->setIngmen($this->ingmen);

		$copyObj->setOtroing($this->otroing);

		$copyObj->setDetotroing($this->detotroing);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCcestcivId($this->ccestciv_id);

		$copyObj->setCctipupsId($this->cctipups_id);

		$copyObj->setCcparroqId($this->ccparroq_id);

		$copyObj->setCcsececoId($this->ccsececo_id);

		$copyObj->setCcactecoId($this->ccacteco_id);

		$copyObj->setCcorimatpriId($this->ccorimatpri_id);

		$copyObj->setCccargoId($this->cccargo_id);

		$copyObj->setCccondicId($this->cccondic_id);

		$copyObj->setCcubiadmId($this->ccubiadm_id);

		$copyObj->setCcciudadId($this->ccciudad_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbalgers() as $relObj) {
				$copyObj->addCcbalger($relObj->copy($deepCopy));
			}

			foreach($this->getCcconbens() as $relObj) {
				$copyObj->addCcconben($relObj->copy($deepCopy));
			}

			foreach($this->getCccreants() as $relObj) {
				$copyObj->addCccreant($relObj->copy($deepCopy));
			}

			foreach($this->getCccredits() as $relObj) {
				$copyObj->addCccredit($relObj->copy($deepCopy));
			}

			foreach($this->getCcdetcuadess() as $relObj) {
				$copyObj->addCcdetcuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcdircorbens() as $relObj) {
				$copyObj->addCcdircorben($relObj->copy($deepCopy));
			}

			foreach($this->getCcperbens() as $relObj) {
				$copyObj->addCcperben($relObj->copy($deepCopy));
			}

			foreach($this->getCcrepbens() as $relObj) {
				$copyObj->addCcrepben($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolicis() as $relObj) {
				$copyObj->addCcsolici($relObj->copy($deepCopy));
			}

			foreach($this->getCcusuarios() as $relObj) {
				$copyObj->addCcusuario($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CcbenefiPeer();
		}
		return self::$peer;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
	}

	
	public function setCcestciv($v)
	{


		if ($v === null) {
			$this->setCcestcivId(NULL);
		} else {
			$this->setCcestcivId($v->getId());
		}


		$this->aCcestciv = $v;
	}


	
	public function getCcestciv($con = null)
	{
		if ($this->aCcestciv === null && ($this->ccestciv_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestcivPeer.php';

      $c = new Criteria();
      $c->add(CcestcivPeer::ID,$this->ccestciv_id);
      
			$this->aCcestciv = CcestcivPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestciv;
	}

	
	public function setCctipups($v)
	{


		if ($v === null) {
			$this->setCctipupsId(NULL);
		} else {
			$this->setCctipupsId($v->getId());
		}


		$this->aCctipups = $v;
	}


	
	public function getCctipups($con = null)
	{
		if ($this->aCctipups === null && ($this->cctipups_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipupsPeer.php';

      $c = new Criteria();
      $c->add(CctipupsPeer::ID,$this->cctipups_id);
      
			$this->aCctipups = CctipupsPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipups;
	}

	
	public function setCcparroq($v)
	{


		if ($v === null) {
			$this->setCcparroqId(NULL);
		} else {
			$this->setCcparroqId($v->getId());
		}


		$this->aCcparroq = $v;
	}


	
	public function getCcparroq($con = null)
	{
		if ($this->aCcparroq === null && ($this->ccparroq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';

      $c = new Criteria();
      $c->add(CcparroqPeer::ID,$this->ccparroq_id);
      
			$this->aCcparroq = CcparroqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparroq;
	}

	
	public function setCcsececo($v)
	{


		if ($v === null) {
			$this->setCcsececoId(NULL);
		} else {
			$this->setCcsececoId($v->getId());
		}


		$this->aCcsececo = $v;
	}


	
	public function getCcsececo($con = null)
	{
		if ($this->aCcsececo === null && ($this->ccsececo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsececoPeer.php';

      $c = new Criteria();
      $c->add(CcsececoPeer::ID,$this->ccsececo_id);
      
			$this->aCcsececo = CcsececoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsececo;
	}

	
	public function setCcacteco($v)
	{


		if ($v === null) {
			$this->setCcactecoId(NULL);
		} else {
			$this->setCcactecoId($v->getId());
		}


		$this->aCcacteco = $v;
	}


	
	public function getCcacteco($con = null)
	{
		if ($this->aCcacteco === null && ($this->ccacteco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactecoPeer.php';

      $c = new Criteria();
      $c->add(CcactecoPeer::ID,$this->ccacteco_id);
      
			$this->aCcacteco = CcactecoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcacteco;
	}

	
	public function setCcorimatpri($v)
	{


		if ($v === null) {
			$this->setCcorimatpriId(NULL);
		} else {
			$this->setCcorimatpriId($v->getId());
		}


		$this->aCcorimatpri = $v;
	}


	
	public function getCcorimatpri($con = null)
	{
		if ($this->aCcorimatpri === null && ($this->ccorimatpri_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcorimatpriPeer.php';

      $c = new Criteria();
      $c->add(CcorimatpriPeer::ID,$this->ccorimatpri_id);
      
			$this->aCcorimatpri = CcorimatpriPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcorimatpri;
	}

	
	public function setCccargo($v)
	{


		if ($v === null) {
			$this->setCccargoId(NULL);
		} else {
			$this->setCccargoId($v->getId());
		}


		$this->aCccargo = $v;
	}


	
	public function getCccargo($con = null)
	{
		if ($this->aCccargo === null && ($this->cccargo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccargoPeer.php';

      $c = new Criteria();
      $c->add(CccargoPeer::ID,$this->cccargo_id);
      
			$this->aCccargo = CccargoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccargo;
	}

	
	public function setCccondic($v)
	{


		if ($v === null) {
			$this->setCccondicId(NULL);
		} else {
			$this->setCccondicId($v->getId());
		}


		$this->aCccondic = $v;
	}


	
	public function getCccondic($con = null)
	{
		if ($this->aCccondic === null && ($this->cccondic_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccondicPeer.php';

      $c = new Criteria();
      $c->add(CccondicPeer::ID,$this->cccondic_id);
      
			$this->aCccondic = CccondicPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccondic;
	}

	
	public function setCcubiadm($v)
	{


		if ($v === null) {
			$this->setCcubiadmId(NULL);
		} else {
			$this->setCcubiadmId($v->getId());
		}


		$this->aCcubiadm = $v;
	}


	
	public function getCcubiadm($con = null)
	{
		if ($this->aCcubiadm === null && ($this->ccubiadm_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcubiadmPeer.php';

      $c = new Criteria();
      $c->add(CcubiadmPeer::ID,$this->ccubiadm_id);
      
			$this->aCcubiadm = CcubiadmPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcubiadm;
	}

	
	public function setCcciudad($v)
	{


		if ($v === null) {
			$this->setCcciudadId(NULL);
		} else {
			$this->setCcciudadId($v->getId());
		}


		$this->aCcciudad = $v;
	}


	
	public function getCcciudad($con = null)
	{
		if ($this->aCcciudad === null && ($this->ccciudad_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';

      $c = new Criteria();
      $c->add(CcciudadPeer::ID,$this->ccciudad_id);
      
			$this->aCcciudad = CcciudadPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcciudad;
	}

	
	public function initCcbalgers()
	{
		if ($this->collCcbalgers === null) {
			$this->collCcbalgers = array();
		}
	}

	
	public function getCcbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

				CcbalgerPeer::addSelectColumns($criteria);
				$this->collCcbalgers = CcbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

				CcbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
					$this->collCcbalgers = CcbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbalgerCriteria = $criteria;
		return $this->collCcbalgers;
	}

	
	public function countCcbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

		return CcbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbalger(Ccbalger $l)
	{
		$this->collCcbalgers[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcbalgersJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
				$this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcbalgerCriteria = $criteria;

		return $this->collCcbalgers;
	}


	
	public function getCcbalgersJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
				$this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbalgerPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcbalgerCriteria = $criteria;

		return $this->collCcbalgers;
	}

	
	public function initCcconbens()
	{
		if ($this->collCcconbens === null) {
			$this->collCcconbens = array();
		}
	}

	
	public function getCcconbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconbens === null) {
			if ($this->isNew()) {
			   $this->collCcconbens = array();
			} else {

				$criteria->add(CcconbenPeer::CCBENEFI_ID, $this->getId());

				CcconbenPeer::addSelectColumns($criteria);
				$this->collCcconbens = CcconbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconbenPeer::CCBENEFI_ID, $this->getId());

				CcconbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconbenCriteria) || !$this->lastCcconbenCriteria->equals($criteria)) {
					$this->collCcconbens = CcconbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconbenCriteria = $criteria;
		return $this->collCcconbens;
	}

	
	public function countCcconbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconbenPeer::CCBENEFI_ID, $this->getId());

		return CcconbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconben(Ccconben $l)
	{
		$this->collCcconbens[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcconbensJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconbens === null) {
			if ($this->isNew()) {
				$this->collCcconbens = array();
			} else {

				$criteria->add(CcconbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcconbens = CcconbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcconbenCriteria) || !$this->lastCcconbenCriteria->equals($criteria)) {
				$this->collCcconbens = CcconbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcconbenCriteria = $criteria;

		return $this->collCcconbens;
	}

	
	public function initCccreants()
	{
		if ($this->collCccreants === null) {
			$this->collCccreants = array();
		}
	}

	
	public function getCccreants($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreants === null) {
			if ($this->isNew()) {
			   $this->collCccreants = array();
			} else {

				$criteria->add(CccreantPeer::CCBENEFI_ID, $this->getId());

				CccreantPeer::addSelectColumns($criteria);
				$this->collCccreants = CccreantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreantPeer::CCBENEFI_ID, $this->getId());

				CccreantPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreantCriteria) || !$this->lastCccreantCriteria->equals($criteria)) {
					$this->collCccreants = CccreantPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreantCriteria = $criteria;
		return $this->collCccreants;
	}

	
	public function countCccreants($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreantPeer::CCBENEFI_ID, $this->getId());

		return CccreantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccreant(Cccreant $l)
	{
		$this->collCccreants[] = $l;
		$l->setCcbenefi($this);
	}

	
	public function initCccredits()
	{
		if ($this->collCccredits === null) {
			$this->collCccredits = array();
		}
	}

	
	public function getCccredits($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
			   $this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
					$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreditCriteria = $criteria;
		return $this->collCccredits;
	}

	
	public function countCccredits($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

		return CccreditPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccredit(Cccredit $l)
	{
		$this->collCccredits[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCccreditsJoinCcfuefin($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipcar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipmon($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcbanco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcagenci($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcprioridad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}

	
	public function initCcdetcuadess()
	{
		if ($this->collCcdetcuadess === null) {
			$this->collCcdetcuadess = array();
		}
	}

	
	public function getCcdetcuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
			   $this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
					$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;
		return $this->collCcdetcuadess;
	}

	
	public function countCcdetcuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

		return CcdetcuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetcuades(Ccdetcuades $l)
	{
		$this->collCcdetcuadess[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcdetcuadessJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCpcausad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}

	
	public function initCcdircorbens()
	{
		if ($this->collCcdircorbens === null) {
			$this->collCcdircorbens = array();
		}
	}

	
	public function getCcdircorbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdircorbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdircorbens === null) {
			if ($this->isNew()) {
			   $this->collCcdircorbens = array();
			} else {

				$criteria->add(CcdircorbenPeer::CCBENEFI_ID, $this->getId());

				CcdircorbenPeer::addSelectColumns($criteria);
				$this->collCcdircorbens = CcdircorbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdircorbenPeer::CCBENEFI_ID, $this->getId());

				CcdircorbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdircorbenCriteria) || !$this->lastCcdircorbenCriteria->equals($criteria)) {
					$this->collCcdircorbens = CcdircorbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdircorbenCriteria = $criteria;
		return $this->collCcdircorbens;
	}

	
	public function countCcdircorbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdircorbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdircorbenPeer::CCBENEFI_ID, $this->getId());

		return CcdircorbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdircorben(Ccdircorben $l)
	{
		$this->collCcdircorbens[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcdircorbensJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdircorbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdircorbens === null) {
			if ($this->isNew()) {
				$this->collCcdircorbens = array();
			} else {

				$criteria->add(CcdircorbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcdircorbens = CcdircorbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdircorbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcdircorbenCriteria) || !$this->lastCcdircorbenCriteria->equals($criteria)) {
				$this->collCcdircorbens = CcdircorbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcdircorbenCriteria = $criteria;

		return $this->collCcdircorbens;
	}

	
	public function initCcperbens()
	{
		if ($this->collCcperbens === null) {
			$this->collCcperbens = array();
		}
	}

	
	public function getCcperbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
			   $this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
					$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcperbenCriteria = $criteria;
		return $this->collCcperbens;
	}

	
	public function countCcperbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

		return CcperbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcperben(Ccperben $l)
	{
		$this->collCcperbens[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcperbensJoinCccargo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCccargo($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}


	
	public function getCcperbensJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}


	
	public function getCcperbensJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}

	
	public function initCcrepbens()
	{
		if ($this->collCcrepbens === null) {
			$this->collCcrepbens = array();
		}
	}

	
	public function getCcrepbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
			   $this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
					$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrepbenCriteria = $criteria;
		return $this->collCcrepbens;
	}

	
	public function countCcrepbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

		return CcrepbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrepben(Ccrepben $l)
	{
		$this->collCcrepbens[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcrepbensJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcparent($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparent($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparent($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}

	
	public function initCcsolicis()
	{
		if ($this->collCcsolicis === null) {
			$this->collCcsolicis = array();
		}
	}

	
	public function getCcsolicis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
			   $this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
					$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoliciCriteria = $criteria;
		return $this->collCcsolicis;
	}

	
	public function countCcsolicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

		return CcsoliciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolici(Ccsolici $l)
	{
		$this->collCcsolicis[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcsolicisJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcmunici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccircuito($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}

	
	public function initCcusuarios()
	{
		if ($this->collCcusuarios === null) {
			$this->collCcusuarios = array();
		}
	}

	
	public function getCcusuarios($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusuarios === null) {
			if ($this->isNew()) {
			   $this->collCcusuarios = array();
			} else {

				$criteria->add(CcusuarioPeer::CCBENEFI_ID, $this->getId());

				CcusuarioPeer::addSelectColumns($criteria);
				$this->collCcusuarios = CcusuarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcusuarioPeer::CCBENEFI_ID, $this->getId());

				CcusuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcusuarioCriteria) || !$this->lastCcusuarioCriteria->equals($criteria)) {
					$this->collCcusuarios = CcusuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcusuarioCriteria = $criteria;
		return $this->collCcusuarios;
	}

	
	public function countCcusuarios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcusuarioPeer::CCBENEFI_ID, $this->getId());

		return CcusuarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcusuario(Ccusuario $l)
	{
		$this->collCcusuarios[] = $l;
		$l->setCcbenefi($this);
	}


	
	public function getCcusuariosJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusuarios === null) {
			if ($this->isNew()) {
				$this->collCcusuarios = array();
			} else {

				$criteria->add(CcusuarioPeer::CCBENEFI_ID, $this->getId());

				$this->collCcusuarios = CcusuarioPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcusuarioPeer::CCBENEFI_ID, $this->getId());

			if (!isset($this->lastCcusuarioCriteria) || !$this->lastCcusuarioCriteria->equals($criteria)) {
				$this->collCcusuarios = CcusuarioPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcusuarioCriteria = $criteria;

		return $this->collCcusuarios;
	}

} 