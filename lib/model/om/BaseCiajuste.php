<?php


abstract class BaseCiajuste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refaju;


	
	protected $fecaju;


	
	protected $anoaju;


	
	protected $refere;


	
	protected $desaju;


	
	protected $desanu;


	
	protected $totaju;


	
	protected $staaju;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefaju()
	{

		return $this->refaju; 		
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

	
	public function getAnoaju()
	{

		return $this->anoaju; 		
	}
	
	public function getRefere()
	{

		return $this->refere; 		
	}
	
	public function getDesaju()
	{

		return $this->desaju; 		
	}
	
	public function getDesanu()
	{

		return $this->desanu; 		
	}
	
	public function getTotaju()
	{

		return number_format($this->totaju,2,',','.');
		
	}
	
	public function getStaaju()
	{

		return $this->staaju; 		
	}
	
	public function getFecanu($format = 'Y-m-d')
	{

		if ($this->fecanu === null || $this->fecanu === '') {
			return null;
		} elseif (!is_int($this->fecanu)) {
						$ts = strtotime($this->fecanu);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
			}
		} else {
			$ts = $this->fecanu;
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
			$this->modifiedColumns[] = CiajustePeer::REFAJU;
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
			$this->modifiedColumns[] = CiajustePeer::FECAJU;
		}

	} 
	
	public function setAnoaju($v)
	{

		if ($this->anoaju !== $v) {
			$this->anoaju = $v;
			$this->modifiedColumns[] = CiajustePeer::ANOAJU;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = CiajustePeer::REFERE;
		}

	} 
	
	public function setDesaju($v)
	{

		if ($this->desaju !== $v) {
			$this->desaju = $v;
			$this->modifiedColumns[] = CiajustePeer::DESAJU;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CiajustePeer::DESANU;
		}

	} 
	
	public function setTotaju($v)
	{

		if ($this->totaju !== $v) {
			$this->totaju = $v;
			$this->modifiedColumns[] = CiajustePeer::TOTAJU;
		}

	} 
	
	public function setStaaju($v)
	{

		if ($this->staaju !== $v) {
			$this->staaju = $v;
			$this->modifiedColumns[] = CiajustePeer::STAAJU;
		}

	} 
	
	public function setFecanu($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanu !== $ts) {
			$this->fecanu = $ts;
			$this->modifiedColumns[] = CiajustePeer::FECANU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CiajustePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refaju = $rs->getString($startcol + 0);

			$this->fecaju = $rs->getDate($startcol + 1, null);

			$this->anoaju = $rs->getString($startcol + 2);

			$this->refere = $rs->getString($startcol + 3);

			$this->desaju = $rs->getString($startcol + 4);

			$this->desanu = $rs->getString($startcol + 5);

			$this->totaju = $rs->getFloat($startcol + 6);

			$this->staaju = $rs->getString($startcol + 7);

			$this->fecanu = $rs->getDate($startcol + 8, null);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ciajuste object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiajustePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiajustePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiajustePeer::DATABASE_NAME);
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
					$pk = CiajustePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CiajustePeer::doUpdate($this, $con);
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


			if (($retval = CiajustePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefaju();
				break;
			case 1:
				return $this->getFecaju();
				break;
			case 2:
				return $this->getAnoaju();
				break;
			case 3:
				return $this->getRefere();
				break;
			case 4:
				return $this->getDesaju();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getTotaju();
				break;
			case 7:
				return $this->getStaaju();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiajustePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefaju(),
			$keys[1] => $this->getFecaju(),
			$keys[2] => $this->getAnoaju(),
			$keys[3] => $this->getRefere(),
			$keys[4] => $this->getDesaju(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getTotaju(),
			$keys[7] => $this->getStaaju(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefaju($value);
				break;
			case 1:
				$this->setFecaju($value);
				break;
			case 2:
				$this->setAnoaju($value);
				break;
			case 3:
				$this->setRefere($value);
				break;
			case 4:
				$this->setDesaju($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setTotaju($value);
				break;
			case 7:
				$this->setStaaju($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiajustePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecaju($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnoaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefere($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaaju($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiajustePeer::DATABASE_NAME);

		if ($this->isColumnModified(CiajustePeer::REFAJU)) $criteria->add(CiajustePeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(CiajustePeer::FECAJU)) $criteria->add(CiajustePeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(CiajustePeer::ANOAJU)) $criteria->add(CiajustePeer::ANOAJU, $this->anoaju);
		if ($this->isColumnModified(CiajustePeer::REFERE)) $criteria->add(CiajustePeer::REFERE, $this->refere);
		if ($this->isColumnModified(CiajustePeer::DESAJU)) $criteria->add(CiajustePeer::DESAJU, $this->desaju);
		if ($this->isColumnModified(CiajustePeer::DESANU)) $criteria->add(CiajustePeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CiajustePeer::TOTAJU)) $criteria->add(CiajustePeer::TOTAJU, $this->totaju);
		if ($this->isColumnModified(CiajustePeer::STAAJU)) $criteria->add(CiajustePeer::STAAJU, $this->staaju);
		if ($this->isColumnModified(CiajustePeer::FECANU)) $criteria->add(CiajustePeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CiajustePeer::ID)) $criteria->add(CiajustePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiajustePeer::DATABASE_NAME);

		$criteria->add(CiajustePeer::ID, $this->id);

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

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setAnoaju($this->anoaju);

		$copyObj->setRefere($this->refere);

		$copyObj->setDesaju($this->desaju);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setTotaju($this->totaju);

		$copyObj->setStaaju($this->staaju);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new CiajustePeer();
		}
		return self::$peer;
	}

} 