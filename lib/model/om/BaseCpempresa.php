<?php


abstract class BaseCpempresa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $rifemp;


	
	protected $nitemp;


	
	protected $nomemp;


	
	protected $desemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getRifemp()
	{

		return $this->rifemp; 		
	}
	
	public function getNitemp()
	{

		return $this->nitemp; 		
	}
	
	public function getNomemp()
	{

		return $this->nomemp; 		
	}
	
	public function getDesemp()
	{

		return $this->desemp; 		
	}
	
	public function getDiremp()
	{

		return $this->diremp; 		
	}
	
	public function getTelemp()
	{

		return $this->telemp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = CpempresaPeer::CODEMP;
		}

	} 
	
	public function setRifemp($v)
	{

		if ($this->rifemp !== $v) {
			$this->rifemp = $v;
			$this->modifiedColumns[] = CpempresaPeer::RIFEMP;
		}

	} 
	
	public function setNitemp($v)
	{

		if ($this->nitemp !== $v) {
			$this->nitemp = $v;
			$this->modifiedColumns[] = CpempresaPeer::NITEMP;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = CpempresaPeer::NOMEMP;
		}

	} 
	
	public function setDesemp($v)
	{

		if ($this->desemp !== $v) {
			$this->desemp = $v;
			$this->modifiedColumns[] = CpempresaPeer::DESEMP;
		}

	} 
	
	public function setDiremp($v)
	{

		if ($this->diremp !== $v) {
			$this->diremp = $v;
			$this->modifiedColumns[] = CpempresaPeer::DIREMP;
		}

	} 
	
	public function setTelemp($v)
	{

		if ($this->telemp !== $v) {
			$this->telemp = $v;
			$this->modifiedColumns[] = CpempresaPeer::TELEMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpempresaPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codemp = $rs->getString($startcol + 0);

			$this->rifemp = $rs->getString($startcol + 1);

			$this->nitemp = $rs->getString($startcol + 2);

			$this->nomemp = $rs->getString($startcol + 3);

			$this->desemp = $rs->getString($startcol + 4);

			$this->diremp = $rs->getString($startcol + 5);

			$this->telemp = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpempresa object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpempresaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpempresaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpempresaPeer::DATABASE_NAME);
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
					$pk = CpempresaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpempresaPeer::doUpdate($this, $con);
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


			if (($retval = CpempresaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpempresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getRifemp();
				break;
			case 2:
				return $this->getNitemp();
				break;
			case 3:
				return $this->getNomemp();
				break;
			case 4:
				return $this->getDesemp();
				break;
			case 5:
				return $this->getDiremp();
				break;
			case 6:
				return $this->getTelemp();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpempresaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getRifemp(),
			$keys[2] => $this->getNitemp(),
			$keys[3] => $this->getNomemp(),
			$keys[4] => $this->getDesemp(),
			$keys[5] => $this->getDiremp(),
			$keys[6] => $this->getTelemp(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpempresaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setRifemp($value);
				break;
			case 2:
				$this->setNitemp($value);
				break;
			case 3:
				$this->setNomemp($value);
				break;
			case 4:
				$this->setDesemp($value);
				break;
			case 5:
				$this->setDiremp($value);
				break;
			case 6:
				$this->setTelemp($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpempresaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNitemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiremp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpempresaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpempresaPeer::CODEMP)) $criteria->add(CpempresaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CpempresaPeer::RIFEMP)) $criteria->add(CpempresaPeer::RIFEMP, $this->rifemp);
		if ($this->isColumnModified(CpempresaPeer::NITEMP)) $criteria->add(CpempresaPeer::NITEMP, $this->nitemp);
		if ($this->isColumnModified(CpempresaPeer::NOMEMP)) $criteria->add(CpempresaPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(CpempresaPeer::DESEMP)) $criteria->add(CpempresaPeer::DESEMP, $this->desemp);
		if ($this->isColumnModified(CpempresaPeer::DIREMP)) $criteria->add(CpempresaPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(CpempresaPeer::TELEMP)) $criteria->add(CpempresaPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(CpempresaPeer::ID)) $criteria->add(CpempresaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpempresaPeer::DATABASE_NAME);

		$criteria->add(CpempresaPeer::ID, $this->id);

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

		$copyObj->setRifemp($this->rifemp);

		$copyObj->setNitemp($this->nitemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDesemp($this->desemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);


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
			self::$peer = new CpempresaPeer();
		}
		return self::$peer;
	}

} 