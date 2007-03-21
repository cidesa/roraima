<?php


abstract class BaseNpseghcm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $tippar;


	
	protected $edaddes;


	
	protected $edadhas;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getTippar()
	{

		return $this->tippar;
	}

	
	public function getEdaddes()
	{

		return $this->edaddes;
	}

	
	public function getEdadhas()
	{

		return $this->edadhas;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpseghcmPeer::CODCON;
		}

	} 
	
	public function setTippar($v)
	{

		if ($this->tippar !== $v) {
			$this->tippar = $v;
			$this->modifiedColumns[] = NpseghcmPeer::TIPPAR;
		}

	} 
	
	public function setEdaddes($v)
	{

		if ($this->edaddes !== $v) {
			$this->edaddes = $v;
			$this->modifiedColumns[] = NpseghcmPeer::EDADDES;
		}

	} 
	
	public function setEdadhas($v)
	{

		if ($this->edadhas !== $v) {
			$this->edadhas = $v;
			$this->modifiedColumns[] = NpseghcmPeer::EDADHAS;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NpseghcmPeer::MONTO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpseghcmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->tippar = $rs->getString($startcol + 1);

			$this->edaddes = $rs->getFloat($startcol + 2);

			$this->edadhas = $rs->getFloat($startcol + 3);

			$this->monto = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npseghcm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpseghcmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpseghcmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpseghcmPeer::DATABASE_NAME);
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
					$pk = NpseghcmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpseghcmPeer::doUpdate($this, $con);
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


			if (($retval = NpseghcmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpseghcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getTippar();
				break;
			case 2:
				return $this->getEdaddes();
				break;
			case 3:
				return $this->getEdadhas();
				break;
			case 4:
				return $this->getMonto();
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
		$keys = NpseghcmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getTippar(),
			$keys[2] => $this->getEdaddes(),
			$keys[3] => $this->getEdadhas(),
			$keys[4] => $this->getMonto(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpseghcmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setTippar($value);
				break;
			case 2:
				$this->setEdaddes($value);
				break;
			case 3:
				$this->setEdadhas($value);
				break;
			case 4:
				$this->setMonto($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpseghcmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTippar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEdaddes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEdadhas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpseghcmPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpseghcmPeer::CODCON)) $criteria->add(NpseghcmPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpseghcmPeer::TIPPAR)) $criteria->add(NpseghcmPeer::TIPPAR, $this->tippar);
		if ($this->isColumnModified(NpseghcmPeer::EDADDES)) $criteria->add(NpseghcmPeer::EDADDES, $this->edaddes);
		if ($this->isColumnModified(NpseghcmPeer::EDADHAS)) $criteria->add(NpseghcmPeer::EDADHAS, $this->edadhas);
		if ($this->isColumnModified(NpseghcmPeer::MONTO)) $criteria->add(NpseghcmPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpseghcmPeer::ID)) $criteria->add(NpseghcmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpseghcmPeer::DATABASE_NAME);

		$criteria->add(NpseghcmPeer::ID, $this->id);

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

		$copyObj->setTippar($this->tippar);

		$copyObj->setEdaddes($this->edaddes);

		$copyObj->setEdadhas($this->edadhas);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new NpseghcmPeer();
		}
		return self::$peer;
	}

} 