<?php


abstract class BaseFapedido extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroped;


	
	protected $fecped;


	
	protected $refped;


	
	protected $tipref;


	
	protected $codcli;


	
	protected $desped;


	
	protected $monped;


	
	protected $obsped;


	
	protected $reapor;


	
	protected $status;


	
	protected $fecanu;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNroped()
	{

		return $this->nroped; 		
	}
	
	public function getFecped($format = 'Y-m-d')
	{

		if ($this->fecped === null || $this->fecped === '') {
			return null;
		} elseif (!is_int($this->fecped)) {
						$ts = strtotime($this->fecped);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecped] as date/time value: " . var_export($this->fecped, true));
			}
		} else {
			$ts = $this->fecped;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRefped()
	{

		return $this->refped; 		
	}
	
	public function getTipref()
	{

		return $this->tipref; 		
	}
	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getDesped()
	{

		return $this->desped; 		
	}
	
	public function getMonped()
	{

		return number_format($this->monped,2,',','.');
		
	}
	
	public function getObsped()
	{

		return $this->obsped; 		
	}
	
	public function getReapor()
	{

		return $this->reapor; 		
	}
	
	public function getStatus()
	{

		return $this->status; 		
	}
	
	public function getFecanu($format = 'Y-m-d')
	{

		if ($this->fecanu === null || $this->fecanu === '') {
			return null;
		} elseif (!is_int($this->fecanu)) {
						$ts = strtotime($this->fecanu);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
			}
		} else {
			$ts = $this->fecanu;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNroped($v)
	{

		if ($this->nroped !== $v) {
			$this->nroped = $v;
			$this->modifiedColumns[] = FapedidoPeer::NROPED;
		}

	} 
	
	public function setFecped($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecped] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecped !== $ts) {
			$this->fecped = $ts;
			$this->modifiedColumns[] = FapedidoPeer::FECPED;
		}

	} 
	
	public function setRefped($v)
	{

		if ($this->refped !== $v) {
			$this->refped = $v;
			$this->modifiedColumns[] = FapedidoPeer::REFPED;
		}

	} 
	
	public function setTipref($v)
	{

		if ($this->tipref !== $v) {
			$this->tipref = $v;
			$this->modifiedColumns[] = FapedidoPeer::TIPREF;
		}

	} 
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = FapedidoPeer::CODCLI;
		}

	} 
	
	public function setDesped($v)
	{

		if ($this->desped !== $v) {
			$this->desped = $v;
			$this->modifiedColumns[] = FapedidoPeer::DESPED;
		}

	} 
	
	public function setMonped($v)
	{

		if ($this->monped !== $v) {
			$this->monped = $v;
			$this->modifiedColumns[] = FapedidoPeer::MONPED;
		}

	} 
	
	public function setObsped($v)
	{

		if ($this->obsped !== $v) {
			$this->obsped = $v;
			$this->modifiedColumns[] = FapedidoPeer::OBSPED;
		}

	} 
	
	public function setReapor($v)
	{

		if ($this->reapor !== $v) {
			$this->reapor = $v;
			$this->modifiedColumns[] = FapedidoPeer::REAPOR;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = FapedidoPeer::STATUS;
		}

	} 
	
	public function setFecanu($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanu !== $ts) {
			$this->fecanu = $ts;
			$this->modifiedColumns[] = FapedidoPeer::FECANU;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FapedidoPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nroped = $rs->getString($startcol + 0);

			$this->fecped = $rs->getDate($startcol + 1, null);

			$this->refped = $rs->getString($startcol + 2);

			$this->tipref = $rs->getString($startcol + 3);

			$this->codcli = $rs->getString($startcol + 4);

			$this->desped = $rs->getString($startcol + 5);

			$this->monped = $rs->getFloat($startcol + 6);

			$this->obsped = $rs->getString($startcol + 7);

			$this->reapor = $rs->getString($startcol + 8);

			$this->status = $rs->getString($startcol + 9);

			$this->fecanu = $rs->getDate($startcol + 10, null);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fapedido object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FapedidoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapedidoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapedidoPeer::DATABASE_NAME);
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
					$pk = FapedidoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FapedidoPeer::doUpdate($this, $con);
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


			if (($retval = FapedidoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroped();
				break;
			case 1:
				return $this->getFecped();
				break;
			case 2:
				return $this->getRefped();
				break;
			case 3:
				return $this->getTipref();
				break;
			case 4:
				return $this->getCodcli();
				break;
			case 5:
				return $this->getDesped();
				break;
			case 6:
				return $this->getMonped();
				break;
			case 7:
				return $this->getObsped();
				break;
			case 8:
				return $this->getReapor();
				break;
			case 9:
				return $this->getStatus();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapedidoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroped(),
			$keys[1] => $this->getFecped(),
			$keys[2] => $this->getRefped(),
			$keys[3] => $this->getTipref(),
			$keys[4] => $this->getCodcli(),
			$keys[5] => $this->getDesped(),
			$keys[6] => $this->getMonped(),
			$keys[7] => $this->getObsped(),
			$keys[8] => $this->getReapor(),
			$keys[9] => $this->getStatus(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapedidoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroped($value);
				break;
			case 1:
				$this->setFecped($value);
				break;
			case 2:
				$this->setRefped($value);
				break;
			case 3:
				$this->setTipref($value);
				break;
			case 4:
				$this->setCodcli($value);
				break;
			case 5:
				$this->setDesped($value);
				break;
			case 6:
				$this->setMonped($value);
				break;
			case 7:
				$this->setObsped($value);
				break;
			case 8:
				$this->setReapor($value);
				break;
			case 9:
				$this->setStatus($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapedidoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroped($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecped($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefped($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipref($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcli($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesped($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonped($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObsped($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setReapor($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatus($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapedidoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapedidoPeer::NROPED)) $criteria->add(FapedidoPeer::NROPED, $this->nroped);
		if ($this->isColumnModified(FapedidoPeer::FECPED)) $criteria->add(FapedidoPeer::FECPED, $this->fecped);
		if ($this->isColumnModified(FapedidoPeer::REFPED)) $criteria->add(FapedidoPeer::REFPED, $this->refped);
		if ($this->isColumnModified(FapedidoPeer::TIPREF)) $criteria->add(FapedidoPeer::TIPREF, $this->tipref);
		if ($this->isColumnModified(FapedidoPeer::CODCLI)) $criteria->add(FapedidoPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FapedidoPeer::DESPED)) $criteria->add(FapedidoPeer::DESPED, $this->desped);
		if ($this->isColumnModified(FapedidoPeer::MONPED)) $criteria->add(FapedidoPeer::MONPED, $this->monped);
		if ($this->isColumnModified(FapedidoPeer::OBSPED)) $criteria->add(FapedidoPeer::OBSPED, $this->obsped);
		if ($this->isColumnModified(FapedidoPeer::REAPOR)) $criteria->add(FapedidoPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FapedidoPeer::STATUS)) $criteria->add(FapedidoPeer::STATUS, $this->status);
		if ($this->isColumnModified(FapedidoPeer::FECANU)) $criteria->add(FapedidoPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FapedidoPeer::ID)) $criteria->add(FapedidoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapedidoPeer::DATABASE_NAME);

		$criteria->add(FapedidoPeer::ID, $this->id);

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

		$copyObj->setNroped($this->nroped);

		$copyObj->setFecped($this->fecped);

		$copyObj->setRefped($this->refped);

		$copyObj->setTipref($this->tipref);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setDesped($this->desped);

		$copyObj->setMonped($this->monped);

		$copyObj->setObsped($this->obsped);

		$copyObj->setReapor($this->reapor);

		$copyObj->setStatus($this->status);

		$copyObj->setFecanu($this->fecanu);


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
			self::$peer = new FapedidoPeer();
		}
		return self::$peer;
	}

} 