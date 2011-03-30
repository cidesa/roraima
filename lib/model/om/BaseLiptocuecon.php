<?php


abstract class BaseLiptocuecon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numptocuecon;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $detrecomen;


	
	protected $numrecofe;


	
	protected $codpro;


	
	protected $resolu;


	
	protected $fecrel;


	
	protected $decret;


	
	protected $fecdec;


	
	protected $detdecret;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $cargoana;


	
	protected $status;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumptocuecon()
  {

    return trim($this->numptocuecon);

  }
  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

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

  
  public function getDias()
  {

    return $this->dias;

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

  
  public function getDetrecomen()
  {

    return trim($this->detrecomen);

  }
  
  public function getNumrecofe()
  {

    return trim($this->numrecofe);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getResolu()
  {

    return trim($this->resolu);

  }
  
  public function getFecrel($format = 'Y-m-d')
  {

    if ($this->fecrel === null || $this->fecrel === '') {
      return null;
    } elseif (!is_int($this->fecrel)) {
            $ts = adodb_strtotime($this->fecrel);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrel] as date/time value: " . var_export($this->fecrel, true));
      }
    } else {
      $ts = $this->fecrel;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDecret()
  {

    return trim($this->decret);

  }
  
  public function getFecdec($format = 'Y-m-d')
  {

    if ($this->fecdec === null || $this->fecdec === '') {
      return null;
    } elseif (!is_int($this->fecdec)) {
            $ts = adodb_strtotime($this->fecdec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
      }
    } else {
      $ts = $this->fecdec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDetdecret()
  {

    return trim($this->detdecret);

  }
  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getCargopre()
  {

    return trim($this->cargopre);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getCargoana()
  {

    return trim($this->cargoana);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumptocuecon($v)
	{

    if ($this->numptocuecon !== $v) {
        $this->numptocuecon = $v;
        $this->modifiedColumns[] = LiptocueconPeer::NUMPTOCUECON;
      }
  
	} 
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LiptocueconPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LiptocueconPeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiptocueconPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DIAS;
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
      $this->modifiedColumns[] = LiptocueconPeer::FECVEN;
    }

	} 
	
	public function setDetrecomen($v)
	{

    if ($this->detrecomen !== $v) {
        $this->detrecomen = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DETRECOMEN;
      }
  
	} 
	
	public function setNumrecofe($v)
	{

    if ($this->numrecofe !== $v) {
        $this->numrecofe = $v;
        $this->modifiedColumns[] = LiptocueconPeer::NUMRECOFE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CODPRO;
      }
  
	} 
	
	public function setResolu($v)
	{

    if ($this->resolu !== $v) {
        $this->resolu = $v;
        $this->modifiedColumns[] = LiptocueconPeer::RESOLU;
      }
  
	} 
	
	public function setFecrel($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrel] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrel !== $ts) {
      $this->fecrel = $ts;
      $this->modifiedColumns[] = LiptocueconPeer::FECREL;
    }

	} 
	
	public function setDecret($v)
	{

    if ($this->decret !== $v) {
        $this->decret = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DECRET;
      }
  
	} 
	
	public function setFecdec($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdec !== $ts) {
      $this->fecdec = $ts;
      $this->modifiedColumns[] = LiptocueconPeer::FECDEC;
    }

	} 
	
	public function setDetdecret($v)
	{

    if ($this->detdecret !== $v) {
        $this->detdecret = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DETDECRET;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiptocueconPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CARGOPRE;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiptocueconPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiptocueconPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiptocueconPeer::ANAPOR;
      }
  
	} 
	
	public function setCargoana($v)
	{

    if ($this->cargoana !== $v) {
        $this->cargoana = $v;
        $this->modifiedColumns[] = LiptocueconPeer::CARGOANA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiptocueconPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiptocueconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numptocuecon = $rs->getString($startcol + 0);

      $this->numplie = $rs->getString($startcol + 1);

      $this->numexp = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->detrecomen = $rs->getString($startcol + 10);

      $this->numrecofe = $rs->getString($startcol + 11);

      $this->codpro = $rs->getString($startcol + 12);

      $this->resolu = $rs->getString($startcol + 13);

      $this->fecrel = $rs->getDate($startcol + 14, null);

      $this->decret = $rs->getString($startcol + 15);

      $this->fecdec = $rs->getDate($startcol + 16, null);

      $this->detdecret = $rs->getString($startcol + 17);

      $this->docane1 = $rs->getString($startcol + 18);

      $this->docane2 = $rs->getString($startcol + 19);

      $this->docane3 = $rs->getString($startcol + 20);

      $this->prepor = $rs->getString($startcol + 21);

      $this->cargopre = $rs->getString($startcol + 22);

      $this->lisicact_id = $rs->getInt($startcol + 23);

      $this->detdecmod = $rs->getString($startcol + 24);

      $this->anapor = $rs->getString($startcol + 25);

      $this->cargoana = $rs->getString($startcol + 26);

      $this->status = $rs->getString($startcol + 27);

      $this->id = $rs->getInt($startcol + 28);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 29; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liptocuecon object", $e);
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
			$con = Propel::getConnection(LiptocueconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiptocueconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiptocueconPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiptocueconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiptocueconPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LiptocueconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiptocueconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumptocuecon();
				break;
			case 1:
				return $this->getNumplie();
				break;
			case 2:
				return $this->getNumexp();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getFecven();
				break;
			case 10:
				return $this->getDetrecomen();
				break;
			case 11:
				return $this->getNumrecofe();
				break;
			case 12:
				return $this->getCodpro();
				break;
			case 13:
				return $this->getResolu();
				break;
			case 14:
				return $this->getFecrel();
				break;
			case 15:
				return $this->getDecret();
				break;
			case 16:
				return $this->getFecdec();
				break;
			case 17:
				return $this->getDetdecret();
				break;
			case 18:
				return $this->getDocane1();
				break;
			case 19:
				return $this->getDocane2();
				break;
			case 20:
				return $this->getDocane3();
				break;
			case 21:
				return $this->getPrepor();
				break;
			case 22:
				return $this->getCargopre();
				break;
			case 23:
				return $this->getLisicactId();
				break;
			case 24:
				return $this->getDetdecmod();
				break;
			case 25:
				return $this->getAnapor();
				break;
			case 26:
				return $this->getCargoana();
				break;
			case 27:
				return $this->getStatus();
				break;
			case 28:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiptocueconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumptocuecon(),
			$keys[1] => $this->getNumplie(),
			$keys[2] => $this->getNumexp(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getDetrecomen(),
			$keys[11] => $this->getNumrecofe(),
			$keys[12] => $this->getCodpro(),
			$keys[13] => $this->getResolu(),
			$keys[14] => $this->getFecrel(),
			$keys[15] => $this->getDecret(),
			$keys[16] => $this->getFecdec(),
			$keys[17] => $this->getDetdecret(),
			$keys[18] => $this->getDocane1(),
			$keys[19] => $this->getDocane2(),
			$keys[20] => $this->getDocane3(),
			$keys[21] => $this->getPrepor(),
			$keys[22] => $this->getCargopre(),
			$keys[23] => $this->getLisicactId(),
			$keys[24] => $this->getDetdecmod(),
			$keys[25] => $this->getAnapor(),
			$keys[26] => $this->getCargoana(),
			$keys[27] => $this->getStatus(),
			$keys[28] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiptocueconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumptocuecon($value);
				break;
			case 1:
				$this->setNumplie($value);
				break;
			case 2:
				$this->setNumexp($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setFecven($value);
				break;
			case 10:
				$this->setDetrecomen($value);
				break;
			case 11:
				$this->setNumrecofe($value);
				break;
			case 12:
				$this->setCodpro($value);
				break;
			case 13:
				$this->setResolu($value);
				break;
			case 14:
				$this->setFecrel($value);
				break;
			case 15:
				$this->setDecret($value);
				break;
			case 16:
				$this->setFecdec($value);
				break;
			case 17:
				$this->setDetdecret($value);
				break;
			case 18:
				$this->setDocane1($value);
				break;
			case 19:
				$this->setDocane2($value);
				break;
			case 20:
				$this->setDocane3($value);
				break;
			case 21:
				$this->setPrepor($value);
				break;
			case 22:
				$this->setCargopre($value);
				break;
			case 23:
				$this->setLisicactId($value);
				break;
			case 24:
				$this->setDetdecmod($value);
				break;
			case 25:
				$this->setAnapor($value);
				break;
			case 26:
				$this->setCargoana($value);
				break;
			case 27:
				$this->setStatus($value);
				break;
			case 28:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiptocueconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumptocuecon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumplie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDetrecomen($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNumrecofe($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpro($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setResolu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecrel($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDecret($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecdec($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDetdecret($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocane1($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDocane2($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDocane3($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPrepor($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCargopre($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setLisicactId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDetdecmod($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setAnapor($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCargoana($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setStatus($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setId($arr[$keys[28]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiptocueconPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiptocueconPeer::NUMPTOCUECON)) $criteria->add(LiptocueconPeer::NUMPTOCUECON, $this->numptocuecon);
		if ($this->isColumnModified(LiptocueconPeer::NUMPLIE)) $criteria->add(LiptocueconPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LiptocueconPeer::NUMEXP)) $criteria->add(LiptocueconPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LiptocueconPeer::CODEMPADM)) $criteria->add(LiptocueconPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiptocueconPeer::CODUNIADM)) $criteria->add(LiptocueconPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiptocueconPeer::CODEMPEJE)) $criteria->add(LiptocueconPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiptocueconPeer::CODUNISTE)) $criteria->add(LiptocueconPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiptocueconPeer::FECREG)) $criteria->add(LiptocueconPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiptocueconPeer::DIAS)) $criteria->add(LiptocueconPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiptocueconPeer::FECVEN)) $criteria->add(LiptocueconPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiptocueconPeer::DETRECOMEN)) $criteria->add(LiptocueconPeer::DETRECOMEN, $this->detrecomen);
		if ($this->isColumnModified(LiptocueconPeer::NUMRECOFE)) $criteria->add(LiptocueconPeer::NUMRECOFE, $this->numrecofe);
		if ($this->isColumnModified(LiptocueconPeer::CODPRO)) $criteria->add(LiptocueconPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LiptocueconPeer::RESOLU)) $criteria->add(LiptocueconPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(LiptocueconPeer::FECREL)) $criteria->add(LiptocueconPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(LiptocueconPeer::DECRET)) $criteria->add(LiptocueconPeer::DECRET, $this->decret);
		if ($this->isColumnModified(LiptocueconPeer::FECDEC)) $criteria->add(LiptocueconPeer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(LiptocueconPeer::DETDECRET)) $criteria->add(LiptocueconPeer::DETDECRET, $this->detdecret);
		if ($this->isColumnModified(LiptocueconPeer::DOCANE1)) $criteria->add(LiptocueconPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiptocueconPeer::DOCANE2)) $criteria->add(LiptocueconPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiptocueconPeer::DOCANE3)) $criteria->add(LiptocueconPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiptocueconPeer::PREPOR)) $criteria->add(LiptocueconPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiptocueconPeer::CARGOPRE)) $criteria->add(LiptocueconPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LiptocueconPeer::LISICACT_ID)) $criteria->add(LiptocueconPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiptocueconPeer::DETDECMOD)) $criteria->add(LiptocueconPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiptocueconPeer::ANAPOR)) $criteria->add(LiptocueconPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiptocueconPeer::CARGOANA)) $criteria->add(LiptocueconPeer::CARGOANA, $this->cargoana);
		if ($this->isColumnModified(LiptocueconPeer::STATUS)) $criteria->add(LiptocueconPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiptocueconPeer::ID)) $criteria->add(LiptocueconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiptocueconPeer::DATABASE_NAME);

		$criteria->add(LiptocueconPeer::ID, $this->id);

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

		$copyObj->setNumptocuecon($this->numptocuecon);

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setDetrecomen($this->detrecomen);

		$copyObj->setNumrecofe($this->numrecofe);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setResolu($this->resolu);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setDecret($this->decret);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setDetdecret($this->detdecret);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setCargoana($this->cargoana);

		$copyObj->setStatus($this->status);


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
			self::$peer = new LiptocueconPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 