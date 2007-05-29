<?php


abstract class BaseTsentislr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numdep;


	
	protected $fecha;


	
	protected $banco;


	
	protected $numord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumdep()
	{

		return $this->numdep; 		
	}
	
	public function getFecha($format = 'Y-m-d')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getBanco()
	{

		return $this->banco; 		
	}
	
	public function getNumord()
	{

		return $this->numord; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumdep($v)
	{

		if ($this->numdep !== $v) {
			$this->numdep = $v;
			$this->modifiedColumns[] = TsentislrPeer::NUMDEP;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = TsentislrPeer::FECHA;
		}

	} 
	
	public function setBanco($v)
	{

		if ($this->banco !== $v) {
			$this->banco = $v;
			$this->modifiedColumns[] = TsentislrPeer::BANCO;
		}

	} 
	
	public function setNumord($v)
	{

		if ($this->numord !== $v) {
			$this->numord = $v;
			$this->modifiedColumns[] = TsentislrPeer::NUMORD;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsentislrPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numdep = $rs->getString($startcol + 0);

			$this->fecha = $rs->getDate($startcol + 1, null);

			$this->banco = $rs->getString($startcol + 2);

			$this->numord = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsentislr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsentislrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsentislrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsentislrPeer::DATABASE_NAME);
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
					$pk = TsentislrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsentislrPeer::doUpdate($this, $con);
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


			if (($retval = TsentislrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsentislrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumdep();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getBanco();
				break;
			case 3:
				return $this->getNumord();
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
		$keys = TsentislrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumdep(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getBanco(),
			$keys[3] => $this->getNumord(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsentislrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumdep($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setBanco($value);
				break;
			case 3:
				$this->setNumord($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsentislrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumdep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setBanco($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsentislrPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsentislrPeer::NUMDEP)) $criteria->add(TsentislrPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(TsentislrPeer::FECHA)) $criteria->add(TsentislrPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(TsentislrPeer::BANCO)) $criteria->add(TsentislrPeer::BANCO, $this->banco);
		if ($this->isColumnModified(TsentislrPeer::NUMORD)) $criteria->add(TsentislrPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(TsentislrPeer::ID)) $criteria->add(TsentislrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsentislrPeer::DATABASE_NAME);

		$criteria->add(TsentislrPeer::ID, $this->id);

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

		$copyObj->setNumdep($this->numdep);

		$copyObj->setFecha($this->fecha);

		$copyObj->setBanco($this->banco);

		$copyObj->setNumord($this->numord);


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
			self::$peer = new TsentislrPeer();
		}
		return self::$peer;
	}

} 