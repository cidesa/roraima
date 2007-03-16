<?php


abstract class BaseCpconeje extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $mondis;


	
	protected $montra;


	
	protected $monadi;


	
	protected $monasi;


	
	protected $ref;


	
	protected $fecha;


	
	protected $tipo;


	
	protected $descrip;


	
	protected $monimp;


	
	protected $monaju;


	
	protected $status;


	
	protected $mondim;


	
	protected $montrn;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpre()
	{

		return $this->codpre;
	}

	
	public function getNompre()
	{

		return $this->nompre;
	}

	
	public function getMondis()
	{

		return $this->mondis;
	}

	
	public function getMontra()
	{

		return $this->montra;
	}

	
	public function getMonadi()
	{

		return $this->monadi;
	}

	
	public function getMonasi()
	{

		return $this->monasi;
	}

	
	public function getRef()
	{

		return $this->ref;
	}

	
	public function getFecha($format = 'Y-m-d')
	{

		if ($this->fecha === null || $this->fecha === '') {
			return null;
		} elseif (!is_int($this->fecha)) {
						$ts = strtotime($this->fecha);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
			}
		} else {
			$ts = $this->fecha;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getDescrip()
	{

		return $this->descrip;
	}

	
	public function getMonimp()
	{

		return $this->monimp;
	}

	
	public function getMonaju()
	{

		return $this->monaju;
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getMondim()
	{

		return $this->mondim;
	}

	
	public function getMontrn()
	{

		return $this->montrn;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpconejePeer::CODPRE;
		}

	} 
	
	public function setNompre($v)
	{

		if ($this->nompre !== $v) {
			$this->nompre = $v;
			$this->modifiedColumns[] = CpconejePeer::NOMPRE;
		}

	} 
	
	public function setMondis($v)
	{

		if ($this->mondis !== $v) {
			$this->mondis = $v;
			$this->modifiedColumns[] = CpconejePeer::MONDIS;
		}

	} 
	
	public function setMontra($v)
	{

		if ($this->montra !== $v) {
			$this->montra = $v;
			$this->modifiedColumns[] = CpconejePeer::MONTRA;
		}

	} 
	
	public function setMonadi($v)
	{

		if ($this->monadi !== $v) {
			$this->monadi = $v;
			$this->modifiedColumns[] = CpconejePeer::MONADI;
		}

	} 
	
	public function setMonasi($v)
	{

		if ($this->monasi !== $v) {
			$this->monasi = $v;
			$this->modifiedColumns[] = CpconejePeer::MONASI;
		}

	} 
	
	public function setRef($v)
	{

		if ($this->ref !== $v) {
			$this->ref = $v;
			$this->modifiedColumns[] = CpconejePeer::REF;
		}

	} 
	
	public function setFecha($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecha !== $ts) {
			$this->fecha = $ts;
			$this->modifiedColumns[] = CpconejePeer::FECHA;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = CpconejePeer::TIPO;
		}

	} 
	
	public function setDescrip($v)
	{

		if ($this->descrip !== $v) {
			$this->descrip = $v;
			$this->modifiedColumns[] = CpconejePeer::DESCRIP;
		}

	} 
	
	public function setMonimp($v)
	{

		if ($this->monimp !== $v) {
			$this->monimp = $v;
			$this->modifiedColumns[] = CpconejePeer::MONIMP;
		}

	} 
	
	public function setMonaju($v)
	{

		if ($this->monaju !== $v) {
			$this->monaju = $v;
			$this->modifiedColumns[] = CpconejePeer::MONAJU;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = CpconejePeer::STATUS;
		}

	} 
	
	public function setMondim($v)
	{

		if ($this->mondim !== $v) {
			$this->mondim = $v;
			$this->modifiedColumns[] = CpconejePeer::MONDIM;
		}

	} 
	
	public function setMontrn($v)
	{

		if ($this->montrn !== $v) {
			$this->montrn = $v;
			$this->modifiedColumns[] = CpconejePeer::MONTRN;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpconejePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpre = $rs->getString($startcol + 0);

			$this->nompre = $rs->getString($startcol + 1);

			$this->mondis = $rs->getFloat($startcol + 2);

			$this->montra = $rs->getFloat($startcol + 3);

			$this->monadi = $rs->getFloat($startcol + 4);

			$this->monasi = $rs->getFloat($startcol + 5);

			$this->ref = $rs->getString($startcol + 6);

			$this->fecha = $rs->getDate($startcol + 7, null);

			$this->tipo = $rs->getString($startcol + 8);

			$this->descrip = $rs->getString($startcol + 9);

			$this->monimp = $rs->getFloat($startcol + 10);

			$this->monaju = $rs->getFloat($startcol + 11);

			$this->status = $rs->getString($startcol + 12);

			$this->mondim = $rs->getFloat($startcol + 13);

			$this->montrn = $rs->getFloat($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpconeje object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpconejePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpconejePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpconejePeer::DATABASE_NAME);
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
					$pk = CpconejePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpconejePeer::doUpdate($this, $con);
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


			if (($retval = CpconejePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpconejePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpre();
				break;
			case 1:
				return $this->getNompre();
				break;
			case 2:
				return $this->getMondis();
				break;
			case 3:
				return $this->getMontra();
				break;
			case 4:
				return $this->getMonadi();
				break;
			case 5:
				return $this->getMonasi();
				break;
			case 6:
				return $this->getRef();
				break;
			case 7:
				return $this->getFecha();
				break;
			case 8:
				return $this->getTipo();
				break;
			case 9:
				return $this->getDescrip();
				break;
			case 10:
				return $this->getMonimp();
				break;
			case 11:
				return $this->getMonaju();
				break;
			case 12:
				return $this->getStatus();
				break;
			case 13:
				return $this->getMondim();
				break;
			case 14:
				return $this->getMontrn();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpconejePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getNompre(),
			$keys[2] => $this->getMondis(),
			$keys[3] => $this->getMontra(),
			$keys[4] => $this->getMonadi(),
			$keys[5] => $this->getMonasi(),
			$keys[6] => $this->getRef(),
			$keys[7] => $this->getFecha(),
			$keys[8] => $this->getTipo(),
			$keys[9] => $this->getDescrip(),
			$keys[10] => $this->getMonimp(),
			$keys[11] => $this->getMonaju(),
			$keys[12] => $this->getStatus(),
			$keys[13] => $this->getMondim(),
			$keys[14] => $this->getMontrn(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpconejePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpre($value);
				break;
			case 1:
				$this->setNompre($value);
				break;
			case 2:
				$this->setMondis($value);
				break;
			case 3:
				$this->setMontra($value);
				break;
			case 4:
				$this->setMonadi($value);
				break;
			case 5:
				$this->setMonasi($value);
				break;
			case 6:
				$this->setRef($value);
				break;
			case 7:
				$this->setFecha($value);
				break;
			case 8:
				$this->setTipo($value);
				break;
			case 9:
				$this->setDescrip($value);
				break;
			case 10:
				$this->setMonimp($value);
				break;
			case 11:
				$this->setMonaju($value);
				break;
			case 12:
				$this->setStatus($value);
				break;
			case 13:
				$this->setMondim($value);
				break;
			case 14:
				$this->setMontrn($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpconejePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMondis($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMontra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonadi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonasi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRef($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecha($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDescrip($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonimp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonaju($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStatus($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMondim($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMontrn($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpconejePeer::DATABASE_NAME);

		if ($this->isColumnModified(CpconejePeer::CODPRE)) $criteria->add(CpconejePeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpconejePeer::NOMPRE)) $criteria->add(CpconejePeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(CpconejePeer::MONDIS)) $criteria->add(CpconejePeer::MONDIS, $this->mondis);
		if ($this->isColumnModified(CpconejePeer::MONTRA)) $criteria->add(CpconejePeer::MONTRA, $this->montra);
		if ($this->isColumnModified(CpconejePeer::MONADI)) $criteria->add(CpconejePeer::MONADI, $this->monadi);
		if ($this->isColumnModified(CpconejePeer::MONASI)) $criteria->add(CpconejePeer::MONASI, $this->monasi);
		if ($this->isColumnModified(CpconejePeer::REF)) $criteria->add(CpconejePeer::REF, $this->ref);
		if ($this->isColumnModified(CpconejePeer::FECHA)) $criteria->add(CpconejePeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CpconejePeer::TIPO)) $criteria->add(CpconejePeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CpconejePeer::DESCRIP)) $criteria->add(CpconejePeer::DESCRIP, $this->descrip);
		if ($this->isColumnModified(CpconejePeer::MONIMP)) $criteria->add(CpconejePeer::MONIMP, $this->monimp);
		if ($this->isColumnModified(CpconejePeer::MONAJU)) $criteria->add(CpconejePeer::MONAJU, $this->monaju);
		if ($this->isColumnModified(CpconejePeer::STATUS)) $criteria->add(CpconejePeer::STATUS, $this->status);
		if ($this->isColumnModified(CpconejePeer::MONDIM)) $criteria->add(CpconejePeer::MONDIM, $this->mondim);
		if ($this->isColumnModified(CpconejePeer::MONTRN)) $criteria->add(CpconejePeer::MONTRN, $this->montrn);
		if ($this->isColumnModified(CpconejePeer::ID)) $criteria->add(CpconejePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpconejePeer::DATABASE_NAME);

		$criteria->add(CpconejePeer::ID, $this->id);

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

		$copyObj->setCodpre($this->codpre);

		$copyObj->setNompre($this->nompre);

		$copyObj->setMondis($this->mondis);

		$copyObj->setMontra($this->montra);

		$copyObj->setMonadi($this->monadi);

		$copyObj->setMonasi($this->monasi);

		$copyObj->setRef($this->ref);

		$copyObj->setFecha($this->fecha);

		$copyObj->setTipo($this->tipo);

		$copyObj->setDescrip($this->descrip);

		$copyObj->setMonimp($this->monimp);

		$copyObj->setMonaju($this->monaju);

		$copyObj->setStatus($this->status);

		$copyObj->setMondim($this->mondim);

		$copyObj->setMontrn($this->montrn);


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
			self::$peer = new CpconejePeer();
		}
		return self::$peer;
	}

} 