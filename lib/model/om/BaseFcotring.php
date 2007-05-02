<?php


abstract class BaseFcotring extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $codfue;


	
	protected $fecreg;


	
	protected $rifcon;


	
	protected $desing;


	
	protected $monimp;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $rifrep;


	
	protected $staapu;


	
	protected $stadec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $monsal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNrocon()
	{

		return $this->nrocon;
	}

	
	public function getCodfue()
	{

		return $this->codfue;
	}

	
	public function getFecreg($format = 'Y-m-d')
	{

		if ($this->fecreg === null || $this->fecreg === '') {
			return null;
		} elseif (!is_int($this->fecreg)) {
						$ts = strtotime($this->fecreg);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
			}
		} else {
			$ts = $this->fecreg;
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

	
	public function getDesing()
	{

		return $this->desing;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getFunrec()
	{

		return $this->funrec;
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

	
	public function getRifrep()
	{

		return $this->rifrep;
	}

	
	public function getStaapu()
	{

		return $this->staapu;
	}

	
	public function getStadec()
	{

		return $this->stadec;
	}

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getDircon()
	{

		return $this->dircon;
	}

	
	public function getMonsal()
	{

		return $this->monsal;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = FcotringPeer::NROCON;
		}

	} 
	
	public function setCodfue($v)
	{

		if ($this->codfue !== $v) {
			$this->codfue = $v;
			$this->modifiedColumns[] = FcotringPeer::CODFUE;
		}

	} 
	
	public function setFecreg($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecreg !== $ts) {
			$this->fecreg = $ts;
			$this->modifiedColumns[] = FcotringPeer::FECREG;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcotringPeer::RIFCON;
		}

	} 
	
	public function setDesing($v)
	{

		if ($this->desing !== $v) {
			$this->desing = $v;
			$this->modifiedColumns[] = FcotringPeer::DESING;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcotringPeer::MONIMP;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcotringPeer::FUNREC;
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
			$this->modifiedColumns[] = FcotringPeer::FECREC;
		}

	} 
	
	public function setRifrep($v)
	{

		if ($this->rifrep !== $v) {
			$this->rifrep = $v;
			$this->modifiedColumns[] = FcotringPeer::RIFREP;
		}

	} 
	
	public function setStaapu($v)
	{

		if ($this->staapu !== $v) {
			$this->staapu = $v;
			$this->modifiedColumns[] = FcotringPeer::STAAPU;
		}

	} 
	
	public function setStadec($v)
	{

		if ($this->stadec !== $v) {
			$this->stadec = $v;
			$this->modifiedColumns[] = FcotringPeer::STADEC;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcotringPeer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcotringPeer::DIRCON;
		}

	} 
	
	public function setMonsal($v)
	{

		if ($this->monsal !== $v) {
			$this->monsal = $v;
			$this->modifiedColumns[] = FcotringPeer::MONSAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcotringPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nrocon = $rs->getString($startcol + 0);

			$this->codfue = $rs->getString($startcol + 1);

			$this->fecreg = $rs->getDate($startcol + 2, null);

			$this->rifcon = $rs->getString($startcol + 3);

			$this->desing = $rs->getString($startcol + 4);

			$this->monimp = $rs->getFloat($startcol + 5);

			$this->funrec = $rs->getString($startcol + 6);

			$this->fecrec = $rs->getDate($startcol + 7, null);

			$this->rifrep = $rs->getString($startcol + 8);

			$this->staapu = $rs->getString($startcol + 9);

			$this->stadec = $rs->getString($startcol + 10);

			$this->nomcon = $rs->getString($startcol + 11);

			$this->dircon = $rs->getString($startcol + 12);

			$this->monsal = $rs->getFloat($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcotring object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcotringPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcotringPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcotringPeer::DATABASE_NAME);
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
					$pk = FcotringPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcotringPeer::doUpdate($this, $con);
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


			if (($retval = FcotringPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcotringPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrocon();
				break;
			case 1:
				return $this->getCodfue();
				break;
			case 2:
				return $this->getFecreg();
				break;
			case 3:
				return $this->getRifcon();
				break;
			case 4:
				return $this->getDesing();
				break;
			case 5:
				return $this->getMonimp();
				break;
			case 6:
				return $this->getFunrec();
				break;
			case 7:
				return $this->getFecrec();
				break;
			case 8:
				return $this->getRifrep();
				break;
			case 9:
				return $this->getStaapu();
				break;
			case 10:
				return $this->getStadec();
				break;
			case 11:
				return $this->getNomcon();
				break;
			case 12:
				return $this->getDircon();
				break;
			case 13:
				return $this->getMonsal();
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
		$keys = FcotringPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getCodfue(),
			$keys[2] => $this->getFecreg(),
			$keys[3] => $this->getRifcon(),
			$keys[4] => $this->getDesing(),
			$keys[5] => $this->getMonimp(),
			$keys[6] => $this->getFunrec(),
			$keys[7] => $this->getFecrec(),
			$keys[8] => $this->getRifrep(),
			$keys[9] => $this->getStaapu(),
			$keys[10] => $this->getStadec(),
			$keys[11] => $this->getNomcon(),
			$keys[12] => $this->getDircon(),
			$keys[13] => $this->getMonsal(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcotringPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrocon($value);
				break;
			case 1:
				$this->setCodfue($value);
				break;
			case 2:
				$this->setFecreg($value);
				break;
			case 3:
				$this->setRifcon($value);
				break;
			case 4:
				$this->setDesing($value);
				break;
			case 5:
				$this->setMonimp($value);
				break;
			case 6:
				$this->setFunrec($value);
				break;
			case 7:
				$this->setFecrec($value);
				break;
			case 8:
				$this->setRifrep($value);
				break;
			case 9:
				$this->setStaapu($value);
				break;
			case 10:
				$this->setStadec($value);
				break;
			case 11:
				$this->setNomcon($value);
				break;
			case 12:
				$this->setDircon($value);
				break;
			case 13:
				$this->setMonsal($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcotringPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecreg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesing($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonimp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFunrec($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRifrep($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStaapu($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStadec($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomcon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDircon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonsal($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcotringPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcotringPeer::NROCON)) $criteria->add(FcotringPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcotringPeer::CODFUE)) $criteria->add(FcotringPeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcotringPeer::FECREG)) $criteria->add(FcotringPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcotringPeer::RIFCON)) $criteria->add(FcotringPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcotringPeer::DESING)) $criteria->add(FcotringPeer::DESING, $this->desing);
		if ($this->isColumnModified(FcotringPeer::MONIMP)) $criteria->add(FcotringPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcotringPeer::FUNREC)) $criteria->add(FcotringPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcotringPeer::FECREC)) $criteria->add(FcotringPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcotringPeer::RIFREP)) $criteria->add(FcotringPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcotringPeer::STAAPU)) $criteria->add(FcotringPeer::STAAPU, $this->staapu);
		if ($this->isColumnModified(FcotringPeer::STADEC)) $criteria->add(FcotringPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcotringPeer::NOMCON)) $criteria->add(FcotringPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcotringPeer::DIRCON)) $criteria->add(FcotringPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcotringPeer::MONSAL)) $criteria->add(FcotringPeer::MONSAL, $this->monsal);
		if ($this->isColumnModified(FcotringPeer::ID)) $criteria->add(FcotringPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcotringPeer::DATABASE_NAME);

		$criteria->add(FcotringPeer::NROCON, $this->nrocon);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getNrocon();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setNrocon($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodfue($this->codfue);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setDesing($this->desing);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setStaapu($this->staapu);

		$copyObj->setStadec($this->stadec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setMonsal($this->monsal);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setNrocon(NULL); 
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
			self::$peer = new FcotringPeer();
		}
		return self::$peer;
	}

} 