<?php


abstract class BaseCaartdrcp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $devrcp;


	
	protected $codart;


	
	protected $codcat;


	
	protected $canrec;


	
	protected $candev;


	
	protected $montot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getDevrcp()
	{

		return $this->devrcp; 		
	}
	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCanrec()
	{

		return number_format($this->canrec,2,',','.');
		
	}
	
	public function getCandev()
	{

		return number_format($this->candev,2,',','.');
		
	}
	
	public function getMontot()
	{

		return number_format($this->montot,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setDevrcp($v)
	{

		if ($this->devrcp !== $v) {
			$this->devrcp = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::DEVRCP;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::CODART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::CODCAT;
		}

	} 
	
	public function setCanrec($v)
	{

		if ($this->canrec !== $v) {
			$this->canrec = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::CANREC;
		}

	} 
	
	public function setCandev($v)
	{

		if ($this->candev !== $v) {
			$this->candev = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::CANDEV;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::MONTOT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartdrcpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->devrcp = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->codcat = $rs->getString($startcol + 2);

			$this->canrec = $rs->getFloat($startcol + 3);

			$this->candev = $rs->getFloat($startcol + 4);

			$this->montot = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartdrcp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartdrcpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartdrcpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartdrcpPeer::DATABASE_NAME);
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
					$pk = CaartdrcpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartdrcpPeer::doUpdate($this, $con);
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


			if (($retval = CaartdrcpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartdrcpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDevrcp();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCanrec();
				break;
			case 4:
				return $this->getCandev();
				break;
			case 5:
				return $this->getMontot();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartdrcpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDevrcp(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCanrec(),
			$keys[4] => $this->getCandev(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartdrcpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDevrcp($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCanrec($value);
				break;
			case 4:
				$this->setCandev($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartdrcpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDevrcp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCandev($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartdrcpPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartdrcpPeer::DEVRCP)) $criteria->add(CaartdrcpPeer::DEVRCP, $this->devrcp);
		if ($this->isColumnModified(CaartdrcpPeer::CODART)) $criteria->add(CaartdrcpPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartdrcpPeer::CODCAT)) $criteria->add(CaartdrcpPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartdrcpPeer::CANREC)) $criteria->add(CaartdrcpPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CaartdrcpPeer::CANDEV)) $criteria->add(CaartdrcpPeer::CANDEV, $this->candev);
		if ($this->isColumnModified(CaartdrcpPeer::MONTOT)) $criteria->add(CaartdrcpPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CaartdrcpPeer::ID)) $criteria->add(CaartdrcpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartdrcpPeer::DATABASE_NAME);

		$criteria->add(CaartdrcpPeer::ID, $this->id);

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

		$copyObj->setDevrcp($this->devrcp);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCandev($this->candev);

		$copyObj->setMontot($this->montot);


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
			self::$peer = new CaartdrcpPeer();
		}
		return self::$peer;
	}

} 