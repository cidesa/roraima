<?php


abstract class BaseFcusoinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduso;


	
	protected $nomuso;


	
	protected $factor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduso()
	{

		return $this->coduso;
	}

	
	public function getNomuso()
	{

		return $this->nomuso;
	}

	
	public function getFactor()
	{

		return $this->factor;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = FcusoinmPeer::CODUSO;
		}

	} 
	
	public function setNomuso($v)
	{

		if ($this->nomuso !== $v) {
			$this->nomuso = $v;
			$this->modifiedColumns[] = FcusoinmPeer::NOMUSO;
		}

	} 
	
	public function setFactor($v)
	{

		if ($this->factor !== $v) {
			$this->factor = $v;
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

			$this->coduso = $rs->getString($startcol + 0);

			$this->nomuso = $rs->getString($startcol + 1);

			$this->factor = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcusoinm object", $e);
		}
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
				return $this->getCoduso();
				break;
			case 1:
				return $this->getNomuso();
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
			$keys[0] => $this->getCoduso(),
			$keys[1] => $this->getNomuso(),
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
				$this->setCoduso($value);
				break;
			case 1:
				$this->setNomuso($value);
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

		if (array_key_exists($keys[0], $arr)) $this->setCoduso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomuso($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFactor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcusoinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcusoinmPeer::CODUSO)) $criteria->add(FcusoinmPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcusoinmPeer::NOMUSO)) $criteria->add(FcusoinmPeer::NOMUSO, $this->nomuso);
		if ($this->isColumnModified(FcusoinmPeer::FACTOR)) $criteria->add(FcusoinmPeer::FACTOR, $this->factor);
		if ($this->isColumnModified(FcusoinmPeer::ID)) $criteria->add(FcusoinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcusoinmPeer::DATABASE_NAME);

		$criteria->add(FcusoinmPeer::CODUSO, $this->coduso);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCoduso();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCoduso($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomuso($this->nomuso);

		$copyObj->setFactor($this->factor);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCoduso(NULL); 
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