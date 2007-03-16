<?php


abstract class BaseFordefnucdesend extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnucdes;


	
	protected $desnucdes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnucdes()
	{

		return $this->codnucdes;
	}

	
	public function getDesnucdes()
	{

		return $this->desnucdes;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnucdes($v)
	{

		if ($this->codnucdes !== $v) {
			$this->codnucdes = $v;
			$this->modifiedColumns[] = FordefnucdesendPeer::CODNUCDES;
		}

	} 
	
	public function setDesnucdes($v)
	{

		if ($this->desnucdes !== $v) {
			$this->desnucdes = $v;
			$this->modifiedColumns[] = FordefnucdesendPeer::DESNUCDES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefnucdesendPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnucdes = $rs->getString($startcol + 0);

			$this->desnucdes = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefnucdesend object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefnucdesendPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefnucdesendPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefnucdesendPeer::DATABASE_NAME);
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
					$pk = FordefnucdesendPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefnucdesendPeer::doUpdate($this, $con);
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


			if (($retval = FordefnucdesendPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefnucdesendPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnucdes();
				break;
			case 1:
				return $this->getDesnucdes();
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
		$keys = FordefnucdesendPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnucdes(),
			$keys[1] => $this->getDesnucdes(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefnucdesendPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnucdes($value);
				break;
			case 1:
				$this->setDesnucdes($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefnucdesendPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnucdes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesnucdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefnucdesendPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefnucdesendPeer::CODNUCDES)) $criteria->add(FordefnucdesendPeer::CODNUCDES, $this->codnucdes);
		if ($this->isColumnModified(FordefnucdesendPeer::DESNUCDES)) $criteria->add(FordefnucdesendPeer::DESNUCDES, $this->desnucdes);
		if ($this->isColumnModified(FordefnucdesendPeer::ID)) $criteria->add(FordefnucdesendPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefnucdesendPeer::DATABASE_NAME);

		$criteria->add(FordefnucdesendPeer::ID, $this->id);

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

		$copyObj->setCodnucdes($this->codnucdes);

		$copyObj->setDesnucdes($this->desnucdes);


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
			self::$peer = new FordefnucdesendPeer();
		}
		return self::$peer;
	}

} 