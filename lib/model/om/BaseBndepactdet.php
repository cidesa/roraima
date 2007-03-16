<?php


abstract class BaseBndepactdet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $fecdep;


	
	protected $depmue;


	
	protected $depacu;


	
	protected $vallib;


	
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

	
	public function getFecdep($format = 'Y-m-d')
	{

		if ($this->fecdep === null || $this->fecdep === '') {
			return null;
		} elseif (!is_int($this->fecdep)) {
						$ts = strtotime($this->fecdep);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdep] as date/time value: " . var_export($this->fecdep, true));
			}
		} else {
			$ts = $this->fecdep;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDepmue()
	{

		return $this->depmue;
	}

	
	public function getDepacu()
	{

		return $this->depacu;
	}

	
	public function getVallib()
	{

		return $this->vallib;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = BndepactdetPeer::CODACT;
		}

	} 
	
	public function setCodmue($v)
	{

		if ($this->codmue !== $v) {
			$this->codmue = $v;
			$this->modifiedColumns[] = BndepactdetPeer::CODMUE;
		}

	} 
	
	public function setFecdep($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdep] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdep !== $ts) {
			$this->fecdep = $ts;
			$this->modifiedColumns[] = BndepactdetPeer::FECDEP;
		}

	} 
	
	public function setDepmue($v)
	{

		if ($this->depmue !== $v) {
			$this->depmue = $v;
			$this->modifiedColumns[] = BndepactdetPeer::DEPMUE;
		}

	} 
	
	public function setDepacu($v)
	{

		if ($this->depacu !== $v) {
			$this->depacu = $v;
			$this->modifiedColumns[] = BndepactdetPeer::DEPACU;
		}

	} 
	
	public function setVallib($v)
	{

		if ($this->vallib !== $v) {
			$this->vallib = $v;
			$this->modifiedColumns[] = BndepactdetPeer::VALLIB;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndepactdetPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codact = $rs->getString($startcol + 0);

			$this->codmue = $rs->getString($startcol + 1);

			$this->fecdep = $rs->getDate($startcol + 2, null);

			$this->depmue = $rs->getFloat($startcol + 3);

			$this->depacu = $rs->getFloat($startcol + 4);

			$this->vallib = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndepactdet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndepactdetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndepactdetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndepactdetPeer::DATABASE_NAME);
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
					$pk = BndepactdetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndepactdetPeer::doUpdate($this, $con);
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


			if (($retval = BndepactdetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndepactdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecdep();
				break;
			case 3:
				return $this->getDepmue();
				break;
			case 4:
				return $this->getDepacu();
				break;
			case 5:
				return $this->getVallib();
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
		$keys = BndepactdetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getFecdep(),
			$keys[3] => $this->getDepmue(),
			$keys[4] => $this->getDepacu(),
			$keys[5] => $this->getVallib(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndepactdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecdep($value);
				break;
			case 3:
				$this->setDepmue($value);
				break;
			case 4:
				$this->setDepacu($value);
				break;
			case 5:
				$this->setVallib($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndepactdetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecdep($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDepmue($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepacu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVallib($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndepactdetPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndepactdetPeer::CODACT)) $criteria->add(BndepactdetPeer::CODACT, $this->codact);
		if ($this->isColumnModified(BndepactdetPeer::CODMUE)) $criteria->add(BndepactdetPeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BndepactdetPeer::FECDEP)) $criteria->add(BndepactdetPeer::FECDEP, $this->fecdep);
		if ($this->isColumnModified(BndepactdetPeer::DEPMUE)) $criteria->add(BndepactdetPeer::DEPMUE, $this->depmue);
		if ($this->isColumnModified(BndepactdetPeer::DEPACU)) $criteria->add(BndepactdetPeer::DEPACU, $this->depacu);
		if ($this->isColumnModified(BndepactdetPeer::VALLIB)) $criteria->add(BndepactdetPeer::VALLIB, $this->vallib);
		if ($this->isColumnModified(BndepactdetPeer::ID)) $criteria->add(BndepactdetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndepactdetPeer::DATABASE_NAME);

		$criteria->add(BndepactdetPeer::ID, $this->id);

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

		$copyObj->setFecdep($this->fecdep);

		$copyObj->setDepmue($this->depmue);

		$copyObj->setDepacu($this->depacu);

		$copyObj->setVallib($this->vallib);


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
			self::$peer = new BndepactdetPeer();
		}
		return self::$peer;
	}

} 