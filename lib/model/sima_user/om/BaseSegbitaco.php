<?php


abstract class BaseSegbitaco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmov;


	
	protected $codofi;


	
	protected $codapl;


	
	protected $codintusu;


	
	protected $fecope;


	
	protected $horope;


	
	protected $valcla;


	
	protected $codmod;


	
	protected $tipope;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefmov()
  {

    return trim($this->refmov);

  }
  
  public function getCodofi()
  {

    return trim($this->codofi);

  }
  
  public function getCodapl()
  {

    return trim($this->codapl);

  }
  
  public function getCodintusu()
  {

    return trim($this->codintusu);

  }
  
  public function getFecope($format = 'Y-m-d')
  {

    if ($this->fecope === null || $this->fecope === '') {
      return null;
    } elseif (!is_int($this->fecope)) {
            $ts = adodb_strtotime($this->fecope);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecope] as date/time value: " . var_export($this->fecope, true));
      }
    } else {
      $ts = $this->fecope;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorope($format = 'Y-m-d H:i:s')
  {

    if ($this->horope === null || $this->horope === '') {
      return null;
    } elseif (!is_int($this->horope)) {
            $ts = adodb_strtotime($this->horope);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horope] as date/time value: " . var_export($this->horope, true));
      }
    } else {
      $ts = $this->horope;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getValcla()
  {

    return trim($this->valcla);

  }
  
  public function getCodmod()
  {

    return trim($this->codmod);

  }
  
  public function getTipope()
  {

    return trim($this->tipope);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefmov($v)
	{

    if ($this->refmov !== $v) {
        $this->refmov = $v;
        $this->modifiedColumns[] = SegbitacoPeer::REFMOV;
      }
  
	} 
	
	public function setCodofi($v)
	{

    if ($this->codofi !== $v) {
        $this->codofi = $v;
        $this->modifiedColumns[] = SegbitacoPeer::CODOFI;
      }
  
	} 
	
	public function setCodapl($v)
	{

    if ($this->codapl !== $v) {
        $this->codapl = $v;
        $this->modifiedColumns[] = SegbitacoPeer::CODAPL;
      }
  
	} 
	
	public function setCodintusu($v)
	{

    if ($this->codintusu !== $v) {
        $this->codintusu = $v;
        $this->modifiedColumns[] = SegbitacoPeer::CODINTUSU;
      }
  
	} 
	
	public function setFecope($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecope] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecope !== $ts) {
      $this->fecope = $ts;
      $this->modifiedColumns[] = SegbitacoPeer::FECOPE;
    }

	} 
	
	public function setHorope($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horope] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horope !== $ts) {
      $this->horope = $ts;
      $this->modifiedColumns[] = SegbitacoPeer::HOROPE;
    }

	} 
	
	public function setValcla($v)
	{

    if ($this->valcla !== $v) {
        $this->valcla = $v;
        $this->modifiedColumns[] = SegbitacoPeer::VALCLA;
      }
  
	} 
	
	public function setCodmod($v)
	{

    if ($this->codmod !== $v) {
        $this->codmod = $v;
        $this->modifiedColumns[] = SegbitacoPeer::CODMOD;
      }
  
	} 
	
	public function setTipope($v)
	{

    if ($this->tipope !== $v) {
        $this->tipope = $v;
        $this->modifiedColumns[] = SegbitacoPeer::TIPOPE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = SegbitacoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refmov = $rs->getString($startcol + 0);

      $this->codofi = $rs->getString($startcol + 1);

      $this->codapl = $rs->getString($startcol + 2);

      $this->codintusu = $rs->getString($startcol + 3);

      $this->fecope = $rs->getDate($startcol + 4, null);

      $this->horope = $rs->getTimestamp($startcol + 5, null);

      $this->valcla = $rs->getString($startcol + 6);

      $this->codmod = $rs->getString($startcol + 7);

      $this->tipope = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Segbitaco object", $e);
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
			$con = Propel::getConnection(SegbitacoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SegbitacoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SegbitacoPeer::DATABASE_NAME);
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
					$pk = SegbitacoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SegbitacoPeer::doUpdate($this, $con);
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


			if (($retval = SegbitacoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SegbitacoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefmov();
				break;
			case 1:
				return $this->getCodofi();
				break;
			case 2:
				return $this->getCodapl();
				break;
			case 3:
				return $this->getCodintusu();
				break;
			case 4:
				return $this->getFecope();
				break;
			case 5:
				return $this->getHorope();
				break;
			case 6:
				return $this->getValcla();
				break;
			case 7:
				return $this->getCodmod();
				break;
			case 8:
				return $this->getTipope();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SegbitacoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmov(),
			$keys[1] => $this->getCodofi(),
			$keys[2] => $this->getCodapl(),
			$keys[3] => $this->getCodintusu(),
			$keys[4] => $this->getFecope(),
			$keys[5] => $this->getHorope(),
			$keys[6] => $this->getValcla(),
			$keys[7] => $this->getCodmod(),
			$keys[8] => $this->getTipope(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SegbitacoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefmov($value);
				break;
			case 1:
				$this->setCodofi($value);
				break;
			case 2:
				$this->setCodapl($value);
				break;
			case 3:
				$this->setCodintusu($value);
				break;
			case 4:
				$this->setFecope($value);
				break;
			case 5:
				$this->setHorope($value);
				break;
			case 6:
				$this->setValcla($value);
				break;
			case 7:
				$this->setCodmod($value);
				break;
			case 8:
				$this->setTipope($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SegbitacoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmov($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodofi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodapl($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodintusu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecope($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHorope($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setValcla($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodmod($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipope($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SegbitacoPeer::DATABASE_NAME);

		if ($this->isColumnModified(SegbitacoPeer::REFMOV)) $criteria->add(SegbitacoPeer::REFMOV, $this->refmov);
		if ($this->isColumnModified(SegbitacoPeer::CODOFI)) $criteria->add(SegbitacoPeer::CODOFI, $this->codofi);
		if ($this->isColumnModified(SegbitacoPeer::CODAPL)) $criteria->add(SegbitacoPeer::CODAPL, $this->codapl);
		if ($this->isColumnModified(SegbitacoPeer::CODINTUSU)) $criteria->add(SegbitacoPeer::CODINTUSU, $this->codintusu);
		if ($this->isColumnModified(SegbitacoPeer::FECOPE)) $criteria->add(SegbitacoPeer::FECOPE, $this->fecope);
		if ($this->isColumnModified(SegbitacoPeer::HOROPE)) $criteria->add(SegbitacoPeer::HOROPE, $this->horope);
		if ($this->isColumnModified(SegbitacoPeer::VALCLA)) $criteria->add(SegbitacoPeer::VALCLA, $this->valcla);
		if ($this->isColumnModified(SegbitacoPeer::CODMOD)) $criteria->add(SegbitacoPeer::CODMOD, $this->codmod);
		if ($this->isColumnModified(SegbitacoPeer::TIPOPE)) $criteria->add(SegbitacoPeer::TIPOPE, $this->tipope);
		if ($this->isColumnModified(SegbitacoPeer::ID)) $criteria->add(SegbitacoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SegbitacoPeer::DATABASE_NAME);

		$criteria->add(SegbitacoPeer::ID, $this->id);

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

		$copyObj->setRefmov($this->refmov);

		$copyObj->setCodofi($this->codofi);

		$copyObj->setCodapl($this->codapl);

		$copyObj->setCodintusu($this->codintusu);

		$copyObj->setFecope($this->fecope);

		$copyObj->setHorope($this->horope);

		$copyObj->setValcla($this->valcla);

		$copyObj->setCodmod($this->codmod);

		$copyObj->setTipope($this->tipope);


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
			self::$peer = new SegbitacoPeer();
		}
		return self::$peer;
	}

} 