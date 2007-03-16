<?php


abstract class BaseCaartreq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $codart;


	
	protected $codcat;


	
	protected $canreq;


	
	protected $canrec;


	
	protected $montot;


	
	protected $unimed;


	
	protected $relart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReqart()
	{

		return $this->reqart;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCanreq()
	{

		return $this->canreq;
	}

	
	public function getCanrec()
	{

		return $this->canrec;
	}

	
	public function getMontot()
	{

		return $this->montot;
	}

	
	public function getUnimed()
	{

		return $this->unimed;
	}

	
	public function getRelart()
	{

		return $this->relart;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setReqart($v)
	{

		if ($this->reqart !== $v) {
			$this->reqart = $v;
			$this->modifiedColumns[] = CaartreqPeer::REQART;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartreqPeer::CODART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaartreqPeer::CODCAT;
		}

	} 
	
	public function setCanreq($v)
	{

		if ($this->canreq !== $v) {
			$this->canreq = $v;
			$this->modifiedColumns[] = CaartreqPeer::CANREQ;
		}

	} 
	
	public function setCanrec($v)
	{

		if ($this->canrec !== $v) {
			$this->canrec = $v;
			$this->modifiedColumns[] = CaartreqPeer::CANREC;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CaartreqPeer::MONTOT;
		}

	} 
	
	public function setUnimed($v)
	{

		if ($this->unimed !== $v) {
			$this->unimed = $v;
			$this->modifiedColumns[] = CaartreqPeer::UNIMED;
		}

	} 
	
	public function setRelart($v)
	{

		if ($this->relart !== $v) {
			$this->relart = $v;
			$this->modifiedColumns[] = CaartreqPeer::RELART;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartreqPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reqart = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->codcat = $rs->getString($startcol + 2);

			$this->canreq = $rs->getFloat($startcol + 3);

			$this->canrec = $rs->getFloat($startcol + 4);

			$this->montot = $rs->getFloat($startcol + 5);

			$this->unimed = $rs->getString($startcol + 6);

			$this->relart = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartreq object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartreqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartreqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartreqPeer::DATABASE_NAME);
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
					$pk = CaartreqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartreqPeer::doUpdate($this, $con);
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


			if (($retval = CaartreqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartreqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCanreq();
				break;
			case 4:
				return $this->getCanrec();
				break;
			case 5:
				return $this->getMontot();
				break;
			case 6:
				return $this->getUnimed();
				break;
			case 7:
				return $this->getRelart();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartreqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCanreq(),
			$keys[4] => $this->getCanrec(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getUnimed(),
			$keys[7] => $this->getRelart(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartreqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCanreq($value);
				break;
			case 4:
				$this->setCanrec($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setUnimed($value);
				break;
			case 7:
				$this->setRelart($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartreqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnimed($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRelart($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartreqPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartreqPeer::REQART)) $criteria->add(CaartreqPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CaartreqPeer::CODART)) $criteria->add(CaartreqPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartreqPeer::CODCAT)) $criteria->add(CaartreqPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartreqPeer::CANREQ)) $criteria->add(CaartreqPeer::CANREQ, $this->canreq);
		if ($this->isColumnModified(CaartreqPeer::CANREC)) $criteria->add(CaartreqPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CaartreqPeer::MONTOT)) $criteria->add(CaartreqPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CaartreqPeer::UNIMED)) $criteria->add(CaartreqPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(CaartreqPeer::RELART)) $criteria->add(CaartreqPeer::RELART, $this->relart);
		if ($this->isColumnModified(CaartreqPeer::ID)) $criteria->add(CaartreqPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartreqPeer::DATABASE_NAME);

		$criteria->add(CaartreqPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCanreq($this->canreq);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setMontot($this->montot);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setRelart($this->relart);


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
			self::$peer = new CaartreqPeer();
		}
		return self::$peer;
	}

} 