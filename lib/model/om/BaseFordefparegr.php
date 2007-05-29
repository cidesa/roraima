<?php


abstract class BaseFordefparegr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codparegr;


	
	protected $nomparegr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodparegr()
	{

		return $this->codparegr; 		
	}
	
	public function getNomparegr()
	{

		return $this->nomparegr; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodparegr($v)
	{

		if ($this->codparegr !== $v) {
			$this->codparegr = $v;
			$this->modifiedColumns[] = FordefparegrPeer::CODPAREGR;
		}

	} 
	
	public function setNomparegr($v)
	{

		if ($this->nomparegr !== $v) {
			$this->nomparegr = $v;
			$this->modifiedColumns[] = FordefparegrPeer::NOMPAREGR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefparegrPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codparegr = $rs->getString($startcol + 0);

			$this->nomparegr = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefparegr object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefparegrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefparegrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefparegrPeer::DATABASE_NAME);
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
					$pk = FordefparegrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefparegrPeer::doUpdate($this, $con);
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


			if (($retval = FordefparegrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefparegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodparegr();
				break;
			case 1:
				return $this->getNomparegr();
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
		$keys = FordefparegrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodparegr(),
			$keys[1] => $this->getNomparegr(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefparegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodparegr($value);
				break;
			case 1:
				$this->setNomparegr($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefparegrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodparegr($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomparegr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefparegrPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefparegrPeer::CODPAREGR)) $criteria->add(FordefparegrPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(FordefparegrPeer::NOMPAREGR)) $criteria->add(FordefparegrPeer::NOMPAREGR, $this->nomparegr);
		if ($this->isColumnModified(FordefparegrPeer::ID)) $criteria->add(FordefparegrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefparegrPeer::DATABASE_NAME);

		$criteria->add(FordefparegrPeer::ID, $this->id);

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

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setNomparegr($this->nomparegr);


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
			self::$peer = new FordefparegrPeer();
		}
		return self::$peer;
	}

} 