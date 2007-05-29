<?php


abstract class BaseBnseginm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $nroseginm;


	
	protected $fecseginm;


	
	protected $nomseginm;


	
	protected $cobseginm;


	
	protected $monseginm;


	
	protected $fecsegven;


	
	protected $proseginm;


	
	protected $obsseginm;


	
	protected $staseginm;


	
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
	
	public function getNroseginm()
	{

		return $this->nroseginm; 		
	}
	
	public function getFecseginm($format = 'Y-m-d')
	{

		if ($this->fecseginm === null || $this->fecseginm === '') {
			return null;
		} elseif (!is_int($this->fecseginm)) {
						$ts = strtotime($this->fecseginm);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecseginm] as date/time value: " . var_export($this->fecseginm, true));
			}
		} else {
			$ts = $this->fecseginm;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNomseginm()
	{

		return $this->nomseginm; 		
	}
	
	public function getCobseginm()
	{

		return $this->cobseginm; 		
	}
	
	public function getMonseginm()
	{

		return number_format($this->monseginm,2,',','.');
		
	}
	
	public function getFecsegven($format = 'Y-m-d')
	{

		if ($this->fecsegven === null || $this->fecsegven === '') {
			return null;
		} elseif (!is_int($this->fecsegven)) {
						$ts = strtotime($this->fecsegven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsegven] as date/time value: " . var_export($this->fecsegven, true));
			}
		} else {
			$ts = $this->fecsegven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getProseginm()
	{

		return $this->proseginm; 		
	}
	
	public function getObsseginm()
	{

		return $this->obsseginm; 		
	}
	
	public function getStaseginm()
	{

		return $this->staseginm; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BnseginmPeer::CODACT;
		}

	} 
	
	public function setCodmue($v)
	{

		if ($this->codmue !== $v) {
			$this->codmue = $v;
			$this->modifiedColumns[] = BnseginmPeer::CODMUE;
		}

	} 
	
	public function setNroseginm($v)
	{

		if ($this->nroseginm !== $v) {
			$this->nroseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::NROSEGINM;
		}

	} 
	
	public function setFecseginm($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecseginm] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecseginm !== $ts) {
			$this->fecseginm = $ts;
			$this->modifiedColumns[] = BnseginmPeer::FECSEGINM;
		}

	} 
	
	public function setNomseginm($v)
	{

		if ($this->nomseginm !== $v) {
			$this->nomseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::NOMSEGINM;
		}

	} 
	
	public function setCobseginm($v)
	{

		if ($this->cobseginm !== $v) {
			$this->cobseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::COBSEGINM;
		}

	} 
	
	public function setMonseginm($v)
	{

		if ($this->monseginm !== $v) {
			$this->monseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::MONSEGINM;
		}

	} 
	
	public function setFecsegven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsegven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsegven !== $ts) {
			$this->fecsegven = $ts;
			$this->modifiedColumns[] = BnseginmPeer::FECSEGVEN;
		}

	} 
	
	public function setProseginm($v)
	{

		if ($this->proseginm !== $v) {
			$this->proseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::PROSEGINM;
		}

	} 
	
	public function setObsseginm($v)
	{

		if ($this->obsseginm !== $v) {
			$this->obsseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::OBSSEGINM;
		}

	} 
	
	public function setStaseginm($v)
	{

		if ($this->staseginm !== $v) {
			$this->staseginm = $v;
			$this->modifiedColumns[] = BnseginmPeer::STASEGINM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BnseginmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->codmue = $rs->getString($startcol + 1);

			$this->nroseginm = $rs->getString($startcol + 2);

			$this->fecseginm = $rs->getDate($startcol + 3, null);

			$this->nomseginm = $rs->getString($startcol + 4);

			$this->cobseginm = $rs->getString($startcol + 5);

			$this->monseginm = $rs->getFloat($startcol + 6);

			$this->fecsegven = $rs->getDate($startcol + 7, null);

			$this->proseginm = $rs->getString($startcol + 8);

			$this->obsseginm = $rs->getString($startcol + 9);

			$this->staseginm = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bnseginm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BnseginmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnseginmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnseginmPeer::DATABASE_NAME);
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
					$pk = BnseginmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BnseginmPeer::doUpdate($this, $con);
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


			if (($retval = BnseginmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnseginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNroseginm();
				break;
			case 3:
				return $this->getFecseginm();
				break;
			case 4:
				return $this->getNomseginm();
				break;
			case 5:
				return $this->getCobseginm();
				break;
			case 6:
				return $this->getMonseginm();
				break;
			case 7:
				return $this->getFecsegven();
				break;
			case 8:
				return $this->getProseginm();
				break;
			case 9:
				return $this->getObsseginm();
				break;
			case 10:
				return $this->getStaseginm();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnseginmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getNroseginm(),
			$keys[3] => $this->getFecseginm(),
			$keys[4] => $this->getNomseginm(),
			$keys[5] => $this->getCobseginm(),
			$keys[6] => $this->getMonseginm(),
			$keys[7] => $this->getFecsegven(),
			$keys[8] => $this->getProseginm(),
			$keys[9] => $this->getObsseginm(),
			$keys[10] => $this->getStaseginm(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnseginmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNroseginm($value);
				break;
			case 3:
				$this->setFecseginm($value);
				break;
			case 4:
				$this->setNomseginm($value);
				break;
			case 5:
				$this->setCobseginm($value);
				break;
			case 6:
				$this->setMonseginm($value);
				break;
			case 7:
				$this->setFecsegven($value);
				break;
			case 8:
				$this->setProseginm($value);
				break;
			case 9:
				$this->setObsseginm($value);
				break;
			case 10:
				$this->setStaseginm($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnseginmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNroseginm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecseginm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomseginm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCobseginm($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonseginm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecsegven($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setProseginm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObsseginm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaseginm($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnseginmPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnseginmPeer::CODACT)) $criteria->add(BnseginmPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnseginmPeer::CODMUE)) $criteria->add(BnseginmPeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BnseginmPeer::NROSEGINM)) $criteria->add(BnseginmPeer::NROSEGINM, $this->nroseginm);
		if ($this->isColumnModified(BnseginmPeer::FECSEGINM)) $criteria->add(BnseginmPeer::FECSEGINM, $this->fecseginm);
		if ($this->isColumnModified(BnseginmPeer::NOMSEGINM)) $criteria->add(BnseginmPeer::NOMSEGINM, $this->nomseginm);
		if ($this->isColumnModified(BnseginmPeer::COBSEGINM)) $criteria->add(BnseginmPeer::COBSEGINM, $this->cobseginm);
		if ($this->isColumnModified(BnseginmPeer::MONSEGINM)) $criteria->add(BnseginmPeer::MONSEGINM, $this->monseginm);
		if ($this->isColumnModified(BnseginmPeer::FECSEGVEN)) $criteria->add(BnseginmPeer::FECSEGVEN, $this->fecsegven);
		if ($this->isColumnModified(BnseginmPeer::PROSEGINM)) $criteria->add(BnseginmPeer::PROSEGINM, $this->proseginm);
		if ($this->isColumnModified(BnseginmPeer::OBSSEGINM)) $criteria->add(BnseginmPeer::OBSSEGINM, $this->obsseginm);
		if ($this->isColumnModified(BnseginmPeer::STASEGINM)) $criteria->add(BnseginmPeer::STASEGINM, $this->staseginm);
		if ($this->isColumnModified(BnseginmPeer::ID)) $criteria->add(BnseginmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnseginmPeer::DATABASE_NAME);

		$criteria->add(BnseginmPeer::ID, $this->id);

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

		$copyObj->setNroseginm($this->nroseginm);

		$copyObj->setFecseginm($this->fecseginm);

		$copyObj->setNomseginm($this->nomseginm);

		$copyObj->setCobseginm($this->cobseginm);

		$copyObj->setMonseginm($this->monseginm);

		$copyObj->setFecsegven($this->fecsegven);

		$copyObj->setProseginm($this->proseginm);

		$copyObj->setObsseginm($this->obsseginm);

		$copyObj->setStaseginm($this->staseginm);


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
			self::$peer = new BnseginmPeer();
		}
		return self::$peer;
	}

} 