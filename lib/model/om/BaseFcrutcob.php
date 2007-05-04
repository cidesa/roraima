<?php


abstract class BaseFcrutcob extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcob;


	
	protected $codrut;


	
	protected $id;

	
	protected $aFccobrad;

	
	protected $aFcrutas;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcob()
	{

		return $this->codcob;
	}

	
	public function getCodrut()
	{

		return $this->codrut;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcob($v)
	{

		if ($this->codcob !== $v) {
			$this->codcob = $v;
			$this->modifiedColumns[] = FcrutcobPeer::CODCOB;
		}

		if ($this->aFccobrad !== null && $this->aFccobrad->getCodcob() !== $v) {
			$this->aFccobrad = null;
		}

	} 
	
	public function setCodrut($v)
	{

		if ($this->codrut !== $v) {
			$this->codrut = $v;
			$this->modifiedColumns[] = FcrutcobPeer::CODRUT;
		}

		if ($this->aFcrutas !== null && $this->aFcrutas->getCodrut() !== $v) {
			$this->aFcrutas = null;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcrutcobPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcob = $rs->getString($startcol + 0);

			$this->codrut = $rs->getString($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcrutcob object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcrutcobPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcrutcobPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcrutcobPeer::DATABASE_NAME);
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


												
			if ($this->aFccobrad !== null) {
				if ($this->aFccobrad->isModified()) {
					$affectedRows += $this->aFccobrad->save($con);
				}
				$this->setFccobrad($this->aFccobrad);
			}

			if ($this->aFcrutas !== null) {
				if ($this->aFcrutas->isModified()) {
					$affectedRows += $this->aFcrutas->save($con);
				}
				$this->setFcrutas($this->aFcrutas);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FcrutcobPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcrutcobPeer::doUpdate($this, $con);
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


												
			if ($this->aFccobrad !== null) {
				if (!$this->aFccobrad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFccobrad->getValidationFailures());
				}
			}

			if ($this->aFcrutas !== null) {
				if (!$this->aFcrutas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFcrutas->getValidationFailures());
				}
			}


			if (($retval = FcrutcobPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrutcobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcob();
				break;
			case 1:
				return $this->getCodrut();
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
		$keys = FcrutcobPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcob(),
			$keys[1] => $this->getCodrut(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcrutcobPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcob($value);
				break;
			case 1:
				$this->setCodrut($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcrutcobPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcob($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrut($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcrutcobPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcrutcobPeer::CODCOB)) $criteria->add(FcrutcobPeer::CODCOB, $this->codcob);
		if ($this->isColumnModified(FcrutcobPeer::CODRUT)) $criteria->add(FcrutcobPeer::CODRUT, $this->codrut);
		if ($this->isColumnModified(FcrutcobPeer::ID)) $criteria->add(FcrutcobPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcrutcobPeer::DATABASE_NAME);

		$criteria->add(FcrutcobPeer::ID, $this->id);

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

		$copyObj->setCodcob($this->codcob);

		$copyObj->setCodrut($this->codrut);


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
			self::$peer = new FcrutcobPeer();
		}
		return self::$peer;
	}

	
	public function setFccobrad($v)
	{


		if ($v === null) {
			$this->setCodcob(NULL);
		} else {
			$this->setCodcob($v->getCodcob());
		}


		$this->aFccobrad = $v;
	}


	
	public function getFccobrad($con = null)
	{
				include_once 'lib/model/om/BaseFccobradPeer.php';

		if ($this->aFccobrad === null && (($this->codcob !== "" && $this->codcob !== null))) {

			$this->aFccobrad = FccobradPeer::retrieveByPK($this->codcob, $con);

			
		}
		return $this->aFccobrad;
	}

	
	public function setFcrutas($v)
	{


		if ($v === null) {
			$this->setCodrut(NULL);
		} else {
			$this->setCodrut($v->getCodrut());
		}


		$this->aFcrutas = $v;
	}


	
	public function getFcrutas($con = null)
	{
				include_once 'lib/model/om/BaseFcrutasPeer.php';

		if ($this->aFcrutas === null && (($this->codrut !== "" && $this->codrut !== null))) {

			$this->aFcrutas = FcrutasPeer::retrieveByPK($this->codrut, $con);

			
		}
		return $this->aFcrutas;
	}

} 