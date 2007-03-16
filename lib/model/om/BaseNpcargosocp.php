<?php


abstract class BaseNpcargosocp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $codpas;


	
	protected $codgra;


	
	protected $sueldo;


	
	protected $descar;


	
	protected $comcar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getCodpas()
	{

		return $this->codpas;
	}

	
	public function getCodgra()
	{

		return $this->codgra;
	}

	
	public function getSueldo()
	{

		return $this->sueldo;
	}

	
	public function getDescar()
	{

		return $this->descar;
	}

	
	public function getComcar()
	{

		return $this->comcar;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::CODCAR;
		}

	} 
	
	public function setCodpas($v)
	{

		if ($this->codpas !== $v) {
			$this->codpas = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::CODPAS;
		}

	} 
	
	public function setCodgra($v)
	{

		if ($this->codgra !== $v) {
			$this->codgra = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::CODGRA;
		}

	} 
	
	public function setSueldo($v)
	{

		if ($this->sueldo !== $v) {
			$this->sueldo = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::SUELDO;
		}

	} 
	
	public function setDescar($v)
	{

		if ($this->descar !== $v) {
			$this->descar = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::DESCAR;
		}

	} 
	
	public function setComcar($v)
	{

		if ($this->comcar !== $v) {
			$this->comcar = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::COMCAR;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcargosocpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcar = $rs->getString($startcol + 0);

			$this->codpas = $rs->getString($startcol + 1);

			$this->codgra = $rs->getString($startcol + 2);

			$this->sueldo = $rs->getFloat($startcol + 3);

			$this->descar = $rs->getString($startcol + 4);

			$this->comcar = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcargosocp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcargosocpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcargosocpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcargosocpPeer::DATABASE_NAME);
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
					$pk = NpcargosocpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcargosocpPeer::doUpdate($this, $con);
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


			if (($retval = NpcargosocpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargosocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getCodpas();
				break;
			case 2:
				return $this->getCodgra();
				break;
			case 3:
				return $this->getSueldo();
				break;
			case 4:
				return $this->getDescar();
				break;
			case 5:
				return $this->getComcar();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargosocpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getCodpas(),
			$keys[2] => $this->getCodgra(),
			$keys[3] => $this->getSueldo(),
			$keys[4] => $this->getDescar(),
			$keys[5] => $this->getComcar(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargosocpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setCodpas($value);
				break;
			case 2:
				$this->setCodgra($value);
				break;
			case 3:
				$this->setSueldo($value);
				break;
			case 4:
				$this->setDescar($value);
				break;
			case 5:
				$this->setComcar($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargosocpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodgra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSueldo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setComcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcargosocpPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcargosocpPeer::CODCAR)) $criteria->add(NpcargosocpPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpcargosocpPeer::CODPAS)) $criteria->add(NpcargosocpPeer::CODPAS, $this->codpas);
		if ($this->isColumnModified(NpcargosocpPeer::CODGRA)) $criteria->add(NpcargosocpPeer::CODGRA, $this->codgra);
		if ($this->isColumnModified(NpcargosocpPeer::SUELDO)) $criteria->add(NpcargosocpPeer::SUELDO, $this->sueldo);
		if ($this->isColumnModified(NpcargosocpPeer::DESCAR)) $criteria->add(NpcargosocpPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(NpcargosocpPeer::COMCAR)) $criteria->add(NpcargosocpPeer::COMCAR, $this->comcar);
		if ($this->isColumnModified(NpcargosocpPeer::ID)) $criteria->add(NpcargosocpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcargosocpPeer::DATABASE_NAME);

		$criteria->add(NpcargosocpPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodpas($this->codpas);

		$copyObj->setCodgra($this->codgra);

		$copyObj->setSueldo($this->sueldo);

		$copyObj->setDescar($this->descar);

		$copyObj->setComcar($this->comcar);


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
			self::$peer = new NpcargosocpPeer();
		}
		return self::$peer;
	}

} 