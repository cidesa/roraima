<?php


abstract class BaseFcmodapu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmod;


	
	protected $nrocon;


	
	protected $fecmod;


	
	protected $tipapu;


	
	protected $desapu;


	
	protected $monapu;


	
	protected $monimp;


	
	protected $tipapuant;


	
	protected $desapuant;


	
	protected $monapuant;


	
	protected $monimpant;


	
	protected $funrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefmod()
	{

		return $this->refmod;
	}

	
	public function getNrocon()
	{

		return $this->nrocon;
	}

	
	public function getFecmod($format = 'Y-m-d')
	{

		if ($this->fecmod === null || $this->fecmod === '') {
			return null;
		} elseif (!is_int($this->fecmod)) {
						$ts = strtotime($this->fecmod);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecmod] as date/time value: " . var_export($this->fecmod, true));
			}
		} else {
			$ts = $this->fecmod;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTipapu()
	{

		return $this->tipapu;
	}

	
	public function getDesapu()
	{

		return $this->desapu;
	}

	
	public function getMonapu()
	{

		return $this->monapu;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getTipapuant()
	{

		return $this->tipapuant;
	}

	
	public function getDesapuant()
	{

		return $this->desapuant;
	}

	
	public function getMonapuant()
	{

		return $this->monapuant;
	}

	
	public function getMonimpant()
	{

		return $this->monimpant;
	}

	
	public function getFunrec()
	{

		return $this->funrec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefmod($v)
	{

		if ($this->refmod !== $v) {
			$this->refmod = $v;
			$this->modifiedColumns[] = FcmodapuPeer::REFMOD;
		}

	} 
	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = FcmodapuPeer::NROCON;
		}

	} 
	
	public function setFecmod($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecmod] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecmod !== $ts) {
			$this->fecmod = $ts;
			$this->modifiedColumns[] = FcmodapuPeer::FECMOD;
		}

	} 
	
	public function setTipapu($v)
	{

		if ($this->tipapu !== $v) {
			$this->tipapu = $v;
			$this->modifiedColumns[] = FcmodapuPeer::TIPAPU;
		}

	} 
	
	public function setDesapu($v)
	{

		if ($this->desapu !== $v) {
			$this->desapu = $v;
			$this->modifiedColumns[] = FcmodapuPeer::DESAPU;
		}

	} 
	
	public function setMonapu($v)
	{

		if ($this->monapu !== $v) {
			$this->monapu = $v;
			$this->modifiedColumns[] = FcmodapuPeer::MONAPU;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcmodapuPeer::MONIMP;
		}

	} 
	
	public function setTipapuant($v)
	{

		if ($this->tipapuant !== $v) {
			$this->tipapuant = $v;
			$this->modifiedColumns[] = FcmodapuPeer::TIPAPUANT;
		}

	} 
	
	public function setDesapuant($v)
	{

		if ($this->desapuant !== $v) {
			$this->desapuant = $v;
			$this->modifiedColumns[] = FcmodapuPeer::DESAPUANT;
		}

	} 
	
	public function setMonapuant($v)
	{

		if ($this->monapuant !== $v) {
			$this->monapuant = $v;
			$this->modifiedColumns[] = FcmodapuPeer::MONAPUANT;
		}

	} 
	
	public function setMonimpant($v)
	{

		if ($this->monimpant !== $v) {
			$this->monimpant = $v;
			$this->modifiedColumns[] = FcmodapuPeer::MONIMPANT;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcmodapuPeer::FUNREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcmodapuPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refmod = $rs->getString($startcol + 0);

			$this->nrocon = $rs->getString($startcol + 1);

			$this->fecmod = $rs->getDate($startcol + 2, null);

			$this->tipapu = $rs->getString($startcol + 3);

			$this->desapu = $rs->getString($startcol + 4);

			$this->monapu = $rs->getFloat($startcol + 5);

			$this->monimp = $rs->getFloat($startcol + 6);

			$this->tipapuant = $rs->getString($startcol + 7);

			$this->desapuant = $rs->getString($startcol + 8);

			$this->monapuant = $rs->getFloat($startcol + 9);

			$this->monimpant = $rs->getFloat($startcol + 10);

			$this->funrec = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcmodapu object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcmodapuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmodapuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmodapuPeer::DATABASE_NAME);
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
					$pk = FcmodapuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcmodapuPeer::doUpdate($this, $con);
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


			if (($retval = FcmodapuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodapuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefmod();
				break;
			case 1:
				return $this->getNrocon();
				break;
			case 2:
				return $this->getFecmod();
				break;
			case 3:
				return $this->getTipapu();
				break;
			case 4:
				return $this->getDesapu();
				break;
			case 5:
				return $this->getMonapu();
				break;
			case 6:
				return $this->getMonimp();
				break;
			case 7:
				return $this->getTipapuant();
				break;
			case 8:
				return $this->getDesapuant();
				break;
			case 9:
				return $this->getMonapuant();
				break;
			case 10:
				return $this->getMonimpant();
				break;
			case 11:
				return $this->getFunrec();
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
		$keys = FcmodapuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmod(),
			$keys[1] => $this->getNrocon(),
			$keys[2] => $this->getFecmod(),
			$keys[3] => $this->getTipapu(),
			$keys[4] => $this->getDesapu(),
			$keys[5] => $this->getMonapu(),
			$keys[6] => $this->getMonimp(),
			$keys[7] => $this->getTipapuant(),
			$keys[8] => $this->getDesapuant(),
			$keys[9] => $this->getMonapuant(),
			$keys[10] => $this->getMonimpant(),
			$keys[11] => $this->getFunrec(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodapuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefmod($value);
				break;
			case 1:
				$this->setNrocon($value);
				break;
			case 2:
				$this->setFecmod($value);
				break;
			case 3:
				$this->setTipapu($value);
				break;
			case 4:
				$this->setDesapu($value);
				break;
			case 5:
				$this->setMonapu($value);
				break;
			case 6:
				$this->setMonimp($value);
				break;
			case 7:
				$this->setTipapuant($value);
				break;
			case 8:
				$this->setDesapuant($value);
				break;
			case 9:
				$this->setMonapuant($value);
				break;
			case 10:
				$this->setMonimpant($value);
				break;
			case 11:
				$this->setFunrec($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodapuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrocon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipapu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesapu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonapu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonimp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipapuant($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDesapuant($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonapuant($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonimpant($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFunrec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmodapuPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmodapuPeer::REFMOD)) $criteria->add(FcmodapuPeer::REFMOD, $this->refmod);
		if ($this->isColumnModified(FcmodapuPeer::NROCON)) $criteria->add(FcmodapuPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcmodapuPeer::FECMOD)) $criteria->add(FcmodapuPeer::FECMOD, $this->fecmod);
		if ($this->isColumnModified(FcmodapuPeer::TIPAPU)) $criteria->add(FcmodapuPeer::TIPAPU, $this->tipapu);
		if ($this->isColumnModified(FcmodapuPeer::DESAPU)) $criteria->add(FcmodapuPeer::DESAPU, $this->desapu);
		if ($this->isColumnModified(FcmodapuPeer::MONAPU)) $criteria->add(FcmodapuPeer::MONAPU, $this->monapu);
		if ($this->isColumnModified(FcmodapuPeer::MONIMP)) $criteria->add(FcmodapuPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcmodapuPeer::TIPAPUANT)) $criteria->add(FcmodapuPeer::TIPAPUANT, $this->tipapuant);
		if ($this->isColumnModified(FcmodapuPeer::DESAPUANT)) $criteria->add(FcmodapuPeer::DESAPUANT, $this->desapuant);
		if ($this->isColumnModified(FcmodapuPeer::MONAPUANT)) $criteria->add(FcmodapuPeer::MONAPUANT, $this->monapuant);
		if ($this->isColumnModified(FcmodapuPeer::MONIMPANT)) $criteria->add(FcmodapuPeer::MONIMPANT, $this->monimpant);
		if ($this->isColumnModified(FcmodapuPeer::FUNREC)) $criteria->add(FcmodapuPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcmodapuPeer::ID)) $criteria->add(FcmodapuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmodapuPeer::DATABASE_NAME);

		$criteria->add(FcmodapuPeer::REFMOD, $this->refmod);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getRefmod();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setRefmod($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecmod($this->fecmod);

		$copyObj->setTipapu($this->tipapu);

		$copyObj->setDesapu($this->desapu);

		$copyObj->setMonapu($this->monapu);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setTipapuant($this->tipapuant);

		$copyObj->setDesapuant($this->desapuant);

		$copyObj->setMonapuant($this->monapuant);

		$copyObj->setMonimpant($this->monimpant);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setRefmod(NULL); 
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
			self::$peer = new FcmodapuPeer();
		}
		return self::$peer;
	}

} 