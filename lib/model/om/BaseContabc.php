<?php


abstract class BaseContabc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcom;


	
	protected $reftra;


	
	protected $feccom;


	
	protected $descom;


	
	protected $moncom;


	
	protected $stacom;


	
	protected $tipcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getStacom()
  {

    return trim($this->stacom);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = ContabcPeer::NUMCOM;
      }
  
	} 
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = ContabcPeer::REFTRA;
      }
  
	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = ContabcPeer::FECCOM;
    }

	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = ContabcPeer::DESCOM;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ContabcPeer::MONCOM;
      }
  
	} 
	
	public function setStacom($v)
	{

    if ($this->stacom !== $v) {
        $this->stacom = $v;
        $this->modifiedColumns[] = ContabcPeer::STACOM;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = ContabcPeer::TIPCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ContabcPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcom = $rs->getString($startcol + 0);

      $this->reftra = $rs->getString($startcol + 1);

      $this->feccom = $rs->getDate($startcol + 2, null);

      $this->descom = $rs->getString($startcol + 3);

      $this->moncom = $rs->getFloat($startcol + 4);

      $this->stacom = $rs->getString($startcol + 5);

      $this->tipcom = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Contabc object", $e);
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
			$con = Propel::getConnection(ContabcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContabcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContabcPeer::DATABASE_NAME);
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
					$pk = ContabcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContabcPeer::doUpdate($this, $con);
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


			if (($retval = ContabcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcom();
				break;
			case 1:
				return $this->getReftra();
				break;
			case 2:
				return $this->getFeccom();
				break;
			case 3:
				return $this->getDescom();
				break;
			case 4:
				return $this->getMoncom();
				break;
			case 5:
				return $this->getStacom();
				break;
			case 6:
				return $this->getTipcom();
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
		$keys = ContabcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcom(),
			$keys[1] => $this->getReftra(),
			$keys[2] => $this->getFeccom(),
			$keys[3] => $this->getDescom(),
			$keys[4] => $this->getMoncom(),
			$keys[5] => $this->getStacom(),
			$keys[6] => $this->getTipcom(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcom($value);
				break;
			case 1:
				$this->setReftra($value);
				break;
			case 2:
				$this->setFeccom($value);
				break;
			case 3:
				$this->setDescom($value);
				break;
			case 4:
				$this->setMoncom($value);
				break;
			case 5:
				$this->setStacom($value);
				break;
			case 6:
				$this->setTipcom($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReftra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeccom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMoncom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStacom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipcom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContabcPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContabcPeer::NUMCOM)) $criteria->add(ContabcPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(ContabcPeer::REFTRA)) $criteria->add(ContabcPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(ContabcPeer::FECCOM)) $criteria->add(ContabcPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(ContabcPeer::DESCOM)) $criteria->add(ContabcPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(ContabcPeer::MONCOM)) $criteria->add(ContabcPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(ContabcPeer::STACOM)) $criteria->add(ContabcPeer::STACOM, $this->stacom);
		if ($this->isColumnModified(ContabcPeer::TIPCOM)) $criteria->add(ContabcPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(ContabcPeer::ID)) $criteria->add(ContabcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContabcPeer::DATABASE_NAME);

		$criteria->add(ContabcPeer::ID, $this->id);

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

		$copyObj->setNumcom($this->numcom);

		$copyObj->setReftra($this->reftra);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setDescom($this->descom);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setStacom($this->stacom);

		$copyObj->setTipcom($this->tipcom);


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
			self::$peer = new ContabcPeer();
		}
		return self::$peer;
	}

} 