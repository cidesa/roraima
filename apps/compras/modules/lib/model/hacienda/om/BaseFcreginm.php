<?php


abstract class BaseFcreginm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroinm;


	
	protected $codcatfis;


	
	protected $coduso;


	
	protected $codcarinm;


	
	protected $codsitinm;


	
	protected $rifcon;


	
	protected $fecpag;


	
	protected $feccal;


	
	protected $fecreg;


	
	protected $dirinm;


	
	protected $linnor;


	
	protected $linsur;


	
	protected $linest;


	
	protected $linoes;


	
	protected $mtrter;


	
	protected $mtrcon;


	
	protected $bster;


	
	protected $bscon;


	
	protected $rifrep;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $estinm;


	
	protected $estdec;


	
	protected $codcatinm;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $valinm;


	
	protected $folio;


	
	protected $tomo;


	
	protected $numdoc;


	
	protected $fecdoc;


	
	protected $usoinm;


	
	protected $aveinm;


	
	protected $nrociv;


	
	protected $urbinm;


	
	protected $tipope;


	
	protected $prodoc;


	
	protected $tridoc;


	
	protected $aredoc;


	
	protected $linnordoc;


	
	protected $linsurdoc;


	
	protected $linestdoc;


	
	protected $linoesdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroinm()
  {

    return trim($this->nroinm);

  }
  
  public function getCodcatfis()
  {

    return trim($this->codcatfis);

  }
  
  public function getCoduso()
  {

    return trim($this->coduso);

  }
  
  public function getCodcarinm()
  {

    return trim($this->codcarinm);

  }
  
  public function getCodsitinm()
  {

    return trim($this->codsitinm);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

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

  
  public function getFeccal($format = 'Y-m-d')
  {

    if ($this->feccal === null || $this->feccal === '') {
      return null;
    } elseif (!is_int($this->feccal)) {
            $ts = adodb_strtotime($this->feccal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccal] as date/time value: " . var_export($this->feccal, true));
      }
    } else {
      $ts = $this->feccal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getDirinm()
  {

    return trim($this->dirinm);

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
  
  public function getMtrter($val=false)
  {

    if($val) return number_format($this->mtrter,2,',','.');
    else return $this->mtrter;

  }
  
  public function getMtrcon($val=false)
  {

    if($val) return number_format($this->mtrcon,2,',','.');
    else return $this->mtrcon;

  }
  
  public function getBster($val=false)
  {

    if($val) return number_format($this->bster,2,',','.');
    else return $this->bster;

  }
  
  public function getBscon($val=false)
  {

    if($val) return number_format($this->bscon,2,',','.');
    else return $this->bscon;

  }
  
  public function getRifrep()
  {

    return trim($this->rifrep);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstinm()
  {

    return trim($this->estinm);

  }
  
  public function getEstdec()
  {

    return trim($this->estdec);

  }
  
  public function getCodcatinm()
  {

    return trim($this->codcatinm);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getValinm($val=false)
  {

    if($val) return number_format($this->valinm,2,',','.');
    else return $this->valinm;

  }
  
  public function getFolio()
  {

    return trim($this->folio);

  }
  
  public function getTomo()
  {

    return trim($this->tomo);

  }
  
  public function getNumdoc()
  {

    return trim($this->numdoc);

  }
  
  public function getFecdoc($format = 'Y-m-d')
  {

    if ($this->fecdoc === null || $this->fecdoc === '') {
      return null;
    } elseif (!is_int($this->fecdoc)) {
            $ts = adodb_strtotime($this->fecdoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdoc] as date/time value: " . var_export($this->fecdoc, true));
      }
    } else {
      $ts = $this->fecdoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsoinm()
  {

    return trim($this->usoinm);

  }
  
  public function getAveinm()
  {

    return trim($this->aveinm);

  }
  
  public function getNrociv()
  {

    return trim($this->nrociv);

  }
  
  public function getUrbinm()
  {

    return trim($this->urbinm);

  }
  
  public function getTipope()
  {

    return trim($this->tipope);

  }
  
  public function getProdoc()
  {

    return trim($this->prodoc);

  }
  
  public function getTridoc()
  {

    return trim($this->tridoc);

  }
  
  public function getAredoc($val=false)
  {

    if($val) return number_format($this->aredoc,2,',','.');
    else return $this->aredoc;

  }
  
  public function getLinnordoc()
  {

    return trim($this->linnordoc);

  }
  
  public function getLinsurdoc()
  {

    return trim($this->linsurdoc);

  }
  
  public function getLinestdoc()
  {

    return trim($this->linestdoc);

  }
  
  public function getLinoesdoc()
  {

    return trim($this->linoesdoc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroinm($v)
	{

    if ($this->nroinm !== $v) {
        $this->nroinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::NROINM;
      }
  
	} 
	
	public function setCodcatfis($v)
	{

    if ($this->codcatfis !== $v) {
        $this->codcatfis = $v;
        $this->modifiedColumns[] = FcreginmPeer::CODCATFIS;
      }
  
	} 
	
	public function setCoduso($v)
	{

    if ($this->coduso !== $v) {
        $this->coduso = $v;
        $this->modifiedColumns[] = FcreginmPeer::CODUSO;
      }
  
	} 
	
	public function setCodcarinm($v)
	{

    if ($this->codcarinm !== $v) {
        $this->codcarinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::CODCARINM;
      }
  
	} 
	
	public function setCodsitinm($v)
	{

    if ($this->codsitinm !== $v) {
        $this->codsitinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::CODSITINM;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcreginmPeer::RIFCON;
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
      $this->modifiedColumns[] = FcreginmPeer::FECPAG;
    }

	} 
	
	public function setFeccal($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccal !== $ts) {
      $this->feccal = $ts;
      $this->modifiedColumns[] = FcreginmPeer::FECCAL;
    }

	} 
	
	public function setFecreg($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = FcreginmPeer::FECREG;
    }

	} 
	
	public function setDirinm($v)
	{

    if ($this->dirinm !== $v) {
        $this->dirinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::DIRINM;
      }
  
	} 
	
	public function setLinnor($v)
	{

    if ($this->linnor !== $v) {
        $this->linnor = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINNOR;
      }
  
	} 
	
	public function setLinsur($v)
	{

    if ($this->linsur !== $v) {
        $this->linsur = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINSUR;
      }
  
	} 
	
	public function setLinest($v)
	{

    if ($this->linest !== $v) {
        $this->linest = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINEST;
      }
  
	} 
	
	public function setLinoes($v)
	{

    if ($this->linoes !== $v) {
        $this->linoes = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINOES;
      }
  
	} 
	
	public function setMtrter($v)
	{

    if ($this->mtrter !== $v) {
        $this->mtrter = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcreginmPeer::MTRTER;
      }
  
	} 
	
	public function setMtrcon($v)
	{

    if ($this->mtrcon !== $v) {
        $this->mtrcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcreginmPeer::MTRCON;
      }
  
	} 
	
	public function setBster($v)
	{

    if ($this->bster !== $v) {
        $this->bster = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcreginmPeer::BSTER;
      }
  
	} 
	
	public function setBscon($v)
	{

    if ($this->bscon !== $v) {
        $this->bscon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcreginmPeer::BSCON;
      }
  
	} 
	
	public function setRifrep($v)
	{

    if ($this->rifrep !== $v) {
        $this->rifrep = $v;
        $this->modifiedColumns[] = FcreginmPeer::RIFREP;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcreginmPeer::FUNREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = FcreginmPeer::FECREC;
    }

	} 
	
	public function setEstinm($v)
	{

    if ($this->estinm !== $v) {
        $this->estinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::ESTINM;
      }
  
	} 
	
	public function setEstdec($v)
	{

    if ($this->estdec !== $v) {
        $this->estdec = $v;
        $this->modifiedColumns[] = FcreginmPeer::ESTDEC;
      }
  
	} 
	
	public function setCodcatinm($v)
	{

    if ($this->codcatinm !== $v) {
        $this->codcatinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::CODCATINM;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcreginmPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcreginmPeer::DIRCON;
      }
  
	} 
	
	public function setValinm($v)
	{

    if ($this->valinm !== $v) {
        $this->valinm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcreginmPeer::VALINM;
      }
  
	} 
	
	public function setFolio($v)
	{

    if ($this->folio !== $v) {
        $this->folio = $v;
        $this->modifiedColumns[] = FcreginmPeer::FOLIO;
      }
  
	} 
	
	public function setTomo($v)
	{

    if ($this->tomo !== $v) {
        $this->tomo = $v;
        $this->modifiedColumns[] = FcreginmPeer::TOMO;
      }
  
	} 
	
	public function setNumdoc($v)
	{

    if ($this->numdoc !== $v) {
        $this->numdoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::NUMDOC;
      }
  
	} 
	
	public function setFecdoc($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdoc !== $ts) {
      $this->fecdoc = $ts;
      $this->modifiedColumns[] = FcreginmPeer::FECDOC;
    }

	} 
	
	public function setUsoinm($v)
	{

    if ($this->usoinm !== $v) {
        $this->usoinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::USOINM;
      }
  
	} 
	
	public function setAveinm($v)
	{

    if ($this->aveinm !== $v) {
        $this->aveinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::AVEINM;
      }
  
	} 
	
	public function setNrociv($v)
	{

    if ($this->nrociv !== $v) {
        $this->nrociv = $v;
        $this->modifiedColumns[] = FcreginmPeer::NROCIV;
      }
  
	} 
	
	public function setUrbinm($v)
	{

    if ($this->urbinm !== $v) {
        $this->urbinm = $v;
        $this->modifiedColumns[] = FcreginmPeer::URBINM;
      }
  
	} 
	
	public function setTipope($v)
	{

    if ($this->tipope !== $v) {
        $this->tipope = $v;
        $this->modifiedColumns[] = FcreginmPeer::TIPOPE;
      }
  
	} 
	
	public function setProdoc($v)
	{

    if ($this->prodoc !== $v) {
        $this->prodoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::PRODOC;
      }
  
	} 
	
	public function setTridoc($v)
	{

    if ($this->tridoc !== $v) {
        $this->tridoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::TRIDOC;
      }
  
	} 
	
	public function setAredoc($v)
	{

    if ($this->aredoc !== $v) {
        $this->aredoc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcreginmPeer::AREDOC;
      }
  
	} 
	
	public function setLinnordoc($v)
	{

    if ($this->linnordoc !== $v) {
        $this->linnordoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINNORDOC;
      }
  
	} 
	
	public function setLinsurdoc($v)
	{

    if ($this->linsurdoc !== $v) {
        $this->linsurdoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINSURDOC;
      }
  
	} 
	
	public function setLinestdoc($v)
	{

    if ($this->linestdoc !== $v) {
        $this->linestdoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINESTDOC;
      }
  
	} 
	
	public function setLinoesdoc($v)
	{

    if ($this->linoesdoc !== $v) {
        $this->linoesdoc = $v;
        $this->modifiedColumns[] = FcreginmPeer::LINOESDOC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcreginmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroinm = $rs->getString($startcol + 0);

      $this->codcatfis = $rs->getString($startcol + 1);

      $this->coduso = $rs->getString($startcol + 2);

      $this->codcarinm = $rs->getString($startcol + 3);

      $this->codsitinm = $rs->getString($startcol + 4);

      $this->rifcon = $rs->getString($startcol + 5);

      $this->fecpag = $rs->getDate($startcol + 6, null);

      $this->feccal = $rs->getDate($startcol + 7, null);

      $this->fecreg = $rs->getDate($startcol + 8, null);

      $this->dirinm = $rs->getString($startcol + 9);

      $this->linnor = $rs->getString($startcol + 10);

      $this->linsur = $rs->getString($startcol + 11);

      $this->linest = $rs->getString($startcol + 12);

      $this->linoes = $rs->getString($startcol + 13);

      $this->mtrter = $rs->getFloat($startcol + 14);

      $this->mtrcon = $rs->getFloat($startcol + 15);

      $this->bster = $rs->getFloat($startcol + 16);

      $this->bscon = $rs->getFloat($startcol + 17);

      $this->rifrep = $rs->getString($startcol + 18);

      $this->funrec = $rs->getString($startcol + 19);

      $this->fecrec = $rs->getDate($startcol + 20, null);

      $this->estinm = $rs->getString($startcol + 21);

      $this->estdec = $rs->getString($startcol + 22);

      $this->codcatinm = $rs->getString($startcol + 23);

      $this->nomcon = $rs->getString($startcol + 24);

      $this->dircon = $rs->getString($startcol + 25);

      $this->valinm = $rs->getFloat($startcol + 26);

      $this->folio = $rs->getString($startcol + 27);

      $this->tomo = $rs->getString($startcol + 28);

      $this->numdoc = $rs->getString($startcol + 29);

      $this->fecdoc = $rs->getDate($startcol + 30, null);

      $this->usoinm = $rs->getString($startcol + 31);

      $this->aveinm = $rs->getString($startcol + 32);

      $this->nrociv = $rs->getString($startcol + 33);

      $this->urbinm = $rs->getString($startcol + 34);

      $this->tipope = $rs->getString($startcol + 35);

      $this->prodoc = $rs->getString($startcol + 36);

      $this->tridoc = $rs->getString($startcol + 37);

      $this->aredoc = $rs->getFloat($startcol + 38);

      $this->linnordoc = $rs->getString($startcol + 39);

      $this->linsurdoc = $rs->getString($startcol + 40);

      $this->linestdoc = $rs->getString($startcol + 41);

      $this->linoesdoc = $rs->getString($startcol + 42);

      $this->id = $rs->getInt($startcol + 43);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 44; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcreginm object", $e);
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
			$con = Propel::getConnection(FcreginmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcreginmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcreginmPeer::DATABASE_NAME);
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
					$pk = FcreginmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcreginmPeer::doUpdate($this, $con);
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


			if (($retval = FcreginmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcreginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroinm();
				break;
			case 1:
				return $this->getCodcatfis();
				break;
			case 2:
				return $this->getCoduso();
				break;
			case 3:
				return $this->getCodcarinm();
				break;
			case 4:
				return $this->getCodsitinm();
				break;
			case 5:
				return $this->getRifcon();
				break;
			case 6:
				return $this->getFecpag();
				break;
			case 7:
				return $this->getFeccal();
				break;
			case 8:
				return $this->getFecreg();
				break;
			case 9:
				return $this->getDirinm();
				break;
			case 10:
				return $this->getLinnor();
				break;
			case 11:
				return $this->getLinsur();
				break;
			case 12:
				return $this->getLinest();
				break;
			case 13:
				return $this->getLinoes();
				break;
			case 14:
				return $this->getMtrter();
				break;
			case 15:
				return $this->getMtrcon();
				break;
			case 16:
				return $this->getBster();
				break;
			case 17:
				return $this->getBscon();
				break;
			case 18:
				return $this->getRifrep();
				break;
			case 19:
				return $this->getFunrec();
				break;
			case 20:
				return $this->getFecrec();
				break;
			case 21:
				return $this->getEstinm();
				break;
			case 22:
				return $this->getEstdec();
				break;
			case 23:
				return $this->getCodcatinm();
				break;
			case 24:
				return $this->getNomcon();
				break;
			case 25:
				return $this->getDircon();
				break;
			case 26:
				return $this->getValinm();
				break;
			case 27:
				return $this->getFolio();
				break;
			case 28:
				return $this->getTomo();
				break;
			case 29:
				return $this->getNumdoc();
				break;
			case 30:
				return $this->getFecdoc();
				break;
			case 31:
				return $this->getUsoinm();
				break;
			case 32:
				return $this->getAveinm();
				break;
			case 33:
				return $this->getNrociv();
				break;
			case 34:
				return $this->getUrbinm();
				break;
			case 35:
				return $this->getTipope();
				break;
			case 36:
				return $this->getProdoc();
				break;
			case 37:
				return $this->getTridoc();
				break;
			case 38:
				return $this->getAredoc();
				break;
			case 39:
				return $this->getLinnordoc();
				break;
			case 40:
				return $this->getLinsurdoc();
				break;
			case 41:
				return $this->getLinestdoc();
				break;
			case 42:
				return $this->getLinoesdoc();
				break;
			case 43:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcreginmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroinm(),
			$keys[1] => $this->getCodcatfis(),
			$keys[2] => $this->getCoduso(),
			$keys[3] => $this->getCodcarinm(),
			$keys[4] => $this->getCodsitinm(),
			$keys[5] => $this->getRifcon(),
			$keys[6] => $this->getFecpag(),
			$keys[7] => $this->getFeccal(),
			$keys[8] => $this->getFecreg(),
			$keys[9] => $this->getDirinm(),
			$keys[10] => $this->getLinnor(),
			$keys[11] => $this->getLinsur(),
			$keys[12] => $this->getLinest(),
			$keys[13] => $this->getLinoes(),
			$keys[14] => $this->getMtrter(),
			$keys[15] => $this->getMtrcon(),
			$keys[16] => $this->getBster(),
			$keys[17] => $this->getBscon(),
			$keys[18] => $this->getRifrep(),
			$keys[19] => $this->getFunrec(),
			$keys[20] => $this->getFecrec(),
			$keys[21] => $this->getEstinm(),
			$keys[22] => $this->getEstdec(),
			$keys[23] => $this->getCodcatinm(),
			$keys[24] => $this->getNomcon(),
			$keys[25] => $this->getDircon(),
			$keys[26] => $this->getValinm(),
			$keys[27] => $this->getFolio(),
			$keys[28] => $this->getTomo(),
			$keys[29] => $this->getNumdoc(),
			$keys[30] => $this->getFecdoc(),
			$keys[31] => $this->getUsoinm(),
			$keys[32] => $this->getAveinm(),
			$keys[33] => $this->getNrociv(),
			$keys[34] => $this->getUrbinm(),
			$keys[35] => $this->getTipope(),
			$keys[36] => $this->getProdoc(),
			$keys[37] => $this->getTridoc(),
			$keys[38] => $this->getAredoc(),
			$keys[39] => $this->getLinnordoc(),
			$keys[40] => $this->getLinsurdoc(),
			$keys[41] => $this->getLinestdoc(),
			$keys[42] => $this->getLinoesdoc(),
			$keys[43] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcreginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroinm($value);
				break;
			case 1:
				$this->setCodcatfis($value);
				break;
			case 2:
				$this->setCoduso($value);
				break;
			case 3:
				$this->setCodcarinm($value);
				break;
			case 4:
				$this->setCodsitinm($value);
				break;
			case 5:
				$this->setRifcon($value);
				break;
			case 6:
				$this->setFecpag($value);
				break;
			case 7:
				$this->setFeccal($value);
				break;
			case 8:
				$this->setFecreg($value);
				break;
			case 9:
				$this->setDirinm($value);
				break;
			case 10:
				$this->setLinnor($value);
				break;
			case 11:
				$this->setLinsur($value);
				break;
			case 12:
				$this->setLinest($value);
				break;
			case 13:
				$this->setLinoes($value);
				break;
			case 14:
				$this->setMtrter($value);
				break;
			case 15:
				$this->setMtrcon($value);
				break;
			case 16:
				$this->setBster($value);
				break;
			case 17:
				$this->setBscon($value);
				break;
			case 18:
				$this->setRifrep($value);
				break;
			case 19:
				$this->setFunrec($value);
				break;
			case 20:
				$this->setFecrec($value);
				break;
			case 21:
				$this->setEstinm($value);
				break;
			case 22:
				$this->setEstdec($value);
				break;
			case 23:
				$this->setCodcatinm($value);
				break;
			case 24:
				$this->setNomcon($value);
				break;
			case 25:
				$this->setDircon($value);
				break;
			case 26:
				$this->setValinm($value);
				break;
			case 27:
				$this->setFolio($value);
				break;
			case 28:
				$this->setTomo($value);
				break;
			case 29:
				$this->setNumdoc($value);
				break;
			case 30:
				$this->setFecdoc($value);
				break;
			case 31:
				$this->setUsoinm($value);
				break;
			case 32:
				$this->setAveinm($value);
				break;
			case 33:
				$this->setNrociv($value);
				break;
			case 34:
				$this->setUrbinm($value);
				break;
			case 35:
				$this->setTipope($value);
				break;
			case 36:
				$this->setProdoc($value);
				break;
			case 37:
				$this->setTridoc($value);
				break;
			case 38:
				$this->setAredoc($value);
				break;
			case 39:
				$this->setLinnordoc($value);
				break;
			case 40:
				$this->setLinsurdoc($value);
				break;
			case 41:
				$this->setLinestdoc($value);
				break;
			case 42:
				$this->setLinoesdoc($value);
				break;
			case 43:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcreginmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcatfis($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoduso($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcarinm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodsitinm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRifcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFeccal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecreg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirinm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLinnor($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLinsur($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLinest($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLinoes($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMtrter($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMtrcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setBster($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBscon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRifrep($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFunrec($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecrec($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setEstinm($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setEstdec($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodcatinm($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNomcon($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDircon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setValinm($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFolio($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTomo($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setNumdoc($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecdoc($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setUsoinm($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setAveinm($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNrociv($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setUrbinm($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setTipope($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setProdoc($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setTridoc($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setAredoc($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setLinnordoc($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setLinsurdoc($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setLinestdoc($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setLinoesdoc($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setId($arr[$keys[43]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcreginmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcreginmPeer::NROINM)) $criteria->add(FcreginmPeer::NROINM, $this->nroinm);
		if ($this->isColumnModified(FcreginmPeer::CODCATFIS)) $criteria->add(FcreginmPeer::CODCATFIS, $this->codcatfis);
		if ($this->isColumnModified(FcreginmPeer::CODUSO)) $criteria->add(FcreginmPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcreginmPeer::CODCARINM)) $criteria->add(FcreginmPeer::CODCARINM, $this->codcarinm);
		if ($this->isColumnModified(FcreginmPeer::CODSITINM)) $criteria->add(FcreginmPeer::CODSITINM, $this->codsitinm);
		if ($this->isColumnModified(FcreginmPeer::RIFCON)) $criteria->add(FcreginmPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcreginmPeer::FECPAG)) $criteria->add(FcreginmPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(FcreginmPeer::FECCAL)) $criteria->add(FcreginmPeer::FECCAL, $this->feccal);
		if ($this->isColumnModified(FcreginmPeer::FECREG)) $criteria->add(FcreginmPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcreginmPeer::DIRINM)) $criteria->add(FcreginmPeer::DIRINM, $this->dirinm);
		if ($this->isColumnModified(FcreginmPeer::LINNOR)) $criteria->add(FcreginmPeer::LINNOR, $this->linnor);
		if ($this->isColumnModified(FcreginmPeer::LINSUR)) $criteria->add(FcreginmPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(FcreginmPeer::LINEST)) $criteria->add(FcreginmPeer::LINEST, $this->linest);
		if ($this->isColumnModified(FcreginmPeer::LINOES)) $criteria->add(FcreginmPeer::LINOES, $this->linoes);
		if ($this->isColumnModified(FcreginmPeer::MTRTER)) $criteria->add(FcreginmPeer::MTRTER, $this->mtrter);
		if ($this->isColumnModified(FcreginmPeer::MTRCON)) $criteria->add(FcreginmPeer::MTRCON, $this->mtrcon);
		if ($this->isColumnModified(FcreginmPeer::BSTER)) $criteria->add(FcreginmPeer::BSTER, $this->bster);
		if ($this->isColumnModified(FcreginmPeer::BSCON)) $criteria->add(FcreginmPeer::BSCON, $this->bscon);
		if ($this->isColumnModified(FcreginmPeer::RIFREP)) $criteria->add(FcreginmPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcreginmPeer::FUNREC)) $criteria->add(FcreginmPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcreginmPeer::FECREC)) $criteria->add(FcreginmPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcreginmPeer::ESTINM)) $criteria->add(FcreginmPeer::ESTINM, $this->estinm);
		if ($this->isColumnModified(FcreginmPeer::ESTDEC)) $criteria->add(FcreginmPeer::ESTDEC, $this->estdec);
		if ($this->isColumnModified(FcreginmPeer::CODCATINM)) $criteria->add(FcreginmPeer::CODCATINM, $this->codcatinm);
		if ($this->isColumnModified(FcreginmPeer::NOMCON)) $criteria->add(FcreginmPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcreginmPeer::DIRCON)) $criteria->add(FcreginmPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcreginmPeer::VALINM)) $criteria->add(FcreginmPeer::VALINM, $this->valinm);
		if ($this->isColumnModified(FcreginmPeer::FOLIO)) $criteria->add(FcreginmPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(FcreginmPeer::TOMO)) $criteria->add(FcreginmPeer::TOMO, $this->tomo);
		if ($this->isColumnModified(FcreginmPeer::NUMDOC)) $criteria->add(FcreginmPeer::NUMDOC, $this->numdoc);
		if ($this->isColumnModified(FcreginmPeer::FECDOC)) $criteria->add(FcreginmPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(FcreginmPeer::USOINM)) $criteria->add(FcreginmPeer::USOINM, $this->usoinm);
		if ($this->isColumnModified(FcreginmPeer::AVEINM)) $criteria->add(FcreginmPeer::AVEINM, $this->aveinm);
		if ($this->isColumnModified(FcreginmPeer::NROCIV)) $criteria->add(FcreginmPeer::NROCIV, $this->nrociv);
		if ($this->isColumnModified(FcreginmPeer::URBINM)) $criteria->add(FcreginmPeer::URBINM, $this->urbinm);
		if ($this->isColumnModified(FcreginmPeer::TIPOPE)) $criteria->add(FcreginmPeer::TIPOPE, $this->tipope);
		if ($this->isColumnModified(FcreginmPeer::PRODOC)) $criteria->add(FcreginmPeer::PRODOC, $this->prodoc);
		if ($this->isColumnModified(FcreginmPeer::TRIDOC)) $criteria->add(FcreginmPeer::TRIDOC, $this->tridoc);
		if ($this->isColumnModified(FcreginmPeer::AREDOC)) $criteria->add(FcreginmPeer::AREDOC, $this->aredoc);
		if ($this->isColumnModified(FcreginmPeer::LINNORDOC)) $criteria->add(FcreginmPeer::LINNORDOC, $this->linnordoc);
		if ($this->isColumnModified(FcreginmPeer::LINSURDOC)) $criteria->add(FcreginmPeer::LINSURDOC, $this->linsurdoc);
		if ($this->isColumnModified(FcreginmPeer::LINESTDOC)) $criteria->add(FcreginmPeer::LINESTDOC, $this->linestdoc);
		if ($this->isColumnModified(FcreginmPeer::LINOESDOC)) $criteria->add(FcreginmPeer::LINOESDOC, $this->linoesdoc);
		if ($this->isColumnModified(FcreginmPeer::ID)) $criteria->add(FcreginmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcreginmPeer::DATABASE_NAME);

		$criteria->add(FcreginmPeer::ID, $this->id);

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

		$copyObj->setNroinm($this->nroinm);

		$copyObj->setCodcatfis($this->codcatfis);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setCodcarinm($this->codcarinm);

		$copyObj->setCodsitinm($this->codsitinm);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setFeccal($this->feccal);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDirinm($this->dirinm);

		$copyObj->setLinnor($this->linnor);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLinest($this->linest);

		$copyObj->setLinoes($this->linoes);

		$copyObj->setMtrter($this->mtrter);

		$copyObj->setMtrcon($this->mtrcon);

		$copyObj->setBster($this->bster);

		$copyObj->setBscon($this->bscon);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setEstinm($this->estinm);

		$copyObj->setEstdec($this->estdec);

		$copyObj->setCodcatinm($this->codcatinm);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setValinm($this->valinm);

		$copyObj->setFolio($this->folio);

		$copyObj->setTomo($this->tomo);

		$copyObj->setNumdoc($this->numdoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setUsoinm($this->usoinm);

		$copyObj->setAveinm($this->aveinm);

		$copyObj->setNrociv($this->nrociv);

		$copyObj->setUrbinm($this->urbinm);

		$copyObj->setTipope($this->tipope);

		$copyObj->setProdoc($this->prodoc);

		$copyObj->setTridoc($this->tridoc);

		$copyObj->setAredoc($this->aredoc);

		$copyObj->setLinnordoc($this->linnordoc);

		$copyObj->setLinsurdoc($this->linsurdoc);

		$copyObj->setLinestdoc($this->linestdoc);

		$copyObj->setLinoesdoc($this->linoesdoc);


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
			self::$peer = new FcreginmPeer();
		}
		return self::$peer;
	}

} 