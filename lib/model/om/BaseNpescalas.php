<?php


abstract class BaseNpescalas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $grado;


	
	protected $paso;


	
	protected $salario;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getGrado()
	{

		return $this->grado;
	}

	
	public function getPaso()
	{

		return $this->paso;
	}

	
	public function getSalario()
	{

		return $this->salario;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setGrado($v)
	{

		if ($this->grado !== $v) {
			$this->grado = $v;
			$this->modifiedColumns[] = NpescalasPeer::GRADO;
		}

	} 
	
	public function setPaso($v)
	{

		if ($this->paso !== $v) {
			$this->paso = $v;
			$this->modifiedColumns[] = NpescalasPeer::PASO;
		}

	} 
	
	public function setSalario($v)
	{

		if ($this->salario !== $v) {
			$this->salario = $v;
			$this->modifiedColumns[] = NpescalasPeer::SALARIO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpescalasPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->grado = $rs->getString($startcol + 0);

			$this->paso = $rs->getString($startcol + 1);

			$this->salario = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npescalas object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpescalasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpescalasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpescalasPeer::DATABASE_NAME);
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
					$pk = NpescalasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpescalasPeer::doUpdate($this, $con);
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


			if (($retval = NpescalasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpescalasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getGrado();
				break;
			case 1:
				return $this->getPaso();
				break;
			case 2:
				return $this->getSalario();
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
		$keys = NpescalasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getGrado(),
			$keys[1] => $this->getPaso(),
			$keys[2] => $this->getSalario(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpescalasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setGrado($value);
				break;
			case 1:
				$this->setPaso($value);
				break;
			case 2:
				$this->setSalario($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpescalasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setGrado($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPaso($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSalario($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpescalasPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpescalasPeer::GRADO)) $criteria->add(NpescalasPeer::GRADO, $this->grado);
		if ($this->isColumnModified(NpescalasPeer::PASO)) $criteria->add(NpescalasPeer::PASO, $this->paso);
		if ($this->isColumnModified(NpescalasPeer::SALARIO)) $criteria->add(NpescalasPeer::SALARIO, $this->salario);
		if ($this->isColumnModified(NpescalasPeer::ID)) $criteria->add(NpescalasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpescalasPeer::DATABASE_NAME);

		$criteria->add(NpescalasPeer::ID, $this->id);

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

		$copyObj->setGrado($this->grado);

		$copyObj->setPaso($this->paso);

		$copyObj->setSalario($this->salario);


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
			self::$peer = new NpescalasPeer();
		}
		return self::$peer;
	}

} 