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

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
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
			$keys[18] => $this->getId(),
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
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
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