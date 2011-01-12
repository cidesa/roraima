<?php


abstract class BaseCaprovee extends BaseObject  implements Persistent {


	
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


	
	protected $telrepleg;


	
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


	
	protected $ramgen;


	
	protected $estpro;


	
	protected $codban;


	
	protected $numcue;


	
	protected $codtip;


	
	protected $id;

	
	protected $collCarecpros;

	
	protected $lastCarecproCriteria = null;

	
	protected $collCaordcoms;

	
	protected $lastCaordcomCriteria = null;

	
	protected $collCacotizas;

	
	protected $lastCacotizaCriteria = null;

	
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
  
  public function getTelrepleg()
  {

    return trim($this->telrepleg);

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
  
  public function getRamgen()
  {

    return trim($this->ramgen);

  }
  
  public function getEstpro()
  {

    return trim($this->estpro);

  }
  
  public function getCodban()
  {

    return trim($this->codban);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CaproveePeer::CODPRO;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = CaproveePeer::NOMPRO;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = CaproveePeer::RIFPRO;
      }
  
	} 
	
	public function setNitpro($v)
	{

    if ($this->nitpro !== $v) {
        $this->nitpro = $v;
        $this->modifiedColumns[] = CaproveePeer::NITPRO;
      }
  
	} 
	
	public function setDirpro($v)
	{

    if ($this->dirpro !== $v) {
        $this->dirpro = $v;
        $this->modifiedColumns[] = CaproveePeer::DIRPRO;
      }
  
	} 
	
	public function setTelpro($v)
	{

    if ($this->telpro !== $v) {
        $this->telpro = $v;
        $this->modifiedColumns[] = CaproveePeer::TELPRO;
      }
  
	} 
	
	public function setFaxpro($v)
	{

    if ($this->faxpro !== $v) {
        $this->faxpro = $v;
        $this->modifiedColumns[] = CaproveePeer::FAXPRO;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = CaproveePeer::EMAIL;
      }
  
	} 
	
	public function setLimcre($v)
	{

    if ($this->limcre !== $v) {
        $this->limcre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaproveePeer::LIMCRE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CaproveePeer::CODCTA;
      }
  
	} 
	
	public function setRegmer($v)
	{

    if ($this->regmer !== $v) {
        $this->regmer = $v;
        $this->modifiedColumns[] = CaproveePeer::REGMER;
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
      $this->modifiedColumns[] = CaproveePeer::FECREG;
    }

	} 
	
	public function setTomreg($v)
	{

    if ($this->tomreg !== $v) {
        $this->tomreg = $v;
        $this->modifiedColumns[] = CaproveePeer::TOMREG;
      }
  
	} 
	
	public function setFolreg($v)
	{

    if ($this->folreg !== $v) {
        $this->folreg = $v;
        $this->modifiedColumns[] = CaproveePeer::FOLREG;
      }
  
	} 
	
	public function setCapsus($v)
	{

    if ($this->capsus !== $v) {
        $this->capsus = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaproveePeer::CAPSUS;
      }
  
	} 
	
	public function setCappag($v)
	{

    if ($this->cappag !== $v) {
        $this->cappag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaproveePeer::CAPPAG;
      }
  
	} 
	
	public function setRifrepleg($v)
	{

    if ($this->rifrepleg !== $v) {
        $this->rifrepleg = $v;
        $this->modifiedColumns[] = CaproveePeer::RIFREPLEG;
      }
  
	} 
	
	public function setNomrepleg($v)
	{

    if ($this->nomrepleg !== $v) {
        $this->nomrepleg = $v;
        $this->modifiedColumns[] = CaproveePeer::NOMREPLEG;
      }
  
	} 
	
	public function setDirrepleg($v)
	{

    if ($this->dirrepleg !== $v) {
        $this->dirrepleg = $v;
        $this->modifiedColumns[] = CaproveePeer::DIRREPLEG;
      }
  
	} 
	
