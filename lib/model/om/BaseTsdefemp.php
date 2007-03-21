<?php


abstract class BaseTsdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $feccon;


	
	protected $fecban;


	
	protected $tipmon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getFeccon($format = 'Y-m-d')
	{

		if ($this->feccon === null || $this->feccon === '') {
			return null;
		} elseif (!is_int($this->feccon)) {
						$ts = strtotime($this->feccon);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
			}
		} else {
			$ts = $this->feccon;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecban($format = 'Y-m-d')
	{

		if ($this->fecban === null || $this->fecban === '') {
			return null;
		} elseif (!is_int($this->fecban)) {
						$ts = strtotime($this->fecban);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecban] as date/time value: " . var_export($this->fecban, true));
			}
		} else {
			$ts = $this->fecban;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTipmon()
	{

		return $this->tipmon;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = TsdefempPeer::CODEMP;
		}

	} 
	
	public function setFeccon($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccon !== $ts) {
			$this->feccon = $ts;
			$this->modifiedColumns[] = TsdefempPeer::FECCON;
		}

	} 
	
	public function setFecban($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecban] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecban !== $ts) {
			$this->fecban = $ts;
			$this->modifiedColumns[] = TsdefempPeer::FECBAN;
		}

	} 
	
	public function setTipmon($v)
	{

		if ($this->tipmon !== $v) {
			$this->tipmon = $v;
			$this->modifiedColumns[] = TsdefempPeer::TIPMON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsdefempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->feccon = $rs->getDate($startcol + 1, null);

			$this->fecban = $rs->getDate($startcol + 2, null);

			$this->tipmon = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsdefemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdefempPeer::DATABASE_NAME);
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
					$pk = TsdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsdefempPeer::doUpdate($this, $con);
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


			if (($retval = TsdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFeccon();
				break;
			case 2:
				return $this->getFecban();
				break;
			case 3:
				return $this->getTipmon();
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
		$keys = TsdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFeccon(),
			$keys[2] => $this->getFecban(),
			$keys[3] => $this->getTipmon(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFeccon($value);
				break;
			case 2:
				$this->setFecban($value);
				break;
			case 3:
				$this->setTipmon($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecban($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipmon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefempPeer::CODEMP)) $criteria->add(TsdefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(TsdefempPeer::FECCON)) $criteria->add(TsdefempPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(TsdefempPeer::FECBAN)) $criteria->add(TsdefempPeer::FECBAN, $this->fecban);
		if ($this->isColumnModified(TsdefempPeer::TIPMON)) $criteria->add(TsdefempPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(TsdefempPeer::ID)) $criteria->add(TsdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefempPeer::DATABASE_NAME);

		$criteria->add(TsdefempPeer::ID, $this->id);

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

		$copyObj->setFeccon($this->feccon);

		$copyObj->setFecban($this->fecban);

		$copyObj->setTipmon($this->tipmon);


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
			self::$peer = new TsdefempPeer();
		}
		return self::$peer;
	}

} 