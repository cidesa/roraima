<?php


abstract class BaseNpaccadm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codaccadm;


	
	protected $desaccadm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodaccadm()
	{

		return $this->codaccadm; 		
	}
	
	public function getDesaccadm()
	{

		return $this->desaccadm; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodaccadm($v)
	{

		if ($this->codaccadm !== $v) {
			$this->codaccadm = $v;
			$this->modifiedColumns[] = NpaccadmPeer::CODACCADM;
		}

	} 
	
	public function setDesaccadm($v)
	{

		if ($this->desaccadm !== $v) {
			$this->desaccadm = $v;
			$this->modifiedColumns[] = NpaccadmPeer::DESACCADM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpaccadmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codaccadm = $rs->getString($startcol + 0);

			$this->desaccadm = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npaccadm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpaccadmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpaccadmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpaccadmPeer::DATABASE_NAME);
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
					$pk = NpaccadmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpaccadmPeer::doUpdate($this, $con);
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


			if (($retval = NpaccadmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpaccadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodaccadm();
				break;
			case 1:
				return $this->getDesaccadm();
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
		$keys = NpaccadmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodaccadm(),
			$keys[1] => $this->getDesaccadm(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpaccadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodaccadm($value);
				break;
			case 1:
				$this->setDesaccadm($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpaccadmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodaccadm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesaccadm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpaccadmPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpaccadmPeer::CODACCADM)) $criteria->add(NpaccadmPeer::CODACCADM, $this->codaccadm);
		if ($this->isColumnModified(NpaccadmPeer::DESACCADM)) $criteria->add(NpaccadmPeer::DESACCADM, $this->desaccadm);
		if ($this->isColumnModified(NpaccadmPeer::ID)) $criteria->add(NpaccadmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpaccadmPeer::DATABASE_NAME);

		$criteria->add(NpaccadmPeer::ID, $this->id);

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

		$copyObj->setCodaccadm($this->codaccadm);

		$copyObj->setDesaccadm($this->desaccadm);


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
			self::$peer = new NpaccadmPeer();
		}
		return self::$peer;
	}

} 