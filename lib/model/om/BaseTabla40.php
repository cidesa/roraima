<?php


abstract class BaseTabla40 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $tipcau;


	
	protected $fecemi;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $monord;


	
	protected $desord;


	
	protected $mondes;


	
	protected $monret;


	
	protected $numche;


	
	protected $ctaban;


	
	protected $ctapag;


	
	protected $numcom;


	
	protected $status;


	
	protected $coduni;


	
	protected $fecenvcon;


	
	protected $fecenvfin;


	
	protected $ctapagfin;


	
	protected $obsord;


	
	protected $fecven;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $monpag;


	
	protected $aproba;


	
	protected $nombensus;


	
	protected $fecrecfin;


	
	protected $anopre;


	
	protected $fecpag;


	
	protected $numtiq;


	
	protected $peraut;


	
	protected $cedaut;


	
	protected $nomper2;


	
	protected $nomper1;


	
	protected $horcon;


	
	protected $feccon;


	
	protected $nomcat;


	
	protected $numfac;


	
	protected $numconfac;


	
	protected $numcorfac;


	
	protected $fechafac;


	
	protected $fecfac;


	
	protected $tipfin;


	
	protected $comret;


	
	protected $feccomret;


	
	protected $comretislr;


	
	protected $feccomretislr;


	
	protected $comretltf;


	
	protected $feccomretltf;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getMonord($val=false)
  {

    if($val) return number_format($this->monord,2,',','.');
    else return $this->monord;

  }
  
  public function getDesord()
  {

    return trim($this->desord);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getCtapag()
  {

    return trim($this->ctapag);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getFecenvcon($format = 'Y-m-d')
  {

    if ($this->fecenvcon === null || $this->fecenvcon === '') {
      return null;
    } elseif (!is_int($this->fecenvcon)) {
            $ts = adodb_strtotime($this->fecenvcon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenvcon] as date/time value: " . var_export($this->fecenvcon, true));
      }
    } else {
      $ts = $this->fecenvcon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecenvfin($format = 'Y-m-d')
  {

    if ($this->fecenvfin === null || $this->fecenvfin === '') {
      return null;
    } elseif (!is_int($this->fecenvfin)) {
            $ts = adodb_strtotime($this->fecenvfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenvfin] as date/time value: " . var_export($this->fecenvfin, true));
      }
    } else {
      $ts = $this->fecenvfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCtapagfin()
  {

    return trim($this->ctapagfin);

  }
  
  public function getObsord()
  {

    return trim($this->obsord);

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getAproba()
  {

    return trim($this->aproba);

  }
  
  public function getNombensus()
  {

    return trim($this->nombensus);

  }
  
  public function getFecrecfin($format = 'Y-m-d')
  {

    if ($this->fecrecfin === null || $this->fecrecfin === '') {
      return null;
    } elseif (!is_int($this->fecrecfin)) {
            $ts = adodb_strtotime($this->fecrecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecfin] as date/time value: " . var_export($this->fecrecfin, true));
      }
    } else {
      $ts = $this->fecrecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnopre()
  {

    return trim($this->anopre);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumtiq()
  {

    return trim($this->numtiq);

  }
  
  public function getPeraut()
  {

    return trim($this->peraut);

  }
  
  public function getCedaut()
  {

    return trim($this->cedaut);

  }
  
  public function getNomper2()
  {

    return trim($this->nomper2);

  }
  
  public function getNomper1()
  {

    return trim($this->nomper1);

  }
  
  public function getHorcon()
  {

    return trim($this->horcon);

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

  
  public function getNomcat()
  {

    return trim($this->nomcat);

  }
  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getNumconfac()
  {

    return trim($this->numconfac);

  }
  
  public function getNumcorfac()
  {

    return trim($this->numcorfac);

  }
  
  public function getFechafac($format = 'Y-m-d')
  {

    if ($this->fechafac === null || $this->fechafac === '') {
      return null;
    } elseif (!is_int($this->fechafac)) {
            $ts = adodb_strtotime($this->fechafac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechafac] as date/time value: " . var_export($this->fechafac, true));
      }
    } else {
      $ts = $this->fechafac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfac($format = 'Y-m-d')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipfin()
  {

    return trim($this->tipfin);

  }
  
  public function getComret()
  {

    return trim($this->comret);

  }
  
  public function getFeccomret($format = 'Y-m-d')
  {

    if ($this->feccomret === null || $this->feccomret === '') {
      return null;
    } elseif (!is_int($this->feccomret)) {
            $ts = adodb_strtotime($this->feccomret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomret] as date/time value: " . var_export($this->feccomret, true));
      }
    } else {
      $ts = $this->feccomret;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getComretislr()
  {

    return trim($this->comretislr);

  }
  
  public function getFeccomretislr($format = 'Y-m-d')
  {

    if ($this->feccomretislr === null || $this->feccomretislr === '') {
      return null;
    } elseif (!is_int($this->feccomretislr)) {
            $ts = adodb_strtotime($this->feccomretislr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomretislr] as date/time value: " . var_export($this->feccomretislr, true));
      }
    } else {
      $ts = $this->feccomretislr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getComretltf()
  {

    return trim($this->comretltf);

  }
  
  public function getFeccomretltf($format = 'Y-m-d')
  {

    if ($this->feccomretltf === null || $this->feccomretltf === '') {
      return null;
    } elseif (!is_int($this->feccomretltf)) {
            $ts = adodb_strtotime($this->feccomretltf);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomretltf] as date/time value: " . var_export($this->feccomretltf, true));
      }
    } else {
      $ts = $this->feccomretltf;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMORD;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = Tabla40Peer::TIPCAU;
      }
  
	} 
	
	public function setFecemi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECEMI;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = Tabla40Peer::CEDRIF;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = Tabla40Peer::NOMBEN;
      }
  
	} 
	
	public function setMonord($v)
	{

    if ($this->monord !== $v) {
        $this->monord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla40Peer::MONORD;
      }
  
	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = Tabla40Peer::DESORD;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla40Peer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla40Peer::MONRET;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMCHE;
      }
  
	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = Tabla40Peer::CTABAN;
      }
  
	} 
	
	public function setCtapag($v)
	{

    if ($this->ctapag !== $v) {
        $this->ctapag = $v;
        $this->modifiedColumns[] = Tabla40Peer::CTAPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = Tabla40Peer::STATUS;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = Tabla40Peer::CODUNI;
      }
  
	} 
	
	public function setFecenvcon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvcon !== $ts) {
      $this->fecenvcon = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECENVCON;
    }

	} 
	
	public function setFecenvfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvfin !== $ts) {
      $this->fecenvfin = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECENVFIN;
    }

	} 
	
	public function setCtapagfin($v)
	{

    if ($this->ctapagfin !== $v) {
        $this->ctapagfin = $v;
        $this->modifiedColumns[] = Tabla40Peer::CTAPAGFIN;
      }
  
	} 
	
	public function setObsord($v)
	{

    if ($this->obsord !== $v) {
        $this->obsord = $v;
        $this->modifiedColumns[] = Tabla40Peer::OBSORD;
      }
  
	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECVEN;
    }

	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = Tabla40Peer::DESANU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = Tabla40Peer::MONPAG;
      }
  
	} 
	
	public function setAproba($v)
	{

    if ($this->aproba !== $v) {
        $this->aproba = $v;
        $this->modifiedColumns[] = Tabla40Peer::APROBA;
      }
  
	} 
	
	public function setNombensus($v)
	{

    if ($this->nombensus !== $v) {
        $this->nombensus = $v;
        $this->modifiedColumns[] = Tabla40Peer::NOMBENSUS;
      }
  
	} 
	
	public function setFecrecfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecfin !== $ts) {
      $this->fecrecfin = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECRECFIN;
    }

	} 
	
	public function setAnopre($v)
	{

    if ($this->anopre !== $v) {
        $this->anopre = $v;
        $this->modifiedColumns[] = Tabla40Peer::ANOPRE;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECPAG;
    }

	} 
	
	public function setNumtiq($v)
	{

    if ($this->numtiq !== $v) {
        $this->numtiq = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMTIQ;
      }
  
	} 
	
	public function setPeraut($v)
	{

    if ($this->peraut !== $v) {
        $this->peraut = $v;
        $this->modifiedColumns[] = Tabla40Peer::PERAUT;
      }
  
	} 
	
	public function setCedaut($v)
	{

    if ($this->cedaut !== $v) {
        $this->cedaut = $v;
        $this->modifiedColumns[] = Tabla40Peer::CEDAUT;
      }
  
	} 
	
	public function setNomper2($v)
	{

    if ($this->nomper2 !== $v) {
        $this->nomper2 = $v;
        $this->modifiedColumns[] = Tabla40Peer::NOMPER2;
      }
  
	} 
	
	public function setNomper1($v)
	{

    if ($this->nomper1 !== $v) {
        $this->nomper1 = $v;
        $this->modifiedColumns[] = Tabla40Peer::NOMPER1;
      }
  
	} 
	
	public function setHorcon($v)
	{

    if ($this->horcon !== $v) {
        $this->horcon = $v;
        $this->modifiedColumns[] = Tabla40Peer::HORCON;
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
      $this->modifiedColumns[] = Tabla40Peer::FECCON;
    }

	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = Tabla40Peer::NOMCAT;
      }
  
	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMFAC;
      }
  
	} 
	
	public function setNumconfac($v)
	{

    if ($this->numconfac !== $v) {
        $this->numconfac = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMCONFAC;
      }
  
	} 
	
	public function setNumcorfac($v)
	{

    if ($this->numcorfac !== $v) {
        $this->numcorfac = $v;
        $this->modifiedColumns[] = Tabla40Peer::NUMCORFAC;
      }
  
	} 
	
	public function setFechafac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechafac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechafac !== $ts) {
      $this->fechafac = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECHAFAC;
    }

	} 
	
	public function setFecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECFAC;
    }

	} 
	
	public function setTipfin($v)
	{

    if ($this->tipfin !== $v) {
        $this->tipfin = $v;
        $this->modifiedColumns[] = Tabla40Peer::TIPFIN;
      }
  
	} 
	
	public function setComret($v)
	{

    if ($this->comret !== $v) {
        $this->comret = $v;
        $this->modifiedColumns[] = Tabla40Peer::COMRET;
      }
  
	} 
	
	public function setFeccomret($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomret !== $ts) {
      $this->feccomret = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECCOMRET;
    }

	} 
	
	public function setComretislr($v)
	{

    if ($this->comretislr !== $v) {
        $this->comretislr = $v;
        $this->modifiedColumns[] = Tabla40Peer::COMRETISLR;
      }
  
	} 
	
	public function setFeccomretislr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretislr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretislr !== $ts) {
      $this->feccomretislr = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECCOMRETISLR;
    }

	} 
	
	public function setComretltf($v)
	{

    if ($this->comretltf !== $v) {
        $this->comretltf = $v;
        $this->modifiedColumns[] = Tabla40Peer::COMRETLTF;
      }
  
	} 
	
	public function setFeccomretltf($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretltf] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretltf !== $ts) {
      $this->feccomretltf = $ts;
      $this->modifiedColumns[] = Tabla40Peer::FECCOMRETLTF;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla40Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->tipcau = $rs->getString($startcol + 1);

      $this->fecemi = $rs->getDate($startcol + 2, null);

      $this->cedrif = $rs->getString($startcol + 3);

      $this->nomben = $rs->getString($startcol + 4);

      $this->monord = $rs->getFloat($startcol + 5);

      $this->desord = $rs->getString($startcol + 6);

      $this->mondes = $rs->getFloat($startcol + 7);

      $this->monret = $rs->getFloat($startcol + 8);

      $this->numche = $rs->getString($startcol + 9);

      $this->ctaban = $rs->getString($startcol + 10);

      $this->ctapag = $rs->getString($startcol + 11);

      $this->numcom = $rs->getString($startcol + 12);

      $this->status = $rs->getString($startcol + 13);

      $this->coduni = $rs->getString($startcol + 14);

      $this->fecenvcon = $rs->getDate($startcol + 15, null);

      $this->fecenvfin = $rs->getDate($startcol + 16, null);

      $this->ctapagfin = $rs->getString($startcol + 17);

      $this->obsord = $rs->getString($startcol + 18);

      $this->fecven = $rs->getDate($startcol + 19, null);

      $this->fecanu = $rs->getDate($startcol + 20, null);

      $this->desanu = $rs->getString($startcol + 21);

      $this->monpag = $rs->getFloat($startcol + 22);

      $this->aproba = $rs->getString($startcol + 23);

      $this->nombensus = $rs->getString($startcol + 24);

      $this->fecrecfin = $rs->getDate($startcol + 25, null);

      $this->anopre = $rs->getString($startcol + 26);

      $this->fecpag = $rs->getDate($startcol + 27, null);

      $this->numtiq = $rs->getString($startcol + 28);

      $this->peraut = $rs->getString($startcol + 29);

      $this->cedaut = $rs->getString($startcol + 30);

      $this->nomper2 = $rs->getString($startcol + 31);

      $this->nomper1 = $rs->getString($startcol + 32);

      $this->horcon = $rs->getString($startcol + 33);

      $this->feccon = $rs->getDate($startcol + 34, null);

      $this->nomcat = $rs->getString($startcol + 35);

      $this->numfac = $rs->getString($startcol + 36);

      $this->numconfac = $rs->getString($startcol + 37);

      $this->numcorfac = $rs->getString($startcol + 38);

      $this->fechafac = $rs->getDate($startcol + 39, null);

      $this->fecfac = $rs->getDate($startcol + 40, null);

      $this->tipfin = $rs->getString($startcol + 41);

      $this->comret = $rs->getString($startcol + 42);

      $this->feccomret = $rs->getDate($startcol + 43, null);

      $this->comretislr = $rs->getString($startcol + 44);

      $this->feccomretislr = $rs->getDate($startcol + 45, null);

      $this->comretltf = $rs->getString($startcol + 46);

      $this->feccomretltf = $rs->getDate($startcol + 47, null);

      $this->id = $rs->getInt($startcol + 48);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 49; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla40 object", $e);
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
			$con = Propel::getConnection(Tabla40Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla40Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla40Peer::DATABASE_NAME);
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
					$pk = Tabla40Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla40Peer::doUpdate($this, $con);
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


			if (($retval = Tabla40Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla40Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getFecemi();
				break;
			case 3:
				return $this->getCedrif();
				break;
			case 4:
				return $this->getNomben();
				break;
			case 5:
				return $this->getMonord();
				break;
			case 6:
				return $this->getDesord();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getMonret();
				break;
			case 9:
				return $this->getNumche();
				break;
			case 10:
				return $this->getCtaban();
				break;
			case 11:
				return $this->getCtapag();
				break;
			case 12:
				return $this->getNumcom();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getCoduni();
				break;
			case 15:
				return $this->getFecenvcon();
				break;
			case 16:
				return $this->getFecenvfin();
				break;
			case 17:
				return $this->getCtapagfin();
				break;
			case 18:
				return $this->getObsord();
				break;
			case 19:
				return $this->getFecven();
				break;
			case 20:
				return $this->getFecanu();
				break;
			case 21:
				return $this->getDesanu();
				break;
			case 22:
				return $this->getMonpag();
				break;
			case 23:
				return $this->getAproba();
				break;
			case 24:
				return $this->getNombensus();
				break;
			case 25:
				return $this->getFecrecfin();
				break;
			case 26:
				return $this->getAnopre();
				break;
			case 27:
				return $this->getFecpag();
				break;
			case 28:
				return $this->getNumtiq();
				break;
			case 29:
				return $this->getPeraut();
				break;
			case 30:
				return $this->getCedaut();
				break;
			case 31:
				return $this->getNomper2();
				break;
			case 32:
				return $this->getNomper1();
				break;
			case 33:
				return $this->getHorcon();
				break;
			case 34:
				return $this->getFeccon();
				break;
			case 35:
				return $this->getNomcat();
				break;
			case 36:
				return $this->getNumfac();
				break;
			case 37:
				return $this->getNumconfac();
				break;
			case 38:
				return $this->getNumcorfac();
				break;
			case 39:
				return $this->getFechafac();
				break;
			case 40:
				return $this->getFecfac();
				break;
			case 41:
				return $this->getTipfin();
				break;
			case 42:
				return $this->getComret();
				break;
			case 43:
				return $this->getFeccomret();
				break;
			case 44:
				return $this->getComretislr();
				break;
			case 45:
				return $this->getFeccomretislr();
				break;
			case 46:
				return $this->getComretltf();
				break;
			case 47:
				return $this->getFeccomretltf();
				break;
			case 48:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla40Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getFecemi(),
			$keys[3] => $this->getCedrif(),
			$keys[4] => $this->getNomben(),
			$keys[5] => $this->getMonord(),
			$keys[6] => $this->getDesord(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getMonret(),
			$keys[9] => $this->getNumche(),
			$keys[10] => $this->getCtaban(),
			$keys[11] => $this->getCtapag(),
			$keys[12] => $this->getNumcom(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getCoduni(),
			$keys[15] => $this->getFecenvcon(),
			$keys[16] => $this->getFecenvfin(),
			$keys[17] => $this->getCtapagfin(),
			$keys[18] => $this->getObsord(),
			$keys[19] => $this->getFecven(),
			$keys[20] => $this->getFecanu(),
			$keys[21] => $this->getDesanu(),
			$keys[22] => $this->getMonpag(),
			$keys[23] => $this->getAproba(),
			$keys[24] => $this->getNombensus(),
			$keys[25] => $this->getFecrecfin(),
			$keys[26] => $this->getAnopre(),
			$keys[27] => $this->getFecpag(),
			$keys[28] => $this->getNumtiq(),
			$keys[29] => $this->getPeraut(),
			$keys[30] => $this->getCedaut(),
			$keys[31] => $this->getNomper2(),
			$keys[32] => $this->getNomper1(),
			$keys[33] => $this->getHorcon(),
			$keys[34] => $this->getFeccon(),
			$keys[35] => $this->getNomcat(),
			$keys[36] => $this->getNumfac(),
			$keys[37] => $this->getNumconfac(),
			$keys[38] => $this->getNumcorfac(),
			$keys[39] => $this->getFechafac(),
			$keys[40] => $this->getFecfac(),
			$keys[41] => $this->getTipfin(),
			$keys[42] => $this->getComret(),
			$keys[43] => $this->getFeccomret(),
			$keys[44] => $this->getComretislr(),
			$keys[45] => $this->getFeccomretislr(),
			$keys[46] => $this->getComretltf(),
			$keys[47] => $this->getFeccomretltf(),
			$keys[48] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla40Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setFecemi($value);
				break;
			case 3:
				$this->setCedrif($value);
				break;
			case 4:
				$this->setNomben($value);
				break;
			case 5:
				$this->setMonord($value);
				break;
			case 6:
				$this->setDesord($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setMonret($value);
				break;
			case 9:
				$this->setNumche($value);
				break;
			case 10:
				$this->setCtaban($value);
				break;
			case 11:
				$this->setCtapag($value);
				break;
			case 12:
				$this->setNumcom($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setCoduni($value);
				break;
			case 15:
				$this->setFecenvcon($value);
				break;
			case 16:
				$this->setFecenvfin($value);
				break;
			case 17:
				$this->setCtapagfin($value);
				break;
			case 18:
				$this->setObsord($value);
				break;
			case 19:
				$this->setFecven($value);
				break;
			case 20:
				$this->setFecanu($value);
				break;
			case 21:
				$this->setDesanu($value);
				break;
			case 22:
				$this->setMonpag($value);
				break;
			case 23:
				$this->setAproba($value);
				break;
			case 24:
				$this->setNombensus($value);
				break;
			case 25:
				$this->setFecrecfin($value);
				break;
			case 26:
				$this->setAnopre($value);
				break;
			case 27:
				$this->setFecpag($value);
				break;
			case 28:
				$this->setNumtiq($value);
				break;
			case 29:
				$this->setPeraut($value);
				break;
			case 30:
				$this->setCedaut($value);
				break;
			case 31:
				$this->setNomper2($value);
				break;
			case 32:
				$this->setNomper1($value);
				break;
			case 33:
				$this->setHorcon($value);
				break;
			case 34:
				$this->setFeccon($value);
				break;
			case 35:
				$this->setNomcat($value);
				break;
			case 36:
				$this->setNumfac($value);
				break;
			case 37:
				$this->setNumconfac($value);
				break;
			case 38:
				$this->setNumcorfac($value);
				break;
			case 39:
				$this->setFechafac($value);
				break;
			case 40:
				$this->setFecfac($value);
				break;
			case 41:
				$this->setTipfin($value);
				break;
			case 42:
				$this->setComret($value);
				break;
			case 43:
				$this->setFeccomret($value);
				break;
			case 44:
				$this->setComretislr($value);
				break;
			case 45:
				$this->setFeccomretislr($value);
				break;
			case 46:
				$this->setComretltf($value);
				break;
			case 47:
				$this->setFeccomretltf($value);
				break;
			case 48:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla40Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecemi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedrif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonord($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesord($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonret($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumche($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCtaban($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCtapag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumcom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoduni($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecenvcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecenvfin($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCtapagfin($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setObsord($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecven($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecanu($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDesanu($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setMonpag($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setAproba($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNombensus($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecrecfin($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setAnopre($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFecpag($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setNumtiq($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setPeraut($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCedaut($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setNomper2($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setNomper1($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setHorcon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFeccon($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNomcat($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNumfac($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setNumconfac($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setNumcorfac($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setFechafac($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setFecfac($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setTipfin($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setComret($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setFeccomret($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setComretislr($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setFeccomretislr($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setComretltf($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setFeccomretltf($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setId($arr[$keys[48]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla40Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla40Peer::NUMORD)) $criteria->add(Tabla40Peer::NUMORD, $this->numord);
		if ($this->isColumnModified(Tabla40Peer::TIPCAU)) $criteria->add(Tabla40Peer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(Tabla40Peer::FECEMI)) $criteria->add(Tabla40Peer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(Tabla40Peer::CEDRIF)) $criteria->add(Tabla40Peer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(Tabla40Peer::NOMBEN)) $criteria->add(Tabla40Peer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(Tabla40Peer::MONORD)) $criteria->add(Tabla40Peer::MONORD, $this->monord);
		if ($this->isColumnModified(Tabla40Peer::DESORD)) $criteria->add(Tabla40Peer::DESORD, $this->desord);
		if ($this->isColumnModified(Tabla40Peer::MONDES)) $criteria->add(Tabla40Peer::MONDES, $this->mondes);
		if ($this->isColumnModified(Tabla40Peer::MONRET)) $criteria->add(Tabla40Peer::MONRET, $this->monret);
		if ($this->isColumnModified(Tabla40Peer::NUMCHE)) $criteria->add(Tabla40Peer::NUMCHE, $this->numche);
		if ($this->isColumnModified(Tabla40Peer::CTABAN)) $criteria->add(Tabla40Peer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(Tabla40Peer::CTAPAG)) $criteria->add(Tabla40Peer::CTAPAG, $this->ctapag);
		if ($this->isColumnModified(Tabla40Peer::NUMCOM)) $criteria->add(Tabla40Peer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(Tabla40Peer::STATUS)) $criteria->add(Tabla40Peer::STATUS, $this->status);
		if ($this->isColumnModified(Tabla40Peer::CODUNI)) $criteria->add(Tabla40Peer::CODUNI, $this->coduni);
		if ($this->isColumnModified(Tabla40Peer::FECENVCON)) $criteria->add(Tabla40Peer::FECENVCON, $this->fecenvcon);
		if ($this->isColumnModified(Tabla40Peer::FECENVFIN)) $criteria->add(Tabla40Peer::FECENVFIN, $this->fecenvfin);
		if ($this->isColumnModified(Tabla40Peer::CTAPAGFIN)) $criteria->add(Tabla40Peer::CTAPAGFIN, $this->ctapagfin);
		if ($this->isColumnModified(Tabla40Peer::OBSORD)) $criteria->add(Tabla40Peer::OBSORD, $this->obsord);
		if ($this->isColumnModified(Tabla40Peer::FECVEN)) $criteria->add(Tabla40Peer::FECVEN, $this->fecven);
		if ($this->isColumnModified(Tabla40Peer::FECANU)) $criteria->add(Tabla40Peer::FECANU, $this->fecanu);
		if ($this->isColumnModified(Tabla40Peer::DESANU)) $criteria->add(Tabla40Peer::DESANU, $this->desanu);
		if ($this->isColumnModified(Tabla40Peer::MONPAG)) $criteria->add(Tabla40Peer::MONPAG, $this->monpag);
		if ($this->isColumnModified(Tabla40Peer::APROBA)) $criteria->add(Tabla40Peer::APROBA, $this->aproba);
		if ($this->isColumnModified(Tabla40Peer::NOMBENSUS)) $criteria->add(Tabla40Peer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(Tabla40Peer::FECRECFIN)) $criteria->add(Tabla40Peer::FECRECFIN, $this->fecrecfin);
		if ($this->isColumnModified(Tabla40Peer::ANOPRE)) $criteria->add(Tabla40Peer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(Tabla40Peer::FECPAG)) $criteria->add(Tabla40Peer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(Tabla40Peer::NUMTIQ)) $criteria->add(Tabla40Peer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(Tabla40Peer::PERAUT)) $criteria->add(Tabla40Peer::PERAUT, $this->peraut);
		if ($this->isColumnModified(Tabla40Peer::CEDAUT)) $criteria->add(Tabla40Peer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(Tabla40Peer::NOMPER2)) $criteria->add(Tabla40Peer::NOMPER2, $this->nomper2);
		if ($this->isColumnModified(Tabla40Peer::NOMPER1)) $criteria->add(Tabla40Peer::NOMPER1, $this->nomper1);
		if ($this->isColumnModified(Tabla40Peer::HORCON)) $criteria->add(Tabla40Peer::HORCON, $this->horcon);
		if ($this->isColumnModified(Tabla40Peer::FECCON)) $criteria->add(Tabla40Peer::FECCON, $this->feccon);
		if ($this->isColumnModified(Tabla40Peer::NOMCAT)) $criteria->add(Tabla40Peer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(Tabla40Peer::NUMFAC)) $criteria->add(Tabla40Peer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(Tabla40Peer::NUMCONFAC)) $criteria->add(Tabla40Peer::NUMCONFAC, $this->numconfac);
		if ($this->isColumnModified(Tabla40Peer::NUMCORFAC)) $criteria->add(Tabla40Peer::NUMCORFAC, $this->numcorfac);
		if ($this->isColumnModified(Tabla40Peer::FECHAFAC)) $criteria->add(Tabla40Peer::FECHAFAC, $this->fechafac);
		if ($this->isColumnModified(Tabla40Peer::FECFAC)) $criteria->add(Tabla40Peer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(Tabla40Peer::TIPFIN)) $criteria->add(Tabla40Peer::TIPFIN, $this->tipfin);
		if ($this->isColumnModified(Tabla40Peer::COMRET)) $criteria->add(Tabla40Peer::COMRET, $this->comret);
		if ($this->isColumnModified(Tabla40Peer::FECCOMRET)) $criteria->add(Tabla40Peer::FECCOMRET, $this->feccomret);
		if ($this->isColumnModified(Tabla40Peer::COMRETISLR)) $criteria->add(Tabla40Peer::COMRETISLR, $this->comretislr);
		if ($this->isColumnModified(Tabla40Peer::FECCOMRETISLR)) $criteria->add(Tabla40Peer::FECCOMRETISLR, $this->feccomretislr);
		if ($this->isColumnModified(Tabla40Peer::COMRETLTF)) $criteria->add(Tabla40Peer::COMRETLTF, $this->comretltf);
		if ($this->isColumnModified(Tabla40Peer::FECCOMRETLTF)) $criteria->add(Tabla40Peer::FECCOMRETLTF, $this->feccomretltf);
		if ($this->isColumnModified(Tabla40Peer::ID)) $criteria->add(Tabla40Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla40Peer::DATABASE_NAME);

		$criteria->add(Tabla40Peer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setMonord($this->monord);

		$copyObj->setDesord($this->desord);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);

		$copyObj->setNumche($this->numche);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setCtapag($this->ctapag);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setStatus($this->status);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setFecenvcon($this->fecenvcon);

		$copyObj->setFecenvfin($this->fecenvfin);

		$copyObj->setCtapagfin($this->ctapagfin);

		$copyObj->setObsord($this->obsord);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setAproba($this->aproba);

		$copyObj->setNombensus($this->nombensus);

		$copyObj->setFecrecfin($this->fecrecfin);

		$copyObj->setAnopre($this->anopre);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setNumtiq($this->numtiq);

		$copyObj->setPeraut($this->peraut);

		$copyObj->setCedaut($this->cedaut);

		$copyObj->setNomper2($this->nomper2);

		$copyObj->setNomper1($this->nomper1);

		$copyObj->setHorcon($this->horcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setNomcat($this->nomcat);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setNumconfac($this->numconfac);

		$copyObj->setNumcorfac($this->numcorfac);

		$copyObj->setFechafac($this->fechafac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setTipfin($this->tipfin);

		$copyObj->setComret($this->comret);

		$copyObj->setFeccomret($this->feccomret);

		$copyObj->setComretislr($this->comretislr);

		$copyObj->setFeccomretislr($this->feccomretislr);

		$copyObj->setComretltf($this->comretltf);

		$copyObj->setFeccomretltf($this->feccomretltf);


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
			self::$peer = new Tabla40Peer();
		}
		return self::$peer;
	}

} 