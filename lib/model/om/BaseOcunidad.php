<?php


abstract class BaseOcunidad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduni;


	
	protected $desuni;


	
	protected $abruni;


	
	protected $stauni;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduni()
	{

		return $this->coduni; 		
	}
	
	public function getDesuni()
	{

		return $this->desuni; 		
	}
	
	public function getAbruni()
	{

		return $this->abruni; 		
	}
	
	public function getStauni()
	{

		return $this->stauni; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCoduni($v)
	{

		if ($this->coduni !== $v) {
			$this->coduni = $v;
			$this->modifiedColumns[] = OcunidadPeer::CODUNI;
		}

	} 
	
	public function setDesuni($v)
	{

		if ($this->desuni !== $v) {
			$this->desuni = $v;
			$this->modifiedColumns[] = OcunidadPeer::DESUNI;
		}

	} 
	
	public function setAbruni($v)
	{

		if ($this->abruni !== $v) {
			$this->abruni = $v;
			$this->modifiedColumns[] = OcunidadPeer::ABRUNI;
		}

	} 
	
	public function setStauni($v)
	{

		if ($this->stauni !== $v) {
			$this->stauni = $v;
			$this->modifiedColumns[] = OcunidadPeer::STAUNI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcunidadPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coduni = $rs->getString($startcol + 0);

			$this->desuni = $rs->getString($startcol + 1);

			$this->abruni = $rs->getString($startcol + 2);

			$this->stauni = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocunidad object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcunidadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcunidadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcunidadPeer::DATABASE_NAME);
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
					$pk = OcunidadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcunidadPeer::doUpdate($this, $con);
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


			if (($retval = OcunidadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcunidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduni();
				break;
			case 1:
				return $this->getDesuni();
				break;
			case 2:
				return $this->getAbruni();
				break;
			case 3:
				return $this->getStauni();
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
		$keys = OcunidadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduni(),
			$keys[1] => $this->getDesuni(),
			$keys[2] => $this->getAbruni(),
			$keys[3] => $this->getStauni(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcunidadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduni($value);
				break;
			case 1:
				$this->setDesuni($value);
				break;
			case 2:
				$this->setAbruni($value);
				break;
			case 3:
				$this->setStauni($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcunidadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduni($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAbruni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStauni($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcunidadPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcunidadPeer::CODUNI)) $criteria->add(OcunidadPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(OcunidadPeer::DESUNI)) $criteria->add(OcunidadPeer::DESUNI, $this->desuni);
		if ($this->isColumnModified(OcunidadPeer::ABRUNI)) $criteria->add(OcunidadPeer::ABRUNI, $this->abruni);
		if ($this->isColumnModified(OcunidadPeer::STAUNI)) $criteria->add(OcunidadPeer::STAUNI, $this->stauni);
		if ($this->isColumnModified(OcunidadPeer::ID)) $criteria->add(OcunidadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcunidadPeer::DATABASE_NAME);

		$criteria->add(OcunidadPeer::ID, $this->id);

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

		$copyObj->setCoduni($this->coduni);

		$copyObj->setDesuni($this->desuni);

		$copyObj->setAbruni($this->abruni);

		$copyObj->setStauni($this->stauni);


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
			self::$peer = new OcunidadPeer();
		}
		return self::$peer;
	}

} 