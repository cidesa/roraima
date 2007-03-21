<?php


abstract class BaseNpnomespconnomtip extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnomesp;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnomesp()
	{

		return $this->codnomesp;
	}

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnomesp($v)
	{

		if ($this->codnomesp !== $v) {
			$this->codnomesp = $v;
			$this->modifiedColumns[] = NpnomespconnomtipPeer::CODNOMESP;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpnomespconnomtipPeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpnomespconnomtipPeer::CODCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpnomespconnomtipPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnomesp = $rs->getString($startcol + 0);

			$this->codnom = $rs->getString($startcol + 1);

			$this->codcon = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npnomespconnomtip object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpnomespconnomtipPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpnomespconnomtipPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpnomespconnomtipPeer::DATABASE_NAME);
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
					$pk = NpnomespconnomtipPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpnomespconnomtipPeer::doUpdate($this, $con);
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


			if (($retval = NpnomespconnomtipPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomespconnomtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnomesp();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getCodcon();
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
		$keys = NpnomespconnomtipPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnomesp(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomespconnomtipPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnomesp($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnomespconnomtipPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnomesp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpnomespconnomtipPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpnomespconnomtipPeer::CODNOMESP)) $criteria->add(NpnomespconnomtipPeer::CODNOMESP, $this->codnomesp);
		if ($this->isColumnModified(NpnomespconnomtipPeer::CODNOM)) $criteria->add(NpnomespconnomtipPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpnomespconnomtipPeer::CODCON)) $criteria->add(NpnomespconnomtipPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpnomespconnomtipPeer::ID)) $criteria->add(NpnomespconnomtipPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpnomespconnomtipPeer::DATABASE_NAME);

		$criteria->add(NpnomespconnomtipPeer::ID, $this->id);

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

		$copyObj->setCodnomesp($this->codnomesp);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);


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
			self::$peer = new NpnomespconnomtipPeer();
		}
		return self::$peer;
	}

} 