<?php


abstract class BaseNpnomcal extends BaseObject  implements Persistent {


	
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


	
	protected $fecnomdes;


	
	protected $especial = '';


	
	protected $fecnomespdes;


	
	protected $fecnomesphas;


	
	protected $codnomesp;


	
	protected $nomnomesp;


	
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

		return number_format($this->cantidad,2,',','.');
		
	}
	
	public function getMonto()
	{

		return number_format($this->monto,2,',','.');
		
	}
	
	public function getAcucon()
	{

		return $this->acucon; 		
	}
	
	public function getAcumulado()
	{

		return number_format($this->acumulado,2,',','.');
		
	}
	
	public function getSaldo()
	{

		return number_format($this->saldo,2,',','.');
		
	}
	
	public function getNumrec()
	{

		return number_format($this->numrec,2,',','.');
		
	}
	
	public function getFecnomdes($format = 'Y-m-d')
	{

		if ($this->fecnomdes === null || $this->fecnomdes === '') {
			return null;
		} elseif (!is_int($this->fecnomdes)) {
						$ts = strtotime($this->fecnomdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnomdes] as date/time value: " . var_export($this->fecnomdes, true));
			}
		} else {
			$ts = $this->fecnomdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEspecial()
	{

		return $this->especial; 		
	}
	
	public function getFecnomespdes($format = 'Y-m-d')
	{

		if ($this->fecnomespdes === null || $this->fecnomespdes === '') {
			return null;
		} elseif (!is_int($this->fecnomespdes)) {
						$ts = strtotime($this->fecnomespdes);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnomespdes] as date/time value: " . var_export($this->fecnomespdes, true));
			}
		} else {
			$ts = $this->fecnomespdes;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecnomesphas($format = 'Y-m-d')
	{

		if ($this->fecnomesphas === null || $this->fecnomesphas === '') {
			return null;
		} elseif (!is_int($this->fecnomesphas)) {
						$ts = strtotime($this->fecnomesphas);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnomesphas] as date/time value: " . var_export($this->fecnomesphas, true));
			}
		} else {
			$ts = $this->fecnomesphas;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodnomesp()
	{

		return $this->codnomesp; 		
	}
	
	public function getNomnomesp()
	{

		return $this->nomnomesp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpnomcalPeer::CODNOM;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpnomcalPeer::CODEMP;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpnomcalPeer::CODCAR;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpnomcalPeer::CODCON;
		}

	} 
	
	public function setFrecon($v)
	{

		if ($this->frecon !== $v) {
			$this->frecon = $v;
			$this->modifiedColumns[] = NpnomcalPeer::FRECON;
		}

	} 
	
	public function setAsided($v)
	{

		if ($this->asided !== $v) {
			$this->asided = $v;
			$this->modifiedColumns[] = NpnomcalPeer::ASIDED;
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
			$this->modifiedColumns[] = NpnomcalPeer::FECNOM;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = NpnomcalPeer::NOMCON;
		}

	} 
	
	public function setNomnom($v)
	{

		if ($this->nomnom !== $v) {
			$this->nomnom = $v;
			$this->modifiedColumns[] = NpnomcalPeer::NOMNOM;
		}

	} 
	
	public function setCantidad($v)
	{

		if ($this->cantidad !== $v) {
			$this->cantidad = $v;
			$this->modifiedColumns[] = NpnomcalPeer::CANTIDAD;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = NpnomcalPeer::MONTO;
		}

	} 
	
	public function setAcucon($v)
	{

		if ($this->acucon !== $v) {
			$this->acucon = $v;
			$this->modifiedColumns[] = NpnomcalPeer::ACUCON;
		}

	} 
	
	public function setAcumulado($v)
	{

		if ($this->acumulado !== $v) {
			$this->acumulado = $v;
			$this->modifiedColumns[] = NpnomcalPeer::ACUMULADO;
		}

	} 
	
	public function setSaldo($v)
	{

		if ($this->saldo !== $v) {
			$this->saldo = $v;
			$this->modifiedColumns[] = NpnomcalPeer::SALDO;
		}

	} 
	
	public function setNumrec($v)
	{

		if ($this->numrec !== $v) {
			$this->numrec = $v;
			$this->modifiedColumns[] = NpnomcalPeer::NUMREC;
		}

	} 
	
	public function setFecnomdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnomdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnomdes !== $ts) {
			$this->fecnomdes = $ts;
			$this->modifiedColumns[] = NpnomcalPeer::FECNOMDES;
		}

	} 
	
	public function setEspecial($v)
	{

		if ($this->especial !== $v || $v === '') {
			$this->especial = $v;
			$this->modifiedColumns[] = NpnomcalPeer::ESPECIAL;
		}

	} 
	
	public function setFecnomespdes($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnomespdes] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnomespdes !== $ts) {
			$this->fecnomespdes = $ts;
			$this->modifiedColumns[] = NpnomcalPeer::FECNOMESPDES;
		}

	} 
	
	public function setFecnomesphas($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnomesphas] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnomesphas !== $ts) {
			$this->fecnomesphas = $ts;
			$this->modifiedColumns[] = NpnomcalPeer::FECNOMESPHAS;
		}

	} 
	
	public function setCodnomesp($v)
	{

		if ($this->codnomesp !== $v) {
			$this->codnomesp = $v;
			$this->modifiedColumns[] = NpnomcalPeer::CODNOMESP;
		}

	} 
	
	public function setNomnomesp($v)
	{

		if ($this->nomnomesp !== $v) {
			$this->nomnomesp = $v;
			$this->modifiedColumns[] = NpnomcalPeer::NOMNOMESP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpnomcalPeer::ID;
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

			$this->fecnomdes = $rs->getDate($startcol + 15, null);

			$this->especial = $rs->getString($startcol + 16);

			$this->fecnomespdes = $rs->getDate($startcol + 17, null);

			$this->fecnomesphas = $rs->getDate($startcol + 18, null);

			$this->codnomesp = $rs->getString($startcol + 19);

			$this->nomnomesp = $rs->getString($startcol + 20);

			$this->id = $rs->getInt($startcol + 21);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 22; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npnomcal object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpnomcalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpnomcalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpnomcalPeer::DATABASE_NAME);
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
					$pk = NpnomcalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpnomcalPeer::doUpdate($this, $con);
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


			if (($retval = NpnomcalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomcalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecnomdes();
				break;
			case 16:
				return $this->getEspecial();
				break;
			case 17:
				return $this->getFecnomespdes();
				break;
			case 18:
				return $this->getFecnomesphas();
				break;
			case 19:
				return $this->getCodnomesp();
				break;
			case 20:
				return $this->getNomnomesp();
				break;
			case 21:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnomcalPeer::getFieldNames($keyType);
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
			$keys[15] => $this->getFecnomdes(),
			$keys[16] => $this->getEspecial(),
			$keys[17] => $this->getFecnomespdes(),
			$keys[18] => $this->getFecnomesphas(),
			$keys[19] => $this->getCodnomesp(),
			$keys[20] => $this->getNomnomesp(),
			$keys[21] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpnomcalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecnomdes($value);
				break;
			case 16:
				$this->setEspecial($value);
				break;
			case 17:
				$this->setFecnomespdes($value);
				break;
			case 18:
				$this->setFecnomesphas($value);
				break;
			case 19:
				$this->setCodnomesp($value);
				break;
			case 20:
				$this->setNomnomesp($value);
				break;
			case 21:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpnomcalPeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[15], $arr)) $this->setFecnomdes($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEspecial($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecnomespdes($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecnomesphas($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodnomesp($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNomnomesp($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setId($arr[$keys[21]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpnomcalPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpnomcalPeer::CODNOM)) $criteria->add(NpnomcalPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpnomcalPeer::CODEMP)) $criteria->add(NpnomcalPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpnomcalPeer::CODCAR)) $criteria->add(NpnomcalPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpnomcalPeer::CODCON)) $criteria->add(NpnomcalPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpnomcalPeer::FRECON)) $criteria->add(NpnomcalPeer::FRECON, $this->frecon);
		if ($this->isColumnModified(NpnomcalPeer::ASIDED)) $criteria->add(NpnomcalPeer::ASIDED, $this->asided);
		if ($this->isColumnModified(NpnomcalPeer::FECNOM)) $criteria->add(NpnomcalPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NpnomcalPeer::NOMCON)) $criteria->add(NpnomcalPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(NpnomcalPeer::NOMNOM)) $criteria->add(NpnomcalPeer::NOMNOM, $this->nomnom);
		if ($this->isColumnModified(NpnomcalPeer::CANTIDAD)) $criteria->add(NpnomcalPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NpnomcalPeer::MONTO)) $criteria->add(NpnomcalPeer::MONTO, $this->monto);
		if ($this->isColumnModified(NpnomcalPeer::ACUCON)) $criteria->add(NpnomcalPeer::ACUCON, $this->acucon);
		if ($this->isColumnModified(NpnomcalPeer::ACUMULADO)) $criteria->add(NpnomcalPeer::ACUMULADO, $this->acumulado);
		if ($this->isColumnModified(NpnomcalPeer::SALDO)) $criteria->add(NpnomcalPeer::SALDO, $this->saldo);
		if ($this->isColumnModified(NpnomcalPeer::NUMREC)) $criteria->add(NpnomcalPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(NpnomcalPeer::FECNOMDES)) $criteria->add(NpnomcalPeer::FECNOMDES, $this->fecnomdes);
		if ($this->isColumnModified(NpnomcalPeer::ESPECIAL)) $criteria->add(NpnomcalPeer::ESPECIAL, $this->especial);
		if ($this->isColumnModified(NpnomcalPeer::FECNOMESPDES)) $criteria->add(NpnomcalPeer::FECNOMESPDES, $this->fecnomespdes);
		if ($this->isColumnModified(NpnomcalPeer::FECNOMESPHAS)) $criteria->add(NpnomcalPeer::FECNOMESPHAS, $this->fecnomesphas);
		if ($this->isColumnModified(NpnomcalPeer::CODNOMESP)) $criteria->add(NpnomcalPeer::CODNOMESP, $this->codnomesp);
		if ($this->isColumnModified(NpnomcalPeer::NOMNOMESP)) $criteria->add(NpnomcalPeer::NOMNOMESP, $this->nomnomesp);
		if ($this->isColumnModified(NpnomcalPeer::ID)) $criteria->add(NpnomcalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpnomcalPeer::DATABASE_NAME);

		$criteria->add(NpnomcalPeer::ID, $this->id);

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

		$copyObj->setFecnomdes($this->fecnomdes);

		$copyObj->setEspecial($this->especial);

		$copyObj->setFecnomespdes($this->fecnomespdes);

		$copyObj->setFecnomesphas($this->fecnomesphas);

		$copyObj->setCodnomesp($this->codnomesp);

		$copyObj->setNomnomesp($this->nomnomesp);


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
			self::$peer = new NpnomcalPeer();
		}
		return self::$peer;
	}

} 