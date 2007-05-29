<?php


abstract class BaseNpmunicipios extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmunicipio;


	
	protected $nombremunicipio;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmunicipio()
	{

		return $this->codmunicipio; 		
	}
	
	public function getNombremunicipio()
	{

		return $this->nombremunicipio; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmunicipio($v)
	{

		if ($this->codmunicipio !== $v) {
			$this->codmunicipio = $v;
			$this->modifiedColumns[] = NpmunicipiosPeer::CODMUNICIPIO;
		}

	} 
	
	public function setNombremunicipio($v)
	{

		if ($this->nombremunicipio !== $v) {
			$this->nombremunicipio = $v;
			$this->modifiedColumns[] = NpmunicipiosPeer::NOMBREMUNICIPIO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpmunicipiosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmunicipio = $rs->getString($startcol + 0);

			$this->nombremunicipio = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npmunicipios object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpmunicipiosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpmunicipiosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpmunicipiosPeer::DATABASE_NAME);
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
					$pk = NpmunicipiosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpmunicipiosPeer::doUpdate($this, $con);
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


			if (($retval = NpmunicipiosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmunicipiosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmunicipio();
				break;
			case 1:
				return $this->getNombremunicipio();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmunicipiosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmunicipio(),
			$keys[1] => $this->getNombremunicipio(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmunicipiosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmunicipio($value);
				break;
			case 1:
				$this->setNombremunicipio($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmunicipiosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmunicipio($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombremunicipio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpmunicipiosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpmunicipiosPeer::CODMUNICIPIO)) $criteria->add(NpmunicipiosPeer::CODMUNICIPIO, $this->codmunicipio);
		if ($this->isColumnModified(NpmunicipiosPeer::NOMBREMUNICIPIO)) $criteria->add(NpmunicipiosPeer::NOMBREMUNICIPIO, $this->nombremunicipio);
		if ($this->isColumnModified(NpmunicipiosPeer::ID)) $criteria->add(NpmunicipiosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpmunicipiosPeer::DATABASE_NAME);

		$criteria->add(NpmunicipiosPeer::ID, $this->id);

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

		$copyObj->setCodmunicipio($this->codmunicipio);

		$copyObj->setNombremunicipio($this->nombremunicipio);


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
			self::$peer = new NpmunicipiosPeer();
		}
		return self::$peer;
	}

} 