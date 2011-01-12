<?php


abstract class BaseCadefcla extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcla;


	
	protected $descla;


	
	protected $tipcla;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcla()
  {

    return trim($this->codcla);

  }
  
  public function getDescla()
  {

    return trim($this->descla);

  }
  
  public function getTipcla()
  {

    return trim($this->tipcla);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcla($v)
	{

    if ($this->codcla !== $v) {
        $this->codcla = $v;
        $this->modifiedColumns[] = CadefclaPeer::CODCLA;
      }
  
	} 
	
	public function setDescla($v)
	{

    if ($this->descla !== $v) {
        $this->descla = $v;
        $this->modifiedColumns[] = CadefclaPeer::DESCLA;
      }
  
	} 
	
	public function setTipcla($v)
	{

    if ($this->tipcla !== $v) {
        $this->tipcla = $v;
        $this->modifiedColumns[] = CadefclaPeer::TIPCLA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefclaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcla = $rs->getString($startcol + 0);

      $this->descla = $rs->getString($startcol + 1);

      $this->tipcla = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefcla object", $e);
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
			$con = Propel::getConnection(CadefclaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefclaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefclaPeer::DATABASE_NAME);
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
					$pk = CadefclaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefclaPeer::doUpdate($this, $con);
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


			if (($retval = CadefclaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefclaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcla();
				break;
			case 1:
				return $this->getDescla();
				break;
			case 2:
				return $this->getTipcla();
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
		$keys = CadefclaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcla(),
			$keys[1] => $this->getDescla(),
			$keys[2] => $this->getTipcla(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefclaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcla($value);
				break;
			case 1:
				$this->setDescla($value);
				break;
			case 2:
				$this->setTipcla($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefclaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcla($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcla($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefclaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefclaPeer::CODCLA)) $criteria->add(CadefclaPeer::CODCLA, $this->codcla);
		if ($this->isColumnModified(CadefclaPeer::DESCLA)) $criteria->add(CadefclaPeer::DESCLA, $this->descla);
		if ($this->isColumnModified(CadefclaPeer::TIPCLA)) $criteria->add(CadefclaPeer::TIPCLA, $this->tipcla);
		if ($this->isColumnModified(CadefclaPeer::ID)) $criteria->add(CadefclaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefclaPeer::DATABASE_NAME);

		$criteria->add(CadefclaPeer::ID, $this->id);

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

		$copyObj->setCodcla($this->codcla);

		$copyObj->setDescla($this->descla);

		$copyObj->setTipcla($this->tipcla);


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
			self::$peer = new CadefclaPeer();
		}
		return self::$peer;
	}

} 