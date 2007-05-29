<?php


abstract class BaseFaartpvp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codpvp;


	
	protected $pvpart;


	
	protected $despvp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getCodpvp()
	{

		return $this->codpvp; 		
	}
	
	public function getPvpart()
	{

		return number_format($this->pvpart,2,',','.');
		
	}
	
	public function getDespvp()
	{

		return $this->despvp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FaartpvpPeer::CODART;
		}

	} 
	
	public function setCodpvp($v)
	{

		if ($this->codpvp !== $v) {
			$this->codpvp = $v;
			$this->modifiedColumns[] = FaartpvpPeer::CODPVP;
		}

	} 
	
	public function setPvpart($v)
	{

		if ($this->pvpart !== $v) {
			$this->pvpart = $v;
			$this->modifiedColumns[] = FaartpvpPeer::PVPART;
		}

	} 
	
	public function setDespvp($v)
	{

		if ($this->despvp !== $v) {
			$this->despvp = $v;
			$this->modifiedColumns[] = FaartpvpPeer::DESPVP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FaartpvpPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codart = $rs->getString($startcol + 0);

			$this->codpvp = $rs->getString($startcol + 1);

			$this->pvpart = $rs->getFloat($startcol + 2);

			$this->despvp = $rs->getString($startcol + 3);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Faartpvp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FaartpvpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartpvpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartpvpPeer::DATABASE_NAME);
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
					$pk = FaartpvpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FaartpvpPeer::doUpdate($this, $con);
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


			if (($retval = FaartpvpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartpvpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodpvp();
				break;
			case 2:
				return $this->getPvpart();
				break;
			case 3:
				return $this->getDespvp();
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
		$keys = FaartpvpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodpvp(),
			$keys[2] => $this->getPvpart(),
			$keys[3] => $this->getDespvp(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartpvpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodpvp($value);
				break;
			case 2:
				$this->setPvpart($value);
				break;
			case 3:
				$this->setDespvp($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartpvpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpvp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPvpart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDespvp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartpvpPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartpvpPeer::CODART)) $criteria->add(FaartpvpPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartpvpPeer::CODPVP)) $criteria->add(FaartpvpPeer::CODPVP, $this->codpvp);
		if ($this->isColumnModified(FaartpvpPeer::PVPART)) $criteria->add(FaartpvpPeer::PVPART, $this->pvpart);
		if ($this->isColumnModified(FaartpvpPeer::DESPVP)) $criteria->add(FaartpvpPeer::DESPVP, $this->despvp);
		if ($this->isColumnModified(FaartpvpPeer::ID)) $criteria->add(FaartpvpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartpvpPeer::DATABASE_NAME);

		$criteria->add(FaartpvpPeer::ID, $this->id);

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

		$copyObj->setCodpvp($this->codpvp);

		$copyObj->setPvpart($this->pvpart);

		$copyObj->setDespvp($this->despvp);


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
			self::$peer = new FaartpvpPeer();
		}
		return self::$peer;
	}

} 