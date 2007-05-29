<?php


abstract class BaseNpperfil extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codperfil;


	
	protected $desperfil;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodperfil()
	{

		return $this->codperfil; 		
	}
	
	public function getDesperfil()
	{

		return $this->desperfil; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodperfil($v)
	{

		if ($this->codperfil !== $v) {
			$this->codperfil = $v;
			$this->modifiedColumns[] = NpperfilPeer::CODPERFIL;
		}

	} 
	
	public function setDesperfil($v)
	{

		if ($this->desperfil !== $v) {
			$this->desperfil = $v;
			$this->modifiedColumns[] = NpperfilPeer::DESPERFIL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpperfilPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codperfil = $rs->getString($startcol + 0);

			$this->desperfil = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npperfil object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpperfilPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpperfilPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpperfilPeer::DATABASE_NAME);
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
					$pk = NpperfilPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpperfilPeer::doUpdate($this, $con);
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


			if (($retval = NpperfilPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpperfilPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodperfil();
				break;
			case 1:
				return $this->getDesperfil();
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
		$keys = NpperfilPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodperfil(),
			$keys[1] => $this->getDesperfil(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpperfilPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodperfil($value);
				break;
			case 1:
				$this->setDesperfil($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpperfilPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodperfil($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesperfil($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpperfilPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpperfilPeer::CODPERFIL)) $criteria->add(NpperfilPeer::CODPERFIL, $this->codperfil);
		if ($this->isColumnModified(NpperfilPeer::DESPERFIL)) $criteria->add(NpperfilPeer::DESPERFIL, $this->desperfil);
		if ($this->isColumnModified(NpperfilPeer::ID)) $criteria->add(NpperfilPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpperfilPeer::DATABASE_NAME);

		$criteria->add(NpperfilPeer::ID, $this->id);

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

		$copyObj->setCodperfil($this->codperfil);

		$copyObj->setDesperfil($this->desperfil);


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
			self::$peer = new NpperfilPeer();
		}
		return self::$peer;
	}

} 