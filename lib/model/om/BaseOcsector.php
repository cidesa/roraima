<?php


abstract class BaseOcsector extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpai;


	
	protected $codedo;


	
	protected $codmun;


	
	protected $codpar;


	
	protected $codsec;


	
	protected $nomsec;


	
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
	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getCodsec()
	{

		return $this->codsec; 		
	}
	
	public function getNomsec()
	{

		return $this->nomsec; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = OcsectorPeer::CODPAI;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = OcsectorPeer::CODEDO;
		}

	} 
	
	public function setCodmun($v)
	{

		if ($this->codmun !== $v) {
			$this->codmun = $v;
			$this->modifiedColumns[] = OcsectorPeer::CODMUN;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcsectorPeer::CODPAR;
		}

	} 
	
	public function setCodsec($v)
	{

		if ($this->codsec !== $v) {
			$this->codsec = $v;
			$this->modifiedColumns[] = OcsectorPeer::CODSEC;
		}

	} 
	
	public function setNomsec($v)
	{

		if ($this->nomsec !== $v) {
			$this->nomsec = $v;
			$this->modifiedColumns[] = OcsectorPeer::NOMSEC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcsectorPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpai = $rs->getString($startcol + 0);

			$this->codedo = $rs->getString($startcol + 1);

			$this->codmun = $rs->getString($startcol + 2);

			$this->codpar = $rs->getString($startcol + 3);

			$this->codsec = $rs->getString($startcol + 4);

			$this->nomsec = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocsector object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcsectorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcsectorPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcsectorPeer::DATABASE_NAME);
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
					$pk = OcsectorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcsectorPeer::doUpdate($this, $con);
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


			if (($retval = OcsectorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcsectorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodpar();
				break;
			case 4:
				return $this->getCodsec();
				break;
			case 5:
				return $this->getNomsec();
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
		$keys = OcsectorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpai(),
			$keys[1] => $this->getCodedo(),
			$keys[2] => $this->getCodmun(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getCodsec(),
			$keys[5] => $this->getNomsec(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcsectorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodpar($value);
				break;
			case 4:
				$this->setCodsec($value);
				break;
			case 5:
				$this->setNomsec($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcsectorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmun($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodsec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomsec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcsectorPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcsectorPeer::CODPAI)) $criteria->add(OcsectorPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(OcsectorPeer::CODEDO)) $criteria->add(OcsectorPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(OcsectorPeer::CODMUN)) $criteria->add(OcsectorPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(OcsectorPeer::CODPAR)) $criteria->add(OcsectorPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcsectorPeer::CODSEC)) $criteria->add(OcsectorPeer::CODSEC, $this->codsec);
		if ($this->isColumnModified(OcsectorPeer::NOMSEC)) $criteria->add(OcsectorPeer::NOMSEC, $this->nomsec);
		if ($this->isColumnModified(OcsectorPeer::ID)) $criteria->add(OcsectorPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcsectorPeer::DATABASE_NAME);

		$criteria->add(OcsectorPeer::ID, $this->id);

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

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCodsec($this->codsec);

		$copyObj->setNomsec($this->nomsec);


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
			self::$peer = new OcsectorPeer();
		}
		return self::$peer;
	}

} 