<?php


abstract class BaseBnrevact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecrev;


	
	protected $monmuerev;


	
	protected $moninmrev;


	
	protected $monsemrev;


	
	protected $monimnrev;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFecrev($format = 'Y-m-d')
	{

		if ($this->fecrev === null || $this->fecrev === '') {
			return null;
		} elseif (!is_int($this->fecrev)) {
						$ts = strtotime($this->fecrev);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrev] as date/time value: " . var_export($this->fecrev, true));
			}
		} else {
			$ts = $this->fecrev;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMonmuerev()
	{

		return number_format($this->monmuerev,2,',','.');
		
	}
	
	public function getMoninmrev()
	{

		return number_format($this->moninmrev,2,',','.');
		
	}
	
	public function getMonsemrev()
	{

		return number_format($this->monsemrev,2,',','.');
		
	}
	
	public function getMonimnrev()
	{

		return number_format($this->monimnrev,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setFecrev($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrev] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrev !== $ts) {
			$this->fecrev = $ts;
			$this->modifiedColumns[] = BnrevactPeer::FECREV;
		}

	} 
	
	public function setMonmuerev($v)
	{

		if ($this->monmuerev !== $v) {
			$this->monmuerev = $v;
			$this->modifiedColumns[] = BnrevactPeer::MONMUEREV;
		}

	} 
	
	public function setMoninmrev($v)
	{

		if ($this->moninmrev !== $v) {
			$this->moninmrev = $v;
			$this->modifiedColumns[] = BnrevactPeer::MONINMREV;
		}

	} 
	
	public function setMonsemrev($v)
	{

		if ($this->monsemrev !== $v) {
			$this->monsemrev = $v;
			$this->modifiedColumns[] = BnrevactPeer::MONSEMREV;
		}

	} 
	
	public function setMonimnrev($v)
	{

		if ($this->monimnrev !== $v) {
			$this->monimnrev = $v;
			$this->modifiedColumns[] = BnrevactPeer::MONIMNREV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BnrevactPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fecrev = $rs->getDate($startcol + 0, null);

			$this->monmuerev = $rs->getFloat($startcol + 1);

			$this->moninmrev = $rs->getFloat($startcol + 2);

			$this->monsemrev = $rs->getFloat($startcol + 3);

			$this->monimnrev = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bnrevact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BnrevactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnrevactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnrevactPeer::DATABASE_NAME);
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
					$pk = BnrevactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BnrevactPeer::doUpdate($this, $con);
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


			if (($retval = BnrevactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnrevactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecrev();
				break;
			case 1:
				return $this->getMonmuerev();
				break;
			case 2:
				return $this->getMoninmrev();
				break;
			case 3:
				return $this->getMonsemrev();
				break;
			case 4:
				return $this->getMonimnrev();
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
		$keys = BnrevactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecrev(),
			$keys[1] => $this->getMonmuerev(),
			$keys[2] => $this->getMoninmrev(),
			$keys[3] => $this->getMonsemrev(),
			$keys[4] => $this->getMonimnrev(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnrevactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecrev($value);
				break;
			case 1:
				$this->setMonmuerev($value);
				break;
			case 2:
				$this->setMoninmrev($value);
				break;
			case 3:
				$this->setMonsemrev($value);
				break;
			case 4:
				$this->setMonimnrev($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnrevactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecrev($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonmuerev($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoninmrev($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonsemrev($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonimnrev($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnrevactPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnrevactPeer::FECREV)) $criteria->add(BnrevactPeer::FECREV, $this->fecrev);
		if ($this->isColumnModified(BnrevactPeer::MONMUEREV)) $criteria->add(BnrevactPeer::MONMUEREV, $this->monmuerev);
		if ($this->isColumnModified(BnrevactPeer::MONINMREV)) $criteria->add(BnrevactPeer::MONINMREV, $this->moninmrev);
		if ($this->isColumnModified(BnrevactPeer::MONSEMREV)) $criteria->add(BnrevactPeer::MONSEMREV, $this->monsemrev);
		if ($this->isColumnModified(BnrevactPeer::MONIMNREV)) $criteria->add(BnrevactPeer::MONIMNREV, $this->monimnrev);
		if ($this->isColumnModified(BnrevactPeer::ID)) $criteria->add(BnrevactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnrevactPeer::DATABASE_NAME);

		$criteria->add(BnrevactPeer::ID, $this->id);

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

		$copyObj->setFecrev($this->fecrev);

		$copyObj->setMonmuerev($this->monmuerev);

		$copyObj->setMoninmrev($this->moninmrev);

		$copyObj->setMonsemrev($this->monsemrev);

		$copyObj->setMonimnrev($this->monimnrev);


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
			self::$peer = new BnrevactPeer();
		}
		return self::$peer;
	}

} 