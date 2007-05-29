<?php


abstract class BaseBnclafun extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcla;


	
	protected $descla;


	
	protected $stacla;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcla()
	{

		return $this->codcla; 		
	}
	
	public function getDescla()
	{

		return $this->descla; 		
	}
	
	public function getStacla()
	{

		return $this->stacla; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcla($v)
	{

		if ($this->codcla !== $v) {
			$this->codcla = $v;
			$this->modifiedColumns[] = BnclafunPeer::CODCLA;
		}

	} 
	
	public function setDescla($v)
	{

		if ($this->descla !== $v) {
			$this->descla = $v;
			$this->modifiedColumns[] = BnclafunPeer::DESCLA;
		}

	} 
	
	public function setStacla($v)
	{

		if ($this->stacla !== $v) {
			$this->stacla = $v;
			$this->modifiedColumns[] = BnclafunPeer::STACLA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BnclafunPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcla = $rs->getString($startcol + 0);

			$this->descla = $rs->getString($startcol + 1);

			$this->stacla = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bnclafun object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BnclafunPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnclafunPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnclafunPeer::DATABASE_NAME);
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
					$pk = BnclafunPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BnclafunPeer::doUpdate($this, $con);
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


			if (($retval = BnclafunPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnclafunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getStacla();
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
		$keys = BnclafunPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcla(),
			$keys[1] => $this->getDescla(),
			$keys[2] => $this->getStacla(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnclafunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setStacla($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnclafunPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcla($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStacla($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnclafunPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnclafunPeer::CODCLA)) $criteria->add(BnclafunPeer::CODCLA, $this->codcla);
		if ($this->isColumnModified(BnclafunPeer::DESCLA)) $criteria->add(BnclafunPeer::DESCLA, $this->descla);
		if ($this->isColumnModified(BnclafunPeer::STACLA)) $criteria->add(BnclafunPeer::STACLA, $this->stacla);
		if ($this->isColumnModified(BnclafunPeer::ID)) $criteria->add(BnclafunPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnclafunPeer::DATABASE_NAME);

		$criteria->add(BnclafunPeer::ID, $this->id);

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

		$copyObj->setStacla($this->stacla);


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
			self::$peer = new BnclafunPeer();
		}
		return self::$peer;
	}

} 