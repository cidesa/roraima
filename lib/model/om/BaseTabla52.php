<?php


abstract class BaseTabla52 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refcau;


	
	protected $feccau;


	
	protected $refcom;


	
	protected $feccom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefcau()
  {

    return trim($this->refcau);

  }
  
  public function getFeccau($format = 'Y-m-d')
  {

    if ($this->feccau === null || $this->feccau === '') {
      return null;
    } elseif (!is_int($this->feccau)) {
            $ts = adodb_strtotime($this->feccau);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccau] as date/time value: " . var_export($this->feccau, true));
      }
    } else {
      $ts = $this->feccau;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefcom()
  {

    return trim($this->refcom);

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

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefcau($v)
	{

    if ($this->refcau !== $v) {
        $this->refcau = $v;
        $this->modifiedColumns[] = Tabla52Peer::REFCAU;
      }
  
	} 
	
	public function setFeccau($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccau] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccau !== $ts) {
      $this->feccau = $ts;
      $this->modifiedColumns[] = Tabla52Peer::FECCAU;
    }

	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = Tabla52Peer::REFCOM;
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
      $this->modifiedColumns[] = Tabla52Peer::FECCOM;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = Tabla52Peer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refcau = $rs->getString($startcol + 0);

      $this->feccau = $rs->getDate($startcol + 1, null);

      $this->refcom = $rs->getString($startcol + 2);

      $this->feccom = $rs->getDate($startcol + 3, null);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tabla52 object", $e);
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
			$con = Propel::getConnection(Tabla52Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Tabla52Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Tabla52Peer::DATABASE_NAME);
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
					$pk = Tabla52Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += Tabla52Peer::doUpdate($this, $con);
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


			if (($retval = Tabla52Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla52Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefcau();
				break;
			case 1:
				return $this->getFeccau();
				break;
			case 2:
				return $this->getRefcom();
				break;
			case 3:
				return $this->getFeccom();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla52Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefcau(),
			$keys[1] => $this->getFeccau(),
			$keys[2] => $this->getRefcom(),
			$keys[3] => $this->getFeccom(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Tabla52Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefcau($value);
				break;
			case 1:
				$this->setFeccau($value);
				break;
			case 2:
				$this->setRefcom($value);
				break;
			case 3:
				$this->setFeccom($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Tabla52Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefcau($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Tabla52Peer::DATABASE_NAME);

		if ($this->isColumnModified(Tabla52Peer::REFCAU)) $criteria->add(Tabla52Peer::REFCAU, $this->refcau);
		if ($this->isColumnModified(Tabla52Peer::FECCAU)) $criteria->add(Tabla52Peer::FECCAU, $this->feccau);
		if ($this->isColumnModified(Tabla52Peer::REFCOM)) $criteria->add(Tabla52Peer::REFCOM, $this->refcom);
		if ($this->isColumnModified(Tabla52Peer::FECCOM)) $criteria->add(Tabla52Peer::FECCOM, $this->feccom);
		if ($this->isColumnModified(Tabla52Peer::ID)) $criteria->add(Tabla52Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Tabla52Peer::DATABASE_NAME);

		$criteria->add(Tabla52Peer::ID, $this->id);

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

		$copyObj->setRefcau($this->refcau);

		$copyObj->setFeccau($this->feccau);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setFeccom($this->feccom);


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
			self::$peer = new Tabla52Peer();
		}
		return self::$peer;
	}

} 