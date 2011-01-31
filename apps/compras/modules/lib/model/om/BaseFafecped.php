<?php


abstract class BaseFafecped extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroped;


	
	protected $codart;


	
	protected $canent;


	
	protected $canaju;


	
	protected $fecent;


	
	protected $fecaju;


	
	protected $stafec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroped()
  {

    return trim($this->nroped);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanent($val=false)
  {

    if($val) return number_format($this->canent,2,',','.');
    else return $this->canent;

  }
  
  public function getCanaju($val=false)
  {

    if($val) return number_format($this->canaju,2,',','.');
    else return $this->canaju;

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecaju($format = 'Y-m-d')
  {

    if ($this->fecaju === null || $this->fecaju === '') {
      return null;
    } elseif (!is_int($this->fecaju)) {
            $ts = adodb_strtotime($this->fecaju);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
      }
    } else {
      $ts = $this->fecaju;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStafec()
  {

    return trim($this->stafec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNroped($v)
	{

    if ($this->nroped !== $v) {
        $this->nroped = $v;
        $this->modifiedColumns[] = FafecpedPeer::NROPED;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FafecpedPeer::CODART;
      }
  
	} 
	
	public function setCanent($v)
	{

    if ($this->canent !== $v) {
        $this->canent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafecpedPeer::CANENT;
      }
  
	} 
	
	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafecpedPeer::CANAJU;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = FafecpedPeer::FECENT;
    }

	} 
	
	public function setFecaju($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaju !== $ts) {
      $this->fecaju = $ts;
      $this->modifiedColumns[] = FafecpedPeer::FECAJU;
    }

	} 
	
	public function setStafec($v)
	{

    if ($this->stafec !== $v) {
        $this->stafec = $v;
        $this->modifiedColumns[] = FafecpedPeer::STAFEC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FafecpedPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroped = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canent = $rs->getFloat($startcol + 2);

      $this->canaju = $rs->getFloat($startcol + 3);

      $this->fecent = $rs->getDate($startcol + 4, null);

      $this->fecaju = $rs->getDate($startcol + 5, null);

      $this->stafec = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fafecped object", $e);
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
			$con = Propel::getConnection(FafecpedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FafecpedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FafecpedPeer::DATABASE_NAME);
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
					$pk = FafecpedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FafecpedPeer::doUpdate($this, $con);
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


			if (($retval = FafecpedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafecpedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroped();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanent();
				break;
			case 3:
				return $this->getCanaju();
				break;
			case 4:
				return $this->getFecent();
				break;
			case 5:
				return $this->getFecaju();
				break;
			case 6:
				return $this->getStafec();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafecpedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroped(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanent(),
			$keys[3] => $this->getCanaju(),
			$keys[4] => $this->getFecent(),
			$keys[5] => $this->getFecaju(),
			$keys[6] => $this->getStafec(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafecpedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroped($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanent($value);
				break;
			case 3:
				$this->setCanaju($value);
				break;
			case 4:
				$this->setFecent($value);
				break;
			case 5:
				$this->setFecaju($value);
				break;
			case 6:
				$this->setStafec($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafecpedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroped($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanent($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecaju($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStafec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FafecpedPeer::DATABASE_NAME);

		if ($this->isColumnModified(FafecpedPeer::NROPED)) $criteria->add(FafecpedPeer::NROPED, $this->nroped);
		if ($this->isColumnModified(FafecpedPeer::CODART)) $criteria->add(FafecpedPeer::CODART, $this->codart);
		if ($this->isColumnModified(FafecpedPeer::CANENT)) $criteria->add(FafecpedPeer::CANENT, $this->canent);
		if ($this->isColumnModified(FafecpedPeer::CANAJU)) $criteria->add(FafecpedPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(FafecpedPeer::FECENT)) $criteria->add(FafecpedPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(FafecpedPeer::FECAJU)) $criteria->add(FafecpedPeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(FafecpedPeer::STAFEC)) $criteria->add(FafecpedPeer::STAFEC, $this->stafec);
		if ($this->isColumnModified(FafecpedPeer::ID)) $criteria->add(FafecpedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FafecpedPeer::DATABASE_NAME);

		$criteria->add(FafecpedPeer::ID, $this->id);

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

		$copyObj->setNroped($this->nroped);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanent($this->canent);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setFecent($this->fecent);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setStafec($this->stafec);


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
			self::$peer = new FafecpedPeer();
		}
		return self::$peer;
	}

} 