	public function setTelrepleg($v)
	{

    if ($this->telrepleg !== $v) {
        $this->telrepleg = $v;
        $this->modifiedColumns[] = CaproveePeer::TELREPLEG;
      }
  
	} 
	
	public function setNrocei($v)
	{

    if ($this->nrocei !== $v) {
        $this->nrocei = $v;
        $this->modifiedColumns[] = CaproveePeer::NROCEI;
      }
  
	} 
	
	public function setCodram($v)
	{

    if ($this->codram !== $v) {
        $this->codram = $v;
        $this->modifiedColumns[] = CaproveePeer::CODRAM;
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
      $this->modifiedColumns[] = CaproveePeer::FECINSCIR;
    }

	} 
	
	public function setNuminscir($v)
	{

    if ($this->numinscir !== $v) {
        $this->numinscir = $v;
        $this->modifiedColumns[] = CaproveePeer::NUMINSCIR;
      }
  
	} 
	
	public function setNacpro($v)
	{

    if ($this->nacpro !== $v) {
        $this->nacpro = $v;
        $this->modifiedColumns[] = CaproveePeer::NACPRO;
      }
  
	} 
	
	public function setCodord($v)
	{

    if ($this->codord !== $v) {
        $this->codord = $v;
        $this->modifiedColumns[] = CaproveePeer::CODORD;
      }
  
	} 
	
	public function setCodpercon($v)
	{

    if ($this->codpercon !== $v) {
        $this->codpercon = $v;
        $this->modifiedColumns[] = CaproveePeer::CODPERCON;
      }
  
	} 
	
	public function setCodtiprec($v)
	{

    if ($this->codtiprec !== $v) {
        $this->codtiprec = $v;
        $this->modifiedColumns[] = CaproveePeer::CODTIPREC;
      }
  
	} 
	
	public function setCodordadi($v)
	{

    if ($this->codordadi !== $v) {
        $this->codordadi = $v;
        $this->modifiedColumns[] = CaproveePeer::CODORDADI;
      }
  
	} 
	
