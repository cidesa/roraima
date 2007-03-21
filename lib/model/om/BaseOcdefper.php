<?php


abstract class BaseOcdefper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedper;


	
	protected $nomper;


	
	protected $telper;


	
	protected $codtipcar;


	
	protected $codtippro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCedper()
	{

		return $this->cedper;
	}

	
	public function getNomper()
	{

		return $this->nomper;
	}

	
	public function getTelper()
	{

		return $this->telper;
	}

	
	public function getCodtipcar()
	{

		return $this->codtipcar;
	}

	
	public function getCodtippro()
	{

		return $this->codtippro;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCedper($v)
	{

		if ($this->cedper !== $v) {
			$this->cedper = $v;
			$this->modifiedColumns[] = OcdefperPeer::CEDPER;
		}

	} 
	
	public function setNomper($v)
	{

		if ($this->nomper !== $v) {
			$this->nomper = $v;
			$this->modifiedColumns[] = OcdefperPeer::NOMPER;
		}

	} 
	
	public function setTelper($v)
	{

		if ($this->telper !== $v) {
			$this->telper = $v;
			$this->modifiedColumns[] = OcdefperPeer::TELPER;
		}

	} 
	
	public function setCodtipcar($v)
	{

		if ($this->codtipcar !== $v) {
			$this->codtipcar = $v;
			$this->modifiedColumns[] = OcdefperPeer::CODTIPCAR;
		}

	} 
	
	public function setCodtippro($v)
	{

		if ($this->codtippro !== $v) {
			$this->codtippro = $v;
			$this->modifiedColumns[] = OcdefperPeer::CODTIPPRO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcdefperPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->cedper = $rs->getString($startcol + 0);

			$this->nomper = $rs->getString($startcol + 1);

			$this->telper = $rs->getString($startcol + 2);

			$this->codtipcar = $rs->getString($startcol + 3);

			$this->codtippro = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocdefper object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcdefperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcdefperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcdefperPeer::DATABASE_NAME);
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
					$pk = OcdefperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcdefperPeer::doUpdate($this, $con);
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


			if (($retval = OcdefperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdefperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedper();
				break;
			case 1:
				return $this->getNomper();
				break;
			case 2:
				return $this->getTelper();
				break;
			case 3:
				return $this->getCodtipcar();
				break;
			case 4:
				return $this->getCodtippro();
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
		$keys = OcdefperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedper(),
			$keys[1] => $this->getNomper(),
			$keys[2] => $this->getTelper(),
			$keys[3] => $this->getCodtipcar(),
			$keys[4] => $this->getCodtippro(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcdefperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedper($value);
				break;
			case 1:
				$this->setNomper($value);
				break;
			case 2:
				$this->setTelper($value);
				break;
			case 3:
				$this->setCodtipcar($value);
				break;
			case 4:
				$this->setCodtippro($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcdefperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedper($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomper($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelper($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodtipcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtippro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcdefperPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcdefperPeer::CEDPER)) $criteria->add(OcdefperPeer::CEDPER, $this->cedper);
		if ($this->isColumnModified(OcdefperPeer::NOMPER)) $criteria->add(OcdefperPeer::NOMPER, $this->nomper);
		if ($this->isColumnModified(OcdefperPeer::TELPER)) $criteria->add(OcdefperPeer::TELPER, $this->telper);
		if ($this->isColumnModified(OcdefperPeer::CODTIPCAR)) $criteria->add(OcdefperPeer::CODTIPCAR, $this->codtipcar);
		if ($this->isColumnModified(OcdefperPeer::CODTIPPRO)) $criteria->add(OcdefperPeer::CODTIPPRO, $this->codtippro);
		if ($this->isColumnModified(OcdefperPeer::ID)) $criteria->add(OcdefperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcdefperPeer::DATABASE_NAME);

		$criteria->add(OcdefperPeer::ID, $this->id);

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

		$copyObj->setCedper($this->cedper);

		$copyObj->setNomper($this->nomper);

		$copyObj->setTelper($this->telper);

		$copyObj->setCodtipcar($this->codtipcar);

		$copyObj->setCodtippro($this->codtippro);


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
			self::$peer = new OcdefperPeer();
		}
		return self::$peer;
	}

} 