<?php


abstract class BaseCobdetfor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $codcli;


	
	protected $correl;


	
	protected $codfor;


	
	protected $numide;


	
	protected $codban;


	
	protected $monpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumtra()
	{

		return $this->numtra;
	}

	
	public function getCodcli()
	{

		return $this->codcli;
	}

	
	public function getCorrel()
	{

		return $this->correl;
	}

	
	public function getCodfor()
	{

		return $this->codfor;
	}

	
	public function getNumide()
	{

		return $this->numide;
	}

	
	public function getCodban()
	{

		return $this->codban;
	}

	
	public function getMonpag()
	{

		return $this->monpag;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNumtra($v)
	{

		if ($this->numtra !== $v) {
			$this->numtra = $v;
			$this->modifiedColumns[] = CobdetforPeer::NUMTRA;
		}

	} 
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = CobdetforPeer::CODCLI;
		}

	} 
	
	public function setCorrel($v)
	{

		if ($this->correl !== $v) {
			$this->correl = $v;
			$this->modifiedColumns[] = CobdetforPeer::CORREL;
		}

	} 
	
	public function setCodfor($v)
	{

		if ($this->codfor !== $v) {
			$this->codfor = $v;
			$this->modifiedColumns[] = CobdetforPeer::CODFOR;
		}

	} 
	
	public function setNumide($v)
	{

		if ($this->numide !== $v) {
			$this->numide = $v;
			$this->modifiedColumns[] = CobdetforPeer::NUMIDE;
		}

	} 
	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = CobdetforPeer::CODBAN;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = CobdetforPeer::MONPAG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobdetforPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numtra = $rs->getString($startcol + 0);

			$this->codcli = $rs->getString($startcol + 1);

			$this->correl = $rs->getString($startcol + 2);

			$this->codfor = $rs->getString($startcol + 3);

			$this->numide = $rs->getString($startcol + 4);

			$this->codban = $rs->getString($startcol + 5);

			$this->monpag = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobdetfor object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobdetforPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobdetforPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobdetforPeer::DATABASE_NAME);
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
					$pk = CobdetforPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobdetforPeer::doUpdate($this, $con);
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


			if (($retval = CobdetforPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdetforPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getCodcli();
				break;
			case 2:
				return $this->getCorrel();
				break;
			case 3:
				return $this->getCodfor();
				break;
			case 4:
				return $this->getNumide();
				break;
			case 5:
				return $this->getCodban();
				break;
			case 6:
				return $this->getMonpag();
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
		$keys = CobdetforPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getCodcli(),
			$keys[2] => $this->getCorrel(),
			$keys[3] => $this->getCodfor(),
			$keys[4] => $this->getNumide(),
			$keys[5] => $this->getCodban(),
			$keys[6] => $this->getMonpag(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdetforPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setCodcli($value);
				break;
			case 2:
				$this->setCorrel($value);
				break;
			case 3:
				$this->setCodfor($value);
				break;
			case 4:
				$this->setNumide($value);
				break;
			case 5:
				$this->setCodban($value);
				break;
			case 6:
				$this->setMonpag($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdetforPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorrel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodfor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumide($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobdetforPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobdetforPeer::NUMTRA)) $criteria->add(CobdetforPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobdetforPeer::CODCLI)) $criteria->add(CobdetforPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobdetforPeer::CORREL)) $criteria->add(CobdetforPeer::CORREL, $this->correl);
		if ($this->isColumnModified(CobdetforPeer::CODFOR)) $criteria->add(CobdetforPeer::CODFOR, $this->codfor);
		if ($this->isColumnModified(CobdetforPeer::NUMIDE)) $criteria->add(CobdetforPeer::NUMIDE, $this->numide);
		if ($this->isColumnModified(CobdetforPeer::CODBAN)) $criteria->add(CobdetforPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CobdetforPeer::MONPAG)) $criteria->add(CobdetforPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(CobdetforPeer::ID)) $criteria->add(CobdetforPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobdetforPeer::DATABASE_NAME);

		$criteria->add(CobdetforPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCorrel($this->correl);

		$copyObj->setCodfor($this->codfor);

		$copyObj->setNumide($this->numide);

		$copyObj->setCodban($this->codban);

		$copyObj->setMonpag($this->monpag);


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
			self::$peer = new CobdetforPeer();
		}
		return self::$peer;
	}

} 