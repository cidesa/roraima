<?php


abstract class BaseFcrepfis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numlic;


	
	protected $funrec;


	
	protected $fecrep;


	
	protected $numrep;


	
	protected $monrep;


	
	protected $conrep;


	
	protected $modo;


	
	protected $monadi;


	
	protected $fuerep;


	
	protected $fuesan;


	
	protected $fecrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumlic()
  {

    return trim($this->numlic);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getFecrep($format = 'Y-m-d')
  {

    if ($this->fecrep === null || $this->fecrep === '') {
      return null;
    } elseif (!is_int($this->fecrep)) {
            $ts = adodb_strtotime($this->fecrep);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrep] as date/time value: " . var_export($this->fecrep, true));
      }
    } else {
      $ts = $this->fecrep;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumrep()
  {

    return trim($this->numrep);

  }
  
  public function getMonrep($val=false)
  {

    if($val) return number_format($this->monrep,2,',','.');
    else return $this->monrep;

  }
  
  public function getConrep()
  {

    return trim($this->conrep);

  }
  
  public function getModo()
  {

    return trim($this->modo);

  }
  
  public function getMonadi($val=false)
  {

    if($val) return number_format($this->monadi,2,',','.');
    else return $this->monadi;

  }
  
  public function getFuerep()
  {

    return trim($this->fuerep);

  }
  
  public function getFuesan()
  {

    return trim($this->fuesan);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
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
	
	public function setNumlic($v)
	{

    if ($this->numlic !== $v) {
        $this->numlic = $v;
        $this->modifiedColumns[] = FcrepfisPeer::NUMLIC;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcrepfisPeer::FUNREC;
      }
  
	} 
	
	public function setFecrep($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrep] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrep !== $ts) {
      $this->fecrep = $ts;
      $this->modifiedColumns[] = FcrepfisPeer::FECREP;
    }

	} 
	
	public function setNumrep($v)
	{

    if ($this->numrep !== $v) {
        $this->numrep = $v;
        $this->modifiedColumns[] = FcrepfisPeer::NUMREP;
      }
  
	} 
	
	public function setMonrep($v)
	{

    if ($this->monrep !== $v) {
        $this->monrep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepfisPeer::MONREP;
      }
  
	} 
	
	public function setConrep($v)
	{

    if ($this->conrep !== $v) {
        $this->conrep = $v;
        $this->modifiedColumns[] = FcrepfisPeer::CONREP;
      }
  
	} 
	
	public function setModo($v)
	{

    if ($this->modo !== $v) {
        $this->modo = $v;
        $this->modifiedColumns[] = FcrepfisPeer::MODO;
      }
  
	} 
	
	public function setMonadi($v)
	{

    if ($this->monadi !== $v) {
        $this->monadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcrepfisPeer::MONADI;
      }
  
	} 
	
	public function setFuerep($v)
	{

    if ($this->fuerep !== $v) {
        $this->fuerep = $v;
        $this->modifiedColumns[] = FcrepfisPeer::FUEREP;
      }
  
	} 
	
	public function setFuesan($v)
	{

    if ($this->fuesan !== $v) {
        $this->fuesan = $v;
        $this->modifiedColumns[] = FcrepfisPeer::FUESAN;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = FcrepfisPeer::FECREC;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcrepfisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numlic = $rs->getString($startcol + 0);

      $this->funrec = $rs->getString($startcol + 1);

      $this->fecrep = $rs->getDate($startcol + 2, null);

      $this->numrep = $rs->getString($startcol + 3);

      $this->monrep = $rs->getFloat($startcol + 4);

      $this->conrep = $rs->getString($startcol + 5);

      $this->modo = $rs->getString($startcol + 6);

      $this->monadi = $rs->getFloat($startcol + 7);

      $this->fuerep = $rs->getString($startcol + 8);

      $this->fuesan = $rs->getString($startcol + 9);

      $this->fecrec = $rs->getDate($startcol + 10, null);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcrepfis object", $e);
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
			$con = Propel::getConnection(FcrepfisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrepfisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrepfisPeer::DATABASE_NAME);
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
					$pk = FcrepfisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcrepfisPeer::doUpdate($this, $con);
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


			if (($retval = FcrepfisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrepfisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumlic();
				break;
			case 1:
				return $this->getFunrec();
				break;
			case 2:
				return $this->getFecrep();
				break;
			case 3:
				return $this->getNumrep();
				break;
			case 4:
				return $this->getMonrep();
				break;
			case 5:
				return $this->getConrep();
				break;
			case 6:
				return $this->getModo();
				break;
			case 7:
				return $this->getMonadi();
				break;
			case 8:
				return $this->getFuerep();
				break;
			case 9:
				return $this->getFuesan();
				break;
			case 10:
				return $this->getFecrec();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrepfisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumlic(),
			$keys[1] => $this->getFunrec(),
			$keys[2] => $this->getFecrep(),
			$keys[3] => $this->getNumrep(),
			$keys[4] => $this->getMonrep(),
			$keys[5] => $this->getConrep(),
			$keys[6] => $this->getModo(),
			$keys[7] => $this->getMonadi(),
			$keys[8] => $this->getFuerep(),
			$keys[9] => $this->getFuesan(),
			$keys[10] => $this->getFecrec(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrepfisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumlic($value);
				break;
			case 1:
				$this->setFunrec($value);
				break;
			case 2:
				$this->setFecrep($value);
				break;
			case 3:
				$this->setNumrep($value);
				break;
			case 4:
				$this->setMonrep($value);
				break;
			case 5:
				$this->setConrep($value);
				break;
			case 6:
				$this->setModo($value);
				break;
			case 7:
				$this->setMonadi($value);
				break;
			case 8:
				$this->setFuerep($value);
				break;
			case 9:
				$this->setFuesan($value);
				break;
			case 10:
				$this->setFecrec($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrepfisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumlic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFunrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecrep($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumrep($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConrep($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setModo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonadi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFuerep($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFuesan($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecrec($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrepfisPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrepfisPeer::NUMLIC)) $criteria->add(FcrepfisPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcrepfisPeer::FUNREC)) $criteria->add(FcrepfisPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcrepfisPeer::FECREP)) $criteria->add(FcrepfisPeer::FECREP, $this->fecrep);
		if ($this->isColumnModified(FcrepfisPeer::NUMREP)) $criteria->add(FcrepfisPeer::NUMREP, $this->numrep);
		if ($this->isColumnModified(FcrepfisPeer::MONREP)) $criteria->add(FcrepfisPeer::MONREP, $this->monrep);
		if ($this->isColumnModified(FcrepfisPeer::CONREP)) $criteria->add(FcrepfisPeer::CONREP, $this->conrep);
		if ($this->isColumnModified(FcrepfisPeer::MODO)) $criteria->add(FcrepfisPeer::MODO, $this->modo);
		if ($this->isColumnModified(FcrepfisPeer::MONADI)) $criteria->add(FcrepfisPeer::MONADI, $this->monadi);
		if ($this->isColumnModified(FcrepfisPeer::FUEREP)) $criteria->add(FcrepfisPeer::FUEREP, $this->fuerep);
		if ($this->isColumnModified(FcrepfisPeer::FUESAN)) $criteria->add(FcrepfisPeer::FUESAN, $this->fuesan);
		if ($this->isColumnModified(FcrepfisPeer::FECREC)) $criteria->add(FcrepfisPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcrepfisPeer::ID)) $criteria->add(FcrepfisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrepfisPeer::DATABASE_NAME);

		$criteria->add(FcrepfisPeer::ID, $this->id);

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

		$copyObj->setNumlic($this->numlic);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrep($this->fecrep);

		$copyObj->setNumrep($this->numrep);

		$copyObj->setMonrep($this->monrep);

		$copyObj->setConrep($this->conrep);

		$copyObj->setModo($this->modo);

		$copyObj->setMonadi($this->monadi);

		$copyObj->setFuerep($this->fuerep);

		$copyObj->setFuesan($this->fuesan);

		$copyObj->setFecrec($this->fecrec);


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
			self::$peer = new FcrepfisPeer();
		}
		return self::$peer;
	}

} 