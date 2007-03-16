<?php


abstract class BaseFadescart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddesc;


	
	protected $refdoc;


	
	protected $codart;


	
	protected $mondesc;


	
	protected $tipdoc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoddesc()
	{

		return $this->coddesc;
	}

	
	public function getRefdoc()
	{

		return $this->refdoc;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getMondesc()
	{

		return $this->mondesc;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoddesc($v)
	{

		if ($this->coddesc !== $v) {
			$this->coddesc = $v;
			$this->modifiedColumns[] = FadescartPeer::CODDESC;
		}

	} 
	
	public function setRefdoc($v)
	{

		if ($this->refdoc !== $v) {
			$this->refdoc = $v;
			$this->modifiedColumns[] = FadescartPeer::REFDOC;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FadescartPeer::CODART;
		}

	} 
	
	public function setMondesc($v)
	{

		if ($this->mondesc !== $v) {
			$this->mondesc = $v;
			$this->modifiedColumns[] = FadescartPeer::MONDESC;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = FadescartPeer::TIPDOC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FadescartPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coddesc = $rs->getString($startcol + 0);

			$this->refdoc = $rs->getString($startcol + 1);

			$this->codart = $rs->getString($startcol + 2);

			$this->mondesc = $rs->getFloat($startcol + 3);

			$this->tipdoc = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fadescart object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FadescartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadescartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadescartPeer::DATABASE_NAME);
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
					$pk = FadescartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FadescartPeer::doUpdate($this, $con);
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


			if (($retval = FadescartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadescartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddesc();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getMondesc();
				break;
			case 4:
				return $this->getTipdoc();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadescartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddesc(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getMondesc(),
			$keys[4] => $this->getTipdoc(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadescartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddesc($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setMondesc($value);
				break;
			case 4:
				$this->setTipdoc($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadescartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddesc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMondesc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipdoc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadescartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadescartPeer::CODDESC)) $criteria->add(FadescartPeer::CODDESC, $this->coddesc);
		if ($this->isColumnModified(FadescartPeer::REFDOC)) $criteria->add(FadescartPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(FadescartPeer::CODART)) $criteria->add(FadescartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FadescartPeer::MONDESC)) $criteria->add(FadescartPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FadescartPeer::TIPDOC)) $criteria->add(FadescartPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(FadescartPeer::ID)) $criteria->add(FadescartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadescartPeer::DATABASE_NAME);

		$criteria->add(FadescartPeer::ID, $this->id);

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

		$copyObj->setCoddesc($this->coddesc);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodart($this->codart);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setTipdoc($this->tipdoc);


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
			self::$peer = new FadescartPeer();
		}
		return self::$peer;
	}

} 