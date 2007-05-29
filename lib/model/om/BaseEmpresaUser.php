<?php


abstract class BaseEmpresaUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $tlfemp;


	
	protected $passemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getDiremp()
	{

		return $this->diremp; 		
	}
	
	public function getTlfemp()
	{

		return $this->tlfemp; 		
	}
	
	public function getPassemp()
	{

		return $this->passemp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = EmpresaUserPeer::CODEMP;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = EmpresaUserPeer::NOMEMP;
		}

	} 
	
	public function setDiremp($v)
	{

		if ($this->diremp !== $v) {
			$this->diremp = $v;
			$this->modifiedColumns[] = EmpresaUserPeer::DIREMP;
		}

	} 
	
	public function setTlfemp($v)
	{

		if ($this->tlfemp !== $v) {
			$this->tlfemp = $v;
			$this->modifiedColumns[] = EmpresaUserPeer::TLFEMP;
		}

	} 
	
	public function setPassemp($v)
	{

		if ($this->passemp !== $v) {
			$this->passemp = $v;
			$this->modifiedColumns[] = EmpresaUserPeer::PASSEMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EmpresaUserPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->nomemp = $rs->getString($startcol + 1);

			$this->diremp = $rs->getString($startcol + 2);

			$this->tlfemp = $rs->getString($startcol + 3);

			$this->passemp = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating EmpresaUser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EmpresaUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EmpresaUserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EmpresaUserPeer::DATABASE_NAME);
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
					$pk = EmpresaUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += EmpresaUserPeer::doUpdate($this, $con);
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


			if (($retval = EmpresaUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmpresaUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getDiremp();
				break;
			case 3:
				return $this->getTlfemp();
				break;
			case 4:
				return $this->getPassemp();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmpresaUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getDiremp(),
			$keys[3] => $this->getTlfemp(),
			$keys[4] => $this->getPassemp(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EmpresaUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setDiremp($value);
				break;
			case 3:
				$this->setTlfemp($value);
				break;
			case 4:
				$this->setPassemp($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EmpresaUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiremp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTlfemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EmpresaUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(EmpresaUserPeer::CODEMP)) $criteria->add(EmpresaUserPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(EmpresaUserPeer::NOMEMP)) $criteria->add(EmpresaUserPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(EmpresaUserPeer::DIREMP)) $criteria->add(EmpresaUserPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(EmpresaUserPeer::TLFEMP)) $criteria->add(EmpresaUserPeer::TLFEMP, $this->tlfemp);
		if ($this->isColumnModified(EmpresaUserPeer::PASSEMP)) $criteria->add(EmpresaUserPeer::PASSEMP, $this->passemp);
		if ($this->isColumnModified(EmpresaUserPeer::ID)) $criteria->add(EmpresaUserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EmpresaUserPeer::DATABASE_NAME);

		$criteria->add(EmpresaUserPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTlfemp($this->tlfemp);

		$copyObj->setPassemp($this->passemp);


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
			self::$peer = new EmpresaUserPeer();
		}
		return self::$peer;
	}

} 