<?php


abstract class BaseForcosequ extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $canrem;


	
	protected $candef;


	
	protected $totart;


	
	protected $codcat;


	
	protected $totcan;


	
	protected $cosult;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCanrem()
	{

		return $this->canrem;
	}

	
	public function getCandef()
	{

		return $this->candef;
	}

	
	public function getTotart()
	{

		return $this->totart;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getTotcan()
	{

		return $this->totcan;
	}

	
	public function getCosult()
	{

		return $this->cosult;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = ForcosequPeer::CODART;
		}

	} 
	
	public function setCanrem($v)
	{

		if ($this->canrem !== $v) {
			$this->canrem = $v;
			$this->modifiedColumns[] = ForcosequPeer::CANREM;
		}

	} 
	
	public function setCandef($v)
	{

		if ($this->candef !== $v) {
			$this->candef = $v;
			$this->modifiedColumns[] = ForcosequPeer::CANDEF;
		}

	} 
	
	public function setTotart($v)
	{

		if ($this->totart !== $v) {
			$this->totart = $v;
			$this->modifiedColumns[] = ForcosequPeer::TOTART;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = ForcosequPeer::CODCAT;
		}

	} 
	
	public function setTotcan($v)
	{

		if ($this->totcan !== $v) {
			$this->totcan = $v;
			$this->modifiedColumns[] = ForcosequPeer::TOTCAN;
		}

	} 
	
	public function setCosult($v)
	{

		if ($this->cosult !== $v) {
			$this->cosult = $v;
			$this->modifiedColumns[] = ForcosequPeer::COSULT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ForcosequPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codart = $rs->getString($startcol + 0);

			$this->canrem = $rs->getFloat($startcol + 1);

			$this->candef = $rs->getFloat($startcol + 2);

			$this->totart = $rs->getFloat($startcol + 3);

			$this->codcat = $rs->getString($startcol + 4);

			$this->totcan = $rs->getFloat($startcol + 5);

			$this->cosult = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Forcosequ object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ForcosequPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForcosequPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForcosequPeer::DATABASE_NAME);
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
					$pk = ForcosequPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ForcosequPeer::doUpdate($this, $con);
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


			if (($retval = ForcosequPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcosequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCanrem();
				break;
			case 2:
				return $this->getCandef();
				break;
			case 3:
				return $this->getTotart();
				break;
			case 4:
				return $this->getCodcat();
				break;
			case 5:
				return $this->getTotcan();
				break;
			case 6:
				return $this->getCosult();
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
		$keys = ForcosequPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCanrem(),
			$keys[2] => $this->getCandef(),
			$keys[3] => $this->getTotart(),
			$keys[4] => $this->getCodcat(),
			$keys[5] => $this->getTotcan(),
			$keys[6] => $this->getCosult(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForcosequPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCanrem($value);
				break;
			case 2:
				$this->setCandef($value);
				break;
			case 3:
				$this->setTotart($value);
				break;
			case 4:
				$this->setCodcat($value);
				break;
			case 5:
				$this->setTotcan($value);
				break;
			case 6:
				$this->setCosult($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForcosequPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCanrem($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCandef($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotcan($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCosult($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForcosequPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForcosequPeer::CODART)) $criteria->add(ForcosequPeer::CODART, $this->codart);
		if ($this->isColumnModified(ForcosequPeer::CANREM)) $criteria->add(ForcosequPeer::CANREM, $this->canrem);
		if ($this->isColumnModified(ForcosequPeer::CANDEF)) $criteria->add(ForcosequPeer::CANDEF, $this->candef);
		if ($this->isColumnModified(ForcosequPeer::TOTART)) $criteria->add(ForcosequPeer::TOTART, $this->totart);
		if ($this->isColumnModified(ForcosequPeer::CODCAT)) $criteria->add(ForcosequPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForcosequPeer::TOTCAN)) $criteria->add(ForcosequPeer::TOTCAN, $this->totcan);
		if ($this->isColumnModified(ForcosequPeer::COSULT)) $criteria->add(ForcosequPeer::COSULT, $this->cosult);
		if ($this->isColumnModified(ForcosequPeer::ID)) $criteria->add(ForcosequPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForcosequPeer::DATABASE_NAME);

		$criteria->add(ForcosequPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCanrem($this->canrem);

		$copyObj->setCandef($this->candef);

		$copyObj->setTotart($this->totart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setTotcan($this->totcan);

		$copyObj->setCosult($this->cosult);


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
			self::$peer = new ForcosequPeer();
		}
		return self::$peer;
	}

} 