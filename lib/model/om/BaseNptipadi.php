<?php


abstract class BaseNptipadi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtit;


	
	protected $destit;


	
	protected $codadi;


	
	protected $desadi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodtit()
	{

		return $this->codtit; 		
	}
	
	public function getDestit()
	{

		return $this->destit; 		
	}
	
	public function getCodadi()
	{

		return $this->codadi; 		
	}
	
	public function getDesadi()
	{

		return $this->desadi; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodtit($v)
	{

		if ($this->codtit !== $v) {
			$this->codtit = $v;
			$this->modifiedColumns[] = NptipadiPeer::CODTIT;
		}

	} 
	
	public function setDestit($v)
	{

		if ($this->destit !== $v) {
			$this->destit = $v;
			$this->modifiedColumns[] = NptipadiPeer::DESTIT;
		}

	} 
	
	public function setCodadi($v)
	{

		if ($this->codadi !== $v) {
			$this->codadi = $v;
			$this->modifiedColumns[] = NptipadiPeer::CODADI;
		}

	} 
	
	public function setDesadi($v)
	{

		if ($this->desadi !== $v) {
			$this->desadi = $v;
			$this->modifiedColumns[] = NptipadiPeer::DESADI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NptipadiPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codtit = $rs->getString($startcol + 0);

			$this->destit = $rs->getString($startcol + 1);

			$this->codadi = $rs->getString($startcol + 2);

			$this->desadi = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Nptipadi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NptipadiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptipadiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptipadiPeer::DATABASE_NAME);
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
					$pk = NptipadiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NptipadiPeer::doUpdate($this, $con);
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


			if (($retval = NptipadiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtit();
				break;
			case 1:
				return $this->getDestit();
				break;
			case 2:
				return $this->getCodadi();
				break;
			case 3:
				return $this->getDesadi();
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
		$keys = NptipadiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtit(),
			$keys[1] => $this->getDestit(),
			$keys[2] => $this->getCodadi(),
			$keys[3] => $this->getDesadi(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipadiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtit($value);
				break;
			case 1:
				$this->setDestit($value);
				break;
			case 2:
				$this->setCodadi($value);
				break;
			case 3:
				$this->setDesadi($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptipadiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtit($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestit($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodadi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptipadiPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptipadiPeer::CODTIT)) $criteria->add(NptipadiPeer::CODTIT, $this->codtit);
		if ($this->isColumnModified(NptipadiPeer::DESTIT)) $criteria->add(NptipadiPeer::DESTIT, $this->destit);
		if ($this->isColumnModified(NptipadiPeer::CODADI)) $criteria->add(NptipadiPeer::CODADI, $this->codadi);
		if ($this->isColumnModified(NptipadiPeer::DESADI)) $criteria->add(NptipadiPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(NptipadiPeer::ID)) $criteria->add(NptipadiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptipadiPeer::DATABASE_NAME);

		$criteria->add(NptipadiPeer::ID, $this->id);

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

		$copyObj->setCodtit($this->codtit);

		$copyObj->setDestit($this->destit);

		$copyObj->setCodadi($this->codadi);

		$copyObj->setDesadi($this->desadi);


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
			self::$peer = new NptipadiPeer();
		}
		return self::$peer;
	}

} 