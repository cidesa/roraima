<?php


abstract class BaseFcapulic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrocon;


	
	protected $fecreg;


	
	protected $rifcon;


	
	protected $tipapu;


	
	protected $desapu;


	
	protected $monapu;


	
	protected $monimp;


	
	protected $funrec;


	
	protected $fecrec;


	
	protected $rifrep;


	
	protected $staapu;


	
	protected $stadec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNrocon()
	{

		return $this->nrocon; 		
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

		return number_format($this->monapu,2,',','.');
		
	}
	
	public function getMonimp()
	{

		return number_format($this->monimp,2,',','.');
		
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
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = FcapulicPeer::NROCON;
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
			$this->modifiedColumns[] = FcapulicPeer::FECREG;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcapulicPeer::RIFCON;
		}

	} 
	
	public function setTipapu($v)
	{

		if ($this->tipapu !== $v) {
			$this->tipapu = $v;
			$this->modifiedColumns[] = FcapulicPeer::TIPAPU;
		}

	} 
	
	public function setDesapu($v)
	{

		if ($this->desapu !== $v) {
			$this->desapu = $v;
			$this->modifiedColumns[] = FcapulicPeer::DESAPU;
		}

	} 
	
	public function setMonapu($v)
	{

		if ($this->monapu !== $v) {
			$this->monapu = $v;
			$this->modifiedColumns[] = FcapulicPeer::MONAPU;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcapulicPeer::MONIMP;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcapulicPeer::FUNREC;
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
			$this->modifiedColumns[] = FcapulicPeer::FECREC;
		}

	} 
	
	public function setRifrep($v)
	{

		if ($this->rifrep !== $v) {
			$this->rifrep = $v;
			$this->modifiedColumns[] = FcapulicPeer::RIFREP;
		}

	} 
	
	public function setStaapu($v)
	{

		if ($this->staapu !== $v) {
			$this->staapu = $v;
			$this->modifiedColumns[] = FcapulicPeer::STAAPU;
		}

	} 
	
	public function setStadec($v)
	{

		if ($this->stadec !== $v) {
			$this->stadec = $v;
			$this->modifiedColumns[] = FcapulicPeer::STADEC;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcapulicPeer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcapulicPeer::DIRCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcapulicPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nrocon = $rs->getString($startcol + 0);

			$this->fecreg = $rs->getDate($startcol + 1, null);

			$this->rifcon = $rs->getString($startcol + 2);

			$this->tipapu = $rs->getString($startcol + 3);

			$this->desapu = $rs->getString($startcol + 4);

			$this->monapu = $rs->getFloat($startcol + 5);

			$this->monimp = $rs->getFloat($startcol + 6);

			$this->funrec = $rs->getString($startcol + 7);

			$this->fecrec = $rs->getDate($startcol + 8, null);

			$this->rifrep = $rs->getString($startcol + 9);

			$this->staapu = $rs->getString($startcol + 10);

			$this->stadec = $rs->getString($startcol + 11);

			$this->nomcon = $rs->getString($startcol + 12);

			$this->dircon = $rs->getString($startcol + 13);

			$this->id = $rs->getInt($startcol + 14);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcapulic object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcapulicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcapulicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcapulicPeer::DATABASE_NAME);
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
					$pk = FcapulicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcapulicPeer::doUpdate($this, $con);
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


			if (($retval = FcapulicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcapulicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrocon();
				break;
			case 1:
				return $this->getFecreg();
				break;
			case 2:
				return $this->getRifcon();
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
				return $this->getFunrec();
				break;
			case 8:
				return $this->getFecrec();
				break;
			case 9:
				return $this->getRifrep();
				break;
			case 10:
				return $this->getStaapu();
				break;
			case 11:
				return $this->getStadec();
				break;
			case 12:
				return $this->getNomcon();
				break;
			case 13:
				return $this->getDircon();
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
		$keys = FcapulicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrocon(),
			$keys[1] => $this->getFecreg(),
			$keys[2] => $this->getRifcon(),
			$keys[3] => $this->getTipapu(),
			$keys[4] => $this->getDesapu(),
			$keys[5] => $this->getMonapu(),
			$keys[6] => $this->getMonimp(),
			$keys[7] => $this->getFunrec(),
			$keys[8] => $this->getFecrec(),
			$keys[9] => $this->getRifrep(),
			$keys[10] => $this->getStaapu(),
			$keys[11] => $this->getStadec(),
			$keys[12] => $this->getNomcon(),
			$keys[13] => $this->getDircon(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcapulicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrocon($value);
				break;
			case 1:
				$this->setFecreg($value);
				break;
			case 2:
				$this->setRifcon($value);
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
				$this->setFunrec($value);
				break;
			case 8:
				$this->setFecrec($value);
				break;
			case 9:
				$this->setRifrep($value);
				break;
			case 10:
				$this->setStaapu($value);
				break;
			case 11:
				$this->setStadec($value);
				break;
			case 12:
				$this->setNomcon($value);
				break;
			case 13:
				$this->setDircon($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcapulicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrocon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipapu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesapu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonapu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonimp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFunrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRifrep($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaapu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStadec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomcon($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDircon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcapulicPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcapulicPeer::NROCON)) $criteria->add(FcapulicPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcapulicPeer::FECREG)) $criteria->add(FcapulicPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcapulicPeer::RIFCON)) $criteria->add(FcapulicPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcapulicPeer::TIPAPU)) $criteria->add(FcapulicPeer::TIPAPU, $this->tipapu);
		if ($this->isColumnModified(FcapulicPeer::DESAPU)) $criteria->add(FcapulicPeer::DESAPU, $this->desapu);
		if ($this->isColumnModified(FcapulicPeer::MONAPU)) $criteria->add(FcapulicPeer::MONAPU, $this->monapu);
		if ($this->isColumnModified(FcapulicPeer::MONIMP)) $criteria->add(FcapulicPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcapulicPeer::FUNREC)) $criteria->add(FcapulicPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcapulicPeer::FECREC)) $criteria->add(FcapulicPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcapulicPeer::RIFREP)) $criteria->add(FcapulicPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcapulicPeer::STAAPU)) $criteria->add(FcapulicPeer::STAAPU, $this->staapu);
		if ($this->isColumnModified(FcapulicPeer::STADEC)) $criteria->add(FcapulicPeer::STADEC, $this->stadec);
		if ($this->isColumnModified(FcapulicPeer::NOMCON)) $criteria->add(FcapulicPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcapulicPeer::DIRCON)) $criteria->add(FcapulicPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcapulicPeer::ID)) $criteria->add(FcapulicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcapulicPeer::DATABASE_NAME);

		$criteria->add(FcapulicPeer::ID, $this->id);

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

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setTipapu($this->tipapu);

		$copyObj->setDesapu($this->desapu);

		$copyObj->setMonapu($this->monapu);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setStaapu($this->staapu);

		$copyObj->setStadec($this->stadec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);


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
			self::$peer = new FcapulicPeer();
		}
		return self::$peer;
	}

} 