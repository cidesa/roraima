<?php


abstract class BaseFordefunimed extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codunimed;


	
	protected $desunimed;


	
	protected $nomabrunimed;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodunimed()
	{

		return $this->codunimed;
	}

	
	public function getDesunimed()
	{

		return $this->desunimed;
	}

	
	public function getNomabrunimed()
	{

		return $this->nomabrunimed;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodunimed($v)
	{

		if ($this->codunimed !== $v) {
			$this->codunimed = $v;
			$this->modifiedColumns[] = FordefunimedPeer::CODUNIMED;
		}

	} 
	
	public function setDesunimed($v)
	{

		if ($this->desunimed !== $v) {
			$this->desunimed = $v;
			$this->modifiedColumns[] = FordefunimedPeer::DESUNIMED;
		}

	} 
	
	public function setNomabrunimed($v)
	{

		if ($this->nomabrunimed !== $v) {
			$this->nomabrunimed = $v;
			$this->modifiedColumns[] = FordefunimedPeer::NOMABRUNIMED;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FordefunimedPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codunimed = $rs->getString($startcol + 0);

			$this->desunimed = $rs->getString($startcol + 1);

			$this->nomabrunimed = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fordefunimed object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FordefunimedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefunimedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefunimedPeer::DATABASE_NAME);
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
					$pk = FordefunimedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FordefunimedPeer::doUpdate($this, $con);
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


			if (($retval = FordefunimedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefunimedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodunimed();
				break;
			case 1:
				return $this->getDesunimed();
				break;
			case 2:
				return $this->getNomabrunimed();
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
		$keys = FordefunimedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodunimed(),
			$keys[1] => $this->getDesunimed(),
			$keys[2] => $this->getNomabrunimed(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefunimedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodunimed($value);
				break;
			case 1:
				$this->setDesunimed($value);
				break;
			case 2:
				$this->setNomabrunimed($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefunimedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodunimed($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesunimed($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabrunimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefunimedPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefunimedPeer::CODUNIMED)) $criteria->add(FordefunimedPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FordefunimedPeer::DESUNIMED)) $criteria->add(FordefunimedPeer::DESUNIMED, $this->desunimed);
		if ($this->isColumnModified(FordefunimedPeer::NOMABRUNIMED)) $criteria->add(FordefunimedPeer::NOMABRUNIMED, $this->nomabrunimed);
		if ($this->isColumnModified(FordefunimedPeer::ID)) $criteria->add(FordefunimedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefunimedPeer::DATABASE_NAME);

		$criteria->add(FordefunimedPeer::ID, $this->id);

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

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setDesunimed($this->desunimed);

		$copyObj->setNomabrunimed($this->nomabrunimed);


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
			self::$peer = new FordefunimedPeer();
		}
		return self::$peer;
	}

} 