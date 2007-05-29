<?php


abstract class BaseNpinteresesprestaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $fecpago;


	
	protected $feccalculo;


	
	protected $acufondoantiguedad;


	
	protected $acuinteres;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getFecpago($format = 'Y-m-d')
	{

		if ($this->fecpago === null || $this->fecpago === '') {
			return null;
		} elseif (!is_int($this->fecpago)) {
						$ts = strtotime($this->fecpago);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecpago] as date/time value: " . var_export($this->fecpago, true));
			}
		} else {
			$ts = $this->fecpago;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFeccalculo($format = 'Y-m-d')
	{

		if ($this->feccalculo === null || $this->feccalculo === '') {
			return null;
		} elseif (!is_int($this->feccalculo)) {
						$ts = strtotime($this->feccalculo);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccalculo] as date/time value: " . var_export($this->feccalculo, true));
			}
		} else {
			$ts = $this->feccalculo;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAcufondoantiguedad()
	{

		return number_format($this->acufondoantiguedad,2,',','.');
		
	}
	
	public function getAcuinteres()
	{

		return number_format($this->acuinteres,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::CODNOM;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::CODEMP;
		}

	} 
	
	public function setFecpago($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecpago] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecpago !== $ts) {
			$this->fecpago = $ts;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::FECPAGO;
		}

	} 
	
	public function setFeccalculo($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccalculo] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccalculo !== $ts) {
			$this->feccalculo = $ts;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::FECCALCULO;
		}

	} 
	
	public function setAcufondoantiguedad($v)
	{

		if ($this->acufondoantiguedad !== $v) {
			$this->acufondoantiguedad = $v;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::ACUFONDOANTIGUEDAD;
		}

	} 
	
	public function setAcuinteres($v)
	{

		if ($this->acuinteres !== $v) {
			$this->acuinteres = $v;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::ACUINTERES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpinteresesprestacionesPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codemp = $rs->getString($startcol + 1);

			$this->fecpago = $rs->getDate($startcol + 2, null);

			$this->feccalculo = $rs->getDate($startcol + 3, null);

			$this->acufondoantiguedad = $rs->getFloat($startcol + 4);

			$this->acuinteres = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npinteresesprestaciones object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpinteresesprestacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinteresesprestacionesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinteresesprestacionesPeer::DATABASE_NAME);
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
					$pk = NpinteresesprestacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpinteresesprestacionesPeer::doUpdate($this, $con);
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


			if (($retval = NpinteresesprestacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinteresesprestacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getFecpago();
				break;
			case 3:
				return $this->getFeccalculo();
				break;
			case 4:
				return $this->getAcufondoantiguedad();
				break;
			case 5:
				return $this->getAcuinteres();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinteresesprestacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getFecpago(),
			$keys[3] => $this->getFeccalculo(),
			$keys[4] => $this->getAcufondoantiguedad(),
			$keys[5] => $this->getAcuinteres(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinteresesprestacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setFecpago($value);
				break;
			case 3:
				$this->setFeccalculo($value);
				break;
			case 4:
				$this->setAcufondoantiguedad($value);
				break;
			case 5:
				$this->setAcuinteres($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinteresesprestacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecpago($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFeccalculo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcufondoantiguedad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAcuinteres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinteresesprestacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinteresesprestacionesPeer::CODNOM)) $criteria->add(NpinteresesprestacionesPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpinteresesprestacionesPeer::CODEMP)) $criteria->add(NpinteresesprestacionesPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinteresesprestacionesPeer::FECPAGO)) $criteria->add(NpinteresesprestacionesPeer::FECPAGO, $this->fecpago);
		if ($this->isColumnModified(NpinteresesprestacionesPeer::FECCALCULO)) $criteria->add(NpinteresesprestacionesPeer::FECCALCULO, $this->feccalculo);
		if ($this->isColumnModified(NpinteresesprestacionesPeer::ACUFONDOANTIGUEDAD)) $criteria->add(NpinteresesprestacionesPeer::ACUFONDOANTIGUEDAD, $this->acufondoantiguedad);
		if ($this->isColumnModified(NpinteresesprestacionesPeer::ACUINTERES)) $criteria->add(NpinteresesprestacionesPeer::ACUINTERES, $this->acuinteres);
		if ($this->isColumnModified(NpinteresesprestacionesPeer::ID)) $criteria->add(NpinteresesprestacionesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinteresesprestacionesPeer::DATABASE_NAME);

		$criteria->add(NpinteresesprestacionesPeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecpago($this->fecpago);

		$copyObj->setFeccalculo($this->feccalculo);

		$copyObj->setAcufondoantiguedad($this->acufondoantiguedad);

		$copyObj->setAcuinteres($this->acuinteres);


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
			self::$peer = new NpinteresesprestacionesPeer();
		}
		return self::$peer;
	}

} 