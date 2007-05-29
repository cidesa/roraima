<?php


abstract class BaseCpdiscreadic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $sector;


	
	protected $partida;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getSector()
	{

		return $this->sector; 		
	}
	
	public function getPartida()
	{

		return $this->partida; 		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setSector($v)
	{

		if ($this->sector !== $v) {
			$this->sector = $v;
			$this->modifiedColumns[] = CpdiscreadicPeer::SECTOR;
		}

	} 
	
	public function setPartida($v)
	{

		if ($this->partida !== $v) {
			$this->partida = $v;
			$this->modifiedColumns[] = CpdiscreadicPeer::PARTIDA;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = CpdiscreadicPeer::MONTO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpdiscreadicPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->sector = $rs->getString($startcol + 0);

			$this->partida = $rs->getString($startcol + 1);

			$this->monto = $rs->getFloat($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpdiscreadic object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpdiscreadicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpdiscreadicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpdiscreadicPeer::DATABASE_NAME);
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
					$pk = CpdiscreadicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpdiscreadicPeer::doUpdate($this, $con);
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


			if (($retval = CpdiscreadicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdiscreadicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSector();
				break;
			case 1:
				return $this->getPartida();
				break;
			case 2:
				return $this->getMonto();
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
		$keys = CpdiscreadicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSector(),
			$keys[1] => $this->getPartida(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpdiscreadicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSector($value);
				break;
			case 1:
				$this->setPartida($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpdiscreadicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSector($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPartida($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpdiscreadicPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpdiscreadicPeer::SECTOR)) $criteria->add(CpdiscreadicPeer::SECTOR, $this->sector);
		if ($this->isColumnModified(CpdiscreadicPeer::PARTIDA)) $criteria->add(CpdiscreadicPeer::PARTIDA, $this->partida);
		if ($this->isColumnModified(CpdiscreadicPeer::MONTO)) $criteria->add(CpdiscreadicPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CpdiscreadicPeer::ID)) $criteria->add(CpdiscreadicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpdiscreadicPeer::DATABASE_NAME);

		$criteria->add(CpdiscreadicPeer::ID, $this->id);

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

		$copyObj->setSector($this->sector);

		$copyObj->setPartida($this->partida);

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
			self::$peer = new CpdiscreadicPeer();
		}
		return self::$peer;
	}

} 