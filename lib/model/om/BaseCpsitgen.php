<?php


abstract class BaseCpsitgen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $messit;


	
	protected $fecsit;


	
	protected $expsit;


	
	protected $prosit;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMessit()
	{

		return $this->messit; 		
	}
	
	public function getFecsit($format = 'Y-m-d')
	{

		if ($this->fecsit === null || $this->fecsit === '') {
			return null;
		} elseif (!is_int($this->fecsit)) {
						$ts = strtotime($this->fecsit);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsit] as date/time value: " . var_export($this->fecsit, true));
			}
		} else {
			$ts = $this->fecsit;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getExpsit()
	{

		return $this->expsit; 		
	}
	
	public function getProsit()
	{

		return $this->prosit; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setMessit($v)
	{

		if ($this->messit !== $v) {
			$this->messit = $v;
			$this->modifiedColumns[] = CpsitgenPeer::MESSIT;
		}

	} 
	
	public function setFecsit($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsit] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsit !== $ts) {
			$this->fecsit = $ts;
			$this->modifiedColumns[] = CpsitgenPeer::FECSIT;
		}

	} 
	
	public function setExpsit($v)
	{

		if ($this->expsit !== $v) {
			$this->expsit = $v;
			$this->modifiedColumns[] = CpsitgenPeer::EXPSIT;
		}

	} 
	
	public function setProsit($v)
	{

		if ($this->prosit !== $v) {
			$this->prosit = $v;
			$this->modifiedColumns[] = CpsitgenPeer::PROSIT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpsitgenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->messit = $rs->getString($startcol + 0);

			$this->fecsit = $rs->getDate($startcol + 1, null);

			$this->expsit = $rs->getString($startcol + 2);

			$this->prosit = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpsitgen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpsitgenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpsitgenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpsitgenPeer::DATABASE_NAME);
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
					$pk = CpsitgenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpsitgenPeer::doUpdate($this, $con);
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


			if (($retval = CpsitgenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsitgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMessit();
				break;
			case 1:
				return $this->getFecsit();
				break;
			case 2:
				return $this->getExpsit();
				break;
			case 3:
				return $this->getProsit();
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
		$keys = CpsitgenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMessit(),
			$keys[1] => $this->getFecsit(),
			$keys[2] => $this->getExpsit(),
			$keys[3] => $this->getProsit(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsitgenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMessit($value);
				break;
			case 1:
				$this->setFecsit($value);
				break;
			case 2:
				$this->setExpsit($value);
				break;
			case 3:
				$this->setProsit($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsitgenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMessit($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsit($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setExpsit($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setProsit($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpsitgenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpsitgenPeer::MESSIT)) $criteria->add(CpsitgenPeer::MESSIT, $this->messit);
		if ($this->isColumnModified(CpsitgenPeer::FECSIT)) $criteria->add(CpsitgenPeer::FECSIT, $this->fecsit);
		if ($this->isColumnModified(CpsitgenPeer::EXPSIT)) $criteria->add(CpsitgenPeer::EXPSIT, $this->expsit);
		if ($this->isColumnModified(CpsitgenPeer::PROSIT)) $criteria->add(CpsitgenPeer::PROSIT, $this->prosit);
		if ($this->isColumnModified(CpsitgenPeer::ID)) $criteria->add(CpsitgenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpsitgenPeer::DATABASE_NAME);

		$criteria->add(CpsitgenPeer::ID, $this->id);

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

		$copyObj->setMessit($this->messit);

		$copyObj->setFecsit($this->fecsit);

		$copyObj->setExpsit($this->expsit);

		$copyObj->setProsit($this->prosit);


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
			self::$peer = new CpsitgenPeer();
		}
		return self::$peer;
	}

} 