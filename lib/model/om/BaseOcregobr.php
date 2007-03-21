<?php


abstract class BaseOcregobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $codtipobr;


	
	protected $desobr;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $unocon;


	
	protected $codpre;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $codsec;


	
	protected $dirobr;


	
	protected $monobr;


	
	protected $staobr;


	
	protected $despre;


	
	protected $subtot;


	
	protected $moniva;


	
	protected $ivaobr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodobr()
	{

		return $this->codobr;
	}

	
	public function getCodtipobr()
	{

		return $this->codtipobr;
	}

	
	public function getDesobr()
	{

		return $this->desobr;
	}

	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfin($format = 'Y-m-d')
	{

		if ($this->fecfin === null || $this->fecfin === '') {
			return null;
		} elseif (!is_int($this->fecfin)) {
						$ts = strtotime($this->fecfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
			}
		} else {
			$ts = $this->fecfin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUnocon()
	{

		return $this->unocon;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodmun()
	{

		return $this->codmun;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getCodsec()
	{

		return $this->codsec;
	}

	
	public function getDirobr()
	{

		return $this->dirobr;
	}

	
	public function getMonobr()
	{

		return $this->monobr;
	}

	
	public function getStaobr()
	{

		return $this->staobr;
	}

	
	public function getDespre()
	{

		return $this->despre;
	}

	
	public function getSubtot()
	{

		return $this->subtot;
	}

	
	public function getMoniva()
	{

		return $this->moniva;
	}

	
	public function getIvaobr()
	{

		return $this->ivaobr;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodobr($v)
	{

		if ($this->codobr !== $v) {
			$this->codobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODOBR;
		}

	} 
	
	public function setCodtipobr($v)
	{

		if ($this->codtipobr !== $v) {
			$this->codtipobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODTIPOBR;
		}

	} 
	
	public function setDesobr($v)
	{

		if ($this->desobr !== $v) {
			$this->desobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::DESOBR;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = OcregobrPeer::FECINI;
		}

	} 
	
	public function setFecfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfin !== $ts) {
			$this->fecfin = $ts;
			$this->modifiedColumns[] = OcregobrPeer::FECFIN;
		}

	} 
	
	public function setUnocon($v)
	{

		if ($this->unocon !== $v) {
			$this->unocon = $v;
			$this->modifiedColumns[] = OcregobrPeer::UNOCON;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODPRE;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODPAI;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODEDO;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODMUN;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODPAR;
		}

	} 
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = OcregobrPeer::CODSEC;
		}

	} 
	
	public function setDirobr($v)
	{

		if ($this->dirobr !== $v) {
			$this->dirobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::DIROBR;
		}

	} 
	
	public function setMonobr($v)
	{

		if ($this->monobr !== $v) {
			$this->monobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::MONOBR;
		}

	} 
	
	public function setStaobr($v)
	{

		if ($this->staobr !== $v) {
			$this->staobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::STAOBR;
		}

	} 
	
	public function setDespre($v)
	{

		if ($this->despre !== $v) {
			$this->despre = $v;
			$this->modifiedColumns[] = OcregobrPeer::DESPRE;
		}

	} 
	
	public function setSubtot($v)
	{

		if ($this->subtot !== $v) {
			$this->subtot = $v;
			$this->modifiedColumns[] = OcregobrPeer::SUBTOT;
		}

	} 
	
	public function setMoniva($v)
	{

		if ($this->moniva !== $v) {
			$this->moniva = $v;
			$this->modifiedColumns[] = OcregobrPeer::MONIVA;
		}

	} 
	
	public function setIvaobr($v)
	{

		if ($this->ivaobr !== $v) {
			$this->ivaobr = $v;
			$this->modifiedColumns[] = OcregobrPeer::IVAOBR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcregobrPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codobr = $rs->getString($startcol + 0);

			$this->codtipobr = $rs->getString($startcol + 1);

			$this->desobr = $rs->getString($startcol + 2);

			$this->fecini = $rs->getDate($startcol + 3, null);

			$this->fecfin = $rs->getDate($startcol + 4, null);

			$this->unocon = $rs->getString($startcol + 5);

			$this->codpre = $rs->getString($startcol + 6);

			$this->codpai = $rs->getString($startcol + 7);

			$this->codedo = $rs->getString($startcol + 8);

			$this->codmun = $rs->getString($startcol + 9);

			$this->codpar = $rs->getString($startcol + 10);

			$this->codsec = $rs->getString($startcol + 11);

			$this->dirobr = $rs->getString($startcol + 12);

			$this->monobr = $rs->getFloat($startcol + 13);

			$this->staobr = $rs->getString($startcol + 14);

			$this->despre = $rs->getString($startcol + 15);

			$this->subtot = $rs->getFloat($startcol + 16);

			$this->moniva = $rs->getFloat($startcol + 17);

			$this->ivaobr = $rs->getFloat($startcol + 18);

			$this->id = $rs->getInt($startcol + 19);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 20; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocregobr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcregobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcregobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcregobrPeer::DATABASE_NAME);
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
					$pk = OcregobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcregobrPeer::doUpdate($this, $con);
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


			if (($retval = OcregobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getCodtipobr();
				break;
			case 2:
				return $this->getDesobr();
				break;
			case 3:
				return $this->getFecini();
				break;
			case 4:
				return $this->getFecfin();
				break;
			case 5:
				return $this->getUnocon();
				break;
			case 6:
				return $this->getCodpre();
				break;
			case 7:
				return $this->getCodpai();
				break;
			case 8:
				return $this->getCodedo();
				break;
			case 9:
				return $this->getCodmun();
				break;
			case 10:
				return $this->getCodpar();
				break;
			case 11:
				return $this->getCodsec();
				break;
			case 12:
				return $this->getDirobr();
				break;
			case 13:
				return $this->getMonobr();
				break;
			case 14:
				return $this->getStaobr();
				break;
			case 15:
				return $this->getDespre();
				break;
			case 16:
				return $this->getSubtot();
				break;
			case 17:
				return $this->getMoniva();
				break;
			case 18:
				return $this->getIvaobr();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getCodtipobr(),
			$keys[2] => $this->getDesobr(),
			$keys[3] => $this->getFecini(),
			$keys[4] => $this->getFecfin(),
			$keys[5] => $this->getUnocon(),
			$keys[6] => $this->getCodpre(),
			$keys[7] => $this->getCodpai(),
			$keys[8] => $this->getCodedo(),
			$keys[9] => $this->getCodmun(),
			$keys[10] => $this->getCodpar(),
			$keys[11] => $this->getCodsec(),
			$keys[12] => $this->getDirobr(),
			$keys[13] => $this->getMonobr(),
			$keys[14] => $this->getStaobr(),
			$keys[15] => $this->getDespre(),
			$keys[16] => $this->getSubtot(),
			$keys[17] => $this->getMoniva(),
			$keys[18] => $this->getIvaobr(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setCodtipobr($value);
				break;
			case 2:
				$this->setDesobr($value);
				break;
			case 3:
				$this->setFecini($value);
				break;
			case 4:
				$this->setFecfin($value);
				break;
			case 5:
				$this->setUnocon($value);
				break;
			case 6:
				$this->setCodpre($value);
				break;
			case 7:
				$this->setCodpai($value);
				break;
			case 8:
				$this->setCodedo($value);
				break;
			case 9:
				$this->setCodmun($value);
				break;
			case 10:
				$this->setCodpar($value);
				break;
			case 11:
				$this->setCodsec($value);
				break;
			case 12:
				$this->setDirobr($value);
				break;
			case 13:
				$this->setMonobr($value);
				break;
			case 14:
				$this->setStaobr($value);
				break;
			case 15:
				$this->setDespre($value);
				break;
			case 16:
				$this->setSubtot($value);
				break;
			case 17:
				$this->setMoniva($value);
				break;
			case 18:
				$this->setIvaobr($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtipobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesobr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUnocon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpai($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodedo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodmun($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodpar($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodsec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDirobr($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonobr($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStaobr($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDespre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSubtot($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMoniva($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setIvaobr($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcregobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcregobrPeer::CODOBR)) $criteria->add(OcregobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcregobrPeer::CODTIPOBR)) $criteria->add(OcregobrPeer::CODTIPOBR, $this->codtipobr);
		if ($this->isColumnModified(OcregobrPeer::DESOBR)) $criteria->add(OcregobrPeer::DESOBR, $this->desobr);
		if ($this->isColumnModified(OcregobrPeer::FECINI)) $criteria->add(OcregobrPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(OcregobrPeer::FECFIN)) $criteria->add(OcregobrPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(OcregobrPeer::UNOCON)) $criteria->add(OcregobrPeer::UNOCON, $this->unocon);
		if ($this->isColumnModified(OcregobrPeer::CODPRE)) $criteria->add(OcregobrPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OcregobrPeer::CODPAI)) $criteria->add(OcregobrPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcregobrPeer::CODEDO)) $criteria->add(OcregobrPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcregobrPeer::CODMUN)) $criteria->add(OcregobrPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(OcregobrPeer::CODPAR)) $criteria->add(OcregobrPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcregobrPeer::CODSEC)) $criteria->add(OcregobrPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(OcregobrPeer::DIROBR)) $criteria->add(OcregobrPeer::DIROBR, $this->dirobr);
		if ($this->isColumnModified(OcregobrPeer::MONOBR)) $criteria->add(OcregobrPeer::MONOBR, $this->monobr);
		if ($this->isColumnModified(OcregobrPeer::STAOBR)) $criteria->add(OcregobrPeer::STAOBR, $this->staobr);
		if ($this->isColumnModified(OcregobrPeer::DESPRE)) $criteria->add(OcregobrPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(OcregobrPeer::SUBTOT)) $criteria->add(OcregobrPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(OcregobrPeer::MONIVA)) $criteria->add(OcregobrPeer::MONIVA, $this->moniva);
		if ($this->isColumnModified(OcregobrPeer::IVAOBR)) $criteria->add(OcregobrPeer::IVAOBR, $this->ivaobr);
		if ($this->isColumnModified(OcregobrPeer::ID)) $criteria->add(OcregobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcregobrPeer::DATABASE_NAME);

		$criteria->add(OcregobrPeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodtipobr($this->codtipobr);

		$copyObj->setDesobr($this->desobr);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setUnocon($this->unocon);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setDirobr($this->dirobr);

		$copyObj->setMonobr($this->monobr);

		$copyObj->setStaobr($this->staobr);

		$copyObj->setDespre($this->despre);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setMoniva($this->moniva);

		$copyObj->setIvaobr($this->ivaobr);


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
			self::$peer = new OcregobrPeer();
		}
		return self::$peer;
	}

} 