<?php


abstract class BaseCaartsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $codart;


	
	protected $codcat;


	
	protected $canreq;


	
	protected $canrec;


	
	protected $montot;


	
	protected $costo;


	
	protected $monrgo;


	
	protected $canord;


	
	protected $mondes;


	
	protected $relart;


	
	protected $unimed;


	
	protected $codpar;


	
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

	
	public function getCosto()
	{

		return $this->costo;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getCanord()
	{

		return $this->canord;
	}

	
	public function getMondes()
	{

		return $this->mondes;
	}

	
	public function getRelart()
	{

		return $this->relart;
	}

	
	public function getUnimed()
	{

		return $this->unimed;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setReqart($v)
	{

		if ($this->reqart !== $v) {
			$this->reqart = $v;
			$this->modifiedColumns[] = CaartsolPeer::REQART;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartsolPeer::CODART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CaartsolPeer::CODCAT;
		}

	} 
	
	public function setCanreq($v)
	{

		if ($this->canreq !== $v) {
			$this->canreq = $v;
			$this->modifiedColumns[] = CaartsolPeer::CANREQ;
		}

	} 
	
	public function setCanrec($v)
	{

		if ($this->canrec !== $v) {
			$this->canrec = $v;
			$this->modifiedColumns[] = CaartsolPeer::CANREC;
		}

	} 
	
	public function setMontot($v)
	{

		if ($this->montot !== $v) {
			$this->montot = $v;
			$this->modifiedColumns[] = CaartsolPeer::MONTOT;
		}

	} 
	
	public function setCosto($v)
	{

		if ($this->costo !== $v) {
			$this->costo = $v;
			$this->modifiedColumns[] = CaartsolPeer::COSTO;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = CaartsolPeer::MONRGO;
		}

	} 
	
	public function setCanord($v)
	{

		if ($this->canord !== $v) {
			$this->canord = $v;
			$this->modifiedColumns[] = CaartsolPeer::CANORD;
		}

	} 
	
	public function setMondes($v)
	{

		if ($this->mondes !== $v) {
			$this->mondes = $v;
			$this->modifiedColumns[] = CaartsolPeer::MONDES;
		}

	} 
	
	public function setRelart($v)
	{

		if ($this->relart !== $v) {
			$this->relart = $v;
			$this->modifiedColumns[] = CaartsolPeer::RELART;
		}

	} 
	
	public function setUnimed($v)
	{

		if ($this->unimed !== $v) {
			$this->unimed = $v;
			$this->modifiedColumns[] = CaartsolPeer::UNIMED;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = CaartsolPeer::CODPAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartsolPeer::ID;
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

			$this->costo = $rs->getFloat($startcol + 6);

			$this->monrgo = $rs->getFloat($startcol + 7);

			$this->canord = $rs->getFloat($startcol + 8);

			$this->mondes = $rs->getFloat($startcol + 9);

			$this->relart = $rs->getFloat($startcol + 10);

			$this->unimed = $rs->getString($startcol + 11);

			$this->codpar = $rs->getString($startcol + 12);

			$this->id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartsol object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartsolPeer::DATABASE_NAME);
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
					$pk = CaartsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartsolPeer::doUpdate($this, $con);
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


			if (($retval = CaartsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCosto();
				break;
			case 7:
				return $this->getMonrgo();
				break;
			case 8:
				return $this->getCanord();
				break;
			case 9:
				return $this->getMondes();
				break;
			case 10:
				return $this->getRelart();
				break;
			case 11:
				return $this->getUnimed();
				break;
			case 12:
				return $this->getCodpar();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCanreq(),
			$keys[4] => $this->getCanrec(),
			$keys[5] => $this->getMontot(),
			$keys[6] => $this->getCosto(),
			$keys[7] => $this->getMonrgo(),
			$keys[8] => $this->getCanord(),
			$keys[9] => $this->getMondes(),
			$keys[10] => $this->getRelart(),
			$keys[11] => $this->getUnimed(),
			$keys[12] => $this->getCodpar(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCosto($value);
				break;
			case 7:
				$this->setMonrgo($value);
				break;
			case 8:
				$this->setCanord($value);
				break;
			case 9:
				$this->setMondes($value);
				break;
			case 10:
				$this->setRelart($value);
				break;
			case 11:
				$this->setUnimed($value);
				break;
			case 12:
				$this->setCodpar($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMontot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCosto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonrgo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMondes($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRelart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUnimed($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpar($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartsolPeer::REQART)) $criteria->add(CaartsolPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CaartsolPeer::CODART)) $criteria->add(CaartsolPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartsolPeer::CODCAT)) $criteria->add(CaartsolPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartsolPeer::CANREQ)) $criteria->add(CaartsolPeer::CANREQ, $this->canreq);
		if ($this->isColumnModified(CaartsolPeer::CANREC)) $criteria->add(CaartsolPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CaartsolPeer::MONTOT)) $criteria->add(CaartsolPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CaartsolPeer::COSTO)) $criteria->add(CaartsolPeer::COSTO, $this->costo);
		if ($this->isColumnModified(CaartsolPeer::MONRGO)) $criteria->add(CaartsolPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CaartsolPeer::CANORD)) $criteria->add(CaartsolPeer::CANORD, $this->canord);
		if ($this->isColumnModified(CaartsolPeer::MONDES)) $criteria->add(CaartsolPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CaartsolPeer::RELART)) $criteria->add(CaartsolPeer::RELART, $this->relart);
		if ($this->isColumnModified(CaartsolPeer::UNIMED)) $criteria->add(CaartsolPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(CaartsolPeer::CODPAR)) $criteria->add(CaartsolPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(CaartsolPeer::ID)) $criteria->add(CaartsolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartsolPeer::DATABASE_NAME);

		$criteria->add(CaartsolPeer::ID, $this->id);

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

		$copyObj->setCosto($this->costo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setCanord($this->canord);

		$copyObj->setMondes($this->mondes);

		$copyObj->setRelart($this->relart);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCodpar($this->codpar);


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
			self::$peer = new CaartsolPeer();
		}
		return self::$peer;
	}

} 