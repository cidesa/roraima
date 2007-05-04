<?php


abstract class BaseFccarinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcarinm;


	
	protected $nomcarinm;


	
	protected $stacarinm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcarinm()
	{

		return $this->codcarinm;
	}

	
	public function getNomcarinm()
	{

		return $this->nomcarinm;
	}

	
	public function getStacarinm()
	{

		return $this->stacarinm;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcarinm($v)
	{

		if ($this->codcarinm !== $v) {
			$this->codcarinm = $v;
			$this->modifiedColumns[] = FccarinmPeer::CODCARINM;
		}

	} 
	
	public function setNomcarinm($v)
	{

		if ($this->nomcarinm !== $v) {
			$this->nomcarinm = $v;
			$this->modifiedColumns[] = FccarinmPeer::NOMCARINM;
		}

	} 
	
	public function setStacarinm($v)
	{

		if ($this->stacarinm !== $v) {
			$this->stacarinm = $v;
			$this->modifiedColumns[] = FccarinmPeer::STACARINM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FccarinmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcarinm = $rs->getString($startcol + 0);

			$this->nomcarinm = $rs->getString($startcol + 1);

			$this->stacarinm = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fccarinm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FccarinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FccarinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FccarinmPeer::DATABASE_NAME);
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
					$pk = FccarinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FccarinmPeer::doUpdate($this, $con);
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


			if (($retval = FccarinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccarinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcarinm();
				break;
			case 1:
				return $this->getNomcarinm();
				break;
			case 2:
				return $this->getStacarinm();
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
		$keys = FccarinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcarinm(),
			$keys[1] => $this->getNomcarinm(),
			$keys[2] => $this->getStacarinm(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FccarinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcarinm($value);
				break;
			case 1:
				$this->setNomcarinm($value);
				break;
			case 2:
				$this->setStacarinm($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FccarinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcarinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcarinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStacarinm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FccarinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FccarinmPeer::CODCARINM)) $criteria->add(FccarinmPeer::CODCARINM, $this->codcarinm);
		if ($this->isColumnModified(FccarinmPeer::NOMCARINM)) $criteria->add(FccarinmPeer::NOMCARINM, $this->nomcarinm);
		if ($this->isColumnModified(FccarinmPeer::STACARINM)) $criteria->add(FccarinmPeer::STACARINM, $this->stacarinm);
		if ($this->isColumnModified(FccarinmPeer::ID)) $criteria->add(FccarinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FccarinmPeer::DATABASE_NAME);

		$criteria->add(FccarinmPeer::ID, $this->id);

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

		$copyObj->setCodcarinm($this->codcarinm);

		$copyObj->setNomcarinm($this->nomcarinm);

		$copyObj->setStacarinm($this->stacarinm);


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
			self::$peer = new FccarinmPeer();
		}
		return self::$peer;
	}

} 