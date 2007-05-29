<?php


abstract class BaseFanotent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nronot;


	
	protected $fecnot;


	
	protected $codcli;


	
	protected $tipref;


	
	protected $codref;


	
	protected $codalm;


	
	protected $desnot;


	
	protected $monnot;


	
	protected $obsnot;


	
	protected $tipnot;


	
	protected $reapor;


	
	protected $status;


	
	protected $rifent;


	
	protected $noment;


	
	protected $fecanu;


	
	protected $autori;


	
	protected $fecaut;


	
	protected $autpor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNronot()
	{

		return $this->nronot; 		
	}
	
	public function getFecnot($format = 'Y-m-d')
	{

		if ($this->fecnot === null || $this->fecnot === '') {
			return null;
		} elseif (!is_int($this->fecnot)) {
						$ts = strtotime($this->fecnot);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnot] as date/time value: " . var_export($this->fecnot, true));
			}
		} else {
			$ts = $this->fecnot;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getTipref()
	{

		return $this->tipref; 		
	}
	
	public function getCodref()
	{

		return $this->codref; 		
	}
	
	public function getCodalm()
	{

		return $this->codalm; 		
	}
	
	public function getDesnot()
	{

		return $this->desnot; 		
	}
	
	public function getMonnot()
	{

		return number_format($this->monnot,2,',','.');
		
	}
	
	public function getObsnot()
	{

		return $this->obsnot; 		
	}
	
	public function getTipnot()
	{

		return $this->tipnot; 		
	}
	
	public function getReapor()
	{

		return $this->reapor; 		
	}
	
	public function getStatus()
	{

		return $this->status; 		
	}
	
	public function getRifent()
	{

		return $this->rifent; 		
	}
	
	public function getNoment()
	{

		return $this->noment; 		
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

	
	public function getAutori()
	{

		return $this->autori; 		
	}
	
	public function getFecaut($format = 'Y-m-d')
	{

		if ($this->fecaut === null || $this->fecaut === '') {
			return null;
		} elseif (!is_int($this->fecaut)) {
						$ts = strtotime($this->fecaut);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecaut] as date/time value: " . var_export($this->fecaut, true));
			}
		} else {
			$ts = $this->fecaut;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAutpor()
	{

		return $this->autpor; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNronot($v)
	{

		if ($this->nronot !== $v) {
			$this->nronot = $v;
			$this->modifiedColumns[] = FanotentPeer::NRONOT;
		}

	} 
	
	public function setFecnot($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnot] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnot !== $ts) {
			$this->fecnot = $ts;
			$this->modifiedColumns[] = FanotentPeer::FECNOT;
		}

	} 
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = FanotentPeer::CODCLI;
		}

	} 
	
	public function setTipref($v)
	{

		if ($this->tipref !== $v) {
			$this->tipref = $v;
			$this->modifiedColumns[] = FanotentPeer::TIPREF;
		}

	} 
	
	public function setCodref($v)
	{

		if ($this->codref !== $v) {
			$this->codref = $v;
			$this->modifiedColumns[] = FanotentPeer::CODREF;
		}

	} 
	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = FanotentPeer::CODALM;
		}

	} 
	
	public function setDesnot($v)
	{

		if ($this->desnot !== $v) {
			$this->desnot = $v;
			$this->modifiedColumns[] = FanotentPeer::DESNOT;
		}

	} 
	
	public function setMonnot($v)
	{

		if ($this->monnot !== $v) {
			$this->monnot = $v;
			$this->modifiedColumns[] = FanotentPeer::MONNOT;
		}

	} 
	
	public function setObsnot($v)
	{

		if ($this->obsnot !== $v) {
			$this->obsnot = $v;
			$this->modifiedColumns[] = FanotentPeer::OBSNOT;
		}

	} 
	
	public function setTipnot($v)
	{

		if ($this->tipnot !== $v) {
			$this->tipnot = $v;
			$this->modifiedColumns[] = FanotentPeer::TIPNOT;
		}

	} 
	
	public function setReapor($v)
	{

		if ($this->reapor !== $v) {
			$this->reapor = $v;
			$this->modifiedColumns[] = FanotentPeer::REAPOR;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = FanotentPeer::STATUS;
		}

	} 
	
	public function setRifent($v)
	{

		if ($this->rifent !== $v) {
			$this->rifent = $v;
			$this->modifiedColumns[] = FanotentPeer::RIFENT;
		}

	} 
	
	public function setNoment($v)
	{

		if ($this->noment !== $v) {
			$this->noment = $v;
			$this->modifiedColumns[] = FanotentPeer::NOMENT;
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
			$this->modifiedColumns[] = FanotentPeer::FECANU;
		}

	} 
	
	public function setAutori($v)
	{

		if ($this->autori !== $v) {
			$this->autori = $v;
			$this->modifiedColumns[] = FanotentPeer::AUTORI;
		}

	} 
	
	public function setFecaut($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecaut] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecaut !== $ts) {
			$this->fecaut = $ts;
			$this->modifiedColumns[] = FanotentPeer::FECAUT;
		}

	} 
	
	public function setAutpor($v)
	{

		if ($this->autpor !== $v) {
			$this->autpor = $v;
			$this->modifiedColumns[] = FanotentPeer::AUTPOR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FanotentPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nronot = $rs->getString($startcol + 0);

			$this->fecnot = $rs->getDate($startcol + 1, null);

			$this->codcli = $rs->getString($startcol + 2);

			$this->tipref = $rs->getString($startcol + 3);

			$this->codref = $rs->getString($startcol + 4);

			$this->codalm = $rs->getString($startcol + 5);

			$this->desnot = $rs->getString($startcol + 6);

			$this->monnot = $rs->getFloat($startcol + 7);

			$this->obsnot = $rs->getString($startcol + 8);

			$this->tipnot = $rs->getString($startcol + 9);

			$this->reapor = $rs->getString($startcol + 10);

			$this->status = $rs->getString($startcol + 11);

			$this->rifent = $rs->getString($startcol + 12);

			$this->noment = $rs->getString($startcol + 13);

			$this->fecanu = $rs->getDate($startcol + 14, null);

			$this->autori = $rs->getString($startcol + 15);

			$this->fecaut = $rs->getDate($startcol + 16, null);

			$this->autpor = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fanotent object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FanotentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FanotentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FanotentPeer::DATABASE_NAME);
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
					$pk = FanotentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FanotentPeer::doUpdate($this, $con);
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


			if (($retval = FanotentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FanotentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNronot();
				break;
			case 1:
				return $this->getFecnot();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getTipref();
				break;
			case 4:
				return $this->getCodref();
				break;
			case 5:
				return $this->getCodalm();
				break;
			case 6:
				return $this->getDesnot();
				break;
			case 7:
				return $this->getMonnot();
				break;
			case 8:
				return $this->getObsnot();
				break;
			case 9:
				return $this->getTipnot();
				break;
			case 10:
				return $this->getReapor();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getRifent();
				break;
			case 13:
				return $this->getNoment();
				break;
			case 14:
				return $this->getFecanu();
				break;
			case 15:
				return $this->getAutori();
				break;
			case 16:
				return $this->getFecaut();
				break;
			case 17:
				return $this->getAutpor();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FanotentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNronot(),
			$keys[1] => $this->getFecnot(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getTipref(),
			$keys[4] => $this->getCodref(),
			$keys[5] => $this->getCodalm(),
			$keys[6] => $this->getDesnot(),
			$keys[7] => $this->getMonnot(),
			$keys[8] => $this->getObsnot(),
			$keys[9] => $this->getTipnot(),
			$keys[10] => $this->getReapor(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getRifent(),
			$keys[13] => $this->getNoment(),
			$keys[14] => $this->getFecanu(),
			$keys[15] => $this->getAutori(),
			$keys[16] => $this->getFecaut(),
			$keys[17] => $this->getAutpor(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FanotentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNronot($value);
				break;
			case 1:
				$this->setFecnot($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setTipref($value);
				break;
			case 4:
				$this->setCodref($value);
				break;
			case 5:
				$this->setCodalm($value);
				break;
			case 6:
				$this->setDesnot($value);
				break;
			case 7:
				$this->setMonnot($value);
				break;
			case 8:
				$this->setObsnot($value);
				break;
			case 9:
				$this->setTipnot($value);
				break;
			case 10:
				$this->setReapor($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setRifent($value);
				break;
			case 13:
				$this->setNoment($value);
				break;
			case 14:
				$this->setFecanu($value);
				break;
			case 15:
				$this->setAutori($value);
				break;
			case 16:
				$this->setFecaut($value);
				break;
			case 17:
				$this->setAutpor($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FanotentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNronot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecnot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipref($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodalm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesnot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonnot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObsnot($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipnot($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setReapor($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRifent($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNoment($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecanu($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAutori($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecaut($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAutpor($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FanotentPeer::DATABASE_NAME);

		if ($this->isColumnModified(FanotentPeer::NRONOT)) $criteria->add(FanotentPeer::NRONOT, $this->nronot);
		if ($this->isColumnModified(FanotentPeer::FECNOT)) $criteria->add(FanotentPeer::FECNOT, $this->fecnot);
		if ($this->isColumnModified(FanotentPeer::CODCLI)) $criteria->add(FanotentPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FanotentPeer::TIPREF)) $criteria->add(FanotentPeer::TIPREF, $this->tipref);
		if ($this->isColumnModified(FanotentPeer::CODREF)) $criteria->add(FanotentPeer::CODREF, $this->codref);
		if ($this->isColumnModified(FanotentPeer::CODALM)) $criteria->add(FanotentPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FanotentPeer::DESNOT)) $criteria->add(FanotentPeer::DESNOT, $this->desnot);
		if ($this->isColumnModified(FanotentPeer::MONNOT)) $criteria->add(FanotentPeer::MONNOT, $this->monnot);
		if ($this->isColumnModified(FanotentPeer::OBSNOT)) $criteria->add(FanotentPeer::OBSNOT, $this->obsnot);
		if ($this->isColumnModified(FanotentPeer::TIPNOT)) $criteria->add(FanotentPeer::TIPNOT, $this->tipnot);
		if ($this->isColumnModified(FanotentPeer::REAPOR)) $criteria->add(FanotentPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FanotentPeer::STATUS)) $criteria->add(FanotentPeer::STATUS, $this->status);
		if ($this->isColumnModified(FanotentPeer::RIFENT)) $criteria->add(FanotentPeer::RIFENT, $this->rifent);
		if ($this->isColumnModified(FanotentPeer::NOMENT)) $criteria->add(FanotentPeer::NOMENT, $this->noment);
		if ($this->isColumnModified(FanotentPeer::FECANU)) $criteria->add(FanotentPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FanotentPeer::AUTORI)) $criteria->add(FanotentPeer::AUTORI, $this->autori);
		if ($this->isColumnModified(FanotentPeer::FECAUT)) $criteria->add(FanotentPeer::FECAUT, $this->fecaut);
		if ($this->isColumnModified(FanotentPeer::AUTPOR)) $criteria->add(FanotentPeer::AUTPOR, $this->autpor);
		if ($this->isColumnModified(FanotentPeer::ID)) $criteria->add(FanotentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FanotentPeer::DATABASE_NAME);

		$criteria->add(FanotentPeer::ID, $this->id);

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

		$copyObj->setNronot($this->nronot);

		$copyObj->setFecnot($this->fecnot);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setTipref($this->tipref);

		$copyObj->setCodref($this->codref);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setDesnot($this->desnot);

		$copyObj->setMonnot($this->monnot);

		$copyObj->setObsnot($this->obsnot);

		$copyObj->setTipnot($this->tipnot);

		$copyObj->setReapor($this->reapor);

		$copyObj->setStatus($this->status);

		$copyObj->setRifent($this->rifent);

		$copyObj->setNoment($this->noment);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setAutori($this->autori);

		$copyObj->setFecaut($this->fecaut);

		$copyObj->setAutpor($this->autpor);


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
			self::$peer = new FanotentPeer();
		}
		return self::$peer;
	}

} 