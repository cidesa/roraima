<?php


abstract class BaseNptipcar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipcar;


	
	protected $destipcar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtipcar()
	{

		return $this->codtipcar;
	}

	
	public function getDestipcar()
	{

		return $this->destipcar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodtipcar($v)
	{

		if ($this->codtipcar !== $v) {
			$this->codtipcar = $v;
			$this->modifiedColumns[] = NptipcarPeer::CODTIPCAR;
		}

	} 
	
	public function setDestipcar($v)
	{

		if ($this->destipcar !== $v) {
			$this->destipcar = $v;
			$this->modifiedColumns[] = NptipcarPeer::DESTIPCAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NptipcarPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtipcar = $rs->getString($startcol + 0);

			$this->destipcar = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nptipcar object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NptipcarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptipcarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptipcarPeer::DATABASE_NAME);
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
					$pk = NptipcarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NptipcarPeer::doUpdate($this, $con);
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


			if (($retval = NptipcarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipcar();
				break;
			case 1:
				return $this->getDestipcar();
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
		$keys = NptipcarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcar(),
			$keys[1] => $this->getDestipcar(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipcar($value);
				break;
			case 1:
				$this->setDestipcar($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptipcarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptipcarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptipcarPeer::CODTIPCAR)) $criteria->add(NptipcarPeer::CODTIPCAR, $this->codtipcar);
		if ($this->isColumnModified(NptipcarPeer::DESTIPCAR)) $criteria->add(NptipcarPeer::DESTIPCAR, $this->destipcar);
		if ($this->isColumnModified(NptipcarPeer::ID)) $criteria->add(NptipcarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptipcarPeer::DATABASE_NAME);

		$criteria->add(NptipcarPeer::ID, $this->id);

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

		$copyObj->setCodtipcar($this->codtipcar);

		$copyObj->setDestipcar($this->destipcar);


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
			self::$peer = new NptipcarPeer();
		}
		return self::$peer;
	}

} 