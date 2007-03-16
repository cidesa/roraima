<?php


abstract class BaseCasalalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsal;


	
	protected $fecsal;


	
	protected $dessal;


	
	protected $codpro;


	
	protected $monsal;


	
	protected $stasal;


	
	protected $codalm;


	
	protected $tipmov;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsal()
	{

		return $this->codsal;
	}

	
	public function getFecsal($format = 'Y-m-d')
	{

		if ($this->fecsal === null || $this->fecsal === '') {
			return null;
		} elseif (!is_int($this->fecsal)) {
						$ts = strtotime($this->fecsal);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecsal] as date/time value: " . var_export($this->fecsal, true));
			}
		} else {
			$ts = $this->fecsal;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDessal()
	{

		return $this->dessal;
	}

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getMonsal()
	{

		return $this->monsal;
	}

	
	public function getStasal()
	{

		return $this->stasal;
	}

	
	public function getCodalm()
	{

		return $this->codalm;
	}

	
	public function getTipmov()
	{

		return $this->tipmov;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodsal($v)
	{

		if ($this->codsal !== $v) {
			$this->codsal = $v;
			$this->modifiedColumns[] = CasalalmPeer::CODSAL;
		}

	} 
	
	public function setFecsal($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecsal] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecsal !== $ts) {
			$this->fecsal = $ts;
			$this->modifiedColumns[] = CasalalmPeer::FECSAL;
		}

	} 
	
	public function setDessal($v)
	{

		if ($this->dessal !== $v) {
			$this->dessal = $v;
			$this->modifiedColumns[] = CasalalmPeer::DESSAL;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CasalalmPeer::CODPRO;
		}

	} 
	
	public function setMonsal($v)
	{

		if ($this->monsal !== $v) {
			$this->monsal = $v;
			$this->modifiedColumns[] = CasalalmPeer::MONSAL;
		}

	} 
	
	public function setStasal($v)
	{

		if ($this->stasal !== $v) {
			$this->stasal = $v;
			$this->modifiedColumns[] = CasalalmPeer::STASAL;
		}

	} 
	
	public function setCodalm($v)
	{

		if ($this->codalm !== $v) {
			$this->codalm = $v;
			$this->modifiedColumns[] = CasalalmPeer::CODALM;
		}

	} 
	
	public function setTipmov($v)
	{

		if ($this->tipmov !== $v) {
			$this->tipmov = $v;
			$this->modifiedColumns[] = CasalalmPeer::TIPMOV;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CasalalmPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsal = $rs->getString($startcol + 0);

			$this->fecsal = $rs->getDate($startcol + 1, null);

			$this->dessal = $rs->getString($startcol + 2);

			$this->codpro = $rs->getString($startcol + 3);

			$this->monsal = $rs->getFloat($startcol + 4);

			$this->stasal = $rs->getString($startcol + 5);

			$this->codalm = $rs->getString($startcol + 6);

			$this->tipmov = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Casalalm object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CasalalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CasalalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CasalalmPeer::DATABASE_NAME);
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
					$pk = CasalalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CasalalmPeer::doUpdate($this, $con);
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


			if (($retval = CasalalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasalalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsal();
				break;
			case 1:
				return $this->getFecsal();
				break;
			case 2:
				return $this->getDessal();
				break;
			case 3:
				return $this->getCodpro();
				break;
			case 4:
				return $this->getMonsal();
				break;
			case 5:
				return $this->getStasal();
				break;
			case 6:
				return $this->getCodalm();
				break;
			case 7:
				return $this->getTipmov();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasalalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsal(),
			$keys[1] => $this->getFecsal(),
			$keys[2] => $this->getDessal(),
			$keys[3] => $this->getCodpro(),
			$keys[4] => $this->getMonsal(),
			$keys[5] => $this->getStasal(),
			$keys[6] => $this->getCodalm(),
			$keys[7] => $this->getTipmov(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasalalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsal($value);
				break;
			case 1:
				$this->setFecsal($value);
				break;
			case 2:
				$this->setDessal($value);
				break;
			case 3:
				$this->setCodpro($value);
				break;
			case 4:
				$this->setMonsal($value);
				break;
			case 5:
				$this->setStasal($value);
				break;
			case 6:
				$this->setCodalm($value);
				break;
			case 7:
				$this->setTipmov($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasalalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsal($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsal($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDessal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonsal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStasal($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodalm($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipmov($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CasalalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CasalalmPeer::CODSAL)) $criteria->add(CasalalmPeer::CODSAL, $this->codsal);
		if ($this->isColumnModified(CasalalmPeer::FECSAL)) $criteria->add(CasalalmPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(CasalalmPeer::DESSAL)) $criteria->add(CasalalmPeer::DESSAL, $this->dessal);
		if ($this->isColumnModified(CasalalmPeer::CODPRO)) $criteria->add(CasalalmPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CasalalmPeer::MONSAL)) $criteria->add(CasalalmPeer::MONSAL, $this->monsal);
		if ($this->isColumnModified(CasalalmPeer::STASAL)) $criteria->add(CasalalmPeer::STASAL, $this->stasal);
		if ($this->isColumnModified(CasalalmPeer::CODALM)) $criteria->add(CasalalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CasalalmPeer::TIPMOV)) $criteria->add(CasalalmPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CasalalmPeer::ID)) $criteria->add(CasalalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CasalalmPeer::DATABASE_NAME);

		$criteria->add(CasalalmPeer::ID, $this->id);

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

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setDessal($this->dessal);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setMonsal($this->monsal);

		$copyObj->setStasal($this->stasal);

		$copyObj->setCodalm($this->codalm);

		$copyObj->setTipmov($this->tipmov);


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
			self::$peer = new CasalalmPeer();
		}
		return self::$peer;
	}

} 