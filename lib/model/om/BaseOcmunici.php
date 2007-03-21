<?php


abstract class BaseOcmunici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codmun;


	
	protected $nommun;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpai()
	{

		return $this->codpai;
	}

	
	public function getCodedo()
	{

		return $this->codedo;
	}

	
	public function getCodmun()
	{

		return $this->codmun;
	}

	
	public function getNommun()
	{

		return $this->nommun;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = OcmuniciPeer::CODPAI;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = OcmuniciPeer::CODEDO;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = OcmuniciPeer::CODMUN;
		}

	} 
	
	public function setNommun($v)
	{

		if ($this->nommun !== $v) {
			$this->nommun = $v;
			$this->modifiedColumns[] = OcmuniciPeer::NOMMUN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcmuniciPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpai = $rs->getString($startcol + 0);

			$this->codedo = $rs->getString($startcol + 1);

			$this->codmun = $rs->getString($startcol + 2);

			$this->nommun = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocmunici object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcmuniciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcmuniciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcmuniciPeer::DATABASE_NAME);
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
					$pk = OcmuniciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcmuniciPeer::doUpdate($this, $con);
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


			if (($retval = OcmuniciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpai();
				break;
			case 1:
				return $this->getCodedo();
				break;
			case 2:
				return $this->getCodmun();
				break;
			case 3:
				return $this->getNommun();
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
		$keys = OcmuniciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpai(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodmun(),
			$keys[3] => $this->getNommun(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpai($value);
				break;
			case 1:
				$this->setCodedo($value);
				break;
			case 2:
				$this->setCodmun($value);
				break;
			case 3:
				$this->setNommun($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcmuniciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmun($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNommun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcmuniciPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcmuniciPeer::CODPAI)) $criteria->add(OcmuniciPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcmuniciPeer::CODEDO)) $criteria->add(OcmuniciPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcmuniciPeer::CODMUN)) $criteria->add(OcmuniciPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(OcmuniciPeer::NOMMUN)) $criteria->add(OcmuniciPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(OcmuniciPeer::ID)) $criteria->add(OcmuniciPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcmuniciPeer::DATABASE_NAME);

		$criteria->add(OcmuniciPeer::ID, $this->id);

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

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setNommun($this->nommun);


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
			self::$peer = new OcmuniciPeer();
		}
		return self::$peer;
	}

} 