<?php


abstract class BaseCadisrgo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $codcat;


	
	protected $codart;


	
	protected $codrgo;


	
	protected $monrgo;


	
	protected $tipdoc;


	
	protected $codpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getReqart()
	{

		return $this->reqart;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCodrgo()
	{

		return $this->codrgo;
	}

	
	public function getMonrgo()
	{

		return $this->monrgo;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setReqart($v)
	{

		if ($this->reqart !== $v) {
			$this->reqart = $v;
			$this->modifiedColumns[] = CadisrgoPeer::REQART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = CadisrgoPeer::CODCAT;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CadisrgoPeer::CODART;
		}

	} 
	
	public function setCodrgo($v)
	{

		if ($this->codrgo !== $v) {
			$this->codrgo = $v;
			$this->modifiedColumns[] = CadisrgoPeer::CODRGO;
		}

	} 
	
	public function setMonrgo($v)
	{

		if ($this->monrgo !== $v) {
			$this->monrgo = $v;
			$this->modifiedColumns[] = CadisrgoPeer::MONRGO;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = CadisrgoPeer::TIPDOC;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CadisrgoPeer::CODPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CadisrgoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->reqart = $rs->getString($startcol + 0);

			$this->codcat = $rs->getString($startcol + 1);

			$this->codart = $rs->getString($startcol + 2);

			$this->codrgo = $rs->getString($startcol + 3);

			$this->monrgo = $rs->getFloat($startcol + 4);

			$this->tipdoc = $rs->getString($startcol + 5);

			$this->codpre = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cadisrgo object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CadisrgoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadisrgoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadisrgoPeer::DATABASE_NAME);
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
					$pk = CadisrgoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CadisrgoPeer::doUpdate($this, $con);
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


			if (($retval = CadisrgoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadisrgoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getCodcat();
				break;
			case 2:
				return $this->getCodart();
				break;
			case 3:
				return $this->getCodrgo();
				break;
			case 4:
				return $this->getMonrgo();
				break;
			case 5:
				return $this->getTipdoc();
				break;
			case 6:
				return $this->getCodpre();
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
		$keys = CadisrgoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getCodcat(),
			$keys[2] => $this->getCodart(),
			$keys[3] => $this->getCodrgo(),
			$keys[4] => $this->getMonrgo(),
			$keys[5] => $this->getTipdoc(),
			$keys[6] => $this->getCodpre(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadisrgoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setCodcat($value);
				break;
			case 2:
				$this->setCodart($value);
				break;
			case 3:
				$this->setCodrgo($value);
				break;
			case 4:
				$this->setMonrgo($value);
				break;
			case 5:
				$this->setTipdoc($value);
				break;
			case 6:
				$this->setCodpre($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadisrgoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodrgo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonrgo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipdoc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadisrgoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadisrgoPeer::REQART)) $criteria->add(CadisrgoPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CadisrgoPeer::CODCAT)) $criteria->add(CadisrgoPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CadisrgoPeer::CODART)) $criteria->add(CadisrgoPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadisrgoPeer::CODRGO)) $criteria->add(CadisrgoPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(CadisrgoPeer::MONRGO)) $criteria->add(CadisrgoPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(CadisrgoPeer::TIPDOC)) $criteria->add(CadisrgoPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(CadisrgoPeer::CODPRE)) $criteria->add(CadisrgoPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CadisrgoPeer::ID)) $criteria->add(CadisrgoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadisrgoPeer::DATABASE_NAME);

		$criteria->add(CadisrgoPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setCodpre($this->codpre);


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
			self::$peer = new CadisrgoPeer();
		}
		return self::$peer;
	}

} 