<?php


abstract class BaseNpintfecref extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $feciniref;


	
	protected $fecfinref;


	
	protected $tasint;


	
	protected $tasintpro;


	
	protected $tasintpas;


	
	protected $tasintact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getFeciniref($format = 'Y-m-d')
	{

		if ($this->feciniref === null || $this->feciniref === '') {
			return null;
		} elseif (!is_int($this->feciniref)) {
						$ts = strtotime($this->feciniref);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feciniref] as date/time value: " . var_export($this->feciniref, true));
			}
		} else {
			$ts = $this->feciniref;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfinref($format = 'Y-m-d')
	{

		if ($this->fecfinref === null || $this->fecfinref === '') {
			return null;
		} elseif (!is_int($this->fecfinref)) {
						$ts = strtotime($this->fecfinref);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfinref] as date/time value: " . var_export($this->fecfinref, true));
			}
		} else {
			$ts = $this->fecfinref;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTasint()
	{

		return $this->tasint;
	}

	
	public function getTasintpro()
	{

		return $this->tasintpro;
	}

	
	public function getTasintpas()
	{

		return $this->tasintpas;
	}

	
	public function getTasintact()
	{

		return $this->tasintact;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setFeciniref($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feciniref] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feciniref !== $ts) {
			$this->feciniref = $ts;
			$this->modifiedColumns[] = NpintfecrefPeer::FECINIREF;
		}

	} 
	
	public function setFecfinref($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfinref] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfinref !== $ts) {
			$this->fecfinref = $ts;
			$this->modifiedColumns[] = NpintfecrefPeer::FECFINREF;
		}

	} 
	
	public function setTasint($v)
	{

		if ($this->tasint !== $v) {
			$this->tasint = $v;
			$this->modifiedColumns[] = NpintfecrefPeer::TASINT;
		}

	} 
	
	public function setTasintpro($v)
	{

		if ($this->tasintpro !== $v) {
			$this->tasintpro = $v;
			$this->modifiedColumns[] = NpintfecrefPeer::TASINTPRO;
		}

	} 
	
	public function setTasintpas($v)
	{

		if ($this->tasintpas !== $v) {
			$this->tasintpas = $v;
			$this->modifiedColumns[] = NpintfecrefPeer::TASINTPAS;
		}

	} 
	
	public function setTasintact($v)
	{

		if ($this->tasintact !== $v) {
			$this->tasintact = $v;
			$this->modifiedColumns[] = NpintfecrefPeer::TASINTACT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpintfecrefPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->feciniref = $rs->getDate($startcol + 0, null);

			$this->fecfinref = $rs->getDate($startcol + 1, null);

			$this->tasint = $rs->getFloat($startcol + 2);

			$this->tasintpro = $rs->getFloat($startcol + 3);

			$this->tasintpas = $rs->getFloat($startcol + 4);

			$this->tasintact = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npintfecref object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpintfecrefPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpintfecrefPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpintfecrefPeer::DATABASE_NAME);
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
					$pk = NpintfecrefPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpintfecrefPeer::doUpdate($this, $con);
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


			if (($retval = NpintfecrefPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpintfecrefPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFeciniref();
				break;
			case 1:
				return $this->getFecfinref();
				break;
			case 2:
				return $this->getTasint();
				break;
			case 3:
				return $this->getTasintpro();
				break;
			case 4:
				return $this->getTasintpas();
				break;
			case 5:
				return $this->getTasintact();
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
		$keys = NpintfecrefPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFeciniref(),
			$keys[1] => $this->getFecfinref(),
			$keys[2] => $this->getTasint(),
			$keys[3] => $this->getTasintpro(),
			$keys[4] => $this->getTasintpas(),
			$keys[5] => $this->getTasintact(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpintfecrefPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFeciniref($value);
				break;
			case 1:
				$this->setFecfinref($value);
				break;
			case 2:
				$this->setTasint($value);
				break;
			case 3:
				$this->setTasintpro($value);
				break;
			case 4:
				$this->setTasintpas($value);
				break;
			case 5:
				$this->setTasintact($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpintfecrefPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFeciniref($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfinref($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTasint($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTasintpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTasintpas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTasintact($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpintfecrefPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpintfecrefPeer::FECINIREF)) $criteria->add(NpintfecrefPeer::FECINIREF, $this->feciniref);
		if ($this->isColumnModified(NpintfecrefPeer::FECFINREF)) $criteria->add(NpintfecrefPeer::FECFINREF, $this->fecfinref);
		if ($this->isColumnModified(NpintfecrefPeer::TASINT)) $criteria->add(NpintfecrefPeer::TASINT, $this->tasint);
		if ($this->isColumnModified(NpintfecrefPeer::TASINTPRO)) $criteria->add(NpintfecrefPeer::TASINTPRO, $this->tasintpro);
		if ($this->isColumnModified(NpintfecrefPeer::TASINTPAS)) $criteria->add(NpintfecrefPeer::TASINTPAS, $this->tasintpas);
		if ($this->isColumnModified(NpintfecrefPeer::TASINTACT)) $criteria->add(NpintfecrefPeer::TASINTACT, $this->tasintact);
		if ($this->isColumnModified(NpintfecrefPeer::ID)) $criteria->add(NpintfecrefPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpintfecrefPeer::DATABASE_NAME);

		$criteria->add(NpintfecrefPeer::ID, $this->id);

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

		$copyObj->setFeciniref($this->feciniref);

		$copyObj->setFecfinref($this->fecfinref);

		$copyObj->setTasint($this->tasint);

		$copyObj->setTasintpro($this->tasintpro);

		$copyObj->setTasintpas($this->tasintpas);

		$copyObj->setTasintact($this->tasintact);


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
			self::$peer = new NpintfecrefPeer();
		}
		return self::$peer;
	}

} 