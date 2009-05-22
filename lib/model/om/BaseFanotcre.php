<?php


abstract class BaseFanotcre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $correl;


	
	protected $fecnot;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffac()
  {

    return trim($this->reffac);

  }
  
  public function getCorrel()
  {

    return trim($this->correl);

  }
  
  public function getFecnot($format = 'Y-m-d')
  {

    if ($this->fecnot === null || $this->fecnot === '') {
      return null;
    } elseif (!is_int($this->fecnot)) {
            $ts = adodb_strtotime($this->fecnot);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnot] as date/time value: " . var_export($this->fecnot, true));
      }
    } else {
      $ts = $this->fecnot;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FanotcrePeer::REFFAC;
      }
  
	} 
	
	public function setCorrel($v)
	{

    if ($this->correl !== $v) {
        $this->correl = $v;
        $this->modifiedColumns[] = FanotcrePeer::CORREL;
      }
  
	} 
	
	public function setFecnot($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnot] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnot !== $ts) {
      $this->fecnot = $ts;
      $this->modifiedColumns[] = FanotcrePeer::FECNOT;
    }

	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FanotcrePeer::MONTO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FanotcrePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffac = $rs->getString($startcol + 0);

      $this->correl = $rs->getString($startcol + 1);

      $this->fecnot = $rs->getDate($startcol + 2, null);

      $this->monto = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fanotcre object", $e);
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
			$con = Propel::getConnection(FanotcrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FanotcrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FanotcrePeer::DATABASE_NAME);
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
					$pk = FanotcrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FanotcrePeer::doUpdate($this, $con);
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


			if (($retval = FanotcrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FanotcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffac();
				break;
			case 1:
				return $this->getCorrel();
				break;
			case 2:
				return $this->getFecnot();
				break;
			case 3:
				return $this->getMonto();
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
		$keys = FanotcrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getCorrel(),
			$keys[2] => $this->getFecnot(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FanotcrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffac($value);
				break;
			case 1:
				$this->setCorrel($value);
				break;
			case 2:
				$this->setFecnot($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FanotcrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCorrel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecnot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FanotcrePeer::DATABASE_NAME);

		if ($this->isColumnModified(FanotcrePeer::REFFAC)) $criteria->add(FanotcrePeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FanotcrePeer::CORREL)) $criteria->add(FanotcrePeer::CORREL, $this->correl);
		if ($this->isColumnModified(FanotcrePeer::FECNOT)) $criteria->add(FanotcrePeer::FECNOT, $this->fecnot);
		if ($this->isColumnModified(FanotcrePeer::MONTO)) $criteria->add(FanotcrePeer::MONTO, $this->monto);
		if ($this->isColumnModified(FanotcrePeer::ID)) $criteria->add(FanotcrePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FanotcrePeer::DATABASE_NAME);

		$criteria->add(FanotcrePeer::ID, $this->id);

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

		$copyObj->setReffac($this->reffac);

		$copyObj->setCorrel($this->correl);

		$copyObj->setFecnot($this->fecnot);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new FanotcrePeer();
		}
		return self::$peer;
	}

} 