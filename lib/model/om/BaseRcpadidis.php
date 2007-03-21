<?php


abstract class BaseRcpadidis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refadi;


	
	protected $fecadi;


	
	protected $anoadi;


	
	protected $desadi;


	
	protected $desanu;


	
	protected $adidis;


	
	protected $totadi;


	
	protected $staadi;


	
	protected $numcom;


	
	protected $fecanu;


	
	protected $peradi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefadi()
	{

		return $this->refadi;
	}

	
	public function getFecadi($format = 'Y-m-d')
	{

		if ($this->fecadi === null || $this->fecadi === '') {
			return null;
		} elseif (!is_int($this->fecadi)) {
						$ts = strtotime($this->fecadi);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecadi] as date/time value: " . var_export($this->fecadi, true));
			}
		} else {
			$ts = $this->fecadi;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnoadi()
	{

		return $this->anoadi;
	}

	
	public function getDesadi()
	{

		return $this->desadi;
	}

	
	public function getDesanu()
	{

		return $this->desanu;
	}

	
	public function getAdidis()
	{

		return $this->adidis;
	}

	
	public function getTotadi()
	{

		return $this->totadi;
	}

	
	public function getStaadi()
	{

		return $this->staadi;
	}

	
	public function getNumcom()
	{

		return $this->numcom;
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

	
	public function getPeradi()
	{

		return $this->peradi;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefadi($v)
	{

		if ($this->refadi !== $v) {
			$this->refadi = $v;
			$this->modifiedColumns[] = RcpadidisPeer::REFADI;
		}

	} 
	
	public function setFecadi($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecadi] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecadi !== $ts) {
			$this->fecadi = $ts;
			$this->modifiedColumns[] = RcpadidisPeer::FECADI;
		}

	} 
	
	public function setAnoadi($v)
	{

		if ($this->anoadi !== $v) {
			$this->anoadi = $v;
			$this->modifiedColumns[] = RcpadidisPeer::ANOADI;
		}

	} 
	
	public function setDesadi($v)
	{

		if ($this->desadi !== $v) {
			$this->desadi = $v;
			$this->modifiedColumns[] = RcpadidisPeer::DESADI;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = RcpadidisPeer::DESANU;
		}

	} 
	
	public function setAdidis($v)
	{

		if ($this->adidis !== $v) {
			$this->adidis = $v;
			$this->modifiedColumns[] = RcpadidisPeer::ADIDIS;
		}

	} 
	
	public function setTotadi($v)
	{

		if ($this->totadi !== $v) {
			$this->totadi = $v;
			$this->modifiedColumns[] = RcpadidisPeer::TOTADI;
		}

	} 
	
	public function setStaadi($v)
	{

		if ($this->staadi !== $v) {
			$this->staadi = $v;
			$this->modifiedColumns[] = RcpadidisPeer::STAADI;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = RcpadidisPeer::NUMCOM;
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
			$this->modifiedColumns[] = RcpadidisPeer::FECANU;
		}

	} 
	
	public function setPeradi($v)
	{

		if ($this->peradi !== $v) {
			$this->peradi = $v;
			$this->modifiedColumns[] = RcpadidisPeer::PERADI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RcpadidisPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refadi = $rs->getString($startcol + 0);

			$this->fecadi = $rs->getDate($startcol + 1, null);

			$this->anoadi = $rs->getString($startcol + 2);

			$this->desadi = $rs->getString($startcol + 3);

			$this->desanu = $rs->getString($startcol + 4);

			$this->adidis = $rs->getString($startcol + 5);

			$this->totadi = $rs->getFloat($startcol + 6);

			$this->staadi = $rs->getString($startcol + 7);

			$this->numcom = $rs->getString($startcol + 8);

			$this->fecanu = $rs->getDate($startcol + 9, null);

			$this->peradi = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rcpadidis object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RcpadidisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RcpadidisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RcpadidisPeer::DATABASE_NAME);
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
					$pk = RcpadidisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RcpadidisPeer::doUpdate($this, $con);
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


			if (($retval = RcpadidisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RcpadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefadi();
				break;
			case 1:
				return $this->getFecadi();
				break;
			case 2:
				return $this->getAnoadi();
				break;
			case 3:
				return $this->getDesadi();
				break;
			case 4:
				return $this->getDesanu();
				break;
			case 5:
				return $this->getAdidis();
				break;
			case 6:
				return $this->getTotadi();
				break;
			case 7:
				return $this->getStaadi();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getPeradi();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RcpadidisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefadi(),
			$keys[1] => $this->getFecadi(),
			$keys[2] => $this->getAnoadi(),
			$keys[3] => $this->getDesadi(),
			$keys[4] => $this->getDesanu(),
			$keys[5] => $this->getAdidis(),
			$keys[6] => $this->getTotadi(),
			$keys[7] => $this->getStaadi(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getPeradi(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RcpadidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefadi($value);
				break;
			case 1:
				$this->setFecadi($value);
				break;
			case 2:
				$this->setAnoadi($value);
				break;
			case 3:
				$this->setDesadi($value);
				break;
			case 4:
				$this->setDesanu($value);
				break;
			case 5:
				$this->setAdidis($value);
				break;
			case 6:
				$this->setTotadi($value);
				break;
			case 7:
				$this->setStaadi($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setPeradi($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RcpadidisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefadi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecadi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnoadi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesanu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdidis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotadi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaadi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPeradi($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RcpadidisPeer::DATABASE_NAME);

		if ($this->isColumnModified(RcpadidisPeer::REFADI)) $criteria->add(RcpadidisPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(RcpadidisPeer::FECADI)) $criteria->add(RcpadidisPeer::FECADI, $this->fecadi);
		if ($this->isColumnModified(RcpadidisPeer::ANOADI)) $criteria->add(RcpadidisPeer::ANOADI, $this->anoadi);
		if ($this->isColumnModified(RcpadidisPeer::DESADI)) $criteria->add(RcpadidisPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(RcpadidisPeer::DESANU)) $criteria->add(RcpadidisPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(RcpadidisPeer::ADIDIS)) $criteria->add(RcpadidisPeer::ADIDIS, $this->adidis);
		if ($this->isColumnModified(RcpadidisPeer::TOTADI)) $criteria->add(RcpadidisPeer::TOTADI, $this->totadi);
		if ($this->isColumnModified(RcpadidisPeer::STAADI)) $criteria->add(RcpadidisPeer::STAADI, $this->staadi);
		if ($this->isColumnModified(RcpadidisPeer::NUMCOM)) $criteria->add(RcpadidisPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(RcpadidisPeer::FECANU)) $criteria->add(RcpadidisPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(RcpadidisPeer::PERADI)) $criteria->add(RcpadidisPeer::PERADI, $this->peradi);
		if ($this->isColumnModified(RcpadidisPeer::ID)) $criteria->add(RcpadidisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RcpadidisPeer::DATABASE_NAME);

		$criteria->add(RcpadidisPeer::ID, $this->id);

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

		$copyObj->setRefadi($this->refadi);

		$copyObj->setFecadi($this->fecadi);

		$copyObj->setAnoadi($this->anoadi);

		$copyObj->setDesadi($this->desadi);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setAdidis($this->adidis);

		$copyObj->setTotadi($this->totadi);

		$copyObj->setStaadi($this->staadi);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setPeradi($this->peradi);


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
			self::$peer = new RcpadidisPeer();
		}
		return self::$peer;
	}

} 