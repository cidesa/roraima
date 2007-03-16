<?php


abstract class BaseCpdefvar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codvar;


	
	protected $nomext;


	
	protected $nomabr;


	
	protected $valdef;


	
	protected $tipvar;


	
	protected $stavar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodvar()
	{

		return $this->codvar;
	}

	
	public function getNomext()
	{

		return $this->nomext;
	}

	
	public function getNomabr()
	{

		return $this->nomabr;
	}

	
	public function getValdef()
	{

		return $this->valdef;
	}

	
	public function getTipvar()
	{

		return $this->tipvar;
	}

	
	public function getStavar()
	{

		return $this->stavar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodvar($v)
	{

		if ($this->codvar !== $v) {
			$this->codvar = $v;
			$this->modifiedColumns[] = CpdefvarPeer::CODVAR;
		}

	} 
	
	public function setNomext($v)
	{

		if ($this->nomext !== $v) {
			$this->nomext = $v;
			$this->modifiedColumns[] = CpdefvarPeer::NOMEXT;
		}

	} 
	
	public function setNomabr($v)
	{

		if ($this->nomabr !== $v) {
			$this->nomabr = $v;
			$this->modifiedColumns[] = CpdefvarPeer::NOMABR;
		}

	} 
	
	public function setValdef($v)
	{

		if ($this->valdef !== $v) {
			$this->valdef = $v;
			$this->modifiedColumns[] = CpdefvarPeer::VALDEF;
		}

	} 
	
	public function setTipvar($v)
	{

		if ($this->tipvar !== $v) {
			$this->tipvar = $v;
			$this->modifiedColumns[] = CpdefvarPeer::TIPVAR;
		}

	} 
	
	public function setStavar($v)
	{

		if ($this->stavar !== $v) {
			$this->stavar = $v;
			$this->modifiedColumns[] = CpdefvarPeer::STAVAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpdefvarPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codvar = $rs->getString($startcol + 0);

			$this->nomext = $rs->getString($startcol + 1);

			$this->nomabr = $rs->getString($startcol + 2);

			$this->valdef = $rs->getFloat($startcol + 3);

			$this->tipvar = $rs->getString($startcol + 4);

			$this->stavar = $rs->getString($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpdefvar object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpdefvarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdefvarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdefvarPeer::DATABASE_NAME);
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
					$pk = CpdefvarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpdefvarPeer::doUpdate($this, $con);
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


			if (($retval = CpdefvarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefvarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodvar();
				break;
			case 1:
				return $this->getNomext();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getValdef();
				break;
			case 4:
				return $this->getTipvar();
				break;
			case 5:
				return $this->getStavar();
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
		$keys = CpdefvarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodvar(),
			$keys[1] => $this->getNomext(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getValdef(),
			$keys[4] => $this->getTipvar(),
			$keys[5] => $this->getStavar(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdefvarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodvar($value);
				break;
			case 1:
				$this->setNomext($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setValdef($value);
				break;
			case 4:
				$this->setTipvar($value);
				break;
			case 5:
				$this->setStavar($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdefvarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodvar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomext($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValdef($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipvar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStavar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdefvarPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdefvarPeer::CODVAR)) $criteria->add(CpdefvarPeer::CODVAR, $this->codvar);
		if ($this->isColumnModified(CpdefvarPeer::NOMEXT)) $criteria->add(CpdefvarPeer::NOMEXT, $this->nomext);
		if ($this->isColumnModified(CpdefvarPeer::NOMABR)) $criteria->add(CpdefvarPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CpdefvarPeer::VALDEF)) $criteria->add(CpdefvarPeer::VALDEF, $this->valdef);
		if ($this->isColumnModified(CpdefvarPeer::TIPVAR)) $criteria->add(CpdefvarPeer::TIPVAR, $this->tipvar);
		if ($this->isColumnModified(CpdefvarPeer::STAVAR)) $criteria->add(CpdefvarPeer::STAVAR, $this->stavar);
		if ($this->isColumnModified(CpdefvarPeer::ID)) $criteria->add(CpdefvarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdefvarPeer::DATABASE_NAME);

		$criteria->add(CpdefvarPeer::ID, $this->id);

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

		$copyObj->setCodvar($this->codvar);

		$copyObj->setNomext($this->nomext);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setValdef($this->valdef);

		$copyObj->setTipvar($this->tipvar);

		$copyObj->setStavar($this->stavar);


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
			self::$peer = new CpdefvarPeer();
		}
		return self::$peer;
	}

} 