<?php


abstract class BaseCpestform extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpre;


	
	protected $nompre;


	
	protected $anomes;


	
	protected $estimado;


	
	protected $real;


	
	protected $diferencia;


	
	protected $porc;


	
	protected $estimado2;


	
	protected $real2;


	
	protected $diferencia2;


	
	protected $porc2;


	
	protected $perpre;


	
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

	
	public function getAnomes()
	{

		return $this->anomes;
	}

	
	public function getEstimado()
	{

		return $this->estimado;
	}

	
	public function getReal()
	{

		return $this->real;
	}

	
	public function getDiferencia()
	{

		return $this->diferencia;
	}

	
	public function getPorc()
	{

		return $this->porc;
	}

	
	public function getEstimado2()
	{

		return $this->estimado2;
	}

	
	public function getReal2()
	{

		return $this->real2;
	}

	
	public function getDiferencia2()
	{

		return $this->diferencia2;
	}

	
	public function getPorc2()
	{

		return $this->porc2;
	}

	
	public function getPerpre()
	{

		return $this->perpre;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodpre($v)
	{

		if ($this->codpre !== $v) {
			$this->codpre = $v;
			$this->modifiedColumns[] = CpestformPeer::CODPRE;
		}

	} 
	
	public function setNompre($v)
	{

		if ($this->nompre !== $v) {
			$this->nompre = $v;
			$this->modifiedColumns[] = CpestformPeer::NOMPRE;
		}

	} 
	
	public function setAnomes($v)
	{

		if ($this->anomes !== $v) {
			$this->anomes = $v;
			$this->modifiedColumns[] = CpestformPeer::ANOMES;
		}

	} 
	
	public function setEstimado($v)
	{

		if ($this->estimado !== $v) {
			$this->estimado = $v;
			$this->modifiedColumns[] = CpestformPeer::ESTIMADO;
		}

	} 
	
	public function setReal($v)
	{

		if ($this->real !== $v) {
			$this->real = $v;
			$this->modifiedColumns[] = CpestformPeer::REAL;
		}

	} 
	
	public function setDiferencia($v)
	{

		if ($this->diferencia !== $v) {
			$this->diferencia = $v;
			$this->modifiedColumns[] = CpestformPeer::DIFERENCIA;
		}

	} 
	
	public function setPorc($v)
	{

		if ($this->porc !== $v) {
			$this->porc = $v;
			$this->modifiedColumns[] = CpestformPeer::PORC;
		}

	} 
	
	public function setEstimado2($v)
	{

		if ($this->estimado2 !== $v) {
			$this->estimado2 = $v;
			$this->modifiedColumns[] = CpestformPeer::ESTIMADO2;
		}

	} 
	
	public function setReal2($v)
	{

		if ($this->real2 !== $v) {
			$this->real2 = $v;
			$this->modifiedColumns[] = CpestformPeer::REAL2;
		}

	} 
	
	public function setDiferencia2($v)
	{

		if ($this->diferencia2 !== $v) {
			$this->diferencia2 = $v;
			$this->modifiedColumns[] = CpestformPeer::DIFERENCIA2;
		}

	} 
	
	public function setPorc2($v)
	{

		if ($this->porc2 !== $v) {
			$this->porc2 = $v;
			$this->modifiedColumns[] = CpestformPeer::PORC2;
		}

	} 
	
	public function setPerpre($v)
	{

		if ($this->perpre !== $v) {
			$this->perpre = $v;
			$this->modifiedColumns[] = CpestformPeer::PERPRE;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CpestformPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpre = $rs->getString($startcol + 0);

			$this->nompre = $rs->getString($startcol + 1);

			$this->anomes = $rs->getString($startcol + 2);

			$this->estimado = $rs->getFloat($startcol + 3);

			$this->real = $rs->getFloat($startcol + 4);

			$this->diferencia = $rs->getFloat($startcol + 5);

			$this->porc = $rs->getFloat($startcol + 6);

			$this->estimado2 = $rs->getFloat($startcol + 7);

			$this->real2 = $rs->getFloat($startcol + 8);

			$this->diferencia2 = $rs->getFloat($startcol + 9);

			$this->porc2 = $rs->getFloat($startcol + 10);

			$this->perpre = $rs->getString($startcol + 11);

			$this->id = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cpestform object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CpestformPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpestformPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpestformPeer::DATABASE_NAME);
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
					$pk = CpestformPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CpestformPeer::doUpdate($this, $con);
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


			if (($retval = CpestformPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpestformPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAnomes();
				break;
			case 3:
				return $this->getEstimado();
				break;
			case 4:
				return $this->getReal();
				break;
			case 5:
				return $this->getDiferencia();
				break;
			case 6:
				return $this->getPorc();
				break;
			case 7:
				return $this->getEstimado2();
				break;
			case 8:
				return $this->getReal2();
				break;
			case 9:
				return $this->getDiferencia2();
				break;
			case 10:
				return $this->getPorc2();
				break;
			case 11:
				return $this->getPerpre();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpestformPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpre(),
			$keys[1] => $this->getNompre(),
			$keys[2] => $this->getAnomes(),
			$keys[3] => $this->getEstimado(),
			$keys[4] => $this->getReal(),
			$keys[5] => $this->getDiferencia(),
			$keys[6] => $this->getPorc(),
			$keys[7] => $this->getEstimado2(),
			$keys[8] => $this->getReal2(),
			$keys[9] => $this->getDiferencia2(),
			$keys[10] => $this->getPorc2(),
			$keys[11] => $this->getPerpre(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpestformPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAnomes($value);
				break;
			case 3:
				$this->setEstimado($value);
				break;
			case 4:
				$this->setReal($value);
				break;
			case 5:
				$this->setDiferencia($value);
				break;
			case 6:
				$this->setPorc($value);
				break;
			case 7:
				$this->setEstimado2($value);
				break;
			case 8:
				$this->setReal2($value);
				break;
			case 9:
				$this->setDiferencia2($value);
				break;
			case 10:
				$this->setPorc2($value);
				break;
			case 11:
				$this->setPerpre($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpestformPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnomes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstimado($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setReal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDiferencia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPorc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEstimado2($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setReal2($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDiferencia2($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPorc2($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPerpre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpestformPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpestformPeer::CODPRE)) $criteria->add(CpestformPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(CpestformPeer::NOMPRE)) $criteria->add(CpestformPeer::NOMPRE, $this->nompre);
		if ($this->isColumnModified(CpestformPeer::ANOMES)) $criteria->add(CpestformPeer::ANOMES, $this->anomes);
		if ($this->isColumnModified(CpestformPeer::ESTIMADO)) $criteria->add(CpestformPeer::ESTIMADO, $this->estimado);
		if ($this->isColumnModified(CpestformPeer::REAL)) $criteria->add(CpestformPeer::REAL, $this->real);
		if ($this->isColumnModified(CpestformPeer::DIFERENCIA)) $criteria->add(CpestformPeer::DIFERENCIA, $this->diferencia);
		if ($this->isColumnModified(CpestformPeer::PORC)) $criteria->add(CpestformPeer::PORC, $this->porc);
		if ($this->isColumnModified(CpestformPeer::ESTIMADO2)) $criteria->add(CpestformPeer::ESTIMADO2, $this->estimado2);
		if ($this->isColumnModified(CpestformPeer::REAL2)) $criteria->add(CpestformPeer::REAL2, $this->real2);
		if ($this->isColumnModified(CpestformPeer::DIFERENCIA2)) $criteria->add(CpestformPeer::DIFERENCIA2, $this->diferencia2);
		if ($this->isColumnModified(CpestformPeer::PORC2)) $criteria->add(CpestformPeer::PORC2, $this->porc2);
		if ($this->isColumnModified(CpestformPeer::PERPRE)) $criteria->add(CpestformPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(CpestformPeer::ID)) $criteria->add(CpestformPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpestformPeer::DATABASE_NAME);

		$criteria->add(CpestformPeer::ID, $this->id);

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

		$copyObj->setAnomes($this->anomes);

		$copyObj->setEstimado($this->estimado);

		$copyObj->setReal($this->real);

		$copyObj->setDiferencia($this->diferencia);

		$copyObj->setPorc($this->porc);

		$copyObj->setEstimado2($this->estimado2);

		$copyObj->setReal2($this->real2);

		$copyObj->setDiferencia2($this->diferencia2);

		$copyObj->setPorc2($this->porc2);

		$copyObj->setPerpre($this->perpre);


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
			self::$peer = new CpestformPeer();
		}
		return self::$peer;
	}

} 