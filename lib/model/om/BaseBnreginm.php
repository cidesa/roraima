<?php


abstract class BaseBnreginm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codinm;


	
	protected $desinm;


	
	protected $codpro;


	
	protected $ordcom;


	
	protected $fecreg;


	
	protected $feccom;


	
	protected $fecdep;


	
	protected $fecaju;


	
	protected $fecact;


	
	protected $fecexp;


	
	protected $ordrcp;


	
	protected $fotinm;


	
	protected $deninm;


	
	protected $nroexp;


	
	protected $detinm;


	
	protected $codubi;


	
	protected $avaact;


	
	protected $clafun;


	
	protected $avacom;


	
	protected $edoleg;


	
	protected $viduti;


	
	protected $obsinm;


	
	protected $linnor;


	
	protected $linsur;


	
	protected $linest;


	
	protected $linoes;


	
	protected $areter;


	
	protected $arecub;


	
	protected $arecon;


	
	protected $areotr;


	
	protected $aretot;


	
	protected $edoinm;


	
	protected $muninm;


	
	protected $depinm;


	
	protected $dirinm;


	
	protected $mesdep;


	
	protected $valini;


	
	protected $valres;


	
	protected $vallib;


	
	protected $valrex;


	
	protected $cosrep;


	
	protected $depmen;


	
	protected $depacu;


	
	protected $stainm;


	
	protected $codalt;


	
	protected $coddis;


	
	protected $valadis;


	
	protected $numreg;


	
	protected $numfol;


	
	protected $fecreginm;


	
	protected $ofireg;


	
	protected $protocolo;


	
	protected $tomo;


	
	protected $trimestre;


	
	protected $numord;



	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodinm()
  {

    return trim($this->codinm);

  }
  
  public function getDesinm()
  {

    return trim($this->desinm);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecdep($format = 'Y-m-d')
  {

    if ($this->fecdep === null || $this->fecdep === '') {
      return null;
    } elseif (!is_int($this->fecdep)) {
            $ts = adodb_strtotime($this->fecdep);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdep] as date/time value: " . var_export($this->fecdep, true));
      }
    } else {
      $ts = $this->fecdep;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecaju($format = 'Y-m-d')
  {

    if ($this->fecaju === null || $this->fecaju === '') {
      return null;
    } elseif (!is_int($this->fecaju)) {
            $ts = adodb_strtotime($this->fecaju);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
      }
    } else {
      $ts = $this->fecaju;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecact($format = 'Y-m-d')
  {

    if ($this->fecact === null || $this->fecact === '') {
      return null;
    } elseif (!is_int($this->fecact)) {
            $ts = adodb_strtotime($this->fecact);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecact] as date/time value: " . var_export($this->fecact, true));
      }
    } else {
      $ts = $this->fecact;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecexp($format = 'Y-m-d')
  {

    if ($this->fecexp === null || $this->fecexp === '') {
      return null;
    } elseif (!is_int($this->fecexp)) {
            $ts = adodb_strtotime($this->fecexp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecexp] as date/time value: " . var_export($this->fecexp, true));
      }
    } else {
      $ts = $this->fecexp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getOrdrcp()
  {

    return trim($this->ordrcp);

  }
  
  public function getFotinm()
  {

    return trim($this->fotinm);

  }
  
  public function getDeninm()
  {

    return trim($this->deninm);

  }
  
  public function getNroexp()
  {

    return trim($this->nroexp);

  }
  
  public function getDetinm()
  {

    return trim($this->detinm);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getAvaact($val=false)
  {

    if($val) return number_format($this->avaact,2,',','.');
    else return $this->avaact;

  }
  
  public function getClafun()
  {

    return trim($this->clafun);

  }
  
  public function getAvacom($val=false)
  {

    if($val) return number_format($this->avacom,2,',','.');
    else return $this->avacom;

  }
  
  public function getEdoleg()
  {

    return trim($this->edoleg);

  }
  
  public function getViduti()
  {

    return trim($this->viduti);

  }
  
  public function getObsinm()
  {

    return trim($this->obsinm);

  }
  
  public function getLinnor()
  {

    return trim($this->linnor);

  }
  
  public function getLinsur()
  {

    return trim($this->linsur);

  }
  
  public function getLinest()
  {

    return trim($this->linest);

  }
  
  public function getLinoes()
  {

    return trim($this->linoes);

  }
  
  public function getAreter()
  {

    return trim($this->areter);

  }
  
  public function getArecub()
  {

    return trim($this->arecub);

  }
  
  public function getArecon()
  {

    return trim($this->arecon);

  }
  
  public function getAreotr()
  {

    return trim($this->areotr);

  }
  
  public function getAretot()
  {

    return trim($this->aretot);

  }
  
  public function getEdoinm()
  {

    return trim($this->edoinm);

  }
  
  public function getMuninm()
  {

    return trim($this->muninm);

  }
  
  public function getDepinm()
  {

    return trim($this->depinm);

  }
  
  public function getDirinm()
  {

    return trim($this->dirinm);

  }
  
  public function getMesdep($val=false)
  {

    if($val) return number_format($this->mesdep,2,',','.');
    else return $this->mesdep;

  }
  
  public function getValini($val=false)
  {

    if($val) return number_format($this->valini,2,',','.');
    else return $this->valini;

  }
  
  public function getValres($val=false)
  {

    if($val) return number_format($this->valres,2,',','.');
    else return $this->valres;

  }
  
  public function getVallib($val=false)
  {

    if($val) return number_format($this->vallib,2,',','.');
    else return $this->vallib;

  }
  
  public function getValrex($val=false)
  {

    if($val) return number_format($this->valrex,2,',','.');
    else return $this->valrex;

  }
  
  public function getCosrep($val=false)
  {

    if($val) return number_format($this->cosrep,2,',','.');
    else return $this->cosrep;

  }
  
  public function getDepmen($val=false)
  {

    if($val) return number_format($this->depmen,2,',','.');
    else return $this->depmen;

  }
  
  public function getDepacu($val=false)
  {

    if($val) return number_format($this->depacu,2,',','.');
    else return $this->depacu;

  }
  
  public function getStainm()
  {

    return trim($this->stainm);

  }
  
  public function getCodalt()
  {

    return trim($this->codalt);

  }
  
  public function getCoddis()
  {

    return trim($this->coddis);

  }
  
  public function getValadis($val=false)
  {

    if($val) return number_format($this->valadis,2,',','.');
    else return $this->valadis;

  }
  
  public function getNumreg()
  {

    return trim($this->numreg);

  }
  
  public function getNumfol()
  {

    return trim($this->numfol);

  }
  
  public function getFecreginm($format = 'Y-m-d')
  {

    if ($this->fecreginm === null || $this->fecreginm === '') {
      return null;
    } elseif (!is_int($this->fecreginm)) {
            $ts = adodb_strtotime($this->fecreginm);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreginm] as date/time value: " . var_export($this->fecreginm, true));
      }
    } else {
      $ts = $this->fecreginm;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getOfireg()
  {

    return trim($this->ofireg);

  }
  
  public function getProtocolo()
  {

    return trim($this->protocolo);

  }
  
  public function getTomo()
  {

    return trim($this->tomo);

  }
  
  public function getTrimestre()
  {

    return trim($this->trimestre);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }

  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = BnreginmPeer::CODACT;
      }
  
	} 
	
	public function setCodinm($v)
	{

    if ($this->codinm !== $v) {
        $this->codinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::CODINM;
      }
  
	} 
	
	public function setDesinm($v)
	{

    if ($this->desinm !== $v) {
        $this->desinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::DESINM;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = BnreginmPeer::CODPRO;
      }
  
	} 
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = BnreginmPeer::ORDCOM;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECREG;
    }

	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECCOM;
    }

	} 
	
	public function setFecdep($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdep] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdep !== $ts) {
      $this->fecdep = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECDEP;
    }

	} 
	
	public function setFecaju($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaju !== $ts) {
      $this->fecaju = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECAJU;
    }

	} 
	
	public function setFecact($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecact] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecact !== $ts) {
      $this->fecact = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECACT;
    }

	} 
	
	public function setFecexp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecexp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecexp !== $ts) {
      $this->fecexp = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECEXP;
    }

	} 
	
	public function setOrdrcp($v)
	{

    if ($this->ordrcp !== $v) {
        $this->ordrcp = $v;
        $this->modifiedColumns[] = BnreginmPeer::ORDRCP;
      }
  
	} 
	
	public function setFotinm($v)
	{

    if ($this->fotinm !== $v) {
        $this->fotinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::FOTINM;
      }
  
	} 
	
	public function setDeninm($v)
	{

    if ($this->deninm !== $v) {
        $this->deninm = $v;
        $this->modifiedColumns[] = BnreginmPeer::DENINM;
      }
  
	} 
	
	public function setNroexp($v)
	{

    if ($this->nroexp !== $v) {
        $this->nroexp = $v;
        $this->modifiedColumns[] = BnreginmPeer::NROEXP;
      }
  
	} 
	
	public function setDetinm($v)
	{

    if ($this->detinm !== $v) {
        $this->detinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::DETINM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = BnreginmPeer::CODUBI;
      }
  
	} 
	
	public function setAvaact($v)
	{

    if ($this->avaact !== $v) {
        $this->avaact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::AVAACT;
      }
  
	} 
	
	public function setClafun($v)
	{

    if ($this->clafun !== $v) {
        $this->clafun = $v;
        $this->modifiedColumns[] = BnreginmPeer::CLAFUN;
      }
  
	} 
	
	public function setAvacom($v)
	{

    if ($this->avacom !== $v) {
        $this->avacom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::AVACOM;
      }
  
	} 
	
	public function setEdoleg($v)
	{

    if ($this->edoleg !== $v) {
        $this->edoleg = $v;
        $this->modifiedColumns[] = BnreginmPeer::EDOLEG;
      }
  
	} 
	
	public function setViduti($v)
	{

    if ($this->viduti !== $v) {
        $this->viduti = $v;
        $this->modifiedColumns[] = BnreginmPeer::VIDUTI;
      }
  
	} 
	
	public function setObsinm($v)
	{

    if ($this->obsinm !== $v) {
        $this->obsinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::OBSINM;
      }
  
	} 
	
	public function setLinnor($v)
	{

    if ($this->linnor !== $v) {
        $this->linnor = $v;
        $this->modifiedColumns[] = BnreginmPeer::LINNOR;
      }
  
	} 
	
	public function setLinsur($v)
	{

    if ($this->linsur !== $v) {
        $this->linsur = $v;
        $this->modifiedColumns[] = BnreginmPeer::LINSUR;
      }
  
	} 
	
	public function setLinest($v)
	{

    if ($this->linest !== $v) {
        $this->linest = $v;
        $this->modifiedColumns[] = BnreginmPeer::LINEST;
      }
  
	} 
	
	public function setLinoes($v)
	{

    if ($this->linoes !== $v) {
        $this->linoes = $v;
        $this->modifiedColumns[] = BnreginmPeer::LINOES;
      }
  
	} 
	
	public function setAreter($v)
	{

    if ($this->areter !== $v) {
        $this->areter = $v;
        $this->modifiedColumns[] = BnreginmPeer::ARETER;
      }
  
	} 
	
	public function setArecub($v)
	{

    if ($this->arecub !== $v) {
        $this->arecub = $v;
        $this->modifiedColumns[] = BnreginmPeer::ARECUB;
      }
  
	} 
	
	public function setArecon($v)
	{

    if ($this->arecon !== $v) {
        $this->arecon = $v;
        $this->modifiedColumns[] = BnreginmPeer::ARECON;
      }
  
	} 
	
	public function setAreotr($v)
	{

    if ($this->areotr !== $v) {
        $this->areotr = $v;
        $this->modifiedColumns[] = BnreginmPeer::AREOTR;
      }
  
	} 
	
	public function setAretot($v)
	{

    if ($this->aretot !== $v) {
        $this->aretot = $v;
        $this->modifiedColumns[] = BnreginmPeer::ARETOT;
      }
  
	} 
	
	public function setEdoinm($v)
	{

    if ($this->edoinm !== $v) {
        $this->edoinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::EDOINM;
      }
  
	} 
	
	public function setMuninm($v)
	{

    if ($this->muninm !== $v) {
        $this->muninm = $v;
        $this->modifiedColumns[] = BnreginmPeer::MUNINM;
      }
  
	} 
	
	public function setDepinm($v)
	{

    if ($this->depinm !== $v) {
        $this->depinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::DEPINM;
      }
  
	} 
	
	public function setDirinm($v)
	{

    if ($this->dirinm !== $v) {
        $this->dirinm = $v;
        $this->modifiedColumns[] = BnreginmPeer::DIRINM;
      }
  
	} 
	
	public function setMesdep($v)
	{

    if ($this->mesdep !== $v) {
        $this->mesdep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::MESDEP;
      }
  
	} 
	
	public function setValini($v)
	{

    if ($this->valini !== $v) {
        $this->valini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::VALINI;
      }
  
	} 
	
	public function setValres($v)
	{

    if ($this->valres !== $v) {
        $this->valres = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::VALRES;
      }
  
	} 
	
	public function setVallib($v)
	{

    if ($this->vallib !== $v) {
        $this->vallib = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::VALLIB;
      }
  
	} 
	
	public function setValrex($v)
	{

    if ($this->valrex !== $v) {
        $this->valrex = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::VALREX;
      }
  
	} 
	
	public function setCosrep($v)
	{

    if ($this->cosrep !== $v) {
        $this->cosrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::COSREP;
      }
  
	} 
	
	public function setDepmen($v)
	{

    if ($this->depmen !== $v) {
        $this->depmen = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::DEPMEN;
      }
  
	} 
	
	public function setDepacu($v)
	{

    if ($this->depacu !== $v) {
        $this->depacu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::DEPACU;
      }
  
	} 
	
	public function setStainm($v)
	{

    if ($this->stainm !== $v) {
        $this->stainm = $v;
        $this->modifiedColumns[] = BnreginmPeer::STAINM;
      }
  
	} 
	
	public function setCodalt($v)
	{

    if ($this->codalt !== $v) {
        $this->codalt = $v;
        $this->modifiedColumns[] = BnreginmPeer::CODALT;
      }
  
	} 
	
	public function setCoddis($v)
	{

    if ($this->coddis !== $v) {
        $this->coddis = $v;
        $this->modifiedColumns[] = BnreginmPeer::CODDIS;
      }
  
	} 
	
	public function setValadis($v)
	{

    if ($this->valadis !== $v) {
        $this->valadis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnreginmPeer::VALADIS;
      }
  
	} 
	
	public function setNumreg($v)
	{

    if ($this->numreg !== $v) {
        $this->numreg = $v;
        $this->modifiedColumns[] = BnreginmPeer::NUMREG;
      }
  
	} 
	
	public function setNumfol($v)
	{

    if ($this->numfol !== $v) {
        $this->numfol = $v;
        $this->modifiedColumns[] = BnreginmPeer::NUMFOL;
      }
  
	} 
	
	public function setFecreginm($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreginm] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreginm !== $ts) {
      $this->fecreginm = $ts;
      $this->modifiedColumns[] = BnreginmPeer::FECREGINM;
    }

	} 
	
	public function setOfireg($v)
	{

    if ($this->ofireg !== $v) {
        $this->ofireg = $v;
        $this->modifiedColumns[] = BnreginmPeer::OFIREG;
      }
  
	} 
	
	public function setProtocolo($v)
	{

    if ($this->protocolo !== $v) {
        $this->protocolo = $v;
        $this->modifiedColumns[] = BnreginmPeer::PROTOCOLO;
      }
  
	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = BnreginmPeer::TOMO;
      }
  
	} 
	
	public function setTrimestre($v)
	{

    if ($this->trimestre !== $v) {
        $this->trimestre = $v;
        $this->modifiedColumns[] = BnreginmPeer::TRIMESTRE;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = BnreginmPeer::NUMORD;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnreginmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codinm = $rs->getString($startcol + 1);

      $this->desinm = $rs->getString($startcol + 2);

      $this->codpro = $rs->getString($startcol + 3);

      $this->ordcom = $rs->getString($startcol + 4);

      $this->fecreg = $rs->getDate($startcol + 5, null);

      $this->feccom = $rs->getDate($startcol + 6, null);

      $this->fecdep = $rs->getDate($startcol + 7, null);

      $this->fecaju = $rs->getDate($startcol + 8, null);

      $this->fecact = $rs->getDate($startcol + 9, null);

      $this->fecexp = $rs->getDate($startcol + 10, null);

      $this->ordrcp = $rs->getString($startcol + 11);

      $this->fotinm = $rs->getString($startcol + 12);

      $this->deninm = $rs->getString($startcol + 13);

      $this->nroexp = $rs->getString($startcol + 14);

      $this->detinm = $rs->getString($startcol + 15);

      $this->codubi = $rs->getString($startcol + 16);

      $this->avaact = $rs->getFloat($startcol + 17);

      $this->clafun = $rs->getString($startcol + 18);

      $this->avacom = $rs->getFloat($startcol + 19);

      $this->edoleg = $rs->getString($startcol + 20);

      $this->viduti = $rs->getString($startcol + 21);

      $this->obsinm = $rs->getString($startcol + 22);

      $this->linnor = $rs->getString($startcol + 23);

      $this->linsur = $rs->getString($startcol + 24);

      $this->linest = $rs->getString($startcol + 25);

      $this->linoes = $rs->getString($startcol + 26);

      $this->areter = $rs->getString($startcol + 27);

      $this->arecub = $rs->getString($startcol + 28);

      $this->arecon = $rs->getString($startcol + 29);

      $this->areotr = $rs->getString($startcol + 30);

      $this->aretot = $rs->getString($startcol + 31);

      $this->edoinm = $rs->getString($startcol + 32);

      $this->muninm = $rs->getString($startcol + 33);

      $this->depinm = $rs->getString($startcol + 34);

      $this->dirinm = $rs->getString($startcol + 35);

      $this->mesdep = $rs->getFloat($startcol + 36);

      $this->valini = $rs->getFloat($startcol + 37);

      $this->valres = $rs->getFloat($startcol + 38);

      $this->vallib = $rs->getFloat($startcol + 39);

      $this->valrex = $rs->getFloat($startcol + 40);

      $this->cosrep = $rs->getFloat($startcol + 41);

      $this->depmen = $rs->getFloat($startcol + 42);

      $this->depacu = $rs->getFloat($startcol + 43);

      $this->stainm = $rs->getString($startcol + 44);

      $this->codalt = $rs->getString($startcol + 45);

      $this->coddis = $rs->getString($startcol + 46);

      $this->valadis = $rs->getFloat($startcol + 47);

      $this->numreg = $rs->getString($startcol + 48);

      $this->numfol = $rs->getString($startcol + 49);

      $this->fecreginm = $rs->getDate($startcol + 50, null);

      $this->ofireg = $rs->getString($startcol + 51);

      $this->protocolo = $rs->getString($startcol + 52);

      $this->tomo = $rs->getString($startcol + 53);

      $this->trimestre = $rs->getString($startcol + 54);

      $this->numord = $rs->getString($startcol + 55);

      $this->id = $rs->getInt($startcol + 56);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 57;
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnreginm object", $e);
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
			$con = Propel::getConnection(BnreginmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnreginmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnreginmPeer::DATABASE_NAME);
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
					$pk = BnreginmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnreginmPeer::doUpdate($this, $con);
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


			if (($retval = BnreginmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnreginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodinm();
				break;
			case 2:
				return $this->getDesinm();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getOrdcom();
				break;
			case 5:
				return $this->getFecreg();
				break;
			case 6:
				return $this->getFeccom();
				break;
			case 7:
				return $this->getFecdep();
				break;
			case 8:
				return $this->getFecaju();
				break;
			case 9:
				return $this->getFecact();
				break;
			case 10:
				return $this->getFecexp();
				break;
			case 11:
				return $this->getOrdrcp();
				break;
			case 12:
				return $this->getFotinm();
				break;
			case 13:
				return $this->getDeninm();
				break;
			case 14:
				return $this->getNroexp();
				break;
			case 15:
				return $this->getDetinm();
				break;
			case 16:
				return $this->getCodubi();
				break;
			case 17:
				return $this->getAvaact();
				break;
			case 18:
				return $this->getClafun();
				break;
			case 19:
				return $this->getAvacom();
				break;
			case 20:
				return $this->getEdoleg();
				break;
			case 21:
				return $this->getViduti();
				break;
			case 22:
				return $this->getObsinm();
				break;
			case 23:
				return $this->getLinnor();
				break;
			case 24:
				return $this->getLinsur();
				break;
			case 25:
				return $this->getLinest();
				break;
			case 26:
				return $this->getLinoes();
				break;
			case 27:
				return $this->getAreter();
				break;
			case 28:
				return $this->getArecub();
				break;
			case 29:
				return $this->getArecon();
				break;
			case 30:
				return $this->getAreotr();
				break;
			case 31:
				return $this->getAretot();
				break;
			case 32:
				return $this->getEdoinm();
				break;
			case 33:
				return $this->getMuninm();
				break;
			case 34:
				return $this->getDepinm();
				break;
			case 35:
				return $this->getDirinm();
				break;
			case 36:
				return $this->getMesdep();
				break;
			case 37:
				return $this->getValini();
				break;
			case 38:
				return $this->getValres();
				break;
			case 39:
				return $this->getVallib();
				break;
			case 40:
				return $this->getValrex();
				break;
			case 41:
				return $this->getCosrep();
				break;
			case 42:
				return $this->getDepmen();
				break;
			case 43:
				return $this->getDepacu();
				break;
			case 44:
				return $this->getStainm();
				break;
			case 45:
				return $this->getCodalt();
				break;
			case 46:
				return $this->getCoddis();
				break;
			case 47:
				return $this->getValadis();
				break;
			case 48:
				return $this->getNumreg();
				break;
			case 49:
				return $this->getNumfol();
				break;
			case 50:
				return $this->getFecreginm();
				break;
			case 51:
				return $this->getOfireg();
				break;
			case 52:
				return $this->getProtocolo();
				break;
			case 53:
				return $this->getTomo();
				break;
			case 54:
				return $this->getTrimestre();
				break;
			case 55:
				return $this->getNumord();
				break;
			case 56:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnreginmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodinm(),
			$keys[2] => $this->getDesinm(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getOrdcom(),
			$keys[5] => $this->getFecreg(),
			$keys[6] => $this->getFeccom(),
			$keys[7] => $this->getFecdep(),
			$keys[8] => $this->getFecaju(),
			$keys[9] => $this->getFecact(),
			$keys[10] => $this->getFecexp(),
			$keys[11] => $this->getOrdrcp(),
			$keys[12] => $this->getFotinm(),
			$keys[13] => $this->getDeninm(),
			$keys[14] => $this->getNroexp(),
			$keys[15] => $this->getDetinm(),
			$keys[16] => $this->getCodubi(),
			$keys[17] => $this->getAvaact(),
			$keys[18] => $this->getClafun(),
			$keys[19] => $this->getAvacom(),
			$keys[20] => $this->getEdoleg(),
			$keys[21] => $this->getViduti(),
			$keys[22] => $this->getObsinm(),
			$keys[23] => $this->getLinnor(),
			$keys[24] => $this->getLinsur(),
			$keys[25] => $this->getLinest(),
			$keys[26] => $this->getLinoes(),
			$keys[27] => $this->getAreter(),
			$keys[28] => $this->getArecub(),
			$keys[29] => $this->getArecon(),
			$keys[30] => $this->getAreotr(),
			$keys[31] => $this->getAretot(),
			$keys[32] => $this->getEdoinm(),
			$keys[33] => $this->getMuninm(),
			$keys[34] => $this->getDepinm(),
			$keys[35] => $this->getDirinm(),
			$keys[36] => $this->getMesdep(),
			$keys[37] => $this->getValini(),
			$keys[38] => $this->getValres(),
			$keys[39] => $this->getVallib(),
			$keys[40] => $this->getValrex(),
			$keys[41] => $this->getCosrep(),
			$keys[42] => $this->getDepmen(),
			$keys[43] => $this->getDepacu(),
			$keys[44] => $this->getStainm(),
			$keys[45] => $this->getCodalt(),
			$keys[46] => $this->getCoddis(),
			$keys[47] => $this->getValadis(),
			$keys[48] => $this->getNumreg(),
			$keys[49] => $this->getNumfol(),
			$keys[50] => $this->getFecreginm(),
			$keys[51] => $this->getOfireg(),
			$keys[52] => $this->getProtocolo(),
			$keys[53] => $this->getTomo(),
			$keys[54] => $this->getTrimestre(),
			$keys[55] => $this->getNumord(),
			$keys[56] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnreginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodinm($value);
				break;
			case 2:
				$this->setDesinm($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setOrdcom($value);
				break;
			case 5:
				$this->setFecreg($value);
				break;
			case 6:
				$this->setFeccom($value);
				break;
			case 7:
				$this->setFecdep($value);
				break;
			case 8:
				$this->setFecaju($value);
				break;
			case 9:
				$this->setFecact($value);
				break;
			case 10:
				$this->setFecexp($value);
				break;
			case 11:
				$this->setOrdrcp($value);
				break;
			case 12:
				$this->setFotinm($value);
				break;
			case 13:
				$this->setDeninm($value);
				break;
			case 14:
				$this->setNroexp($value);
				break;
			case 15:
				$this->setDetinm($value);
				break;
			case 16:
				$this->setCodubi($value);
				break;
			case 17:
				$this->setAvaact($value);
				break;
			case 18:
				$this->setClafun($value);
				break;
			case 19:
				$this->setAvacom($value);
				break;
			case 20:
				$this->setEdoleg($value);
				break;
			case 21:
				$this->setViduti($value);
				break;
			case 22:
				$this->setObsinm($value);
				break;
			case 23:
				$this->setLinnor($value);
				break;
			case 24:
				$this->setLinsur($value);
				break;
			case 25:
				$this->setLinest($value);
				break;
			case 26:
				$this->setLinoes($value);
				break;
			case 27:
				$this->setAreter($value);
				break;
			case 28:
				$this->setArecub($value);
				break;
			case 29:
				$this->setArecon($value);
				break;
			case 30:
				$this->setAreotr($value);
				break;
			case 31:
				$this->setAretot($value);
				break;
			case 32:
				$this->setEdoinm($value);
				break;
			case 33:
				$this->setMuninm($value);
				break;
			case 34:
				$this->setDepinm($value);
				break;
			case 35:
				$this->setDirinm($value);
				break;
			case 36:
				$this->setMesdep($value);
				break;
			case 37:
				$this->setValini($value);
				break;
			case 38:
				$this->setValres($value);
				break;
			case 39:
				$this->setVallib($value);
				break;
			case 40:
				$this->setValrex($value);
				break;
			case 41:
				$this->setCosrep($value);
				break;
			case 42:
				$this->setDepmen($value);
				break;
			case 43:
				$this->setDepacu($value);
				break;
			case 44:
				$this->setStainm($value);
				break;
			case 45:
				$this->setCodalt($value);
				break;
			case 46:
				$this->setCoddis($value);
				break;
			case 47:
				$this->setValadis($value);
				break;
			case 48:
				$this->setNumreg($value);
				break;
			case 49:
				$this->setNumfol($value);
				break;
			case 50:
				$this->setFecreginm($value);
				break;
			case 51:
				$this->setOfireg($value);
				break;
			case 52:
				$this->setProtocolo($value);
				break;
			case 53:
				$this->setTomo($value);
				break;
			case 54:
				$this->setTrimestre($value);
				break;
			case 55:
				$this->setNumord($value);
				break;
			case 56:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnreginmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesinm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrdcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecreg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecdep($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecaju($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecact($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecexp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setOrdrcp($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFotinm($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDeninm($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNroexp($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDetinm($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodubi($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAvaact($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setClafun($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAvacom($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setEdoleg($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setViduti($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setObsinm($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setLinnor($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setLinsur($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setLinest($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLinoes($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setAreter($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setArecub($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setArecon($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setAreotr($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setAretot($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setEdoinm($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setMuninm($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setDepinm($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setDirinm($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setMesdep($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setValini($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setValres($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setVallib($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setValrex($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setCosrep($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setDepmen($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setDepacu($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setStainm($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setCodalt($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setCoddis($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setValadis($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setNumreg($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setNumfol($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setFecreginm($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setOfireg($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setProtocolo($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setTomo($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setTrimestre($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setNumord($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setId($arr[$keys[56]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnreginmPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnreginmPeer::CODACT)) $criteria->add(BnreginmPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnreginmPeer::CODINM)) $criteria->add(BnreginmPeer::CODINM, $this->codinm);
		if ($this->isColumnModified(BnreginmPeer::DESINM)) $criteria->add(BnreginmPeer::DESINM, $this->desinm);
		if ($this->isColumnModified(BnreginmPeer::CODPRO)) $criteria->add(BnreginmPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(BnreginmPeer::ORDCOM)) $criteria->add(BnreginmPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(BnreginmPeer::FECREG)) $criteria->add(BnreginmPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(BnreginmPeer::FECCOM)) $criteria->add(BnreginmPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(BnreginmPeer::FECDEP)) $criteria->add(BnreginmPeer::FECDEP, $this->fecdep);
		if ($this->isColumnModified(BnreginmPeer::FECAJU)) $criteria->add(BnreginmPeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(BnreginmPeer::FECACT)) $criteria->add(BnreginmPeer::FECACT, $this->fecact);
		if ($this->isColumnModified(BnreginmPeer::FECEXP)) $criteria->add(BnreginmPeer::FECEXP, $this->fecexp);
		if ($this->isColumnModified(BnreginmPeer::ORDRCP)) $criteria->add(BnreginmPeer::ORDRCP, $this->ordrcp);
		if ($this->isColumnModified(BnreginmPeer::FOTINM)) $criteria->add(BnreginmPeer::FOTINM, $this->fotinm);
		if ($this->isColumnModified(BnreginmPeer::DENINM)) $criteria->add(BnreginmPeer::DENINM, $this->deninm);
		if ($this->isColumnModified(BnreginmPeer::NROEXP)) $criteria->add(BnreginmPeer::NROEXP, $this->nroexp);
		if ($this->isColumnModified(BnreginmPeer::DETINM)) $criteria->add(BnreginmPeer::DETINM, $this->detinm);
		if ($this->isColumnModified(BnreginmPeer::CODUBI)) $criteria->add(BnreginmPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(BnreginmPeer::AVAACT)) $criteria->add(BnreginmPeer::AVAACT, $this->avaact);
		if ($this->isColumnModified(BnreginmPeer::CLAFUN)) $criteria->add(BnreginmPeer::CLAFUN, $this->clafun);
		if ($this->isColumnModified(BnreginmPeer::AVACOM)) $criteria->add(BnreginmPeer::AVACOM, $this->avacom);
		if ($this->isColumnModified(BnreginmPeer::EDOLEG)) $criteria->add(BnreginmPeer::EDOLEG, $this->edoleg);
		if ($this->isColumnModified(BnreginmPeer::VIDUTI)) $criteria->add(BnreginmPeer::VIDUTI, $this->viduti);
		if ($this->isColumnModified(BnreginmPeer::OBSINM)) $criteria->add(BnreginmPeer::OBSINM, $this->obsinm);
		if ($this->isColumnModified(BnreginmPeer::LINNOR)) $criteria->add(BnreginmPeer::LINNOR, $this->linnor);
		if ($this->isColumnModified(BnreginmPeer::LINSUR)) $criteria->add(BnreginmPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(BnreginmPeer::LINEST)) $criteria->add(BnreginmPeer::LINEST, $this->linest);
		if ($this->isColumnModified(BnreginmPeer::LINOES)) $criteria->add(BnreginmPeer::LINOES, $this->linoes);
		if ($this->isColumnModified(BnreginmPeer::ARETER)) $criteria->add(BnreginmPeer::ARETER, $this->areter);
		if ($this->isColumnModified(BnreginmPeer::ARECUB)) $criteria->add(BnreginmPeer::ARECUB, $this->arecub);
		if ($this->isColumnModified(BnreginmPeer::ARECON)) $criteria->add(BnreginmPeer::ARECON, $this->arecon);
		if ($this->isColumnModified(BnreginmPeer::AREOTR)) $criteria->add(BnreginmPeer::AREOTR, $this->areotr);
		if ($this->isColumnModified(BnreginmPeer::ARETOT)) $criteria->add(BnreginmPeer::ARETOT, $this->aretot);
		if ($this->isColumnModified(BnreginmPeer::EDOINM)) $criteria->add(BnreginmPeer::EDOINM, $this->edoinm);
		if ($this->isColumnModified(BnreginmPeer::MUNINM)) $criteria->add(BnreginmPeer::MUNINM, $this->muninm);
		if ($this->isColumnModified(BnreginmPeer::DEPINM)) $criteria->add(BnreginmPeer::DEPINM, $this->depinm);
		if ($this->isColumnModified(BnreginmPeer::DIRINM)) $criteria->add(BnreginmPeer::DIRINM, $this->dirinm);
		if ($this->isColumnModified(BnreginmPeer::MESDEP)) $criteria->add(BnreginmPeer::MESDEP, $this->mesdep);
		if ($this->isColumnModified(BnreginmPeer::VALINI)) $criteria->add(BnreginmPeer::VALINI, $this->valini);
		if ($this->isColumnModified(BnreginmPeer::VALRES)) $criteria->add(BnreginmPeer::VALRES, $this->valres);
		if ($this->isColumnModified(BnreginmPeer::VALLIB)) $criteria->add(BnreginmPeer::VALLIB, $this->vallib);
		if ($this->isColumnModified(BnreginmPeer::VALREX)) $criteria->add(BnreginmPeer::VALREX, $this->valrex);
		if ($this->isColumnModified(BnreginmPeer::COSREP)) $criteria->add(BnreginmPeer::COSREP, $this->cosrep);
		if ($this->isColumnModified(BnreginmPeer::DEPMEN)) $criteria->add(BnreginmPeer::DEPMEN, $this->depmen);
		if ($this->isColumnModified(BnreginmPeer::DEPACU)) $criteria->add(BnreginmPeer::DEPACU, $this->depacu);
		if ($this->isColumnModified(BnreginmPeer::STAINM)) $criteria->add(BnreginmPeer::STAINM, $this->stainm);
		if ($this->isColumnModified(BnreginmPeer::CODALT)) $criteria->add(BnreginmPeer::CODALT, $this->codalt);
		if ($this->isColumnModified(BnreginmPeer::CODDIS)) $criteria->add(BnreginmPeer::CODDIS, $this->coddis);
		if ($this->isColumnModified(BnreginmPeer::VALADIS)) $criteria->add(BnreginmPeer::VALADIS, $this->valadis);
		if ($this->isColumnModified(BnreginmPeer::NUMREG)) $criteria->add(BnreginmPeer::NUMREG, $this->numreg);
		if ($this->isColumnModified(BnreginmPeer::NUMFOL)) $criteria->add(BnreginmPeer::NUMFOL, $this->numfol);
		if ($this->isColumnModified(BnreginmPeer::FECREGINM)) $criteria->add(BnreginmPeer::FECREGINM, $this->fecreginm);
		if ($this->isColumnModified(BnreginmPeer::OFIREG)) $criteria->add(BnreginmPeer::OFIREG, $this->ofireg);
		if ($this->isColumnModified(BnreginmPeer::PROTOCOLO)) $criteria->add(BnreginmPeer::PROTOCOLO, $this->protocolo);
		if ($this->isColumnModified(BnreginmPeer::TOMO)) $criteria->add(BnreginmPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(BnreginmPeer::TRIMESTRE)) $criteria->add(BnreginmPeer::TRIMESTRE, $this->trimestre);
		if ($this->isColumnModified(BnreginmPeer::NUMORD)) $criteria->add(BnreginmPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(BnreginmPeer::ID)) $criteria->add(BnreginmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnreginmPeer::DATABASE_NAME);

		$criteria->add(BnreginmPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodinm($this->codinm);

		$copyObj->setDesinm($this->desinm);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFecdep($this->fecdep);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setFecact($this->fecact);

		$copyObj->setFecexp($this->fecexp);

		$copyObj->setOrdrcp($this->ordrcp);

		$copyObj->setFotinm($this->fotinm);

		$copyObj->setDeninm($this->deninm);

		$copyObj->setNroexp($this->nroexp);

		$copyObj->setDetinm($this->detinm);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setAvaact($this->avaact);

		$copyObj->setClafun($this->clafun);

		$copyObj->setAvacom($this->avacom);

		$copyObj->setEdoleg($this->edoleg);

		$copyObj->setViduti($this->viduti);

		$copyObj->setObsinm($this->obsinm);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLinest($this->linest);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setAreter($this->areter);

		$copyObj->setArecub($this->arecub);

		$copyObj->setArecon($this->arecon);

		$copyObj->setAreotr($this->areotr);

		$copyObj->setAretot($this->aretot);

		$copyObj->setEdoinm($this->edoinm);

		$copyObj->setMuninm($this->muninm);

		$copyObj->setDepinm($this->depinm);

		$copyObj->setDirinm($this->dirinm);

		$copyObj->setMesdep($this->mesdep);

		$copyObj->setValini($this->valini);

		$copyObj->setValres($this->valres);

		$copyObj->setVallib($this->vallib);

		$copyObj->setValrex($this->valrex);

		$copyObj->setCosrep($this->cosrep);

		$copyObj->setDepmen($this->depmen);

		$copyObj->setDepacu($this->depacu);

		$copyObj->setStainm($this->stainm);

		$copyObj->setCodalt($this->codalt);

		$copyObj->setCoddis($this->coddis);

		$copyObj->setValadis($this->valadis);

		$copyObj->setNumreg($this->numreg);

		$copyObj->setNumfol($this->numfol);

		$copyObj->setFecreginm($this->fecreginm);

		$copyObj->setOfireg($this->ofireg);

		$copyObj->setProtocolo($this->protocolo);

		$copyObj->setTomo($this->tomo);

		$copyObj->setTrimestre($this->trimestre);

		$copyObj->setNumord($this->numord);


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
			self::$peer = new BnreginmPeer();
		}
		return self::$peer;
	}

} 
