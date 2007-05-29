<?php


abstract class BaseRhasicur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcur;


	
	protected $numcla;


	
	protected $codemp;


	
	protected $asicla;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcur()
	{

		return $this->codcur; 		
	}
	
	public function getNumcla()
	{

		return $this->numcla; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getAsicla()
	{

		return $this->asicla; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcur($v)
	{

		if ($this->codcur !== $v) {
			$this->codcur = $v;
			$this->modifiedColumns[] = RhasicurPeer::CODCUR;
		}

	} 
	
	public function setNumcla($v)
	{

		if ($this->numcla !== $v) {
			$this->numcla = $v;
			$this->modifiedColumns[] = RhasicurPeer::NUMCLA;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = RhasicurPeer::CODEMP;
		}

	} 
	
	public function setAsicla($v)
	{

		if ($this->asicla !== $v) {
			$this->asicla = $v;
			$this->modifiedColumns[] = RhasicurPeer::ASICLA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RhasicurPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcur = $rs->getString($startcol + 0);

			$this->numcla = $rs->getString($startcol + 1);

			$this->codemp = $rs->getString($startcol + 2);

			$this->asicla = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rhasicur object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RhasicurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhasicurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhasicurPeer::DATABASE_NAME);
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
					$pk = RhasicurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += RhasicurPeer::doUpdate($this, $con);
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


			if (($retval = RhasicurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhasicurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcur();
				break;
			case 1:
				return $this->getNumcla();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getAsicla();
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
		$keys = RhasicurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcur(),
			$keys[1] => $this->getNumcla(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getAsicla(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhasicurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcur($value);
				break;
			case 1:
				$this->setNumcla($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setAsicla($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhasicurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAsicla($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhasicurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhasicurPeer::CODCUR)) $criteria->add(RhasicurPeer::CODCUR, $this->codcur);
		if ($this->isColumnModified(RhasicurPeer::NUMCLA)) $criteria->add(RhasicurPeer::NUMCLA, $this->numcla);
		if ($this->isColumnModified(RhasicurPeer::CODEMP)) $criteria->add(RhasicurPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(RhasicurPeer::ASICLA)) $criteria->add(RhasicurPeer::ASICLA, $this->asicla);
		if ($this->isColumnModified(RhasicurPeer::ID)) $criteria->add(RhasicurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhasicurPeer::DATABASE_NAME);

		$criteria->add(RhasicurPeer::ID, $this->id);

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

		$copyObj->setNumcla($this->numcla);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setAsicla($this->asicla);


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
			self::$peer = new RhasicurPeer();
		}
		return self::$peer;
	}

} 