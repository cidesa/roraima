<?php


abstract class BaseBnsegmue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $nrosegmue;


	
	protected $fecsegmue;


	
	protected $nomsegmue;


	
	protected $cobsegmue;


	
	protected $monsegmue;


	
	protected $fecsegven;


	
	protected $prosegmue;


	
	protected $obssegmue;


	
	protected $stasegmue;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodact()
	{

		return $this->codact;
	}

	
	public function getCodmue()
	{

		return $this->codmue;
	}

	
	public function getNrosegmue()
	{

		return $this->nrosegmue;
	}

	
	public function getFecsegmue($format = 'Y-m-d')
	{

		if ($this->fecsegmue === null || $this->fecsegmue === '') {
			return null;
		} elseif (!is_int($this->fecsegmue)) {
						$ts = strtotime($this->fecsegmue);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsegmue] as date/time value: " . var_export($this->fecsegmue, true));
			}
		} else {
			$ts = $this->fecsegmue;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNomsegmue()
	{

		return $this->nomsegmue;
	}

	
	public function getCobsegmue()
	{

		return $this->cobsegmue;
	}

	
	public function getMonsegmue()
	{

		return $this->monsegmue;
	}

	
	public function getFecsegven($format = 'Y-m-d')
	{

		if ($this->fecsegven === null || $this->fecsegven === '') {
			return null;
		} elseif (!is_int($this->fecsegven)) {
						$ts = strtotime($this->fecsegven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsegven] as date/time value: " . var_export($this->fecsegven, true));
			}
		} else {
			$ts = $this->fecsegven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getProsegmue()
	{

		return $this->prosegmue;
	}

	
	public function getObssegmue()
	{

		return $this->obssegmue;
	}

	
	public function getStasegmue()
	{

		return $this->stasegmue;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BnsegmuePeer::CODACT;
		}

	} 
	
	public function setCodmue($v)
	{

		if ($this->codmue !== $v) {
			$this->codmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::CODMUE;
		}

	} 
	
	public function setNrosegmue($v)
	{

		if ($this->nrosegmue !== $v) {
			$this->nrosegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::NROSEGMUE;
		}

	} 
	
	public function setFecsegmue($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsegmue] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsegmue !== $ts) {
			$this->fecsegmue = $ts;
			$this->modifiedColumns[] = BnsegmuePeer::FECSEGMUE;
		}

	} 
	
	public function setNomsegmue($v)
	{

		if ($this->nomsegmue !== $v) {
			$this->nomsegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::NOMSEGMUE;
		}

	} 
	
	public function setCobsegmue($v)
	{

		if ($this->cobsegmue !== $v) {
			$this->cobsegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::COBSEGMUE;
		}

	} 
	
	public function setMonsegmue($v)
	{

		if ($this->monsegmue !== $v) {
			$this->monsegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::MONSEGMUE;
		}

	} 
	
	public function setFecsegven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsegven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsegven !== $ts) {
			$this->fecsegven = $ts;
			$this->modifiedColumns[] = BnsegmuePeer::FECSEGVEN;
		}

	} 
	
	public function setProsegmue($v)
	{

		if ($this->prosegmue !== $v) {
			$this->prosegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::PROSEGMUE;
		}

	} 
	
	public function setObssegmue($v)
	{

		if ($this->obssegmue !== $v) {
			$this->obssegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::OBSSEGMUE;
		}

	} 
	
	public function setStasegmue($v)
	{

		if ($this->stasegmue !== $v) {
			$this->stasegmue = $v;
			$this->modifiedColumns[] = BnsegmuePeer::STASEGMUE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BnsegmuePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->codmue = $rs->getString($startcol + 1);

			$this->nrosegmue = $rs->getString($startcol + 2);

			$this->fecsegmue = $rs->getDate($startcol + 3, null);

			$this->nomsegmue = $rs->getString($startcol + 4);

			$this->cobsegmue = $rs->getString($startcol + 5);

			$this->monsegmue = $rs->getFloat($startcol + 6);

			$this->fecsegven = $rs->getDate($startcol + 7, null);

			$this->prosegmue = $rs->getString($startcol + 8);

			$this->obssegmue = $rs->getString($startcol + 9);

			$this->stasegmue = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bnsegmue object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BnsegmuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnsegmuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnsegmuePeer::DATABASE_NAME);
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
					$pk = BnsegmuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BnsegmuePeer::doUpdate($this, $con);
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


			if (($retval = BnsegmuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnsegmuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodmue();
				break;
			case 2:
				return $this->getNrosegmue();
				break;
			case 3:
				return $this->getFecsegmue();
				break;
			case 4:
				return $this->getNomsegmue();
				break;
			case 5:
				return $this->getCobsegmue();
				break;
			case 6:
				return $this->getMonsegmue();
				break;
			case 7:
				return $this->getFecsegven();
				break;
			case 8:
				return $this->getProsegmue();
				break;
			case 9:
				return $this->getObssegmue();
				break;
			case 10:
				return $this->getStasegmue();
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
		$keys = BnsegmuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getNrosegmue(),
			$keys[3] => $this->getFecsegmue(),
			$keys[4] => $this->getNomsegmue(),
			$keys[5] => $this->getCobsegmue(),
			$keys[6] => $this->getMonsegmue(),
			$keys[7] => $this->getFecsegven(),
			$keys[8] => $this->getProsegmue(),
			$keys[9] => $this->getObssegmue(),
			$keys[10] => $this->getStasegmue(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnsegmuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodmue($value);
				break;
			case 2:
				$this->setNrosegmue($value);
				break;
			case 3:
				$this->setFecsegmue($value);
				break;
			case 4:
				$this->setNomsegmue($value);
				break;
			case 5:
				$this->setCobsegmue($value);
				break;
			case 6:
				$this->setMonsegmue($value);
				break;
			case 7:
				$this->setFecsegven($value);
				break;
			case 8:
				$this->setProsegmue($value);
				break;
			case 9:
				$this->setObssegmue($value);
				break;
			case 10:
				$this->setStasegmue($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnsegmuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrosegmue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecsegmue($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomsegmue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCobsegmue($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonsegmue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecsegven($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProsegmue($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObssegmue($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStasegmue($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnsegmuePeer::DATABASE_NAME);

		if ($this->isColumnModified(BnsegmuePeer::CODACT)) $criteria->add(BnsegmuePeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnsegmuePeer::CODMUE)) $criteria->add(BnsegmuePeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BnsegmuePeer::NROSEGMUE)) $criteria->add(BnsegmuePeer::NROSEGMUE, $this->nrosegmue);
		if ($this->isColumnModified(BnsegmuePeer::FECSEGMUE)) $criteria->add(BnsegmuePeer::FECSEGMUE, $this->fecsegmue);
		if ($this->isColumnModified(BnsegmuePeer::NOMSEGMUE)) $criteria->add(BnsegmuePeer::NOMSEGMUE, $this->nomsegmue);
		if ($this->isColumnModified(BnsegmuePeer::COBSEGMUE)) $criteria->add(BnsegmuePeer::COBSEGMUE, $this->cobsegmue);
		if ($this->isColumnModified(BnsegmuePeer::MONSEGMUE)) $criteria->add(BnsegmuePeer::MONSEGMUE, $this->monsegmue);
		if ($this->isColumnModified(BnsegmuePeer::FECSEGVEN)) $criteria->add(BnsegmuePeer::FECSEGVEN, $this->fecsegven);
		if ($this->isColumnModified(BnsegmuePeer::PROSEGMUE)) $criteria->add(BnsegmuePeer::PROSEGMUE, $this->prosegmue);
		if ($this->isColumnModified(BnsegmuePeer::OBSSEGMUE)) $criteria->add(BnsegmuePeer::OBSSEGMUE, $this->obssegmue);
		if ($this->isColumnModified(BnsegmuePeer::STASEGMUE)) $criteria->add(BnsegmuePeer::STASEGMUE, $this->stasegmue);
		if ($this->isColumnModified(BnsegmuePeer::ID)) $criteria->add(BnsegmuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnsegmuePeer::DATABASE_NAME);

		$criteria->add(BnsegmuePeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodmue($this->codmue);

		$copyObj->setNrosegmue($this->nrosegmue);

		$copyObj->setFecsegmue($this->fecsegmue);

		$copyObj->setNomsegmue($this->nomsegmue);

		$copyObj->setCobsegmue($this->cobsegmue);

		$copyObj->setMonsegmue($this->monsegmue);

		$copyObj->setFecsegven($this->fecsegven);

		$copyObj->setProsegmue($this->prosegmue);

		$copyObj->setObssegmue($this->obssegmue);

		$copyObj->setStasegmue($this->stasegmue);


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
			self::$peer = new BnsegmuePeer();
		}
		return self::$peer;
	}

} 