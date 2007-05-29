<?php


abstract class BaseCierre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codcon;


	
	protected $fecnom;


	
	protected $codpre;


	
	protected $codcta;


	
	protected $monto;


	
	protected $asided;


	
	protected $codtipgas;


	
	protected $cantidad;


	
	protected $codban;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom; 		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getFecnom($format = 'Y-m-d')
	{

		if ($this->fecnom === null || $this->fecnom === '') {
			return null;
		} elseif (!is_int($this->fecnom)) {
						$ts = strtotime($this->fecnom);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
			}
		} else {
			$ts = $this->fecnom;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodpre()
	{

		return $this->codpre; 		
	}
	
	public function getCodcta()
	{

		return $this->codcta; 		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getAsided()
	{

		return $this->asided; 		
	}
	
	public function getCodtipgas()
	{

		return $this->codtipgas; 		
	}
	
	public function getCantidad()
	{

		return number_format($this->cantidad,2,',','.');
		
	}
	
	public function getCodban()
	{

		return $this->codban; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = CierrePeer::CODNOM;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = CierrePeer::CODCON;
		}

	} 
	
	public function setFecnom($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnom !== $ts) {
			$this->fecnom = $ts;
			$this->modifiedColumns[] = CierrePeer::FECNOM;
		}

	} 
	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CierrePeer::CODPRE;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = CierrePeer::CODCTA;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = CierrePeer::MONTO;
		}

	} 
	
	public function setAsided($v)
	{

		if ($this->asided !== $v) {
			$this->asided = $v;
			$this->modifiedColumns[] = CierrePeer::ASIDED;
		}

	} 
	
	public function setCodtipgas($v)
	{

		if ($this->codtipgas !== $v) {
			$this->codtipgas = $v;
			$this->modifiedColumns[] = CierrePeer::CODTIPGAS;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = CierrePeer::CANTIDAD;
		}

	} 
	
	public function setCodban($v)
	{

		if ($this->codban !== $v) {
			$this->codban = $v;
			$this->modifiedColumns[] = CierrePeer::CODBAN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CierrePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codcon = $rs->getString($startcol + 1);

			$this->fecnom = $rs->getDate($startcol + 2, null);

			$this->codpre = $rs->getString($startcol + 3);

			$this->codcta = $rs->getString($startcol + 4);

			$this->monto = $rs->getFloat($startcol + 5);

			$this->asided = $rs->getString($startcol + 6);

			$this->codtipgas = $rs->getString($startcol + 7);

			$this->cantidad = $rs->getFloat($startcol + 8);

			$this->codban = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cierre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CierrePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CierrePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CierrePeer::DATABASE_NAME);
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
					$pk = CierrePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CierrePeer::doUpdate($this, $con);
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


			if (($retval = CierrePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CierrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodcon();
				break;
			case 2:
				return $this->getFecnom();
				break;
			case 3:
				return $this->getCodpre();
				break;
			case 4:
				return $this->getCodcta();
				break;
			case 5:
				return $this->getMonto();
				break;
			case 6:
				return $this->getAsided();
				break;
			case 7:
				return $this->getCodtipgas();
				break;
			case 8:
				return $this->getCantidad();
				break;
			case 9:
				return $this->getCodban();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CierrePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodcon(),
			$keys[2] => $this->getFecnom(),
			$keys[3] => $this->getCodpre(),
			$keys[4] => $this->getCodcta(),
			$keys[5] => $this->getMonto(),
			$keys[6] => $this->getAsided(),
			$keys[7] => $this->getCodtipgas(),
			$keys[8] => $this->getCantidad(),
			$keys[9] => $this->getCodban(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CierrePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodcon($value);
				break;
			case 2:
				$this->setFecnom($value);
				break;
			case 3:
				$this->setCodpre($value);
				break;
			case 4:
				$this->setCodcta($value);
				break;
			case 5:
				$this->setMonto($value);
				break;
			case 6:
				$this->setAsided($value);
				break;
			case 7:
				$this->setCodtipgas($value);
				break;
			case 8:
				$this->setCantidad($value);
				break;
			case 9:
				$this->setCodban($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CierrePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAsided($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodtipgas($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCantidad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodban($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CierrePeer::DATABASE_NAME);

		if ($this->isColumnModified(CierrePeer::CODNOM)) $criteria->add(CierrePeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(CierrePeer::CODCON)) $criteria->add(CierrePeer::CODCON, $this->codcon);
		if ($this->isColumnModified(CierrePeer::FECNOM)) $criteria->add(CierrePeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(CierrePeer::CODPRE)) $criteria->add(CierrePeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CierrePeer::CODCTA)) $criteria->add(CierrePeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CierrePeer::MONTO)) $criteria->add(CierrePeer::MONTO, $this->monto);
		if ($this->isColumnModified(CierrePeer::ASIDED)) $criteria->add(CierrePeer::ASIDED, $this->asided);
		if ($this->isColumnModified(CierrePeer::CODTIPGAS)) $criteria->add(CierrePeer::CODTIPGAS, $this->codtipgas);
		if ($this->isColumnModified(CierrePeer::CANTIDAD)) $criteria->add(CierrePeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(CierrePeer::CODBAN)) $criteria->add(CierrePeer::CODBAN, $this->codban);
		if ($this->isColumnModified(CierrePeer::ID)) $criteria->add(CierrePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CierrePeer::DATABASE_NAME);

		$criteria->add(CierrePeer::ID, $this->id);

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

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setMonto($this->monto);

		$copyObj->setAsided($this->asided);

		$copyObj->setCodtipgas($this->codtipgas);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setCodban($this->codban);


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
			self::$peer = new CierrePeer();
		}
		return self::$peer;
	}

} 