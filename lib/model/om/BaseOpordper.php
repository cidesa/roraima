<?php


abstract class BaseOpordper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refopp;


	
	protected $desopp;


	
	protected $fecemi;


	
	protected $numcuo;


	
	protected $freopp;


	
	protected $cedrif;


	
	protected $monopp;


	
	protected $staord;


	
	protected $numcue;


	
	protected $ctaban;


	
	protected $tipdoc;


	
	protected $refere;


	
	protected $coduni;


	
	protected $tippag;


	
	protected $numtiq;


	
	protected $peraut;


	
	protected $cedaut;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getRefopp()
	{

		return $this->refopp;
	}

	
	public function getDesopp()
	{

		return $this->desopp;
	}

	
	public function getFecemi($format = 'Y-m-d')
	{

		if ($this->fecemi === null || $this->fecemi === '') {
			return null;
		} elseif (!is_int($this->fecemi)) {
						$ts = strtotime($this->fecemi);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
			}
		} else {
			$ts = $this->fecemi;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNumcuo()
	{

		return $this->numcuo;
	}

	
	public function getFreopp()
	{

		return $this->freopp;
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getMonopp()
	{

		return $this->monopp;
	}

	
	public function getStaord()
	{

		return $this->staord;
	}

	
	public function getNumcue()
	{

		return $this->numcue;
	}

	
	public function getCtaban()
	{

		return $this->ctaban;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getRefere()
	{

		return $this->refere;
	}

	
	public function getCoduni()
	{

		return $this->coduni;
	}

	
	public function getTippag()
	{

		return $this->tippag;
	}

	
	public function getNumtiq()
	{

		return $this->numtiq;
	}

	
	public function getPeraut()
	{

		return $this->peraut;
	}

	
	public function getCedaut()
	{

		return $this->cedaut;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setRefopp($v)
	{

		if ($this->refopp !== $v) {
			$this->refopp = $v;
			$this->modifiedColumns[] = OpordperPeer::REFOPP;
		}

	} 
	
	public function setDesopp($v)
	{

		if ($this->desopp !== $v) {
			$this->desopp = $v;
			$this->modifiedColumns[] = OpordperPeer::DESOPP;
		}

	} 
	
	public function setFecemi($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecemi !== $ts) {
			$this->fecemi = $ts;
			$this->modifiedColumns[] = OpordperPeer::FECEMI;
		}

	} 
	
	public function setNumcuo($v)
	{

		if ($this->numcuo !== $v) {
			$this->numcuo = $v;
			$this->modifiedColumns[] = OpordperPeer::NUMCUO;
		}

	} 
	
	public function setFreopp($v)
	{

		if ($this->freopp !== $v) {
			$this->freopp = $v;
			$this->modifiedColumns[] = OpordperPeer::FREOPP;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = OpordperPeer::CEDRIF;
		}

	} 
	
	public function setMonopp($v)
	{

		if ($this->monopp !== $v) {
			$this->monopp = $v;
			$this->modifiedColumns[] = OpordperPeer::MONOPP;
		}

	} 
	
	public function setStaord($v)
	{

		if ($this->staord !== $v) {
			$this->staord = $v;
			$this->modifiedColumns[] = OpordperPeer::STAORD;
		}

	} 
	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = OpordperPeer::NUMCUE;
		}

	} 
	
	public function setCtaban($v)
	{

		if ($this->ctaban !== $v) {
			$this->ctaban = $v;
			$this->modifiedColumns[] = OpordperPeer::CTABAN;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = OpordperPeer::TIPDOC;
		}

	} 
	
	public function setRefere($v)
	{

		if ($this->refere !== $v) {
			$this->refere = $v;
			$this->modifiedColumns[] = OpordperPeer::REFERE;
		}

	} 
	
	public function setCoduni($v)
	{

		if ($this->coduni !== $v) {
			$this->coduni = $v;
			$this->modifiedColumns[] = OpordperPeer::CODUNI;
		}

	} 
	
	public function setTippag($v)
	{

		if ($this->tippag !== $v) {
			$this->tippag = $v;
			$this->modifiedColumns[] = OpordperPeer::TIPPAG;
		}

	} 
	
	public function setNumtiq($v)
	{

		if ($this->numtiq !== $v) {
			$this->numtiq = $v;
			$this->modifiedColumns[] = OpordperPeer::NUMTIQ;
		}

	} 
	
	public function setPeraut($v)
	{

		if ($this->peraut !== $v) {
			$this->peraut = $v;
			$this->modifiedColumns[] = OpordperPeer::PERAUT;
		}

	} 
	
	public function setCedaut($v)
	{

		if ($this->cedaut !== $v) {
			$this->cedaut = $v;
			$this->modifiedColumns[] = OpordperPeer::CEDAUT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OpordperPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->refopp = $rs->getString($startcol + 0);

			$this->desopp = $rs->getString($startcol + 1);

			$this->fecemi = $rs->getDate($startcol + 2, null);

			$this->numcuo = $rs->getFloat($startcol + 3);

			$this->freopp = $rs->getString($startcol + 4);

			$this->cedrif = $rs->getString($startcol + 5);

			$this->monopp = $rs->getFloat($startcol + 6);

			$this->staord = $rs->getString($startcol + 7);

			$this->numcue = $rs->getString($startcol + 8);

			$this->ctaban = $rs->getString($startcol + 9);

			$this->tipdoc = $rs->getString($startcol + 10);

			$this->refere = $rs->getString($startcol + 11);

			$this->coduni = $rs->getString($startcol + 12);

			$this->tippag = $rs->getString($startcol + 13);

			$this->numtiq = $rs->getString($startcol + 14);

			$this->peraut = $rs->getString($startcol + 15);

			$this->cedaut = $rs->getString($startcol + 16);

			$this->id = $rs->getInt($startcol + 17);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 18; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Opordper object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OpordperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpordperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpordperPeer::DATABASE_NAME);
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
					$pk = OpordperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OpordperPeer::doUpdate($this, $con);
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


			if (($retval = OpordperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpordperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefopp();
				break;
			case 1:
				return $this->getDesopp();
				break;
			case 2:
				return $this->getFecemi();
				break;
			case 3:
				return $this->getNumcuo();
				break;
			case 4:
				return $this->getFreopp();
				break;
			case 5:
				return $this->getCedrif();
				break;
			case 6:
				return $this->getMonopp();
				break;
			case 7:
				return $this->getStaord();
				break;
			case 8:
				return $this->getNumcue();
				break;
			case 9:
				return $this->getCtaban();
				break;
			case 10:
				return $this->getTipdoc();
				break;
			case 11:
				return $this->getRefere();
				break;
			case 12:
				return $this->getCoduni();
				break;
			case 13:
				return $this->getTippag();
				break;
			case 14:
				return $this->getNumtiq();
				break;
			case 15:
				return $this->getPeraut();
				break;
			case 16:
				return $this->getCedaut();
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
		$keys = OpordperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefopp(),
			$keys[1] => $this->getDesopp(),
			$keys[2] => $this->getFecemi(),
			$keys[3] => $this->getNumcuo(),
			$keys[4] => $this->getFreopp(),
			$keys[5] => $this->getCedrif(),
			$keys[6] => $this->getMonopp(),
			$keys[7] => $this->getStaord(),
			$keys[8] => $this->getNumcue(),
			$keys[9] => $this->getCtaban(),
			$keys[10] => $this->getTipdoc(),
			$keys[11] => $this->getRefere(),
			$keys[12] => $this->getCoduni(),
			$keys[13] => $this->getTippag(),
			$keys[14] => $this->getNumtiq(),
			$keys[15] => $this->getPeraut(),
			$keys[16] => $this->getCedaut(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpordperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefopp($value);
				break;
			case 1:
				$this->setDesopp($value);
				break;
			case 2:
				$this->setFecemi($value);
				break;
			case 3:
				$this->setNumcuo($value);
				break;
			case 4:
				$this->setFreopp($value);
				break;
			case 5:
				$this->setCedrif($value);
				break;
			case 6:
				$this->setMonopp($value);
				break;
			case 7:
				$this->setStaord($value);
				break;
			case 8:
				$this->setNumcue($value);
				break;
			case 9:
				$this->setCtaban($value);
				break;
			case 10:
				$this->setTipdoc($value);
				break;
			case 11:
				$this->setRefere($value);
				break;
			case 12:
				$this->setCoduni($value);
				break;
			case 13:
				$this->setTippag($value);
				break;
			case 14:
				$this->setNumtiq($value);
				break;
			case 15:
				$this->setPeraut($value);
				break;
			case 16:
				$this->setCedaut($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpordperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefopp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesopp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecemi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumcuo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFreopp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCedrif($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonopp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStaord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcue($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCtaban($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipdoc($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRefere($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCoduni($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTippag($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNumtiq($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPeraut($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCedaut($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpordperPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpordperPeer::REFOPP)) $criteria->add(OpordperPeer::REFOPP, $this->refopp);
		if ($this->isColumnModified(OpordperPeer::DESOPP)) $criteria->add(OpordperPeer::DESOPP, $this->desopp);
		if ($this->isColumnModified(OpordperPeer::FECEMI)) $criteria->add(OpordperPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(OpordperPeer::NUMCUO)) $criteria->add(OpordperPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(OpordperPeer::FREOPP)) $criteria->add(OpordperPeer::FREOPP, $this->freopp);
		if ($this->isColumnModified(OpordperPeer::CEDRIF)) $criteria->add(OpordperPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(OpordperPeer::MONOPP)) $criteria->add(OpordperPeer::MONOPP, $this->monopp);
		if ($this->isColumnModified(OpordperPeer::STAORD)) $criteria->add(OpordperPeer::STAORD, $this->staord);
		if ($this->isColumnModified(OpordperPeer::NUMCUE)) $criteria->add(OpordperPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(OpordperPeer::CTABAN)) $criteria->add(OpordperPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(OpordperPeer::TIPDOC)) $criteria->add(OpordperPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(OpordperPeer::REFERE)) $criteria->add(OpordperPeer::REFERE, $this->refere);
		if ($this->isColumnModified(OpordperPeer::CODUNI)) $criteria->add(OpordperPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(OpordperPeer::TIPPAG)) $criteria->add(OpordperPeer::TIPPAG, $this->tippag);
		if ($this->isColumnModified(OpordperPeer::NUMTIQ)) $criteria->add(OpordperPeer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(OpordperPeer::PERAUT)) $criteria->add(OpordperPeer::PERAUT, $this->peraut);
		if ($this->isColumnModified(OpordperPeer::CEDAUT)) $criteria->add(OpordperPeer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(OpordperPeer::ID)) $criteria->add(OpordperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpordperPeer::DATABASE_NAME);

		$criteria->add(OpordperPeer::ID, $this->id);

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

		$copyObj->setRefopp($this->refopp);

		$copyObj->setDesopp($this->desopp);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setFreopp($this->freopp);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setMonopp($this->monopp);

		$copyObj->setStaord($this->staord);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setRefere($this->refere);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setTippag($this->tippag);

		$copyObj->setNumtiq($this->numtiq);

		$copyObj->setPeraut($this->peraut);

		$copyObj->setCedaut($this->cedaut);


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
			self::$peer = new OpordperPeer();
		}
		return self::$peer;
	}

} 