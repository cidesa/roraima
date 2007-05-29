<?php


abstract class BaseNpvacfra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $caudes;


	
	protected $cauhas;


	
	protected $diavac;


	
	protected $diabon;


	
	protected $monvac;


	
	protected $monbon;


	
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

	
	public function getDiavac()
	{

		return number_format($this->diavac,2,',','.');
		
	}
	
	public function getDiabon()
	{

		return number_format($this->diabon,2,',','.');
		
	}
	
	public function getMonvac()
	{

		return number_format($this->monvac,2,',','.');
		
	}
	
	public function getMonbon()
	{

		return number_format($this->monbon,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpvacfraPeer::CODEMP;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpvacfraPeer::CODCAR;
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
			$this->modifiedColumns[] = NpvacfraPeer::CAUDES;
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
			$this->modifiedColumns[] = NpvacfraPeer::CAUHAS;
		}

	} 
	
	public function setDiavac($v)
	{

		if ($this->diavac !== $v) {
			$this->diavac = $v;
			$this->modifiedColumns[] = NpvacfraPeer::DIAVAC;
		}

	} 
	
	public function setDiabon($v)
	{

		if ($this->diabon !== $v) {
			$this->diabon = $v;
			$this->modifiedColumns[] = NpvacfraPeer::DIABON;
		}

	} 
	
	public function setMonvac($v)
	{

		if ($this->monvac !== $v) {
			$this->monvac = $v;
			$this->modifiedColumns[] = NpvacfraPeer::MONVAC;
		}

	} 
	
	public function setMonbon($v)
	{

		if ($this->monbon !== $v) {
			$this->monbon = $v;
			$this->modifiedColumns[] = NpvacfraPeer::MONBON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpvacfraPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->codcar = $rs->getString($startcol + 1);

			$this->caudes = $rs->getDate($startcol + 2, null);

			$this->cauhas = $rs->getDate($startcol + 3, null);

			$this->diavac = $rs->getFloat($startcol + 4);

			$this->diabon = $rs->getFloat($startcol + 5);

			$this->monvac = $rs->getFloat($startcol + 6);

			$this->monbon = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npvacfra object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpvacfraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpvacfraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpvacfraPeer::DATABASE_NAME);
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
					$pk = NpvacfraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpvacfraPeer::doUpdate($this, $con);
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


			if (($retval = NpvacfraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacfraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDiavac();
				break;
			case 5:
				return $this->getDiabon();
				break;
			case 6:
				return $this->getMonvac();
				break;
			case 7:
				return $this->getMonbon();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacfraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCaudes(),
			$keys[3] => $this->getCauhas(),
			$keys[4] => $this->getDiavac(),
			$keys[5] => $this->getDiabon(),
			$keys[6] => $this->getMonvac(),
			$keys[7] => $this->getMonbon(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpvacfraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDiavac($value);
				break;
			case 5:
				$this->setDiabon($value);
				break;
			case 6:
				$this->setMonvac($value);
				break;
			case 7:
				$this->setMonbon($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpvacfraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCaudes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCauhas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDiavac($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiabon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonvac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonbon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpvacfraPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpvacfraPeer::CODEMP)) $criteria->add(NpvacfraPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpvacfraPeer::CODCAR)) $criteria->add(NpvacfraPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpvacfraPeer::CAUDES)) $criteria->add(NpvacfraPeer::CAUDES, $this->caudes);
		if ($this->isColumnModified(NpvacfraPeer::CAUHAS)) $criteria->add(NpvacfraPeer::CAUHAS, $this->cauhas);
		if ($this->isColumnModified(NpvacfraPeer::DIAVAC)) $criteria->add(NpvacfraPeer::DIAVAC, $this->diavac);
		if ($this->isColumnModified(NpvacfraPeer::DIABON)) $criteria->add(NpvacfraPeer::DIABON, $this->diabon);
		if ($this->isColumnModified(NpvacfraPeer::MONVAC)) $criteria->add(NpvacfraPeer::MONVAC, $this->monvac);
		if ($this->isColumnModified(NpvacfraPeer::MONBON)) $criteria->add(NpvacfraPeer::MONBON, $this->monbon);
		if ($this->isColumnModified(NpvacfraPeer::ID)) $criteria->add(NpvacfraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpvacfraPeer::DATABASE_NAME);

		$criteria->add(NpvacfraPeer::ID, $this->id);

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

		$copyObj->setDiavac($this->diavac);

		$copyObj->setDiabon($this->diabon);

		$copyObj->setMonvac($this->monvac);

		$copyObj->setMonbon($this->monbon);


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
			self::$peer = new NpvacfraPeer();
		}
		return self::$peer;
	}

} 