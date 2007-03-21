<?php


abstract class BaseOcciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codciu;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $nomciu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodciu()
	{

		return $this->codciu;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getNomciu()
	{

		return $this->nomciu;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodciu($v)
	{

		if ($this->codciu !== $v) {
			$this->codciu = $v;
			$this->modifiedColumns[] = OcciudadPeer::CODCIU;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = OcciudadPeer::CODEDO;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = OcciudadPeer::CODPAI;
		}

	} 
	
	public function setNomciu($v)
	{

		if ($this->nomciu !== $v) {
			$this->nomciu = $v;
			$this->modifiedColumns[] = OcciudadPeer::NOMCIU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcciudadPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codciu = $rs->getString($startcol + 0);

			$this->codedo = $rs->getString($startcol + 1);

			$this->codpai = $rs->getString($startcol + 2);

			$this->nomciu = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Occiudad object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcciudadPeer::DATABASE_NAME);
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
					$pk = OcciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcciudadPeer::doUpdate($this, $con);
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


			if (($retval = OcciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodciu();
				break;
			case 1:
				return $this->getCodedo();
				break;
			case 2:
				return $this->getCodpai();
				break;
			case 3:
				return $this->getNomciu();
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
		$keys = OcciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodciu(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodpai(),
			$keys[3] => $this->getNomciu(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodciu($value);
				break;
			case 1:
				$this->setCodedo($value);
				break;
			case 2:
				$this->setCodpai($value);
				break;
			case 3:
				$this->setNomciu($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodciu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpai($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomciu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcciudadPeer::CODCIU)) $criteria->add(OcciudadPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(OcciudadPeer::CODEDO)) $criteria->add(OcciudadPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcciudadPeer::CODPAI)) $criteria->add(OcciudadPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcciudadPeer::NOMCIU)) $criteria->add(OcciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(OcciudadPeer::ID)) $criteria->add(OcciudadPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcciudadPeer::DATABASE_NAME);

		$criteria->add(OcciudadPeer::ID, $this->id);

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

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNomciu($this->nomciu);


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
			self::$peer = new OcciudadPeer();
		}
		return self::$peer;
	}

} 