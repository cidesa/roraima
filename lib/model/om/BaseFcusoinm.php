<?php


abstract class BaseFcusoinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codusoinm;


	
	protected $nomusoinm;


	
	protected $factor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodusoinm()
  {

    return trim($this->codusoinm);

  }
  
  public function getNomusoinm()
  {

    return trim($this->nomusoinm);

  }
  
  public function getFactor($val=false)
  {

    if($val) return number_format($this->factor,2,',','.');
    else return $this->factor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodusoinm($v)
	{

    if ($this->codusoinm !== $v) {
        $this->codusoinm = $v;
        $this->modifiedColumns[] = FcusoinmPeer::CODUSOINM;
      }
  
	} 
	
	public function setNomusoinm($v)
	{

    if ($this->nomusoinm !== $v) {
        $this->nomusoinm = $v;
        $this->modifiedColumns[] = FcusoinmPeer::NOMUSOINM;
      }
  
	} 
	
	public function setFactor($v)
	{

    if ($this->factor !== $v) {
        $this->factor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcusoinmPeer::FACTOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcusoinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codusoinm = $rs->getString($startcol + 0);

      $this->nomusoinm = $rs->getString($startcol + 1);

      $this->factor = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcusoinm object", $e);
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
			$con = Propel::getConnection(FcusoinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcusoinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcusoinmPeer::DATABASE_NAME);
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
					$pk = FcusoinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcusoinmPeer::doUpdate($this, $con);
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


			if (($retval = FcusoinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcusoinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodusoinm();
				break;
			case 1:
				return $this->getNomusoinm();
				break;
			case 2:
				return $this->getFactor();
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
		$keys = FcusoinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodusoinm(),
			$keys[1] => $this->getNomusoinm(),
			$keys[2] => $this->getFactor(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcusoinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodusoinm($value);
				break;
			case 1:
				$this->setNomusoinm($value);
				break;
			case 2:
				$this->setFactor($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcusoinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodusoinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomusoinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFactor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcusoinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcusoinmPeer::CODUSOINM)) $criteria->add(FcusoinmPeer::CODUSOINM, $this->codusoinm);
		if ($this->isColumnModified(FcusoinmPeer::NOMUSOINM)) $criteria->add(FcusoinmPeer::NOMUSOINM, $this->nomusoinm);
		if ($this->isColumnModified(FcusoinmPeer::FACTOR)) $criteria->add(FcusoinmPeer::FACTOR, $this->factor);
		if ($this->isColumnModified(FcusoinmPeer::ID)) $criteria->add(FcusoinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcusoinmPeer::DATABASE_NAME);

		$criteria->add(FcusoinmPeer::ID, $this->id);

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

		$copyObj->setCodusoinm($this->codusoinm);

		$copyObj->setNomusoinm($this->nomusoinm);

		$copyObj->setFactor($this->factor);


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
			self::$peer = new FcusoinmPeer();
		}
		return self::$peer;
	}

} 