	public function setCodperconadi($v)
	{

    if ($this->codperconadi !== $v) {
        $this->codperconadi = $v;
        $this->modifiedColumns[] = CaproveePeer::CODPERCONADI;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = CaproveePeer::TIPO;
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
      $this->modifiedColumns[] = CaproveePeer::FECVEN;
    }

	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = CaproveePeer::CIUDAD;
      }
  
	} 
	
	public function setCodordmercon($v)
	{

    if ($this->codordmercon !== $v) {
        $this->codordmercon = $v;
        $this->modifiedColumns[] = CaproveePeer::CODORDMERCON;
      }
  
	} 
	
	public function setCodpermercon($v)
	{

    if ($this->codpermercon !== $v) {
        $this->codpermercon = $v;
        $this->modifiedColumns[] = CaproveePeer::CODPERMERCON;
      }
  
	} 
	
	public function setCodordcontra($v)
	{

    if ($this->codordcontra !== $v) {
        $this->codordcontra = $v;
        $this->modifiedColumns[] = CaproveePeer::CODORDCONTRA;
      }
  
	} 
	
	public function setCodpercontra($v)
	{

    if ($this->codpercontra !== $v) {
        $this->codpercontra = $v;
        $this->modifiedColumns[] = CaproveePeer::CODPERCONTRA;
      }
  
	} 
	
	public function setTemcodpro($v)
	{

    if ($this->temcodpro !== $v) {
        $this->temcodpro = $v;
        $this->modifiedColumns[] = CaproveePeer::TEMCODPRO;
      }
  
	} 
	
	public function setTemrifpro($v)
	{

    if ($this->temrifpro !== $v) {
        $this->temrifpro = $v;
        $this->modifiedColumns[] = CaproveePeer::TEMRIFPRO;
      }
  
	} 
	
	public function setCodctasec($v)
	{

    if ($this->codctasec !== $v) {
        $this->codctasec = $v;
        $this->modifiedColumns[] = CaproveePeer::CODCTASEC;
      }
  
	} 
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = CaproveePeer::CODTIPEMP;
      }
  
	} 
	
	public function setRamgen($v)
	{

    if ($this->ramgen !== $v) {
        $this->ramgen = $v;
        $this->modifiedColumns[] = CaproveePeer::RAMGEN;
      }
  
	} 
	
	public function setEstpro($v)
	{

    if ($this->estpro !== $v) {
        $this->estpro = $v;
        $this->modifiedColumns[] = CaproveePeer::ESTPRO;
      }
  
	} 
	
	public function setCodban($v)
	{

    if ($this->codban !== $v) {
        $this->codban = $v;
        $this->modifiedColumns[] = CaproveePeer::CODBAN;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CaproveePeer::NUMCUE;
      }
  
	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = CaproveePeer::CODTIP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaproveePeer::ID;
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

      $this->telrepleg = $rs->getString($startcol + 19);

      $this->nrocei = $rs->getString($startcol + 20);

      $this->codram = $rs->getString($startcol + 21);

      $this->fecinscir = $rs->getDate($startcol + 22, null);

      $this->numinscir = $rs->getString($startcol + 23);

      $this->nacpro = $rs->getString($startcol + 24);

      $this->codord = $rs->getString($startcol + 25);

      $this->codpercon = $rs->getString($startcol + 26);

      $this->codtiprec = $rs->getString($startcol + 27);

      $this->codordadi = $rs->getString($startcol + 28);

      $this->codperconadi = $rs->getString($startcol + 29);

      $this->tipo = $rs->getString($startcol + 30);

      $this->fecven = $rs->getDate($startcol + 31, null);

      $this->ciudad = $rs->getString($startcol + 32);

      $this->codordmercon = $rs->getString($startcol + 33);

      $this->codpermercon = $rs->getString($startcol + 34);

      $this->codordcontra = $rs->getString($startcol + 35);

      $this->codpercontra = $rs->getString($startcol + 36);

      $this->temcodpro = $rs->getString($startcol + 37);

      $this->temrifpro = $rs->getString($startcol + 38);

      $this->codctasec = $rs->getString($startcol + 39);

      $this->codtipemp = $rs->getString($startcol + 40);

      $this->ramgen = $rs->getString($startcol + 41);

      $this->estpro = $rs->getString($startcol + 42);

      $this->codban = $rs->getString($startcol + 43);

      $this->numcue = $rs->getString($startcol + 44);

      $this->codtip = $rs->getString($startcol + 45);

      $this->id = $rs->getInt($startcol + 46);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 47; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caprovee object", $e);
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
			$con = Propel::getConnection(CaproveePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaproveePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaproveePeer::DATABASE_NAME);
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
					$pk = CaproveePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaproveePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCarecpros !== null) {
				foreach($this->collCarecpros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCaordcoms !== null) {
				foreach($this->collCaordcoms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCacotizas !== null) {
				foreach($this->collCacotizas as $referrerFK) {
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


			if (($retval = CaproveePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCarecpros !== null) {
					foreach($this->collCarecpros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCaordcoms !== null) {
					foreach($this->collCaordcoms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCacotizas !== null) {
					foreach($this->collCacotizas as $referrerFK) {
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
		$pos = CaproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTelrepleg();
				break;
			case 20:
				return $this->getNrocei();
				break;
			case 21:
				return $this->getCodram();
				break;
			case 22:
				return $this->getFecinscir();
				break;
			case 23:
				return $this->getNuminscir();
				break;
			case 24:
				return $this->getNacpro();
				break;
			case 25:
				return $this->getCodord();
				break;
			case 26:
				return $this->getCodpercon();
				break;
			case 27:
				return $this->getCodtiprec();
				break;
			case 28:
				return $this->getCodordadi();
				break;
			case 29:
				return $this->getCodperconadi();
				break;
			case 30:
				return $this->getTipo();
				break;
			case 31:
				return $this->getFecven();
				break;
			case 32:
				return $this->getCiudad();
				break;
			case 33:
				return $this->getCodordmercon();
				break;
			case 34:
				return $this->getCodpermercon();
				break;
			case 35:
				return $this->getCodordcontra();
				break;
			case 36:
				return $this->getCodpercontra();
				break;
			case 37:
				return $this->getTemcodpro();
				break;
			case 38:
				return $this->getTemrifpro();
				break;
			case 39:
				return $this->getCodctasec();
				break;
			case 40:
				return $this->getCodtipemp();
				break;
			case 41:
				return $this->getRamgen();
				break;
			case 42:
				return $this->getEstpro();
				break;
			case 43:
				return $this->getCodban();
				break;
			case 44:
				return $this->getNumcue();
				break;
			case 45:
				return $this->getCodtip();
				break;
			case 46:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaproveePeer::getFieldNames($keyType);
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
			$keys[19] => $this->getTelrepleg(),
			$keys[20] => $this->getNrocei(),
			$keys[21] => $this->getCodram(),
			$keys[22] => $this->getFecinscir(),
			$keys[23] => $this->getNuminscir(),
			$keys[24] => $this->getNacpro(),
			$keys[25] => $this->getCodord(),
			$keys[26] => $this->getCodpercon(),
			$keys[27] => $this->getCodtiprec(),
			$keys[28] => $this->getCodordadi(),
			$keys[29] => $this->getCodperconadi(),
			$keys[30] => $this->getTipo(),
			$keys[31] => $this->getFecven(),
			$keys[32] => $this->getCiudad(),
			$keys[33] => $this->getCodordmercon(),
			$keys[34] => $this->getCodpermercon(),
			$keys[35] => $this->getCodordcontra(),
			$keys[36] => $this->getCodpercontra(),
			$keys[37] => $this->getTemcodpro(),
			$keys[38] => $this->getTemrifpro(),
			$keys[39] => $this->getCodctasec(),
			$keys[40] => $this->getCodtipemp(),
			$keys[41] => $this->getRamgen(),
			$keys[42] => $this->getEstpro(),
			$keys[43] => $this->getCodban(),
			$keys[44] => $this->getNumcue(),
			$keys[45] => $this->getCodtip(),
			$keys[46] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTelrepleg($value);
				break;
			case 20:
				$this->setNrocei($value);
				break;
			case 21:
				$this->setCodram($value);
				break;
			case 22:
				$this->setFecinscir($value);
				break;
			case 23:
				$this->setNuminscir($value);
				break;
			case 24:
				$this->setNacpro($value);
				break;
			case 25:
				$this->setCodord($value);
				break;
			case 26:
				$this->setCodpercon($value);
				break;
			case 27:
				$this->setCodtiprec($value);
				break;
			case 28:
				$this->setCodordadi($value);
				break;
			case 29:
				$this->setCodperconadi($value);
				break;
			case 30:
				$this->setTipo($value);
				break;
			case 31:
				$this->setFecven($value);
				break;
			case 32:
				$this->setCiudad($value);
				break;
			case 33:
				$this->setCodordmercon($value);
				break;
			case 34:
				$this->setCodpermercon($value);
				break;
			case 35:
				$this->setCodordcontra($value);
				break;
			case 36:
				$this->setCodpercontra($value);
				break;
			case 37:
				$this->setTemcodpro($value);
				break;
			case 38:
				$this->setTemrifpro($value);
				break;
			case 39:
				$this->setCodctasec($value);
				break;
			case 40:
				$this->setCodtipemp($value);
				break;
			case 41:
				$this->setRamgen($value);
				break;
			case 42:
				$this->setEstpro($value);
				break;
			case 43:
				$this->setCodban($value);
				break;
			case 44:
				$this->setNumcue($value);
				break;
			case 45:
				$this->setCodtip($value);
				break;
			case 46:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaproveePeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[19], $arr)) $this->setTelrepleg($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNrocei($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodram($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecinscir($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNuminscir($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNacpro($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodord($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodpercon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodtiprec($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodordadi($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCodperconadi($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setTipo($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setFecven($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCiudad($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodordmercon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCodpermercon($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodordcontra($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCodpercontra($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setTemcodpro($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setTemrifpro($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCodctasec($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCodtipemp($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setRamgen($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setEstpro($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCodban($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setNumcue($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setCodtip($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setId($arr[$keys[46]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaproveePeer::DATABASE_NAME);

		if ($this->isColumnModified(CaproveePeer::CODPRO)) $criteria->add(CaproveePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaproveePeer::NOMPRO)) $criteria->add(CaproveePeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(CaproveePeer::RIFPRO)) $criteria->add(CaproveePeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(CaproveePeer::NITPRO)) $criteria->add(CaproveePeer::NITPRO, $this->nitpro);
		if ($this->isColumnModified(CaproveePeer::DIRPRO)) $criteria->add(CaproveePeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(CaproveePeer::TELPRO)) $criteria->add(CaproveePeer::TELPRO, $this->telpro);
		if ($this->isColumnModified(CaproveePeer::FAXPRO)) $criteria->add(CaproveePeer::FAXPRO, $this->faxpro);
		if ($this->isColumnModified(CaproveePeer::EMAIL)) $criteria->add(CaproveePeer::EMAIL, $this->email);
		if ($this->isColumnModified(CaproveePeer::LIMCRE)) $criteria->add(CaproveePeer::LIMCRE, $this->limcre);
		if ($this->isColumnModified(CaproveePeer::CODCTA)) $criteria->add(CaproveePeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CaproveePeer::REGMER)) $criteria->add(CaproveePeer::REGMER, $this->regmer);
		if ($this->isColumnModified(CaproveePeer::FECREG)) $criteria->add(CaproveePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CaproveePeer::TOMREG)) $criteria->add(CaproveePeer::TOMREG, $this->tomreg);
		if ($this->isColumnModified(CaproveePeer::FOLREG)) $criteria->add(CaproveePeer::FOLREG, $this->folreg);
		if ($this->isColumnModified(CaproveePeer::CAPSUS)) $criteria->add(CaproveePeer::CAPSUS, $this->capsus);
		if ($this->isColumnModified(CaproveePeer::CAPPAG)) $criteria->add(CaproveePeer::CAPPAG, $this->cappag);
		if ($this->isColumnModified(CaproveePeer::RIFREPLEG)) $criteria->add(CaproveePeer::RIFREPLEG, $this->rifrepleg);
		if ($this->isColumnModified(CaproveePeer::NOMREPLEG)) $criteria->add(CaproveePeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(CaproveePeer::DIRREPLEG)) $criteria->add(CaproveePeer::DIRREPLEG, $this->dirrepleg);
		if ($this->isColumnModified(CaproveePeer::TELREPLEG)) $criteria->add(CaproveePeer::TELREPLEG, $this->telrepleg);
		if ($this->isColumnModified(CaproveePeer::NROCEI)) $criteria->add(CaproveePeer::NROCEI, $this->nrocei);
		if ($this->isColumnModified(CaproveePeer::CODRAM)) $criteria->add(CaproveePeer::CODRAM, $this->codram);
		if ($this->isColumnModified(CaproveePeer::FECINSCIR)) $criteria->add(CaproveePeer::FECINSCIR, $this->fecinscir);
		if ($this->isColumnModified(CaproveePeer::NUMINSCIR)) $criteria->add(CaproveePeer::NUMINSCIR, $this->numinscir);
		if ($this->isColumnModified(CaproveePeer::NACPRO)) $criteria->add(CaproveePeer::NACPRO, $this->nacpro);
		if ($this->isColumnModified(CaproveePeer::CODORD)) $criteria->add(CaproveePeer::CODORD, $this->codord);
		if ($this->isColumnModified(CaproveePeer::CODPERCON)) $criteria->add(CaproveePeer::CODPERCON, $this->codpercon);
		if ($this->isColumnModified(CaproveePeer::CODTIPREC)) $criteria->add(CaproveePeer::CODTIPREC, $this->codtiprec);
		if ($this->isColumnModified(CaproveePeer::CODORDADI)) $criteria->add(CaproveePeer::CODORDADI, $this->codordadi);
		if ($this->isColumnModified(CaproveePeer::CODPERCONADI)) $criteria->add(CaproveePeer::CODPERCONADI, $this->codperconadi);
		if ($this->isColumnModified(CaproveePeer::TIPO)) $criteria->add(CaproveePeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CaproveePeer::FECVEN)) $criteria->add(CaproveePeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CaproveePeer::CIUDAD)) $criteria->add(CaproveePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(CaproveePeer::CODORDMERCON)) $criteria->add(CaproveePeer::CODORDMERCON, $this->codordmercon);
		if ($this->isColumnModified(CaproveePeer::CODPERMERCON)) $criteria->add(CaproveePeer::CODPERMERCON, $this->codpermercon);
		if ($this->isColumnModified(CaproveePeer::CODORDCONTRA)) $criteria->add(CaproveePeer::CODORDCONTRA, $this->codordcontra);
		if ($this->isColumnModified(CaproveePeer::CODPERCONTRA)) $criteria->add(CaproveePeer::CODPERCONTRA, $this->codpercontra);
		if ($this->isColumnModified(CaproveePeer::TEMCODPRO)) $criteria->add(CaproveePeer::TEMCODPRO, $this->temcodpro);
		if ($this->isColumnModified(CaproveePeer::TEMRIFPRO)) $criteria->add(CaproveePeer::TEMRIFPRO, $this->temrifpro);
		if ($this->isColumnModified(CaproveePeer::CODCTASEC)) $criteria->add(CaproveePeer::CODCTASEC, $this->codctasec);
		if ($this->isColumnModified(CaproveePeer::CODTIPEMP)) $criteria->add(CaproveePeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(CaproveePeer::RAMGEN)) $criteria->add(CaproveePeer::RAMGEN, $this->ramgen);
		if ($this->isColumnModified(CaproveePeer::ESTPRO)) $criteria->add(CaproveePeer::ESTPRO, $this->estpro);
		if ($this->isColumnModified(CaproveePeer::CODBAN)) $criteria->add(CaproveePeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CaproveePeer::NUMCUE)) $criteria->add(CaproveePeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CaproveePeer::CODTIP)) $criteria->add(CaproveePeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(CaproveePeer::ID)) $criteria->add(CaproveePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaproveePeer::DATABASE_NAME);

		$criteria->add(CaproveePeer::ID, $this->id);

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

		$copyObj->setTelrepleg($this->telrepleg);

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

		$copyObj->setRamgen($this->ramgen);

		$copyObj->setEstpro($this->estpro);

		$copyObj->setCodban($this->codban);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCodtip($this->codtip);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCarecpros() as $relObj) {
				$copyObj->addCarecpro($relObj->copy($deepCopy));
			}

			foreach($this->getCaordcoms() as $relObj) {
				$copyObj->addCaordcom($relObj->copy($deepCopy));
			}

			foreach($this->getCacotizas() as $relObj) {
				$copyObj->addCacotiza($relObj->copy($deepCopy));
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
			self::$peer = new CaproveePeer();
		}
		return self::$peer;
	}

	
	public function initCarecpros()
	{
		if ($this->collCarecpros === null) {
			$this->collCarecpros = array();
		}
	}

	
	public function getCarecpros($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCarecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCarecpros === null) {
			if ($this->isNew()) {
			   $this->collCarecpros = array();
			} else {

				$criteria->add(CarecproPeer::CODPRO, $this->getCodpro());

				CarecproPeer::addSelectColumns($criteria);
				$this->collCarecpros = CarecproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CarecproPeer::CODPRO, $this->getCodpro());

				CarecproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCarecproCriteria) || !$this->lastCarecproCriteria->equals($criteria)) {
					$this->collCarecpros = CarecproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCarecproCriteria = $criteria;
		return $this->collCarecpros;
	}

	
	public function countCarecpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCarecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CarecproPeer::CODPRO, $this->getCodpro());

		return CarecproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCarecpro(Carecpro $l)
	{
		$this->collCarecpros[] = $l;
		$l->setCaprovee($this);
	}


	
	public function getCarecprosJoinCarecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCarecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCarecpros === null) {
			if ($this->isNew()) {
				$this->collCarecpros = array();
			} else {

				$criteria->add(CarecproPeer::CODPRO, $this->getCodpro());

				$this->collCarecpros = CarecproPeer::doSelectJoinCarecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CarecproPeer::CODPRO, $this->getCodpro());

			if (!isset($this->lastCarecproCriteria) || !$this->lastCarecproCriteria->equals($criteria)) {
				$this->collCarecpros = CarecproPeer::doSelectJoinCarecaud($criteria, $con);
			}
		}
		$this->lastCarecproCriteria = $criteria;

		return $this->collCarecpros;
	}

	
	public function initCaordcoms()
	{
		if ($this->collCaordcoms === null) {
			$this->collCaordcoms = array();
		}
	}

	
	public function getCaordcoms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
			   $this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

				CaordcomPeer::addSelectColumns($criteria);
				$this->collCaordcoms = CaordcomPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

				CaordcomPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
					$this->collCaordcoms = CaordcomPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaordcomCriteria = $criteria;
		return $this->collCaordcoms;
	}

	
	public function countCaordcoms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

		return CaordcomPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaordcom(Caordcom $l)
	{
		$this->collCaordcoms[] = $l;
		$l->setCaprovee($this);
	}


	
	public function getCaordcomsJoinCaconpag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaconpag($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaconpag($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}


	
	public function getCaordcomsJoinCaforent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaforent($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinCaforent($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}


	
	public function getCaordcomsJoinTsdesmon($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaordcomPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaordcoms === null) {
			if ($this->isNew()) {
				$this->collCaordcoms = array();
			} else {

				$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

				$this->collCaordcoms = CaordcomPeer::doSelectJoinTsdesmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CaordcomPeer::CODPRO, $this->getCodpro());

			if (!isset($this->lastCaordcomCriteria) || !$this->lastCaordcomCriteria->equals($criteria)) {
				$this->collCaordcoms = CaordcomPeer::doSelectJoinTsdesmon($criteria, $con);
			}
		}
		$this->lastCaordcomCriteria = $criteria;

		return $this->collCaordcoms;
	}

	
	public function initCacotizas()
	{
		if ($this->collCacotizas === null) {
			$this->collCacotizas = array();
		}
	}

	
	public function getCacotizas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCacotizas === null) {
			if ($this->isNew()) {
			   $this->collCacotizas = array();
			} else {

				$criteria->add(CacotizaPeer::CODPRO, $this->getCodpro());

				CacotizaPeer::addSelectColumns($criteria);
				$this->collCacotizas = CacotizaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CacotizaPeer::CODPRO, $this->getCodpro());

				CacotizaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCacotizaCriteria) || !$this->lastCacotizaCriteria->equals($criteria)) {
					$this->collCacotizas = CacotizaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCacotizaCriteria = $criteria;
		return $this->collCacotizas;
	}

	
	public function countCacotizas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CacotizaPeer::CODPRO, $this->getCodpro());

		return CacotizaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCacotiza(Cacotiza $l)
	{
		$this->collCacotizas[] = $l;
		$l->setCaprovee($this);
	}


	
	public function getCacotizasJoinTsdesmon($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCacotizaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCacotizas === null) {
			if ($this->isNew()) {
				$this->collCacotizas = array();
			} else {

				$criteria->add(CacotizaPeer::CODPRO, $this->getCodpro());

				$this->collCacotizas = CacotizaPeer::doSelectJoinTsdesmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CacotizaPeer::CODPRO, $this->getCodpro());

			if (!isset($this->lastCacotizaCriteria) || !$this->lastCacotizaCriteria->equals($criteria)) {
				$this->collCacotizas = CacotizaPeer::doSelectJoinTsdesmon($criteria, $con);
			}
		}
		$this->lastCacotizaCriteria = $criteria;

		return $this->collCacotizas;
	}

} 