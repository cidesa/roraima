<?php


abstract class BaseOcingrescon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $ceding;


	
	protected $noming;


	
	protected $nrocoling;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCeding()
	{

		return $this->ceding;
	}

	
	public function getNoming()
	{

		return $this->noming;
	}

	
	public function getNrocoling()
	{

		return $this->nrocoling;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcingresconPeer::CODCON;
		}

	} 
	
	public function setCeding($v)
	{

		if ($this->ceding !== $v) {
			$this->ceding = $v;
			$this->modifiedColumns[] = OcingresconPeer::CEDING;
		}

	} 
	
	public function setNoming($v)
	{

		if ($this->noming !== $v) {
			$this->noming = $v;
			$this->modifiedColumns[] = OcingresconPeer::NOMING;
		}

	} 
	
	public function setNrocoling($v)
	{

		if ($this->nrocoling !== $v) {
			$this->nrocoling = $v;
			$this->modifiedColumns[] = OcingresconPeer::NROCOLING;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcingresconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->ceding = $rs->getString($startcol + 1);

			$this->noming = $rs->getString($startcol + 2);

			$this->nrocoling = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocingrescon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcingresconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcingresconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcingresconPeer::DATABASE_NAME);
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
					$pk = OcingresconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcingresconPeer::doUpdate($this, $con);
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


			if (($retval = OcingresconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcingresconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCeding();
				break;
			case 2:
				return $this->getNoming();
				break;
			case 3:
				return $this->getNrocoling();
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
		$keys = OcingresconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCeding(),
			$keys[2] => $this->getNoming(),
			$keys[3] => $this->getNrocoling(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcingresconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCeding($value);
				break;
			case 2:
				$this->setNoming($value);
				break;
			case 3:
				$this->setNrocoling($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcingresconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCeding($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNoming($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNrocoling($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcingresconPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcingresconPeer::CODCON)) $criteria->add(OcingresconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcingresconPeer::CEDING)) $criteria->add(OcingresconPeer::CEDING, $this->ceding);
		if ($this->isColumnModified(OcingresconPeer::NOMING)) $criteria->add(OcingresconPeer::NOMING, $this->noming);
		if ($this->isColumnModified(OcingresconPeer::NROCOLING)) $criteria->add(OcingresconPeer::NROCOLING, $this->nrocoling);
		if ($this->isColumnModified(OcingresconPeer::ID)) $criteria->add(OcingresconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcingresconPeer::DATABASE_NAME);

		$criteria->add(OcingresconPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCeding($this->ceding);

		$copyObj->setNoming($this->noming);

		$copyObj->setNrocoling($this->nrocoling);


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
			self::$peer = new OcingresconPeer();
		}
		return self::$peer;
	}

} 