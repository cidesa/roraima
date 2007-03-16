<?php


abstract class BaseCadetsal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsal;


	
	protected $codart;


	
	protected $cantot;


	
	protected $totart;


	
	protected $cosart;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsal()
	{

		return $this->codsal;
	}

	
	public function getCodart()
	{

		return $this->codart;
	}

	
	public function getCantot()
	{

		return $this->cantot;
	}

	
	public function getTotart()
	{

		return $this->totart;
	}

	
	public function getCosart()
	{

		return $this->cosart;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodsal($v)
	{

		if ($this->codsal !== $v) {
			$this->codsal = $v;
			$this->modifiedColumns[] = CadetsalPeer::CODSAL;
		}

	} 
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = CadetsalPeer::CODART;
		}

	} 
	
	public function setCantot($v)
	{

		if ($this->cantot !== $v) {
			$this->cantot = $v;
			$this->modifiedColumns[] = CadetsalPeer::CANTOT;
		}

	} 
	
	public function setTotart($v)
	{

		if ($this->totart !== $v) {
			$this->totart = $v;
			$this->modifiedColumns[] = CadetsalPeer::TOTART;
		}

	} 
	
	public function setCosart($v)
	{

		if ($this->cosart !== $v) {
			$this->cosart = $v;
			$this->modifiedColumns[] = CadetsalPeer::COSART;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CadetsalPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsal = $rs->getString($startcol + 0);

			$this->codart = $rs->getString($startcol + 1);

			$this->cantot = $rs->getFloat($startcol + 2);

			$this->totart = $rs->getFloat($startcol + 3);

			$this->cosart = $rs->getFloat($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cadetsal object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CadetsalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadetsalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadetsalPeer::DATABASE_NAME);
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
					$pk = CadetsalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CadetsalPeer::doUpdate($this, $con);
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


			if (($retval = CadetsalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsal();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCantot();
				break;
			case 3:
				return $this->getTotart();
				break;
			case 4:
				return $this->getCosart();
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
		$keys = CadetsalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsal(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCantot(),
			$keys[3] => $this->getTotart(),
			$keys[4] => $this->getCosart(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadetsalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsal($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCantot($value);
				break;
			case 3:
				$this->setTotart($value);
				break;
			case 4:
				$this->setCosart($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadetsalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCantot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTotart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCosart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadetsalPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadetsalPeer::CODSAL)) $criteria->add(CadetsalPeer::CODSAL, $this->codsal);
		if ($this->isColumnModified(CadetsalPeer::CODART)) $criteria->add(CadetsalPeer::CODART, $this->codart);
		if ($this->isColumnModified(CadetsalPeer::CANTOT)) $criteria->add(CadetsalPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CadetsalPeer::TOTART)) $criteria->add(CadetsalPeer::TOTART, $this->totart);
		if ($this->isColumnModified(CadetsalPeer::COSART)) $criteria->add(CadetsalPeer::COSART, $this->cosart);
		if ($this->isColumnModified(CadetsalPeer::ID)) $criteria->add(CadetsalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadetsalPeer::DATABASE_NAME);

		$criteria->add(CadetsalPeer::ID, $this->id);

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

		$copyObj->setCodsal($this->codsal);

		$copyObj->setCodart($this->codart);

		$copyObj->setCantot($this->cantot);

		$copyObj->setTotart($this->totart);

		$copyObj->setCosart($this->cosart);


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
			self::$peer = new CadetsalPeer();
		}
		return self::$peer;
	}

} 