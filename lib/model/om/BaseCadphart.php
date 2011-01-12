<?php


abstract class BaseCadphart extends BaseObject  implements Persistent {



	protected static $peer;



	protected $dphart;



	protected $fecdph;



	protected $reqart;



	protected $desdph;



	protected $codori;



	protected $stadph;



	protected $numcom;



	protected $refpag;



	protected $codalm;



	protected $tipdph;



	protected $codcli;



	protected $mondph;



	protected $obsdph;



	protected $fordesp;



	protected $reapor;



	protected $fecanu;



	protected $codubi;



	protected $tipref;



	protected $codcen;



	protected $fecemiov;



	protected $feccarov;



	protected $locori;



	protected $direccion;



	protected $rubro;



	protected $cankg;



	protected $totpasreal;



	protected $locrec;



	protected $emptra;



	protected $nomrep;



	protected $telemp;



	protected $choveh;



	protected $cedcho;



	protected $telcho;



	protected $nomconfordes;



	protected $cedconfordes;



	protected $horsalconfordes;



	protected $nomconforrec;



	protected $cedconforrec;



	protected $horlleconforrec;



	protected $id;


	protected $alreadyInSave = false;


	protected $alreadyInValidation = false;


  public function getDphart()
  {

    return trim($this->dphart);

  }

