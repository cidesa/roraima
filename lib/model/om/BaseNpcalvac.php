<?php


abstract class BaseNpcalvac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $caudes;


	
	protected $cauhas;


	
	protected $disdes;


	
	protected $dishas;


	
	protected $fecrei;


	
	protected $fecreg;


	
	protected $diavac;


	
	protected $dianhab;


	
	protected $diaant;


	
	protected $diapag;


	
	protected $diadis;


	
	protected $diabon;


	
	protected $monvac;


	
	protected $monbon;


	
	protected $status;


	
	protected $stapag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getCaudes($format = 'Y-m-d')
	{

		if ($this->caudes === null || $this->caudes === '') {
			return null;
		} elseif (!is_int($this->caudes)) {
						$ts = strtotime($this->caudes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [caudes] as date/time value: " . var_export($this->caudes, true));
			}
		} else {
			$ts = $this->caudes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCauhas($format = 'Y-m-d')
	{

		if ($this->cauhas === null || $this->cauhas === '') {
			return null;
		} elseif (!is_int($this->cauhas)) {
						$ts = strtotime($this->cauhas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [cauhas] as date/time value: " . var_export($this->cauhas, true));
			}
		} else {
			$ts = $this->cauhas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDisdes($format = 'Y-m-d')
	{

		if ($this->disdes === null || $this->disdes === '') {
			return null;
		} elseif (!is_int($this->disdes)) {
						$ts = strtotime($this->disdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [disdes] as date/time value: " . var_export($this->disdes, true));
			}
		} else {
			$ts = $this->disdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDishas($format = 'Y-m-d')
	{

		if ($this->dishas === null || $this->dishas === '') {
			return null;
		} elseif (!is_int($this->dishas)) {
						$ts = strtotime($this->dishas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [dishas] as date/time value: " . var_export($this->dishas, true));
			}
		} else {
			$ts = $this->dishas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecrei($format = 'Y-m-d')
	{

		if ($this->fecrei === null || $this->fecrei === '') {
			return null;
		} elseif (!is_int($this->fecrei)) {
						$ts = strtotime($this->fecrei);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrei] as date/time value: " . var_export($this->fecrei, true));
			}
		} else {
			$ts = $this->fecrei;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
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

	
	public function getDiavac()
	{

		return $this->diavac;
	}

	
	public function getDianhab()
	{

		return $this->dianhab;
	}

	
	public function getDiaant()
	{

		return $this->diaant;
	}

	
	public function getDiapag()
	{

		return $this->diapag;
	}

	
	public function getDiadis()
	{

		return $this->diadis;
	}

	
	public function getDiabon()
	{

		return $this->diabon;
	}

	
	public function getMonvac()
	{

		return $this->monvac;
	}

	
	public function getMonbon()
	{

		return $this->monbon;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getStapag()
	{

		return $this->stapag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpcalvacPeer::CODEMP;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpcalvacPeer::CODCAR;
		}

	} 
	
	public function setCaudes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [caudes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->caudes !== $ts) {
			$this->caudes = $ts;
			$this->modifiedColumns[] = NpcalvacPeer::CAUDES;
		}

	} 
	
	public function setCauhas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [cauhas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->cauhas !== $ts) {
			$this->cauhas = $ts;
			$this->modifiedColumns[] = NpcalvacPeer::CAUHAS;
		}

	} 
	
	public function setDisdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [disdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->disdes !== $ts) {
			$this->disdes = $ts;
			$this->modifiedColumns[] = NpcalvacPeer::DISDES;
		}

	} 
	
	public function setDishas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [dishas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->dishas !== $ts) {
			$this->dishas = $ts;
			$this->modifiedColumns[] = NpcalvacPeer::DISHAS;
		}

	} 
	
	public function setFecrei($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrei] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrei !== $ts) {
			$this->fecrei = $ts;
			$this->modifiedColumns[] = NpcalvacPeer::FECREI;
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
			$this->modifiedColumns[] = NpcalvacPeer::FECREG;
		}

	} 
	
	public function setDiavac($v)
	{

		if ($this->diavac !== $v) {
			$this->diavac = $v;
			$this->modifiedColumns[] = NpcalvacPeer::DIAVAC;
		}

	} 
	
	public function setDianhab($v)
	{

		if ($this->dianhab !== $v) {
			$this->dianhab = $v;
			$this->modifiedColumns[] = NpcalvacPeer::DIANHAB;
		}

	} 
	
	public function setDiaant($v)
	{

		if ($this->diaant !== $v) {
			$this->diaant = $v;
			$this->modifiedColumns[] = NpcalvacPeer::DIAANT;
		}

	} 
	
	public function setDiapag($v)
	{

		if ($this->diapag !== $v) {
			$this->diapag = $v;
			$this->modifiedColumns[] = NpcalvacPeer::DIAPAG;
		}

	} 
	
	public function setDiadis($v)
	{

		if ($this->diadis !== $v) {
			$this->diadis = $v;
			$this->modifiedColumns[] = NpcalvacPeer::DIADIS;
		}

	} 
	
	public function setDiabon($v)
	{

		if ($this->diabon !== $v) {
			$this->diabon = $v;
			$this->modifiedColumns[] = NpcalvacPeer::DIABON;
		}

	} 
	
	public function setMonvac($v)
	{

		if ($this->monvac !== $v) {
			$this->monvac = $v;
			$this->modifiedColumns[] = NpcalvacPeer::MONVAC;
		}

	} 
	
	public function setMonbon($v)
	{

		if ($this->monbon !== $v) {
			$this->monbon = $v;
			$this->modifiedColumns[] = NpcalvacPeer::MONBON;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = NpcalvacPeer::STATUS;
		}

	} 
	
	public function setStapag($v)
	{

		if ($this->stapag !== $v) {
			$this->stapag = $v;
			$this->modifiedColumns[] = NpcalvacPeer::STAPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcalvacPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codcar = $rs->getString($startcol + 1);

			$this->caudes = $rs->getDate($startcol + 2, null);

			$this->cauhas = $rs->getDate($startcol + 3, null);

			$this->disdes = $rs->getDate($startcol + 4, null);

			$this->dishas = $rs->getDate($startcol + 5, null);

			$this->fecrei = $rs->getDate($startcol + 6, null);

			$this->fecreg = $rs->getDate($startcol + 7, null);

			$this->diavac = $rs->getFloat($startcol + 8);

			$this->dianhab = $rs->getFloat($startcol + 9);

			$this->diaant = $rs->getFloat($startcol + 10);

			$this->diapag = $rs->getFloat($startcol + 11);

			$this->diadis = $rs->getFloat($startcol + 12);

			$this->diabon = $rs->getFloat($startcol + 13);

			$this->monvac = $rs->getFloat($startcol + 14);

			$this->monbon = $rs->getFloat($startcol + 15);

			$this->status = $rs->getString($startcol + 16);

			$this->stapag = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcalvac object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcalvacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcalvacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcalvacPeer::DATABASE_NAME);
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
					$pk = NpcalvacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcalvacPeer::doUpdate($this, $con);
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


			if (($retval = NpcalvacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalvacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCaudes();
				break;
			case 3:
				return $this->getCauhas();
				break;
			case 4:
				return $this->getDisdes();
				break;
			case 5:
				return $this->getDishas();
				break;
			case 6:
				return $this->getFecrei();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getDiavac();
				break;
			case 9:
				return $this->getDianhab();
				break;
			case 10:
				return $this->getDiaant();
				break;
			case 11:
				return $this->getDiapag();
				break;
			case 12:
				return $this->getDiadis();
				break;
			case 13:
				return $this->getDiabon();
				break;
			case 14:
				return $this->getMonvac();
				break;
			case 15:
				return $this->getMonbon();
				break;
			case 16:
				return $this->getStatus();
				break;
			case 17:
				return $this->getStapag();
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
		$keys = NpcalvacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCaudes(),
			$keys[3] => $this->getCauhas(),
			$keys[4] => $this->getDisdes(),
			$keys[5] => $this->getDishas(),
			$keys[6] => $this->getFecrei(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDiavac(),
			$keys[9] => $this->getDianhab(),
			$keys[10] => $this->getDiaant(),
			$keys[11] => $this->getDiapag(),
			$keys[12] => $this->getDiadis(),
			$keys[13] => $this->getDiabon(),
			$keys[14] => $this->getMonvac(),
			$keys[15] => $this->getMonbon(),
			$keys[16] => $this->getStatus(),
			$keys[17] => $this->getStapag(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalvacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCaudes($value);
				break;
			case 3:
				$this->setCauhas($value);
				break;
			case 4:
				$this->setDisdes($value);
				break;
			case 5:
				$this->setDishas($value);
				break;
			case 6:
				$this->setFecrei($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setDiavac($value);
				break;
			case 9:
				$this->setDianhab($value);
				break;
			case 10:
				$this->setDiaant($value);
				break;
			case 11:
				$this->setDiapag($value);
				break;
			case 12:
				$this->setDiadis($value);
				break;
			case 13:
				$this->setDiabon($value);
				break;
			case 14:
				$this->setMonvac($value);
				break;
			case 15:
				$this->setMonbon($value);
				break;
			case 16:
				$this->setStatus($value);
				break;
			case 17:
				$this->setStapag($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcalvacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCaudes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCauhas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDisdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDishas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecrei($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDiavac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDianhab($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDiaant($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDiapag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDiadis($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDiabon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMonvac($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMonbon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setStatus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStapag($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcalvacPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcalvacPeer::CODEMP)) $criteria->add(NpcalvacPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpcalvacPeer::CODCAR)) $criteria->add(NpcalvacPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpcalvacPeer::CAUDES)) $criteria->add(NpcalvacPeer::CAUDES, $this->caudes);
		if ($this->isColumnModified(NpcalvacPeer::CAUHAS)) $criteria->add(NpcalvacPeer::CAUHAS, $this->cauhas);
		if ($this->isColumnModified(NpcalvacPeer::DISDES)) $criteria->add(NpcalvacPeer::DISDES, $this->disdes);
		if ($this->isColumnModified(NpcalvacPeer::DISHAS)) $criteria->add(NpcalvacPeer::DISHAS, $this->dishas);
		if ($this->isColumnModified(NpcalvacPeer::FECREI)) $criteria->add(NpcalvacPeer::FECREI, $this->fecrei);
		if ($this->isColumnModified(NpcalvacPeer::FECREG)) $criteria->add(NpcalvacPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(NpcalvacPeer::DIAVAC)) $criteria->add(NpcalvacPeer::DIAVAC, $this->diavac);
		if ($this->isColumnModified(NpcalvacPeer::DIANHAB)) $criteria->add(NpcalvacPeer::DIANHAB, $this->dianhab);
		if ($this->isColumnModified(NpcalvacPeer::DIAANT)) $criteria->add(NpcalvacPeer::DIAANT, $this->diaant);
		if ($this->isColumnModified(NpcalvacPeer::DIAPAG)) $criteria->add(NpcalvacPeer::DIAPAG, $this->diapag);
		if ($this->isColumnModified(NpcalvacPeer::DIADIS)) $criteria->add(NpcalvacPeer::DIADIS, $this->diadis);
		if ($this->isColumnModified(NpcalvacPeer::DIABON)) $criteria->add(NpcalvacPeer::DIABON, $this->diabon);
		if ($this->isColumnModified(NpcalvacPeer::MONVAC)) $criteria->add(NpcalvacPeer::MONVAC, $this->monvac);
		if ($this->isColumnModified(NpcalvacPeer::MONBON)) $criteria->add(NpcalvacPeer::MONBON, $this->monbon);
		if ($this->isColumnModified(NpcalvacPeer::STATUS)) $criteria->add(NpcalvacPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpcalvacPeer::STAPAG)) $criteria->add(NpcalvacPeer::STAPAG, $this->stapag);
		if ($this->isColumnModified(NpcalvacPeer::ID)) $criteria->add(NpcalvacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcalvacPeer::DATABASE_NAME);

		$criteria->add(NpcalvacPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCaudes($this->caudes);

		$copyObj->setCauhas($this->cauhas);

		$copyObj->setDisdes($this->disdes);

		$copyObj->setDishas($this->dishas);

		$copyObj->setFecrei($this->fecrei);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDiavac($this->diavac);

		$copyObj->setDianhab($this->dianhab);

		$copyObj->setDiaant($this->diaant);

		$copyObj->setDiapag($this->diapag);

		$copyObj->setDiadis($this->diadis);

		$copyObj->setDiabon($this->diabon);

		$copyObj->setMonvac($this->monvac);

		$copyObj->setMonbon($this->monbon);

		$copyObj->setStatus($this->status);

		$copyObj->setStapag($this->stapag);


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
			self::$peer = new NpcalvacPeer();
		}
		return self::$peer;
	}

} 