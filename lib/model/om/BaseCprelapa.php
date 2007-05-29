<?php


abstract class BaseCprelapa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refrel;


	
	protected $tiprel;


	
	protected $fecrel;


	
	protected $refapa;


	
	protected $desrel;


	
	protected $desanu;


	
	protected $monrel;


	
	protected $salaju;


	
	protected $starel;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $numcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefrel()
	{

		return $this->refrel; 		
	}
	
	public function getTiprel()
	{

		return $this->tiprel; 		
	}
	
	public function getFecrel($format = 'Y-m-d')
	{

		if ($this->fecrel === null || $this->fecrel === '') {
			return null;
		} elseif (!is_int($this->fecrel)) {
						$ts = strtotime($this->fecrel);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrel] as date/time value: " . var_export($this->fecrel, true));
			}
		} else {
			$ts = $this->fecrel;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRefapa()
	{

		return $this->refapa; 		
	}
	
	public function getDesrel()
	{

		return $this->desrel; 		
	}
	
	public function getDesanu()
	{

		return $this->desanu; 		
	}
	
	public function getMonrel()
	{

		return number_format($this->monrel,2,',','.');
		
	}
	
	public function getSalaju()
	{

		return number_format($this->salaju,2,',','.');
		
	}
	
	public function getStarel()
	{

		return $this->starel; 		
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

	
	public function getCedrif()
	{

		return $this->cedrif; 		
	}
	
	public function getNumcom()
	{

		return $this->numcom; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setRefrel($v)
	{

		if ($this->refrel !== $v) {
			$this->refrel = $v;
			$this->modifiedColumns[] = CprelapaPeer::REFREL;
		}

	} 
	
	public function setTiprel($v)
	{

		if ($this->tiprel !== $v) {
			$this->tiprel = $v;
			$this->modifiedColumns[] = CprelapaPeer::TIPREL;
		}

	} 
	
	public function setFecrel($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrel] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrel !== $ts) {
			$this->fecrel = $ts;
			$this->modifiedColumns[] = CprelapaPeer::FECREL;
		}

	} 
	
	public function setRefapa($v)
	{

		if ($this->refapa !== $v) {
			$this->refapa = $v;
			$this->modifiedColumns[] = CprelapaPeer::REFAPA;
		}

	} 
	
	public function setDesrel($v)
	{

		if ($this->desrel !== $v) {
			$this->desrel = $v;
			$this->modifiedColumns[] = CprelapaPeer::DESREL;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CprelapaPeer::DESANU;
		}

	} 
	
	public function setMonrel($v)
	{

		if ($this->monrel !== $v) {
			$this->monrel = $v;
			$this->modifiedColumns[] = CprelapaPeer::MONREL;
		}

	} 
	
	public function setSalaju($v)
	{

		if ($this->salaju !== $v) {
			$this->salaju = $v;
			$this->modifiedColumns[] = CprelapaPeer::SALAJU;
		}

	} 
	
	public function setStarel($v)
	{

		if ($this->starel !== $v) {
			$this->starel = $v;
			$this->modifiedColumns[] = CprelapaPeer::STAREL;
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
			$this->modifiedColumns[] = CprelapaPeer::FECANU;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = CprelapaPeer::CEDRIF;
		}

	} 
	
	public function setNumcom($v)
	{

		if ($this->numcom !== $v) {
			$this->numcom = $v;
			$this->modifiedColumns[] = CprelapaPeer::NUMCOM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CprelapaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refrel = $rs->getString($startcol + 0);

			$this->tiprel = $rs->getString($startcol + 1);

			$this->fecrel = $rs->getDate($startcol + 2, null);

			$this->refapa = $rs->getString($startcol + 3);

			$this->desrel = $rs->getString($startcol + 4);

			$this->desanu = $rs->getString($startcol + 5);

			$this->monrel = $rs->getFloat($startcol + 6);

			$this->salaju = $rs->getFloat($startcol + 7);

			$this->starel = $rs->getString($startcol + 8);

			$this->fecanu = $rs->getDate($startcol + 9, null);

			$this->cedrif = $rs->getString($startcol + 10);

			$this->numcom = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cprelapa object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CprelapaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CprelapaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CprelapaPeer::DATABASE_NAME);
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
					$pk = CprelapaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CprelapaPeer::doUpdate($this, $con);
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


			if (($retval = CprelapaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CprelapaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefrel();
				break;
			case 1:
				return $this->getTiprel();
				break;
			case 2:
				return $this->getFecrel();
				break;
			case 3:
				return $this->getRefapa();
				break;
			case 4:
				return $this->getDesrel();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getMonrel();
				break;
			case 7:
				return $this->getSalaju();
				break;
			case 8:
				return $this->getStarel();
				break;
			case 9:
				return $this->getFecanu();
				break;
			case 10:
				return $this->getCedrif();
				break;
			case 11:
				return $this->getNumcom();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CprelapaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefrel(),
			$keys[1] => $this->getTiprel(),
			$keys[2] => $this->getFecrel(),
			$keys[3] => $this->getRefapa(),
			$keys[4] => $this->getDesrel(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getMonrel(),
			$keys[7] => $this->getSalaju(),
			$keys[8] => $this->getStarel(),
			$keys[9] => $this->getFecanu(),
			$keys[10] => $this->getCedrif(),
			$keys[11] => $this->getNumcom(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CprelapaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefrel($value);
				break;
			case 1:
				$this->setTiprel($value);
				break;
			case 2:
				$this->setFecrel($value);
				break;
			case 3:
				$this->setRefapa($value);
				break;
			case 4:
				$this->setDesrel($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setMonrel($value);
				break;
			case 7:
				$this->setSalaju($value);
				break;
			case 8:
				$this->setStarel($value);
				break;
			case 9:
				$this->setFecanu($value);
				break;
			case 10:
				$this->setCedrif($value);
				break;
			case 11:
				$this->setNumcom($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CprelapaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefrel($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTiprel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecrel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefapa($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesrel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalaju($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStarel($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecanu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCedrif($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNumcom($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CprelapaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CprelapaPeer::REFREL)) $criteria->add(CprelapaPeer::REFREL, $this->refrel);
		if ($this->isColumnModified(CprelapaPeer::TIPREL)) $criteria->add(CprelapaPeer::TIPREL, $this->tiprel);
		if ($this->isColumnModified(CprelapaPeer::FECREL)) $criteria->add(CprelapaPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(CprelapaPeer::REFAPA)) $criteria->add(CprelapaPeer::REFAPA, $this->refapa);
		if ($this->isColumnModified(CprelapaPeer::DESREL)) $criteria->add(CprelapaPeer::DESREL, $this->desrel);
		if ($this->isColumnModified(CprelapaPeer::DESANU)) $criteria->add(CprelapaPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CprelapaPeer::MONREL)) $criteria->add(CprelapaPeer::MONREL, $this->monrel);
		if ($this->isColumnModified(CprelapaPeer::SALAJU)) $criteria->add(CprelapaPeer::SALAJU, $this->salaju);
		if ($this->isColumnModified(CprelapaPeer::STAREL)) $criteria->add(CprelapaPeer::STAREL, $this->starel);
		if ($this->isColumnModified(CprelapaPeer::FECANU)) $criteria->add(CprelapaPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CprelapaPeer::CEDRIF)) $criteria->add(CprelapaPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CprelapaPeer::NUMCOM)) $criteria->add(CprelapaPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(CprelapaPeer::ID)) $criteria->add(CprelapaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CprelapaPeer::DATABASE_NAME);

		$criteria->add(CprelapaPeer::ID, $this->id);

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

		$copyObj->setRefrel($this->refrel);

		$copyObj->setTiprel($this->tiprel);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setRefapa($this->refapa);

		$copyObj->setDesrel($this->desrel);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonrel($this->monrel);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStarel($this->starel);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

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
			self::$peer = new CprelapaPeer();
		}
		return self::$peer;
	}

} 