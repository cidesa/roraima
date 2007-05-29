<?php


abstract class BaseFcdetreccob extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nument;


	
	protected $codrec;


	
	protected $codcob;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNument()
	{

		return $this->nument; 		
	}
	
	public function getCodrec()
	{

		return $this->codrec; 		
	}
	
	public function getCodcob()
	{

		return $this->codcob; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNument($v)
	{

		if ($this->nument !== $v) {
			$this->nument = $v;
			$this->modifiedColumns[] = FcdetreccobPeer::NUMENT;
		}

	} 
	
	public function setCodrec($v)
	{

		if ($this->codrec !== $v) {
			$this->codrec = $v;
			$this->modifiedColumns[] = FcdetreccobPeer::CODREC;
		}

	} 
	
	public function setCodcob($v)
	{

		if ($this->codcob !== $v) {
			$this->codcob = $v;
			$this->modifiedColumns[] = FcdetreccobPeer::CODCOB;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdetreccobPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nument = $rs->getString($startcol + 0);

			$this->codrec = $rs->getString($startcol + 1);

			$this->codcob = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdetreccob object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdetreccobPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdetreccobPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdetreccobPeer::DATABASE_NAME);
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
					$pk = FcdetreccobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdetreccobPeer::doUpdate($this, $con);
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


			if (($retval = FcdetreccobPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetreccobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNument();
				break;
			case 1:
				return $this->getCodrec();
				break;
			case 2:
				return $this->getCodcob();
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
		$keys = FcdetreccobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNument(),
			$keys[1] => $this->getCodrec(),
			$keys[2] => $this->getCodcob(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdetreccobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNument($value);
				break;
			case 1:
				$this->setCodrec($value);
				break;
			case 2:
				$this->setCodcob($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdetreccobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNument($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcob($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdetreccobPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdetreccobPeer::NUMENT)) $criteria->add(FcdetreccobPeer::NUMENT, $this->nument);
		if ($this->isColumnModified(FcdetreccobPeer::CODREC)) $criteria->add(FcdetreccobPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FcdetreccobPeer::CODCOB)) $criteria->add(FcdetreccobPeer::CODCOB, $this->codcob);
		if ($this->isColumnModified(FcdetreccobPeer::ID)) $criteria->add(FcdetreccobPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdetreccobPeer::DATABASE_NAME);

		$criteria->add(FcdetreccobPeer::ID, $this->id);

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

		$copyObj->setNument($this->nument);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setCodcob($this->codcob);


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
			self::$peer = new FcdetreccobPeer();
		}
		return self::$peer;
	}

} 