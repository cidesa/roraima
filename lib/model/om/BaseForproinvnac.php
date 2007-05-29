<?php


abstract class BaseForproinvnac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codorg;


	
	protected $codpreorg;


	
	protected $codpregob;


	
	protected $despreorg;


	
	protected $monapoorg;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getCodpreorg()
	{

		return $this->codpreorg; 		
	}
	
	public function getCodpregob()
	{

		return $this->codpregob; 		
	}
	
	public function getDespreorg()
	{

		return $this->despreorg; 		
	}
	
	public function getMonapoorg()
	{

		return number_format($this->monapoorg,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = ForproinvnacPeer::CODORG;
		}

	} 
	
	public function setCodpreorg($v)
	{

		if ($this->codpreorg !== $v) {
			$this->codpreorg = $v;
			$this->modifiedColumns[] = ForproinvnacPeer::CODPREORG;
		}

	} 
	
	public function setCodpregob($v)
	{

		if ($this->codpregob !== $v) {
			$this->codpregob = $v;
			$this->modifiedColumns[] = ForproinvnacPeer::CODPREGOB;
		}

	} 
	
	public function setDespreorg($v)
	{

		if ($this->despreorg !== $v) {
			$this->despreorg = $v;
			$this->modifiedColumns[] = ForproinvnacPeer::DESPREORG;
		}

	} 
	
	public function setMonapoorg($v)
	{

		if ($this->monapoorg !== $v) {
			$this->monapoorg = $v;
			$this->modifiedColumns[] = ForproinvnacPeer::MONAPOORG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForproinvnacPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codorg = $rs->getString($startcol + 0);

			$this->codpreorg = $rs->getString($startcol + 1);

			$this->codpregob = $rs->getString($startcol + 2);

			$this->despreorg = $rs->getString($startcol + 3);

			$this->monapoorg = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forproinvnac object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForproinvnacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForproinvnacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForproinvnacPeer::DATABASE_NAME);
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
					$pk = ForproinvnacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForproinvnacPeer::doUpdate($this, $con);
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


			if (($retval = ForproinvnacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForproinvnacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodorg();
				break;
			case 1:
				return $this->getCodpreorg();
				break;
			case 2:
				return $this->getCodpregob();
				break;
			case 3:
				return $this->getDespreorg();
				break;
			case 4:
				return $this->getMonapoorg();
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
		$keys = ForproinvnacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodorg(),
			$keys[1] => $this->getCodpreorg(),
			$keys[2] => $this->getCodpregob(),
			$keys[3] => $this->getDespreorg(),
			$keys[4] => $this->getMonapoorg(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForproinvnacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodorg($value);
				break;
			case 1:
				$this->setCodpreorg($value);
				break;
			case 2:
				$this->setCodpregob($value);
				break;
			case 3:
				$this->setDespreorg($value);
				break;
			case 4:
				$this->setMonapoorg($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForproinvnacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodorg($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpreorg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpregob($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDespreorg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonapoorg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForproinvnacPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForproinvnacPeer::CODORG)) $criteria->add(ForproinvnacPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(ForproinvnacPeer::CODPREORG)) $criteria->add(ForproinvnacPeer::CODPREORG, $this->codpreorg);
		if ($this->isColumnModified(ForproinvnacPeer::CODPREGOB)) $criteria->add(ForproinvnacPeer::CODPREGOB, $this->codpregob);
		if ($this->isColumnModified(ForproinvnacPeer::DESPREORG)) $criteria->add(ForproinvnacPeer::DESPREORG, $this->despreorg);
		if ($this->isColumnModified(ForproinvnacPeer::MONAPOORG)) $criteria->add(ForproinvnacPeer::MONAPOORG, $this->monapoorg);
		if ($this->isColumnModified(ForproinvnacPeer::ID)) $criteria->add(ForproinvnacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForproinvnacPeer::DATABASE_NAME);

		$criteria->add(ForproinvnacPeer::ID, $this->id);

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

		$copyObj->setCodpreorg($this->codpreorg);

		$copyObj->setCodpregob($this->codpregob);

		$copyObj->setDespreorg($this->despreorg);

		$copyObj->setMonapoorg($this->monapoorg);


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
			self::$peer = new ForproinvnacPeer();
		}
		return self::$peer;
	}

} 