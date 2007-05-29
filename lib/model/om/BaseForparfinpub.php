<?php


abstract class BaseForparfinpub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codorg;


	
	protected $cuopar;


	
	protected $codcat;


	
	protected $codpar;


	
	protected $observ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getCuopar()
	{

		return number_format($this->cuopar,2,',','.');
		
	}
	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCodpar()
	{

		return $this->codpar; 		
	}
	
	public function getObserv()
	{

		return $this->observ; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = ForparfinpubPeer::CODORG;
		}

	} 
	
	public function setCuopar($v)
	{

		if ($this->cuopar !== $v) {
			$this->cuopar = $v;
			$this->modifiedColumns[] = ForparfinpubPeer::CUOPAR;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = ForparfinpubPeer::CODCAT;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = ForparfinpubPeer::CODPAR;
		}

	} 
	
	public function setObserv($v)
	{

		if ($this->observ !== $v) {
			$this->observ = $v;
			$this->modifiedColumns[] = ForparfinpubPeer::OBSERV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForparfinpubPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codorg = $rs->getString($startcol + 0);

			$this->cuopar = $rs->getFloat($startcol + 1);

			$this->codcat = $rs->getString($startcol + 2);

			$this->codpar = $rs->getString($startcol + 3);

			$this->observ = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forparfinpub object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForparfinpubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForparfinpubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForparfinpubPeer::DATABASE_NAME);
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
					$pk = ForparfinpubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForparfinpubPeer::doUpdate($this, $con);
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


			if (($retval = ForparfinpubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForparfinpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodorg();
				break;
			case 1:
				return $this->getCuopar();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getObserv();
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
		$keys = ForparfinpubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodorg(),
			$keys[1] => $this->getCuopar(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getObserv(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForparfinpubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodorg($value);
				break;
			case 1:
				$this->setCuopar($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setObserv($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForparfinpubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodorg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCuopar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObserv($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForparfinpubPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForparfinpubPeer::CODORG)) $criteria->add(ForparfinpubPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(ForparfinpubPeer::CUOPAR)) $criteria->add(ForparfinpubPeer::CUOPAR, $this->cuopar);
		if ($this->isColumnModified(ForparfinpubPeer::CODCAT)) $criteria->add(ForparfinpubPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForparfinpubPeer::CODPAR)) $criteria->add(ForparfinpubPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ForparfinpubPeer::OBSERV)) $criteria->add(ForparfinpubPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(ForparfinpubPeer::ID)) $criteria->add(ForparfinpubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForparfinpubPeer::DATABASE_NAME);

		$criteria->add(ForparfinpubPeer::ID, $this->id);

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

		$copyObj->setCodorg($this->codorg);

		$copyObj->setCuopar($this->cuopar);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setObserv($this->observ);


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
			self::$peer = new ForparfinpubPeer();
		}
		return self::$peer;
	}

} 