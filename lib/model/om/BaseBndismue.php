<?php


abstract class BaseBndismue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $nrodismue;


	
	protected $motdismue;


	
	protected $tipdismue;


	
	protected $fecdismue;


	
	protected $fecdevdis;


	
	protected $mondismue;


	
	protected $detdismue;


	
	protected $codubiori;


	
	protected $codubides;


	
	protected $obsdismue;


	
	protected $stadismue;


	
	protected $codmot;


	
	protected $vidutil;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodact()
	{

		return $this->codact; 		
	}
	
	public function getCodmue()
	{

		return $this->codmue; 		
	}
	
	public function getNrodismue()
	{

		return $this->nrodismue; 		
	}
	
	public function getMotdismue()
	{

		return $this->motdismue; 		
	}
	
	public function getTipdismue()
	{

		return $this->tipdismue; 		
	}
	
	public function getFecdismue($format = 'Y-m-d')
	{

		if ($this->fecdismue === null || $this->fecdismue === '') {
			return null;
		} elseif (!is_int($this->fecdismue)) {
						$ts = strtotime($this->fecdismue);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdismue] as date/time value: " . var_export($this->fecdismue, true));
			}
		} else {
			$ts = $this->fecdismue;
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

	
	public function getMondismue()
	{

		return number_format($this->mondismue,2,',','.');
		
	}
	
	public function getDetdismue()
	{

		return $this->detdismue; 		
	}
	
	public function getCodubiori()
	{

		return $this->codubiori; 		
	}
	
	public function getCodubides()
	{

		return $this->codubides; 		
	}
	
	public function getObsdismue()
	{

		return $this->obsdismue; 		
	}
	
	public function getStadismue()
	{

		return $this->stadismue; 		
	}
	
	public function getCodmot()
	{

		return $this->codmot; 		
	}
	
	public function getVidutil()
	{

		return number_format($this->vidutil,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BndismuePeer::CODACT;
		}

	} 
	
	public function setCodmue($v)
	{

		if ($this->codmue !== $v) {
			$this->codmue = $v;
			$this->modifiedColumns[] = BndismuePeer::CODMUE;
		}

	} 
	
	public function setNrodismue($v)
	{

		if ($this->nrodismue !== $v) {
			$this->nrodismue = $v;
			$this->modifiedColumns[] = BndismuePeer::NRODISMUE;
		}

	} 
	
	public function setMotdismue($v)
	{

		if ($this->motdismue !== $v) {
			$this->motdismue = $v;
			$this->modifiedColumns[] = BndismuePeer::MOTDISMUE;
		}

	} 
	
	public function setTipdismue($v)
	{

		if ($this->tipdismue !== $v) {
			$this->tipdismue = $v;
			$this->modifiedColumns[] = BndismuePeer::TIPDISMUE;
		}

	} 
	
	public function setFecdismue($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdismue] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdismue !== $ts) {
			$this->fecdismue = $ts;
			$this->modifiedColumns[] = BndismuePeer::FECDISMUE;
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
			$this->modifiedColumns[] = BndismuePeer::FECDEVDIS;
		}

	} 
	
	public function setMondismue($v)
	{

		if ($this->mondismue !== $v) {
			$this->mondismue = $v;
			$this->modifiedColumns[] = BndismuePeer::MONDISMUE;
		}

	} 
	
	public function setDetdismue($v)
	{

		if ($this->detdismue !== $v) {
			$this->detdismue = $v;
			$this->modifiedColumns[] = BndismuePeer::DETDISMUE;
		}

	} 
	
	public function setCodubiori($v)
	{

		if ($this->codubiori !== $v) {
			$this->codubiori = $v;
			$this->modifiedColumns[] = BndismuePeer::CODUBIORI;
		}

	} 
	
	public function setCodubides($v)
	{

		if ($this->codubides !== $v) {
			$this->codubides = $v;
			$this->modifiedColumns[] = BndismuePeer::CODUBIDES;
		}

	} 
	
	public function setObsdismue($v)
	{

		if ($this->obsdismue !== $v) {
			$this->obsdismue = $v;
			$this->modifiedColumns[] = BndismuePeer::OBSDISMUE;
		}

	} 
	
	public function setStadismue($v)
	{

		if ($this->stadismue !== $v) {
			$this->stadismue = $v;
			$this->modifiedColumns[] = BndismuePeer::STADISMUE;
		}

	} 
	
	public function setCodmot($v)
	{

		if ($this->codmot !== $v) {
			$this->codmot = $v;
			$this->modifiedColumns[] = BndismuePeer::CODMOT;
		}

	} 
	
	public function setVidutil($v)
	{

		if ($this->vidutil !== $v) {
			$this->vidutil = $v;
			$this->modifiedColumns[] = BndismuePeer::VIDUTIL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndismuePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->codmue = $rs->getString($startcol + 1);

			$this->nrodismue = $rs->getString($startcol + 2);

			$this->motdismue = $rs->getString($startcol + 3);

			$this->tipdismue = $rs->getString($startcol + 4);

			$this->fecdismue = $rs->getDate($startcol + 5, null);

			$this->fecdevdis = $rs->getDate($startcol + 6, null);

			$this->mondismue = $rs->getFloat($startcol + 7);

			$this->detdismue = $rs->getString($startcol + 8);

			$this->codubiori = $rs->getString($startcol + 9);

			$this->codubides = $rs->getString($startcol + 10);

			$this->obsdismue = $rs->getString($startcol + 11);

			$this->stadismue = $rs->getString($startcol + 12);

			$this->codmot = $rs->getString($startcol + 13);

			$this->vidutil = $rs->getFloat($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndismue object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndismuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndismuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndismuePeer::DATABASE_NAME);
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
					$pk = BndismuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndismuePeer::doUpdate($this, $con);
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


			if (($retval = BndismuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndismuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodmue();
				break;
			case 2:
				return $this->getNrodismue();
				break;
			case 3:
				return $this->getMotdismue();
				break;
			case 4:
				return $this->getTipdismue();
				break;
			case 5:
				return $this->getFecdismue();
				break;
			case 6:
				return $this->getFecdevdis();
				break;
			case 7:
				return $this->getMondismue();
				break;
			case 8:
				return $this->getDetdismue();
				break;
			case 9:
				return $this->getCodubiori();
				break;
			case 10:
				return $this->getCodubides();
				break;
			case 11:
				return $this->getObsdismue();
				break;
			case 12:
				return $this->getStadismue();
				break;
			case 13:
				return $this->getCodmot();
				break;
			case 14:
				return $this->getVidutil();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndismuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getNrodismue(),
			$keys[3] => $this->getMotdismue(),
			$keys[4] => $this->getTipdismue(),
			$keys[5] => $this->getFecdismue(),
			$keys[6] => $this->getFecdevdis(),
			$keys[7] => $this->getMondismue(),
			$keys[8] => $this->getDetdismue(),
			$keys[9] => $this->getCodubiori(),
			$keys[10] => $this->getCodubides(),
			$keys[11] => $this->getObsdismue(),
			$keys[12] => $this->getStadismue(),
			$keys[13] => $this->getCodmot(),
			$keys[14] => $this->getVidutil(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndismuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodmue($value);
				break;
			case 2:
				$this->setNrodismue($value);
				break;
			case 3:
				$this->setMotdismue($value);
				break;
			case 4:
				$this->setTipdismue($value);
				break;
			case 5:
				$this->setFecdismue($value);
				break;
			case 6:
				$this->setFecdevdis($value);
				break;
			case 7:
				$this->setMondismue($value);
				break;
			case 8:
				$this->setDetdismue($value);
				break;
			case 9:
				$this->setCodubiori($value);
				break;
			case 10:
				$this->setCodubides($value);
				break;
			case 11:
				$this->setObsdismue($value);
				break;
			case 12:
				$this->setStadismue($value);
				break;
			case 13:
				$this->setCodmot($value);
				break;
			case 14:
				$this->setVidutil($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndismuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNrodismue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMotdismue($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdismue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecdismue($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecdevdis($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondismue($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDetdismue($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodubiori($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodubides($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObsdismue($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStadismue($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodmot($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setVidutil($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndismuePeer::DATABASE_NAME);

		if ($this->isColumnModified(BndismuePeer::CODACT)) $criteria->add(BndismuePeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndismuePeer::CODMUE)) $criteria->add(BndismuePeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BndismuePeer::NRODISMUE)) $criteria->add(BndismuePeer::NRODISMUE, $this->nrodismue);
		if ($this->isColumnModified(BndismuePeer::MOTDISMUE)) $criteria->add(BndismuePeer::MOTDISMUE, $this->motdismue);
		if ($this->isColumnModified(BndismuePeer::TIPDISMUE)) $criteria->add(BndismuePeer::TIPDISMUE, $this->tipdismue);
		if ($this->isColumnModified(BndismuePeer::FECDISMUE)) $criteria->add(BndismuePeer::FECDISMUE, $this->fecdismue);
		if ($this->isColumnModified(BndismuePeer::FECDEVDIS)) $criteria->add(BndismuePeer::FECDEVDIS, $this->fecdevdis);
		if ($this->isColumnModified(BndismuePeer::MONDISMUE)) $criteria->add(BndismuePeer::MONDISMUE, $this->mondismue);
		if ($this->isColumnModified(BndismuePeer::DETDISMUE)) $criteria->add(BndismuePeer::DETDISMUE, $this->detdismue);
		if ($this->isColumnModified(BndismuePeer::CODUBIORI)) $criteria->add(BndismuePeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(BndismuePeer::CODUBIDES)) $criteria->add(BndismuePeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(BndismuePeer::OBSDISMUE)) $criteria->add(BndismuePeer::OBSDISMUE, $this->obsdismue);
		if ($this->isColumnModified(BndismuePeer::STADISMUE)) $criteria->add(BndismuePeer::STADISMUE, $this->stadismue);
		if ($this->isColumnModified(BndismuePeer::CODMOT)) $criteria->add(BndismuePeer::CODMOT, $this->codmot);
		if ($this->isColumnModified(BndismuePeer::VIDUTIL)) $criteria->add(BndismuePeer::VIDUTIL, $this->vidutil);
		if ($this->isColumnModified(BndismuePeer::ID)) $criteria->add(BndismuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndismuePeer::DATABASE_NAME);

		$criteria->add(BndismuePeer::ID, $this->id);

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

		$copyObj->setCodmue($this->codmue);

		$copyObj->setNrodismue($this->nrodismue);

		$copyObj->setMotdismue($this->motdismue);

		$copyObj->setTipdismue($this->tipdismue);

		$copyObj->setFecdismue($this->fecdismue);

		$copyObj->setFecdevdis($this->fecdevdis);

		$copyObj->setMondismue($this->mondismue);

		$copyObj->setDetdismue($this->detdismue);

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setCodubides($this->codubides);

		$copyObj->setObsdismue($this->obsdismue);

		$copyObj->setStadismue($this->stadismue);

		$copyObj->setCodmot($this->codmot);

		$copyObj->setVidutil($this->vidutil);


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
			self::$peer = new BndismuePeer();
		}
		return self::$peer;
	}

} 