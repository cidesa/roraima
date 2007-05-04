<?php


abstract class BaseFcdecatp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdec;


	
	protected $numsol;


	
	protected $numlic;


	
	protected $fecdec;


	
	protected $mondec;


	
	protected $fundec;


	
	protected $edodec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumdec()
	{

		return $this->numdec;
	}

	
	public function getNumsol()
	{

		return $this->numsol;
	}

	
	public function getNumlic()
	{

		return $this->numlic;
	}

	
	public function getFecdec($format = 'Y-m-d')
	{

		if ($this->fecdec === null || $this->fecdec === '') {
			return null;
		} elseif (!is_int($this->fecdec)) {
						$ts = strtotime($this->fecdec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
			}
		} else {
			$ts = $this->fecdec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMondec()
	{

		return $this->mondec;
	}

	
	public function getFundec()
	{

		return $this->fundec;
	}

	
	public function getEdodec()
	{

		return $this->edodec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumdec($v)
	{

		if ($this->numdec !== $v) {
			$this->numdec = $v;
			$this->modifiedColumns[] = FcdecatpPeer::NUMDEC;
		}

	} 
	
	public function setNumsol($v)
	{

		if ($this->numsol !== $v) {
			$this->numsol = $v;
			$this->modifiedColumns[] = FcdecatpPeer::NUMSOL;
		}

	} 
	
	public function setNumlic($v)
	{

		if ($this->numlic !== $v) {
			$this->numlic = $v;
			$this->modifiedColumns[] = FcdecatpPeer::NUMLIC;
		}

	} 
	
	public function setFecdec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdec !== $ts) {
			$this->fecdec = $ts;
			$this->modifiedColumns[] = FcdecatpPeer::FECDEC;
		}

	} 
	
	public function setMondec($v)
	{

		if ($this->mondec !== $v) {
			$this->mondec = $v;
			$this->modifiedColumns[] = FcdecatpPeer::MONDEC;
		}

	} 
	
	public function setFundec($v)
	{

		if ($this->fundec !== $v) {
			$this->fundec = $v;
			$this->modifiedColumns[] = FcdecatpPeer::FUNDEC;
		}

	} 
	
	public function setEdodec($v)
	{

		if ($this->edodec !== $v) {
			$this->edodec = $v;
			$this->modifiedColumns[] = FcdecatpPeer::EDODEC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdecatpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numdec = $rs->getString($startcol + 0);

			$this->numsol = $rs->getString($startcol + 1);

			$this->numlic = $rs->getString($startcol + 2);

			$this->fecdec = $rs->getDate($startcol + 3, null);

			$this->mondec = $rs->getFloat($startcol + 4);

			$this->fundec = $rs->getString($startcol + 5);

			$this->edodec = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdecatp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdecatpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdecatpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdecatpPeer::DATABASE_NAME);
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
					$pk = FcdecatpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdecatpPeer::doUpdate($this, $con);
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


			if (($retval = FcdecatpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdecatpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdec();
				break;
			case 1:
				return $this->getNumsol();
				break;
			case 2:
				return $this->getNumlic();
				break;
			case 3:
				return $this->getFecdec();
				break;
			case 4:
				return $this->getMondec();
				break;
			case 5:
				return $this->getFundec();
				break;
			case 6:
				return $this->getEdodec();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdecatpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdec(),
			$keys[1] => $this->getNumsol(),
			$keys[2] => $this->getNumlic(),
			$keys[3] => $this->getFecdec(),
			$keys[4] => $this->getMondec(),
			$keys[5] => $this->getFundec(),
			$keys[6] => $this->getEdodec(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdecatpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdec($value);
				break;
			case 1:
				$this->setNumsol($value);
				break;
			case 2:
				$this->setNumlic($value);
				break;
			case 3:
				$this->setFecdec($value);
				break;
			case 4:
				$this->setMondec($value);
				break;
			case 5:
				$this->setFundec($value);
				break;
			case 6:
				$this->setEdodec($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdecatpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumlic($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFundec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEdodec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdecatpPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdecatpPeer::NUMDEC)) $criteria->add(FcdecatpPeer::NUMDEC, $this->numdec);
		if ($this->isColumnModified(FcdecatpPeer::NUMSOL)) $criteria->add(FcdecatpPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(FcdecatpPeer::NUMLIC)) $criteria->add(FcdecatpPeer::NUMLIC, $this->numlic);
		if ($this->isColumnModified(FcdecatpPeer::FECDEC)) $criteria->add(FcdecatpPeer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(FcdecatpPeer::MONDEC)) $criteria->add(FcdecatpPeer::MONDEC, $this->mondec);
		if ($this->isColumnModified(FcdecatpPeer::FUNDEC)) $criteria->add(FcdecatpPeer::FUNDEC, $this->fundec);
		if ($this->isColumnModified(FcdecatpPeer::EDODEC)) $criteria->add(FcdecatpPeer::EDODEC, $this->edodec);
		if ($this->isColumnModified(FcdecatpPeer::ID)) $criteria->add(FcdecatpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdecatpPeer::DATABASE_NAME);

		$criteria->add(FcdecatpPeer::ID, $this->id);

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

		$copyObj->setNumdec($this->numdec);

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumlic($this->numlic);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setMondec($this->mondec);

		$copyObj->setFundec($this->fundec);

		$copyObj->setEdodec($this->edodec);


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
			self::$peer = new FcdecatpPeer();
		}
		return self::$peer;
	}

} 