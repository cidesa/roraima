<?php


abstract class BaseCaartprec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codprec;


	
	protected $preuni;


	
	protected $obsprec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getCodprec()
	{

		return $this->codprec; 		
	}
	
	public function getPreuni()
	{

		return number_format($this->preuni,2,',','.');
		
	}
	
	public function getObsprec()
	{

		return $this->obsprec; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CaartprecPeer::CODART;
		}

	} 
	
	public function setCodprec($v)
	{

		if ($this->codprec !== $v) {
			$this->codprec = $v;
			$this->modifiedColumns[] = CaartprecPeer::CODPREC;
		}

	} 
	
	public function setPreuni($v)
	{

		if ($this->preuni !== $v) {
			$this->preuni = $v;
			$this->modifiedColumns[] = CaartprecPeer::PREUNI;
		}

	} 
	
	public function setObsprec($v)
	{

		if ($this->obsprec !== $v) {
			$this->obsprec = $v;
			$this->modifiedColumns[] = CaartprecPeer::OBSPREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaartprecPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codart = $rs->getString($startcol + 0);

			$this->codprec = $rs->getString($startcol + 1);

			$this->preuni = $rs->getFloat($startcol + 2);

			$this->obsprec = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caartprec object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaartprecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartprecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartprecPeer::DATABASE_NAME);
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
					$pk = CaartprecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaartprecPeer::doUpdate($this, $con);
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


			if (($retval = CaartprecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodprec();
				break;
			case 2:
				return $this->getPreuni();
				break;
			case 3:
				return $this->getObsprec();
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
		$keys = CaartprecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodprec(),
			$keys[2] => $this->getPreuni(),
			$keys[3] => $this->getObsprec(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodprec($value);
				break;
			case 2:
				$this->setPreuni($value);
				break;
			case 3:
				$this->setObsprec($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartprecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodprec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPreuni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObsprec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartprecPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartprecPeer::CODART)) $criteria->add(CaartprecPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartprecPeer::CODPREC)) $criteria->add(CaartprecPeer::CODPREC, $this->codprec);
		if ($this->isColumnModified(CaartprecPeer::PREUNI)) $criteria->add(CaartprecPeer::PREUNI, $this->preuni);
		if ($this->isColumnModified(CaartprecPeer::OBSPREC)) $criteria->add(CaartprecPeer::OBSPREC, $this->obsprec);
		if ($this->isColumnModified(CaartprecPeer::ID)) $criteria->add(CaartprecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartprecPeer::DATABASE_NAME);

		$criteria->add(CaartprecPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCodprec($this->codprec);

		$copyObj->setPreuni($this->preuni);

		$copyObj->setObsprec($this->obsprec);


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
			self::$peer = new CaartprecPeer();
		}
		return self::$peer;
	}

} 