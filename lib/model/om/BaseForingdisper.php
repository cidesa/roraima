<?php


abstract class BaseForingdisper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpar;


	
	protected $perpar;


	
	protected $monpar;


	
	protected $porper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getPerpar()
	{

		return $this->perpar; 		
	}
	
	public function getMonpar()
	{

		return number_format($this->monpar,2,',','.');
		
	}
	
	public function getPorper()
	{

		return number_format($this->porper,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = ForingdisperPeer::CODPAR;
		}

	} 
	
	public function setPerpar($v)
	{

		if ($this->perpar !== $v) {
			$this->perpar = $v;
			$this->modifiedColumns[] = ForingdisperPeer::PERPAR;
		}

	} 
	
	public function setMonpar($v)
	{

		if ($this->monpar !== $v) {
			$this->monpar = $v;
			$this->modifiedColumns[] = ForingdisperPeer::MONPAR;
		}

	} 
	
	public function setPorper($v)
	{

		if ($this->porper !== $v) {
			$this->porper = $v;
			$this->modifiedColumns[] = ForingdisperPeer::PORPER;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForingdisperPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpar = $rs->getString($startcol + 0);

			$this->perpar = $rs->getString($startcol + 1);

			$this->monpar = $rs->getFloat($startcol + 2);

			$this->porper = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Foringdisper object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForingdisperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForingdisperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForingdisperPeer::DATABASE_NAME);
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
					$pk = ForingdisperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForingdisperPeer::doUpdate($this, $con);
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


			if (($retval = ForingdisperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForingdisperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpar();
				break;
			case 1:
				return $this->getPerpar();
				break;
			case 2:
				return $this->getMonpar();
				break;
			case 3:
				return $this->getPorper();
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
		$keys = ForingdisperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpar(),
			$keys[1] => $this->getPerpar(),
			$keys[2] => $this->getMonpar(),
			$keys[3] => $this->getPorper(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForingdisperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpar($value);
				break;
			case 1:
				$this->setPerpar($value);
				break;
			case 2:
				$this->setMonpar($value);
				break;
			case 3:
				$this->setPorper($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForingdisperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerpar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPorper($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForingdisperPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForingdisperPeer::CODPAR)) $criteria->add(ForingdisperPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ForingdisperPeer::PERPAR)) $criteria->add(ForingdisperPeer::PERPAR, $this->perpar);
		if ($this->isColumnModified(ForingdisperPeer::MONPAR)) $criteria->add(ForingdisperPeer::MONPAR, $this->monpar);
		if ($this->isColumnModified(ForingdisperPeer::PORPER)) $criteria->add(ForingdisperPeer::PORPER, $this->porper);
		if ($this->isColumnModified(ForingdisperPeer::ID)) $criteria->add(ForingdisperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForingdisperPeer::DATABASE_NAME);

		$criteria->add(ForingdisperPeer::ID, $this->id);

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

		$copyObj->setCodpar($this->codpar);

		$copyObj->setPerpar($this->perpar);

		$copyObj->setMonpar($this->monpar);

		$copyObj->setPorper($this->porper);


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
			self::$peer = new ForingdisperPeer();
		}
		return self::$peer;
	}

} 