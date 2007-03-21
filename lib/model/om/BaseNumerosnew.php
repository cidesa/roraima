<?php


abstract class BaseNumerosnew extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $num;


	
	protected $pos;


	
	protected $nomnum;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNum()
	{

		return $this->num;
	}

	
	public function getPos()
	{

		return $this->pos;
	}

	
	public function getNomnum()
	{

		return $this->nomnum;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNum($v)
	{

		if ($this->num !== $v) {
			$this->num = $v;
			$this->modifiedColumns[] = NumerosnewPeer::NUM;
		}

	} 
	
	public function setPos($v)
	{

		if ($this->pos !== $v) {
			$this->pos = $v;
			$this->modifiedColumns[] = NumerosnewPeer::POS;
		}

	} 
	
	public function setNomnum($v)
	{

		if ($this->nomnum !== $v) {
			$this->nomnum = $v;
			$this->modifiedColumns[] = NumerosnewPeer::NOMNUM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NumerosnewPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->num = $rs->getFloat($startcol + 0);

			$this->pos = $rs->getFloat($startcol + 1);

			$this->nomnum = $rs->getString($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Numerosnew object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NumerosnewPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NumerosnewPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NumerosnewPeer::DATABASE_NAME);
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
					$pk = NumerosnewPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NumerosnewPeer::doUpdate($this, $con);
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


			if (($retval = NumerosnewPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NumerosnewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNum();
				break;
			case 1:
				return $this->getPos();
				break;
			case 2:
				return $this->getNomnum();
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
		$keys = NumerosnewPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNum(),
			$keys[1] => $this->getPos(),
			$keys[2] => $this->getNomnum(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NumerosnewPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNum($value);
				break;
			case 1:
				$this->setPos($value);
				break;
			case 2:
				$this->setNomnum($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NumerosnewPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNum($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPos($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomnum($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NumerosnewPeer::DATABASE_NAME);

		if ($this->isColumnModified(NumerosnewPeer::NUM)) $criteria->add(NumerosnewPeer::NUM, $this->num);
		if ($this->isColumnModified(NumerosnewPeer::POS)) $criteria->add(NumerosnewPeer::POS, $this->pos);
		if ($this->isColumnModified(NumerosnewPeer::NOMNUM)) $criteria->add(NumerosnewPeer::NOMNUM, $this->nomnum);
		if ($this->isColumnModified(NumerosnewPeer::ID)) $criteria->add(NumerosnewPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NumerosnewPeer::DATABASE_NAME);

		$criteria->add(NumerosnewPeer::ID, $this->id);

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

		$copyObj->setNum($this->num);

		$copyObj->setPos($this->pos);

		$copyObj->setNomnum($this->nomnum);


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
			self::$peer = new NumerosnewPeer();
		}
		return self::$peer;
	}

} 