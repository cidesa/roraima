<?php


abstract class BaseCobpagban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codban;


	
	protected $nomban;


	
	protected $dirban;


	
	protected $telban;


	
	protected $faxban;


	
	protected $emaban;


	
	protected $conban;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodban()
	{

		return $this->codban;
	}

	
	public function getNomban()
	{

		return $this->nomban;
	}

	
	public function getDirban()
	{

		return $this->dirban;
	}

	
	public function getTelban()
	{

		return $this->telban;
	}

	
	public function getFaxban()
	{

		return $this->faxban;
	}

	
	public function getEmaban()
	{

		return $this->emaban;
	}

	
	public function getConban()
	{

		return $this->conban;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::CODBAN;
		}

	} 
	
	public function setNomban($v)
	{

		if ($this->nomban !== $v) {
			$this->nomban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::NOMBAN;
		}

	} 
	
	public function setDirban($v)
	{

		if ($this->dirban !== $v) {
			$this->dirban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::DIRBAN;
		}

	} 
	
	public function setTelban($v)
	{

		if ($this->telban !== $v) {
			$this->telban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::TELBAN;
		}

	} 
	
	public function setFaxban($v)
	{

		if ($this->faxban !== $v) {
			$this->faxban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::FAXBAN;
		}

	} 
	
	public function setEmaban($v)
	{

		if ($this->emaban !== $v) {
			$this->emaban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::EMABAN;
		}

	} 
	
	public function setConban($v)
	{

		if ($this->conban !== $v) {
			$this->conban = $v;
			$this->modifiedColumns[] = CobpagbanPeer::CONBAN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobpagbanPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codban = $rs->getString($startcol + 0);

			$this->nomban = $rs->getString($startcol + 1);

			$this->dirban = $rs->getString($startcol + 2);

			$this->telban = $rs->getString($startcol + 3);

			$this->faxban = $rs->getString($startcol + 4);

			$this->emaban = $rs->getString($startcol + 5);

			$this->conban = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobpagban object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobpagbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobpagbanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobpagbanPeer::DATABASE_NAME);
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
					$pk = CobpagbanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobpagbanPeer::doUpdate($this, $con);
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


			if (($retval = CobpagbanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobpagbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodban();
				break;
			case 1:
				return $this->getNomban();
				break;
			case 2:
				return $this->getDirban();
				break;
			case 3:
				return $this->getTelban();
				break;
			case 4:
				return $this->getFaxban();
				break;
			case 5:
				return $this->getEmaban();
				break;
			case 6:
				return $this->getConban();
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
		$keys = CobpagbanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodban(),
			$keys[1] => $this->getNomban(),
			$keys[2] => $this->getDirban(),
			$keys[3] => $this->getTelban(),
			$keys[4] => $this->getFaxban(),
			$keys[5] => $this->getEmaban(),
			$keys[6] => $this->getConban(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobpagbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodban($value);
				break;
			case 1:
				$this->setNomban($value);
				break;
			case 2:
				$this->setDirban($value);
				break;
			case 3:
				$this->setTelban($value);
				break;
			case 4:
				$this->setFaxban($value);
				break;
			case 5:
				$this->setEmaban($value);
				break;
			case 6:
				$this->setConban($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobpagbanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodban($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomban($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirban($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelban($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxban($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmaban($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConban($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobpagbanPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobpagbanPeer::CODBAN)) $criteria->add(CobpagbanPeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CobpagbanPeer::NOMBAN)) $criteria->add(CobpagbanPeer::NOMBAN, $this->nomban);
		if ($this->isColumnModified(CobpagbanPeer::DIRBAN)) $criteria->add(CobpagbanPeer::DIRBAN, $this->dirban);
		if ($this->isColumnModified(CobpagbanPeer::TELBAN)) $criteria->add(CobpagbanPeer::TELBAN, $this->telban);
		if ($this->isColumnModified(CobpagbanPeer::FAXBAN)) $criteria->add(CobpagbanPeer::FAXBAN, $this->faxban);
		if ($this->isColumnModified(CobpagbanPeer::EMABAN)) $criteria->add(CobpagbanPeer::EMABAN, $this->emaban);
		if ($this->isColumnModified(CobpagbanPeer::CONBAN)) $criteria->add(CobpagbanPeer::CONBAN, $this->conban);
		if ($this->isColumnModified(CobpagbanPeer::ID)) $criteria->add(CobpagbanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobpagbanPeer::DATABASE_NAME);

		$criteria->add(CobpagbanPeer::ID, $this->id);

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

		$copyObj->setCodban($this->codban);

		$copyObj->setNomban($this->nomban);

		$copyObj->setDirban($this->dirban);

		$copyObj->setTelban($this->telban);

		$copyObj->setFaxban($this->faxban);

		$copyObj->setEmaban($this->emaban);

		$copyObj->setConban($this->conban);


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
			self::$peer = new CobpagbanPeer();
		}
		return self::$peer;
	}

} 