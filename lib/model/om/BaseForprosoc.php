<?php


abstract class BaseForprosoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codpro;


	
	protected $codorg;


	
	protected $totasi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCodpro()
	{

		return $this->codpro; 		
	}
	
	public function getCodorg()
	{

		return $this->codorg; 		
	}
	
	public function getTotasi()
	{

		return number_format($this->totasi,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = ForprosocPeer::CODCAT;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = ForprosocPeer::CODPRO;
		}

	} 
	
	public function setCodorg($v)
	{

		if ($this->codorg !== $v) {
			$this->codorg = $v;
			$this->modifiedColumns[] = ForprosocPeer::CODORG;
		}

	} 
	
	public function setTotasi($v)
	{

		if ($this->totasi !== $v) {
			$this->totasi = $v;
			$this->modifiedColumns[] = ForprosocPeer::TOTASI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForprosocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcat = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->codorg = $rs->getString($startcol + 2);

			$this->totasi = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forprosoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForprosocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForprosocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForprosocPeer::DATABASE_NAME);
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
					$pk = ForprosocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForprosocPeer::doUpdate($this, $con);
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


			if (($retval = ForprosocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForprosocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getCodorg();
				break;
			case 3:
				return $this->getTotasi();
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
		$keys = ForprosocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodorg(),
			$keys[3] => $this->getTotasi(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForprosocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setCodorg($value);
				break;
			case 3:
				$this->setTotasi($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForprosocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodorg($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotasi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForprosocPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForprosocPeer::CODCAT)) $criteria->add(ForprosocPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForprosocPeer::CODPRO)) $criteria->add(ForprosocPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForprosocPeer::CODORG)) $criteria->add(ForprosocPeer::CODORG, $this->codorg);
		if ($this->isColumnModified(ForprosocPeer::TOTASI)) $criteria->add(ForprosocPeer::TOTASI, $this->totasi);
		if ($this->isColumnModified(ForprosocPeer::ID)) $criteria->add(ForprosocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForprosocPeer::DATABASE_NAME);

		$criteria->add(ForprosocPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodorg($this->codorg);

		$copyObj->setTotasi($this->totasi);


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
			self::$peer = new ForprosocPeer();
		}
		return self::$peer;
	}

} 