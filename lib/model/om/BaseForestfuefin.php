<?php


abstract class BaseForestfuefin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $codact;


	
	protected $codart;


	
	protected $codparing;


	
	protected $monfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodmet()
	{

		return $this->codmet;
	}

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getCodact()
	{

		return $this->codact;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCodparing()
	{

		return $this->codparing;
	}

	
	public function getMonfin()
	{

		return $this->monfin;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodmet($v)
	{

		if ($this->codmet !== $v) {
			$this->codmet = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::CODMET;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::CODPRO;
		}

	} 
	
	public function setCodact($v)
	{

		if ($this->codact !== $v) {
			$this->codact = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::CODACT;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::CODART;
		}

	} 
	
	public function setCodparing($v)
	{

		if ($this->codparing !== $v) {
			$this->codparing = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::CODPARING;
		}

	} 
	
	public function setMonfin($v)
	{

		if ($this->monfin !== $v) {
			$this->monfin = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::MONFIN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForestfuefinPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codmet = $rs->getString($startcol + 0);

			$this->codpro = $rs->getString($startcol + 1);

			$this->codact = $rs->getString($startcol + 2);

			$this->codart = $rs->getString($startcol + 3);

			$this->codparing = $rs->getString($startcol + 4);

			$this->monfin = $rs->getFloat($startcol + 5);

			$this->id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forestfuefin object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForestfuefinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForestfuefinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForestfuefinPeer::DATABASE_NAME);
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
					$pk = ForestfuefinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForestfuefinPeer::doUpdate($this, $con);
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


			if (($retval = ForestfuefinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmet();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getCodact();
				break;
			case 3:
				return $this->getCodart();
				break;
			case 4:
				return $this->getCodparing();
				break;
			case 5:
				return $this->getMonfin();
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
		$keys = ForestfuefinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getCodart(),
			$keys[4] => $this->getCodparing(),
			$keys[5] => $this->getMonfin(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForestfuefinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmet($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setCodact($value);
				break;
			case 3:
				$this->setCodart($value);
				break;
			case 4:
				$this->setCodparing($value);
				break;
			case 5:
				$this->setMonfin($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForestfuefinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodparing($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonfin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForestfuefinPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForestfuefinPeer::CODMET)) $criteria->add(ForestfuefinPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(ForestfuefinPeer::CODPRO)) $criteria->add(ForestfuefinPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ForestfuefinPeer::CODACT)) $criteria->add(ForestfuefinPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ForestfuefinPeer::CODART)) $criteria->add(ForestfuefinPeer::CODART, $this->codart);
		if ($this->isColumnModified(ForestfuefinPeer::CODPARING)) $criteria->add(ForestfuefinPeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(ForestfuefinPeer::MONFIN)) $criteria->add(ForestfuefinPeer::MONFIN, $this->monfin);
		if ($this->isColumnModified(ForestfuefinPeer::ID)) $criteria->add(ForestfuefinPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForestfuefinPeer::DATABASE_NAME);

		$criteria->add(ForestfuefinPeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodact($this->codact);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodparing($this->codparing);

		$copyObj->setMonfin($this->monfin);


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
			self::$peer = new ForestfuefinPeer();
		}
		return self::$peer;
	}

} 