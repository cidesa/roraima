<?php


abstract class BaseNpmotfal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmotfal;


	
	protected $desmotfal;


	
	protected $causa;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmotfal()
	{

		return $this->codmotfal; 		
	}
	
	public function getDesmotfal()
	{

		return $this->desmotfal; 		
	}
	
	public function getCausa()
	{

		return $this->causa; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodmotfal($v)
	{

		if ($this->codmotfal !== $v) {
			$this->codmotfal = $v;
			$this->modifiedColumns[] = NpmotfalPeer::CODMOTFAL;
		}

	} 
	
	public function setDesmotfal($v)
	{

		if ($this->desmotfal !== $v) {
			$this->desmotfal = $v;
			$this->modifiedColumns[] = NpmotfalPeer::DESMOTFAL;
		}

	} 
	
	public function setCausa($v)
	{

		if ($this->causa !== $v) {
			$this->causa = $v;
			$this->modifiedColumns[] = NpmotfalPeer::CAUSA;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpmotfalPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmotfal = $rs->getString($startcol + 0);

			$this->desmotfal = $rs->getString($startcol + 1);

			$this->causa = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npmotfal object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpmotfalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpmotfalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpmotfalPeer::DATABASE_NAME);
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
					$pk = NpmotfalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpmotfalPeer::doUpdate($this, $con);
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


			if (($retval = NpmotfalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmotfalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmotfal();
				break;
			case 1:
				return $this->getDesmotfal();
				break;
			case 2:
				return $this->getCausa();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmotfalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmotfal(),
			$keys[1] => $this->getDesmotfal(),
			$keys[2] => $this->getCausa(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmotfalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmotfal($value);
				break;
			case 1:
				$this->setDesmotfal($value);
				break;
			case 2:
				$this->setCausa($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmotfalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmotfal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmotfal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCausa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpmotfalPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpmotfalPeer::CODMOTFAL)) $criteria->add(NpmotfalPeer::CODMOTFAL, $this->codmotfal);
		if ($this->isColumnModified(NpmotfalPeer::DESMOTFAL)) $criteria->add(NpmotfalPeer::DESMOTFAL, $this->desmotfal);
		if ($this->isColumnModified(NpmotfalPeer::CAUSA)) $criteria->add(NpmotfalPeer::CAUSA, $this->causa);
		if ($this->isColumnModified(NpmotfalPeer::ID)) $criteria->add(NpmotfalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpmotfalPeer::DATABASE_NAME);

		$criteria->add(NpmotfalPeer::ID, $this->id);

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

		$copyObj->setCodmotfal($this->codmotfal);

		$copyObj->setDesmotfal($this->desmotfal);

		$copyObj->setCausa($this->causa);


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
			self::$peer = new NpmotfalPeer();
		}
		return self::$peer;
	}

} 