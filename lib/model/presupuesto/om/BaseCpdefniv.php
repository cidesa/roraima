<?php


abstract class BaseCpdefniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $loncod;


	
	protected $rupcat;


	
	protected $ruppar;


	
	protected $nivdis;


	
	protected $forpre;


	
	protected $asiper;


	
	protected $numper;


	
	protected $peract;


	
	protected $fecper;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $etadef;


	
	protected $staprc;


	
	protected $coraep;


	
	protected $gencom;


	
	protected $numcom;


	
	protected $caraep;


	
	protected $tiptraprc;


	
	protected $fueord;


	
	protected $fuecre;


	
	protected $fuetra;


	
	protected $nomgob;


	
	protected $nomsec;


	
	protected $unidad;


	
	protected $cortrasla;


	
	protected $coradidis;


	
	protected $corprc;


	
	protected $corcom;


	
	protected $corcau;


	
	protected $corpag;


	
	protected $corsoladidis;


	
	protected $corsoltra;


	
	protected $coraju;


	
	protected $corfue;


	
	protected $btnanu = true;


	
	protected $btneli = true;


	
	protected $conpar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getLoncod($val=false)
  {

    if($val) return number_format($this->loncod,2,',','.');
    else return $this->loncod;

  }
  
  public function getRupcat($val=false)
  {

    if($val) return number_format($this->rupcat,2,',','.');
    else return $this->rupcat;

  }
  
  public function getRuppar($val=false)
  {

    if($val) return number_format($this->ruppar,2,',','.');
    else return $this->ruppar;

  }
  
  public function getNivdis($val=false)
  {

    if($val) return number_format($this->nivdis,2,',','.');
    else return $this->nivdis;

  }
  
  public function getForpre()
  {

    return trim($this->forpre);

  }
  
  public function getAsiper()
  {

    return trim($this->asiper);

  }
  
  public function getNumper($val=false)
  {

    if($val) return number_format($this->numper,2,',','.');
    else return $this->numper;

  }
  
  public function getPeract()
  {

    return trim($this->peract);

  }
  
  public function getFecper($format = 'Y-m-d')
  {

    if ($this->fecper === null || $this->fecper === '') {
      return null;
    } elseif (!is_int($this->fecper)) {
            $ts = adodb_strtotime($this->fecper);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecper] as date/time value: " . var_export($this->fecper, true));
      }
    } else {
      $ts = $this->fecper;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEtadef()
  {

    return trim($this->etadef);

  }
  
  public function getStaprc()
  {

    return trim($this->staprc);

  }
  
  public function getCoraep()
  {

    return $this->coraep;

  }
  
  public function getGencom()
  {

    return trim($this->gencom);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getCaraep()
  {

    return trim($this->caraep);

  }
  
  public function getTiptraprc()
  {

    return trim($this->tiptraprc);

  }
  
  public function getFueord()
  {

    return trim($this->fueord);

  }
  
  public function getFuecre()
  {

    return trim($this->fuecre);

  }
  
  public function getFuetra()
  {

    return trim($this->fuetra);

  }
  
  public function getNomgob()
  {

    return trim($this->nomgob);

  }
  
  public function getNomsec()
  {

    return trim($this->nomsec);

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getCortrasla()
  {

    return $this->cortrasla;

  }
  
  public function getCoradidis()
  {

    return $this->coradidis;

  }
  
  public function getCorprc()
  {

    return $this->corprc;

  }
  
  public function getCorcom()
  {

    return $this->corcom;

  }
  
  public function getCorcau()
  {

    return $this->corcau;

  }
  
  public function getCorpag()
  {

    return $this->corpag;

  }
  
  public function getCorsoladidis()
  {

    return $this->corsoladidis;

  }
  
  public function getCorsoltra()
  {

    return $this->corsoltra;

  }
  
  public function getCoraju()
  {

    return $this->coraju;

  }
  
  public function getCorfue()
  {

    return $this->corfue;

  }
  
  public function getBtnanu()
  {

    return $this->btnanu;

  }
  
  public function getBtneli()
  {

    return $this->btneli;

  }
  
  public function getConpar($val=false)
  {

    if($val) return number_format($this->conpar,2,',','.');
    else return $this->conpar;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CODEMP;
      }
  
	} 
	
	public function setLoncod($v)
	{

    if ($this->loncod !== $v) {
        $this->loncod = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdefnivPeer::LONCOD;
      }
  
	} 
	
	public function setRupcat($v)
	{

    if ($this->rupcat !== $v) {
        $this->rupcat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdefnivPeer::RUPCAT;
      }
  
	} 
	
	public function setRuppar($v)
	{

    if ($this->ruppar !== $v) {
        $this->ruppar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdefnivPeer::RUPPAR;
      }
  
	} 
	
	public function setNivdis($v)
	{

    if ($this->nivdis !== $v) {
        $this->nivdis = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdefnivPeer::NIVDIS;
      }
  
	} 
	
	public function setForpre($v)
	{

    if ($this->forpre !== $v) {
        $this->forpre = $v;
        $this->modifiedColumns[] = CpdefnivPeer::FORPRE;
      }
  
	} 
	
	public function setAsiper($v)
	{

    if ($this->asiper !== $v) {
        $this->asiper = $v;
        $this->modifiedColumns[] = CpdefnivPeer::ASIPER;
      }
  
	} 
	
	public function setNumper($v)
	{

    if ($this->numper !== $v) {
        $this->numper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdefnivPeer::NUMPER;
      }
  
	} 
	
	public function setPeract($v)
	{

    if ($this->peract !== $v) {
        $this->peract = $v;
        $this->modifiedColumns[] = CpdefnivPeer::PERACT;
      }
  
	} 
	
	public function setFecper($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecper] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecper !== $ts) {
      $this->fecper = $ts;
      $this->modifiedColumns[] = CpdefnivPeer::FECPER;
    }

	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = CpdefnivPeer::FECINI;
    }

	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = CpdefnivPeer::FECCIE;
    }

	} 
	
	public function setEtadef($v)
	{

    if ($this->etadef !== $v) {
        $this->etadef = $v;
        $this->modifiedColumns[] = CpdefnivPeer::ETADEF;
      }
  
	} 
	
	public function setStaprc($v)
	{

    if ($this->staprc !== $v) {
        $this->staprc = $v;
        $this->modifiedColumns[] = CpdefnivPeer::STAPRC;
      }
  
	} 
	
	public function setCoraep($v)
	{

    if ($this->coraep !== $v) {
        $this->coraep = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORAEP;
      }
  
	} 
	
	public function setGencom($v)
	{

    if ($this->gencom !== $v) {
        $this->gencom = $v;
        $this->modifiedColumns[] = CpdefnivPeer::GENCOM;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CpdefnivPeer::NUMCOM;
      }
  
	} 
	
	public function setCaraep($v)
	{

    if ($this->caraep !== $v) {
        $this->caraep = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CARAEP;
      }
  
	} 
	
	public function setTiptraprc($v)
	{

    if ($this->tiptraprc !== $v) {
        $this->tiptraprc = $v;
        $this->modifiedColumns[] = CpdefnivPeer::TIPTRAPRC;
      }
  
	} 
	
	public function setFueord($v)
	{

    if ($this->fueord !== $v) {
        $this->fueord = $v;
        $this->modifiedColumns[] = CpdefnivPeer::FUEORD;
      }
  
	} 
	
	public function setFuecre($v)
	{

    if ($this->fuecre !== $v) {
        $this->fuecre = $v;
        $this->modifiedColumns[] = CpdefnivPeer::FUECRE;
      }
  
	} 
	
	public function setFuetra($v)
	{

    if ($this->fuetra !== $v) {
        $this->fuetra = $v;
        $this->modifiedColumns[] = CpdefnivPeer::FUETRA;
      }
  
	} 
	
	public function setNomgob($v)
	{

    if ($this->nomgob !== $v) {
        $this->nomgob = $v;
        $this->modifiedColumns[] = CpdefnivPeer::NOMGOB;
      }
  
	} 
	
	public function setNomsec($v)
	{

    if ($this->nomsec !== $v) {
        $this->nomsec = $v;
        $this->modifiedColumns[] = CpdefnivPeer::NOMSEC;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = CpdefnivPeer::UNIDAD;
      }
  
	} 
	
	public function setCortrasla($v)
	{

    if ($this->cortrasla !== $v) {
        $this->cortrasla = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORTRASLA;
      }
  
	} 
	
	public function setCoradidis($v)
	{

    if ($this->coradidis !== $v) {
        $this->coradidis = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORADIDIS;
      }
  
	} 
	
	public function setCorprc($v)
	{

    if ($this->corprc !== $v) {
        $this->corprc = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORPRC;
      }
  
	} 
	
	public function setCorcom($v)
	{

    if ($this->corcom !== $v) {
        $this->corcom = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORCOM;
      }
  
	} 
	
	public function setCorcau($v)
	{

    if ($this->corcau !== $v) {
        $this->corcau = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORCAU;
      }
  
	} 
	
	public function setCorpag($v)
	{

    if ($this->corpag !== $v) {
        $this->corpag = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORPAG;
      }
  
	} 
	
	public function setCorsoladidis($v)
	{

    if ($this->corsoladidis !== $v) {
        $this->corsoladidis = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORSOLADIDIS;
      }
  
	} 
	
	public function setCorsoltra($v)
	{

    if ($this->corsoltra !== $v) {
        $this->corsoltra = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORSOLTRA;
      }
  
	} 
	
	public function setCoraju($v)
	{

    if ($this->coraju !== $v) {
        $this->coraju = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORAJU;
      }
  
	} 
	
	public function setCorfue($v)
	{

    if ($this->corfue !== $v) {
        $this->corfue = $v;
        $this->modifiedColumns[] = CpdefnivPeer::CORFUE;
      }
  
	} 
	
	public function setBtnanu($v)
	{

    if ($this->btnanu !== $v || $v === true) {
        $this->btnanu = $v;
        $this->modifiedColumns[] = CpdefnivPeer::BTNANU;
      }
  
	} 
	
	public function setBtneli($v)
	{

    if ($this->btneli !== $v || $v === true) {
        $this->btneli = $v;
        $this->modifiedColumns[] = CpdefnivPeer::BTNELI;
      }
  
	} 
	
	public function setConpar($v)
	{

    if ($this->conpar !== $v) {
        $this->conpar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpdefnivPeer::CONPAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpdefnivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->loncod = $rs->getFloat($startcol + 1);

      $this->rupcat = $rs->getFloat($startcol + 2);

      $this->ruppar = $rs->getFloat($startcol + 3);

      $this->nivdis = $rs->getFloat($startcol + 4);

      $this->forpre = $rs->getString($startcol + 5);

      $this->asiper = $rs->getString($startcol + 6);

      $this->numper = $rs->getFloat($startcol + 7);

      $this->peract = $rs->getString($startcol + 8);

      $this->fecper = $rs->getDate($startcol + 9, null);

      $this->fecini = $rs->getDate($startcol + 10, null);

      $this->feccie = $rs->getDate($startcol + 11, null);

      $this->etadef = $rs->getString($startcol + 12);

      $this->staprc = $rs->getString($startcol + 13);

      $this->coraep = $rs->getInt($startcol + 14);

      $this->gencom = $rs->getString($startcol + 15);

      $this->numcom = $rs->getString($startcol + 16);

      $this->caraep = $rs->getString($startcol + 17);

      $this->tiptraprc = $rs->getString($startcol + 18);

      $this->fueord = $rs->getString($startcol + 19);

      $this->fuecre = $rs->getString($startcol + 20);

      $this->fuetra = $rs->getString($startcol + 21);

      $this->nomgob = $rs->getString($startcol + 22);

      $this->nomsec = $rs->getString($startcol + 23);

      $this->unidad = $rs->getString($startcol + 24);

      $this->cortrasla = $rs->getInt($startcol + 25);

      $this->coradidis = $rs->getInt($startcol + 26);

      $this->corprc = $rs->getInt($startcol + 27);

      $this->corcom = $rs->getInt($startcol + 28);

      $this->corcau = $rs->getInt($startcol + 29);

      $this->corpag = $rs->getInt($startcol + 30);

      $this->corsoladidis = $rs->getInt($startcol + 31);

      $this->corsoltra = $rs->getInt($startcol + 32);

      $this->coraju = $rs->getInt($startcol + 33);

      $this->corfue = $rs->getInt($startcol + 34);

      $this->btnanu = $rs->getBoolean($startcol + 35);

      $this->btneli = $rs->getBoolean($startcol + 36);

      $this->conpar = $rs->getFloat($startcol + 37);

      $this->id = $rs->getInt($startcol + 38);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 39; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpdefniv object", $e);
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
			$con = Propel::getConnection(CpdefnivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdefnivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdefnivPeer::DATABASE_NAME);
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
					$pk = CpdefnivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpdefnivPeer::doUpdate($this, $con);
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


			if (($retval = CpdefnivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getLoncod();
				break;
			case 2:
				return $this->getRupcat();
				break;
			case 3:
				return $this->getRuppar();
				break;
			case 4:
				return $this->getNivdis();
				break;
			case 5:
				return $this->getForpre();
				break;
			case 6:
				return $this->getAsiper();
				break;
			case 7:
				return $this->getNumper();
				break;
			case 8:
				return $this->getPeract();
				break;
			case 9:
				return $this->getFecper();
				break;
			case 10:
				return $this->getFecini();
				break;
			case 11:
				return $this->getFeccie();
				break;
			case 12:
				return $this->getEtadef();
				break;
			case 13:
				return $this->getStaprc();
				break;
			case 14:
				return $this->getCoraep();
				break;
			case 15:
				return $this->getGencom();
				break;
			case 16:
				return $this->getNumcom();
				break;
			case 17:
				return $this->getCaraep();
				break;
			case 18:
				return $this->getTiptraprc();
				break;
			case 19:
				return $this->getFueord();
				break;
			case 20:
				return $this->getFuecre();
				break;
			case 21:
				return $this->getFuetra();
				break;
			case 22:
				return $this->getNomgob();
				break;
			case 23:
				return $this->getNomsec();
				break;
			case 24:
				return $this->getUnidad();
				break;
			case 25:
				return $this->getCortrasla();
				break;
			case 26:
				return $this->getCoradidis();
				break;
			case 27:
				return $this->getCorprc();
				break;
			case 28:
				return $this->getCorcom();
				break;
			case 29:
				return $this->getCorcau();
				break;
			case 30:
				return $this->getCorpag();
				break;
			case 31:
				return $this->getCorsoladidis();
				break;
			case 32:
				return $this->getCorsoltra();
				break;
			case 33:
				return $this->getCoraju();
				break;
			case 34:
				return $this->getCorfue();
				break;
			case 35:
				return $this->getBtnanu();
				break;
			case 36:
				return $this->getBtneli();
				break;
			case 37:
				return $this->getConpar();
				break;
			case 38:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefnivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getLoncod(),
			$keys[2] => $this->getRupcat(),
			$keys[3] => $this->getRuppar(),
			$keys[4] => $this->getNivdis(),
			$keys[5] => $this->getForpre(),
			$keys[6] => $this->getAsiper(),
			$keys[7] => $this->getNumper(),
			$keys[8] => $this->getPeract(),
			$keys[9] => $this->getFecper(),
			$keys[10] => $this->getFecini(),
			$keys[11] => $this->getFeccie(),
			$keys[12] => $this->getEtadef(),
			$keys[13] => $this->getStaprc(),
			$keys[14] => $this->getCoraep(),
			$keys[15] => $this->getGencom(),
			$keys[16] => $this->getNumcom(),
			$keys[17] => $this->getCaraep(),
			$keys[18] => $this->getTiptraprc(),
			$keys[19] => $this->getFueord(),
			$keys[20] => $this->getFuecre(),
			$keys[21] => $this->getFuetra(),
			$keys[22] => $this->getNomgob(),
			$keys[23] => $this->getNomsec(),
			$keys[24] => $this->getUnidad(),
			$keys[25] => $this->getCortrasla(),
			$keys[26] => $this->getCoradidis(),
			$keys[27] => $this->getCorprc(),
			$keys[28] => $this->getCorcom(),
			$keys[29] => $this->getCorcau(),
			$keys[30] => $this->getCorpag(),
			$keys[31] => $this->getCorsoladidis(),
			$keys[32] => $this->getCorsoltra(),
			$keys[33] => $this->getCoraju(),
			$keys[34] => $this->getCorfue(),
			$keys[35] => $this->getBtnanu(),
			$keys[36] => $this->getBtneli(),
			$keys[37] => $this->getConpar(),
			$keys[38] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setLoncod($value);
				break;
			case 2:
				$this->setRupcat($value);
				break;
			case 3:
				$this->setRuppar($value);
				break;
			case 4:
				$this->setNivdis($value);
				break;
			case 5:
				$this->setForpre($value);
				break;
			case 6:
				$this->setAsiper($value);
				break;
			case 7:
				$this->setNumper($value);
				break;
			case 8:
				$this->setPeract($value);
				break;
			case 9:
				$this->setFecper($value);
				break;
			case 10:
				$this->setFecini($value);
				break;
			case 11:
				$this->setFeccie($value);
				break;
			case 12:
				$this->setEtadef($value);
				break;
			case 13:
				$this->setStaprc($value);
				break;
			case 14:
				$this->setCoraep($value);
				break;
			case 15:
				$this->setGencom($value);
				break;
			case 16:
				$this->setNumcom($value);
				break;
			case 17:
				$this->setCaraep($value);
				break;
			case 18:
				$this->setTiptraprc($value);
				break;
			case 19:
				$this->setFueord($value);
				break;
			case 20:
				$this->setFuecre($value);
				break;
			case 21:
				$this->setFuetra($value);
				break;
			case 22:
				$this->setNomgob($value);
				break;
			case 23:
				$this->setNomsec($value);
				break;
			case 24:
				$this->setUnidad($value);
				break;
			case 25:
				$this->setCortrasla($value);
				break;
			case 26:
				$this->setCoradidis($value);
				break;
			case 27:
				$this->setCorprc($value);
				break;
			case 28:
				$this->setCorcom($value);
				break;
			case 29:
				$this->setCorcau($value);
				break;
			case 30:
				$this->setCorpag($value);
				break;
			case 31:
				$this->setCorsoladidis($value);
				break;
			case 32:
				$this->setCorsoltra($value);
				break;
			case 33:
				$this->setCoraju($value);
				break;
			case 34:
				$this->setCorfue($value);
				break;
			case 35:
				$this->setBtnanu($value);
				break;
			case 36:
				$this->setBtneli($value);
				break;
			case 37:
				$this->setConpar($value);
				break;
			case 38:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefnivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoncod($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRupcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRuppar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNivdis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setForpre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAsiper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumper($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPeract($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecper($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecini($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFeccie($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEtadef($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStaprc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoraep($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setGencom($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumcom($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCaraep($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTiptraprc($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFueord($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFuecre($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFuetra($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNomgob($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNomsec($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setUnidad($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCortrasla($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCoradidis($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCorprc($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCorcom($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCorcau($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCorpag($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCorsoladidis($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCorsoltra($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCoraju($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCorfue($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setBtnanu($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setBtneli($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setConpar($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setId($arr[$keys[38]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdefnivPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdefnivPeer::CODEMP)) $criteria->add(CpdefnivPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CpdefnivPeer::LONCOD)) $criteria->add(CpdefnivPeer::LONCOD, $this->loncod);
		if ($this->isColumnModified(CpdefnivPeer::RUPCAT)) $criteria->add(CpdefnivPeer::RUPCAT, $this->rupcat);
		if ($this->isColumnModified(CpdefnivPeer::RUPPAR)) $criteria->add(CpdefnivPeer::RUPPAR, $this->ruppar);
		if ($this->isColumnModified(CpdefnivPeer::NIVDIS)) $criteria->add(CpdefnivPeer::NIVDIS, $this->nivdis);
		if ($this->isColumnModified(CpdefnivPeer::FORPRE)) $criteria->add(CpdefnivPeer::FORPRE, $this->forpre);
		if ($this->isColumnModified(CpdefnivPeer::ASIPER)) $criteria->add(CpdefnivPeer::ASIPER, $this->asiper);
		if ($this->isColumnModified(CpdefnivPeer::NUMPER)) $criteria->add(CpdefnivPeer::NUMPER, $this->numper);
		if ($this->isColumnModified(CpdefnivPeer::PERACT)) $criteria->add(CpdefnivPeer::PERACT, $this->peract);
		if ($this->isColumnModified(CpdefnivPeer::FECPER)) $criteria->add(CpdefnivPeer::FECPER, $this->fecper);
		if ($this->isColumnModified(CpdefnivPeer::FECINI)) $criteria->add(CpdefnivPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(CpdefnivPeer::FECCIE)) $criteria->add(CpdefnivPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(CpdefnivPeer::ETADEF)) $criteria->add(CpdefnivPeer::ETADEF, $this->etadef);
		if ($this->isColumnModified(CpdefnivPeer::STAPRC)) $criteria->add(CpdefnivPeer::STAPRC, $this->staprc);
		if ($this->isColumnModified(CpdefnivPeer::CORAEP)) $criteria->add(CpdefnivPeer::CORAEP, $this->coraep);
		if ($this->isColumnModified(CpdefnivPeer::GENCOM)) $criteria->add(CpdefnivPeer::GENCOM, $this->gencom);
		if ($this->isColumnModified(CpdefnivPeer::NUMCOM)) $criteria->add(CpdefnivPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CpdefnivPeer::CARAEP)) $criteria->add(CpdefnivPeer::CARAEP, $this->caraep);
		if ($this->isColumnModified(CpdefnivPeer::TIPTRAPRC)) $criteria->add(CpdefnivPeer::TIPTRAPRC, $this->tiptraprc);
		if ($this->isColumnModified(CpdefnivPeer::FUEORD)) $criteria->add(CpdefnivPeer::FUEORD, $this->fueord);
		if ($this->isColumnModified(CpdefnivPeer::FUECRE)) $criteria->add(CpdefnivPeer::FUECRE, $this->fuecre);
		if ($this->isColumnModified(CpdefnivPeer::FUETRA)) $criteria->add(CpdefnivPeer::FUETRA, $this->fuetra);
		if ($this->isColumnModified(CpdefnivPeer::NOMGOB)) $criteria->add(CpdefnivPeer::NOMGOB, $this->nomgob);
		if ($this->isColumnModified(CpdefnivPeer::NOMSEC)) $criteria->add(CpdefnivPeer::NOMSEC, $this->nomsec);
		if ($this->isColumnModified(CpdefnivPeer::UNIDAD)) $criteria->add(CpdefnivPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(CpdefnivPeer::CORTRASLA)) $criteria->add(CpdefnivPeer::CORTRASLA, $this->cortrasla);
		if ($this->isColumnModified(CpdefnivPeer::CORADIDIS)) $criteria->add(CpdefnivPeer::CORADIDIS, $this->coradidis);
		if ($this->isColumnModified(CpdefnivPeer::CORPRC)) $criteria->add(CpdefnivPeer::CORPRC, $this->corprc);
		if ($this->isColumnModified(CpdefnivPeer::CORCOM)) $criteria->add(CpdefnivPeer::CORCOM, $this->corcom);
		if ($this->isColumnModified(CpdefnivPeer::CORCAU)) $criteria->add(CpdefnivPeer::CORCAU, $this->corcau);
		if ($this->isColumnModified(CpdefnivPeer::CORPAG)) $criteria->add(CpdefnivPeer::CORPAG, $this->corpag);
		if ($this->isColumnModified(CpdefnivPeer::CORSOLADIDIS)) $criteria->add(CpdefnivPeer::CORSOLADIDIS, $this->corsoladidis);
		if ($this->isColumnModified(CpdefnivPeer::CORSOLTRA)) $criteria->add(CpdefnivPeer::CORSOLTRA, $this->corsoltra);
		if ($this->isColumnModified(CpdefnivPeer::CORAJU)) $criteria->add(CpdefnivPeer::CORAJU, $this->coraju);
		if ($this->isColumnModified(CpdefnivPeer::CORFUE)) $criteria->add(CpdefnivPeer::CORFUE, $this->corfue);
		if ($this->isColumnModified(CpdefnivPeer::BTNANU)) $criteria->add(CpdefnivPeer::BTNANU, $this->btnanu);
		if ($this->isColumnModified(CpdefnivPeer::BTNELI)) $criteria->add(CpdefnivPeer::BTNELI, $this->btneli);
		if ($this->isColumnModified(CpdefnivPeer::CONPAR)) $criteria->add(CpdefnivPeer::CONPAR, $this->conpar);
		if ($this->isColumnModified(CpdefnivPeer::ID)) $criteria->add(CpdefnivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdefnivPeer::DATABASE_NAME);

		$criteria->add(CpdefnivPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setLoncod($this->loncod);

		$copyObj->setRupcat($this->rupcat);

		$copyObj->setRuppar($this->ruppar);

		$copyObj->setNivdis($this->nivdis);

		$copyObj->setForpre($this->forpre);

		$copyObj->setAsiper($this->asiper);

		$copyObj->setNumper($this->numper);

		$copyObj->setPeract($this->peract);

		$copyObj->setFecper($this->fecper);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setEtadef($this->etadef);

		$copyObj->setStaprc($this->staprc);

		$copyObj->setCoraep($this->coraep);

		$copyObj->setGencom($this->gencom);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setCaraep($this->caraep);

		$copyObj->setTiptraprc($this->tiptraprc);

		$copyObj->setFueord($this->fueord);

		$copyObj->setFuecre($this->fuecre);

		$copyObj->setFuetra($this->fuetra);

		$copyObj->setNomgob($this->nomgob);

		$copyObj->setNomsec($this->nomsec);

		$copyObj->setUnidad($this->unidad);

		$copyObj->setCortrasla($this->cortrasla);

		$copyObj->setCoradidis($this->coradidis);

		$copyObj->setCorprc($this->corprc);

		$copyObj->setCorcom($this->corcom);

		$copyObj->setCorcau($this->corcau);

		$copyObj->setCorpag($this->corpag);

		$copyObj->setCorsoladidis($this->corsoladidis);

		$copyObj->setCorsoltra($this->corsoltra);

		$copyObj->setCoraju($this->coraju);

		$copyObj->setCorfue($this->corfue);

		$copyObj->setBtnanu($this->btnanu);

		$copyObj->setBtneli($this->btneli);

		$copyObj->setConpar($this->conpar);


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
			self::$peer = new CpdefnivPeer();
		}
		return self::$peer;
	}

} 
