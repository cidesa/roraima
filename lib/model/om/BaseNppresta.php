<?php


abstract class BaseNppresta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $monacu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
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

	
	public function getMonacu()
	{

		return $this->monacu;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpprestaPeer::CODEMP;
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
			$this->modifiedColumns[] = NpprestaPeer::FECDES;
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
			$this->modifiedColumns[] = NpprestaPeer::FECHAS;
		}

	} 
	
	public function setMonacu($v)
	{

		if ($this->monacu !== $v) {
			$this->monacu = $v;
			$this->modifiedColumns[] = NpprestaPeer::MONACU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpprestaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->fecdes = $rs->getDate($startcol + 1, null);

			$this->fechas = $rs->getDate($startcol + 2, null);

			$this->monacu = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nppresta object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpprestaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpprestaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpprestaPeer::DATABASE_NAME);
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
					$pk = NpprestaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpprestaPeer::doUpdate($this, $con);
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


			if (($retval = NpprestaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprestaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecdes();
				break;
			case 2:
				return $this->getFechas();
				break;
			case 3:
				return $this->getMonacu();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpprestaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecdes(),
			$keys[2] => $this->getFechas(),
			$keys[3] => $this->getMonacu(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprestaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecdes($value);
				break;
			case 2:
				$this->setFechas($value);
				break;
			case 3:
				$this->setMonacu($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpprestaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonacu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpprestaPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpprestaPeer::CODEMP)) $criteria->add(NpprestaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpprestaPeer::FECDES)) $criteria->add(NpprestaPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(NpprestaPeer::FECHAS)) $criteria->add(NpprestaPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(NpprestaPeer::MONACU)) $criteria->add(NpprestaPeer::MONACU, $this->monacu);
		if ($this->isColumnModified(NpprestaPeer::ID)) $criteria->add(NpprestaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpprestaPeer::DATABASE_NAME);

		$criteria->add(NpprestaPeer::ID, $this->id);

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

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setMonacu($this->monacu);


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
			self::$peer = new NpprestaPeer();
		}
		return self::$peer;
	}

} 