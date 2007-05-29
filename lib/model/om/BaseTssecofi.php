<?php


abstract class BaseTssecofi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsecofi;


	
	protected $dessecofi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsecofi()
	{

		return $this->codsecofi; 		
	}
	
	public function getDessecofi()
	{

		return $this->dessecofi; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodsecofi($v)
	{

		if ($this->codsecofi !== $v) {
			$this->codsecofi = $v;
			$this->modifiedColumns[] = TssecofiPeer::CODSECOFI;
		}

	} 
	
	public function setDessecofi($v)
	{

		if ($this->dessecofi !== $v) {
			$this->dessecofi = $v;
			$this->modifiedColumns[] = TssecofiPeer::DESSECOFI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TssecofiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsecofi = $rs->getString($startcol + 0);

			$this->dessecofi = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tssecofi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TssecofiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TssecofiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TssecofiPeer::DATABASE_NAME);
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
					$pk = TssecofiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TssecofiPeer::doUpdate($this, $con);
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


			if (($retval = TssecofiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TssecofiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsecofi();
				break;
			case 1:
				return $this->getDessecofi();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TssecofiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsecofi(),
			$keys[1] => $this->getDessecofi(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TssecofiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsecofi($value);
				break;
			case 1:
				$this->setDessecofi($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TssecofiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsecofi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessecofi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TssecofiPeer::DATABASE_NAME);

		if ($this->isColumnModified(TssecofiPeer::CODSECOFI)) $criteria->add(TssecofiPeer::CODSECOFI, $this->codsecofi);
		if ($this->isColumnModified(TssecofiPeer::DESSECOFI)) $criteria->add(TssecofiPeer::DESSECOFI, $this->dessecofi);
		if ($this->isColumnModified(TssecofiPeer::ID)) $criteria->add(TssecofiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TssecofiPeer::DATABASE_NAME);

		$criteria->add(TssecofiPeer::ID, $this->id);

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

		$copyObj->setCodsecofi($this->codsecofi);

		$copyObj->setDessecofi($this->dessecofi);


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
			self::$peer = new TssecofiPeer();
		}
		return self::$peer;
	}

} 