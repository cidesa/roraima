<?php


abstract class BaseOcparins extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $numins;


	
	protected $codpar;


	
	protected $poreje;


	
	protected $obsins;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getNumins()
	{

		return $this->numins;
	}

	
	public function getCodpar()
	{

		return $this->codpar;
	}

	
	public function getPoreje()
	{

		return $this->poreje;
	}

	
	public function getObsins()
	{

		return $this->obsins;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcparinsPeer::CODCON;
		}

	} 
	
	public function setNumins($v)
	{

		if ($this->numins !== $v) {
			$this->numins = $v;
			$this->modifiedColumns[] = OcparinsPeer::NUMINS;
		}

	} 
	
	public function setCodpar($v)
	{

		if ($this->codpar !== $v) {
			$this->codpar = $v;
			$this->modifiedColumns[] = OcparinsPeer::CODPAR;
		}

	} 
	
	public function setPoreje($v)
	{

		if ($this->poreje !== $v) {
			$this->poreje = $v;
			$this->modifiedColumns[] = OcparinsPeer::POREJE;
		}

	} 
	
	public function setObsins($v)
	{

		if ($this->obsins !== $v) {
			$this->obsins = $v;
			$this->modifiedColumns[] = OcparinsPeer::OBSINS;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcparinsPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->numins = $rs->getString($startcol + 1);

			$this->codpar = $rs->getString($startcol + 2);

			$this->poreje = $rs->getFloat($startcol + 3);

			$this->obsins = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocparins object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcparinsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcparinsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcparinsPeer::DATABASE_NAME);
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
					$pk = OcparinsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcparinsPeer::doUpdate($this, $con);
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


			if (($retval = OcparinsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcparinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNumins();
				break;
			case 2:
				return $this->getCodpar();
				break;
			case 3:
				return $this->getPoreje();
				break;
			case 4:
				return $this->getObsins();
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
		$keys = OcparinsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNumins(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getPoreje(),
			$keys[4] => $this->getObsins(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcparinsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNumins($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setPoreje($value);
				break;
			case 4:
				$this->setObsins($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcparinsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPoreje($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObsins($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcparinsPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcparinsPeer::CODCON)) $criteria->add(OcparinsPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcparinsPeer::NUMINS)) $criteria->add(OcparinsPeer::NUMINS, $this->numins);
		if ($this->isColumnModified(OcparinsPeer::CODPAR)) $criteria->add(OcparinsPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(OcparinsPeer::POREJE)) $criteria->add(OcparinsPeer::POREJE, $this->poreje);
		if ($this->isColumnModified(OcparinsPeer::OBSINS)) $criteria->add(OcparinsPeer::OBSINS, $this->obsins);
		if ($this->isColumnModified(OcparinsPeer::ID)) $criteria->add(OcparinsPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcparinsPeer::DATABASE_NAME);

		$criteria->add(OcparinsPeer::ID, $this->id);

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

		$copyObj->setNumins($this->numins);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setPoreje($this->poreje);

		$copyObj->setObsins($this->obsins);


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
			self::$peer = new OcparinsPeer();
		}
		return self::$peer;
	}

} 