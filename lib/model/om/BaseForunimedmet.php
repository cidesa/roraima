<?php


abstract class BaseForunimedmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codunimet;


	
	protected $nomextuni;


	
	protected $nomabruni;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodunimet()
	{

		return $this->codunimet;
	}

	
	public function getNomextuni()
	{

		return $this->nomextuni;
	}

	
	public function getNomabruni()
	{

		return $this->nomabruni;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodunimet($v)
	{

		if ($this->codunimet !== $v) {
			$this->codunimet = $v;
			$this->modifiedColumns[] = ForunimedmetPeer::CODUNIMET;
		}

	} 
	
	public function setNomextuni($v)
	{

		if ($this->nomextuni !== $v) {
			$this->nomextuni = $v;
			$this->modifiedColumns[] = ForunimedmetPeer::NOMEXTUNI;
		}

	} 
	
	public function setNomabruni($v)
	{

		if ($this->nomabruni !== $v) {
			$this->nomabruni = $v;
			$this->modifiedColumns[] = ForunimedmetPeer::NOMABRUNI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForunimedmetPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codunimet = $rs->getString($startcol + 0);

			$this->nomextuni = $rs->getString($startcol + 1);

			$this->nomabruni = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forunimedmet object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForunimedmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForunimedmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForunimedmetPeer::DATABASE_NAME);
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
					$pk = ForunimedmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForunimedmetPeer::doUpdate($this, $con);
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


			if (($retval = ForunimedmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForunimedmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodunimet();
				break;
			case 1:
				return $this->getNomextuni();
				break;
			case 2:
				return $this->getNomabruni();
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
		$keys = ForunimedmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodunimet(),
			$keys[1] => $this->getNomextuni(),
			$keys[2] => $this->getNomabruni(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForunimedmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodunimet($value);
				break;
			case 1:
				$this->setNomextuni($value);
				break;
			case 2:
				$this->setNomabruni($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForunimedmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodunimet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomextuni($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabruni($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForunimedmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForunimedmetPeer::CODUNIMET)) $criteria->add(ForunimedmetPeer::CODUNIMET, $this->codunimet);
		if ($this->isColumnModified(ForunimedmetPeer::NOMEXTUNI)) $criteria->add(ForunimedmetPeer::NOMEXTUNI, $this->nomextuni);
		if ($this->isColumnModified(ForunimedmetPeer::NOMABRUNI)) $criteria->add(ForunimedmetPeer::NOMABRUNI, $this->nomabruni);
		if ($this->isColumnModified(ForunimedmetPeer::ID)) $criteria->add(ForunimedmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForunimedmetPeer::DATABASE_NAME);

		$criteria->add(ForunimedmetPeer::ID, $this->id);

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

		$copyObj->setCodunimet($this->codunimet);

		$copyObj->setNomextuni($this->nomextuni);

		$copyObj->setNomabruni($this->nomabruni);


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
			self::$peer = new ForunimedmetPeer();
		}
		return self::$peer;
	}

} 