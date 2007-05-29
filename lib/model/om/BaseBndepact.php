<?php


abstract class BaseBndepact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecdep;


	
	protected $monmue;


	
	protected $moninm;


	
	protected $monsem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
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

	
	public function getMonmue()
	{

		return number_format($this->monmue,2,',','.');
		
	}
	
	public function getMoninm()
	{

		return number_format($this->moninm,2,',','.');
		
	}
	
	public function getMonsem()
	{

		return number_format($this->monsem,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
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
			$this->modifiedColumns[] = BndepactPeer::FECDEP;
		}

	} 
	
	public function setMonmue($v)
	{

		if ($this->monmue !== $v) {
			$this->monmue = $v;
			$this->modifiedColumns[] = BndepactPeer::MONMUE;
		}

	} 
	
	public function setMoninm($v)
	{

		if ($this->moninm !== $v) {
			$this->moninm = $v;
			$this->modifiedColumns[] = BndepactPeer::MONINM;
		}

	} 
	
	public function setMonsem($v)
	{

		if ($this->monsem !== $v) {
			$this->monsem = $v;
			$this->modifiedColumns[] = BndepactPeer::MONSEM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = BndepactPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->fecdep = $rs->getDate($startcol + 0, null);

			$this->monmue = $rs->getFloat($startcol + 1);

			$this->moninm = $rs->getFloat($startcol + 2);

			$this->monsem = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Bndepact object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(BndepactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BndepactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BndepactPeer::DATABASE_NAME);
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
					$pk = BndepactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += BndepactPeer::doUpdate($this, $con);
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


			if (($retval = BndepactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndepactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecdep();
				break;
			case 1:
				return $this->getMonmue();
				break;
			case 2:
				return $this->getMoninm();
				break;
			case 3:
				return $this->getMonsem();
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
		$keys = BndepactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecdep(),
			$keys[1] => $this->getMonmue(),
			$keys[2] => $this->getMoninm(),
			$keys[3] => $this->getMonsem(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BndepactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecdep($value);
				break;
			case 1:
				$this->setMonmue($value);
				break;
			case 2:
				$this->setMoninm($value);
				break;
			case 3:
				$this->setMonsem($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BndepactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecdep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoninm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonsem($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BndepactPeer::DATABASE_NAME);

		if ($this->isColumnModified(BndepactPeer::FECDEP)) $criteria->add(BndepactPeer::FECDEP, $this->fecdep);
		if ($this->isColumnModified(BndepactPeer::MONMUE)) $criteria->add(BndepactPeer::MONMUE, $this->monmue);
		if ($this->isColumnModified(BndepactPeer::MONINM)) $criteria->add(BndepactPeer::MONINM, $this->moninm);
		if ($this->isColumnModified(BndepactPeer::MONSEM)) $criteria->add(BndepactPeer::MONSEM, $this->monsem);
		if ($this->isColumnModified(BndepactPeer::ID)) $criteria->add(BndepactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BndepactPeer::DATABASE_NAME);

		$criteria->add(BndepactPeer::ID, $this->id);

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

		$copyObj->setFecdep($this->fecdep);

		$copyObj->setMonmue($this->monmue);

		$copyObj->setMoninm($this->moninm);

		$copyObj->setMonsem($this->monsem);


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
			self::$peer = new BndepactPeer();
		}
		return self::$peer;
	}

} 