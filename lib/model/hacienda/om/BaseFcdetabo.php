<?php


abstract class BaseFcdetabo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $nrodet;


	
	protected $monpag;


	
	protected $tippag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpag()
  {

    return trim($this->numpag);

  }
  
  public function getNrodet()
  {

    return trim($this->nrodet);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getTippag()
  {

    return trim($this->tippag);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpag($v)
	{

    if ($this->numpag !== $v) {
        $this->numpag = $v;
        $this->modifiedColumns[] = FcdetaboPeer::NUMPAG;
      }
  
	} 
	
	public function setNrodet($v)
	{

    if ($this->nrodet !== $v) {
        $this->nrodet = $v;
        $this->modifiedColumns[] = FcdetaboPeer::NRODET;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcdetaboPeer::MONPAG;
      }
  
	} 
	
	public function setTippag($v)
	{

    if ($this->tippag !== $v) {
        $this->tippag = $v;
        $this->modifiedColumns[] = FcdetaboPeer::TIPPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcdetaboPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpag = $rs->getString($startcol + 0);

      $this->nrodet = $rs->getString($startcol + 1);

      $this->monpag = $rs->getFloat($startcol + 2);

      $this->tippag = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcdetabo object", $e);
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
			$con = Propel::getConnection(FcdetaboPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetaboPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetaboPeer::DATABASE_NAME);
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
					$pk = FcdetaboPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcdetaboPeer::doUpdate($this, $con);
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


			if (($retval = FcdetaboPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetaboPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getNrodet();
				break;
			case 2:
				return $this->getMonpag();
				break;
			case 3:
				return $this->getTippag();
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
		$keys = FcdetaboPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getNrodet(),
			$keys[2] => $this->getMonpag(),
			$keys[3] => $this->getTippag(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetaboPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setNrodet($value);
				break;
			case 2:
				$this->setMonpag($value);
				break;
			case 3:
				$this->setTippag($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetaboPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrodet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTippag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetaboPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetaboPeer::NUMPAG)) $criteria->add(FcdetaboPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcdetaboPeer::NRODET)) $criteria->add(FcdetaboPeer::NRODET, $this->nrodet);
		if ($this->isColumnModified(FcdetaboPeer::MONPAG)) $criteria->add(FcdetaboPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcdetaboPeer::TIPPAG)) $criteria->add(FcdetaboPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(FcdetaboPeer::ID)) $criteria->add(FcdetaboPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetaboPeer::DATABASE_NAME);

		$criteria->add(FcdetaboPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setNrodet($this->nrodet);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setTippag($this->tippag);


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
			self::$peer = new FcdetaboPeer();
		}
		return self::$peer;
	}

} 