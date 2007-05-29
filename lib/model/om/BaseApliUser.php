<?php


abstract class BaseApliUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codapl;


	
	protected $loguse;


	
	protected $codemp;


	
	protected $nomopc;


	
	protected $priuse;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodapl()
	{

		return $this->codapl; 		
	}
	
	public function getLoguse()
	{

		return $this->loguse; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNomopc()
	{

		return $this->nomopc; 		
	}
	
	public function getPriuse()
	{

		return number_format($this->priuse,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodapl($v)
	{

		if ($this->codapl !== $v) {
			$this->codapl = $v;
			$this->modifiedColumns[] = ApliUserPeer::CODAPL;
		}

	} 
	
	public function setLoguse($v)
	{

		if ($this->loguse !== $v) {
			$this->loguse = $v;
			$this->modifiedColumns[] = ApliUserPeer::LOGUSE;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = ApliUserPeer::CODEMP;
		}

	} 
	
	public function setNomopc($v)
	{

		if ($this->nomopc !== $v) {
			$this->nomopc = $v;
			$this->modifiedColumns[] = ApliUserPeer::NOMOPC;
		}

	} 
	
	public function setPriuse($v)
	{

		if ($this->priuse !== $v) {
			$this->priuse = $v;
			$this->modifiedColumns[] = ApliUserPeer::PRIUSE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ApliUserPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codapl = $rs->getString($startcol + 0);

			$this->loguse = $rs->getString($startcol + 1);

			$this->codemp = $rs->getString($startcol + 2);

			$this->nomopc = $rs->getString($startcol + 3);

			$this->priuse = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ApliUser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ApliUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ApliUserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ApliUserPeer::DATABASE_NAME);
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
					$pk = ApliUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ApliUserPeer::doUpdate($this, $con);
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


			if (($retval = ApliUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ApliUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodapl();
				break;
			case 1:
				return $this->getLoguse();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getNomopc();
				break;
			case 4:
				return $this->getPriuse();
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
		$keys = ApliUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodapl(),
			$keys[1] => $this->getLoguse(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getNomopc(),
			$keys[4] => $this->getPriuse(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ApliUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodapl($value);
				break;
			case 1:
				$this->setLoguse($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setNomopc($value);
				break;
			case 4:
				$this->setPriuse($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ApliUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodapl($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLoguse($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNomopc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPriuse($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ApliUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(ApliUserPeer::CODAPL)) $criteria->add(ApliUserPeer::CODAPL, $this->codapl);
		if ($this->isColumnModified(ApliUserPeer::LOGUSE)) $criteria->add(ApliUserPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(ApliUserPeer::CODEMP)) $criteria->add(ApliUserPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ApliUserPeer::NOMOPC)) $criteria->add(ApliUserPeer::NOMOPC, $this->nomopc);
		if ($this->isColumnModified(ApliUserPeer::PRIUSE)) $criteria->add(ApliUserPeer::PRIUSE, $this->priuse);
		if ($this->isColumnModified(ApliUserPeer::ID)) $criteria->add(ApliUserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ApliUserPeer::DATABASE_NAME);

		$criteria->add(ApliUserPeer::ID, $this->id);

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

		$copyObj->setCodapl($this->codapl);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomopc($this->nomopc);

		$copyObj->setPriuse($this->priuse);


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
			self::$peer = new ApliUserPeer();
		}
		return self::$peer;
	}

} 