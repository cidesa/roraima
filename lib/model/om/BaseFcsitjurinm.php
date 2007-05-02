<?php


abstract class BaseFcsitjurinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsitinm;


	
	protected $nomsitinm;


	
	protected $stasitinm;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsitinm()
	{

		return $this->codsitinm;
	}

	
	public function getNomsitinm()
	{

		return $this->nomsitinm;
	}

	
	public function getStasitinm()
	{

		return $this->stasitinm;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodsitinm($v)
	{

		if ($this->codsitinm !== $v) {
			$this->codsitinm = $v;
			$this->modifiedColumns[] = FcsitjurinmPeer::CODSITINM;
		}

	} 
	
	public function setNomsitinm($v)
	{

		if ($this->nomsitinm !== $v) {
			$this->nomsitinm = $v;
			$this->modifiedColumns[] = FcsitjurinmPeer::NOMSITINM;
		}

	} 
	
	public function setStasitinm($v)
	{

		if ($this->stasitinm !== $v) {
			$this->stasitinm = $v;
			$this->modifiedColumns[] = FcsitjurinmPeer::STASITINM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcsitjurinmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsitinm = $rs->getString($startcol + 0);

			$this->nomsitinm = $rs->getString($startcol + 1);

			$this->stasitinm = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcsitjurinm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcsitjurinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcsitjurinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcsitjurinmPeer::DATABASE_NAME);
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
					$pk = FcsitjurinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcsitjurinmPeer::doUpdate($this, $con);
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


			if (($retval = FcsitjurinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsitjurinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsitinm();
				break;
			case 1:
				return $this->getNomsitinm();
				break;
			case 2:
				return $this->getStasitinm();
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
		$keys = FcsitjurinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsitinm(),
			$keys[1] => $this->getNomsitinm(),
			$keys[2] => $this->getStasitinm(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcsitjurinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsitinm($value);
				break;
			case 1:
				$this->setNomsitinm($value);
				break;
			case 2:
				$this->setStasitinm($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcsitjurinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsitinm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomsitinm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStasitinm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcsitjurinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcsitjurinmPeer::CODSITINM)) $criteria->add(FcsitjurinmPeer::CODSITINM, $this->codsitinm);
		if ($this->isColumnModified(FcsitjurinmPeer::NOMSITINM)) $criteria->add(FcsitjurinmPeer::NOMSITINM, $this->nomsitinm);
		if ($this->isColumnModified(FcsitjurinmPeer::STASITINM)) $criteria->add(FcsitjurinmPeer::STASITINM, $this->stasitinm);
		if ($this->isColumnModified(FcsitjurinmPeer::ID)) $criteria->add(FcsitjurinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcsitjurinmPeer::DATABASE_NAME);

		$criteria->add(FcsitjurinmPeer::CODSITINM, $this->codsitinm);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCodsitinm();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCodsitinm($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomsitinm($this->nomsitinm);

		$copyObj->setStasitinm($this->stasitinm);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCodsitinm(NULL); 
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
			self::$peer = new FcsitjurinmPeer();
		}
		return self::$peer;
	}

} 