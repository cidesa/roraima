<?php


abstract class BaseRhnotcur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcur;


	
	protected $codemp;


	
	protected $notcur;


	
	protected $aprcur;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcur()
	{

		return $this->codcur; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getNotcur()
	{

		return number_format($this->notcur,2,',','.');
		
	}
	
	public function getAprcur()
	{

		return $this->aprcur; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcur($v)
	{

		if ($this->codcur !== $v) {
			$this->codcur = $v;
			$this->modifiedColumns[] = RhnotcurPeer::CODCUR;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = RhnotcurPeer::CODEMP;
		}

	} 
	
	public function setNotcur($v)
	{

		if ($this->notcur !== $v) {
			$this->notcur = $v;
			$this->modifiedColumns[] = RhnotcurPeer::NOTCUR;
		}

	} 
	
	public function setAprcur($v)
	{

		if ($this->aprcur !== $v) {
			$this->aprcur = $v;
			$this->modifiedColumns[] = RhnotcurPeer::APRCUR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RhnotcurPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcur = $rs->getString($startcol + 0);

			$this->codemp = $rs->getString($startcol + 1);

			$this->notcur = $rs->getFloat($startcol + 2);

			$this->aprcur = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rhnotcur object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RhnotcurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhnotcurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhnotcurPeer::DATABASE_NAME);
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
					$pk = RhnotcurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RhnotcurPeer::doUpdate($this, $con);
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


			if (($retval = RhnotcurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhnotcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcur();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getNotcur();
				break;
			case 3:
				return $this->getAprcur();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhnotcurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcur(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getNotcur(),
			$keys[3] => $this->getAprcur(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhnotcurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcur($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setNotcur($value);
				break;
			case 3:
				$this->setAprcur($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhnotcurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNotcur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAprcur($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhnotcurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhnotcurPeer::CODCUR)) $criteria->add(RhnotcurPeer::CODCUR, $this->codcur);
		if ($this->isColumnModified(RhnotcurPeer::CODEMP)) $criteria->add(RhnotcurPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(RhnotcurPeer::NOTCUR)) $criteria->add(RhnotcurPeer::NOTCUR, $this->notcur);
		if ($this->isColumnModified(RhnotcurPeer::APRCUR)) $criteria->add(RhnotcurPeer::APRCUR, $this->aprcur);
		if ($this->isColumnModified(RhnotcurPeer::ID)) $criteria->add(RhnotcurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhnotcurPeer::DATABASE_NAME);

		$criteria->add(RhnotcurPeer::ID, $this->id);

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

		$copyObj->setCodcur($this->codcur);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNotcur($this->notcur);

		$copyObj->setAprcur($this->aprcur);


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
			self::$peer = new RhnotcurPeer();
		}
		return self::$peer;
	}

} 