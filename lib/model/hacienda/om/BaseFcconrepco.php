<?php


abstract class BaseFcconrepco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedcon;


	
	protected $rifcon;


	
	protected $nomcon;


	
	protected $repcon;


	
	protected $dircon;


	
	protected $telcon;


	
	protected $emacon;


	
	protected $codsec;


	
	protected $codpar;


	
	protected $nitcon;


	
	protected $codmun;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $ciucon;


	
	protected $cpocon;


	
	protected $apocon;


	
	protected $urlcon;


	
	protected $naccon;


	
	protected $tipcon;


	
	protected $faxcon;


	
	protected $clacon;


	
	protected $fecdescon;


	
	protected $fecactcon;


	
	protected $stacon;


	
	protected $origen;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedcon()
  {

    return trim($this->cedcon);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getRepcon()
  {

    return trim($this->repcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getTelcon()
  {

    return trim($this->telcon);

  }
  
  public function getEmacon()
  {

    return trim($this->emacon);

  }
  
  public function getCodsec()
  {

    return trim($this->codsec);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getNitcon()
  {

    return trim($this->nitcon);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCiucon()
  {

    return trim($this->ciucon);

  }
  
  public function getCpocon()
  {

    return trim($this->cpocon);

  }
  
  public function getApocon()
  {

    return trim($this->apocon);

  }
  
  public function getUrlcon()
  {

    return trim($this->urlcon);

  }
  
  public function getNaccon()
  {

    return trim($this->naccon);

  }
  
  public function getTipcon()
  {

    return trim($this->tipcon);

  }
  
  public function getFaxcon()
  {

    return trim($this->faxcon);

  }
  
  public function getClacon()
  {

    return trim($this->clacon);

  }
  
  public function getFecdescon($format = 'Y-m-d')
  {

    if ($this->fecdescon === null || $this->fecdescon === '') {
      return null;
    } elseif (!is_int($this->fecdescon)) {
            $ts = adodb_strtotime($this->fecdescon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdescon] as date/time value: " . var_export($this->fecdescon, true));
      }
    } else {
      $ts = $this->fecdescon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecactcon($format = 'Y-m-d')
  {

    if ($this->fecactcon === null || $this->fecactcon === '') {
      return null;
    } elseif (!is_int($this->fecactcon)) {
            $ts = adodb_strtotime($this->fecactcon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecactcon] as date/time value: " . var_export($this->fecactcon, true));
      }
    } else {
      $ts = $this->fecactcon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getOrigen()
  {

    return trim($this->origen);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedcon($v)
	{

    if ($this->cedcon !== $v) {
        $this->cedcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CEDCON;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::RIFCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::NOMCON;
      }
  
	} 
	
	public function setRepcon($v)
	{

    if ($this->repcon !== $v) {
        $this->repcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::REPCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::DIRCON;
      }
  
	} 
	
	public function setTelcon($v)
	{

    if ($this->telcon !== $v) {
        $this->telcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::TELCON;
      }
  
	} 
	
	public function setEmacon($v)
	{

    if ($this->emacon !== $v) {
        $this->emacon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::EMACON;
      }
  
	} 
	
	public function setCodsec($v)
	{

    if ($this->codsec !== $v) {
        $this->codsec = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CODSEC;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CODPAR;
      }
  
	} 
	
	public function setNitcon($v)
	{

    if ($this->nitcon !== $v) {
        $this->nitcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::NITCON;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CODMUN;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CODEDO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CODPAI;
      }
  
	} 
	
	public function setCiucon($v)
	{

    if ($this->ciucon !== $v) {
        $this->ciucon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CIUCON;
      }
  
	} 
	
	public function setCpocon($v)
	{

    if ($this->cpocon !== $v) {
        $this->cpocon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CPOCON;
      }
  
	} 
	
	public function setApocon($v)
	{

    if ($this->apocon !== $v) {
        $this->apocon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::APOCON;
      }
  
	} 
	
	public function setUrlcon($v)
	{

    if ($this->urlcon !== $v) {
        $this->urlcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::URLCON;
      }
  
	} 
	
	public function setNaccon($v)
	{

    if ($this->naccon !== $v) {
        $this->naccon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::NACCON;
      }
  
	} 
	
	public function setTipcon($v)
	{

    if ($this->tipcon !== $v) {
        $this->tipcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::TIPCON;
      }
  
	} 
	
	public function setFaxcon($v)
	{

    if ($this->faxcon !== $v) {
        $this->faxcon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::FAXCON;
      }
  
	} 
	
	public function setClacon($v)
	{

    if ($this->clacon !== $v) {
        $this->clacon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::CLACON;
      }
  
	} 
	
	public function setFecdescon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdescon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdescon !== $ts) {
      $this->fecdescon = $ts;
      $this->modifiedColumns[] = FcconrepcoPeer::FECDESCON;
    }

	} 
	
	public function setFecactcon($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecactcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecactcon !== $ts) {
      $this->fecactcon = $ts;
      $this->modifiedColumns[] = FcconrepcoPeer::FECACTCON;
    }

	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::STACON;
      }
  
	} 
	
	public function setOrigen($v)
	{

    if ($this->origen !== $v) {
        $this->origen = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::ORIGEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcconrepcoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedcon = $rs->getString($startcol + 0);

      $this->rifcon = $rs->getString($startcol + 1);

      $this->nomcon = $rs->getString($startcol + 2);

      $this->repcon = $rs->getString($startcol + 3);

      $this->dircon = $rs->getString($startcol + 4);

      $this->telcon = $rs->getString($startcol + 5);

      $this->emacon = $rs->getString($startcol + 6);

      $this->codsec = $rs->getString($startcol + 7);

      $this->codpar = $rs->getString($startcol + 8);

      $this->nitcon = $rs->getString($startcol + 9);

      $this->codmun = $rs->getString($startcol + 10);

      $this->codedo = $rs->getString($startcol + 11);

      $this->codpai = $rs->getString($startcol + 12);

      $this->ciucon = $rs->getString($startcol + 13);

      $this->cpocon = $rs->getString($startcol + 14);

      $this->apocon = $rs->getString($startcol + 15);

      $this->urlcon = $rs->getString($startcol + 16);

      $this->naccon = $rs->getString($startcol + 17);

      $this->tipcon = $rs->getString($startcol + 18);

      $this->faxcon = $rs->getString($startcol + 19);

      $this->clacon = $rs->getString($startcol + 20);

      $this->fecdescon = $rs->getDate($startcol + 21, null);

      $this->fecactcon = $rs->getDate($startcol + 22, null);

      $this->stacon = $rs->getString($startcol + 23);

      $this->origen = $rs->getString($startcol + 24);

      $this->id = $rs->getInt($startcol + 25);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 26; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcconrepco object", $e);
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
			$con = Propel::getConnection(FcconrepcoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcconrepcoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcconrepcoPeer::DATABASE_NAME);
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
					$pk = FcconrepcoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcconrepcoPeer::doUpdate($this, $con);
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


			if (($retval = FcconrepcoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconrepcoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedcon();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getRepcon();
				break;
			case 4:
				return $this->getDircon();
				break;
			case 5:
				return $this->getTelcon();
				break;
			case 6:
				return $this->getEmacon();
				break;
			case 7:
				return $this->getCodsec();
				break;
			case 8:
				return $this->getCodpar();
				break;
			case 9:
				return $this->getNitcon();
				break;
			case 10:
				return $this->getCodmun();
				break;
			case 11:
				return $this->getCodedo();
				break;
			case 12:
				return $this->getCodpai();
				break;
			case 13:
				return $this->getCiucon();
				break;
			case 14:
				return $this->getCpocon();
				break;
			case 15:
				return $this->getApocon();
				break;
			case 16:
				return $this->getUrlcon();
				break;
			case 17:
				return $this->getNaccon();
				break;
			case 18:
				return $this->getTipcon();
				break;
			case 19:
				return $this->getFaxcon();
				break;
			case 20:
				return $this->getClacon();
				break;
			case 21:
				return $this->getFecdescon();
				break;
			case 22:
				return $this->getFecactcon();
				break;
			case 23:
				return $this->getStacon();
				break;
			case 24:
				return $this->getOrigen();
				break;
			case 25:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconrepcoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedcon(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getRepcon(),
			$keys[4] => $this->getDircon(),
			$keys[5] => $this->getTelcon(),
			$keys[6] => $this->getEmacon(),
			$keys[7] => $this->getCodsec(),
			$keys[8] => $this->getCodpar(),
			$keys[9] => $this->getNitcon(),
			$keys[10] => $this->getCodmun(),
			$keys[11] => $this->getCodedo(),
			$keys[12] => $this->getCodpai(),
			$keys[13] => $this->getCiucon(),
			$keys[14] => $this->getCpocon(),
			$keys[15] => $this->getApocon(),
			$keys[16] => $this->getUrlcon(),
			$keys[17] => $this->getNaccon(),
			$keys[18] => $this->getTipcon(),
			$keys[19] => $this->getFaxcon(),
			$keys[20] => $this->getClacon(),
			$keys[21] => $this->getFecdescon(),
			$keys[22] => $this->getFecactcon(),
			$keys[23] => $this->getStacon(),
			$keys[24] => $this->getOrigen(),
			$keys[25] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcconrepcoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedcon($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setRepcon($value);
				break;
			case 4:
				$this->setDircon($value);
				break;
			case 5:
				$this->setTelcon($value);
				break;
			case 6:
				$this->setEmacon($value);
				break;
			case 7:
				$this->setCodsec($value);
				break;
			case 8:
				$this->setCodpar($value);
				break;
			case 9:
				$this->setNitcon($value);
				break;
			case 10:
				$this->setCodmun($value);
				break;
			case 11:
				$this->setCodedo($value);
				break;
			case 12:
				$this->setCodpai($value);
				break;
			case 13:
				$this->setCiucon($value);
				break;
			case 14:
				$this->setCpocon($value);
				break;
			case 15:
				$this->setApocon($value);
				break;
			case 16:
				$this->setUrlcon($value);
				break;
			case 17:
				$this->setNaccon($value);
				break;
			case 18:
				$this->setTipcon($value);
				break;
			case 19:
				$this->setFaxcon($value);
				break;
			case 20:
				$this->setClacon($value);
				break;
			case 21:
				$this->setFecdescon($value);
				break;
			case 22:
				$this->setFecactcon($value);
				break;
			case 23:
				$this->setStacon($value);
				break;
			case 24:
				$this->setOrigen($value);
				break;
			case 25:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcconrepcoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRepcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDircon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEmacon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodsec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodpar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNitcon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodmun($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodedo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpai($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCiucon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCpocon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setApocon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUrlcon($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNaccon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipcon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFaxcon($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setClacon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecdescon($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecactcon($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setStacon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setOrigen($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setId($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcconrepcoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcconrepcoPeer::CEDCON)) $criteria->add(FcconrepcoPeer::CEDCON, $this->cedcon);
		if ($this->isColumnModified(FcconrepcoPeer::RIFCON)) $criteria->add(FcconrepcoPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcconrepcoPeer::NOMCON)) $criteria->add(FcconrepcoPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcconrepcoPeer::REPCON)) $criteria->add(FcconrepcoPeer::REPCON, $this->repcon);
		if ($this->isColumnModified(FcconrepcoPeer::DIRCON)) $criteria->add(FcconrepcoPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcconrepcoPeer::TELCON)) $criteria->add(FcconrepcoPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(FcconrepcoPeer::EMACON)) $criteria->add(FcconrepcoPeer::EMACON, $this->emacon);
		if ($this->isColumnModified(FcconrepcoPeer::CODSEC)) $criteria->add(FcconrepcoPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(FcconrepcoPeer::CODPAR)) $criteria->add(FcconrepcoPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcconrepcoPeer::NITCON)) $criteria->add(FcconrepcoPeer::NITCON, $this->nitcon);
		if ($this->isColumnModified(FcconrepcoPeer::CODMUN)) $criteria->add(FcconrepcoPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FcconrepcoPeer::CODEDO)) $criteria->add(FcconrepcoPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FcconrepcoPeer::CODPAI)) $criteria->add(FcconrepcoPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(FcconrepcoPeer::CIUCON)) $criteria->add(FcconrepcoPeer::CIUCON, $this->ciucon);
		if ($this->isColumnModified(FcconrepcoPeer::CPOCON)) $criteria->add(FcconrepcoPeer::CPOCON, $this->cpocon);
		if ($this->isColumnModified(FcconrepcoPeer::APOCON)) $criteria->add(FcconrepcoPeer::APOCON, $this->apocon);
		if ($this->isColumnModified(FcconrepcoPeer::URLCON)) $criteria->add(FcconrepcoPeer::URLCON, $this->urlcon);
		if ($this->isColumnModified(FcconrepcoPeer::NACCON)) $criteria->add(FcconrepcoPeer::NACCON, $this->naccon);
		if ($this->isColumnModified(FcconrepcoPeer::TIPCON)) $criteria->add(FcconrepcoPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(FcconrepcoPeer::FAXCON)) $criteria->add(FcconrepcoPeer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(FcconrepcoPeer::CLACON)) $criteria->add(FcconrepcoPeer::CLACON, $this->clacon);
		if ($this->isColumnModified(FcconrepcoPeer::FECDESCON)) $criteria->add(FcconrepcoPeer::FECDESCON, $this->fecdescon);
		if ($this->isColumnModified(FcconrepcoPeer::FECACTCON)) $criteria->add(FcconrepcoPeer::FECACTCON, $this->fecactcon);
		if ($this->isColumnModified(FcconrepcoPeer::STACON)) $criteria->add(FcconrepcoPeer::STACON, $this->stacon);
		if ($this->isColumnModified(FcconrepcoPeer::ORIGEN)) $criteria->add(FcconrepcoPeer::ORIGEN, $this->origen);
		if ($this->isColumnModified(FcconrepcoPeer::ID)) $criteria->add(FcconrepcoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcconrepcoPeer::DATABASE_NAME);

		$criteria->add(FcconrepcoPeer::ID, $this->id);

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

		$copyObj->setCedcon($this->cedcon);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setRepcon($this->repcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setEmacon($this->emacon);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setNitcon($this->nitcon);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCiucon($this->ciucon);

		$copyObj->setCpocon($this->cpocon);

		$copyObj->setApocon($this->apocon);

		$copyObj->setUrlcon($this->urlcon);

		$copyObj->setNaccon($this->naccon);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setFaxcon($this->faxcon);

		$copyObj->setClacon($this->clacon);

		$copyObj->setFecdescon($this->fecdescon);

		$copyObj->setFecactcon($this->fecactcon);

		$copyObj->setStacon($this->stacon);

		$copyObj->setOrigen($this->origen);


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
			self::$peer = new FcconrepcoPeer();
		}
		return self::$peer;
	}

} 