<?php


abstract class BaseNpaccrac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codaccadm;


	
	protected $codemp;


	
	protected $codrac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodaccadm()
	{

		return $this->codaccadm; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getCodrac()
	{

		return $this->codrac; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodaccadm($v)
	{

		if ($this->codaccadm !== $v) {
			$this->codaccadm = $v;
			$this->modifiedColumns[] = NpaccracPeer::CODACCADM;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpaccracPeer::CODEMP;
		}

	} 
	
	public function setCodrac($v)
	{

		if ($this->codrac !== $v) {
			$this->codrac = $v;
			$this->modifiedColumns[] = NpaccracPeer::CODRAC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpaccracPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codaccadm = $rs->getString($startcol + 0);

			$this->codemp = $rs->getString($startcol + 1);

			$this->codrac = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npaccrac object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpaccracPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpaccracPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpaccracPeer::DATABASE_NAME);
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
					$pk = NpaccracPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpaccracPeer::doUpdate($this, $con);
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


			if (($retval = NpaccracPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpaccracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodaccadm();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodrac();
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
		$keys = NpaccracPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodaccadm(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodrac(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpaccracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodaccadm($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodrac($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpaccracPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodaccadm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodrac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpaccracPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpaccracPeer::CODACCADM)) $criteria->add(NpaccracPeer::CODACCADM, $this->codaccadm);
		if ($this->isColumnModified(NpaccracPeer::CODEMP)) $criteria->add(NpaccracPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpaccracPeer::CODRAC)) $criteria->add(NpaccracPeer::CODRAC, $this->codrac);
		if ($this->isColumnModified(NpaccracPeer::ID)) $criteria->add(NpaccracPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpaccracPeer::DATABASE_NAME);

		$criteria->add(NpaccracPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodrac($this->codrac);


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
			self::$peer = new NpaccracPeer();
		}
		return self::$peer;
	}

} 