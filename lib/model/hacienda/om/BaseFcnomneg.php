<?php


abstract class BaseFcnomneg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numlic;


	
	protected $rifcon;


	
	protected $nomneg;


	
	protected $dirpri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumlic()
  {

    return trim($this->numlic);

  }
  
  public function getRifcon()
  {

    return trim($this->rifcon);

  }
  
  public function getNomneg()
  {

    return trim($this->nomneg);

  }
  
  public function getDirpri()
  {

    return trim($this->dirpri);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumlic($v)
	{

    if ($this->numlic !== $v) {
        $this->numlic = $v;
        $this->modifiedColumns[] = FcnomnegPeer::NUMLIC;
      }
  
	} 
	
	public function setRifcon($v)
	{

    if ($this->rifcon !== $v) {
        $this->rifcon = $v;
        $this->modifiedColumns[] = FcnomnegPeer::RIFCON;
      }
  
	} 
	
	public function setNomneg($v)
	{

    if ($this->nomneg !== $v) {
        $this->nomneg = $v;
        $this->modifiedColumns[] = FcnomnegPeer::NOMNEG;
      }
  
	} 
	
	public function setDirpri($v)
	{

    if ($this->dirpri !== $v) {
        $this->dirpri = $v;
        $this->modifiedColumns[] = FcnomnegPeer::DIRPRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcnomnegPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numlic = $rs->getString($startcol + 0);

      $this->rifcon = $rs->getString($startcol + 1);

      $this->nomneg = $rs->getString($startcol + 2);

      $this->dirpri = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcnomneg object", $e);
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
			$con = Propel::getConnection(FcnomnegPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcnomnegPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcnomnegPeer::DATABASE_NAME);
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
					$pk = FcnomnegPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcnomnegPeer::doUpdate($this, $con);
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


			if (($retval = FcnomnegPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcnomnegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumlic();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getNomneg();
				break;
			case 3:
				return $this->getDirpri();
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
		$keys = FcnomnegPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumlic(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getNomneg(),
			$keys[3] => $this->getDirpri(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcnomnegPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumlic($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setNomneg($value);
				break;
			case 3:
				$this->setDirpri($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcnomnegPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumlic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomneg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirpri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcnomnegPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcnomnegPeer::NUMLIC)) $criteria->add(FcnomnegPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcnomnegPeer::RIFCON)) $criteria->add(FcnomnegPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcnomnegPeer::NOMNEG)) $criteria->add(FcnomnegPeer::NOMNEG, $this->nomneg);
		if ($this->isColumnModified(FcnomnegPeer::DIRPRI)) $criteria->add(FcnomnegPeer::DIRPRI, $this->dirpri);
		if ($this->isColumnModified(FcnomnegPeer::ID)) $criteria->add(FcnomnegPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcnomnegPeer::DATABASE_NAME);

		$criteria->add(FcnomnegPeer::ID, $this->id);

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

		$copyObj->setNumlic($this->numlic);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setNomneg($this->nomneg);

		$copyObj->setDirpri($this->dirpri);


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
			self::$peer = new FcnomnegPeer();
		}
		return self::$peer;
	}

} 