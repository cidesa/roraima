<?php


abstract class BaseNpsso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsso;


	
	protected $codemp;


	
	protected $fecinicot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsso()
  {

    return trim($this->numsso);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecinicot($format = 'Y-m-d')
  {

    if ($this->fecinicot === null || $this->fecinicot === '') {
      return null;
    } elseif (!is_int($this->fecinicot)) {
            $ts = adodb_strtotime($this->fecinicot);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinicot] as date/time value: " . var_export($this->fecinicot, true));
      }
    } else {
      $ts = $this->fecinicot;
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
	
	public function setNumsso($v)
	{

    if ($this->numsso !== $v) {
        $this->numsso = $v;
        $this->modifiedColumns[] = NpssoPeer::NUMSSO;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpssoPeer::CODEMP;
      }
  
	} 
	
	public function setFecinicot($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinicot] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinicot !== $ts) {
      $this->fecinicot = $ts;
      $this->modifiedColumns[] = NpssoPeer::FECINICOT;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpssoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsso = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->fecinicot = $rs->getDate($startcol + 2, null);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npsso object", $e);
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
			$con = Propel::getConnection(NpssoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpssoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpssoPeer::DATABASE_NAME);
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
					$pk = NpssoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpssoPeer::doUpdate($this, $con);
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


			if (($retval = NpssoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpssoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsso();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getFecinicot();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpssoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsso(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getFecinicot(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpssoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsso($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setFecinicot($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpssoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecinicot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpssoPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpssoPeer::NUMSSO)) $criteria->add(NpssoPeer::NUMSSO, $this->numsso);
		if ($this->isColumnModified(NpssoPeer::CODEMP)) $criteria->add(NpssoPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpssoPeer::FECINICOT)) $criteria->add(NpssoPeer::FECINICOT, $this->fecinicot);
		if ($this->isColumnModified(NpssoPeer::ID)) $criteria->add(NpssoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpssoPeer::DATABASE_NAME);

		$criteria->add(NpssoPeer::ID, $this->id);

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

		$copyObj->setNumsso($this->numsso);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecinicot($this->fecinicot);


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
			self::$peer = new NpssoPeer();
		}
		return self::$peer;
	}

} 