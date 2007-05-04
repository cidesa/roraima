<?php


abstract class BaseFcrecurso extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coding;


	
	protected $desing;


	
	protected $moning;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoding()
	{

		return $this->coding;
	}

	
	public function getDesing()
	{

		return $this->desing;
	}

	
	public function getMoning()
	{

		return $this->moning;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoding($v)
	{

		if ($this->coding !== $v) {
			$this->coding = $v;
			$this->modifiedColumns[] = FcrecursoPeer::CODING;
		}

	} 
	
	public function setDesing($v)
	{

		if ($this->desing !== $v) {
			$this->desing = $v;
			$this->modifiedColumns[] = FcrecursoPeer::DESING;
		}

	} 
	
	public function setMoning($v)
	{

		if ($this->moning !== $v) {
			$this->moning = $v;
			$this->modifiedColumns[] = FcrecursoPeer::MONING;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrecursoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coding = $rs->getString($startcol + 0);

			$this->desing = $rs->getString($startcol + 1);

			$this->moning = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrecurso object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrecursoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrecursoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrecursoPeer::DATABASE_NAME);
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
					$pk = FcrecursoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrecursoPeer::doUpdate($this, $con);
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


			if (($retval = FcrecursoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecursoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoding();
				break;
			case 1:
				return $this->getDesing();
				break;
			case 2:
				return $this->getMoning();
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
		$keys = FcrecursoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoding(),
			$keys[1] => $this->getDesing(),
			$keys[2] => $this->getMoning(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrecursoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoding($value);
				break;
			case 1:
				$this->setDesing($value);
				break;
			case 2:
				$this->setMoning($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrecursoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoding($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesing($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoning($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrecursoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrecursoPeer::CODING)) $criteria->add(FcrecursoPeer::CODING, $this->coding);
		if ($this->isColumnModified(FcrecursoPeer::DESING)) $criteria->add(FcrecursoPeer::DESING, $this->desing);
		if ($this->isColumnModified(FcrecursoPeer::MONING)) $criteria->add(FcrecursoPeer::MONING, $this->moning);
		if ($this->isColumnModified(FcrecursoPeer::ID)) $criteria->add(FcrecursoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrecursoPeer::DATABASE_NAME);

		$criteria->add(FcrecursoPeer::ID, $this->id);

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

		$copyObj->setCoding($this->coding);

		$copyObj->setDesing($this->desing);

		$copyObj->setMoning($this->moning);


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
			self::$peer = new FcrecursoPeer();
		}
		return self::$peer;
	}

} 