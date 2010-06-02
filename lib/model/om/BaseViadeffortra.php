<?php


abstract class BaseViadeffortra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codfortra;


	
	protected $desfortra;


	
	protected $codtiptra;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodfortra()
  {

    return trim($this->codfortra);

  }
  
  public function getDesfortra()
  {

    return trim($this->desfortra);

  }
  
  public function getCodtiptra()
  {

    return trim($this->codtiptra);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodfortra($v)
	{

    if ($this->codfortra !== $v) {
        $this->codfortra = $v;
        $this->modifiedColumns[] = ViadeffortraPeer::CODFORTRA;
      }
  
	} 
	
	public function setDesfortra($v)
	{

    if ($this->desfortra !== $v) {
        $this->desfortra = $v;
        $this->modifiedColumns[] = ViadeffortraPeer::DESFORTRA;
      }
  
	} 
	
	public function setCodtiptra($v)
	{

    if ($this->codtiptra !== $v) {
        $this->codtiptra = $v;
        $this->modifiedColumns[] = ViadeffortraPeer::CODTIPTRA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadeffortraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codfortra = $rs->getString($startcol + 0);

      $this->desfortra = $rs->getString($startcol + 1);

      $this->codtiptra = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadeffortra object", $e);
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
			$con = Propel::getConnection(ViadeffortraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadeffortraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadeffortraPeer::DATABASE_NAME);
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
					$pk = ViadeffortraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadeffortraPeer::doUpdate($this, $con);
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


			if (($retval = ViadeffortraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadeffortraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodfortra();
				break;
			case 1:
				return $this->getDesfortra();
				break;
			case 2:
				return $this->getCodtiptra();
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
		$keys = ViadeffortraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodfortra(),
			$keys[1] => $this->getDesfortra(),
			$keys[2] => $this->getCodtiptra(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadeffortraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodfortra($value);
				break;
			case 1:
				$this->setDesfortra($value);
				break;
			case 2:
				$this->setCodtiptra($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadeffortraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodfortra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesfortra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtiptra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadeffortraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadeffortraPeer::CODFORTRA)) $criteria->add(ViadeffortraPeer::CODFORTRA, $this->codfortra);
		if ($this->isColumnModified(ViadeffortraPeer::DESFORTRA)) $criteria->add(ViadeffortraPeer::DESFORTRA, $this->desfortra);
		if ($this->isColumnModified(ViadeffortraPeer::CODTIPTRA)) $criteria->add(ViadeffortraPeer::CODTIPTRA, $this->codtiptra);
		if ($this->isColumnModified(ViadeffortraPeer::ID)) $criteria->add(ViadeffortraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadeffortraPeer::DATABASE_NAME);

		$criteria->add(ViadeffortraPeer::ID, $this->id);

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

		$copyObj->setCodfortra($this->codfortra);

		$copyObj->setDesfortra($this->desfortra);

		$copyObj->setCodtiptra($this->codtiptra);


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
			self::$peer = new ViadeffortraPeer();
		}
		return self::$peer;
	}

} 