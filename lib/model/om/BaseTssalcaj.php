<?php


abstract class BaseTssalcaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refsal;


	
	protected $fecsal;


	
	protected $cedrif;


	
	protected $dessal;


	
	protected $monsal;


	
	protected $stasal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefsal()
  {

    return trim($this->refsal);

  }
  
  public function getFecsal($format = 'Y-m-d')
  {

    if ($this->fecsal === null || $this->fecsal === '') {
      return null;
    } elseif (!is_int($this->fecsal)) {
            $ts = adodb_strtotime($this->fecsal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsal] as date/time value: " . var_export($this->fecsal, true));
      }
    } else {
      $ts = $this->fecsal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getDessal()
  {

    return trim($this->dessal);

  }
  
  public function getMonsal($val=false)
  {

    if($val) return number_format($this->monsal,2,',','.');
    else return $this->monsal;

  }
  
  public function getStasal()
  {

    return trim($this->stasal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefsal($v)
	{

    if ($this->refsal !== $v) {
        $this->refsal = $v;
        $this->modifiedColumns[] = TssalcajPeer::REFSAL;
      }
  
	} 
	
	public function setFecsal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsal !== $ts) {
      $this->fecsal = $ts;
      $this->modifiedColumns[] = TssalcajPeer::FECSAL;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TssalcajPeer::CEDRIF;
      }
  
	} 
	
	public function setDessal($v)
	{

    if ($this->dessal !== $v) {
        $this->dessal = $v;
        $this->modifiedColumns[] = TssalcajPeer::DESSAL;
      }
  
	} 
	
	public function setMonsal($v)
	{

    if ($this->monsal !== $v) {
        $this->monsal = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TssalcajPeer::MONSAL;
      }
  
	} 
	
	public function setStasal($v)
	{

    if ($this->stasal !== $v) {
        $this->stasal = $v;
        $this->modifiedColumns[] = TssalcajPeer::STASAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TssalcajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refsal = $rs->getString($startcol + 0);

      $this->fecsal = $rs->getDate($startcol + 1, null);

      $this->cedrif = $rs->getString($startcol + 2);

      $this->dessal = $rs->getString($startcol + 3);

      $this->monsal = $rs->getFloat($startcol + 4);

      $this->stasal = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tssalcaj object", $e);
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
			$con = Propel::getConnection(TssalcajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TssalcajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TssalcajPeer::DATABASE_NAME);
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
					$pk = TssalcajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TssalcajPeer::doUpdate($this, $con);
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


			if (($retval = TssalcajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TssalcajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefsal();
				break;
			case 1:
				return $this->getFecsal();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getDessal();
				break;
			case 4:
				return $this->getMonsal();
				break;
			case 5:
				return $this->getStasal();
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
		$keys = TssalcajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefsal(),
			$keys[1] => $this->getFecsal(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getDessal(),
			$keys[4] => $this->getMonsal(),
			$keys[5] => $this->getStasal(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TssalcajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefsal($value);
				break;
			case 1:
				$this->setFecsal($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setDessal($value);
				break;
			case 4:
				$this->setMonsal($value);
				break;
			case 5:
				$this->setStasal($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TssalcajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefsal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDessal($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonsal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStasal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TssalcajPeer::DATABASE_NAME);

		if ($this->isColumnModified(TssalcajPeer::REFSAL)) $criteria->add(TssalcajPeer::REFSAL, $this->refsal);
		if ($this->isColumnModified(TssalcajPeer::FECSAL)) $criteria->add(TssalcajPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(TssalcajPeer::CEDRIF)) $criteria->add(TssalcajPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TssalcajPeer::DESSAL)) $criteria->add(TssalcajPeer::DESSAL, $this->dessal);
		if ($this->isColumnModified(TssalcajPeer::MONSAL)) $criteria->add(TssalcajPeer::MONSAL, $this->monsal);
		if ($this->isColumnModified(TssalcajPeer::STASAL)) $criteria->add(TssalcajPeer::STASAL, $this->stasal);
		if ($this->isColumnModified(TssalcajPeer::ID)) $criteria->add(TssalcajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TssalcajPeer::DATABASE_NAME);

		$criteria->add(TssalcajPeer::ID, $this->id);

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

		$copyObj->setRefsal($this->refsal);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setDessal($this->dessal);

		$copyObj->setMonsal($this->monsal);

		$copyObj->setStasal($this->stasal);


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
			self::$peer = new TssalcajPeer();
		}
		return self::$peer;
	}

} 