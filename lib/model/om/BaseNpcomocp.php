<?php


abstract class BaseNpcomocp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $pascar;


	
	protected $gracar;


	
	protected $suecar;


	
	protected $codtipcar;


	
	protected $fecdes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPascar()
	{

		return $this->pascar;
	}

	
	public function getGracar()
	{

		return $this->gracar;
	}

	
	public function getSuecar()
	{

		return $this->suecar;
	}

	
	public function getCodtipcar()
	{

		return $this->codtipcar;
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

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setPascar($v)
	{

		if ($this->pascar !== $v) {
			$this->pascar = $v;
			$this->modifiedColumns[] = NpcomocpPeer::PASCAR;
		}

	} 
	
	public function setGracar($v)
	{

		if ($this->gracar !== $v) {
			$this->gracar = $v;
			$this->modifiedColumns[] = NpcomocpPeer::GRACAR;
		}

	} 
	
	public function setSuecar($v)
	{

		if ($this->suecar !== $v) {
			$this->suecar = $v;
			$this->modifiedColumns[] = NpcomocpPeer::SUECAR;
		}

	} 
	
	public function setCodtipcar($v)
	{

		if ($this->codtipcar !== $v) {
			$this->codtipcar = $v;
			$this->modifiedColumns[] = NpcomocpPeer::CODTIPCAR;
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
			$this->modifiedColumns[] = NpcomocpPeer::FECDES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcomocpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->pascar = $rs->getString($startcol + 0);

			$this->gracar = $rs->getString($startcol + 1);

			$this->suecar = $rs->getFloat($startcol + 2);

			$this->codtipcar = $rs->getString($startcol + 3);

			$this->fecdes = $rs->getDate($startcol + 4, null);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcomocp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcomocpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcomocpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcomocpPeer::DATABASE_NAME);
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
					$pk = NpcomocpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcomocpPeer::doUpdate($this, $con);
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


			if (($retval = NpcomocpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcomocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPascar();
				break;
			case 1:
				return $this->getGracar();
				break;
			case 2:
				return $this->getSuecar();
				break;
			case 3:
				return $this->getCodtipcar();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcomocpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPascar(),
			$keys[1] => $this->getGracar(),
			$keys[2] => $this->getSuecar(),
			$keys[3] => $this->getCodtipcar(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcomocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPascar($value);
				break;
			case 1:
				$this->setGracar($value);
				break;
			case 2:
				$this->setSuecar($value);
				break;
			case 3:
				$this->setCodtipcar($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcomocpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPascar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGracar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSuecar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtipcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcomocpPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcomocpPeer::PASCAR)) $criteria->add(NpcomocpPeer::PASCAR, $this->pascar);
		if ($this->isColumnModified(NpcomocpPeer::GRACAR)) $criteria->add(NpcomocpPeer::GRACAR, $this->gracar);
		if ($this->isColumnModified(NpcomocpPeer::SUECAR)) $criteria->add(NpcomocpPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(NpcomocpPeer::CODTIPCAR)) $criteria->add(NpcomocpPeer::CODTIPCAR, $this->codtipcar);
		if ($this->isColumnModified(NpcomocpPeer::FECDES)) $criteria->add(NpcomocpPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(NpcomocpPeer::ID)) $criteria->add(NpcomocpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcomocpPeer::DATABASE_NAME);

		$criteria->add(NpcomocpPeer::ID, $this->id);

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

		$copyObj->setPascar($this->pascar);

		$copyObj->setGracar($this->gracar);

		$copyObj->setSuecar($this->suecar);

		$copyObj->setCodtipcar($this->codtipcar);

		$copyObj->setFecdes($this->fecdes);


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
			self::$peer = new NpcomocpPeer();
		}
		return self::$peer;
	}

} 