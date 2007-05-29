<?php


abstract class BaseOcdocact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddoc;


	
	protected $desdoc;


	
	protected $stadoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddoc()
	{

		return $this->coddoc; 		
	}
	
	public function getDesdoc()
	{

		return $this->desdoc; 		
	}
	
	public function getStadoc()
	{

		return $this->stadoc; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCoddoc($v)
	{

		if ($this->coddoc !== $v) {
			$this->coddoc = $v;
			$this->modifiedColumns[] = OcdocactPeer::CODDOC;
		}

	} 
	
	public function setDesdoc($v)
	{

		if ($this->desdoc !== $v) {
			$this->desdoc = $v;
			$this->modifiedColumns[] = OcdocactPeer::DESDOC;
		}

	} 
	
	public function setStadoc($v)
	{

		if ($this->stadoc !== $v) {
			$this->stadoc = $v;
			$this->modifiedColumns[] = OcdocactPeer::STADOC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcdocactPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddoc = $rs->getString($startcol + 0);

			$this->desdoc = $rs->getString($startcol + 1);

			$this->stadoc = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocdocact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcdocactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdocactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdocactPeer::DATABASE_NAME);
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
					$pk = OcdocactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcdocactPeer::doUpdate($this, $con);
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


			if (($retval = OcdocactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdocactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddoc();
				break;
			case 1:
				return $this->getDesdoc();
				break;
			case 2:
				return $this->getStadoc();
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
		$keys = OcdocactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddoc(),
			$keys[1] => $this->getDesdoc(),
			$keys[2] => $this->getStadoc(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdocactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddoc($value);
				break;
			case 1:
				$this->setDesdoc($value);
				break;
			case 2:
				$this->setStadoc($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdocactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStadoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdocactPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdocactPeer::CODDOC)) $criteria->add(OcdocactPeer::CODDOC, $this->coddoc);
		if ($this->isColumnModified(OcdocactPeer::DESDOC)) $criteria->add(OcdocactPeer::DESDOC, $this->desdoc);
		if ($this->isColumnModified(OcdocactPeer::STADOC)) $criteria->add(OcdocactPeer::STADOC, $this->stadoc);
		if ($this->isColumnModified(OcdocactPeer::ID)) $criteria->add(OcdocactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdocactPeer::DATABASE_NAME);

		$criteria->add(OcdocactPeer::ID, $this->id);

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

		$copyObj->setCoddoc($this->coddoc);

		$copyObj->setDesdoc($this->desdoc);

		$copyObj->setStadoc($this->stadoc);


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
			self::$peer = new OcdocactPeer();
		}
		return self::$peer;
	}

} 