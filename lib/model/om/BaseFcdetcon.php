<?php


abstract class BaseFcdetcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcon;


	
	protected $numdec;


	
	protected $moncuo;


	
	protected $numcuo;


	
	protected $monpag;


	
	protected $obscuo;


	
	protected $fecven;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcon()
  {

    return trim($this->refcon);

  }
  
  public function getNumdec()
  {

    return trim($this->numdec);

  }
  
  public function getMoncuo($val=false)
  {

    if($val) return number_format($this->moncuo,2,',','.');
    else return $this->moncuo;

  }
  
  public function getNumcuo()
  {

    return trim($this->numcuo);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getObscuo()
  {

    return trim($this->obscuo);

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

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcon($v)
	{

    if ($this->refcon !== $v) {
        $this->refcon = $v;
        $this->modifiedColumns[] = FcdetconPeer::REFCON;
      }
  
	} 
	
	public function setNumdec($v)
	{

    if ($this->numdec !== $v) {
        $this->numdec = $v;
        $this->modifiedColumns[] = FcdetconPeer::NUMDEC;
      }
  
	} 
	
	public function setMoncuo($v)
	{

    if ($this->moncuo !== $v) {
        $this->moncuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetconPeer::MONCUO;
      }
  
	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = $v;
        $this->modifiedColumns[] = FcdetconPeer::NUMCUO;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetconPeer::MONPAG;
      }
  
	} 
	
	public function setObscuo($v)
	{

    if ($this->obscuo !== $v) {
        $this->obscuo = $v;
        $this->modifiedColumns[] = FcdetconPeer::OBSCUO;
      }
  
	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FcdetconPeer::FECVEN;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcon = $rs->getString($startcol + 0);

      $this->numdec = $rs->getString($startcol + 1);

      $this->moncuo = $rs->getFloat($startcol + 2);

      $this->numcuo = $rs->getString($startcol + 3);

      $this->monpag = $rs->getFloat($startcol + 4);

      $this->obscuo = $rs->getString($startcol + 5);

      $this->fecven = $rs->getDate($startcol + 6, null);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetcon object", $e);
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
			$con = Propel::getConnection(FcdetconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetconPeer::DATABASE_NAME);
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
					$pk = FcdetconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetconPeer::doUpdate($this, $con);
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


			if (($retval = FcdetconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcon();
				break;
			case 1:
				return $this->getNumdec();
				break;
			case 2:
				return $this->getMoncuo();
				break;
			case 3:
				return $this->getNumcuo();
				break;
			case 4:
				return $this->getMonpag();
				break;
			case 5:
				return $this->getObscuo();
				break;
			case 6:
				return $this->getFecven();
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
		$keys = FcdetconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcon(),
			$keys[1] => $this->getNumdec(),
			$keys[2] => $this->getMoncuo(),
			$keys[3] => $this->getNumcuo(),
			$keys[4] => $this->getMonpag(),
			$keys[5] => $this->getObscuo(),
			$keys[6] => $this->getFecven(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcon($value);
				break;
			case 1:
				$this->setNumdec($value);
				break;
			case 2:
				$this->setMoncuo($value);
				break;
			case 3:
				$this->setNumcuo($value);
				break;
			case 4:
				$this->setMonpag($value);
				break;
			case 5:
				$this->setObscuo($value);
				break;
			case 6:
				$this->setFecven($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumdec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoncuo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumcuo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObscuo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecven($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetconPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetconPeer::REFCON)) $criteria->add(FcdetconPeer::REFCON, $this->refcon);
		if ($this->isColumnModified(FcdetconPeer::NUMDEC)) $criteria->add(FcdetconPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcdetconPeer::MONCUO)) $criteria->add(FcdetconPeer::MONCUO, $this->moncuo);
		if ($this->isColumnModified(FcdetconPeer::NUMCUO)) $criteria->add(FcdetconPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(FcdetconPeer::MONPAG)) $criteria->add(FcdetconPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcdetconPeer::OBSCUO)) $criteria->add(FcdetconPeer::OBSCUO, $this->obscuo);
		if ($this->isColumnModified(FcdetconPeer::FECVEN)) $criteria->add(FcdetconPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FcdetconPeer::ID)) $criteria->add(FcdetconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetconPeer::DATABASE_NAME);

		$criteria->add(FcdetconPeer::ID, $this->id);

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

		$copyObj->setRefcon($this->refcon);

		$copyObj->setNumdec($this->numdec);

		$copyObj->setMoncuo($this->moncuo);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setObscuo($this->obscuo);

		$copyObj->setFecven($this->fecven);


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
			self::$peer = new FcdetconPeer();
		}
		return self::$peer;
	}

} 