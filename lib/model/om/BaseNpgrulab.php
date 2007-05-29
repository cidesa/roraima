<?php


abstract class BaseNpgrulab extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgrulab;


	
	protected $desgrulab;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodgrulab()
	{

		return $this->codgrulab; 		
	}
	
	public function getDesgrulab()
	{

		return $this->desgrulab; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodgrulab($v)
	{

		if ($this->codgrulab !== $v) {
			$this->codgrulab = $v;
			$this->modifiedColumns[] = NpgrulabPeer::CODGRULAB;
		}

	} 
	
	public function setDesgrulab($v)
	{

		if ($this->desgrulab !== $v) {
			$this->desgrulab = $v;
			$this->modifiedColumns[] = NpgrulabPeer::DESGRULAB;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpgrulabPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codgrulab = $rs->getString($startcol + 0);

			$this->desgrulab = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npgrulab object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpgrulabPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpgrulabPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpgrulabPeer::DATABASE_NAME);
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
					$pk = NpgrulabPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpgrulabPeer::doUpdate($this, $con);
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


			if (($retval = NpgrulabPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgrulabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgrulab();
				break;
			case 1:
				return $this->getDesgrulab();
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
		$keys = NpgrulabPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgrulab(),
			$keys[1] => $this->getDesgrulab(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgrulabPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgrulab($value);
				break;
			case 1:
				$this->setDesgrulab($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpgrulabPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgrulab($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesgrulab($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpgrulabPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpgrulabPeer::CODGRULAB)) $criteria->add(NpgrulabPeer::CODGRULAB, $this->codgrulab);
		if ($this->isColumnModified(NpgrulabPeer::DESGRULAB)) $criteria->add(NpgrulabPeer::DESGRULAB, $this->desgrulab);
		if ($this->isColumnModified(NpgrulabPeer::ID)) $criteria->add(NpgrulabPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpgrulabPeer::DATABASE_NAME);

		$criteria->add(NpgrulabPeer::ID, $this->id);

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

		$copyObj->setCodgrulab($this->codgrulab);

		$copyObj->setDesgrulab($this->desgrulab);


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
			self::$peer = new NpgrulabPeer();
		}
		return self::$peer;
	}

} 