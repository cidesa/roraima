<?php


abstract class BaseFcdefpgi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $mondes;


	
	protected $monhas;


	
	protected $monpag;


	
	protected $numpor;


	
	protected $despgi;


	
	protected $desabr;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMondes()
	{

		return $this->mondes;
	}

	
	public function getMonhas()
	{

		return $this->monhas;
	}

	
	public function getMonpag()
	{

		return $this->monpag;
	}

	
	public function getNumpor()
	{

		return $this->numpor;
	}

	
	public function getDespgi()
	{

		return $this->despgi;
	}

	
	public function getDesabr()
	{

		return $this->desabr;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setMondes($v)
	{

		if ($this->mondes !== $v) {
			$this->mondes = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::MONDES;
		}

	} 
	
	public function setMonhas($v)
	{

		if ($this->monhas !== $v) {
			$this->monhas = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::MONHAS;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::MONPAG;
		}

	} 
	
	public function setNumpor($v)
	{

		if ($this->numpor !== $v) {
			$this->numpor = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::NUMPOR;
		}

	} 
	
	public function setDespgi($v)
	{

		if ($this->despgi !== $v) {
			$this->despgi = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::DESPGI;
		}

	} 
	
	public function setDesabr($v)
	{

		if ($this->desabr !== $v) {
			$this->desabr = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::DESABR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcdefpgiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->mondes = $rs->getFloat($startcol + 0);

			$this->monhas = $rs->getFloat($startcol + 1);

			$this->monpag = $rs->getFloat($startcol + 2);

			$this->numpor = $rs->getString($startcol + 3);

			$this->despgi = $rs->getString($startcol + 4);

			$this->desabr = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefpgi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcdefpgiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcdefpgiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcdefpgiPeer::DATABASE_NAME);
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
					$pk = FcdefpgiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcdefpgiPeer::doUpdate($this, $con);
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


			if (($retval = FcdefpgiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefpgiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMondes();
				break;
			case 1:
				return $this->getMonhas();
				break;
			case 2:
				return $this->getMonpag();
				break;
			case 3:
				return $this->getNumpor();
				break;
			case 4:
				return $this->getDespgi();
				break;
			case 5:
				return $this->getDesabr();
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
		$keys = FcdefpgiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMondes(),
			$keys[1] => $this->getMonhas(),
			$keys[2] => $this->getMonpag(),
			$keys[3] => $this->getNumpor(),
			$keys[4] => $this->getDespgi(),
			$keys[5] => $this->getDesabr(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcdefpgiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMondes($value);
				break;
			case 1:
				$this->setMonhas($value);
				break;
			case 2:
				$this->setMonpag($value);
				break;
			case 3:
				$this->setNumpor($value);
				break;
			case 4:
				$this->setDespgi($value);
				break;
			case 5:
				$this->setDesabr($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcdefpgiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMondes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonhas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpag($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumpor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDespgi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesabr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcdefpgiPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcdefpgiPeer::MONDES)) $criteria->add(FcdefpgiPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(FcdefpgiPeer::MONHAS)) $criteria->add(FcdefpgiPeer::MONHAS, $this->monhas);
		if ($this->isColumnModified(FcdefpgiPeer::MONPAG)) $criteria->add(FcdefpgiPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(FcdefpgiPeer::NUMPOR)) $criteria->add(FcdefpgiPeer::NUMPOR, $this->numpor);
		if ($this->isColumnModified(FcdefpgiPeer::DESPGI)) $criteria->add(FcdefpgiPeer::DESPGI, $this->despgi);
		if ($this->isColumnModified(FcdefpgiPeer::DESABR)) $criteria->add(FcdefpgiPeer::DESABR, $this->desabr);
		if ($this->isColumnModified(FcdefpgiPeer::ID)) $criteria->add(FcdefpgiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcdefpgiPeer::DATABASE_NAME);

		$criteria->add(FcdefpgiPeer::ID, $this->id);

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

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonhas($this->monhas);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setNumpor($this->numpor);

		$copyObj->setDespgi($this->despgi);

		$copyObj->setDesabr($this->desabr);


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
			self::$peer = new FcdefpgiPeer();
		}
		return self::$peer;
	}

} 