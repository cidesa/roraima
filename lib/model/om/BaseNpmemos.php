<?php


abstract class BaseNpmemos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmem;


	
	protected $codcon;


	
	protected $nomcon;


	
	protected $nomben;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmem()
	{

		return $this->codmem; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getNomcon()
	{

		return $this->nomcon; 		
	}
	
	public function getNomben()
	{

		return $this->nomben; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmem($v)
	{

		if ($this->codmem !== $v) {
			$this->codmem = $v;
			$this->modifiedColumns[] = NpmemosPeer::CODMEM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpmemosPeer::CODCON;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = NpmemosPeer::NOMCON;
		}

	} 
	
	public function setNomben($v)
	{

		if ($this->nomben !== $v) {
			$this->nomben = $v;
			$this->modifiedColumns[] = NpmemosPeer::NOMBEN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpmemosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmem = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->nomcon = $rs->getString($startcol + 2);

			$this->nomben = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npmemos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpmemosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpmemosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpmemosPeer::DATABASE_NAME);
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
					$pk = NpmemosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpmemosPeer::doUpdate($this, $con);
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


			if (($retval = NpmemosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmemosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmem();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getNomcon();
				break;
			case 3:
				return $this->getNomben();
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
		$keys = NpmemosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmem(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getNomcon(),
			$keys[3] => $this->getNomben(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmemosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmem($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setNomcon($value);
				break;
			case 3:
				$this->setNomben($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmemosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmem($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomben($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpmemosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpmemosPeer::CODMEM)) $criteria->add(NpmemosPeer::CODMEM, $this->codmem);
		if ($this->isColumnModified(NpmemosPeer::CODCON)) $criteria->add(NpmemosPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpmemosPeer::NOMCON)) $criteria->add(NpmemosPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpmemosPeer::NOMBEN)) $criteria->add(NpmemosPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(NpmemosPeer::ID)) $criteria->add(NpmemosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpmemosPeer::DATABASE_NAME);

		$criteria->add(NpmemosPeer::ID, $this->id);

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

		$copyObj->setCodmem($this->codmem);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNomben($this->nomben);


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
			self::$peer = new NpmemosPeer();
		}
		return self::$peer;
	}

} 