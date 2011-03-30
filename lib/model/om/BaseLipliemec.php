<?php


abstract class BaseLipliemec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codmec;


	
	protected $fecsob1;


	
	protected $horsob1;


	
	protected $fecsob2;


	
	protected $horsob2;


	
	protected $dirofe;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodmec()
  {

    return trim($this->codmec);

  }
  
  public function getFecsob1($format = 'Y-m-d')
  {

    if ($this->fecsob1 === null || $this->fecsob1 === '') {
      return null;
    } elseif (!is_int($this->fecsob1)) {
            $ts = adodb_strtotime($this->fecsob1);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsob1] as date/time value: " . var_export($this->fecsob1, true));
      }
    } else {
      $ts = $this->fecsob1;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorsob1()
  {

    return trim($this->horsob1);

  }
  
  public function getFecsob2($format = 'Y-m-d')
  {

    if ($this->fecsob2 === null || $this->fecsob2 === '') {
      return null;
    } elseif (!is_int($this->fecsob2)) {
            $ts = adodb_strtotime($this->fecsob2);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsob2] as date/time value: " . var_export($this->fecsob2, true));
      }
    } else {
      $ts = $this->fecsob2;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorsob2()
  {

    return trim($this->horsob2);

  }
  
  public function getDirofe()
  {

    return trim($this->dirofe);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LipliemecPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LipliemecPeer::NUMEXP;
      }
  
	} 
	
	public function setCodmec($v)
	{

    if ($this->codmec !== $v) {
        $this->codmec = $v;
        $this->modifiedColumns[] = LipliemecPeer::CODMEC;
      }
  
	} 
	
	public function setFecsob1($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsob1] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsob1 !== $ts) {
      $this->fecsob1 = $ts;
      $this->modifiedColumns[] = LipliemecPeer::FECSOB1;
    }

	} 
	
	public function setHorsob1($v)
	{

    if ($this->horsob1 !== $v) {
        $this->horsob1 = $v;
        $this->modifiedColumns[] = LipliemecPeer::HORSOB1;
      }
  
	} 
	
	public function setFecsob2($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsob2] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsob2 !== $ts) {
      $this->fecsob2 = $ts;
      $this->modifiedColumns[] = LipliemecPeer::FECSOB2;
    }

	} 
	
	public function setHorsob2($v)
	{

    if ($this->horsob2 !== $v) {
        $this->horsob2 = $v;
        $this->modifiedColumns[] = LipliemecPeer::HORSOB2;
      }
  
	} 
	
	public function setDirofe($v)
	{

    if ($this->dirofe !== $v) {
        $this->dirofe = $v;
        $this->modifiedColumns[] = LipliemecPeer::DIROFE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LipliemecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numexp = $rs->getString($startcol + 1);

      $this->codmec = $rs->getString($startcol + 2);

      $this->fecsob1 = $rs->getDate($startcol + 3, null);

      $this->horsob1 = $rs->getString($startcol + 4);

      $this->fecsob2 = $rs->getDate($startcol + 5, null);

      $this->horsob2 = $rs->getString($startcol + 6);

      $this->dirofe = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lipliemec object", $e);
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
			$con = Propel::getConnection(LipliemecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LipliemecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LipliemecPeer::DATABASE_NAME);
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
					$pk = LipliemecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LipliemecPeer::doUpdate($this, $con);
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


			if (($retval = LipliemecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliemecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumexp();
				break;
			case 2:
				return $this->getCodmec();
				break;
			case 3:
				return $this->getFecsob1();
				break;
			case 4:
				return $this->getHorsob1();
				break;
			case 5:
				return $this->getFecsob2();
				break;
			case 6:
				return $this->getHorsob2();
				break;
			case 7:
				return $this->getDirofe();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliemecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumexp(),
			$keys[2] => $this->getCodmec(),
			$keys[3] => $this->getFecsob1(),
			$keys[4] => $this->getHorsob1(),
			$keys[5] => $this->getFecsob2(),
			$keys[6] => $this->getHorsob2(),
			$keys[7] => $this->getDirofe(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LipliemecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumexp($value);
				break;
			case 2:
				$this->setCodmec($value);
				break;
			case 3:
				$this->setFecsob1($value);
				break;
			case 4:
				$this->setHorsob1($value);
				break;
			case 5:
				$this->setFecsob2($value);
				break;
			case 6:
				$this->setHorsob2($value);
				break;
			case 7:
				$this->setDirofe($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LipliemecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumexp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecsob1($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHorsob1($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecsob2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHorsob2($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDirofe($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LipliemecPeer::DATABASE_NAME);

		if ($this->isColumnModified(LipliemecPeer::NUMPLIE)) $criteria->add(LipliemecPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LipliemecPeer::NUMEXP)) $criteria->add(LipliemecPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LipliemecPeer::CODMEC)) $criteria->add(LipliemecPeer::CODMEC, $this->codmec);
		if ($this->isColumnModified(LipliemecPeer::FECSOB1)) $criteria->add(LipliemecPeer::FECSOB1, $this->fecsob1);
		if ($this->isColumnModified(LipliemecPeer::HORSOB1)) $criteria->add(LipliemecPeer::HORSOB1, $this->horsob1);
		if ($this->isColumnModified(LipliemecPeer::FECSOB2)) $criteria->add(LipliemecPeer::FECSOB2, $this->fecsob2);
		if ($this->isColumnModified(LipliemecPeer::HORSOB2)) $criteria->add(LipliemecPeer::HORSOB2, $this->horsob2);
		if ($this->isColumnModified(LipliemecPeer::DIROFE)) $criteria->add(LipliemecPeer::DIROFE, $this->dirofe);
		if ($this->isColumnModified(LipliemecPeer::ID)) $criteria->add(LipliemecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LipliemecPeer::DATABASE_NAME);

		$criteria->add(LipliemecPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodmec($this->codmec);

		$copyObj->setFecsob1($this->fecsob1);

		$copyObj->setHorsob1($this->horsob1);

		$copyObj->setFecsob2($this->fecsob2);

		$copyObj->setHorsob2($this->horsob2);

		$copyObj->setDirofe($this->dirofe);


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
			self::$peer = new LipliemecPeer();
		}
		return self::$peer;
	}

} 