<?php


abstract class BaseCppereje extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecini;


	
	protected $feccie;


	
	protected $pereje;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $estper;


	
	protected $cerrado;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

	
	public function getFeccie($format = 'Y-m-d')
	{

		if ($this->feccie === null || $this->feccie === '') {
			return null;
		} elseif (!is_int($this->feccie)) {
						$ts = strtotime($this->feccie);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
			}
		} else {
			$ts = $this->feccie;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getPereje()
	{

		return $this->pereje;
	}

	
	public function getFecdes($format = 'Y-m-d')
	{

		if ($this->fecdes === null || $this->fecdes === '') {
			return null;
		} elseif (!is_int($this->fecdes)) {
						$ts = strtotime($this->fecdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
			}
		} else {
			$ts = $this->fecdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFechas($format = 'Y-m-d')
	{

		if ($this->fechas === null || $this->fechas === '') {
			return null;
		} elseif (!is_int($this->fechas)) {
						$ts = strtotime($this->fechas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
			}
		} else {
			$ts = $this->fechas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEstper()
	{

		return $this->estper;
	}

	
	public function getCerrado()
	{

		return $this->cerrado;
	}

	
	public function getId()
	{

		return $this->id;
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
			$this->modifiedColumns[] = CpperejePeer::FECINI;
		}

	} 
	
	public function setFeccie($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccie !== $ts) {
			$this->feccie = $ts;
			$this->modifiedColumns[] = CpperejePeer::FECCIE;
		}

	} 
	
	public function setPereje($v)
	{

		if ($this->pereje !== $v) {
			$this->pereje = $v;
			$this->modifiedColumns[] = CpperejePeer::PEREJE;
		}

	} 
	
	public function setFecdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdes !== $ts) {
			$this->fecdes = $ts;
			$this->modifiedColumns[] = CpperejePeer::FECDES;
		}

	} 
	
	public function setFechas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fechas !== $ts) {
			$this->fechas = $ts;
			$this->modifiedColumns[] = CpperejePeer::FECHAS;
		}

	} 
	
	public function setEstper($v)
	{

		if ($this->estper !== $v) {
			$this->estper = $v;
			$this->modifiedColumns[] = CpperejePeer::ESTPER;
		}

	} 
	
	public function setCerrado($v)
	{

		if ($this->cerrado !== $v) {
			$this->cerrado = $v;
			$this->modifiedColumns[] = CpperejePeer::CERRADO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpperejePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fecini = $rs->getDate($startcol + 0, null);

			$this->feccie = $rs->getDate($startcol + 1, null);

			$this->pereje = $rs->getString($startcol + 2);

			$this->fecdes = $rs->getDate($startcol + 3, null);

			$this->fechas = $rs->getDate($startcol + 4, null);

			$this->estper = $rs->getString($startcol + 5);

			$this->cerrado = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cppereje object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpperejePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpperejePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpperejePeer::DATABASE_NAME);
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
					$pk = CpperejePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpperejePeer::doUpdate($this, $con);
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


			if (($retval = CpperejePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpperejePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecini();
				break;
			case 1:
				return $this->getFeccie();
				break;
			case 2:
				return $this->getPereje();
				break;
			case 3:
				return $this->getFecdes();
				break;
			case 4:
				return $this->getFechas();
				break;
			case 5:
				return $this->getEstper();
				break;
			case 6:
				return $this->getCerrado();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpperejePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecini(),
			$keys[1] => $this->getFeccie(),
			$keys[2] => $this->getPereje(),
			$keys[3] => $this->getFecdes(),
			$keys[4] => $this->getFechas(),
			$keys[5] => $this->getEstper(),
			$keys[6] => $this->getCerrado(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpperejePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecini($value);
				break;
			case 1:
				$this->setFeccie($value);
				break;
			case 2:
				$this->setPereje($value);
				break;
			case 3:
				$this->setFecdes($value);
				break;
			case 4:
				$this->setFechas($value);
				break;
			case 5:
				$this->setEstper($value);
				break;
			case 6:
				$this->setCerrado($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpperejePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecini($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPereje($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFechas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEstper($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCerrado($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpperejePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpperejePeer::FECINI)) $criteria->add(CpperejePeer::FECINI, $this->fecini);
		if ($this->isColumnModified(CpperejePeer::FECCIE)) $criteria->add(CpperejePeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(CpperejePeer::PEREJE)) $criteria->add(CpperejePeer::PEREJE, $this->pereje);
		if ($this->isColumnModified(CpperejePeer::FECDES)) $criteria->add(CpperejePeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(CpperejePeer::FECHAS)) $criteria->add(CpperejePeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(CpperejePeer::ESTPER)) $criteria->add(CpperejePeer::ESTPER, $this->estper);
		if ($this->isColumnModified(CpperejePeer::CERRADO)) $criteria->add(CpperejePeer::CERRADO, $this->cerrado);
		if ($this->isColumnModified(CpperejePeer::ID)) $criteria->add(CpperejePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpperejePeer::DATABASE_NAME);

		$criteria->add(CpperejePeer::ID, $this->id);

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

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setPereje($this->pereje);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setEstper($this->estper);

		$copyObj->setCerrado($this->cerrado);


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
			self::$peer = new CpperejePeer();
		}
		return self::$peer;
	}

} 