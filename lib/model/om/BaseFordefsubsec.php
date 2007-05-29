<?php


abstract class BaseFordefsubsec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsec;


	
	protected $codsubsec;


	
	protected $nomsubsec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsec()
	{

		return $this->codsec; 		
	}
	
	public function getCodsubsec()
	{

		return $this->codsubsec; 		
	}
	
	public function getNomsubsec()
	{

		return $this->nomsubsec; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = FordefsubsecPeer::CODSEC;
		}

	} 
	
	public function setCodsubsec($v)
	{

		if ($this->codsubsec !== $v) {
			$this->codsubsec = $v;
			$this->modifiedColumns[] = FordefsubsecPeer::CODSUBSEC;
		}

	} 
	
	public function setNomsubsec($v)
	{

		if ($this->nomsubsec !== $v) {
			$this->nomsubsec = $v;
			$this->modifiedColumns[] = FordefsubsecPeer::NOMSUBSEC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefsubsecPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsec = $rs->getString($startcol + 0);

			$this->codsubsec = $rs->getString($startcol + 1);

			$this->nomsubsec = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefsubsec object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefsubsecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefsubsecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefsubsecPeer::DATABASE_NAME);
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
					$pk = FordefsubsecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefsubsecPeer::doUpdate($this, $con);
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


			if (($retval = FordefsubsecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefsubsecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsec();
				break;
			case 1:
				return $this->getCodsubsec();
				break;
			case 2:
				return $this->getNomsubsec();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefsubsecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsec(),
			$keys[1] => $this->getCodsubsec(),
			$keys[2] => $this->getNomsubsec(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefsubsecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsec($value);
				break;
			case 1:
				$this->setCodsubsec($value);
				break;
			case 2:
				$this->setNomsubsec($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefsubsecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodsubsec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomsubsec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefsubsecPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefsubsecPeer::CODSEC)) $criteria->add(FordefsubsecPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(FordefsubsecPeer::CODSUBSEC)) $criteria->add(FordefsubsecPeer::CODSUBSEC, $this->codsubsec);
		if ($this->isColumnModified(FordefsubsecPeer::NOMSUBSEC)) $criteria->add(FordefsubsecPeer::NOMSUBSEC, $this->nomsubsec);
		if ($this->isColumnModified(FordefsubsecPeer::ID)) $criteria->add(FordefsubsecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefsubsecPeer::DATABASE_NAME);

		$criteria->add(FordefsubsecPeer::ID, $this->id);

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

		$copyObj->setCodsec($this->codsec);

		$copyObj->setCodsubsec($this->codsubsec);

		$copyObj->setNomsubsec($this->nomsubsec);


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
			self::$peer = new FordefsubsecPeer();
		}
		return self::$peer;
	}

} 