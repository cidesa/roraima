<?php


abstract class BaseOcofeser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codtippro;


	
	protected $nivpro;


	
	protected $exppro;


	
	protected $numper;


	
	protected $canhor;


	
	protected $canval;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getCodtippro()
	{

		return $this->codtippro;
	}

	
	public function getNivpro()
	{

		return $this->nivpro;
	}

	
	public function getExppro()
	{

		return $this->exppro;
	}

	
	public function getNumper()
	{

		return $this->numper;
	}

	
	public function getCanhor()
	{

		return $this->canhor;
	}

	
	public function getCanval()
	{

		return $this->canval;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcofeserPeer::CODCON;
		}

	} 
	
	public function setCodtippro($v)
	{

		if ($this->codtippro !== $v) {
			$this->codtippro = $v;
			$this->modifiedColumns[] = OcofeserPeer::CODTIPPRO;
		}

	} 
	
	public function setNivpro($v)
	{

		if ($this->nivpro !== $v) {
			$this->nivpro = $v;
			$this->modifiedColumns[] = OcofeserPeer::NIVPRO;
		}

	} 
	
	public function setExppro($v)
	{

		if ($this->exppro !== $v) {
			$this->exppro = $v;
			$this->modifiedColumns[] = OcofeserPeer::EXPPRO;
		}

	} 
	
	public function setNumper($v)
	{

		if ($this->numper !== $v) {
			$this->numper = $v;
			$this->modifiedColumns[] = OcofeserPeer::NUMPER;
		}

	} 
	
	public function setCanhor($v)
	{

		if ($this->canhor !== $v) {
			$this->canhor = $v;
			$this->modifiedColumns[] = OcofeserPeer::CANHOR;
		}

	} 
	
	public function setCanval($v)
	{

		if ($this->canval !== $v) {
			$this->canval = $v;
			$this->modifiedColumns[] = OcofeserPeer::CANVAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcofeserPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->codtippro = $rs->getString($startcol + 1);

			$this->nivpro = $rs->getString($startcol + 2);

			$this->exppro = $rs->getFloat($startcol + 3);

			$this->numper = $rs->getFloat($startcol + 4);

			$this->canhor = $rs->getFloat($startcol + 5);

			$this->canval = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocofeser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcofeserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcofeserPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcofeserPeer::DATABASE_NAME);
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
					$pk = OcofeserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcofeserPeer::doUpdate($this, $con);
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


			if (($retval = OcofeserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcofeserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodtippro();
				break;
			case 2:
				return $this->getNivpro();
				break;
			case 3:
				return $this->getExppro();
				break;
			case 4:
				return $this->getNumper();
				break;
			case 5:
				return $this->getCanhor();
				break;
			case 6:
				return $this->getCanval();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcofeserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodtippro(),
			$keys[2] => $this->getNivpro(),
			$keys[3] => $this->getExppro(),
			$keys[4] => $this->getNumper(),
			$keys[5] => $this->getCanhor(),
			$keys[6] => $this->getCanval(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcofeserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodtippro($value);
				break;
			case 2:
				$this->setNivpro($value);
				break;
			case 3:
				$this->setExppro($value);
				break;
			case 4:
				$this->setNumper($value);
				break;
			case 5:
				$this->setCanhor($value);
				break;
			case 6:
				$this->setCanval($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcofeserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtippro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNivpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setExppro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumper($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanhor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanval($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcofeserPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcofeserPeer::CODCON)) $criteria->add(OcofeserPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcofeserPeer::CODTIPPRO)) $criteria->add(OcofeserPeer::CODTIPPRO, $this->codtippro);
		if ($this->isColumnModified(OcofeserPeer::NIVPRO)) $criteria->add(OcofeserPeer::NIVPRO, $this->nivpro);
		if ($this->isColumnModified(OcofeserPeer::EXPPRO)) $criteria->add(OcofeserPeer::EXPPRO, $this->exppro);
		if ($this->isColumnModified(OcofeserPeer::NUMPER)) $criteria->add(OcofeserPeer::NUMPER, $this->numper);
		if ($this->isColumnModified(OcofeserPeer::CANHOR)) $criteria->add(OcofeserPeer::CANHOR, $this->canhor);
		if ($this->isColumnModified(OcofeserPeer::CANVAL)) $criteria->add(OcofeserPeer::CANVAL, $this->canval);
		if ($this->isColumnModified(OcofeserPeer::ID)) $criteria->add(OcofeserPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcofeserPeer::DATABASE_NAME);

		$criteria->add(OcofeserPeer::ID, $this->id);

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

		$copyObj->setCodtippro($this->codtippro);

		$copyObj->setNivpro($this->nivpro);

		$copyObj->setExppro($this->exppro);

		$copyObj->setNumper($this->numper);

		$copyObj->setCanhor($this->canhor);

		$copyObj->setCanval($this->canval);


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
			self::$peer = new OcofeserPeer();
		}
		return self::$peer;
	}

} 