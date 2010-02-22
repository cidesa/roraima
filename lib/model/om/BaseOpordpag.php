<?php


abstract class BaseOpordpag extends BaseObject  implements Persistent {


	
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


	
	protected $numsigecof;


	
	protected $fecsigecof;


	
	protected $expsigecof;


	
	protected $aprobadoord;


	
	protected $codmotanu;


	
	protected $usuanu;


	
	protected $aprobadotes;


	
	protected $fecret;


	
	protected $numcue;


	
	protected $numcomapr;


	
	protected $codconcepto;


	
	protected $numforpre;


	
	protected $motrecord;


	
	protected $motrectes;


	
	protected $aprorddir;


	
	protected $codcajchi;


	
	protected $id;

	
	protected $aOpbenefi;

	
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

  
  public function getNumsigecof()
  {

    return trim($this->numsigecof);

  }
  
  public function getFecsigecof($format = 'Y-m-d')
  {

    if ($this->fecsigecof === null || $this->fecsigecof === '') {
      return null;
    } elseif (!is_int($this->fecsigecof)) {
            $ts = adodb_strtotime($this->fecsigecof);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsigecof] as date/time value: " . var_export($this->fecsigecof, true));
      }
    } else {
      $ts = $this->fecsigecof;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getExpsigecof()
  {

    return trim($this->expsigecof);

  }
  
  public function getAprobadoord()
  {

    return trim($this->aprobadoord);

  }
  
  public function getCodmotanu()
  {

    return trim($this->codmotanu);

  }
  
  public function getUsuanu()
  {

    return trim($this->usuanu);

  }
  
  public function getAprobadotes()
  {

    return trim($this->aprobadotes);

  }
  
  public function getFecret($format = 'Y-m-d')
  {

    if ($this->fecret === null || $this->fecret === '') {
      return null;
    } elseif (!is_int($this->fecret)) {
            $ts = adodb_strtotime($this->fecret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecret] as date/time value: " . var_export($this->fecret, true));
      }
    } else {
      $ts = $this->fecret;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getNumcomapr()
  {

    return trim($this->numcomapr);

  }
  
  public function getCodconcepto()
  {

    return trim($this->codconcepto);

  }
  
  public function getNumforpre()
  {

    return trim($this->numforpre);

  }
  
  public function getMotrecord()
  {

    return trim($this->motrecord);

  }
  
  public function getMotrectes()
  {

    return trim($this->motrectes);

  }
  
  public function getAprorddir()
  {

    return trim($this->aprorddir);

  }
  
  public function getCodcajchi()
  {

    return trim($this->codcajchi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMORD;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = OpordpagPeer::TIPCAU;
      }
  
	} 
	
	public function setFecemi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECEMI;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = OpordpagPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMBEN;
      }
  
	} 
	
	public function setMonord($v)
	{

    if ($this->monord !== $v) {
        $this->monord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONORD;
      }
  
	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = OpordpagPeer::DESORD;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONRET;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCHE;
      }
  
	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = OpordpagPeer::CTABAN;
      }
  
	} 
	
	public function setCtapag($v)
	{

    if ($this->ctapag !== $v) {
        $this->ctapag = $v;
        $this->modifiedColumns[] = OpordpagPeer::CTAPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = OpordpagPeer::STATUS;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODUNI;
      }
  
	} 
	
	public function setFecenvcon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvcon !== $ts) {
      $this->fecenvcon = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECENVCON;
    }

	} 
	
	public function setFecenvfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvfin !== $ts) {
      $this->fecenvfin = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECENVFIN;
    }

	} 
	
	public function setCtapagfin($v)
	{

    if ($this->ctapagfin !== $v) {
        $this->ctapagfin = $v;
        $this->modifiedColumns[] = OpordpagPeer::CTAPAGFIN;
      }
  
	} 
	
	public function setObsord($v)
	{

    if ($this->obsord !== $v) {
        $this->obsord = $v;
        $this->modifiedColumns[] = OpordpagPeer::OBSORD;
      }
  
	} 
	
	public function setFecven($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECVEN;
    }

	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = OpordpagPeer::DESANU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONPAG;
      }
  
	} 
	
	public function setAproba($v)
	{

    if ($this->aproba !== $v) {
        $this->aproba = $v;
        $this->modifiedColumns[] = OpordpagPeer::APROBA;
      }
  
	} 
	
	public function setNombensus($v)
	{

    if ($this->nombensus !== $v) {
        $this->nombensus = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMBENSUS;
      }
  
	} 
	
	public function setFecrecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecfin !== $ts) {
      $this->fecrecfin = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECRECFIN;
    }

	} 
	
	public function setAnopre($v)
	{

    if ($this->anopre !== $v) {
        $this->anopre = $v;
        $this->modifiedColumns[] = OpordpagPeer::ANOPRE;
      }
  
	} 
	
	public function setFecpag($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECPAG;
    }

	} 
	
	public function setNumtiq($v)
	{

    if ($this->numtiq !== $v) {
        $this->numtiq = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMTIQ;
      }
  
	} 
	
	public function setPeraut($v)
	{

    if ($this->peraut !== $v) {
        $this->peraut = $v;
        $this->modifiedColumns[] = OpordpagPeer::PERAUT;
      }
  
	} 
	
	public function setCedaut($v)
	{

    if ($this->cedaut !== $v) {
        $this->cedaut = $v;
        $this->modifiedColumns[] = OpordpagPeer::CEDAUT;
      }
  
	} 
	
	public function setNomper2($v)
	{

    if ($this->nomper2 !== $v) {
        $this->nomper2 = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMPER2;
      }
  
	} 
	
	public function setNomper1($v)
	{

    if ($this->nomper1 !== $v) {
        $this->nomper1 = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMPER1;
      }
  
	} 
	
	public function setHorcon($v)
	{

    if ($this->horcon !== $v) {
        $this->horcon = $v;
        $this->modifiedColumns[] = OpordpagPeer::HORCON;
      }
  
	} 
	
	public function setFeccon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCON;
    }

	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMCAT;
      }
  
	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMFAC;
      }
  
	} 
	
	public function setNumconfac($v)
	{

    if ($this->numconfac !== $v) {
        $this->numconfac = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCONFAC;
      }
  
	} 
	
	public function setNumcorfac($v)
	{

    if ($this->numcorfac !== $v) {
        $this->numcorfac = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCORFAC;
      }
  
	} 
	
	public function setFechafac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechafac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechafac !== $ts) {
      $this->fechafac = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECHAFAC;
    }

	} 
	
	public function setFecfac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECFAC;
    }

	} 
	
	public function setTipfin($v)
	{

    if ($this->tipfin !== $v) {
        $this->tipfin = $v;
        $this->modifiedColumns[] = OpordpagPeer::TIPFIN;
      }
  
	} 
	
	public function setComret($v)
	{

    if ($this->comret !== $v) {
        $this->comret = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRET;
      }
  
	} 
	
	public function setFeccomret($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomret !== $ts) {
      $this->feccomret = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRET;
    }

	} 
	
	public function setComretislr($v)
	{

    if ($this->comretislr !== $v) {
        $this->comretislr = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRETISLR;
      }
  
	} 
	
	public function setFeccomretislr($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretislr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretislr !== $ts) {
      $this->feccomretislr = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRETISLR;
    }

	} 
	
	public function setComretltf($v)
	{

    if ($this->comretltf !== $v) {
        $this->comretltf = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRETLTF;
      }
  
	} 
	
	public function setFeccomretltf($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretltf] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretltf !== $ts) {
      $this->feccomretltf = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRETLTF;
    }

	} 
	
	public function setNumsigecof($v)
	{

    if ($this->numsigecof !== $v) {
        $this->numsigecof = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMSIGECOF;
      }
  
	} 
	
	public function setFecsigecof($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsigecof] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsigecof !== $ts) {
      $this->fecsigecof = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECSIGECOF;
    }

	} 
	
	public function setExpsigecof($v)
	{

    if ($this->expsigecof !== $v) {
        $this->expsigecof = $v;
        $this->modifiedColumns[] = OpordpagPeer::EXPSIGECOF;
      }
  
	} 
	
	public function setAprobadoord($v)
	{

    if ($this->aprobadoord !== $v) {
        $this->aprobadoord = $v;
        $this->modifiedColumns[] = OpordpagPeer::APROBADOORD;
      }
  
	} 
	
	public function setCodmotanu($v)
	{

    if ($this->codmotanu !== $v) {
        $this->codmotanu = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODMOTANU;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = OpordpagPeer::USUANU;
      }
  
	} 
	
	public function setAprobadotes($v)
	{

    if ($this->aprobadotes !== $v) {
        $this->aprobadotes = $v;
        $this->modifiedColumns[] = OpordpagPeer::APROBADOTES;
      }
  
	} 
	
	public function setFecret($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecret !== $ts) {
      $this->fecret = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECRET;
    }

	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCUE;
      }
  
	} 
	
	public function setNumcomapr($v)
	{

    if ($this->numcomapr !== $v) {
        $this->numcomapr = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCOMAPR;
      }
  
	} 
	
	public function setCodconcepto($v)
	{

    if ($this->codconcepto !== $v) {
        $this->codconcepto = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODCONCEPTO;
      }
  
	} 
	
	public function setNumforpre($v)
	{

    if ($this->numforpre !== $v) {
        $this->numforpre = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMFORPRE;
      }
  
	} 
	
	public function setMotrecord($v)
	{

    if ($this->motrecord !== $v) {
        $this->motrecord = $v;
        $this->modifiedColumns[] = OpordpagPeer::MOTRECORD;
      }
  
	} 
	
	public function setMotrectes($v)
	{

    if ($this->motrectes !== $v) {
        $this->motrectes = $v;
        $this->modifiedColumns[] = OpordpagPeer::MOTRECTES;
      }
  
	} 
	
	public function setAprorddir($v)
	{

    if ($this->aprorddir !== $v) {
        $this->aprorddir = $v;
        $this->modifiedColumns[] = OpordpagPeer::APRORDDIR;
      }
  
	} 
	
	public function setCodcajchi($v)
	{

    if ($this->codcajchi !== $v) {
        $this->codcajchi = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODCAJCHI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpordpagPeer::ID;
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

      $this->numsigecof = $rs->getString($startcol + 48);

      $this->fecsigecof = $rs->getDate($startcol + 49, null);

      $this->expsigecof = $rs->getString($startcol + 50);

      $this->aprobadoord = $rs->getString($startcol + 51);

      $this->codmotanu = $rs->getString($startcol + 52);

      $this->usuanu = $rs->getString($startcol + 53);

      $this->aprobadotes = $rs->getString($startcol + 54);

      $this->fecret = $rs->getDate($startcol + 55, null);

      $this->numcue = $rs->getString($startcol + 56);

      $this->numcomapr = $rs->getString($startcol + 57);

      $this->codconcepto = $rs->getString($startcol + 58);

      $this->numforpre = $rs->getString($startcol + 59);

      $this->motrecord = $rs->getString($startcol + 60);

      $this->motrectes = $rs->getString($startcol + 61);

      $this->aprorddir = $rs->getString($startcol + 62);

      $this->codcajchi = $rs->getString($startcol + 63);

      $this->id = $rs->getInt($startcol + 64);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 65; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opordpag object", $e);
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
			$con = Propel::getConnection(OpordpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpordpagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpordpagPeer::DATABASE_NAME);
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


												
			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OpordpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpordpagPeer::doUpdate($this, $con);
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


												
			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}


			if (($retval = OpordpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpordpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNumsigecof();
				break;
			case 49:
				return $this->getFecsigecof();
				break;
			case 50:
				return $this->getExpsigecof();
				break;
			case 51:
				return $this->getAprobadoord();
				break;
			case 52:
				return $this->getCodmotanu();
				break;
			case 53:
				return $this->getUsuanu();
				break;
			case 54:
				return $this->getAprobadotes();
				break;
			case 55:
				return $this->getFecret();
				break;
			case 56:
				return $this->getNumcue();
				break;
			case 57:
				return $this->getNumcomapr();
				break;
			case 58:
				return $this->getCodconcepto();
				break;
			case 59:
				return $this->getNumforpre();
				break;
			case 60:
				return $this->getMotrecord();
				break;
			case 61:
				return $this->getMotrectes();
				break;
			case 62:
				return $this->getAprorddir();
				break;
			case 63:
				return $this->getCodcajchi();
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
		$keys = OpordpagPeer::getFieldNames($keyType);
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
			$keys[48] => $this->getNumsigecof(),
			$keys[49] => $this->getFecsigecof(),
			$keys[50] => $this->getExpsigecof(),
			$keys[51] => $this->getAprobadoord(),
			$keys[52] => $this->getCodmotanu(),
			$keys[53] => $this->getUsuanu(),
			$keys[54] => $this->getAprobadotes(),
			$keys[55] => $this->getFecret(),
			$keys[56] => $this->getNumcue(),
			$keys[57] => $this->getNumcomapr(),
			$keys[58] => $this->getCodconcepto(),
			$keys[59] => $this->getNumforpre(),
			$keys[60] => $this->getMotrecord(),
			$keys[61] => $this->getMotrectes(),
			$keys[62] => $this->getAprorddir(),
			$keys[63] => $this->getCodcajchi(),
			$keys[64] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpordpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNumsigecof($value);
				break;
			case 49:
				$this->setFecsigecof($value);
				break;
			case 50:
				$this->setExpsigecof($value);
				break;
			case 51:
				$this->setAprobadoord($value);
				break;
			case 52:
				$this->setCodmotanu($value);
				break;
			case 53:
				$this->setUsuanu($value);
				break;
			case 54:
				$this->setAprobadotes($value);
				break;
			case 55:
				$this->setFecret($value);
				break;
			case 56:
				$this->setNumcue($value);
				break;
			case 57:
				$this->setNumcomapr($value);
				break;
			case 58:
				$this->setCodconcepto($value);
				break;
			case 59:
				$this->setNumforpre($value);
				break;
			case 60:
				$this->setMotrecord($value);
				break;
			case 61:
				$this->setMotrectes($value);
				break;
			case 62:
				$this->setAprorddir($value);
				break;
			case 63:
				$this->setCodcajchi($value);
				break;
			case 64:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpordpagPeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[48], $arr)) $this->setNumsigecof($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setFecsigecof($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setExpsigecof($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setAprobadoord($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setCodmotanu($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setUsuanu($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setAprobadotes($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setFecret($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setNumcue($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setNumcomapr($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setCodconcepto($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setNumforpre($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setMotrecord($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setMotrectes($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setAprorddir($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setCodcajchi($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setId($arr[$keys[64]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpordpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpordpagPeer::NUMORD)) $criteria->add(OpordpagPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpordpagPeer::TIPCAU)) $criteria->add(OpordpagPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(OpordpagPeer::FECEMI)) $criteria->add(OpordpagPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(OpordpagPeer::CEDRIF)) $criteria->add(OpordpagPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(OpordpagPeer::NOMBEN)) $criteria->add(OpordpagPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(OpordpagPeer::MONORD)) $criteria->add(OpordpagPeer::MONORD, $this->monord);
		if ($this->isColumnModified(OpordpagPeer::DESORD)) $criteria->add(OpordpagPeer::DESORD, $this->desord);
		if ($this->isColumnModified(OpordpagPeer::MONDES)) $criteria->add(OpordpagPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(OpordpagPeer::MONRET)) $criteria->add(OpordpagPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpordpagPeer::NUMCHE)) $criteria->add(OpordpagPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(OpordpagPeer::CTABAN)) $criteria->add(OpordpagPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(OpordpagPeer::CTAPAG)) $criteria->add(OpordpagPeer::CTAPAG, $this->ctapag);
		if ($this->isColumnModified(OpordpagPeer::NUMCOM)) $criteria->add(OpordpagPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(OpordpagPeer::STATUS)) $criteria->add(OpordpagPeer::STATUS, $this->status);
		if ($this->isColumnModified(OpordpagPeer::CODUNI)) $criteria->add(OpordpagPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(OpordpagPeer::FECENVCON)) $criteria->add(OpordpagPeer::FECENVCON, $this->fecenvcon);
		if ($this->isColumnModified(OpordpagPeer::FECENVFIN)) $criteria->add(OpordpagPeer::FECENVFIN, $this->fecenvfin);
		if ($this->isColumnModified(OpordpagPeer::CTAPAGFIN)) $criteria->add(OpordpagPeer::CTAPAGFIN, $this->ctapagfin);
		if ($this->isColumnModified(OpordpagPeer::OBSORD)) $criteria->add(OpordpagPeer::OBSORD, $this->obsord);
		if ($this->isColumnModified(OpordpagPeer::FECVEN)) $criteria->add(OpordpagPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(OpordpagPeer::FECANU)) $criteria->add(OpordpagPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(OpordpagPeer::DESANU)) $criteria->add(OpordpagPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(OpordpagPeer::MONPAG)) $criteria->add(OpordpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(OpordpagPeer::APROBA)) $criteria->add(OpordpagPeer::APROBA, $this->aproba);
		if ($this->isColumnModified(OpordpagPeer::NOMBENSUS)) $criteria->add(OpordpagPeer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(OpordpagPeer::FECRECFIN)) $criteria->add(OpordpagPeer::FECRECFIN, $this->fecrecfin);
		if ($this->isColumnModified(OpordpagPeer::ANOPRE)) $criteria->add(OpordpagPeer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(OpordpagPeer::FECPAG)) $criteria->add(OpordpagPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(OpordpagPeer::NUMTIQ)) $criteria->add(OpordpagPeer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(OpordpagPeer::PERAUT)) $criteria->add(OpordpagPeer::PERAUT, $this->peraut);
		if ($this->isColumnModified(OpordpagPeer::CEDAUT)) $criteria->add(OpordpagPeer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(OpordpagPeer::NOMPER2)) $criteria->add(OpordpagPeer::NOMPER2, $this->nomper2);
		if ($this->isColumnModified(OpordpagPeer::NOMPER1)) $criteria->add(OpordpagPeer::NOMPER1, $this->nomper1);
		if ($this->isColumnModified(OpordpagPeer::HORCON)) $criteria->add(OpordpagPeer::HORCON, $this->horcon);
		if ($this->isColumnModified(OpordpagPeer::FECCON)) $criteria->add(OpordpagPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(OpordpagPeer::NOMCAT)) $criteria->add(OpordpagPeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(OpordpagPeer::NUMFAC)) $criteria->add(OpordpagPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(OpordpagPeer::NUMCONFAC)) $criteria->add(OpordpagPeer::NUMCONFAC, $this->numconfac);
		if ($this->isColumnModified(OpordpagPeer::NUMCORFAC)) $criteria->add(OpordpagPeer::NUMCORFAC, $this->numcorfac);
		if ($this->isColumnModified(OpordpagPeer::FECHAFAC)) $criteria->add(OpordpagPeer::FECHAFAC, $this->fechafac);
		if ($this->isColumnModified(OpordpagPeer::FECFAC)) $criteria->add(OpordpagPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(OpordpagPeer::TIPFIN)) $criteria->add(OpordpagPeer::TIPFIN, $this->tipfin);
		if ($this->isColumnModified(OpordpagPeer::COMRET)) $criteria->add(OpordpagPeer::COMRET, $this->comret);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRET)) $criteria->add(OpordpagPeer::FECCOMRET, $this->feccomret);
		if ($this->isColumnModified(OpordpagPeer::COMRETISLR)) $criteria->add(OpordpagPeer::COMRETISLR, $this->comretislr);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRETISLR)) $criteria->add(OpordpagPeer::FECCOMRETISLR, $this->feccomretislr);
		if ($this->isColumnModified(OpordpagPeer::COMRETLTF)) $criteria->add(OpordpagPeer::COMRETLTF, $this->comretltf);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRETLTF)) $criteria->add(OpordpagPeer::FECCOMRETLTF, $this->feccomretltf);
		if ($this->isColumnModified(OpordpagPeer::NUMSIGECOF)) $criteria->add(OpordpagPeer::NUMSIGECOF, $this->numsigecof);
		if ($this->isColumnModified(OpordpagPeer::FECSIGECOF)) $criteria->add(OpordpagPeer::FECSIGECOF, $this->fecsigecof);
		if ($this->isColumnModified(OpordpagPeer::EXPSIGECOF)) $criteria->add(OpordpagPeer::EXPSIGECOF, $this->expsigecof);
		if ($this->isColumnModified(OpordpagPeer::APROBADOORD)) $criteria->add(OpordpagPeer::APROBADOORD, $this->aprobadoord);
		if ($this->isColumnModified(OpordpagPeer::CODMOTANU)) $criteria->add(OpordpagPeer::CODMOTANU, $this->codmotanu);
		if ($this->isColumnModified(OpordpagPeer::USUANU)) $criteria->add(OpordpagPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(OpordpagPeer::APROBADOTES)) $criteria->add(OpordpagPeer::APROBADOTES, $this->aprobadotes);
		if ($this->isColumnModified(OpordpagPeer::FECRET)) $criteria->add(OpordpagPeer::FECRET, $this->fecret);
		if ($this->isColumnModified(OpordpagPeer::NUMCUE)) $criteria->add(OpordpagPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(OpordpagPeer::NUMCOMAPR)) $criteria->add(OpordpagPeer::NUMCOMAPR, $this->numcomapr);
		if ($this->isColumnModified(OpordpagPeer::CODCONCEPTO)) $criteria->add(OpordpagPeer::CODCONCEPTO, $this->codconcepto);
		if ($this->isColumnModified(OpordpagPeer::NUMFORPRE)) $criteria->add(OpordpagPeer::NUMFORPRE, $this->numforpre);
		if ($this->isColumnModified(OpordpagPeer::MOTRECORD)) $criteria->add(OpordpagPeer::MOTRECORD, $this->motrecord);
		if ($this->isColumnModified(OpordpagPeer::MOTRECTES)) $criteria->add(OpordpagPeer::MOTRECTES, $this->motrectes);
		if ($this->isColumnModified(OpordpagPeer::APRORDDIR)) $criteria->add(OpordpagPeer::APRORDDIR, $this->aprorddir);
		if ($this->isColumnModified(OpordpagPeer::CODCAJCHI)) $criteria->add(OpordpagPeer::CODCAJCHI, $this->codcajchi);
		if ($this->isColumnModified(OpordpagPeer::ID)) $criteria->add(OpordpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpordpagPeer::DATABASE_NAME);

		$criteria->add(OpordpagPeer::ID, $this->id);

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

		$copyObj->setNumsigecof($this->numsigecof);

		$copyObj->setFecsigecof($this->fecsigecof);

		$copyObj->setExpsigecof($this->expsigecof);

		$copyObj->setAprobadoord($this->aprobadoord);

		$copyObj->setCodmotanu($this->codmotanu);

		$copyObj->setUsuanu($this->usuanu);

		$copyObj->setAprobadotes($this->aprobadotes);

		$copyObj->setFecret($this->fecret);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setNumcomapr($this->numcomapr);

		$copyObj->setCodconcepto($this->codconcepto);

		$copyObj->setNumforpre($this->numforpre);

		$copyObj->setMotrecord($this->motrecord);

		$copyObj->setMotrectes($this->motrectes);

		$copyObj->setAprorddir($this->aprorddir);

		$copyObj->setCodcajchi($this->codcajchi);


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
			self::$peer = new OpordpagPeer();
		}
		return self::$peer;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

			$this->aOpbenefi = OpbenefiPeer::retrieveByPK($this->cedrif, $con);

			
		}
		return $this->aOpbenefi;
	}

} 