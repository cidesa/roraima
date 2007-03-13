<?php


abstract class BaseCaramart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ramart;


	
	protected $nomram;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRamart()
	{

		return $this->ramart;
	}

	
	public function getNomram()
	{

		return $this->nomram;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRamart($v)
	{

		if ($this->ramart !== $v) {
			$this->ramart = $v;
			$this->modifiedColumns[] = CaramartPeer::RAMART;
		}

	} 
	
	public function setNomram($v)
	{

		if ($this->nomram !== $v) {
			$this->nomram = $v;
			$this->modifiedColumns[] = CaramartPeer::NOMRAM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaramartPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ramart = $rs->getString($startcol + 0);

			$this->nomram = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caramart object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaramartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaramartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaramartPeer::DATABASE_NAME);
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
					$pk = CaramartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaramartPeer::doUpdate($this, $con);
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


			if (($retval = CaramartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaramartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRamart();
				break;
			case 1:
				return $this->getNomram();
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
		$keys = CaramartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRamart(),
			$keys[1] => $this->getNomram(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaramartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRamart($value);
				break;
			case 1:
				$this->setNomram($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaramartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRamart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomram($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaramartPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaramartPeer::RAMART)) $criteria->add(CaramartPeer::RAMART, $this->ramart);
		if ($this->isColumnModified(CaramartPeer::NOMRAM)) $criteria->add(CaramartPeer::NOMRAM, $this->nomram);
		if ($this->isColumnModified(CaramartPeer::ID)) $criteria->add(CaramartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaramartPeer::DATABASE_NAME);

		$criteria->add(CaramartPeer::RAMART, $this->ramart);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRamart();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRamart($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomram($this->nomram);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setRamart(NULL); 
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
			self::$peer = new CaramartPeer();
		}
		return self::$peer;
	}

} 