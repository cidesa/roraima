<?php


abstract class BaseOcparcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codpar;


	
	protected $cancon;


	
	protected $canval;


	
	protected $porcon;


	
	protected $codtipfte;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getCancon()
	{

		return number_format($this->cancon,2,',','.');
		
	}
	
	public function getCanval()
	{

		return number_format($this->canval,2,',','.');
		
	}
	
	public function getPorcon()
	{

		return number_format($this->porcon,2,',','.');
		
	}
	
	public function getCodtipfte()
	{

		return $this->codtipfte; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcparconPeer::CODCON;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcparconPeer::CODPAR;
		}

	} 
	
	public function setCancon($v)
	{

		if ($this->cancon !== $v) {
			$this->cancon = $v;
			$this->modifiedColumns[] = OcparconPeer::CANCON;
		}

	} 
	
	public function setCanval($v)
	{

		if ($this->canval !== $v) {
			$this->canval = $v;
			$this->modifiedColumns[] = OcparconPeer::CANVAL;
		}

	} 
	
	public function setPorcon($v)
	{

		if ($this->porcon !== $v) {
			$this->porcon = $v;
			$this->modifiedColumns[] = OcparconPeer::PORCON;
		}

	} 
	
	public function setCodtipfte($v)
	{

		if ($this->codtipfte !== $v) {
			$this->codtipfte = $v;
			$this->modifiedColumns[] = OcparconPeer::CODTIPFTE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcparconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->codpar = $rs->getString($startcol + 1);

			$this->cancon = $rs->getFloat($startcol + 2);

			$this->canval = $rs->getFloat($startcol + 3);

			$this->porcon = $rs->getFloat($startcol + 4);

			$this->codtipfte = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocparcon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcparconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcparconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcparconPeer::DATABASE_NAME);
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
					$pk = OcparconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcparconPeer::doUpdate($this, $con);
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


			if (($retval = OcparconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcparconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodpar();
				break;
			case 2:
				return $this->getCancon();
				break;
			case 3:
				return $this->getCanval();
				break;
			case 4:
				return $this->getPorcon();
				break;
			case 5:
				return $this->getCodtipfte();
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
		$keys = OcparconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodpar(),
			$keys[2] => $this->getCancon(),
			$keys[3] => $this->getCanval(),
			$keys[4] => $this->getPorcon(),
			$keys[5] => $this->getCodtipfte(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcparconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodpar($value);
				break;
			case 2:
				$this->setCancon($value);
				break;
			case 3:
				$this->setCanval($value);
				break;
			case 4:
				$this->setPorcon($value);
				break;
			case 5:
				$this->setCodtipfte($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcparconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCancon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanval($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPorcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodtipfte($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcparconPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcparconPeer::CODCON)) $criteria->add(OcparconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcparconPeer::CODPAR)) $criteria->add(OcparconPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcparconPeer::CANCON)) $criteria->add(OcparconPeer::CANCON, $this->cancon);
		if ($this->isColumnModified(OcparconPeer::CANVAL)) $criteria->add(OcparconPeer::CANVAL, $this->canval);
		if ($this->isColumnModified(OcparconPeer::PORCON)) $criteria->add(OcparconPeer::PORCON, $this->porcon);
		if ($this->isColumnModified(OcparconPeer::CODTIPFTE)) $criteria->add(OcparconPeer::CODTIPFTE, $this->codtipfte);
		if ($this->isColumnModified(OcparconPeer::ID)) $criteria->add(OcparconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcparconPeer::DATABASE_NAME);

		$criteria->add(OcparconPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCancon($this->cancon);

		$copyObj->setCanval($this->canval);

		$copyObj->setPorcon($this->porcon);

		$copyObj->setCodtipfte($this->codtipfte);


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
			self::$peer = new OcparconPeer();
		}
		return self::$peer;
	}

} 