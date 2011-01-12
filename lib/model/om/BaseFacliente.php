<?php


abstract class BaseFacliente extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $nompro;


	
	protected $rifpro;


	
	protected $nitpro;


	
	protected $dirpro;


	
	protected $telpro;


	
	protected $faxpro;


	
	protected $email;


	
	protected $limcre;


	
	protected $codcta;


	
	protected $regmer;


	
	protected $fecreg;


	
	protected $tomreg;


	
	protected $folreg;


	
	protected $capsus;


	
	protected $cappag;


	
	protected $rifrepleg;


	
	protected $nomrepleg;


	
	protected $dirrepleg;


	
	protected $nrocei;


	
	protected $codram;


	
	protected $fecinscir;


	
	protected $numinscir;


	
	protected $nacpro;


	
	protected $codord;


	
	protected $codpercon;


	
	protected $codtiprec;


	
	protected $codordadi;


	
	protected $codperconadi;


	
	protected $tipo;


	
	protected $fecven;


	
	protected $ciudad;


	
	protected $codordmercon;


	
	protected $codpermercon;


	
	protected $codordcontra;


	
	protected $codpercontra;


	
	protected $temcodpro;


	
	protected $temrifpro;


	
	protected $codctasec;


	
	protected $codtipemp;


	
	protected $tipper;


	
	protected $pagweb;


	
	protected $telrepleg;


	
	protected $correpleg;


	
	protected $rifpercon;


	
	protected $nompercon;


	
	protected $dirpercon;


	
	protected $telpercon;


	
	protected $corpercon;


	
	protected $escontrib;


	
	protected $codedo;


	
	protected $fatipcte_id;


	
	protected $id;

	
	protected $aFatipcte;

	
	protected $collFarecpros;

	
	protected $lastFarecproCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getNitpro()
  {

    return trim($this->nitpro);

  }
  
  public function getDirpro()
  {

    return trim($this->dirpro);

  }
  
  public function getTelpro()
  {

    return trim($this->telpro);

  }
  
  public function getFaxpro()
  {

    return trim($this->faxpro);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getLimcre($val=false)
  {

    if($val) return number_format($this->limcre,2,',','.');
    else return $this->limcre;

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getRegmer()
  {

    return trim($this->regmer);

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

  
  public function getTomreg()
  {

    return trim($this->tomreg);

  }
  
  public function getFolreg()
  {

    return trim($this->folreg);

  }
  
  public function getCapsus($val=false)
  {

    if($val) return number_format($this->capsus,2,',','.');
    else return $this->capsus;

  }
  
  public function getCappag($val=false)
  {

    if($val) return number_format($this->cappag,2,',','.');
    else return $this->cappag;

  }
  
  public function getRifrepleg()
  {

    return trim($this->rifrepleg);

  }
  
  public function getNomrepleg()
  {

    return trim($this->nomrepleg);

  }
  
  public function getDirrepleg()
  {

    return trim($this->dirrepleg);

  }
  
  public function getNrocei()
  {

    return trim($this->nrocei);

  }
  
  public function getCodram()
  {

    return trim($this->codram);

  }
  
  public function getFecinscir($format = 'Y-m-d')
  {

    if ($this->fecinscir === null || $this->fecinscir === '') {
      return null;
    } elseif (!is_int($this->fecinscir)) {
            $ts = adodb_strtotime($this->fecinscir);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinscir] as date/time value: " . var_export($this->fecinscir, true));
      }
    } else {
      $ts = $this->fecinscir;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNuminscir()
  {

    return trim($this->numinscir);

  }
  
  public function getNacpro()
  {

    return trim($this->nacpro);

  }
  
  public function getCodord()
  {

    return trim($this->codord);

  }
  
  public function getCodpercon()
  {

    return trim($this->codpercon);

  }
  
  public function getCodtiprec()
  {

    return trim($this->codtiprec);

  }
  
  public function getCodordadi()
  {

    return trim($this->codordadi);

  }
  
  public function getCodperconadi()
  {

    return trim($this->codperconadi);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

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

  
  public function getCiudad()
  {

    return trim($this->ciudad);

  }
  
  public function getCodordmercon()
  {

    return trim($this->codordmercon);

  }
  
  public function getCodpermercon()
  {

    return trim($this->codpermercon);

  }
  
  public function getCodordcontra()
  {

    return trim($this->codordcontra);

  }
  
  public function getCodpercontra()
  {

    return trim($this->codpercontra);

  }
  
  public function getTemcodpro()
  {

    return trim($this->temcodpro);

  }
  
  public function getTemrifpro()
  {

    return trim($this->temrifpro);

  }
  
  public function getCodctasec()
  {

    return trim($this->codctasec);

  }
  
  public function getCodtipemp()
  {

    return trim($this->codtipemp);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getPagweb()
  {

    return trim($this->pagweb);

  }
  
  public function getTelrepleg()
  {

    return trim($this->telrepleg);

  }
  
  public function getCorrepleg()
  {

    return trim($this->correpleg);

  }
  
  public function getRifpercon()
  {

    return trim($this->rifpercon);

  }
  
  public function getNompercon()
  {

    return trim($this->nompercon);

  }
  
  public function getDirpercon()
  {

    return trim($this->dirpercon);

  }
  
  public function getTelpercon()
  {

    return trim($this->telpercon);

  }
  
  public function getCorpercon()
  {

    return trim($this->corpercon);

  }
  
  public function getEscontrib()
  {

    return $this->escontrib;

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getFatipcteId()
  {

    return $this->fatipcte_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FaclientePeer::CODPRO;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = FaclientePeer::NOMPRO;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = FaclientePeer::RIFPRO;
      }
  
	} 
	
	public function setNitpro($v)
	{

    if ($this->nitpro !== $v) {
        $this->nitpro = $v;
        $this->modifiedColumns[] = FaclientePeer::NITPRO;
      }
  
	} 
	
	public function setDirpro($v)
	{

    if ($this->dirpro !== $v) {
        $this->dirpro = $v;
        $this->modifiedColumns[] = FaclientePeer::DIRPRO;
      }
  
	} 
	
	public function setTelpro($v)
	{

    if ($this->telpro !== $v) {
        $this->telpro = $v;
        $this->modifiedColumns[] = FaclientePeer::TELPRO;
      }
  
	} 
	
	public function setFaxpro($v)
	{

    if ($this->faxpro !== $v) {
        $this->faxpro = $v;
        $this->modifiedColumns[] = FaclientePeer::FAXPRO;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = FaclientePeer::EMAIL;
      }
  
	} 
	
	public function setLimcre($v)
	{

    if ($this->limcre !== $v) {
        $this->limcre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaclientePeer::LIMCRE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = FaclientePeer::CODCTA;
      }
  
	} 
	
	public function setRegmer($v)
	{

    if ($this->regmer !== $v) {
        $this->regmer = $v;
        $this->modifiedColumns[] = FaclientePeer::REGMER;
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
      $this->modifiedColumns[] = FaclientePeer::FECREG;
    }

	} 
	
	public function setTomreg($v)
	{

    if ($this->tomreg !== $v) {
        $this->tomreg = $v;
        $this->modifiedColumns[] = FaclientePeer::TOMREG;
      }
  
	} 
	
	public function setFolreg($v)
	{

    if ($this->folreg !== $v) {
        $this->folreg = $v;
        $this->modifiedColumns[] = FaclientePeer::FOLREG;
      }
  
	} 
	
	public function setCapsus($v)
	{

    if ($this->capsus !== $v) {
        $this->capsus = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaclientePeer::CAPSUS;
      }
  
	} 
	
	public function setCappag($v)
	{

    if ($this->cappag !== $v) {
        $this->cappag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaclientePeer::CAPPAG;
      }
  
	} 
	
	public function setRifrepleg($v)
	{

    if ($this->rifrepleg !== $v) {
        $this->rifrepleg = $v;
        $this->modifiedColumns[] = FaclientePeer::RIFREPLEG;
      }
  
	} 
	
	public function setNomrepleg($v)
	{

    if ($this->nomrepleg !== $v) {
        $this->nomrepleg = $v;
        $this->modifiedColumns[] = FaclientePeer::NOMREPLEG;
      }
  
	} 
	
	public function setDirrepleg($v)
	{

    if ($this->dirrepleg !== $v) {
        $this->dirrepleg = $v;
        $this->modifiedColumns[] = FaclientePeer::DIRREPLEG;
      }
  
	} 
	
	public function setNrocei($v)
	{

    if ($this->nrocei !== $v) {
        $this->nrocei = $v;
        $this->modifiedColumns[] = FaclientePeer::NROCEI;
      }
  
	} 
	
	public function setCodram($v)
	{

    if ($this->codram !== $v) {
        $this->codram = $v;
        $this->modifiedColumns[] = FaclientePeer::CODRAM;
      }
  
	} 
	
	public function setFecinscir($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinscir] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinscir !== $ts) {
      $this->fecinscir = $ts;
      $this->modifiedColumns[] = FaclientePeer::FECINSCIR;
    }

	} 
	
	public function setNuminscir($v)
	{

    if ($this->numinscir !== $v) {
        $this->numinscir = $v;
        $this->modifiedColumns[] = FaclientePeer::NUMINSCIR;
      }
  
	} 
	
	public function setNacpro($v)
	{

    if ($this->nacpro !== $v) {
        $this->nacpro = $v;
        $this->modifiedColumns[] = FaclientePeer::NACPRO;
      }
  
	} 
	
	public function setCodord($v)
	{

    if ($this->codord !== $v) {
        $this->codord = $v;
        $this->modifiedColumns[] = FaclientePeer::CODORD;
      }
  
	} 
	
	public function setCodpercon($v)
	{

    if ($this->codpercon !== $v) {
        $this->codpercon = $v;
        $this->modifiedColumns[] = FaclientePeer::CODPERCON;
      }
  
	} 
	
	public function setCodtiprec($v)
	{

    if ($this->codtiprec !== $v) {
        $this->codtiprec = $v;
        $this->modifiedColumns[] = FaclientePeer::CODTIPREC;
      }
  
	} 
	
	public function setCodordadi($v)
	{

    if ($this->codordadi !== $v) {
        $this->codordadi = $v;
        $this->modifiedColumns[] = FaclientePeer::CODORDADI;
      }
  
	} 
	
	public function setCodperconadi($v)
	{

    if ($this->codperconadi !== $v) {
        $this->codperconadi = $v;
        $this->modifiedColumns[] = FaclientePeer::CODPERCONADI;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FaclientePeer::TIPO;
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
      $this->modifiedColumns[] = FaclientePeer::FECVEN;
    }

	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = FaclientePeer::CIUDAD;
      }
  
	} 
	
	public function setCodordmercon($v)
	{

    if ($this->codordmercon !== $v) {
        $this->codordmercon = $v;
        $this->modifiedColumns[] = FaclientePeer::CODORDMERCON;
      }
  
	} 
	
	public function setCodpermercon($v)
	{

    if ($this->codpermercon !== $v) {
        $this->codpermercon = $v;
        $this->modifiedColumns[] = FaclientePeer::CODPERMERCON;
      }
  
	} 
	
	public function setCodordcontra($v)
	{

    if ($this->codordcontra !== $v) {
        $this->codordcontra = $v;
        $this->modifiedColumns[] = FaclientePeer::CODORDCONTRA;
      }
  
	} 
	
	public function setCodpercontra($v)
	{

    if ($this->codpercontra !== $v) {
        $this->codpercontra = $v;
        $this->modifiedColumns[] = FaclientePeer::CODPERCONTRA;
      }
  
	} 
	
	public function setTemcodpro($v)
	{

    if ($this->temcodpro !== $v) {
        $this->temcodpro = $v;
        $this->modifiedColumns[] = FaclientePeer::TEMCODPRO;
      }
  
	} 
	
	public function setTemrifpro($v)
	{

    if ($this->temrifpro !== $v) {
        $this->temrifpro = $v;
        $this->modifiedColumns[] = FaclientePeer::TEMRIFPRO;
      }
  
	} 
	
	public function setCodctasec($v)
	{

    if ($this->codctasec !== $v) {
        $this->codctasec = $v;
        $this->modifiedColumns[] = FaclientePeer::CODCTASEC;
      }
  
	} 
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = FaclientePeer::CODTIPEMP;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = FaclientePeer::TIPPER;
      }
  
	} 
	
	public function setPagweb($v)
	{

    if ($this->pagweb !== $v) {
        $this->pagweb = $v;
        $this->modifiedColumns[] = FaclientePeer::PAGWEB;
      }
  
	} 
	
	public function setTelrepleg($v)
	{

    if ($this->telrepleg !== $v) {
        $this->telrepleg = $v;
        $this->modifiedColumns[] = FaclientePeer::TELREPLEG;
      }
  
	} 
	
	public function setCorrepleg($v)
	{

    if ($this->correpleg !== $v) {
        $this->correpleg = $v;
        $this->modifiedColumns[] = FaclientePeer::CORREPLEG;
      }
  
	} 
	
	public function setRifpercon($v)
	{

    if ($this->rifpercon !== $v) {
        $this->rifpercon = $v;
        $this->modifiedColumns[] = FaclientePeer::RIFPERCON;
      }
  
	} 
	
	public function setNompercon($v)
	{

    if ($this->nompercon !== $v) {
        $this->nompercon = $v;
        $this->modifiedColumns[] = FaclientePeer::NOMPERCON;
      }
  
	} 
	
	public function setDirpercon($v)
	{

    if ($this->dirpercon !== $v) {
        $this->dirpercon = $v;
        $this->modifiedColumns[] = FaclientePeer::DIRPERCON;
      }
  
	} 
	
	public function setTelpercon($v)
	{

    if ($this->telpercon !== $v) {
        $this->telpercon = $v;
        $this->modifiedColumns[] = FaclientePeer::TELPERCON;
      }
  
	} 
	
	public function setCorpercon($v)
	{

    if ($this->corpercon !== $v) {
        $this->corpercon = $v;
        $this->modifiedColumns[] = FaclientePeer::CORPERCON;
      }
  
	} 
	
	public function setEscontrib($v)
	{

    if ($this->escontrib !== $v) {
        $this->escontrib = $v;
        $this->modifiedColumns[] = FaclientePeer::ESCONTRIB;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = FaclientePeer::CODEDO;
      }
  
	} 
	
	public function setFatipcteId($v)
	{

    if ($this->fatipcte_id !== $v) {
        $this->fatipcte_id = $v;
        $this->modifiedColumns[] = FaclientePeer::FATIPCTE_ID;
      }
  
		if ($this->aFatipcte !== null && $this->aFatipcte->getId() !== $v) {
			$this->aFatipcte = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaclientePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->nompro = $rs->getString($startcol + 1);

      $this->rifpro = $rs->getString($startcol + 2);

      $this->nitpro = $rs->getString($startcol + 3);

      $this->dirpro = $rs->getString($startcol + 4);

      $this->telpro = $rs->getString($startcol + 5);

      $this->faxpro = $rs->getString($startcol + 6);

      $this->email = $rs->getString($startcol + 7);

      $this->limcre = $rs->getFloat($startcol + 8);

      $this->codcta = $rs->getString($startcol + 9);

      $this->regmer = $rs->getString($startcol + 10);

      $this->fecreg = $rs->getDate($startcol + 11, null);

      $this->tomreg = $rs->getString($startcol + 12);

      $this->folreg = $rs->getString($startcol + 13);

      $this->capsus = $rs->getFloat($startcol + 14);

      $this->cappag = $rs->getFloat($startcol + 15);

      $this->rifrepleg = $rs->getString($startcol + 16);

      $this->nomrepleg = $rs->getString($startcol + 17);

      $this->dirrepleg = $rs->getString($startcol + 18);

      $this->nrocei = $rs->getString($startcol + 19);

      $this->codram = $rs->getString($startcol + 20);

      $this->fecinscir = $rs->getDate($startcol + 21, null);

      $this->numinscir = $rs->getString($startcol + 22);

      $this->nacpro = $rs->getString($startcol + 23);

      $this->codord = $rs->getString($startcol + 24);

      $this->codpercon = $rs->getString($startcol + 25);

      $this->codtiprec = $rs->getString($startcol + 26);

      $this->codordadi = $rs->getString($startcol + 27);

      $this->codperconadi = $rs->getString($startcol + 28);

      $this->tipo = $rs->getString($startcol + 29);

      $this->fecven = $rs->getDate($startcol + 30, null);

      $this->ciudad = $rs->getString($startcol + 31);

      $this->codordmercon = $rs->getString($startcol + 32);

      $this->codpermercon = $rs->getString($startcol + 33);

      $this->codordcontra = $rs->getString($startcol + 34);

      $this->codpercontra = $rs->getString($startcol + 35);

      $this->temcodpro = $rs->getString($startcol + 36);

      $this->temrifpro = $rs->getString($startcol + 37);

      $this->codctasec = $rs->getString($startcol + 38);

      $this->codtipemp = $rs->getString($startcol + 39);

      $this->tipper = $rs->getString($startcol + 40);

      $this->pagweb = $rs->getString($startcol + 41);

      $this->telrepleg = $rs->getString($startcol + 42);

      $this->correpleg = $rs->getString($startcol + 43);

      $this->rifpercon = $rs->getString($startcol + 44);

      $this->nompercon = $rs->getString($startcol + 45);

      $this->dirpercon = $rs->getString($startcol + 46);

      $this->telpercon = $rs->getString($startcol + 47);

      $this->corpercon = $rs->getString($startcol + 48);

      $this->escontrib = $rs->getBoolean($startcol + 49);

      $this->codedo = $rs->getString($startcol + 50);

      $this->fatipcte_id = $rs->getInt($startcol + 51);

      $this->id = $rs->getInt($startcol + 52);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 53; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facliente object", $e);
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
			$con = Propel::getConnection(FaclientePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaclientePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaclientePeer::DATABASE_NAME);
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


												
			if ($this->aFatipcte !== null) {
				if ($this->aFatipcte->isModified()) {
					$affectedRows += $this->aFatipcte->save($con);
				}
				$this->setFatipcte($this->aFatipcte);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaclientePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaclientePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFarecpros !== null) {
				foreach($this->collFarecpros as $referrerFK) {
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


												
			if ($this->aFatipcte !== null) {
				if (!$this->aFatipcte->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFatipcte->getValidationFailures());
				}
			}


			if (($retval = FaclientePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFarecpros !== null) {
					foreach($this->collFarecpros as $referrerFK) {
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
		$pos = FaclientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getRifpro();
				break;
			case 3:
				return $this->getNitpro();
				break;
			case 4:
				return $this->getDirpro();
				break;
			case 5:
				return $this->getTelpro();
				break;
			case 6:
				return $this->getFaxpro();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getLimcre();
				break;
			case 9:
				return $this->getCodcta();
				break;
			case 10:
				return $this->getRegmer();
				break;
			case 11:
				return $this->getFecreg();
				break;
			case 12:
				return $this->getTomreg();
				break;
			case 13:
				return $this->getFolreg();
				break;
			case 14:
				return $this->getCapsus();
				break;
			case 15:
				return $this->getCappag();
				break;
			case 16:
				return $this->getRifrepleg();
				break;
			case 17:
				return $this->getNomrepleg();
				break;
			case 18:
				return $this->getDirrepleg();
				break;
			case 19:
				return $this->getNrocei();
				break;
			case 20:
				return $this->getCodram();
				break;
			case 21:
				return $this->getFecinscir();
				break;
			case 22:
				return $this->getNuminscir();
				break;
			case 23:
				return $this->getNacpro();
				break;
			case 24:
				return $this->getCodord();
				break;
			case 25:
				return $this->getCodpercon();
				break;
			case 26:
				return $this->getCodtiprec();
				break;
			case 27:
				return $this->getCodordadi();
				break;
			case 28:
				return $this->getCodperconadi();
				break;
			case 29:
				return $this->getTipo();
				break;
			case 30:
				return $this->getFecven();
				break;
			case 31:
				return $this->getCiudad();
				break;
			case 32:
				return $this->getCodordmercon();
				break;
			case 33:
				return $this->getCodpermercon();
				break;
			case 34:
				return $this->getCodordcontra();
				break;
			case 35:
				return $this->getCodpercontra();
				break;
			case 36:
				return $this->getTemcodpro();
				break;
			case 37:
				return $this->getTemrifpro();
				break;
			case 38:
				return $this->getCodctasec();
				break;
			case 39:
				return $this->getCodtipemp();
				break;
			case 40:
				return $this->getTipper();
				break;
			case 41:
				return $this->getPagweb();
				break;
			case 42:
				return $this->getTelrepleg();
				break;
			case 43:
				return $this->getCorrepleg();
				break;
			case 44:
				return $this->getRifpercon();
				break;
			case 45:
				return $this->getNompercon();
				break;
			case 46:
				return $this->getDirpercon();
				break;
			case 47:
				return $this->getTelpercon();
				break;
			case 48:
				return $this->getCorpercon();
				break;
			case 49:
				return $this->getEscontrib();
				break;
			case 50:
				return $this->getCodedo();
				break;
			case 51:
				return $this->getFatipcteId();
				break;
			case 52:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaclientePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getNompro(),
			$keys[2] => $this->getRifpro(),
			$keys[3] => $this->getNitpro(),
			$keys[4] => $this->getDirpro(),
			$keys[5] => $this->getTelpro(),
			$keys[6] => $this->getFaxpro(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getLimcre(),
			$keys[9] => $this->getCodcta(),
			$keys[10] => $this->getRegmer(),
			$keys[11] => $this->getFecreg(),
			$keys[12] => $this->getTomreg(),
			$keys[13] => $this->getFolreg(),
			$keys[14] => $this->getCapsus(),
			$keys[15] => $this->getCappag(),
			$keys[16] => $this->getRifrepleg(),
			$keys[17] => $this->getNomrepleg(),
			$keys[18] => $this->getDirrepleg(),
			$keys[19] => $this->getNrocei(),
			$keys[20] => $this->getCodram(),
			$keys[21] => $this->getFecinscir(),
			$keys[22] => $this->getNuminscir(),
			$keys[23] => $this->getNacpro(),
			$keys[24] => $this->getCodord(),
			$keys[25] => $this->getCodpercon(),
			$keys[26] => $this->getCodtiprec(),
			$keys[27] => $this->getCodordadi(),
			$keys[28] => $this->getCodperconadi(),
			$keys[29] => $this->getTipo(),
			$keys[30] => $this->getFecven(),
			$keys[31] => $this->getCiudad(),
			$keys[32] => $this->getCodordmercon(),
			$keys[33] => $this->getCodpermercon(),
			$keys[34] => $this->getCodordcontra(),
			$keys[35] => $this->getCodpercontra(),
			$keys[36] => $this->getTemcodpro(),
			$keys[37] => $this->getTemrifpro(),
			$keys[38] => $this->getCodctasec(),
			$keys[39] => $this->getCodtipemp(),
			$keys[40] => $this->getTipper(),
			$keys[41] => $this->getPagweb(),
			$keys[42] => $this->getTelrepleg(),
			$keys[43] => $this->getCorrepleg(),
			$keys[44] => $this->getRifpercon(),
			$keys[45] => $this->getNompercon(),
			$keys[46] => $this->getDirpercon(),
			$keys[47] => $this->getTelpercon(),
			$keys[48] => $this->getCorpercon(),
			$keys[49] => $this->getEscontrib(),
			$keys[50] => $this->getCodedo(),
			$keys[51] => $this->getFatipcteId(),
			$keys[52] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaclientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setRifpro($value);
				break;
			case 3:
				$this->setNitpro($value);
				break;
			case 4:
				$this->setDirpro($value);
				break;
			case 5:
				$this->setTelpro($value);
				break;
			case 6:
				$this->setFaxpro($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setLimcre($value);
				break;
			case 9:
				$this->setCodcta($value);
				break;
			case 10:
				$this->setRegmer($value);
				break;
			case 11:
				$this->setFecreg($value);
				break;
			case 12:
				$this->setTomreg($value);
				break;
			case 13:
				$this->setFolreg($value);
				break;
			case 14:
				$this->setCapsus($value);
				break;
			case 15:
				$this->setCappag($value);
				break;
			case 16:
				$this->setRifrepleg($value);
				break;
			case 17:
				$this->setNomrepleg($value);
				break;
			case 18:
				$this->setDirrepleg($value);
				break;
			case 19:
				$this->setNrocei($value);
				break;
			case 20:
				$this->setCodram($value);
				break;
			case 21:
				$this->setFecinscir($value);
				break;
			case 22:
				$this->setNuminscir($value);
				break;
			case 23:
				$this->setNacpro($value);
				break;
			case 24:
				$this->setCodord($value);
				break;
			case 25:
				$this->setCodpercon($value);
				break;
			case 26:
				$this->setCodtiprec($value);
				break;
			case 27:
				$this->setCodordadi($value);
				break;
			case 28:
				$this->setCodperconadi($value);
				break;
			case 29:
				$this->setTipo($value);
				break;
			case 30:
				$this->setFecven($value);
				break;
			case 31:
				$this->setCiudad($value);
				break;
			case 32:
				$this->setCodordmercon($value);
				break;
			case 33:
				$this->setCodpermercon($value);
				break;
			case 34:
				$this->setCodordcontra($value);
				break;
			case 35:
				$this->setCodpercontra($value);
				break;
			case 36:
				$this->setTemcodpro($value);
				break;
			case 37:
				$this->setTemrifpro($value);
				break;
			case 38:
				$this->setCodctasec($value);
				break;
			case 39:
				$this->setCodtipemp($value);
				break;
			case 40:
				$this->setTipper($value);
				break;
			case 41:
				$this->setPagweb($value);
				break;
			case 42:
				$this->setTelrepleg($value);
				break;
			case 43:
				$this->setCorrepleg($value);
				break;
			case 44:
				$this->setRifpercon($value);
				break;
			case 45:
				$this->setNompercon($value);
				break;
			case 46:
				$this->setDirpercon($value);
				break;
			case 47:
				$this->setTelpercon($value);
				break;
			case 48:
				$this->setCorpercon($value);
				break;
			case 49:
				$this->setEscontrib($value);
				break;
			case 50:
				$this->setCodedo($value);
				break;
			case 51:
				$this->setFatipcteId($value);
				break;
			case 52:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaclientePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNitpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelpro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFaxpro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLimcre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcta($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRegmer($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecreg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTomreg($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFolreg($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCapsus($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCappag($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setRifrepleg($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNomrepleg($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDirrepleg($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNrocei($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodram($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecinscir($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNuminscir($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNacpro($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodord($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodpercon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodtiprec($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodordadi($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodperconadi($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipo($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecven($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCiudad($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodordmercon($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodpermercon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCodordcontra($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodpercontra($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTemcodpro($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setTemrifpro($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCodctasec($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCodtipemp($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setTipper($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setPagweb($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setTelrepleg($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCorrepleg($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setRifpercon($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setNompercon($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setDirpercon($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setTelpercon($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setCorpercon($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setEscontrib($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setCodedo($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setFatipcteId($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setId($arr[$keys[52]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaclientePeer::DATABASE_NAME);

		if ($this->isColumnModified(FaclientePeer::CODPRO)) $criteria->add(FaclientePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FaclientePeer::NOMPRO)) $criteria->add(FaclientePeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(FaclientePeer::RIFPRO)) $criteria->add(FaclientePeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(FaclientePeer::NITPRO)) $criteria->add(FaclientePeer::NITPRO, $this->nitpro);
		if ($this->isColumnModified(FaclientePeer::DIRPRO)) $criteria->add(FaclientePeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(FaclientePeer::TELPRO)) $criteria->add(FaclientePeer::TELPRO, $this->telpro);
		if ($this->isColumnModified(FaclientePeer::FAXPRO)) $criteria->add(FaclientePeer::FAXPRO, $this->faxpro);
		if ($this->isColumnModified(FaclientePeer::EMAIL)) $criteria->add(FaclientePeer::EMAIL, $this->email);
		if ($this->isColumnModified(FaclientePeer::LIMCRE)) $criteria->add(FaclientePeer::LIMCRE, $this->limcre);
		if ($this->isColumnModified(FaclientePeer::CODCTA)) $criteria->add(FaclientePeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(FaclientePeer::REGMER)) $criteria->add(FaclientePeer::REGMER, $this->regmer);
		if ($this->isColumnModified(FaclientePeer::FECREG)) $criteria->add(FaclientePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FaclientePeer::TOMREG)) $criteria->add(FaclientePeer::TOMREG, $this->tomreg);
		if ($this->isColumnModified(FaclientePeer::FOLREG)) $criteria->add(FaclientePeer::FOLREG, $this->folreg);
		if ($this->isColumnModified(FaclientePeer::CAPSUS)) $criteria->add(FaclientePeer::CAPSUS, $this->capsus);
		if ($this->isColumnModified(FaclientePeer::CAPPAG)) $criteria->add(FaclientePeer::CAPPAG, $this->cappag);
		if ($this->isColumnModified(FaclientePeer::RIFREPLEG)) $criteria->add(FaclientePeer::RIFREPLEG, $this->rifrepleg);
		if ($this->isColumnModified(FaclientePeer::NOMREPLEG)) $criteria->add(FaclientePeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(FaclientePeer::DIRREPLEG)) $criteria->add(FaclientePeer::DIRREPLEG, $this->dirrepleg);
		if ($this->isColumnModified(FaclientePeer::NROCEI)) $criteria->add(FaclientePeer::NROCEI, $this->nrocei);
		if ($this->isColumnModified(FaclientePeer::CODRAM)) $criteria->add(FaclientePeer::CODRAM, $this->codram);
		if ($this->isColumnModified(FaclientePeer::FECINSCIR)) $criteria->add(FaclientePeer::FECINSCIR, $this->fecinscir);
		if ($this->isColumnModified(FaclientePeer::NUMINSCIR)) $criteria->add(FaclientePeer::NUMINSCIR, $this->numinscir);
		if ($this->isColumnModified(FaclientePeer::NACPRO)) $criteria->add(FaclientePeer::NACPRO, $this->nacpro);
		if ($this->isColumnModified(FaclientePeer::CODORD)) $criteria->add(FaclientePeer::CODORD, $this->codord);
		if ($this->isColumnModified(FaclientePeer::CODPERCON)) $criteria->add(FaclientePeer::CODPERCON, $this->codpercon);
		if ($this->isColumnModified(FaclientePeer::CODTIPREC)) $criteria->add(FaclientePeer::CODTIPREC, $this->codtiprec);
		if ($this->isColumnModified(FaclientePeer::CODORDADI)) $criteria->add(FaclientePeer::CODORDADI, $this->codordadi);
		if ($this->isColumnModified(FaclientePeer::CODPERCONADI)) $criteria->add(FaclientePeer::CODPERCONADI, $this->codperconadi);
		if ($this->isColumnModified(FaclientePeer::TIPO)) $criteria->add(FaclientePeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FaclientePeer::FECVEN)) $criteria->add(FaclientePeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FaclientePeer::CIUDAD)) $criteria->add(FaclientePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(FaclientePeer::CODORDMERCON)) $criteria->add(FaclientePeer::CODORDMERCON, $this->codordmercon);
		if ($this->isColumnModified(FaclientePeer::CODPERMERCON)) $criteria->add(FaclientePeer::CODPERMERCON, $this->codpermercon);
		if ($this->isColumnModified(FaclientePeer::CODORDCONTRA)) $criteria->add(FaclientePeer::CODORDCONTRA, $this->codordcontra);
		if ($this->isColumnModified(FaclientePeer::CODPERCONTRA)) $criteria->add(FaclientePeer::CODPERCONTRA, $this->codpercontra);
		if ($this->isColumnModified(FaclientePeer::TEMCODPRO)) $criteria->add(FaclientePeer::TEMCODPRO, $this->temcodpro);
		if ($this->isColumnModified(FaclientePeer::TEMRIFPRO)) $criteria->add(FaclientePeer::TEMRIFPRO, $this->temrifpro);
		if ($this->isColumnModified(FaclientePeer::CODCTASEC)) $criteria->add(FaclientePeer::CODCTASEC, $this->codctasec);
		if ($this->isColumnModified(FaclientePeer::CODTIPEMP)) $criteria->add(FaclientePeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(FaclientePeer::TIPPER)) $criteria->add(FaclientePeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(FaclientePeer::PAGWEB)) $criteria->add(FaclientePeer::PAGWEB, $this->pagweb);
		if ($this->isColumnModified(FaclientePeer::TELREPLEG)) $criteria->add(FaclientePeer::TELREPLEG, $this->telrepleg);
		if ($this->isColumnModified(FaclientePeer::CORREPLEG)) $criteria->add(FaclientePeer::CORREPLEG, $this->correpleg);
		if ($this->isColumnModified(FaclientePeer::RIFPERCON)) $criteria->add(FaclientePeer::RIFPERCON, $this->rifpercon);
		if ($this->isColumnModified(FaclientePeer::NOMPERCON)) $criteria->add(FaclientePeer::NOMPERCON, $this->nompercon);
		if ($this->isColumnModified(FaclientePeer::DIRPERCON)) $criteria->add(FaclientePeer::DIRPERCON, $this->dirpercon);
		if ($this->isColumnModified(FaclientePeer::TELPERCON)) $criteria->add(FaclientePeer::TELPERCON, $this->telpercon);
		if ($this->isColumnModified(FaclientePeer::CORPERCON)) $criteria->add(FaclientePeer::CORPERCON, $this->corpercon);
		if ($this->isColumnModified(FaclientePeer::ESCONTRIB)) $criteria->add(FaclientePeer::ESCONTRIB, $this->escontrib);
		if ($this->isColumnModified(FaclientePeer::CODEDO)) $criteria->add(FaclientePeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FaclientePeer::FATIPCTE_ID)) $criteria->add(FaclientePeer::FATIPCTE_ID, $this->fatipcte_id);
		if ($this->isColumnModified(FaclientePeer::ID)) $criteria->add(FaclientePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaclientePeer::DATABASE_NAME);

		$criteria->add(FaclientePeer::ID, $this->id);

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

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setNitpro($this->nitpro);

		$copyObj->setDirpro($this->dirpro);

		$copyObj->setTelpro($this->telpro);

		$copyObj->setFaxpro($this->faxpro);

		$copyObj->setEmail($this->email);

		$copyObj->setLimcre($this->limcre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setRegmer($this->regmer);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setTomreg($this->tomreg);

		$copyObj->setFolreg($this->folreg);

		$copyObj->setCapsus($this->capsus);

		$copyObj->setCappag($this->cappag);

		$copyObj->setRifrepleg($this->rifrepleg);

		$copyObj->setNomrepleg($this->nomrepleg);

		$copyObj->setDirrepleg($this->dirrepleg);

		$copyObj->setNrocei($this->nrocei);

		$copyObj->setCodram($this->codram);

		$copyObj->setFecinscir($this->fecinscir);

		$copyObj->setNuminscir($this->numinscir);

		$copyObj->setNacpro($this->nacpro);

		$copyObj->setCodord($this->codord);

		$copyObj->setCodpercon($this->codpercon);

		$copyObj->setCodtiprec($this->codtiprec);

		$copyObj->setCodordadi($this->codordadi);

		$copyObj->setCodperconadi($this->codperconadi);

		$copyObj->setTipo($this->tipo);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodordmercon($this->codordmercon);

		$copyObj->setCodpermercon($this->codpermercon);

		$copyObj->setCodordcontra($this->codordcontra);

		$copyObj->setCodpercontra($this->codpercontra);

		$copyObj->setTemcodpro($this->temcodpro);

		$copyObj->setTemrifpro($this->temrifpro);

		$copyObj->setCodctasec($this->codctasec);

		$copyObj->setCodtipemp($this->codtipemp);

		$copyObj->setTipper($this->tipper);

		$copyObj->setPagweb($this->pagweb);

		$copyObj->setTelrepleg($this->telrepleg);

		$copyObj->setCorrepleg($this->correpleg);

		$copyObj->setRifpercon($this->rifpercon);

		$copyObj->setNompercon($this->nompercon);

		$copyObj->setDirpercon($this->dirpercon);

		$copyObj->setTelpercon($this->telpercon);

		$copyObj->setCorpercon($this->corpercon);

		$copyObj->setEscontrib($this->escontrib);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setFatipcteId($this->fatipcte_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFarecpros() as $relObj) {
				$copyObj->addFarecpro($relObj->copy($deepCopy));
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
			self::$peer = new FaclientePeer();
		}
		return self::$peer;
	}

	
	public function setFatipcte($v)
	{


		if ($v === null) {
			$this->setFatipcteId(NULL);
		} else {
			$this->setFatipcteId($v->getId());
		}


		$this->aFatipcte = $v;
	}


	
	public function getFatipcte($con = null)
	{
		if ($this->aFatipcte === null && ($this->fatipcte_id !== null)) {
						include_once 'lib/model/om/BaseFatipctePeer.php';

      $c = new Criteria();
      $c->add(FatipctePeer::ID,$this->fatipcte_id);
      
			$this->aFatipcte = FatipctePeer::doSelectOne($c, $con);

			
		}
		return $this->aFatipcte;
	}

	
	public function initFarecpros()
	{
		if ($this->collFarecpros === null) {
			$this->collFarecpros = array();
		}
	}

	
	public function getFarecpros($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFarecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFarecpros === null) {
			if ($this->isNew()) {
			   $this->collFarecpros = array();
			} else {

				$criteria->add(FarecproPeer::CODPRO, $this->getCodpro());

				FarecproPeer::addSelectColumns($criteria);
				$this->collFarecpros = FarecproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FarecproPeer::CODPRO, $this->getCodpro());

				FarecproPeer::addSelectColumns($criteria);
				if (!isset($this->lastFarecproCriteria) || !$this->lastFarecproCriteria->equals($criteria)) {
					$this->collFarecpros = FarecproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFarecproCriteria = $criteria;
		return $this->collFarecpros;
	}

	
	public function countFarecpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFarecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FarecproPeer::CODPRO, $this->getCodpro());

		return FarecproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFarecpro(Farecpro $l)
	{
		$this->collFarecpros[] = $l;
		$l->setFacliente($this);
	}


	
	public function getFarecprosJoinCarecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFarecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFarecpros === null) {
			if ($this->isNew()) {
				$this->collFarecpros = array();
			} else {

				$criteria->add(FarecproPeer::CODPRO, $this->getCodpro());

				$this->collFarecpros = FarecproPeer::doSelectJoinCarecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(FarecproPeer::CODPRO, $this->getCodpro());

			if (!isset($this->lastFarecproCriteria) || !$this->lastFarecproCriteria->equals($criteria)) {
				$this->collFarecpros = FarecproPeer::doSelectJoinCarecaud($criteria, $con);
			}
		}
		$this->lastFarecproCriteria = $criteria;

		return $this->collFarecpros;
	}

} 