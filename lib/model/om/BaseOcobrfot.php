<?php


abstract class BaseOcobrfot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codobr;


	
	protected $numfot;


	
	protected $angfot;


	
	protected $desfot;


	
	protected $fecfot;


	
	protected $rutfot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodobr()
	{

		return $this->codobr;
	}

	
	public function getNumfot()
	{

		return $this->numfot;
	}

	
	public function getAngfot()
	{

		return $this->angfot;
	}

	
	public function getDesfot()
	{

		return $this->desfot;
	}

	
	public function getFecfot($format = 'Y-m-d')
	{

		if ($this->fecfot === null || $this->fecfot === '') {
			return null;
		} elseif (!is_int($this->fecfot)) {
						$ts = strtotime($this->fecfot);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfot] as date/time value: " . var_export($this->fecfot, true));
			}
		} else {
			$ts = $this->fecfot;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRutfot()
	{

		return $this->rutfot;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodobr($v)
	{

		if ($this->codobr !== $v) {
			$this->codobr = $v;
			$this->modifiedColumns[] = OcobrfotPeer::CODOBR;
		}

	} 
	
	public function setNumfot($v)
	{

		if ($this->numfot !== $v) {
			$this->numfot = $v;
			$this->modifiedColumns[] = OcobrfotPeer::NUMFOT;
		}

	} 
	
	public function setAngfot($v)
	{

		if ($this->angfot !== $v) {
			$this->angfot = $v;
			$this->modifiedColumns[] = OcobrfotPeer::ANGFOT;
		}

	} 
	
	public function setDesfot($v)
	{

		if ($this->desfot !== $v) {
			$this->desfot = $v;
			$this->modifiedColumns[] = OcobrfotPeer::DESFOT;
		}

	} 
	
	public function setFecfot($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfot] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfot !== $ts) {
			$this->fecfot = $ts;
			$this->modifiedColumns[] = OcobrfotPeer::FECFOT;
		}

	} 
	
	public function setRutfot($v)
	{

		if ($this->rutfot !== $v) {
			$this->rutfot = $v;
			$this->modifiedColumns[] = OcobrfotPeer::RUTFOT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcobrfotPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codobr = $rs->getString($startcol + 0);

			$this->numfot = $rs->getString($startcol + 1);

			$this->angfot = $rs->getString($startcol + 2);

			$this->desfot = $rs->getString($startcol + 3);

			$this->fecfot = $rs->getDate($startcol + 4, null);

			$this->rutfot = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocobrfot object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcobrfotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcobrfotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcobrfotPeer::DATABASE_NAME);
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
					$pk = OcobrfotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcobrfotPeer::doUpdate($this, $con);
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


			if (($retval = OcobrfotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcobrfotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodobr();
				break;
			case 1:
				return $this->getNumfot();
				break;
			case 2:
				return $this->getAngfot();
				break;
			case 3:
				return $this->getDesfot();
				break;
			case 4:
				return $this->getFecfot();
				break;
			case 5:
				return $this->getRutfot();
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
		$keys = OcobrfotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodobr(),
			$keys[1] => $this->getNumfot(),
			$keys[2] => $this->getAngfot(),
			$keys[3] => $this->getDesfot(),
			$keys[4] => $this->getFecfot(),
			$keys[5] => $this->getRutfot(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcobrfotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodobr($value);
				break;
			case 1:
				$this->setNumfot($value);
				break;
			case 2:
				$this->setAngfot($value);
				break;
			case 3:
				$this->setDesfot($value);
				break;
			case 4:
				$this->setFecfot($value);
				break;
			case 5:
				$this->setRutfot($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcobrfotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodobr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumfot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAngfot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesfot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecfot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRutfot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcobrfotPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcobrfotPeer::CODOBR)) $criteria->add(OcobrfotPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(OcobrfotPeer::NUMFOT)) $criteria->add(OcobrfotPeer::NUMFOT, $this->numfot);
		if ($this->isColumnModified(OcobrfotPeer::ANGFOT)) $criteria->add(OcobrfotPeer::ANGFOT, $this->angfot);
		if ($this->isColumnModified(OcobrfotPeer::DESFOT)) $criteria->add(OcobrfotPeer::DESFOT, $this->desfot);
		if ($this->isColumnModified(OcobrfotPeer::FECFOT)) $criteria->add(OcobrfotPeer::FECFOT, $this->fecfot);
		if ($this->isColumnModified(OcobrfotPeer::RUTFOT)) $criteria->add(OcobrfotPeer::RUTFOT, $this->rutfot);
		if ($this->isColumnModified(OcobrfotPeer::ID)) $criteria->add(OcobrfotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcobrfotPeer::DATABASE_NAME);

		$criteria->add(OcobrfotPeer::ID, $this->id);

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

		$copyObj->setCodobr($this->codobr);

		$copyObj->setNumfot($this->numfot);

		$copyObj->setAngfot($this->angfot);

		$copyObj->setDesfot($this->desfot);

		$copyObj->setFecfot($this->fecfot);

		$copyObj->setRutfot($this->rutfot);


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
			self::$peer = new OcobrfotPeer();
		}
		return self::$peer;
	}

} 