  public function getFecdph($format = 'Y-m-d')
  {

    if ($this->fecdph === null || $this->fecdph === '') {
      return null;
    } elseif (!is_int($this->fecdph)) {
            $ts = adodb_strtotime($this->fecdph);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdph] as date/time value: " . var_export($this->fecdph, true));
      }
    } else {
      $ts = $this->fecdph;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }


  public function getReqart()
  {

    return trim($this->reqart);

  }

  public function getDesdph()
  {

    return trim($this->desdph);

  }

  public function getCodori()
  {

    return trim($this->codori);

  }

  public function getStadph()
  {

    return trim($this->stadph);

  }

  public function getNumcom()
  {

    return trim($this->numcom);

  }

  public function getRefpag()
  {

    return trim($this->refpag);

  }

  public function getCodalm()
  {

    return trim($this->codalm);

  }

  public function getTipdph()
  {

    return trim($this->tipdph);

  }

  public function getCodcli()
  {

    return trim($this->codcli);

  }

  public function getMondph($val=false)
  {

    if($val) return number_format($this->mondph,2,',','.');
    else return $this->mondph;

  }

  public function getObsdph()
  {

    return trim($this->obsdph);

  }

  public function getFordesp()
  {

    return trim($this->fordesp);

  }

  public function getReapor()
  {

    return trim($this->reapor);

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


  public function getCodubi()
  {

    return trim($this->codubi);

  }

  public function getTipref()
  {

    return trim($this->tipref);

  }

  public function getCodcen()
  {

    return trim($this->codcen);

  }

  public function getFecemiov($format = 'Y-m-d')
  {

    if ($this->fecemiov === null || $this->fecemiov === '') {
      return null;
    } elseif (!is_int($this->fecemiov)) {
            $ts = adodb_strtotime($this->fecemiov);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemiov] as date/time value: " . var_export($this->fecemiov, true));
      }
    } else {
      $ts = $this->fecemiov;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }


  public function getFeccarov($format = 'Y-m-d')
  {

    if ($this->feccarov === null || $this->feccarov === '') {
      return null;
    } elseif (!is_int($this->feccarov)) {
            $ts = adodb_strtotime($this->feccarov);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccarov] as date/time value: " . var_export($this->feccarov, true));
      }
    } else {
      $ts = $this->feccarov;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }


  public function getLocori()
  {

    return trim($this->locori);

  }

  public function getDireccion()
  {

    return trim($this->direccion);

  }

  public function getRubro()
  {

    return trim($this->rubro);

  }

  public function getCankg($val=false)
  {

    if($val) return number_format($this->cankg,2,',','.');
    else return $this->cankg;

  }

  public function getTotpasreal($val=false)
  {

    if($val) return number_format($this->totpasreal,2,',','.');
    else return $this->totpasreal;

  }

  public function getLocrec()
  {

    return trim($this->locrec);

  }

  public function getEmptra()
  {

    return trim($this->emptra);

  }

  public function getNomrep()
  {

    return trim($this->nomrep);

  }

  public function getTelemp()
  {

    return trim($this->telemp);

  }

  public function getChoveh()
  {

    return trim($this->choveh);

  }

  public function getCedcho()
  {

    return trim($this->cedcho);

  }

  public function getTelcho()
  {

    return trim($this->telcho);

  }

  public function getNomconfordes()
  {

    return trim($this->nomconfordes);

  }

  public function getCedconfordes()
  {

    return trim($this->cedconfordes);

  }

  public function getHorsalconfordes()
  {

    return trim($this->horsalconfordes);

  }

  public function getNomconforrec()
  {

    return trim($this->nomconforrec);

  }

  public function getCedconforrec()
  {

    return trim($this->cedconforrec);

  }

  public function getHorlleconforrec()
  {

    return trim($this->horlleconforrec);

  }

  public function getId()
  {

    return $this->id;

  }

	public function setDphart($v)
	{

    if ($this->dphart !== $v) {
        $this->dphart = $v;
        $this->modifiedColumns[] = CadphartPeer::DPHART;
      }

	}

	public function setFecdph($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdph] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdph !== $ts) {
      $this->fecdph = $ts;
      $this->modifiedColumns[] = CadphartPeer::FECDPH;
    }

	}

	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = $v;
        $this->modifiedColumns[] = CadphartPeer::REQART;
      }

	}

	public function setDesdph($v)
	{

    if ($this->desdph !== $v) {
        $this->desdph = $v;
        $this->modifiedColumns[] = CadphartPeer::DESDPH;
      }

	}

	public function setCodori($v)
	{

    if ($this->codori !== $v) {
        $this->codori = $v;
        $this->modifiedColumns[] = CadphartPeer::CODORI;
      }

	}

	public function setStadph($v)
	{

    if ($this->stadph !== $v) {
        $this->stadph = $v;
        $this->modifiedColumns[] = CadphartPeer::STADPH;
      }

	}

	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = CadphartPeer::NUMCOM;
      }

	}

	public function setRefpag($v)
	{

    if ($this->refpag !== $v) {
        $this->refpag = $v;
        $this->modifiedColumns[] = CadphartPeer::REFPAG;
      }

	}

	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadphartPeer::CODALM;
      }

	}

	public function setTipdph($v)
	{

    if ($this->tipdph !== $v) {
        $this->tipdph = $v;
        $this->modifiedColumns[] = CadphartPeer::TIPDPH;
      }

	}

	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = CadphartPeer::CODCLI;
      }

	}

	public function setMondph($v)
	{

    if ($this->mondph !== $v) {
        $this->mondph = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadphartPeer::MONDPH;
      }

	}

	public function setObsdph($v)
	{

    if ($this->obsdph !== $v) {
        $this->obsdph = $v;
        $this->modifiedColumns[] = CadphartPeer::OBSDPH;
      }

	}

	public function setFordesp($v)
	{

    if ($this->fordesp !== $v) {
        $this->fordesp = $v;
        $this->modifiedColumns[] = CadphartPeer::FORDESP;
      }

	}

	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = CadphartPeer::REAPOR;
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
      $this->modifiedColumns[] = CadphartPeer::FECANU;
    }

	}

	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CadphartPeer::CODUBI;
      }

	}

	public function setTipref($v)
	{

    if ($this->tipref !== $v) {
        $this->tipref = $v;
        $this->modifiedColumns[] = CadphartPeer::TIPREF;
      }

	}

	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = CadphartPeer::CODCEN;
      }

	}

	public function setFecemiov($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemiov] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemiov !== $ts) {
      $this->fecemiov = $ts;
      $this->modifiedColumns[] = CadphartPeer::FECEMIOV;
    }

	}

	public function setFeccarov($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccarov] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccarov !== $ts) {
      $this->feccarov = $ts;
      $this->modifiedColumns[] = CadphartPeer::FECCAROV;
    }

	}

	public function setLocori($v)
	{

    if ($this->locori !== $v) {
        $this->locori = $v;
        $this->modifiedColumns[] = CadphartPeer::LOCORI;
      }

	}

	public function setDireccion($v)
	{

    if ($this->direccion !== $v) {
        $this->direccion = $v;
        $this->modifiedColumns[] = CadphartPeer::DIRECCION;
      }

	}

	public function setRubro($v)
	{

    if ($this->rubro !== $v) {
        $this->rubro = $v;
        $this->modifiedColumns[] = CadphartPeer::RUBRO;
      }

	}

	public function setCankg($v)
	{

    if ($this->cankg !== $v) {
        $this->cankg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadphartPeer::CANKG;
      }

	}

	public function setTotpasreal($v)
	{

    if ($this->totpasreal !== $v) {
        $this->totpasreal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CadphartPeer::TOTPASREAL;
      }

	}

	public function setLocrec($v)
	{

    if ($this->locrec !== $v) {
        $this->locrec = $v;
        $this->modifiedColumns[] = CadphartPeer::LOCREC;
      }

	}

	public function setEmptra($v)
	{

    if ($this->emptra !== $v) {
        $this->emptra = $v;
        $this->modifiedColumns[] = CadphartPeer::EMPTRA;
      }

	}

	public function setNomrep($v)
	{

    if ($this->nomrep !== $v) {
        $this->nomrep = $v;
        $this->modifiedColumns[] = CadphartPeer::NOMREP;
      }

	}

	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = CadphartPeer::TELEMP;
      }

	}

	public function setChoveh($v)
	{

    if ($this->choveh !== $v) {
        $this->choveh = $v;
        $this->modifiedColumns[] = CadphartPeer::CHOVEH;
      }

	}

	public function setCedcho($v)
	{

    if ($this->cedcho !== $v) {
        $this->cedcho = $v;
        $this->modifiedColumns[] = CadphartPeer::CEDCHO;
      }

	}

	public function setTelcho($v)
	{

    if ($this->telcho !== $v) {
        $this->telcho = $v;
        $this->modifiedColumns[] = CadphartPeer::TELCHO;
      }

	}

	public function setNomconfordes($v)
	{

    if ($this->nomconfordes !== $v) {
        $this->nomconfordes = $v;
        $this->modifiedColumns[] = CadphartPeer::NOMCONFORDES;
      }

	}

	public function setCedconfordes($v)
	{

    if ($this->cedconfordes !== $v) {
        $this->cedconfordes = $v;
        $this->modifiedColumns[] = CadphartPeer::CEDCONFORDES;
      }

	}

	public function setHorsalconfordes($v)
	{

    if ($this->horsalconfordes !== $v) {
        $this->horsalconfordes = $v;
        $this->modifiedColumns[] = CadphartPeer::HORSALCONFORDES;
      }

	}

	public function setNomconforrec($v)
	{

    if ($this->nomconforrec !== $v) {
        $this->nomconforrec = $v;
        $this->modifiedColumns[] = CadphartPeer::NOMCONFORREC;
      }

	}

	public function setCedconforrec($v)
	{

    if ($this->cedconforrec !== $v) {
        $this->cedconforrec = $v;
        $this->modifiedColumns[] = CadphartPeer::CEDCONFORREC;
      }

	}

	public function setHorlleconforrec($v)
	{

    if ($this->horlleconforrec !== $v) {
        $this->horlleconforrec = $v;
        $this->modifiedColumns[] = CadphartPeer::HORLLECONFORREC;
      }

	}

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadphartPeer::ID;
      }

	}

  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->dphart = $rs->getString($startcol + 0);

      $this->fecdph = $rs->getDate($startcol + 1, null);

      $this->reqart = $rs->getString($startcol + 2);

      $this->desdph = $rs->getString($startcol + 3);

      $this->codori = $rs->getString($startcol + 4);

      $this->stadph = $rs->getString($startcol + 5);

      $this->numcom = $rs->getString($startcol + 6);

      $this->refpag = $rs->getString($startcol + 7);

      $this->codalm = $rs->getString($startcol + 8);

      $this->tipdph = $rs->getString($startcol + 9);

      $this->codcli = $rs->getString($startcol + 10);

      $this->mondph = $rs->getFloat($startcol + 11);

      $this->obsdph = $rs->getString($startcol + 12);

      $this->fordesp = $rs->getString($startcol + 13);

      $this->reapor = $rs->getString($startcol + 14);

      $this->fecanu = $rs->getDate($startcol + 15, null);

      $this->codubi = $rs->getString($startcol + 16);

      $this->tipref = $rs->getString($startcol + 17);

      $this->codcen = $rs->getString($startcol + 18);

      $this->fecemiov = $rs->getDate($startcol + 19, null);

      $this->feccarov = $rs->getDate($startcol + 20, null);

      $this->locori = $rs->getString($startcol + 21);

      $this->direccion = $rs->getString($startcol + 22);

      $this->rubro = $rs->getString($startcol + 23);

      $this->cankg = $rs->getFloat($startcol + 24);

      $this->totpasreal = $rs->getFloat($startcol + 25);

      $this->locrec = $rs->getString($startcol + 26);

      $this->emptra = $rs->getString($startcol + 27);

      $this->nomrep = $rs->getString($startcol + 28);

      $this->telemp = $rs->getString($startcol + 29);

      $this->choveh = $rs->getString($startcol + 30);

      $this->cedcho = $rs->getString($startcol + 31);

      $this->telcho = $rs->getString($startcol + 32);

      $this->nomconfordes = $rs->getString($startcol + 33);

      $this->cedconfordes = $rs->getString($startcol + 34);

      $this->horsalconfordes = $rs->getString($startcol + 35);

      $this->nomconforrec = $rs->getString($startcol + 36);

      $this->cedconforrec = $rs->getString($startcol + 37);

      $this->horlleconforrec = $rs->getString($startcol + 38);

      $this->id = $rs->getInt($startcol + 39);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 40;
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadphart object", $e);
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
			$con = Propel::getConnection(CadphartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadphartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadphartPeer::DATABASE_NAME);
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
					$pk = CadphartPeer::doInsert($this, $con);
					$affectedRows += 1;
					$this->setId($pk);
					$this->setNew(false);
				} else {
					$affectedRows += CadphartPeer::doUpdate($this, $con);
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


			if (($retval = CadphartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}


	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadphartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}


	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDphart();
				break;
			case 1:
				return $this->getFecdph();
				break;
			case 2:
				return $this->getReqart();
				break;
			case 3:
				return $this->getDesdph();
				break;
			case 4:
				return $this->getCodori();
				break;
			case 5:
				return $this->getStadph();
				break;
			case 6:
				return $this->getNumcom();
				break;
			case 7:
				return $this->getRefpag();
				break;
			case 8:
				return $this->getCodalm();
				break;
			case 9:
				return $this->getTipdph();
				break;
			case 10:
				return $this->getCodcli();
				break;
			case 11:
				return $this->getMondph();
				break;
			case 12:
				return $this->getObsdph();
				break;
			case 13:
				return $this->getFordesp();
				break;
			case 14:
				return $this->getReapor();
				break;
			case 15:
				return $this->getFecanu();
				break;
			case 16:
				return $this->getCodubi();
				break;
			case 17:
				return $this->getTipref();
				break;
			case 18:
				return $this->getCodcen();
				break;
			case 19:
				return $this->getFecemiov();
				break;
			case 20:
				return $this->getFeccarov();
				break;
			case 21:
				return $this->getLocori();
				break;
			case 22:
				return $this->getDireccion();
				break;
			case 23:
				return $this->getRubro();
				break;
			case 24:
				return $this->getCankg();
				break;
			case 25:
				return $this->getTotpasreal();
				break;
			case 26:
				return $this->getLocrec();
				break;
			case 27:
				return $this->getEmptra();
				break;
			case 28:
				return $this->getNomrep();
				break;
			case 29:
				return $this->getTelemp();
				break;
			case 30:
				return $this->getChoveh();
				break;
			case 31:
				return $this->getCedcho();
				break;
			case 32:
				return $this->getTelcho();
				break;
			case 33:
				return $this->getNomconfordes();
				break;
			case 34:
				return $this->getCedconfordes();
				break;
			case 35:
				return $this->getHorsalconfordes();
				break;
			case 36:
				return $this->getNomconforrec();
				break;
			case 37:
				return $this->getCedconforrec();
				break;
			case 38:
				return $this->getHorlleconforrec();
				break;
			case 39:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}


	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadphartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDphart(),
			$keys[1] => $this->getFecdph(),
			$keys[2] => $this->getReqart(),
			$keys[3] => $this->getDesdph(),
			$keys[4] => $this->getCodori(),
			$keys[5] => $this->getStadph(),
			$keys[6] => $this->getNumcom(),
			$keys[7] => $this->getRefpag(),
			$keys[8] => $this->getCodalm(),
			$keys[9] => $this->getTipdph(),
			$keys[10] => $this->getCodcli(),
			$keys[11] => $this->getMondph(),
			$keys[12] => $this->getObsdph(),
			$keys[13] => $this->getFordesp(),
			$keys[14] => $this->getReapor(),
			$keys[15] => $this->getFecanu(),
			$keys[16] => $this->getCodubi(),
			$keys[17] => $this->getTipref(),
			$keys[18] => $this->getCodcen(),
			$keys[19] => $this->getFecemiov(),
			$keys[20] => $this->getFeccarov(),
			$keys[21] => $this->getLocori(),
			$keys[22] => $this->getDireccion(),
			$keys[23] => $this->getRubro(),
			$keys[24] => $this->getCankg(),
			$keys[25] => $this->getTotpasreal(),
			$keys[26] => $this->getLocrec(),
			$keys[27] => $this->getEmptra(),
			$keys[28] => $this->getNomrep(),
			$keys[29] => $this->getTelemp(),
			$keys[30] => $this->getChoveh(),
			$keys[31] => $this->getCedcho(),
			$keys[32] => $this->getTelcho(),
			$keys[33] => $this->getNomconfordes(),
			$keys[34] => $this->getCedconfordes(),
			$keys[35] => $this->getHorsalconfordes(),
			$keys[36] => $this->getNomconforrec(),
			$keys[37] => $this->getCedconforrec(),
			$keys[38] => $this->getHorlleconforrec(),
			$keys[39] => $this->getId(),
		);
		return $result;
	}


	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadphartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}


	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDphart($value);
				break;
			case 1:
				$this->setFecdph($value);
				break;
			case 2:
				$this->setReqart($value);
				break;
			case 3:
				$this->setDesdph($value);
				break;
			case 4:
				$this->setCodori($value);
				break;
			case 5:
				$this->setStadph($value);
				break;
			case 6:
				$this->setNumcom($value);
				break;
			case 7:
				$this->setRefpag($value);
				break;
			case 8:
				$this->setCodalm($value);
				break;
			case 9:
				$this->setTipdph($value);
				break;
			case 10:
				$this->setCodcli($value);
				break;
			case 11:
				$this->setMondph($value);
				break;
			case 12:
				$this->setObsdph($value);
				break;
			case 13:
				$this->setFordesp($value);
				break;
			case 14:
				$this->setReapor($value);
				break;
			case 15:
				$this->setFecanu($value);
				break;
			case 16:
				$this->setCodubi($value);
				break;
			case 17:
				$this->setTipref($value);
				break;
			case 18:
				$this->setCodcen($value);
				break;
			case 19:
				$this->setFecemiov($value);
				break;
			case 20:
				$this->setFeccarov($value);
				break;
			case 21:
				$this->setLocori($value);
				break;
			case 22:
				$this->setDireccion($value);
				break;
			case 23:
				$this->setRubro($value);
				break;
			case 24:
				$this->setCankg($value);
				break;
			case 25:
				$this->setTotpasreal($value);
				break;
			case 26:
				$this->setLocrec($value);
				break;
			case 27:
				$this->setEmptra($value);
				break;
			case 28:
				$this->setNomrep($value);
				break;
			case 29:
				$this->setTelemp($value);
				break;
			case 30:
				$this->setChoveh($value);
				break;
			case 31:
				$this->setCedcho($value);
				break;
			case 32:
				$this->setTelcho($value);
				break;
			case 33:
				$this->setNomconfordes($value);
				break;
			case 34:
				$this->setCedconfordes($value);
				break;
			case 35:
				$this->setHorsalconfordes($value);
				break;
			case 36:
				$this->setNomconforrec($value);
				break;
			case 37:
				$this->setCedconforrec($value);
				break;
			case 38:
				$this->setHorlleconforrec($value);
				break;
			case 39:
				$this->setId($value);
				break;
		} 	}


	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadphartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDphart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdph($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setReqart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesdph($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodori($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStadph($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRefpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodalm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipdph($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodcli($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMondph($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObsdph($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFordesp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setReapor($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecanu($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodubi($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTipref($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodcen($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecemiov($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFeccarov($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setLocori($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDireccion($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setRubro($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCankg($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setTotpasreal($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLocrec($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setEmptra($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setNomrep($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTelemp($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setChoveh($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCedcho($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTelcho($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNomconfordes($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCedconfordes($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setHorsalconfordes($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNomconforrec($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCedconforrec($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setHorlleconforrec($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setId($arr[$keys[39]]);
	}


	public function buildCriteria()
	{
		$criteria = new Criteria(CadphartPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadphartPeer::DPHART)) $criteria->add(CadphartPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CadphartPeer::FECDPH)) $criteria->add(CadphartPeer::FECDPH, $this->fecdph);
		if ($this->isColumnModified(CadphartPeer::REQART)) $criteria->add(CadphartPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CadphartPeer::DESDPH)) $criteria->add(CadphartPeer::DESDPH, $this->desdph);
		if ($this->isColumnModified(CadphartPeer::CODORI)) $criteria->add(CadphartPeer::CODORI, $this->codori);
		if ($this->isColumnModified(CadphartPeer::STADPH)) $criteria->add(CadphartPeer::STADPH, $this->stadph);
		if ($this->isColumnModified(CadphartPeer::NUMCOM)) $criteria->add(CadphartPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CadphartPeer::REFPAG)) $criteria->add(CadphartPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(CadphartPeer::CODALM)) $criteria->add(CadphartPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadphartPeer::TIPDPH)) $criteria->add(CadphartPeer::TIPDPH, $this->tipdph);
		if ($this->isColumnModified(CadphartPeer::CODCLI)) $criteria->add(CadphartPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CadphartPeer::MONDPH)) $criteria->add(CadphartPeer::MONDPH, $this->mondph);
		if ($this->isColumnModified(CadphartPeer::OBSDPH)) $criteria->add(CadphartPeer::OBSDPH, $this->obsdph);
		if ($this->isColumnModified(CadphartPeer::FORDESP)) $criteria->add(CadphartPeer::FORDESP, $this->fordesp);
		if ($this->isColumnModified(CadphartPeer::REAPOR)) $criteria->add(CadphartPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(CadphartPeer::FECANU)) $criteria->add(CadphartPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CadphartPeer::CODUBI)) $criteria->add(CadphartPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CadphartPeer::TIPREF)) $criteria->add(CadphartPeer::TIPREF, $this->tipref);
		if ($this->isColumnModified(CadphartPeer::CODCEN)) $criteria->add(CadphartPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(CadphartPeer::FECEMIOV)) $criteria->add(CadphartPeer::FECEMIOV, $this->fecemiov);
		if ($this->isColumnModified(CadphartPeer::FECCAROV)) $criteria->add(CadphartPeer::FECCAROV, $this->feccarov);
		if ($this->isColumnModified(CadphartPeer::LOCORI)) $criteria->add(CadphartPeer::LOCORI, $this->locori);
		if ($this->isColumnModified(CadphartPeer::DIRECCION)) $criteria->add(CadphartPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(CadphartPeer::RUBRO)) $criteria->add(CadphartPeer::RUBRO, $this->rubro);
		if ($this->isColumnModified(CadphartPeer::CANKG)) $criteria->add(CadphartPeer::CANKG, $this->cankg);
		if ($this->isColumnModified(CadphartPeer::TOTPASREAL)) $criteria->add(CadphartPeer::TOTPASREAL, $this->totpasreal);
		if ($this->isColumnModified(CadphartPeer::LOCREC)) $criteria->add(CadphartPeer::LOCREC, $this->locrec);
		if ($this->isColumnModified(CadphartPeer::EMPTRA)) $criteria->add(CadphartPeer::EMPTRA, $this->emptra);
		if ($this->isColumnModified(CadphartPeer::NOMREP)) $criteria->add(CadphartPeer::NOMREP, $this->nomrep);
		if ($this->isColumnModified(CadphartPeer::TELEMP)) $criteria->add(CadphartPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(CadphartPeer::CHOVEH)) $criteria->add(CadphartPeer::CHOVEH, $this->choveh);
		if ($this->isColumnModified(CadphartPeer::CEDCHO)) $criteria->add(CadphartPeer::CEDCHO, $this->cedcho);
		if ($this->isColumnModified(CadphartPeer::TELCHO)) $criteria->add(CadphartPeer::TELCHO, $this->telcho);
		if ($this->isColumnModified(CadphartPeer::NOMCONFORDES)) $criteria->add(CadphartPeer::NOMCONFORDES, $this->nomconfordes);
		if ($this->isColumnModified(CadphartPeer::CEDCONFORDES)) $criteria->add(CadphartPeer::CEDCONFORDES, $this->cedconfordes);
		if ($this->isColumnModified(CadphartPeer::HORSALCONFORDES)) $criteria->add(CadphartPeer::HORSALCONFORDES, $this->horsalconfordes);
		if ($this->isColumnModified(CadphartPeer::NOMCONFORREC)) $criteria->add(CadphartPeer::NOMCONFORREC, $this->nomconforrec);
		if ($this->isColumnModified(CadphartPeer::CEDCONFORREC)) $criteria->add(CadphartPeer::CEDCONFORREC, $this->cedconforrec);
		if ($this->isColumnModified(CadphartPeer::HORLLECONFORREC)) $criteria->add(CadphartPeer::HORLLECONFORREC, $this->horlleconforrec);
		if ($this->isColumnModified(CadphartPeer::ID)) $criteria->add(CadphartPeer::ID, $this->id);

		return $criteria;
	}


	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadphartPeer::DATABASE_NAME);

		$criteria->add(CadphartPeer::ID, $this->id);

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

		$copyObj->setDphart($this->dphart);

		$copyObj->setFecdph($this->fecdph);

		$copyObj->setReqart($this->reqart);

		$copyObj->setDesdph($this->desdph);

		$copyObj->setCodori($this->codori);

		$copyObj->setStadph($this->stadph);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setRefpag($this->refpag);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setTipdph($this->tipdph);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setMondph($this->mondph);

		$copyObj->setObsdph($this->obsdph);

		$copyObj->setFordesp($this->fordesp);

		$copyObj->setReapor($this->reapor);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setTipref($this->tipref);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setFecemiov($this->fecemiov);

		$copyObj->setFeccarov($this->feccarov);

		$copyObj->setLocori($this->locori);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setRubro($this->rubro);

		$copyObj->setCankg($this->cankg);

		$copyObj->setTotpasreal($this->totpasreal);

		$copyObj->setLocrec($this->locrec);

		$copyObj->setEmptra($this->emptra);

		$copyObj->setNomrep($this->nomrep);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setChoveh($this->choveh);

		$copyObj->setCedcho($this->cedcho);

		$copyObj->setTelcho($this->telcho);

		$copyObj->setNomconfordes($this->nomconfordes);

		$copyObj->setCedconfordes($this->cedconfordes);

		$copyObj->setHorsalconfordes($this->horsalconfordes);

		$copyObj->setNomconforrec($this->nomconforrec);

		$copyObj->setCedconforrec($this->cedconforrec);

		$copyObj->setHorlleconforrec($this->horlleconforrec);


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
			self::$peer = new CadphartPeer();
		}
		return self::$peer;
	}

}