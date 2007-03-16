<?php


abstract class BaseCpajuste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refaju;


	
	protected $tipaju;


	
	protected $fecaju;


	
	protected $anoaju;


	
	protected $refere;


	
	protected $desaju;


	
	protected $desanu;


	
	protected $totaju;


	
	protected $staaju;


	
	protected $fecanu;


	
	protected $numcom;


	
	protected $cuoanu;


	
	protected $fecanudes;


	
	protected $fecanuhas;


	
	protected $ordpag;


	
	protected $fecenvcon;


	
	protected $fecenvfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefaju()
	{

		return $this->refaju;
	}

	
	public function getTipaju()
	{

		return $this->tipaju;
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

		return $this->totaju;
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

	
	public function getNumcom()
	{

		return $this->numcom;
	}

	
	public function getCuoanu()
	{

		return $this->cuoanu;
	}

	
	public function getFecanudes($format = 'Y-m-d')
	{

		if ($this->fecanudes === null || $this->fecanudes === '') {
			return null;
		} elseif (!is_int($this->fecanudes)) {
						$ts = strtotime($this->fecanudes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanudes] as date/time value: " . var_export($this->fecanudes, true));
			}
		} else {
			$ts = $this->fecanudes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecanuhas($format = 'Y-m-d')
	{

		if ($this->fecanuhas === null || $this->fecanuhas === '') {
			return null;
		} elseif (!is_int($this->fecanuhas)) {
						$ts = strtotime($this->fecanuhas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanuhas] as date/time value: " . var_export($this->fecanuhas, true));
			}
		} else {
			$ts = $this->fecanuhas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getOrdpag()
	{

		return $this->ordpag;
	}

	
	public function getFecenvcon($format = 'Y-m-d')
	{

		if ($this->fecenvcon === null || $this->fecenvcon === '') {
			return null;
		} elseif (!is_int($this->fecenvcon)) {
						$ts = strtotime($this->fecenvcon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecenvcon] as date/time value: " . var_export($this->fecenvcon, true));
			}
		} else {
			$ts = $this->fecenvcon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecenvfin($format = 'Y-m-d')
	{

		if ($this->fecenvfin === null || $this->fecenvfin === '') {
			return null;
		} elseif (!is_int($this->fecenvfin)) {
						$ts = strtotime($this->fecenvfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecenvfin] as date/time value: " . var_export($this->fecenvfin, true));
			}
		} else {
			$ts = $this->fecenvfin;
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
			$this->modifiedColumns[] = CpajustePeer::REFAJU;
		}

	} 
	
	public function setTipaju($v)
	{

		if ($this->tipaju !== $v) {
			$this->tipaju = $v;
			$this->modifiedColumns[] = CpajustePeer::TIPAJU;
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
			$this->modifiedColumns[] = CpajustePeer::FECAJU;
		}

	} 
	
	public function setAnoaju($v)
	{

		if ($this->anoaju !== $v) {
			$this->anoaju = $v;
			$this->modifiedColumns[] = CpajustePeer::ANOAJU;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = CpajustePeer::REFERE;
		}

	} 
	
	public function setDesaju($v)
	{

		if ($this->desaju !== $v) {
			$this->desaju = $v;
			$this->modifiedColumns[] = CpajustePeer::DESAJU;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CpajustePeer::DESANU;
		}

	} 
	
	public function setTotaju($v)
	{

		if ($this->totaju !== $v) {
			$this->totaju = $v;
			$this->modifiedColumns[] = CpajustePeer::TOTAJU;
		}

	} 
	
	public function setStaaju($v)
	{

		if ($this->staaju !== $v) {
			$this->staaju = $v;
			$this->modifiedColumns[] = CpajustePeer::STAAJU;
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
			$this->modifiedColumns[] = CpajustePeer::FECANU;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = CpajustePeer::NUMCOM;
		}

	} 
	
	public function setCuoanu($v)
	{

		if ($this->cuoanu !== $v) {
			$this->cuoanu = $v;
			$this->modifiedColumns[] = CpajustePeer::CUOANU;
		}

	} 
	
	public function setFecanudes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanudes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanudes !== $ts) {
			$this->fecanudes = $ts;
			$this->modifiedColumns[] = CpajustePeer::FECANUDES;
		}

	} 
	
	public function setFecanuhas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanuhas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanuhas !== $ts) {
			$this->fecanuhas = $ts;
			$this->modifiedColumns[] = CpajustePeer::FECANUHAS;
		}

	} 
	
	public function setOrdpag($v)
	{

		if ($this->ordpag !== $v) {
			$this->ordpag = $v;
			$this->modifiedColumns[] = CpajustePeer::ORDPAG;
		}

	} 
	
	public function setFecenvcon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecenvcon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecenvcon !== $ts) {
			$this->fecenvcon = $ts;
			$this->modifiedColumns[] = CpajustePeer::FECENVCON;
		}

	} 
	
	public function setFecenvfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecenvfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecenvfin !== $ts) {
			$this->fecenvfin = $ts;
			$this->modifiedColumns[] = CpajustePeer::FECENVFIN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpajustePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refaju = $rs->getString($startcol + 0);

			$this->tipaju = $rs->getString($startcol + 1);

			$this->fecaju = $rs->getDate($startcol + 2, null);

			$this->anoaju = $rs->getString($startcol + 3);

			$this->refere = $rs->getString($startcol + 4);

			$this->desaju = $rs->getString($startcol + 5);

			$this->desanu = $rs->getString($startcol + 6);

			$this->totaju = $rs->getFloat($startcol + 7);

			$this->staaju = $rs->getString($startcol + 8);

			$this->fecanu = $rs->getDate($startcol + 9, null);

			$this->numcom = $rs->getString($startcol + 10);

			$this->cuoanu = $rs->getFloat($startcol + 11);

			$this->fecanudes = $rs->getDate($startcol + 12, null);

			$this->fecanuhas = $rs->getDate($startcol + 13, null);

			$this->ordpag = $rs->getString($startcol + 14);

			$this->fecenvcon = $rs->getDate($startcol + 15, null);

			$this->fecenvfin = $rs->getDate($startcol + 16, null);

			$this->id = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpajuste object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpajustePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpajustePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpajustePeer::DATABASE_NAME);
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
					$pk = CpajustePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpajustePeer::doUpdate($this, $con);
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


			if (($retval = CpajustePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefaju();
				break;
			case 1:
				return $this->getTipaju();
				break;
			case 2:
				return $this->getFecaju();
				break;
			case 3:
				return $this->getAnoaju();
				break;
			case 4:
				return $this->getRefere();
				break;
			case 5:
				return $this->getDesaju();
				break;
			case 6:
				return $this->getDesanu();
				break;
			case 7:
				return $this->getTotaju();
				break;
			case 8:
				return $this->getStaaju();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getNumcom();
				break;
			case 11:
				return $this->getCuoanu();
				break;
			case 12:
				return $this->getFecanudes();
				break;
			case 13:
				return $this->getFecanuhas();
				break;
			case 14:
				return $this->getOrdpag();
				break;
			case 15:
				return $this->getFecenvcon();
				break;
			case 16:
				return $this->getFecenvfin();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpajustePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefaju(),
			$keys[1] => $this->getTipaju(),
			$keys[2] => $this->getFecaju(),
			$keys[3] => $this->getAnoaju(),
			$keys[4] => $this->getRefere(),
			$keys[5] => $this->getDesaju(),
			$keys[6] => $this->getDesanu(),
			$keys[7] => $this->getTotaju(),
			$keys[8] => $this->getStaaju(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getNumcom(),
			$keys[11] => $this->getCuoanu(),
			$keys[12] => $this->getFecanudes(),
			$keys[13] => $this->getFecanuhas(),
			$keys[14] => $this->getOrdpag(),
			$keys[15] => $this->getFecenvcon(),
			$keys[16] => $this->getFecenvfin(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpajustePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefaju($value);
				break;
			case 1:
				$this->setTipaju($value);
				break;
			case 2:
				$this->setFecaju($value);
				break;
			case 3:
				$this->setAnoaju($value);
				break;
			case 4:
				$this->setRefere($value);
				break;
			case 5:
				$this->setDesaju($value);
				break;
			case 6:
				$this->setDesanu($value);
				break;
			case 7:
				$this->setTotaju($value);
				break;
			case 8:
				$this->setStaaju($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setNumcom($value);
				break;
			case 11:
				$this->setCuoanu($value);
				break;
			case 12:
				$this->setFecanudes($value);
				break;
			case 13:
				$this->setFecanuhas($value);
				break;
			case 14:
				$this->setOrdpag($value);
				break;
			case 15:
				$this->setFecenvcon($value);
				break;
			case 16:
				$this->setFecenvfin($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpajustePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefaju($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipaju($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnoaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefere($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesaju($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesanu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTotaju($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStaaju($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumcom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCuoanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanudes($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecanuhas($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setOrdpag($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecenvcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecenvfin($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpajustePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpajustePeer::REFAJU)) $criteria->add(CpajustePeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(CpajustePeer::TIPAJU)) $criteria->add(CpajustePeer::TIPAJU, $this->tipaju);
		if ($this->isColumnModified(CpajustePeer::FECAJU)) $criteria->add(CpajustePeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(CpajustePeer::ANOAJU)) $criteria->add(CpajustePeer::ANOAJU, $this->anoaju);
		if ($this->isColumnModified(CpajustePeer::REFERE)) $criteria->add(CpajustePeer::REFERE, $this->refere);
		if ($this->isColumnModified(CpajustePeer::DESAJU)) $criteria->add(CpajustePeer::DESAJU, $this->desaju);
		if ($this->isColumnModified(CpajustePeer::DESANU)) $criteria->add(CpajustePeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpajustePeer::TOTAJU)) $criteria->add(CpajustePeer::TOTAJU, $this->totaju);
		if ($this->isColumnModified(CpajustePeer::STAAJU)) $criteria->add(CpajustePeer::STAAJU, $this->staaju);
		if ($this->isColumnModified(CpajustePeer::FECANU)) $criteria->add(CpajustePeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpajustePeer::NUMCOM)) $criteria->add(CpajustePeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CpajustePeer::CUOANU)) $criteria->add(CpajustePeer::CUOANU, $this->cuoanu);
		if ($this->isColumnModified(CpajustePeer::FECANUDES)) $criteria->add(CpajustePeer::FECANUDES, $this->fecanudes);
		if ($this->isColumnModified(CpajustePeer::FECANUHAS)) $criteria->add(CpajustePeer::FECANUHAS, $this->fecanuhas);
		if ($this->isColumnModified(CpajustePeer::ORDPAG)) $criteria->add(CpajustePeer::ORDPAG, $this->ordpag);
		if ($this->isColumnModified(CpajustePeer::FECENVCON)) $criteria->add(CpajustePeer::FECENVCON, $this->fecenvcon);
		if ($this->isColumnModified(CpajustePeer::FECENVFIN)) $criteria->add(CpajustePeer::FECENVFIN, $this->fecenvfin);
		if ($this->isColumnModified(CpajustePeer::ID)) $criteria->add(CpajustePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpajustePeer::DATABASE_NAME);

		$criteria->add(CpajustePeer::ID, $this->id);

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

		$copyObj->setTipaju($this->tipaju);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setAnoaju($this->anoaju);

		$copyObj->setRefere($this->refere);

		$copyObj->setDesaju($this->desaju);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setTotaju($this->totaju);

		$copyObj->setStaaju($this->staaju);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setCuoanu($this->cuoanu);

		$copyObj->setFecanudes($this->fecanudes);

		$copyObj->setFecanuhas($this->fecanuhas);

		$copyObj->setOrdpag($this->ordpag);

		$copyObj->setFecenvcon($this->fecenvcon);

		$copyObj->setFecenvfin($this->fecenvfin);


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
			self::$peer = new CpajustePeer();
		}
		return self::$peer;
	}

} 