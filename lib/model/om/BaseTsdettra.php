<?php


abstract class BaseTsdettra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftra;


	
	protected $ctaori;


	
	protected $ctades;


	
	protected $aumdis;


	
	protected $montra;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReftra()
	{

		return $this->reftra;
	}

	
	public function getCtaori()
	{

		return $this->ctaori;
	}

	
	public function getCtades()
	{

		return $this->ctades;
	}

	
	public function getAumdis()
	{

		return $this->aumdis;
	}

	
	public function getMontra()
	{

		return $this->montra;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setReftra($v)
	{

		if ($this->reftra !== $v) {
			$this->reftra = $v;
			$this->modifiedColumns[] = TsdettraPeer::REFTRA;
		}

	} 
	
	public function setCtaori($v)
	{

		if ($this->ctaori !== $v) {
			$this->ctaori = $v;
			$this->modifiedColumns[] = TsdettraPeer::CTAORI;
		}

	} 
	
	public function setCtades($v)
	{

		if ($this->ctades !== $v) {
			$this->ctades = $v;
			$this->modifiedColumns[] = TsdettraPeer::CTADES;
		}

	} 
	
	public function setAumdis($v)
	{

		if ($this->aumdis !== $v) {
			$this->aumdis = $v;
			$this->modifiedColumns[] = TsdettraPeer::AUMDIS;
		}

	} 
	
	public function setMontra($v)
	{

		if ($this->montra !== $v) {
			$this->montra = $v;
			$this->modifiedColumns[] = TsdettraPeer::MONTRA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsdettraPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reftra = $rs->getString($startcol + 0);

			$this->ctaori = $rs->getString($startcol + 1);

			$this->ctades = $rs->getString($startcol + 2);

			$this->aumdis = $rs->getString($startcol + 3);

			$this->montra = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsdettra object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdettraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdettraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdettraPeer::DATABASE_NAME);
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
					$pk = TsdettraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsdettraPeer::doUpdate($this, $con);
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


			if (($retval = TsdettraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdettraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftra();
				break;
			case 1:
				return $this->getCtaori();
				break;
			case 2:
				return $this->getCtades();
				break;
			case 3:
				return $this->getAumdis();
				break;
			case 4:
				return $this->getMontra();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdettraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftra(),
			$keys[1] => $this->getCtaori(),
			$keys[2] => $this->getCtades(),
			$keys[3] => $this->getAumdis(),
			$keys[4] => $this->getMontra(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdettraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftra($value);
				break;
			case 1:
				$this->setCtaori($value);
				break;
			case 2:
				$this->setCtades($value);
				break;
			case 3:
				$this->setAumdis($value);
				break;
			case 4:
				$this->setMontra($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdettraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCtaori($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtades($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAumdis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMontra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdettraPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdettraPeer::REFTRA)) $criteria->add(TsdettraPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(TsdettraPeer::CTAORI)) $criteria->add(TsdettraPeer::CTAORI, $this->ctaori);
		if ($this->isColumnModified(TsdettraPeer::CTADES)) $criteria->add(TsdettraPeer::CTADES, $this->ctades);
		if ($this->isColumnModified(TsdettraPeer::AUMDIS)) $criteria->add(TsdettraPeer::AUMDIS, $this->aumdis);
		if ($this->isColumnModified(TsdettraPeer::MONTRA)) $criteria->add(TsdettraPeer::MONTRA, $this->montra);
		if ($this->isColumnModified(TsdettraPeer::ID)) $criteria->add(TsdettraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdettraPeer::DATABASE_NAME);

		$criteria->add(TsdettraPeer::ID, $this->id);

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

		$copyObj->setReftra($this->reftra);

		$copyObj->setCtaori($this->ctaori);

		$copyObj->setCtades($this->ctades);

		$copyObj->setAumdis($this->aumdis);

		$copyObj->setMontra($this->montra);


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
			self::$peer = new TsdettraPeer();
		}
		return self::$peer;
	}

} 