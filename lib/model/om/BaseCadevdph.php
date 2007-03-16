<?php


abstract class BaseCadevdph extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $devdph;


	
	protected $fecdev;


	
	protected $dphart;


	
	protected $desdev;


	
	protected $mondev;


	
	protected $stadev;


	
	protected $numcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDevdph()
	{

		return $this->devdph;
	}

	
	public function getFecdev($format = 'Y-m-d')
	{

		if ($this->fecdev === null || $this->fecdev === '') {
			return null;
		} elseif (!is_int($this->fecdev)) {
						$ts = strtotime($this->fecdev);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdev] as date/time value: " . var_export($this->fecdev, true));
			}
		} else {
			$ts = $this->fecdev;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDphart()
	{

		return $this->dphart;
	}

	
	public function getDesdev()
	{

		return $this->desdev;
	}

	
	public function getMondev()
	{

		return $this->mondev;
	}

	
	public function getStadev()
	{

		return $this->stadev;
	}

	
	public function getNumcom()
	{

		return $this->numcom;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setDevdph($v)
	{

		if ($this->devdph !== $v) {
			$this->devdph = $v;
			$this->modifiedColumns[] = CadevdphPeer::DEVDPH;
		}

	} 
	
	public function setFecdev($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdev] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdev !== $ts) {
			$this->fecdev = $ts;
			$this->modifiedColumns[] = CadevdphPeer::FECDEV;
		}

	} 
	
	public function setDphart($v)
	{

		if ($this->dphart !== $v) {
			$this->dphart = $v;
			$this->modifiedColumns[] = CadevdphPeer::DPHART;
		}

	} 
	
	public function setDesdev($v)
	{

		if ($this->desdev !== $v) {
			$this->desdev = $v;
			$this->modifiedColumns[] = CadevdphPeer::DESDEV;
		}

	} 
	
	public function setMondev($v)
	{

		if ($this->mondev !== $v) {
			$this->mondev = $v;
			$this->modifiedColumns[] = CadevdphPeer::MONDEV;
		}

	} 
	
	public function setStadev($v)
	{

		if ($this->stadev !== $v) {
			$this->stadev = $v;
			$this->modifiedColumns[] = CadevdphPeer::STADEV;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = CadevdphPeer::NUMCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CadevdphPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->devdph = $rs->getString($startcol + 0);

			$this->fecdev = $rs->getDate($startcol + 1, null);

			$this->dphart = $rs->getString($startcol + 2);

			$this->desdev = $rs->getString($startcol + 3);

			$this->mondev = $rs->getFloat($startcol + 4);

			$this->stadev = $rs->getString($startcol + 5);

			$this->numcom = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cadevdph object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CadevdphPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadevdphPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadevdphPeer::DATABASE_NAME);
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
					$pk = CadevdphPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CadevdphPeer::doUpdate($this, $con);
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


			if (($retval = CadevdphPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadevdphPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDevdph();
				break;
			case 1:
				return $this->getFecdev();
				break;
			case 2:
				return $this->getDphart();
				break;
			case 3:
				return $this->getDesdev();
				break;
			case 4:
				return $this->getMondev();
				break;
			case 5:
				return $this->getStadev();
				break;
			case 6:
				return $this->getNumcom();
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
		$keys = CadevdphPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDevdph(),
			$keys[1] => $this->getFecdev(),
			$keys[2] => $this->getDphart(),
			$keys[3] => $this->getDesdev(),
			$keys[4] => $this->getMondev(),
			$keys[5] => $this->getStadev(),
			$keys[6] => $this->getNumcom(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadevdphPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDevdph($value);
				break;
			case 1:
				$this->setFecdev($value);
				break;
			case 2:
				$this->setDphart($value);
				break;
			case 3:
				$this->setDesdev($value);
				break;
			case 4:
				$this->setMondev($value);
				break;
			case 5:
				$this->setStadev($value);
				break;
			case 6:
				$this->setNumcom($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadevdphPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDevdph($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdev($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDphart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesdev($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondev($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStadev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadevdphPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadevdphPeer::DEVDPH)) $criteria->add(CadevdphPeer::DEVDPH, $this->devdph);
		if ($this->isColumnModified(CadevdphPeer::FECDEV)) $criteria->add(CadevdphPeer::FECDEV, $this->fecdev);
		if ($this->isColumnModified(CadevdphPeer::DPHART)) $criteria->add(CadevdphPeer::DPHART, $this->dphart);
		if ($this->isColumnModified(CadevdphPeer::DESDEV)) $criteria->add(CadevdphPeer::DESDEV, $this->desdev);
		if ($this->isColumnModified(CadevdphPeer::MONDEV)) $criteria->add(CadevdphPeer::MONDEV, $this->mondev);
		if ($this->isColumnModified(CadevdphPeer::STADEV)) $criteria->add(CadevdphPeer::STADEV, $this->stadev);
		if ($this->isColumnModified(CadevdphPeer::NUMCOM)) $criteria->add(CadevdphPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CadevdphPeer::ID)) $criteria->add(CadevdphPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadevdphPeer::DATABASE_NAME);

		$criteria->add(CadevdphPeer::ID, $this->id);

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

		$copyObj->setDevdph($this->devdph);

		$copyObj->setFecdev($this->fecdev);

		$copyObj->setDphart($this->dphart);

		$copyObj->setDesdev($this->desdev);

		$copyObj->setMondev($this->mondev);

		$copyObj->setStadev($this->stadev);

		$copyObj->setNumcom($this->numcom);


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
			self::$peer = new CadevdphPeer();
		}
		return self::$peer;
	}

} 