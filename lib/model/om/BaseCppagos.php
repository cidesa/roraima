<?php


abstract class BaseCppagos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpag;


	
	protected $tippag;


	
	protected $fecpag;


	
	protected $anopag;


	
	protected $refcau;


	
	protected $tipcau;


	
	protected $despag;


	
	protected $desanu;


	
	protected $monpag;


	
	protected $salaju;


	
	protected $stapag;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefpag()
	{

		return $this->refpag;
	}

	
	public function getTippag()
	{

		return $this->tippag;
	}

	
	public function getFecpag($format = 'Y-m-d')
	{

		if ($this->fecpag === null || $this->fecpag === '') {
			return null;
		} elseif (!is_int($this->fecpag)) {
						$ts = strtotime($this->fecpag);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
			}
		} else {
			$ts = $this->fecpag;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAnopag()
	{

		return $this->anopag;
	}

	
	public function getRefcau()
	{

		return $this->refcau;
	}

	
	public function getTipcau()
	{

		return $this->tipcau;
	}

	
	public function getDespag()
	{

		return $this->despag;
	}

	
	public function getDesanu()
	{

		return $this->desanu;
	}

	
	public function getMonpag()
	{

		return $this->monpag;
	}

	
	public function getSalaju()
	{

		return $this->salaju;
	}

	
	public function getStapag()
	{

		return $this->stapag;
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

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefpag($v)
	{

		if ($this->refpag !== $v) {
			$this->refpag = $v;
			$this->modifiedColumns[] = CppagosPeer::REFPAG;
		}

	} 
	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = CppagosPeer::TIPPAG;
		}

	} 
	
	public function setFecpag($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpag !== $ts) {
			$this->fecpag = $ts;
			$this->modifiedColumns[] = CppagosPeer::FECPAG;
		}

	} 
	
	public function setAnopag($v)
	{

		if ($this->anopag !== $v) {
			$this->anopag = $v;
			$this->modifiedColumns[] = CppagosPeer::ANOPAG;
		}

	} 
	
	public function setRefcau($v)
	{

		if ($this->refcau !== $v) {
			$this->refcau = $v;
			$this->modifiedColumns[] = CppagosPeer::REFCAU;
		}

	} 
	
	public function setTipcau($v)
	{

		if ($this->tipcau !== $v) {
			$this->tipcau = $v;
			$this->modifiedColumns[] = CppagosPeer::TIPCAU;
		}

	} 
	
	public function setDespag($v)
	{

		if ($this->despag !== $v) {
			$this->despag = $v;
			$this->modifiedColumns[] = CppagosPeer::DESPAG;
		}

	} 
	
	public function setDesanu($v)
	{

		if ($this->desanu !== $v) {
			$this->desanu = $v;
			$this->modifiedColumns[] = CppagosPeer::DESANU;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = CppagosPeer::MONPAG;
		}

	} 
	
	public function setSalaju($v)
	{

		if ($this->salaju !== $v) {
			$this->salaju = $v;
			$this->modifiedColumns[] = CppagosPeer::SALAJU;
		}

	} 
	
	public function setStapag($v)
	{

		if ($this->stapag !== $v) {
			$this->stapag = $v;
			$this->modifiedColumns[] = CppagosPeer::STAPAG;
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
			$this->modifiedColumns[] = CppagosPeer::FECANU;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = CppagosPeer::CEDRIF;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CppagosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refpag = $rs->getString($startcol + 0);

			$this->tippag = $rs->getString($startcol + 1);

			$this->fecpag = $rs->getDate($startcol + 2, null);

			$this->anopag = $rs->getString($startcol + 3);

			$this->refcau = $rs->getString($startcol + 4);

			$this->tipcau = $rs->getString($startcol + 5);

			$this->despag = $rs->getString($startcol + 6);

			$this->desanu = $rs->getString($startcol + 7);

			$this->monpag = $rs->getFloat($startcol + 8);

			$this->salaju = $rs->getFloat($startcol + 9);

			$this->stapag = $rs->getString($startcol + 10);

			$this->fecanu = $rs->getDate($startcol + 11, null);

			$this->cedrif = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cppagos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CppagosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CppagosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CppagosPeer::DATABASE_NAME);
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
					$pk = CppagosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CppagosPeer::doUpdate($this, $con);
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


			if (($retval = CppagosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CppagosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpag();
				break;
			case 1:
				return $this->getTippag();
				break;
			case 2:
				return $this->getFecpag();
				break;
			case 3:
				return $this->getAnopag();
				break;
			case 4:
				return $this->getRefcau();
				break;
			case 5:
				return $this->getTipcau();
				break;
			case 6:
				return $this->getDespag();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getMonpag();
				break;
			case 9:
				return $this->getSalaju();
				break;
			case 10:
				return $this->getStapag();
				break;
			case 11:
				return $this->getFecanu();
				break;
			case 12:
				return $this->getCedrif();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CppagosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpag(),
			$keys[1] => $this->getTippag(),
			$keys[2] => $this->getFecpag(),
			$keys[3] => $this->getAnopag(),
			$keys[4] => $this->getRefcau(),
			$keys[5] => $this->getTipcau(),
			$keys[6] => $this->getDespag(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getMonpag(),
			$keys[9] => $this->getSalaju(),
			$keys[10] => $this->getStapag(),
			$keys[11] => $this->getFecanu(),
			$keys[12] => $this->getCedrif(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CppagosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpag($value);
				break;
			case 1:
				$this->setTippag($value);
				break;
			case 2:
				$this->setFecpag($value);
				break;
			case 3:
				$this->setAnopag($value);
				break;
			case 4:
				$this->setRefcau($value);
				break;
			case 5:
				$this->setTipcau($value);
				break;
			case 6:
				$this->setDespag($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setMonpag($value);
				break;
			case 9:
				$this->setSalaju($value);
				break;
			case 10:
				$this->setStapag($value);
				break;
			case 11:
				$this->setFecanu($value);
				break;
			case 12:
				$this->setCedrif($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CppagosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTippag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnopag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcau($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcau($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDespag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonpag($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalaju($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStapag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecanu($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCedrif($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CppagosPeer::DATABASE_NAME);

		if ($this->isColumnModified(CppagosPeer::REFPAG)) $criteria->add(CppagosPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(CppagosPeer::TIPPAG)) $criteria->add(CppagosPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(CppagosPeer::FECPAG)) $criteria->add(CppagosPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(CppagosPeer::ANOPAG)) $criteria->add(CppagosPeer::ANOPAG, $this->anopag);
		if ($this->isColumnModified(CppagosPeer::REFCAU)) $criteria->add(CppagosPeer::REFCAU, $this->refcau);
		if ($this->isColumnModified(CppagosPeer::TIPCAU)) $criteria->add(CppagosPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(CppagosPeer::DESPAG)) $criteria->add(CppagosPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(CppagosPeer::DESANU)) $criteria->add(CppagosPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CppagosPeer::MONPAG)) $criteria->add(CppagosPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CppagosPeer::SALAJU)) $criteria->add(CppagosPeer::SALAJU, $this->salaju);
		if ($this->isColumnModified(CppagosPeer::STAPAG)) $criteria->add(CppagosPeer::STAPAG, $this->stapag);
		if ($this->isColumnModified(CppagosPeer::FECANU)) $criteria->add(CppagosPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CppagosPeer::CEDRIF)) $criteria->add(CppagosPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CppagosPeer::ID)) $criteria->add(CppagosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CppagosPeer::DATABASE_NAME);

		$criteria->add(CppagosPeer::ID, $this->id);

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

		$copyObj->setRefpag($this->refpag);

		$copyObj->setTippag($this->tippag);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setAnopag($this->anopag);

		$copyObj->setRefcau($this->refcau);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setDespag($this->despag);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStapag($this->stapag);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);


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
			self::$peer = new CppagosPeer();
		}
		return self::$peer;
	}

} 