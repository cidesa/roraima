<?php


abstract class BaseAcdocumen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $docate;


	
	protected $tipdoc;


	
	protected $asudoc;


	
	protected $fecdoc;


	
	protected $cedrif;


	
	protected $stadoc;


	
	protected $nomarc;


	
	protected $content;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDocate()
	{

		return $this->docate;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getAsudoc()
	{

		return $this->asudoc;
	}

	
	public function getFecdoc($format = 'Y-m-d')
	{

		if ($this->fecdoc === null || $this->fecdoc === '') {
			return null;
		} elseif (!is_int($this->fecdoc)) {
						$ts = strtotime($this->fecdoc);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecdoc] as date/time value: " . var_export($this->fecdoc, true));
			}
		} else {
			$ts = $this->fecdoc;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCedrif()
	{

		return $this->cedrif;
	}

	
	public function getStadoc()
	{

		return $this->stadoc;
	}

	
	public function getNomarc()
	{

		return $this->nomarc;
	}

	
	public function getContent()
	{

		return $this->content;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setDocate($v)
	{

		if ($this->docate !== $v) {
			$this->docate = $v;
			$this->modifiedColumns[] = AcdocumenPeer::DOCATE;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = AcdocumenPeer::TIPDOC;
		}

	} 
	
	public function setAsudoc($v)
	{

		if ($this->asudoc !== $v) {
			$this->asudoc = $v;
			$this->modifiedColumns[] = AcdocumenPeer::ASUDOC;
		}

	} 
	
	public function setFecdoc($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecdoc] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecdoc !== $ts) {
			$this->fecdoc = $ts;
			$this->modifiedColumns[] = AcdocumenPeer::FECDOC;
		}

	} 
	
	public function setCedrif($v)
	{

		if ($this->cedrif !== $v) {
			$this->cedrif = $v;
			$this->modifiedColumns[] = AcdocumenPeer::CEDRIF;
		}

	} 
	
	public function setStadoc($v)
	{

		if ($this->stadoc !== $v) {
			$this->stadoc = $v;
			$this->modifiedColumns[] = AcdocumenPeer::STADOC;
		}

	} 
	
	public function setNomarc($v)
	{

		if ($this->nomarc !== $v) {
			$this->nomarc = $v;
			$this->modifiedColumns[] = AcdocumenPeer::NOMARC;
		}

	} 
	
	public function setContent($v)
	{

		if ($this->content !== $v) {
			$this->content = $v;
			$this->modifiedColumns[] = AcdocumenPeer::CONTENT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AcdocumenPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->docate = $rs->getString($startcol + 0);

			$this->tipdoc = $rs->getString($startcol + 1);

			$this->asudoc = $rs->getString($startcol + 2);

			$this->fecdoc = $rs->getDate($startcol + 3, null);

			$this->cedrif = $rs->getString($startcol + 4);

			$this->stadoc = $rs->getString($startcol + 5);

			$this->nomarc = $rs->getString($startcol + 6);

			$this->content = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Acdocumen object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AcdocumenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AcdocumenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AcdocumenPeer::DATABASE_NAME);
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
					$pk = AcdocumenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += AcdocumenPeer::doUpdate($this, $con);
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


			if (($retval = AcdocumenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcdocumenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDocate();
				break;
			case 1:
				return $this->getTipdoc();
				break;
			case 2:
				return $this->getAsudoc();
				break;
			case 3:
				return $this->getFecdoc();
				break;
			case 4:
				return $this->getCedrif();
				break;
			case 5:
				return $this->getStadoc();
				break;
			case 6:
				return $this->getNomarc();
				break;
			case 7:
				return $this->getContent();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcdocumenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDocate(),
			$keys[1] => $this->getTipdoc(),
			$keys[2] => $this->getAsudoc(),
			$keys[3] => $this->getFecdoc(),
			$keys[4] => $this->getCedrif(),
			$keys[5] => $this->getStadoc(),
			$keys[6] => $this->getNomarc(),
			$keys[7] => $this->getContent(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AcdocumenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDocate($value);
				break;
			case 1:
				$this->setTipdoc($value);
				break;
			case 2:
				$this->setAsudoc($value);
				break;
			case 3:
				$this->setFecdoc($value);
				break;
			case 4:
				$this->setCedrif($value);
				break;
			case 5:
				$this->setStadoc($value);
				break;
			case 6:
				$this->setNomarc($value);
				break;
			case 7:
				$this->setContent($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AcdocumenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDocate($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAsudoc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecdoc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedrif($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStadoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomarc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setContent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AcdocumenPeer::DATABASE_NAME);

		if ($this->isColumnModified(AcdocumenPeer::DOCATE)) $criteria->add(AcdocumenPeer::DOCATE, $this->docate);
		if ($this->isColumnModified(AcdocumenPeer::TIPDOC)) $criteria->add(AcdocumenPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(AcdocumenPeer::ASUDOC)) $criteria->add(AcdocumenPeer::ASUDOC, $this->asudoc);
		if ($this->isColumnModified(AcdocumenPeer::FECDOC)) $criteria->add(AcdocumenPeer::FECDOC, $this->fecdoc);
		if ($this->isColumnModified(AcdocumenPeer::CEDRIF)) $criteria->add(AcdocumenPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(AcdocumenPeer::STADOC)) $criteria->add(AcdocumenPeer::STADOC, $this->stadoc);
		if ($this->isColumnModified(AcdocumenPeer::NOMARC)) $criteria->add(AcdocumenPeer::NOMARC, $this->nomarc);
		if ($this->isColumnModified(AcdocumenPeer::CONTENT)) $criteria->add(AcdocumenPeer::CONTENT, $this->content);
		if ($this->isColumnModified(AcdocumenPeer::ID)) $criteria->add(AcdocumenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AcdocumenPeer::DATABASE_NAME);

		$criteria->add(AcdocumenPeer::ID, $this->id);

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

		$copyObj->setDocate($this->docate);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setAsudoc($this->asudoc);

		$copyObj->setFecdoc($this->fecdoc);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setStadoc($this->stadoc);

		$copyObj->setNomarc($this->nomarc);

		$copyObj->setContent($this->content);


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
			self::$peer = new AcdocumenPeer();
		}
		return self::$peer;
	}

} 