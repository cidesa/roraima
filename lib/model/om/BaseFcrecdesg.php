<?php


abstract class BaseFcrecdesg extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrede;


	
	protected $dias;


	
	protected $porcien;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrede()
	{

		return $this->codrede;
	}

	
	public function getDias()
	{

		return $this->dias;
	}

	
	public function getPorcien()
	{

		return $this->porcien;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodrede($v)
	{

		if ($this->codrede !== $v) {
			$this->codrede = $v;
			$this->modifiedColumns[] = FcrecdesgPeer::CODREDE;
		}

	} 
	
	public function setDias($v)
	{

		if ($this->dias !== $v) {
			$this->dias = $v;
			$this->modifiedColumns[] = FcrecdesgPeer::DIAS;
		}

	} 
	
	public function setPorcien($v)
	{

		if ($this->porcien !== $v) {
			$this->porcien = $v;
			$this->modifiedColumns[] = FcrecdesgPeer::PORCIEN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrecdesgPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrede = $rs->getString($startcol + 0);

			$this->dias = $rs->getFloat($startcol + 1);

			$this->porcien = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrecdesg object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrecdesgPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrecdesgPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrecdesgPeer::DATABASE_NAME);
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
					$pk = FcrecdesgPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrecdesgPeer::doUpdate($this, $con);
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


			if (($retval = FcrecdesgPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecdesgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrede();
				break;
			case 1:
				return $this->getDias();
				break;
			case 2:
				return $this->getPorcien();
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
		$keys = FcrecdesgPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrede(),
			$keys[1] => $this->getDias(),
			$keys[2] => $this->getPorcien(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecdesgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrede($value);
				break;
			case 1:
				$this->setDias($value);
				break;
			case 2:
				$this->setPorcien($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrecdesgPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrede($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDias($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorcien($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrecdesgPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrecdesgPeer::CODREDE)) $criteria->add(FcrecdesgPeer::CODREDE, $this->codrede);
		if ($this->isColumnModified(FcrecdesgPeer::DIAS)) $criteria->add(FcrecdesgPeer::DIAS, $this->dias);
		if ($this->isColumnModified(FcrecdesgPeer::PORCIEN)) $criteria->add(FcrecdesgPeer::PORCIEN, $this->porcien);
		if ($this->isColumnModified(FcrecdesgPeer::ID)) $criteria->add(FcrecdesgPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrecdesgPeer::DATABASE_NAME);

		$criteria->add(FcrecdesgPeer::ID, $this->id);

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

		$copyObj->setCodrede($this->codrede);

		$copyObj->setDias($this->dias);

		$copyObj->setPorcien($this->porcien);


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
			self::$peer = new FcrecdesgPeer();
		}
		return self::$peer;
	}

} 