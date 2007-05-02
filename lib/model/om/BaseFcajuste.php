<?php


abstract class BaseFcajuste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numaju;


	
	protected $fecaju;


	
	protected $desaju;


	
	protected $numdec;


	
	protected $staaju;


	
	protected $monaju;


	
	protected $monreb;


	
	protected $monexo;


	
	protected $monimp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumaju()
	{

		return $this->numaju;
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

	
	public function getDesaju()
	{

		return $this->desaju;
	}

	
	public function getNumdec()
	{

		return $this->numdec;
	}

	
	public function getStaaju()
	{

		return $this->staaju;
	}

	
	public function getMonaju()
	{

		return $this->monaju;
	}

	
	public function getMonreb()
	{

		return $this->monreb;
	}

	
	public function getMonexo()
	{

		return $this->monexo;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumaju($v)
	{

		if ($this->numaju !== $v) {
			$this->numaju = $v;
			$this->modifiedColumns[] = FcajustePeer::NUMAJU;
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
			$this->modifiedColumns[] = FcajustePeer::FECAJU;
		}

	} 
	
	public function setDesaju($v)
	{

		if ($this->desaju !== $v) {
			$this->desaju = $v;
			$this->modifiedColumns[] = FcajustePeer::DESAJU;
		}

	} 
	
	public function setNumdec($v)
	{

		if ($this->numdec !== $v) {
			$this->numdec = $v;
			$this->modifiedColumns[] = FcajustePeer::NUMDEC;
		}

	} 
	
	public function setStaaju($v)
	{

		if ($this->staaju !== $v) {
			$this->staaju = $v;
			$this->modifiedColumns[] = FcajustePeer::STAAJU;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = FcajustePeer::MONAJU;
		}

	} 
	
	public function setMonreb($v)
	{

		if ($this->monreb !== $v) {
			$this->monreb = $v;
			$this->modifiedColumns[] = FcajustePeer::MONREB;
		}

	} 
	
	public function setMonexo($v)
	{

		if ($this->monexo !== $v) {
			$this->monexo = $v;
			$this->modifiedColumns[] = FcajustePeer::MONEXO;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcajustePeer::MONIMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcajustePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numaju = $rs->getString($startcol + 0);

			$this->fecaju = $rs->getDate($startcol + 1, null);

			$this->desaju = $rs->getString($startcol + 2);

			$this->numdec = $rs->getString($startcol + 3);

			$this->staaju = $rs->getString($startcol + 4);

			$this->monaju = $rs->getFloat($startcol + 5);

			$this->monreb = $rs->getFloat($startcol + 6);

			$this->monexo = $rs->getFloat($startcol + 7);

			$this->monimp = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcajuste object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcajustePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcajustePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcajustePeer::DATABASE_NAME);
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
					$pk = FcajustePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcajustePeer::doUpdate($this, $con);
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


			if (($retval = FcajustePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumaju();
				break;
			case 1:
				return $this->getFecaju();
				break;
			case 2:
				return $this->getDesaju();
				break;
			case 3:
				return $this->getNumdec();
				break;
			case 4:
				return $this->getStaaju();
				break;
			case 5:
				return $this->getMonaju();
				break;
			case 6:
				return $this->getMonreb();
				break;
			case 7:
				return $this->getMonexo();
				break;
			case 8:
				return $this->getMonimp();
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
		$keys = FcajustePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumaju(),
			$keys[1] => $this->getFecaju(),
			$keys[2] => $this->getDesaju(),
			$keys[3] => $this->getNumdec(),
			$keys[4] => $this->getStaaju(),
			$keys[5] => $this->getMonaju(),
			$keys[6] => $this->getMonreb(),
			$keys[7] => $this->getMonexo(),
			$keys[8] => $this->getMonimp(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumaju($value);
				break;
			case 1:
				$this->setFecaju($value);
				break;
			case 2:
				$this->setDesaju($value);
				break;
			case 3:
				$this->setNumdec($value);
				break;
			case 4:
				$this->setStaaju($value);
				break;
			case 5:
				$this->setMonaju($value);
				break;
			case 6:
				$this->setMonreb($value);
				break;
			case 7:
				$this->setMonexo($value);
				break;
			case 8:
				$this->setMonimp($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcajustePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecaju($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumdec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStaaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonaju($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonreb($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonexo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonimp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcajustePeer::DATABASE_NAME);

		if ($this->isColumnModified(FcajustePeer::NUMAJU)) $criteria->add(FcajustePeer::NUMAJU, $this->numaju);
		if ($this->isColumnModified(FcajustePeer::FECAJU)) $criteria->add(FcajustePeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(FcajustePeer::DESAJU)) $criteria->add(FcajustePeer::DESAJU, $this->desaju);
		if ($this->isColumnModified(FcajustePeer::NUMDEC)) $criteria->add(FcajustePeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcajustePeer::STAAJU)) $criteria->add(FcajustePeer::STAAJU, $this->staaju);
		if ($this->isColumnModified(FcajustePeer::MONAJU)) $criteria->add(FcajustePeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(FcajustePeer::MONREB)) $criteria->add(FcajustePeer::MONREB, $this->monreb);
		if ($this->isColumnModified(FcajustePeer::MONEXO)) $criteria->add(FcajustePeer::MONEXO, $this->monexo);
		if ($this->isColumnModified(FcajustePeer::MONIMP)) $criteria->add(FcajustePeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcajustePeer::ID)) $criteria->add(FcajustePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcajustePeer::DATABASE_NAME);

		$criteria->add(FcajustePeer::ID, $this->id);

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

		$copyObj->setNumaju($this->numaju);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setDesaju($this->desaju);

		$copyObj->setNumdec($this->numdec);

		$copyObj->setStaaju($this->staaju);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setMonreb($this->monreb);

		$copyObj->setMonexo($this->monexo);

		$copyObj->setMonimp($this->monimp);


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
			self::$peer = new FcajustePeer();
		}
		return self::$peer;
	}

} 