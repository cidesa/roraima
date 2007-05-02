<?php


abstract class BaseFcesting extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpar;


	
	protected $ano;


	
	protected $perest;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getAno()
	{

		return $this->ano;
	}

	
	public function getPerest()
	{

		return $this->perest;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = FcestingPeer::CODPAR;
		}

	} 
	
	public function setAno($v)
	{

		if ($this->ano !== $v) {
			$this->ano = $v;
			$this->modifiedColumns[] = FcestingPeer::ANO;
		}

	} 
	
	public function setPerest($v)
	{

		if ($this->perest !== $v) {
			$this->perest = $v;
			$this->modifiedColumns[] = FcestingPeer::PEREST;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = FcestingPeer::MONTO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcestingPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpar = $rs->getString($startcol + 0);

			$this->ano = $rs->getString($startcol + 1);

			$this->perest = $rs->getString($startcol + 2);

			$this->monto = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcesting object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcestingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcestingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcestingPeer::DATABASE_NAME);
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
					$pk = FcestingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcestingPeer::doUpdate($this, $con);
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


			if (($retval = FcestingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcestingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpar();
				break;
			case 1:
				return $this->getAno();
				break;
			case 2:
				return $this->getPerest();
				break;
			case 3:
				return $this->getMonto();
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
		$keys = FcestingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpar(),
			$keys[1] => $this->getAno(),
			$keys[2] => $this->getPerest(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcestingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpar($value);
				break;
			case 1:
				$this->setAno($value);
				break;
			case 2:
				$this->setPerest($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcestingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAno($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcestingPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcestingPeer::CODPAR)) $criteria->add(FcestingPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(FcestingPeer::ANO)) $criteria->add(FcestingPeer::ANO, $this->ano);
		if ($this->isColumnModified(FcestingPeer::PEREST)) $criteria->add(FcestingPeer::PEREST, $this->perest);
		if ($this->isColumnModified(FcestingPeer::MONTO)) $criteria->add(FcestingPeer::MONTO, $this->monto);
		if ($this->isColumnModified(FcestingPeer::ID)) $criteria->add(FcestingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcestingPeer::DATABASE_NAME);

		$criteria->add(FcestingPeer::ID, $this->id);

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

		$copyObj->setCodpar($this->codpar);

		$copyObj->setAno($this->ano);

		$copyObj->setPerest($this->perest);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new FcestingPeer();
		}
		return self::$peer;
	}

} 