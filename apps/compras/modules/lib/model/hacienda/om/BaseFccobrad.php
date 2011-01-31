<?php


abstract class BaseFccobrad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcob;


	
	protected $cedcob;


	
	protected $nomcob;


	
	protected $dircob;


	
	protected $telcob;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcob()
  {

    return trim($this->codcob);

  }
  
  public function getCedcob()
  {

    return trim($this->cedcob);

  }
  
  public function getNomcob()
  {

    return trim($this->nomcob);

  }
  
  public function getDircob()
  {

    return trim($this->dircob);

  }
  
  public function getTelcob()
  {

    return trim($this->telcob);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcob($v)
	{

    if ($this->codcob !== $v) {
        $this->codcob = $v;
        $this->modifiedColumns[] = FccobradPeer::CODCOB;
      }
  
	} 
	
	public function setCedcob($v)
	{

    if ($this->cedcob !== $v) {
        $this->cedcob = $v;
        $this->modifiedColumns[] = FccobradPeer::CEDCOB;
      }
  
	} 
	
	public function setNomcob($v)
	{

    if ($this->nomcob !== $v) {
        $this->nomcob = $v;
        $this->modifiedColumns[] = FccobradPeer::NOMCOB;
      }
  
	} 
	
	public function setDircob($v)
	{

    if ($this->dircob !== $v) {
        $this->dircob = $v;
        $this->modifiedColumns[] = FccobradPeer::DIRCOB;
      }
  
	} 
	
	public function setTelcob($v)
	{

    if ($this->telcob !== $v) {
        $this->telcob = $v;
        $this->modifiedColumns[] = FccobradPeer::TELCOB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FccobradPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcob = $rs->getString($startcol + 0);

      $this->cedcob = $rs->getString($startcol + 1);

      $this->nomcob = $rs->getString($startcol + 2);

      $this->dircob = $rs->getString($startcol + 3);

      $this->telcob = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fccobrad object", $e);
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
			$con = Propel::getConnection(FccobradPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FccobradPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FccobradPeer::DATABASE_NAME);
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
					$pk = FccobradPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FccobradPeer::doUpdate($this, $con);
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


			if (($retval = FccobradPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccobradPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcob();
				break;
			case 1:
				return $this->getCedcob();
				break;
			case 2:
				return $this->getNomcob();
				break;
			case 3:
				return $this->getDircob();
				break;
			case 4:
				return $this->getTelcob();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FccobradPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcob(),
			$keys[1] => $this->getCedcob(),
			$keys[2] => $this->getNomcob(),
			$keys[3] => $this->getDircob(),
			$keys[4] => $this->getTelcob(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccobradPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcob($value);
				break;
			case 1:
				$this->setCedcob($value);
				break;
			case 2:
				$this->setNomcob($value);
				break;
			case 3:
				$this->setDircob($value);
				break;
			case 4:
				$this->setTelcob($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FccobradPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcob($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCedcob($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcob($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDircob($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelcob($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FccobradPeer::DATABASE_NAME);

		if ($this->isColumnModified(FccobradPeer::CODCOB)) $criteria->add(FccobradPeer::CODCOB, $this->codcob);
		if ($this->isColumnModified(FccobradPeer::CEDCOB)) $criteria->add(FccobradPeer::CEDCOB, $this->cedcob);
		if ($this->isColumnModified(FccobradPeer::NOMCOB)) $criteria->add(FccobradPeer::NOMCOB, $this->nomcob);
		if ($this->isColumnModified(FccobradPeer::DIRCOB)) $criteria->add(FccobradPeer::DIRCOB, $this->dircob);
		if ($this->isColumnModified(FccobradPeer::TELCOB)) $criteria->add(FccobradPeer::TELCOB, $this->telcob);
		if ($this->isColumnModified(FccobradPeer::ID)) $criteria->add(FccobradPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FccobradPeer::DATABASE_NAME);

		$criteria->add(FccobradPeer::ID, $this->id);

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

		$copyObj->setCodcob($this->codcob);

		$copyObj->setCedcob($this->cedcob);

		$copyObj->setNomcob($this->nomcob);

		$copyObj->setDircob($this->dircob);

		$copyObj->setTelcob($this->telcob);


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
			self::$peer = new FccobradPeer();
		}
		return self::$peer;
	}

} 