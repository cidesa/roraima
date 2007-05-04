<?php


abstract class BaseFcmodesp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmod;


	
	protected $nrocon;


	
	protected $fecmod;


	
	protected $nomesp;


	
	protected $diresp;


	
	protected $fecesp;


	
	protected $horesp;


	
	protected $tipesp;


	
	protected $nroent;


	
	protected $monent;


	
	protected $monimp;


	
	protected $nomres;


	
	protected $dirres;


	
	protected $telres;


	
	protected $nomespant;


	
	protected $direspant;


	
	protected $fecespant;


	
	protected $horespant;


	
	protected $tipespant;


	
	protected $nroentant;


	
	protected $monentant;


	
	protected $monimpant;


	
	protected $nomresant;


	
	protected $dirresant;


	
	protected $telresant;


	
	protected $funrec;


	
	protected $id;

	
	protected $aFcesppub;

	
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

	
	public function getNomesp()
	{

		return $this->nomesp;
	}

	
	public function getDiresp()
	{

		return $this->diresp;
	}

	
	public function getFecesp($format = 'Y-m-d')
	{

		if ($this->fecesp === null || $this->fecesp === '') {
			return null;
		} elseif (!is_int($this->fecesp)) {
						$ts = strtotime($this->fecesp);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecesp] as date/time value: " . var_export($this->fecesp, true));
			}
		} else {
			$ts = $this->fecesp;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHoresp()
	{

		return $this->horesp;
	}

	
	public function getTipesp()
	{

		return $this->tipesp;
	}

	
	public function getNroent()
	{

		return $this->nroent;
	}

	
	public function getMonent()
	{

		return $this->monent;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getNomres()
	{

		return $this->nomres;
	}

	
	public function getDirres()
	{

		return $this->dirres;
	}

	
	public function getTelres()
	{

		return $this->telres;
	}

	
	public function getNomespant()
	{

		return $this->nomespant;
	}

	
	public function getDirespant()
	{

		return $this->direspant;
	}

	
	public function getFecespant($format = 'Y-m-d')
	{

		if ($this->fecespant === null || $this->fecespant === '') {
			return null;
		} elseif (!is_int($this->fecespant)) {
						$ts = strtotime($this->fecespant);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecespant] as date/time value: " . var_export($this->fecespant, true));
			}
		} else {
			$ts = $this->fecespant;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getHorespant()
	{

		return $this->horespant;
	}

	
	public function getTipespant()
	{

		return $this->tipespant;
	}

	
	public function getNroentant()
	{

		return $this->nroentant;
	}

	
	public function getMonentant()
	{

		return $this->monentant;
	}

	
	public function getMonimpant()
	{

		return $this->monimpant;
	}

	
	public function getNomresant()
	{

		return $this->nomresant;
	}

	
	public function getDirresant()
	{

		return $this->dirresant;
	}

	
	public function getTelresant()
	{

		return $this->telresant;
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
			$this->modifiedColumns[] = FcmodespPeer::REFMOD;
		}

	} 
	
	public function setNrocon($v)
	{

		if ($this->nrocon !== $v) {
			$this->nrocon = $v;
			$this->modifiedColumns[] = FcmodespPeer::NROCON;
		}

		if ($this->aFcesppub !== null && $this->aFcesppub->getNrocon() !== $v) {
			$this->aFcesppub = null;
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
			$this->modifiedColumns[] = FcmodespPeer::FECMOD;
		}

	} 
	
	public function setNomesp($v)
	{

		if ($this->nomesp !== $v) {
			$this->nomesp = $v;
			$this->modifiedColumns[] = FcmodespPeer::NOMESP;
		}

	} 
	
	public function setDiresp($v)
	{

		if ($this->diresp !== $v) {
			$this->diresp = $v;
			$this->modifiedColumns[] = FcmodespPeer::DIRESP;
		}

	} 
	
	public function setFecesp($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecesp] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecesp !== $ts) {
			$this->fecesp = $ts;
			$this->modifiedColumns[] = FcmodespPeer::FECESP;
		}

	} 
	
	public function setHoresp($v)
	{

		if ($this->horesp !== $v) {
			$this->horesp = $v;
			$this->modifiedColumns[] = FcmodespPeer::HORESP;
		}

	} 
	
	public function setTipesp($v)
	{

		if ($this->tipesp !== $v) {
			$this->tipesp = $v;
			$this->modifiedColumns[] = FcmodespPeer::TIPESP;
		}

	} 
	
	public function setNroent($v)
	{

		if ($this->nroent !== $v) {
			$this->nroent = $v;
			$this->modifiedColumns[] = FcmodespPeer::NROENT;
		}

	} 
	
	public function setMonent($v)
	{

		if ($this->monent !== $v) {
			$this->monent = $v;
			$this->modifiedColumns[] = FcmodespPeer::MONENT;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = FcmodespPeer::MONIMP;
		}

	} 
	
	public function setNomres($v)
	{

		if ($this->nomres !== $v) {
			$this->nomres = $v;
			$this->modifiedColumns[] = FcmodespPeer::NOMRES;
		}

	} 
	
	public function setDirres($v)
	{

		if ($this->dirres !== $v) {
			$this->dirres = $v;
			$this->modifiedColumns[] = FcmodespPeer::DIRRES;
		}

	} 
	
	public function setTelres($v)
	{

		if ($this->telres !== $v) {
			$this->telres = $v;
			$this->modifiedColumns[] = FcmodespPeer::TELRES;
		}

	} 
	
	public function setNomespant($v)
	{

		if ($this->nomespant !== $v) {
			$this->nomespant = $v;
			$this->modifiedColumns[] = FcmodespPeer::NOMESPANT;
		}

	} 
	
	public function setDirespant($v)
	{

		if ($this->direspant !== $v) {
			$this->direspant = $v;
			$this->modifiedColumns[] = FcmodespPeer::DIRESPANT;
		}

	} 
	
	public function setFecespant($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecespant] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecespant !== $ts) {
			$this->fecespant = $ts;
			$this->modifiedColumns[] = FcmodespPeer::FECESPANT;
		}

	} 
	
	public function setHorespant($v)
	{

		if ($this->horespant !== $v) {
			$this->horespant = $v;
			$this->modifiedColumns[] = FcmodespPeer::HORESPANT;
		}

	} 
	
	public function setTipespant($v)
	{

		if ($this->tipespant !== $v) {
			$this->tipespant = $v;
			$this->modifiedColumns[] = FcmodespPeer::TIPESPANT;
		}

	} 
	
	public function setNroentant($v)
	{

		if ($this->nroentant !== $v) {
			$this->nroentant = $v;
			$this->modifiedColumns[] = FcmodespPeer::NROENTANT;
		}

	} 
	
	public function setMonentant($v)
	{

		if ($this->monentant !== $v) {
			$this->monentant = $v;
			$this->modifiedColumns[] = FcmodespPeer::MONENTANT;
		}

	} 
	
	public function setMonimpant($v)
	{

		if ($this->monimpant !== $v) {
			$this->monimpant = $v;
			$this->modifiedColumns[] = FcmodespPeer::MONIMPANT;
		}

	} 
	
	public function setNomresant($v)
	{

		if ($this->nomresant !== $v) {
			$this->nomresant = $v;
			$this->modifiedColumns[] = FcmodespPeer::NOMRESANT;
		}

	} 
	
	public function setDirresant($v)
	{

		if ($this->dirresant !== $v) {
			$this->dirresant = $v;
			$this->modifiedColumns[] = FcmodespPeer::DIRRESANT;
		}

	} 
	
	public function setTelresant($v)
	{

		if ($this->telresant !== $v) {
			$this->telresant = $v;
			$this->modifiedColumns[] = FcmodespPeer::TELRESANT;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcmodespPeer::FUNREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcmodespPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refmod = $rs->getString($startcol + 0);

			$this->nrocon = $rs->getString($startcol + 1);

			$this->fecmod = $rs->getDate($startcol + 2, null);

			$this->nomesp = $rs->getString($startcol + 3);

			$this->diresp = $rs->getString($startcol + 4);

			$this->fecesp = $rs->getDate($startcol + 5, null);

			$this->horesp = $rs->getString($startcol + 6);

			$this->tipesp = $rs->getString($startcol + 7);

			$this->nroent = $rs->getFloat($startcol + 8);

			$this->monent = $rs->getFloat($startcol + 9);

			$this->monimp = $rs->getFloat($startcol + 10);

			$this->nomres = $rs->getString($startcol + 11);

			$this->dirres = $rs->getString($startcol + 12);

			$this->telres = $rs->getString($startcol + 13);

			$this->nomespant = $rs->getString($startcol + 14);

			$this->direspant = $rs->getString($startcol + 15);

			$this->fecespant = $rs->getDate($startcol + 16, null);

			$this->horespant = $rs->getString($startcol + 17);

			$this->tipespant = $rs->getString($startcol + 18);

			$this->nroentant = $rs->getFloat($startcol + 19);

			$this->monentant = $rs->getFloat($startcol + 20);

			$this->monimpant = $rs->getFloat($startcol + 21);

			$this->nomresant = $rs->getString($startcol + 22);

			$this->dirresant = $rs->getString($startcol + 23);

			$this->telresant = $rs->getString($startcol + 24);

			$this->funrec = $rs->getString($startcol + 25);

			$this->id = $rs->getInt($startcol + 26);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 27; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcmodesp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcmodespPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmodespPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmodespPeer::DATABASE_NAME);
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


												
			if ($this->aFcesppub !== null) {
				if ($this->aFcesppub->isModified()) {
					$affectedRows += $this->aFcesppub->save($con);
				}
				$this->setFcesppub($this->aFcesppub);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcmodespPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcmodespPeer::doUpdate($this, $con);
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


												
			if ($this->aFcesppub !== null) {
				if (!$this->aFcesppub->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcesppub->getValidationFailures());
				}
			}


			if (($retval = FcmodespPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNomesp();
				break;
			case 4:
				return $this->getDiresp();
				break;
			case 5:
				return $this->getFecesp();
				break;
			case 6:
				return $this->getHoresp();
				break;
			case 7:
				return $this->getTipesp();
				break;
			case 8:
				return $this->getNroent();
				break;
			case 9:
				return $this->getMonent();
				break;
			case 10:
				return $this->getMonimp();
				break;
			case 11:
				return $this->getNomres();
				break;
			case 12:
				return $this->getDirres();
				break;
			case 13:
				return $this->getTelres();
				break;
			case 14:
				return $this->getNomespant();
				break;
			case 15:
				return $this->getDirespant();
				break;
			case 16:
				return $this->getFecespant();
				break;
			case 17:
				return $this->getHorespant();
				break;
			case 18:
				return $this->getTipespant();
				break;
			case 19:
				return $this->getNroentant();
				break;
			case 20:
				return $this->getMonentant();
				break;
			case 21:
				return $this->getMonimpant();
				break;
			case 22:
				return $this->getNomresant();
				break;
			case 23:
				return $this->getDirresant();
				break;
			case 24:
				return $this->getTelresant();
				break;
			case 25:
				return $this->getFunrec();
				break;
			case 26:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodespPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmod(),
			$keys[1] => $this->getNrocon(),
			$keys[2] => $this->getFecmod(),
			$keys[3] => $this->getNomesp(),
			$keys[4] => $this->getDiresp(),
			$keys[5] => $this->getFecesp(),
			$keys[6] => $this->getHoresp(),
			$keys[7] => $this->getTipesp(),
			$keys[8] => $this->getNroent(),
			$keys[9] => $this->getMonent(),
			$keys[10] => $this->getMonimp(),
			$keys[11] => $this->getNomres(),
			$keys[12] => $this->getDirres(),
			$keys[13] => $this->getTelres(),
			$keys[14] => $this->getNomespant(),
			$keys[15] => $this->getDirespant(),
			$keys[16] => $this->getFecespant(),
			$keys[17] => $this->getHorespant(),
			$keys[18] => $this->getTipespant(),
			$keys[19] => $this->getNroentant(),
			$keys[20] => $this->getMonentant(),
			$keys[21] => $this->getMonimpant(),
			$keys[22] => $this->getNomresant(),
			$keys[23] => $this->getDirresant(),
			$keys[24] => $this->getTelresant(),
			$keys[25] => $this->getFunrec(),
			$keys[26] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodespPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNomesp($value);
				break;
			case 4:
				$this->setDiresp($value);
				break;
			case 5:
				$this->setFecesp($value);
				break;
			case 6:
				$this->setHoresp($value);
				break;
			case 7:
				$this->setTipesp($value);
				break;
			case 8:
				$this->setNroent($value);
				break;
			case 9:
				$this->setMonent($value);
				break;
			case 10:
				$this->setMonimp($value);
				break;
			case 11:
				$this->setNomres($value);
				break;
			case 12:
				$this->setDirres($value);
				break;
			case 13:
				$this->setTelres($value);
				break;
			case 14:
				$this->setNomespant($value);
				break;
			case 15:
				$this->setDirespant($value);
				break;
			case 16:
				$this->setFecespant($value);
				break;
			case 17:
				$this->setHorespant($value);
				break;
			case 18:
				$this->setTipespant($value);
				break;
			case 19:
				$this->setNroentant($value);
				break;
			case 20:
				$this->setMonentant($value);
				break;
			case 21:
				$this->setMonimpant($value);
				break;
			case 22:
				$this->setNomresant($value);
				break;
			case 23:
				$this->setDirresant($value);
				break;
			case 24:
				$this->setTelresant($value);
				break;
			case 25:
				$this->setFunrec($value);
				break;
			case 26:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodespPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNrocon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomesp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiresp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecesp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHoresp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipesp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNroent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonent($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonimp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomres($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDirres($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTelres($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNomespant($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDirespant($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecespant($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setHorespant($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipespant($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNroentant($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMonentant($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMonimpant($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNomresant($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDirresant($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setTelresant($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFunrec($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setId($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmodespPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmodespPeer::REFMOD)) $criteria->add(FcmodespPeer::REFMOD, $this->refmod);
		if ($this->isColumnModified(FcmodespPeer::NROCON)) $criteria->add(FcmodespPeer::NROCON, $this->nrocon);
		if ($this->isColumnModified(FcmodespPeer::FECMOD)) $criteria->add(FcmodespPeer::FECMOD, $this->fecmod);
		if ($this->isColumnModified(FcmodespPeer::NOMESP)) $criteria->add(FcmodespPeer::NOMESP, $this->nomesp);
		if ($this->isColumnModified(FcmodespPeer::DIRESP)) $criteria->add(FcmodespPeer::DIRESP, $this->diresp);
		if ($this->isColumnModified(FcmodespPeer::FECESP)) $criteria->add(FcmodespPeer::FECESP, $this->fecesp);
		if ($this->isColumnModified(FcmodespPeer::HORESP)) $criteria->add(FcmodespPeer::HORESP, $this->horesp);
		if ($this->isColumnModified(FcmodespPeer::TIPESP)) $criteria->add(FcmodespPeer::TIPESP, $this->tipesp);
		if ($this->isColumnModified(FcmodespPeer::NROENT)) $criteria->add(FcmodespPeer::NROENT, $this->nroent);
		if ($this->isColumnModified(FcmodespPeer::MONENT)) $criteria->add(FcmodespPeer::MONENT, $this->monent);
		if ($this->isColumnModified(FcmodespPeer::MONIMP)) $criteria->add(FcmodespPeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(FcmodespPeer::NOMRES)) $criteria->add(FcmodespPeer::NOMRES, $this->nomres);
		if ($this->isColumnModified(FcmodespPeer::DIRRES)) $criteria->add(FcmodespPeer::DIRRES, $this->dirres);
		if ($this->isColumnModified(FcmodespPeer::TELRES)) $criteria->add(FcmodespPeer::TELRES, $this->telres);
		if ($this->isColumnModified(FcmodespPeer::NOMESPANT)) $criteria->add(FcmodespPeer::NOMESPANT, $this->nomespant);
		if ($this->isColumnModified(FcmodespPeer::DIRESPANT)) $criteria->add(FcmodespPeer::DIRESPANT, $this->direspant);
		if ($this->isColumnModified(FcmodespPeer::FECESPANT)) $criteria->add(FcmodespPeer::FECESPANT, $this->fecespant);
		if ($this->isColumnModified(FcmodespPeer::HORESPANT)) $criteria->add(FcmodespPeer::HORESPANT, $this->horespant);
		if ($this->isColumnModified(FcmodespPeer::TIPESPANT)) $criteria->add(FcmodespPeer::TIPESPANT, $this->tipespant);
		if ($this->isColumnModified(FcmodespPeer::NROENTANT)) $criteria->add(FcmodespPeer::NROENTANT, $this->nroentant);
		if ($this->isColumnModified(FcmodespPeer::MONENTANT)) $criteria->add(FcmodespPeer::MONENTANT, $this->monentant);
		if ($this->isColumnModified(FcmodespPeer::MONIMPANT)) $criteria->add(FcmodespPeer::MONIMPANT, $this->monimpant);
		if ($this->isColumnModified(FcmodespPeer::NOMRESANT)) $criteria->add(FcmodespPeer::NOMRESANT, $this->nomresant);
		if ($this->isColumnModified(FcmodespPeer::DIRRESANT)) $criteria->add(FcmodespPeer::DIRRESANT, $this->dirresant);
		if ($this->isColumnModified(FcmodespPeer::TELRESANT)) $criteria->add(FcmodespPeer::TELRESANT, $this->telresant);
		if ($this->isColumnModified(FcmodespPeer::FUNREC)) $criteria->add(FcmodespPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcmodespPeer::ID)) $criteria->add(FcmodespPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmodespPeer::DATABASE_NAME);

		$criteria->add(FcmodespPeer::ID, $this->id);

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

		$copyObj->setRefmod($this->refmod);

		$copyObj->setNrocon($this->nrocon);

		$copyObj->setFecmod($this->fecmod);

		$copyObj->setNomesp($this->nomesp);

		$copyObj->setDiresp($this->diresp);

		$copyObj->setFecesp($this->fecesp);

		$copyObj->setHoresp($this->horesp);

		$copyObj->setTipesp($this->tipesp);

		$copyObj->setNroent($this->nroent);

		$copyObj->setMonent($this->monent);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setNomres($this->nomres);

		$copyObj->setDirres($this->dirres);

		$copyObj->setTelres($this->telres);

		$copyObj->setNomespant($this->nomespant);

		$copyObj->setDirespant($this->direspant);

		$copyObj->setFecespant($this->fecespant);

		$copyObj->setHorespant($this->horespant);

		$copyObj->setTipespant($this->tipespant);

		$copyObj->setNroentant($this->nroentant);

		$copyObj->setMonentant($this->monentant);

		$copyObj->setMonimpant($this->monimpant);

		$copyObj->setNomresant($this->nomresant);

		$copyObj->setDirresant($this->dirresant);

		$copyObj->setTelresant($this->telresant);

		$copyObj->setFunrec($this->funrec);


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
			self::$peer = new FcmodespPeer();
		}
		return self::$peer;
	}

	
	public function setFcesppub($v)
	{


		if ($v === null) {
			$this->setNrocon(NULL);
		} else {
			$this->setNrocon($v->getNrocon());
		}


		$this->aFcesppub = $v;
	}


	
	public function getFcesppub($con = null)
	{
				include_once 'lib/model/om/BaseFcesppubPeer.php';

		if ($this->aFcesppub === null && (($this->nrocon !== "" && $this->nrocon !== null))) {

			$this->aFcesppub = FcesppubPeer::retrieveByPK($this->nrocon, $con);

			
		}
		return $this->aFcesppub;
	}

} 