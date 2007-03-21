<?php


abstract class BaseNpprofesion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprofes;


	
	protected $desprofes;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodprofes()
	{

		return $this->codprofes;
	}

	
	public function getDesprofes()
	{

		return $this->desprofes;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodprofes($v)
	{

		if ($this->codprofes !== $v) {
			$this->codprofes = $v;
			$this->modifiedColumns[] = NpprofesionPeer::CODPROFES;
		}

	} 
	
	public function setDesprofes($v)
	{

		if ($this->desprofes !== $v) {
			$this->desprofes = $v;
			$this->modifiedColumns[] = NpprofesionPeer::DESPROFES;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpprofesionPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprofes = $rs->getString($startcol + 0);

			$this->desprofes = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npprofesion object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpprofesionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpprofesionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpprofesionPeer::DATABASE_NAME);
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
					$pk = NpprofesionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpprofesionPeer::doUpdate($this, $con);
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


			if (($retval = NpprofesionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprofesionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprofes();
				break;
			case 1:
				return $this->getDesprofes();
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
		$keys = NpprofesionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprofes(),
			$keys[1] => $this->getDesprofes(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpprofesionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprofes($value);
				break;
			case 1:
				$this->setDesprofes($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpprofesionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprofes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesprofes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpprofesionPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpprofesionPeer::CODPROFES)) $criteria->add(NpprofesionPeer::CODPROFES, $this->codprofes);
		if ($this->isColumnModified(NpprofesionPeer::DESPROFES)) $criteria->add(NpprofesionPeer::DESPROFES, $this->desprofes);
		if ($this->isColumnModified(NpprofesionPeer::ID)) $criteria->add(NpprofesionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpprofesionPeer::DATABASE_NAME);

		$criteria->add(NpprofesionPeer::ID, $this->id);

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

		$copyObj->setCodprofes($this->codprofes);

		$copyObj->setDesprofes($this->desprofes);


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
			self::$peer = new NpprofesionPeer();
		}
		return self::$peer;
	}

} 