<?php


abstract class BaseCainvfisubi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecinv;


	
	protected $codalm;


	
	protected $codart;


	
	protected $codubi;


	
	protected $exiact;


	
	protected $exiact2;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecinv($format = 'Y-m-d')
  {

    if ($this->fecinv === null || $this->fecinv === '') {
      return null;
    } elseif (!is_int($this->fecinv)) {
            $ts = adodb_strtotime($this->fecinv);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinv] as date/time value: " . var_export($this->fecinv, true));
      }
    } else {
      $ts = $this->fecinv;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getExiact($val=false)
  {

    if($val) return number_format($this->exiact,2,',','.');
    else return $this->exiact;

  }
  
  public function getExiact2($val=false)
  {

    if($val) return number_format($this->exiact2,2,',','.');
    else return $this->exiact2;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecinv($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinv] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinv !== $ts) {
      $this->fecinv = $ts;
      $this->modifiedColumns[] = CainvfisubiPeer::FECINV;
    }

	} 
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CainvfisubiPeer::CODALM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CainvfisubiPeer::CODART;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CainvfisubiPeer::CODUBI;
      }
  
	} 
	
	public function setExiact($v)
	{

    if ($this->exiact !== $v) {
        $this->exiact = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CainvfisubiPeer::EXIACT;
      }
  
	} 
	
	public function setExiact2($v)
	{

    if ($this->exiact2 !== $v) {
        $this->exiact2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CainvfisubiPeer::EXIACT2;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CainvfisubiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecinv = $rs->getDate($startcol + 0, null);

      $this->codalm = $rs->getString($startcol + 1);

      $this->codart = $rs->getString($startcol + 2);

      $this->codubi = $rs->getString($startcol + 3);

      $this->exiact = $rs->getFloat($startcol + 4);

      $this->exiact2 = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cainvfisubi object", $e);
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
			$con = Propel::getConnection(CainvfisubiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CainvfisubiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CainvfisubiPeer::DATABASE_NAME);
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
					$pk = CainvfisubiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CainvfisubiPeer::doUpdate($this, $con);
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


			if (($retval = CainvfisubiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CainvfisubiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecinv();
				break;
			case 1:
				return $this->getCodalm();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getCodubi();
				break;
			case 4:
				return $this->getExiact();
				break;
			case 5:
				return $this->getExiact2();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CainvfisubiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecinv(),
			$keys[1] => $this->getCodalm(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getCodubi(),
			$keys[4] => $this->getExiact(),
			$keys[5] => $this->getExiact2(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CainvfisubiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecinv($value);
				break;
			case 1:
				$this->setCodalm($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setCodubi($value);
				break;
			case 4:
				$this->setExiact($value);
				break;
			case 5:
				$this->setExiact2($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CainvfisubiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecinv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodalm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodubi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setExiact($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setExiact2($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CainvfisubiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CainvfisubiPeer::FECINV)) $criteria->add(CainvfisubiPeer::FECINV, $this->fecinv);
		if ($this->isColumnModified(CainvfisubiPeer::CODALM)) $criteria->add(CainvfisubiPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CainvfisubiPeer::CODART)) $criteria->add(CainvfisubiPeer::CODART, $this->codart);
		if ($this->isColumnModified(CainvfisubiPeer::CODUBI)) $criteria->add(CainvfisubiPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CainvfisubiPeer::EXIACT)) $criteria->add(CainvfisubiPeer::EXIACT, $this->exiact);
		if ($this->isColumnModified(CainvfisubiPeer::EXIACT2)) $criteria->add(CainvfisubiPeer::EXIACT2, $this->exiact2);
		if ($this->isColumnModified(CainvfisubiPeer::ID)) $criteria->add(CainvfisubiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CainvfisubiPeer::DATABASE_NAME);

		$criteria->add(CainvfisubiPeer::ID, $this->id);

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

		$copyObj->setFecinv($this->fecinv);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setExiact($this->exiact);

		$copyObj->setExiact2($this->exiact2);


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
			self::$peer = new CainvfisubiPeer();
		}
		return self::$peer;
	}

} 