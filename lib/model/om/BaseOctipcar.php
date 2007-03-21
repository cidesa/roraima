<?php


abstract class BaseOctipcar extends BaseObject  implements Persistent {


	
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
			$this->modifiedColumns[] = OctipcarPeer::CODTIPCAR;
		}

	} 
	
	public function setDestipcar($v)
	{

		if ($this->destipcar !== $v) {
			$this->destipcar = $v;
			$this->modifiedColumns[] = OctipcarPeer::DESTIPCAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OctipcarPeer::ID;
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
			throw new PropelException("Error populating Octipcar object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OctipcarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OctipcarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OctipcarPeer::DATABASE_NAME);
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
					$pk = OctipcarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OctipcarPeer::doUpdate($this, $con);
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


			if (($retval = OctipcarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = OctipcarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcar(),
			$keys[1] => $this->getDestipcar(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OctipcarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = OctipcarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OctipcarPeer::DATABASE_NAME);

		if ($this->isColumnModified(OctipcarPeer::CODTIPCAR)) $criteria->add(OctipcarPeer::CODTIPCAR, $this->codtipcar);
		if ($this->isColumnModified(OctipcarPeer::DESTIPCAR)) $criteria->add(OctipcarPeer::DESTIPCAR, $this->destipcar);
		if ($this->isColumnModified(OctipcarPeer::ID)) $criteria->add(OctipcarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OctipcarPeer::DATABASE_NAME);

		$criteria->add(OctipcarPeer::ID, $this->id);

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
			self::$peer = new OctipcarPeer();
		}
		return self::$peer;
	}

} 