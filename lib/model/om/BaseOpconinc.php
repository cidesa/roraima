<?php


abstract class BaseOpconinc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refaju;


	
	protected $numcom;


	
	protected $fecaju;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefaju()
	{

		return $this->refaju; 		
	}
	
	public function getNumcom()
	{

		return $this->numcom; 		
	}
	
	public function getFecaju($format = 'Y-m-d')
	{

		if ($this->fecaju === null || $this->fecaju === '') {
			return null;
		} elseif (!is_int($this->fecaju)) {
						$ts = strtotime($this->fecaju);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
			}
		} else {
			$ts = $this->fecaju;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefaju($v)
	{

		if ($this->refaju !== $v) {
			$this->refaju = $v;
			$this->modifiedColumns[] = OpconincPeer::REFAJU;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = OpconincPeer::NUMCOM;
		}

	} 
	
	public function setFecaju($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecaju !== $ts) {
			$this->fecaju = $ts;
			$this->modifiedColumns[] = OpconincPeer::FECAJU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OpconincPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refaju = $rs->getString($startcol + 0);

			$this->numcom = $rs->getString($startcol + 1);

			$this->fecaju = $rs->getDate($startcol + 2, null);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Opconinc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OpconincPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpconincPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpconincPeer::DATABASE_NAME);
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
					$pk = OpconincPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OpconincPeer::doUpdate($this, $con);
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


			if (($retval = OpconincPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpconincPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefaju();
				break;
			case 1:
				return $this->getNumcom();
				break;
			case 2:
				return $this->getFecaju();
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
		$keys = OpconincPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefaju(),
			$keys[1] => $this->getNumcom(),
			$keys[2] => $this->getFecaju(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpconincPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefaju($value);
				break;
			case 1:
				$this->setNumcom($value);
				break;
			case 2:
				$this->setFecaju($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpconincPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpconincPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpconincPeer::REFAJU)) $criteria->add(OpconincPeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(OpconincPeer::NUMCOM)) $criteria->add(OpconincPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(OpconincPeer::FECAJU)) $criteria->add(OpconincPeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(OpconincPeer::ID)) $criteria->add(OpconincPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpconincPeer::DATABASE_NAME);

		$criteria->add(OpconincPeer::ID, $this->id);

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

		$copyObj->setRefaju($this->refaju);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFecaju($this->fecaju);


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
			self::$peer = new OpconincPeer();
		}
		return self::$peer;
	}

} 