<?php


abstract class BaseNpempvac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $caudes;


	
	protected $cauhas;


	
	protected $feccom;


	
	protected $fecfin;


	
	protected $fecreg;


	
	protected $bonvac;


	
	protected $vacaci;


	
	protected $monpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
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

	
	public function getFeccom($format = 'Y-m-d')
	{

		if ($this->feccom === null || $this->feccom === '') {
			return null;
		} elseif (!is_int($this->feccom)) {
						$ts = strtotime($this->feccom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
			}
		} else {
			$ts = $this->feccom;
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

	
	public function getBonvac()
	{

		return number_format($this->bonvac,2,',','.');
		
	}
	
	public function getVacaci()
	{

		return number_format($this->vacaci,2,',','.');
		
	}
	
	public function getMonpag()
	{

		return number_format($this->monpag,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpempvacPeer::CODEMP;
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
			$this->modifiedColumns[] = NpempvacPeer::CAUDES;
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
			$this->modifiedColumns[] = NpempvacPeer::CAUHAS;
		}

	} 
	
	public function setFeccom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccom !== $ts) {
			$this->feccom = $ts;
			$this->modifiedColumns[] = NpempvacPeer::FECCOM;
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
			$this->modifiedColumns[] = NpempvacPeer::FECFIN;
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
			$this->modifiedColumns[] = NpempvacPeer::FECREG;
		}

	} 
	
	public function setBonvac($v)
	{

		if ($this->bonvac !== $v) {
			$this->bonvac = $v;
			$this->modifiedColumns[] = NpempvacPeer::BONVAC;
		}

	} 
	
	public function setVacaci($v)
	{

		if ($this->vacaci !== $v) {
			$this->vacaci = $v;
			$this->modifiedColumns[] = NpempvacPeer::VACACI;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = NpempvacPeer::MONPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpempvacPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->caudes = $rs->getDate($startcol + 1, null);

			$this->cauhas = $rs->getDate($startcol + 2, null);

			$this->feccom = $rs->getDate($startcol + 3, null);

			$this->fecfin = $rs->getDate($startcol + 4, null);

			$this->fecreg = $rs->getDate($startcol + 5, null);

			$this->bonvac = $rs->getFloat($startcol + 6);

			$this->vacaci = $rs->getFloat($startcol + 7);

			$this->monpag = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npempvac object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpempvacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpempvacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpempvacPeer::DATABASE_NAME);
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
					$pk = NpempvacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpempvacPeer::doUpdate($this, $con);
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


			if (($retval = NpempvacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpempvacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCaudes();
				break;
			case 2:
				return $this->getCauhas();
				break;
			case 3:
				return $this->getFeccom();
				break;
			case 4:
				return $this->getFecfin();
				break;
			case 5:
				return $this->getFecreg();
				break;
			case 6:
				return $this->getBonvac();
				break;
			case 7:
				return $this->getVacaci();
				break;
			case 8:
				return $this->getMonpag();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpempvacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCaudes(),
			$keys[2] => $this->getCauhas(),
			$keys[3] => $this->getFeccom(),
			$keys[4] => $this->getFecfin(),
			$keys[5] => $this->getFecreg(),
			$keys[6] => $this->getBonvac(),
			$keys[7] => $this->getVacaci(),
			$keys[8] => $this->getMonpag(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpempvacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCaudes($value);
				break;
			case 2:
				$this->setCauhas($value);
				break;
			case 3:
				$this->setFeccom($value);
				break;
			case 4:
				$this->setFecfin($value);
				break;
			case 5:
				$this->setFecreg($value);
				break;
			case 6:
				$this->setBonvac($value);
				break;
			case 7:
				$this->setVacaci($value);
				break;
			case 8:
				$this->setMonpag($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpempvacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCaudes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCauhas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecreg($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBonvac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVacaci($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonpag($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpempvacPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpempvacPeer::CODEMP)) $criteria->add(NpempvacPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpempvacPeer::CAUDES)) $criteria->add(NpempvacPeer::CAUDES, $this->caudes);
		if ($this->isColumnModified(NpempvacPeer::CAUHAS)) $criteria->add(NpempvacPeer::CAUHAS, $this->cauhas);
		if ($this->isColumnModified(NpempvacPeer::FECCOM)) $criteria->add(NpempvacPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(NpempvacPeer::FECFIN)) $criteria->add(NpempvacPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpempvacPeer::FECREG)) $criteria->add(NpempvacPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(NpempvacPeer::BONVAC)) $criteria->add(NpempvacPeer::BONVAC, $this->bonvac);
		if ($this->isColumnModified(NpempvacPeer::VACACI)) $criteria->add(NpempvacPeer::VACACI, $this->vacaci);
		if ($this->isColumnModified(NpempvacPeer::MONPAG)) $criteria->add(NpempvacPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(NpempvacPeer::ID)) $criteria->add(NpempvacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpempvacPeer::DATABASE_NAME);

		$criteria->add(NpempvacPeer::ID, $this->id);

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

		$copyObj->setCaudes($this->caudes);

		$copyObj->setCauhas($this->cauhas);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setBonvac($this->bonvac);

		$copyObj->setVacaci($this->vacaci);

		$copyObj->setMonpag($this->monpag);


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
			self::$peer = new NpempvacPeer();
		}
		return self::$peer;
	}

} 