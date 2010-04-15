<?php


abstract class BaseFcunimon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codunimon;


	
	protected $nomunimon;


	
	protected $valunimon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodunimon()
  {

    return trim($this->codunimon);

  }
  
  public function getNomunimon()
  {

    return trim($this->nomunimon);

  }
  
  public function getValunimon($val=false)
  {

    if($val) return number_format($this->valunimon,2,',','.');
    else return $this->valunimon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodunimon($v)
	{

    if ($this->codunimon !== $v) {
        $this->codunimon = $v;
        $this->modifiedColumns[] = FcunimonPeer::CODUNIMON;
      }
  
	} 
	
	public function setNomunimon($v)
	{

    if ($this->nomunimon !== $v) {
        $this->nomunimon = $v;
        $this->modifiedColumns[] = FcunimonPeer::NOMUNIMON;
      }
  
	} 
	
	public function setValunimon($v)
	{

    if ($this->valunimon !== $v) {
        $this->valunimon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcunimonPeer::VALUNIMON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcunimonPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codunimon = $rs->getString($startcol + 0);

      $this->nomunimon = $rs->getString($startcol + 1);

      $this->valunimon = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcunimon object", $e);
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
			$con = Propel::getConnection(FcunimonPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcunimonPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcunimonPeer::DATABASE_NAME);
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
					$pk = FcunimonPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcunimonPeer::doUpdate($this, $con);
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


			if (($retval = FcunimonPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcunimonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodunimon();
				break;
			case 1:
				return $this->getNomunimon();
				break;
			case 2:
				return $this->getValunimon();
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
		$keys = FcunimonPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodunimon(),
			$keys[1] => $this->getNomunimon(),
			$keys[2] => $this->getValunimon(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcunimonPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodunimon($value);
				break;
			case 1:
				$this->setNomunimon($value);
				break;
			case 2:
				$this->setValunimon($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcunimonPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodunimon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomunimon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValunimon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcunimonPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcunimonPeer::CODUNIMON)) $criteria->add(FcunimonPeer::CODUNIMON, $this->codunimon);
		if ($this->isColumnModified(FcunimonPeer::NOMUNIMON)) $criteria->add(FcunimonPeer::NOMUNIMON, $this->nomunimon);
		if ($this->isColumnModified(FcunimonPeer::VALUNIMON)) $criteria->add(FcunimonPeer::VALUNIMON, $this->valunimon);
		if ($this->isColumnModified(FcunimonPeer::ID)) $criteria->add(FcunimonPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcunimonPeer::DATABASE_NAME);

		$criteria->add(FcunimonPeer::ID, $this->id);

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

		$copyObj->setCodunimon($this->codunimon);

		$copyObj->setNomunimon($this->nomunimon);

		$copyObj->setValunimon($this->valunimon);


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
			self::$peer = new FcunimonPeer();
		}
		return self::$peer;
	}

} 