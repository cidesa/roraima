<?php


abstract class BaseCainvfis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecinv;


	
	protected $codalm;


	
	protected $codart;


	
	protected $exiact;


	
	protected $exiact2;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFecinv($format = 'Y-m-d')
	{

		if ($this->fecinv === null || $this->fecinv === '') {
			return null;
		} elseif (!is_int($this->fecinv)) {
						$ts = strtotime($this->fecinv);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecinv] as date/time value: " . var_export($this->fecinv, true));
			}
		} else {
			$ts = $this->fecinv;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodalm()
	{

		return $this->codalm;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getExiact()
	{

		return $this->exiact;
	}

	
	public function getExiact2()
	{

		return $this->exiact2;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setFecinv($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecinv] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecinv !== $ts) {
			$this->fecinv = $ts;
			$this->modifiedColumns[] = CainvfisPeer::FECINV;
		}

	} 
	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = CainvfisPeer::CODALM;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CainvfisPeer::CODART;
		}

	} 
	
	public function setExiact($v)
	{

		if ($this->exiact !== $v) {
			$this->exiact = $v;
			$this->modifiedColumns[] = CainvfisPeer::EXIACT;
		}

	} 
	
	public function setExiact2($v)
	{

		if ($this->exiact2 !== $v) {
			$this->exiact2 = $v;
			$this->modifiedColumns[] = CainvfisPeer::EXIACT2;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CainvfisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fecinv = $rs->getDate($startcol + 0, null);

			$this->codalm = $rs->getString($startcol + 1);

			$this->codart = $rs->getString($startcol + 2);

			$this->exiact = $rs->getFloat($startcol + 3);

			$this->exiact2 = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cainvfis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CainvfisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CainvfisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CainvfisPeer::DATABASE_NAME);
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
					$pk = CainvfisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CainvfisPeer::doUpdate($this, $con);
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


			if (($retval = CainvfisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CainvfisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecinv();
				break;
			case 1:
				return $this->getCodalm();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getExiact();
				break;
			case 4:
				return $this->getExiact2();
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
		$keys = CainvfisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecinv(),
			$keys[1] => $this->getCodalm(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getExiact(),
			$keys[4] => $this->getExiact2(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CainvfisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecinv($value);
				break;
			case 1:
				$this->setCodalm($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setExiact($value);
				break;
			case 4:
				$this->setExiact2($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CainvfisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecinv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodalm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setExiact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setExiact2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CainvfisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CainvfisPeer::FECINV)) $criteria->add(CainvfisPeer::FECINV, $this->fecinv);
		if ($this->isColumnModified(CainvfisPeer::CODALM)) $criteria->add(CainvfisPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CainvfisPeer::CODART)) $criteria->add(CainvfisPeer::CODART, $this->codart);
		if ($this->isColumnModified(CainvfisPeer::EXIACT)) $criteria->add(CainvfisPeer::EXIACT, $this->exiact);
		if ($this->isColumnModified(CainvfisPeer::EXIACT2)) $criteria->add(CainvfisPeer::EXIACT2, $this->exiact2);
		if ($this->isColumnModified(CainvfisPeer::ID)) $criteria->add(CainvfisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CainvfisPeer::DATABASE_NAME);

		$criteria->add(CainvfisPeer::ID, $this->id);

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

		$copyObj->setFecinv($this->fecinv);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCodart($this->codart);

		$copyObj->setExiact($this->exiact);

		$copyObj->setExiact2($this->exiact2);


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
			self::$peer = new CainvfisPeer();
		}
		return self::$peer;
	}

} 