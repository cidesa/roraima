<?php


abstract class BaseOcactcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codactcom;


	
	protected $desactcom;


	
	protected $staactcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodactcom()
	{

		return $this->codactcom;
	}

	
	public function getDesactcom()
	{

		return $this->desactcom;
	}

	
	public function getStaactcom()
	{

		return $this->staactcom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodactcom($v)
	{

		if ($this->codactcom !== $v) {
			$this->codactcom = $v;
			$this->modifiedColumns[] = OcactcomPeer::CODACTCOM;
		}

	} 
	
	public function setDesactcom($v)
	{

		if ($this->desactcom !== $v) {
			$this->desactcom = $v;
			$this->modifiedColumns[] = OcactcomPeer::DESACTCOM;
		}

	} 
	
	public function setStaactcom($v)
	{

		if ($this->staactcom !== $v) {
			$this->staactcom = $v;
			$this->modifiedColumns[] = OcactcomPeer::STAACTCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcactcomPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codactcom = $rs->getString($startcol + 0);

			$this->desactcom = $rs->getString($startcol + 1);

			$this->staactcom = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocactcom object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcactcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcactcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcactcomPeer::DATABASE_NAME);
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
					$pk = OcactcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcactcomPeer::doUpdate($this, $con);
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


			if (($retval = OcactcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcactcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodactcom();
				break;
			case 1:
				return $this->getDesactcom();
				break;
			case 2:
				return $this->getStaactcom();
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
		$keys = OcactcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodactcom(),
			$keys[1] => $this->getDesactcom(),
			$keys[2] => $this->getStaactcom(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcactcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodactcom($value);
				break;
			case 1:
				$this->setDesactcom($value);
				break;
			case 2:
				$this->setStaactcom($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcactcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodactcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesactcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStaactcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcactcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcactcomPeer::CODACTCOM)) $criteria->add(OcactcomPeer::CODACTCOM, $this->codactcom);
		if ($this->isColumnModified(OcactcomPeer::DESACTCOM)) $criteria->add(OcactcomPeer::DESACTCOM, $this->desactcom);
		if ($this->isColumnModified(OcactcomPeer::STAACTCOM)) $criteria->add(OcactcomPeer::STAACTCOM, $this->staactcom);
		if ($this->isColumnModified(OcactcomPeer::ID)) $criteria->add(OcactcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcactcomPeer::DATABASE_NAME);

		$criteria->add(OcactcomPeer::ID, $this->id);

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

		$copyObj->setCodactcom($this->codactcom);

		$copyObj->setDesactcom($this->desactcom);

		$copyObj->setStaactcom($this->staactcom);


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
			self::$peer = new OcactcomPeer();
		}
		return self::$peer;
	}

} 