<?php


abstract class BaseBndissem extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codsem;


	
	protected $nrodissem;


	
	protected $motdissem;


	
	protected $tipdissem;


	
	protected $fecdissem;


	
	protected $fecdevdis;


	
	protected $mondissem;


	
	protected $detdissem;


	
	protected $codubiori;


	
	protected $codubides;


	
	protected $obsdissem;


	
	protected $stadissem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodact()
	{

		return $this->codact;
	}

	
	public function getCodsem()
	{

		return $this->codsem;
	}

	
	public function getNrodissem()
	{

		return $this->nrodissem;
	}

	
	public function getMotdissem()
	{

		return $this->motdissem;
	}

	
	public function getTipdissem()
	{

		return $this->tipdissem;
	}

	
	public function getFecdissem($format = 'Y-m-d')
	{

		if ($this->fecdissem === null || $this->fecdissem === '') {
			return null;
		} elseif (!is_int($this->fecdissem)) {
						$ts = strtotime($this->fecdissem);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdissem] as date/time value: " . var_export($this->fecdissem, true));
			}
		} else {
			$ts = $this->fecdissem;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecdevdis($format = 'Y-m-d')
	{

		if ($this->fecdevdis === null || $this->fecdevdis === '') {
			return null;
		} elseif (!is_int($this->fecdevdis)) {
						$ts = strtotime($this->fecdevdis);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdevdis] as date/time value: " . var_export($this->fecdevdis, true));
			}
		} else {
			$ts = $this->fecdevdis;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMondissem()
	{

		return $this->mondissem;
	}

	
	public function getDetdissem()
	{

		return $this->detdissem;
	}

	
	public function getCodubiori()
	{

		return $this->codubiori;
	}

	
	public function getCodubides()
	{

		return $this->codubides;
	}

	
	public function getObsdissem()
	{

		return $this->obsdissem;
	}

	
	public function getStadissem()
	{

		return $this->stadissem;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BndissemPeer::CODACT;
		}

	} 
	
	public function setCodsem($v)
	{

		if ($this->codsem !== $v) {
			$this->codsem = $v;
			$this->modifiedColumns[] = BndissemPeer::CODSEM;
		}

	} 
	
	public function setNrodissem($v)
	{

		if ($this->nrodissem !== $v) {
			$this->nrodissem = $v;
			$this->modifiedColumns[] = BndissemPeer::NRODISSEM;
		}

	} 
	
	public function setMotdissem($v)
	{

		if ($this->motdissem !== $v) {
			$this->motdissem = $v;
			$this->modifiedColumns[] = BndissemPeer::MOTDISSEM;
		}

	} 
	
	public function setTipdissem($v)
	{

		if ($this->tipdissem !== $v) {
			$this->tipdissem = $v;
			$this->modifiedColumns[] = BndissemPeer::TIPDISSEM;
		}

	} 
	
	public function setFecdissem($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdissem] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdissem !== $ts) {
			$this->fecdissem = $ts;
			$this->modifiedColumns[] = BndissemPeer::FECDISSEM;
		}

	} 
	
	public function setFecdevdis($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdevdis] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdevdis !== $ts) {
			$this->fecdevdis = $ts;
			$this->modifiedColumns[] = BndissemPeer::FECDEVDIS;
		}

	} 
	
	public function setMondissem($v)
	{

		if ($this->mondissem !== $v) {
			$this->mondissem = $v;
			$this->modifiedColumns[] = BndissemPeer::MONDISSEM;
		}

	} 
	
	public function setDetdissem($v)
	{

		if ($this->detdissem !== $v) {
			$this->detdissem = $v;
			$this->modifiedColumns[] = BndissemPeer::DETDISSEM;
		}

	} 
	
	public function setCodubiori($v)
	{

		if ($this->codubiori !== $v) {
			$this->codubiori = $v;
			$this->modifiedColumns[] = BndissemPeer::CODUBIORI;
		}

	} 
	
	public function setCodubides($v)
	{

		if ($this->codubides !== $v) {
			$this->codubides = $v;
			$this->modifiedColumns[] = BndissemPeer::CODUBIDES;
		}

	} 
	
	public function setObsdissem($v)
	{

		if ($this->obsdissem !== $v) {
			$this->obsdissem = $v;
			$this->modifiedColumns[] = BndissemPeer::OBSDISSEM;
		}

	} 
	
	public function setStadissem($v)
	{

		if ($this->stadissem !== $v) {
			$this->stadissem = $v;
			$this->modifiedColumns[] = BndissemPeer::STADISSEM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndissemPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->codsem = $rs->getString($startcol + 1);

			$this->nrodissem = $rs->getString($startcol + 2);

			$this->motdissem = $rs->getString($startcol + 3);

			$this->tipdissem = $rs->getString($startcol + 4);

			$this->fecdissem = $rs->getDate($startcol + 5, null);

			$this->fecdevdis = $rs->getDate($startcol + 6, null);

			$this->mondissem = $rs->getFloat($startcol + 7);

			$this->detdissem = $rs->getString($startcol + 8);

			$this->codubiori = $rs->getString($startcol + 9);

			$this->codubides = $rs->getString($startcol + 10);

			$this->obsdissem = $rs->getString($startcol + 11);

			$this->stadissem = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndissem object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndissemPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndissemPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndissemPeer::DATABASE_NAME);
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
					$pk = BndissemPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndissemPeer::doUpdate($this, $con);
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


			if (($retval = BndissemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndissemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodsem();
				break;
			case 2:
				return $this->getNrodissem();
				break;
			case 3:
				return $this->getMotdissem();
				break;
			case 4:
				return $this->getTipdissem();
				break;
			case 5:
				return $this->getFecdissem();
				break;
			case 6:
				return $this->getFecdevdis();
				break;
			case 7:
				return $this->getMondissem();
				break;
			case 8:
				return $this->getDetdissem();
				break;
			case 9:
				return $this->getCodubiori();
				break;
			case 10:
				return $this->getCodubides();
				break;
			case 11:
				return $this->getObsdissem();
				break;
			case 12:
				return $this->getStadissem();
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
		$keys = BndissemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodsem(),
			$keys[2] => $this->getNrodissem(),
			$keys[3] => $this->getMotdissem(),
			$keys[4] => $this->getTipdissem(),
			$keys[5] => $this->getFecdissem(),
			$keys[6] => $this->getFecdevdis(),
			$keys[7] => $this->getMondissem(),
			$keys[8] => $this->getDetdissem(),
			$keys[9] => $this->getCodubiori(),
			$keys[10] => $this->getCodubides(),
			$keys[11] => $this->getObsdissem(),
			$keys[12] => $this->getStadissem(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndissemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodsem($value);
				break;
			case 2:
				$this->setNrodissem($value);
				break;
			case 3:
				$this->setMotdissem($value);
				break;
			case 4:
				$this->setTipdissem($value);
				break;
			case 5:
				$this->setFecdissem($value);
				break;
			case 6:
				$this->setFecdevdis($value);
				break;
			case 7:
				$this->setMondissem($value);
				break;
			case 8:
				$this->setDetdissem($value);
				break;
			case 9:
				$this->setCodubiori($value);
				break;
			case 10:
				$this->setCodubides($value);
				break;
			case 11:
				$this->setObsdissem($value);
				break;
			case 12:
				$this->setStadissem($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndissemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsem($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrodissem($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMotdissem($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdissem($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecdissem($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecdevdis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondissem($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDetdissem($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodubiori($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodubides($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObsdissem($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStadissem($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndissemPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndissemPeer::CODACT)) $criteria->add(BndissemPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndissemPeer::CODSEM)) $criteria->add(BndissemPeer::CODSEM, $this->codsem);
		if ($this->isColumnModified(BndissemPeer::NRODISSEM)) $criteria->add(BndissemPeer::NRODISSEM, $this->nrodissem);
		if ($this->isColumnModified(BndissemPeer::MOTDISSEM)) $criteria->add(BndissemPeer::MOTDISSEM, $this->motdissem);
		if ($this->isColumnModified(BndissemPeer::TIPDISSEM)) $criteria->add(BndissemPeer::TIPDISSEM, $this->tipdissem);
		if ($this->isColumnModified(BndissemPeer::FECDISSEM)) $criteria->add(BndissemPeer::FECDISSEM, $this->fecdissem);
		if ($this->isColumnModified(BndissemPeer::FECDEVDIS)) $criteria->add(BndissemPeer::FECDEVDIS, $this->fecdevdis);
		if ($this->isColumnModified(BndissemPeer::MONDISSEM)) $criteria->add(BndissemPeer::MONDISSEM, $this->mondissem);
		if ($this->isColumnModified(BndissemPeer::DETDISSEM)) $criteria->add(BndissemPeer::DETDISSEM, $this->detdissem);
		if ($this->isColumnModified(BndissemPeer::CODUBIORI)) $criteria->add(BndissemPeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(BndissemPeer::CODUBIDES)) $criteria->add(BndissemPeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(BndissemPeer::OBSDISSEM)) $criteria->add(BndissemPeer::OBSDISSEM, $this->obsdissem);
		if ($this->isColumnModified(BndissemPeer::STADISSEM)) $criteria->add(BndissemPeer::STADISSEM, $this->stadissem);
		if ($this->isColumnModified(BndissemPeer::ID)) $criteria->add(BndissemPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndissemPeer::DATABASE_NAME);

		$criteria->add(BndissemPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodsem($this->codsem);

		$copyObj->setNrodissem($this->nrodissem);

		$copyObj->setMotdissem($this->motdissem);

		$copyObj->setTipdissem($this->tipdissem);

		$copyObj->setFecdissem($this->fecdissem);

		$copyObj->setFecdevdis($this->fecdevdis);

		$copyObj->setMondissem($this->mondissem);

		$copyObj->setDetdissem($this->detdissem);

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setCodubides($this->codubides);

		$copyObj->setObsdissem($this->obsdissem);

		$copyObj->setStadissem($this->stadissem);


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
			self::$peer = new BndissemPeer();
		}
		return self::$peer;
	}

} 