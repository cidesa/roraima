<?php


abstract class BaseCaajuoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ajuoc;


	
	protected $ordcom;


	
	protected $fecaju;


	
	protected $desaju;


	
	protected $monaju;


	
	protected $staaju;


	
	protected $refaju;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getAjuoc()
	{

		return $this->ajuoc; 		
	}
	
	public function getOrdcom()
	{

		return $this->ordcom; 		
	}
	
	public function getFecaju($format = 'Y-m-d')
	{

		if ($this->fecaju === null || $this->fecaju === '') {
			return null;
		} elseif (!is_int($this->fecaju)) {
						$ts = strtotime($this->fecaju);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecaju] as date/time value: " . var_export($this->fecaju, true));
			}
		} else {
			$ts = $this->fecaju;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDesaju()
	{

		return $this->desaju; 		
	}
	
	public function getMonaju()
	{

		return number_format($this->monaju,2,',','.');
		
	}
	
	public function getStaaju()
	{

		return $this->staaju; 		
	}
	
	public function getRefaju()
	{

		return $this->refaju; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setAjuoc($v)
	{

		if ($this->ajuoc !== $v) {
			$this->ajuoc = $v;
			$this->modifiedColumns[] = CaajuocPeer::AJUOC;
		}

	} 
	
	public function setOrdcom($v)
	{

		if ($this->ordcom !== $v) {
			$this->ordcom = $v;
			$this->modifiedColumns[] = CaajuocPeer::ORDCOM;
		}

	} 
	
	public function setFecaju($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecaju] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecaju !== $ts) {
			$this->fecaju = $ts;
			$this->modifiedColumns[] = CaajuocPeer::FECAJU;
		}

	} 
	
	public function setDesaju($v)
	{

		if ($this->desaju !== $v) {
			$this->desaju = $v;
			$this->modifiedColumns[] = CaajuocPeer::DESAJU;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = CaajuocPeer::MONAJU;
		}

	} 
	
	public function setStaaju($v)
	{

		if ($this->staaju !== $v) {
			$this->staaju = $v;
			$this->modifiedColumns[] = CaajuocPeer::STAAJU;
		}

	} 
	
	public function setRefaju($v)
	{

		if ($this->refaju !== $v) {
			$this->refaju = $v;
			$this->modifiedColumns[] = CaajuocPeer::REFAJU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaajuocPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ajuoc = $rs->getString($startcol + 0);

			$this->ordcom = $rs->getString($startcol + 1);

			$this->fecaju = $rs->getDate($startcol + 2, null);

			$this->desaju = $rs->getString($startcol + 3);

			$this->monaju = $rs->getFloat($startcol + 4);

			$this->staaju = $rs->getString($startcol + 5);

			$this->refaju = $rs->getString($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caajuoc object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaajuocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaajuocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaajuocPeer::DATABASE_NAME);
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
					$pk = CaajuocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaajuocPeer::doUpdate($this, $con);
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


			if (($retval = CaajuocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaajuocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAjuoc();
				break;
			case 1:
				return $this->getOrdcom();
				break;
			case 2:
				return $this->getFecaju();
				break;
			case 3:
				return $this->getDesaju();
				break;
			case 4:
				return $this->getMonaju();
				break;
			case 5:
				return $this->getStaaju();
				break;
			case 6:
				return $this->getRefaju();
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
		$keys = CaajuocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAjuoc(),
			$keys[1] => $this->getOrdcom(),
			$keys[2] => $this->getFecaju(),
			$keys[3] => $this->getDesaju(),
			$keys[4] => $this->getMonaju(),
			$keys[5] => $this->getStaaju(),
			$keys[6] => $this->getRefaju(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaajuocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAjuoc($value);
				break;
			case 1:
				$this->setOrdcom($value);
				break;
			case 2:
				$this->setFecaju($value);
				break;
			case 3:
				$this->setDesaju($value);
				break;
			case 4:
				$this->setMonaju($value);
				break;
			case 5:
				$this->setStaaju($value);
				break;
			case 6:
				$this->setRefaju($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaajuocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAjuoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrdcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecaju($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesaju($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaaju($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefaju($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaajuocPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaajuocPeer::AJUOC)) $criteria->add(CaajuocPeer::AJUOC, $this->ajuoc);
		if ($this->isColumnModified(CaajuocPeer::ORDCOM)) $criteria->add(CaajuocPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CaajuocPeer::FECAJU)) $criteria->add(CaajuocPeer::FECAJU, $this->fecaju);
		if ($this->isColumnModified(CaajuocPeer::DESAJU)) $criteria->add(CaajuocPeer::DESAJU, $this->desaju);
		if ($this->isColumnModified(CaajuocPeer::MONAJU)) $criteria->add(CaajuocPeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CaajuocPeer::STAAJU)) $criteria->add(CaajuocPeer::STAAJU, $this->staaju);
		if ($this->isColumnModified(CaajuocPeer::REFAJU)) $criteria->add(CaajuocPeer::REFAJU, $this->refaju);
		if ($this->isColumnModified(CaajuocPeer::ID)) $criteria->add(CaajuocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaajuocPeer::DATABASE_NAME);

		$criteria->add(CaajuocPeer::ID, $this->id);

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

		$copyObj->setAjuoc($this->ajuoc);

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setFecaju($this->fecaju);

		$copyObj->setDesaju($this->desaju);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStaaju($this->staaju);

		$copyObj->setRefaju($this->refaju);


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
			self::$peer = new CaajuocPeer();
		}
		return self::$peer;
	}

} 