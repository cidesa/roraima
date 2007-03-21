<?php


abstract class BaseNpdefpar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcol;


	
	protected $nomcol;


	
	protected $tipcol;


	
	protected $loncol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcol()
	{

		return $this->codcol;
	}

	
	public function getNomcol()
	{

		return $this->nomcol;
	}

	
	public function getTipcol()
	{

		return $this->tipcol;
	}

	
	public function getLoncol()
	{

		return $this->loncol;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcol($v)
	{

		if ($this->codcol !== $v) {
			$this->codcol = $v;
			$this->modifiedColumns[] = NpdefparPeer::CODCOL;
		}

	} 
	
	public function setNomcol($v)
	{

		if ($this->nomcol !== $v) {
			$this->nomcol = $v;
			$this->modifiedColumns[] = NpdefparPeer::NOMCOL;
		}

	} 
	
	public function setTipcol($v)
	{

		if ($this->tipcol !== $v) {
			$this->tipcol = $v;
			$this->modifiedColumns[] = NpdefparPeer::TIPCOL;
		}

	} 
	
	public function setLoncol($v)
	{

		if ($this->loncol !== $v) {
			$this->loncol = $v;
			$this->modifiedColumns[] = NpdefparPeer::LONCOL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpdefparPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcol = $rs->getString($startcol + 0);

			$this->nomcol = $rs->getString($startcol + 1);

			$this->tipcol = $rs->getString($startcol + 2);

			$this->loncol = $rs->getFloat($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npdefpar object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpdefparPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefparPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefparPeer::DATABASE_NAME);
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
					$pk = NpdefparPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpdefparPeer::doUpdate($this, $con);
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


			if (($retval = NpdefparPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcol();
				break;
			case 1:
				return $this->getNomcol();
				break;
			case 2:
				return $this->getTipcol();
				break;
			case 3:
				return $this->getLoncol();
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
		$keys = NpdefparPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcol(),
			$keys[1] => $this->getNomcol(),
			$keys[2] => $this->getTipcol(),
			$keys[3] => $this->getLoncol(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefparPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcol($value);
				break;
			case 1:
				$this->setNomcol($value);
				break;
			case 2:
				$this->setTipcol($value);
				break;
			case 3:
				$this->setLoncol($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefparPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLoncol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefparPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefparPeer::CODCOL)) $criteria->add(NpdefparPeer::CODCOL, $this->codcol);
		if ($this->isColumnModified(NpdefparPeer::NOMCOL)) $criteria->add(NpdefparPeer::NOMCOL, $this->nomcol);
		if ($this->isColumnModified(NpdefparPeer::TIPCOL)) $criteria->add(NpdefparPeer::TIPCOL, $this->tipcol);
		if ($this->isColumnModified(NpdefparPeer::LONCOL)) $criteria->add(NpdefparPeer::LONCOL, $this->loncol);
		if ($this->isColumnModified(NpdefparPeer::ID)) $criteria->add(NpdefparPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefparPeer::DATABASE_NAME);

		$criteria->add(NpdefparPeer::ID, $this->id);

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

		$copyObj->setCodcol($this->codcol);

		$copyObj->setNomcol($this->nomcol);

		$copyObj->setTipcol($this->tipcol);

		$copyObj->setLoncol($this->loncol);


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
			self::$peer = new NpdefparPeer();
		}
		return self::$peer;
	}

} 