<?php


abstract class BaseFcabonos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpag;


	
	protected $fecpag;


	
	protected $rifcon;


	
	protected $fueing;


	
	protected $despag;


	
	protected $monpag;


	
	protected $monefe;


	
	protected $funpag;


	
	protected $codrec;


	
	protected $salpag;


	
	protected $stapag;


	
	protected $fecrec;


	
	protected $numpag2;


	
	protected $numref;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumpag()
	{

		return $this->numpag;
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

	
	public function getRifcon()
	{

		return $this->rifcon;
	}

	
	public function getFueing()
	{

		return $this->fueing;
	}

	
	public function getDespag()
	{

		return $this->despag;
	}

	
	public function getMonpag()
	{

		return $this->monpag;
	}

	
	public function getMonefe()
	{

		return $this->monefe;
	}

	
	public function getFunpag()
	{

		return $this->funpag;
	}

	
	public function getCodrec()
	{

		return $this->codrec;
	}

	
	public function getSalpag()
	{

		return $this->salpag;
	}

	
	public function getStapag()
	{

		return $this->stapag;
	}

	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNumpag2()
	{

		return $this->numpag2;
	}

	
	public function getNumref()
	{

		return $this->numref;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumpag($v)
	{

		if ($this->numpag !== $v) {
			$this->numpag = $v;
			$this->modifiedColumns[] = FcabonosPeer::NUMPAG;
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
			$this->modifiedColumns[] = FcabonosPeer::FECPAG;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcabonosPeer::RIFCON;
		}

	} 
	
	public function setFueing($v)
	{

		if ($this->fueing !== $v) {
			$this->fueing = $v;
			$this->modifiedColumns[] = FcabonosPeer::FUEING;
		}

	} 
	
	public function setDespag($v)
	{

		if ($this->despag !== $v) {
			$this->despag = $v;
			$this->modifiedColumns[] = FcabonosPeer::DESPAG;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = FcabonosPeer::MONPAG;
		}

	} 
	
	public function setMonefe($v)
	{

		if ($this->monefe !== $v) {
			$this->monefe = $v;
			$this->modifiedColumns[] = FcabonosPeer::MONEFE;
		}

	} 
	
	public function setFunpag($v)
	{

		if ($this->funpag !== $v) {
			$this->funpag = $v;
			$this->modifiedColumns[] = FcabonosPeer::FUNPAG;
		}

	} 
	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = FcabonosPeer::CODREC;
		}

	} 
	
	public function setSalpag($v)
	{

		if ($this->salpag !== $v) {
			$this->salpag = $v;
			$this->modifiedColumns[] = FcabonosPeer::SALPAG;
		}

	} 
	
	public function setStapag($v)
	{

		if ($this->stapag !== $v) {
			$this->stapag = $v;
			$this->modifiedColumns[] = FcabonosPeer::STAPAG;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = FcabonosPeer::FECREC;
		}

	} 
	
	public function setNumpag2($v)
	{

		if ($this->numpag2 !== $v) {
			$this->numpag2 = $v;
			$this->modifiedColumns[] = FcabonosPeer::NUMPAG2;
		}

	} 
	
	public function setNumref($v)
	{

		if ($this->numref !== $v) {
			$this->numref = $v;
			$this->modifiedColumns[] = FcabonosPeer::NUMREF;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcabonosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numpag = $rs->getString($startcol + 0);

			$this->fecpag = $rs->getDate($startcol + 1, null);

			$this->rifcon = $rs->getString($startcol + 2);

			$this->fueing = $rs->getString($startcol + 3);

			$this->despag = $rs->getString($startcol + 4);

			$this->monpag = $rs->getFloat($startcol + 5);

			$this->monefe = $rs->getFloat($startcol + 6);

			$this->funpag = $rs->getString($startcol + 7);

			$this->codrec = $rs->getString($startcol + 8);

			$this->salpag = $rs->getFloat($startcol + 9);

			$this->stapag = $rs->getString($startcol + 10);

			$this->fecrec = $rs->getDate($startcol + 11, null);

			$this->numpag2 = $rs->getString($startcol + 12);

			$this->numref = $rs->getString($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcabonos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcabonosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcabonosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcabonosPeer::DATABASE_NAME);
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
					$pk = FcabonosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcabonosPeer::doUpdate($this, $con);
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


			if (($retval = FcabonosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcabonosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpag();
				break;
			case 1:
				return $this->getFecpag();
				break;
			case 2:
				return $this->getRifcon();
				break;
			case 3:
				return $this->getFueing();
				break;
			case 4:
				return $this->getDespag();
				break;
			case 5:
				return $this->getMonpag();
				break;
			case 6:
				return $this->getMonefe();
				break;
			case 7:
				return $this->getFunpag();
				break;
			case 8:
				return $this->getCodrec();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getStapag();
				break;
			case 11:
				return $this->getFecrec();
				break;
			case 12:
				return $this->getNumpag2();
				break;
			case 13:
				return $this->getNumref();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcabonosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpag(),
			$keys[1] => $this->getFecpag(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getFueing(),
			$keys[4] => $this->getDespag(),
			$keys[5] => $this->getMonpag(),
			$keys[6] => $this->getMonefe(),
			$keys[7] => $this->getFunpag(),
			$keys[8] => $this->getCodrec(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getStapag(),
			$keys[11] => $this->getFecrec(),
			$keys[12] => $this->getNumpag2(),
			$keys[13] => $this->getNumref(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcabonosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpag($value);
				break;
			case 1:
				$this->setFecpag($value);
				break;
			case 2:
				$this->setRifcon($value);
				break;
			case 3:
				$this->setFueing($value);
				break;
			case 4:
				$this->setDespag($value);
				break;
			case 5:
				$this->setMonpag($value);
				break;
			case 6:
				$this->setMonefe($value);
				break;
			case 7:
				$this->setFunpag($value);
				break;
			case 8:
				$this->setCodrec($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setStapag($value);
				break;
			case 11:
				$this->setFecrec($value);
				break;
			case 12:
				$this->setNumpag2($value);
				break;
			case 13:
				$this->setNumref($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcabonosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFueing($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDespag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonefe($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFunpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStapag($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecrec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumpag2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNumref($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcabonosPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcabonosPeer::NUMPAG)) $criteria->add(FcabonosPeer::NUMPAG, $this->numpag);
		if ($this->isColumnModified(FcabonosPeer::FECPAG)) $criteria->add(FcabonosPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(FcabonosPeer::RIFCON)) $criteria->add(FcabonosPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcabonosPeer::FUEING)) $criteria->add(FcabonosPeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcabonosPeer::DESPAG)) $criteria->add(FcabonosPeer::DESPAG, $this->despag);
		if ($this->isColumnModified(FcabonosPeer::MONPAG)) $criteria->add(FcabonosPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcabonosPeer::MONEFE)) $criteria->add(FcabonosPeer::MONEFE, $this->monefe);
		if ($this->isColumnModified(FcabonosPeer::FUNPAG)) $criteria->add(FcabonosPeer::FUNPAG, $this->funpag);
		if ($this->isColumnModified(FcabonosPeer::CODREC)) $criteria->add(FcabonosPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcabonosPeer::SALPAG)) $criteria->add(FcabonosPeer::SALPAG, $this->salpag);
		if ($this->isColumnModified(FcabonosPeer::STAPAG)) $criteria->add(FcabonosPeer::STAPAG, $this->stapag);
		if ($this->isColumnModified(FcabonosPeer::FECREC)) $criteria->add(FcabonosPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcabonosPeer::NUMPAG2)) $criteria->add(FcabonosPeer::NUMPAG2, $this->numpag2);
		if ($this->isColumnModified(FcabonosPeer::NUMREF)) $criteria->add(FcabonosPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(FcabonosPeer::ID)) $criteria->add(FcabonosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcabonosPeer::DATABASE_NAME);

		$criteria->add(FcabonosPeer::ID, $this->id);

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

		$copyObj->setNumpag($this->numpag);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setFueing($this->fueing);

		$copyObj->setDespag($this->despag);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setMonefe($this->monefe);

		$copyObj->setFunpag($this->funpag);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setStapag($this->stapag);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setNumpag2($this->numpag2);

		$copyObj->setNumref($this->numref);


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
			self::$peer = new FcabonosPeer();
		}
		return self::$peer;
	}

} 