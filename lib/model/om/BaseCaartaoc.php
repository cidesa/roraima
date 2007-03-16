<?php


abstract class BaseCaartaoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ajuoc;


	
	protected $codart;


	
	protected $codcat;


	
	protected $canord;


	
	protected $canaju;


	
	protected $montot;


	
	protected $monrgo;


	
	protected $monaju;


	
	protected $monrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAjuoc()
	{

		return $this->ajuoc;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCanord()
	{

		return $this->canord;
	}

	
	public function getCanaju()
	{

		return $this->canaju;
	}

	
	public function getMontot()
	{

		return $this->montot;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getMonaju()
	{

		return $this->monaju;
	}

	
	public function getMonrec()
	{

		return $this->monrec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setAjuoc($v)
	{

		if ($this->ajuoc !== $v) {
			$this->ajuoc = $v;
			$this->modifiedColumns[] = CaartaocPeer::AJUOC;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartaocPeer::CODART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaartaocPeer::CODCAT;
		}

	} 
	
	public function setCanord($v)
	{

		if ($this->canord !== $v) {
			$this->canord = $v;
			$this->modifiedColumns[] = CaartaocPeer::CANORD;
		}

	} 
	
	public function setCanaju($v)
	{

		if ($this->canaju !== $v) {
			$this->canaju = $v;
			$this->modifiedColumns[] = CaartaocPeer::CANAJU;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CaartaocPeer::MONTOT;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = CaartaocPeer::MONRGO;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = CaartaocPeer::MONAJU;
		}

	} 
	
	public function setMonrec($v)
	{

		if ($this->monrec !== $v) {
			$this->monrec = $v;
			$this->modifiedColumns[] = CaartaocPeer::MONREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartaocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ajuoc = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->codcat = $rs->getString($startcol + 2);

			$this->canord = $rs->getFloat($startcol + 3);

			$this->canaju = $rs->getFloat($startcol + 4);

			$this->montot = $rs->getFloat($startcol + 5);

			$this->monrgo = $rs->getFloat($startcol + 6);

			$this->monaju = $rs->getFloat($startcol + 7);

			$this->monrec = $rs->getFloat($startcol + 8);

			$this->id = $rs->getInt($startcol + 9);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 10; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartaoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartaocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartaocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartaocPeer::DATABASE_NAME);
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
					$pk = CaartaocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartaocPeer::doUpdate($this, $con);
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


			if (($retval = CaartaocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartaocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAjuoc();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCanord();
				break;
			case 4:
				return $this->getCanaju();
				break;
			case 5:
				return $this->getMontot();
				break;
			case 6:
				return $this->getMonrgo();
				break;
			case 7:
				return $this->getMonaju();
				break;
			case 8:
				return $this->getMonrec();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartaocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAjuoc(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCanord(),
			$keys[4] => $this->getCanaju(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getMonrgo(),
			$keys[7] => $this->getMonaju(),
			$keys[8] => $this->getMonrec(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartaocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAjuoc($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCanord($value);
				break;
			case 4:
				$this->setCanaju($value);
				break;
			case 5:
				$this->setMontot($value);
				break;
			case 6:
				$this->setMonrgo($value);
				break;
			case 7:
				$this->setMonaju($value);
				break;
			case 8:
				$this->setMonrec($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartaocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAjuoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrgo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonaju($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonrec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartaocPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartaocPeer::AJUOC)) $criteria->add(CaartaocPeer::AJUOC, $this->ajuoc);
		if ($this->isColumnModified(CaartaocPeer::CODART)) $criteria->add(CaartaocPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartaocPeer::CODCAT)) $criteria->add(CaartaocPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartaocPeer::CANORD)) $criteria->add(CaartaocPeer::CANORD, $this->canord);
		if ($this->isColumnModified(CaartaocPeer::CANAJU)) $criteria->add(CaartaocPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(CaartaocPeer::MONTOT)) $criteria->add(CaartaocPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CaartaocPeer::MONRGO)) $criteria->add(CaartaocPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CaartaocPeer::MONAJU)) $criteria->add(CaartaocPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CaartaocPeer::MONREC)) $criteria->add(CaartaocPeer::MONREC, $this->monrec);
		if ($this->isColumnModified(CaartaocPeer::ID)) $criteria->add(CaartaocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartaocPeer::DATABASE_NAME);

		$criteria->add(CaartaocPeer::ID, $this->id);

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

		$copyObj->setAjuoc($this->ajuoc);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCanord($this->canord);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setMontot($this->montot);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setMonrec($this->monrec);


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
			self::$peer = new CaartaocPeer();
		}
		return self::$peer;
	}

} 