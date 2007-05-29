<?php


abstract class BaseFadeflot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $numlot;


	
	protected $deslot;


	
	protected $codalm;


	
	protected $canlot;


	
	protected $fecven;


	
	protected $coslot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodart()
	{

		return $this->codart; 		
	}
	
	public function getNumlot()
	{

		return $this->numlot; 		
	}
	
	public function getDeslot()
	{

		return $this->deslot; 		
	}
	
	public function getCodalm()
	{

		return $this->codalm; 		
	}
	
	public function getCanlot()
	{

		return number_format($this->canlot,2,',','.');
		
	}
	
	public function getFecven($format = 'Y-m-d')
	{

		if ($this->fecven === null || $this->fecven === '') {
			return null;
		} elseif (!is_int($this->fecven)) {
						$ts = strtotime($this->fecven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
			}
		} else {
			$ts = $this->fecven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCoslot()
	{

		return number_format($this->coslot,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodart($v)
	{

		if ($this->codart !== $v) {
			$this->codart = $v;
			$this->modifiedColumns[] = FadeflotPeer::CODART;
		}

	} 
	
	public function setNumlot($v)
	{

		if ($this->numlot !== $v) {
			$this->numlot = $v;
			$this->modifiedColumns[] = FadeflotPeer::NUMLOT;
		}

	} 
	
	public function setDeslot($v)
	{

		if ($this->deslot !== $v) {
			$this->deslot = $v;
			$this->modifiedColumns[] = FadeflotPeer::DESLOT;
		}

	} 
	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = FadeflotPeer::CODALM;
		}

	} 
	
	public function setCanlot($v)
	{

		if ($this->canlot !== $v) {
			$this->canlot = $v;
			$this->modifiedColumns[] = FadeflotPeer::CANLOT;
		}

	} 
	
	public function setFecven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecven !== $ts) {
			$this->fecven = $ts;
			$this->modifiedColumns[] = FadeflotPeer::FECVEN;
		}

	} 
	
	public function setCoslot($v)
	{

		if ($this->coslot !== $v) {
			$this->coslot = $v;
			$this->modifiedColumns[] = FadeflotPeer::COSLOT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FadeflotPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codart = $rs->getString($startcol + 0);

			$this->numlot = $rs->getString($startcol + 1);

			$this->deslot = $rs->getString($startcol + 2);

			$this->codalm = $rs->getString($startcol + 3);

			$this->canlot = $rs->getFloat($startcol + 4);

			$this->fecven = $rs->getDate($startcol + 5, null);

			$this->coslot = $rs->getFloat($startcol + 6);

			$this->id = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fadeflot object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FadeflotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadeflotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadeflotPeer::DATABASE_NAME);
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
					$pk = FadeflotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FadeflotPeer::doUpdate($this, $con);
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


			if (($retval = FadeflotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadeflotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getNumlot();
				break;
			case 2:
				return $this->getDeslot();
				break;
			case 3:
				return $this->getCodalm();
				break;
			case 4:
				return $this->getCanlot();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getCoslot();
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
		$keys = FadeflotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getNumlot(),
			$keys[2] => $this->getDeslot(),
			$keys[3] => $this->getCodalm(),
			$keys[4] => $this->getCanlot(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getCoslot(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadeflotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setNumlot($value);
				break;
			case 2:
				$this->setDeslot($value);
				break;
			case 3:
				$this->setCodalm($value);
				break;
			case 4:
				$this->setCanlot($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setCoslot($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadeflotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumlot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDeslot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodalm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanlot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoslot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadeflotPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadeflotPeer::CODART)) $criteria->add(FadeflotPeer::CODART, $this->codart);
		if ($this->isColumnModified(FadeflotPeer::NUMLOT)) $criteria->add(FadeflotPeer::NUMLOT, $this->numlot);
		if ($this->isColumnModified(FadeflotPeer::DESLOT)) $criteria->add(FadeflotPeer::DESLOT, $this->deslot);
		if ($this->isColumnModified(FadeflotPeer::CODALM)) $criteria->add(FadeflotPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(FadeflotPeer::CANLOT)) $criteria->add(FadeflotPeer::CANLOT, $this->canlot);
		if ($this->isColumnModified(FadeflotPeer::FECVEN)) $criteria->add(FadeflotPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FadeflotPeer::COSLOT)) $criteria->add(FadeflotPeer::COSLOT, $this->coslot);
		if ($this->isColumnModified(FadeflotPeer::ID)) $criteria->add(FadeflotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadeflotPeer::DATABASE_NAME);

		$criteria->add(FadeflotPeer::ID, $this->id);

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

		$copyObj->setNumlot($this->numlot);

		$copyObj->setDeslot($this->deslot);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setCanlot($this->canlot);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCoslot($this->coslot);


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
			self::$peer = new FadeflotPeer();
		}
		return self::$peer;
	}

} 