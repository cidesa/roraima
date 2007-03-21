<?php


abstract class BaseNpnomcalTemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $codcon;


	
	protected $frecon;


	
	protected $asided;


	
	protected $fecnom;


	
	protected $nomcon;


	
	protected $nomnom;


	
	protected $cantidad;


	
	protected $monto;


	
	protected $acucon;


	
	protected $acumulado;


	
	protected $saldo;


	
	protected $numrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodnom()
	{

		return $this->codnom;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getCodcon()
	{

		return $this->codcon;
	}

	
	public function getFrecon()
	{

		return $this->frecon;
	}

	
	public function getAsided()
	{

		return $this->asided;
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

	
	public function getNomcon()
	{

		return $this->nomcon;
	}

	
	public function getNomnom()
	{

		return $this->nomnom;
	}

	
	public function getCantidad()
	{

		return $this->cantidad;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getAcucon()
	{

		return $this->acucon;
	}

	
	public function getAcumulado()
	{

		return $this->acumulado;
	}

	
	public function getSaldo()
	{

		return $this->saldo;
	}

	
	public function getNumrec()
	{

		return $this->numrec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::CODNOM;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::CODEMP;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::CODCAR;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::CODCON;
		}

	} 
	
	public function setFrecon($v)
	{

		if ($this->frecon !== $v) {
			$this->frecon = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::FRECON;
		}

	} 
	
	public function setAsided($v)
	{

		if ($this->asided !== $v) {
			$this->asided = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::ASIDED;
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
			$this->modifiedColumns[] = NpnomcalTempPeer::FECNOM;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::NOMCON;
		}

	} 
	
	public function setNomnom($v)
	{

		if ($this->nomnom !== $v) {
			$this->nomnom = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::NOMNOM;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::CANTIDAD;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::MONTO;
		}

	} 
	
	public function setAcucon($v)
	{

		if ($this->acucon !== $v) {
			$this->acucon = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::ACUCON;
		}

	} 
	
	public function setAcumulado($v)
	{

		if ($this->acumulado !== $v) {
			$this->acumulado = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::ACUMULADO;
		}

	} 
	
	public function setSaldo($v)
	{

		if ($this->saldo !== $v) {
			$this->saldo = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::SALDO;
		}

	} 
	
	public function setNumrec($v)
	{

		if ($this->numrec !== $v) {
			$this->numrec = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::NUMREC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpnomcalTempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codnom = $rs->getString($startcol + 0);

			$this->codemp = $rs->getString($startcol + 1);

			$this->codcar = $rs->getString($startcol + 2);

			$this->codcon = $rs->getString($startcol + 3);

			$this->frecon = $rs->getString($startcol + 4);

			$this->asided = $rs->getString($startcol + 5);

			$this->fecnom = $rs->getDate($startcol + 6, null);

			$this->nomcon = $rs->getString($startcol + 7);

			$this->nomnom = $rs->getString($startcol + 8);

			$this->cantidad = $rs->getFloat($startcol + 9);

			$this->monto = $rs->getFloat($startcol + 10);

			$this->acucon = $rs->getString($startcol + 11);

			$this->acumulado = $rs->getFloat($startcol + 12);

			$this->saldo = $rs->getFloat($startcol + 13);

			$this->numrec = $rs->getFloat($startcol + 14);

			$this->id = $rs->getInt($startcol + 15);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 16; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NpnomcalTemp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpnomcalTempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpnomcalTempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpnomcalTempPeer::DATABASE_NAME);
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
					$pk = NpnomcalTempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpnomcalTempPeer::doUpdate($this, $con);
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


			if (($retval = NpnomcalTempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomcalTempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodnom();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getCodcon();
				break;
			case 4:
				return $this->getFrecon();
				break;
			case 5:
				return $this->getAsided();
				break;
			case 6:
				return $this->getFecnom();
				break;
			case 7:
				return $this->getNomcon();
				break;
			case 8:
				return $this->getNomnom();
				break;
			case 9:
				return $this->getCantidad();
				break;
			case 10:
				return $this->getMonto();
				break;
			case 11:
				return $this->getAcucon();
				break;
			case 12:
				return $this->getAcumulado();
				break;
			case 13:
				return $this->getSaldo();
				break;
			case 14:
				return $this->getNumrec();
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
		$keys = NpnomcalTempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodnom(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getCodcon(),
			$keys[4] => $this->getFrecon(),
			$keys[5] => $this->getAsided(),
			$keys[6] => $this->getFecnom(),
			$keys[7] => $this->getNomcon(),
			$keys[8] => $this->getNomnom(),
			$keys[9] => $this->getCantidad(),
			$keys[10] => $this->getMonto(),
			$keys[11] => $this->getAcucon(),
			$keys[12] => $this->getAcumulado(),
			$keys[13] => $this->getSaldo(),
			$keys[14] => $this->getNumrec(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomcalTempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodnom($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setCodcon($value);
				break;
			case 4:
				$this->setFrecon($value);
				break;
			case 5:
				$this->setAsided($value);
				break;
			case 6:
				$this->setFecnom($value);
				break;
			case 7:
				$this->setNomcon($value);
				break;
			case 8:
				$this->setNomnom($value);
				break;
			case 9:
				$this->setCantidad($value);
				break;
			case 10:
				$this->setMonto($value);
				break;
			case 11:
				$this->setAcucon($value);
				break;
			case 12:
				$this->setAcumulado($value);
				break;
			case 13:
				$this->setSaldo($value);
				break;
			case 14:
				$this->setNumrec($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnomcalTempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodnom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFrecon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAsided($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecnom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomcon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomnom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCantidad($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonto($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAcucon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAcumulado($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSaldo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNumrec($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpnomcalTempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpnomcalTempPeer::CODNOM)) $criteria->add(NpnomcalTempPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpnomcalTempPeer::CODEMP)) $criteria->add(NpnomcalTempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpnomcalTempPeer::CODCAR)) $criteria->add(NpnomcalTempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpnomcalTempPeer::CODCON)) $criteria->add(NpnomcalTempPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpnomcalTempPeer::FRECON)) $criteria->add(NpnomcalTempPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(NpnomcalTempPeer::ASIDED)) $criteria->add(NpnomcalTempPeer::ASIDED, $this->asided);
		if ($this->isColumnModified(NpnomcalTempPeer::FECNOM)) $criteria->add(NpnomcalTempPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NpnomcalTempPeer::NOMCON)) $criteria->add(NpnomcalTempPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpnomcalTempPeer::NOMNOM)) $criteria->add(NpnomcalTempPeer::NOMNOM, $this->nomnom);
		if ($this->isColumnModified(NpnomcalTempPeer::CANTIDAD)) $criteria->add(NpnomcalTempPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NpnomcalTempPeer::MONTO)) $criteria->add(NpnomcalTempPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpnomcalTempPeer::ACUCON)) $criteria->add(NpnomcalTempPeer::ACUCON, $this->acucon);
		if ($this->isColumnModified(NpnomcalTempPeer::ACUMULADO)) $criteria->add(NpnomcalTempPeer::ACUMULADO, $this->acumulado);
		if ($this->isColumnModified(NpnomcalTempPeer::SALDO)) $criteria->add(NpnomcalTempPeer::SALDO, $this->saldo);
		if ($this->isColumnModified(NpnomcalTempPeer::NUMREC)) $criteria->add(NpnomcalTempPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(NpnomcalTempPeer::ID)) $criteria->add(NpnomcalTempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpnomcalTempPeer::DATABASE_NAME);

		$criteria->add(NpnomcalTempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setFrecon($this->frecon);

		$copyObj->setAsided($this->asided);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setNomnom($this->nomnom);

		$copyObj->setCantidad($this->cantidad);

		$copyObj->setMonto($this->monto);

		$copyObj->setAcucon($this->acucon);

		$copyObj->setAcumulado($this->acumulado);

		$copyObj->setSaldo($this->saldo);

		$copyObj->setNumrec($this->numrec);


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
			self::$peer = new NpnomcalTempPeer();
		}
		return self::$peer;
	}

} 